<?php namespace Ngea\Http\Controllers;

use Input;
use confirm;
use DB;
use ask;
use Illuminate\Http\Request;
use Ngea\Http\Controllers\Controller;
use View;
use Ngea\Season;
use Ngea\Warehouse;
use Ngea\country;
use Ngea\WeightScales;
use Ngea\Weighbridge;
use Ngea\WeighbridgeInfo;
use Ngea\Grn;
use Ngea\CoffeeGrade;
use Ngea\Sale;
use Ngea\coffee_details;
use Ngea\ExpectedArrival;
use Ngea\basket;
use Ngea\Packaging;
use Ngea\purchase;
use Ngea\Stock;
use Ngea\bric;
use Ngea\sale_lots;
use Ngea\warrants;
use Ngea\Location;
use Ngea\Batch;
use Ngea\StockLocation;
use Ngea\Person;
use Ngea\StockBreakdown;
use Ngea\ProvisionalAllocation;
use Ngea\processrates;
use Ngea\teams;
use Ngea\processcharges;
use Ngea\RoleUser;
use Ngea\User;
use Ngea\coffeegrower;
use Ngea\Items;
use Ngea\agent;
use Ngea\Material;
use Ngea\StockWarehouse;
use Ngea\StockMill;
use Ngea\ParchmentType;
use Ngea\Thresholds;
use Ngea\AgentCategory;
use Ngea\BatchMill;
use Ngea\StockLocationBatch;
use Ngea\OutturnNumberSettings;

use Yajra\Datatables\Datatables;
use niklasravnsborg\LaravelPdf\Facades\Pdf as PDF;
use Activity;
use Excel;
use Auth;

class ParchmentController extends Controller {

    public function getGrid()
    {
        $filter = \DataFilter::source(StockMill::with('grn','partchmenttype'));
        $filter->add('st_outturn','Outturn', 'text');
        $filter->add('grn.gr_number','Grn number','text');
        // $filter->add('publication_date','publication date','daterange')->format('m/d/Y', 'en');
        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = \DataGrid::source($filter);
        
        $grid->add('id','ID', true)->style("width:100px");
        $grid->add('st_outturn','Outturn');
        
        $grid->add('st_mark','Mark');
        $grid->add('{{ $partchmenttype->pty_name }}','Parchment Type', 'pty_name');
        $grid->add('st_gross','Gross Weight');
        $grid->add('st_net_weight','Net Weight');
        $grid->add('st_packages','Packages');
        $grid->add('st_bags','Bags');
        $grid->add('st_pockets','Pockets');
        //$grid->add('{!! str_limit($body,4) !!}','Body');
        $grid->add('{{ $grn->gr_number }}','Grn', 'grn_id');
        //$grid->add('{{ implode(", ", $categories->pluck("name")->all()) }}','Categories');

        $grid->edit('editparchmentedit', 'Edit','show|modify|delete');
        // $grid->link('/editparchment/edit',"New Item", "TR");
        $grid->orderBy('id','desc');
        $grid->paginate(10);

        $grid->row(function ($row) {
            $row->cell('st_outturn')->style("font-weight:bold");
        //    if ($row->cell('id')->value == 20) {
        //        $row->style("background-color:#CCFF66");
        //    } elseif ($row->cell('id')->value > 15) {
        //        $row->cell('st_outturn')->style("font-weight:bold");
        //        $row->style("color:#f00");
        //    }
        });
        
        return  view('editparchment', compact('filter','grid'));
    }

    public function Edit()
    {
        if (\Input::get('do_delete')==1) return  "not the first";
        
        $edit = \DataEdit::source(new StockMill());
        $edit->label('Edit Partchment Item');
        // $edit->link("editparchment/filter","Stock", "TR")->back();
        // $edit->add('title','Title', 'text')->rule('required|min:5');

        // $edit->add('body','Body', 'redactor');
        // $edit->add('detail.note','Note', 'textarea')->attributes(array('rows'=>2));
        $edit->add('st_outturn','Outturn', 'text');
        $edit->add('st_net_weight','Net Weight', 'number');
        $edit->add('st_mark','Mark', 'text');
        $edit->add('st_gross','Gross Weight', 'number');
        $edit->add('st_packages','Packages', 'number');
        $edit->add('st_bags','Bags', 'number');
        $edit->add('st_pockets','Pockets', 'number');
        $edit->add('cgr_id','Grower','select')->options(coffeegrower::orderBy('cgr_grower')->pluck("cgr_grower", "id")->all());
        $edit->add('pty_id','Partchmant Type','select')->options(ParchmentType::orderBy('pty_name')->pluck("pty_name", "id")->all());
        $edit->add('mt_id','Material','select')->options(Material::orderBy('mt_name')->pluck("mt_name", "id")->all());
        $edit->add('grn_id','Grn','select')->options(Grn::orderBy('gr_number')->pluck("gr_number", "id")->all());
        // $edit->add('author_id','Author','select')->options(Author::pluck("firstname", "id")->all());
        // $edit->add('publication_date','Date','date')->format('d/m/Y', 'it');
        // $edit->add('photo','Photo', 'image')->move('uploads/demo/')->fit(240, 160)->preview(120,80);
        // $edit->add('public','Public','checkbox');
        // $edit->add('categories.name','Categories','tags');

        return $edit->view('editparchmentedit', compact('edit'));

    }

    public function getBatchGrid()
    {
        $filter = \DataFilter::source(DB::table('batch_mill_btc as btc')
        ->select( '*', 'btc.id as id')
        ->leftjoin('stock_mill_st as st', 'st.id', '=', 'btc.st_id')
        ->leftjoin('parchment_type_pty as pty', 'st.pty_id', '=', 'pty.id')
        ->leftjoin('grn_gr as gr', 'gr.id', '=', 'st.grn_id')
        );
        $filter->add('st_outturn','Outturn', 'text');
        $filter->add('gr_number','Grn Number', 'text');
        // $filter->add('publication_date','publication date','daterange')->format('m/d/Y', 'en');
        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = \DataGrid::source($filter);
        
        // $grid->add('id','ID', true)->style("width:100px");
        $grid->add('st_outturn','Outturn', 'st_outturn');
        $grid->add('st_mark','Mark', 'mark');
        $grid->add('gr_number','Grn', 'grn_id');
        $grid->add('pty_name','Parchment Type', 'pty_name');
        $grid->add('btc_weight','Batch Gross Weight');
        $grid->add('btc_net_weight','Batch Net Weight');
        $grid->add('btc_packages','Batch Packages');
        $grid->add('btc_bags','Batch Bags');
        $grid->add('btc_pockets','Batch Pockets');
        //$grid->add('{!! str_limit($body,4) !!}','Body');
       
        //$grid->add('{{ implode(", ", $categories->pluck("name")->all()) }}','Categories');

        $grid->edit('editparchmentbatchedit', 'Edit','show|modify|delete');
        // $grid->link('/editparchment/edit',"New Item", "TR");
        $grid->orderBy('btc.id','desc');
        $grid->paginate(10);

        $grid->row(function ($row) {
            // $row->cell('st.st_outturn')->style("font-weight:bold");
        //    if ($row->cell('id')->value == 20) {
        //        $row->style("background-color:#CCFF66");
        //    } elseif ($row->cell('id')->value > 15) {
        //        $row->cell('st_outturn')->style("font-weight:bold");
        //        $row->style("color:#f00");
        //    }
        });
        
        return  view('editparchmentbatch', compact('filter','grid'));
    }

    public function BatchEdit()
    {
        if (\Input::get('do_delete')==1) return  "not the first";

        $edit = \DataEdit::source(new BatchMill());
        $edit->label('Edit Partchment Batch Item');
        // $edit->link("editparchment/filter","Stock", "TR")->back();
        // $edit->add('title','Title', 'text')->rule('required|min:5');

        // $edit->add('body','Body', 'redactor');
        // $edit->add('detail.note','Note', 'textarea')->attributes(array('rows'=>2));
        $edit->add('btc_net_weight','Net Weight', 'number')->rule('required|min:1');
        // $edit->add('st_mark','Mark', 'text')->rule('required|min:1');
        $edit->add('btc_weight','Gross Weight', 'number')->rule('required|min:1');
        $edit->add('btc_packages','Packages', 'number')->rule('required|min:1');
        $edit->add('btc_bags','Bags', 'number')->rule('required|min:1');
        $edit->add('btc_pockets','Pockets', 'number')->rule('required|min:1');
        
        // $edit->add('author_id','Author','select')->options(Author::pluck("firstname", "id")->all());
        // $edit->add('publication_date','Date','date')->format('d/m/Y', 'it');
        // $edit->add('photo','Photo', 'image')->move('uploads/demo/')->fit(240, 160)->preview(120,80);
        // $edit->add('public','Public','checkbox');
        // $edit->add('categories.name','Categories','tags');

        return $edit->view('editparchmentbatchedit', compact('edit'));

    }
    public function getParchmentGrnGrid()
    {
        $filter = \DataFilter::source(DB::table('grn_gr as gr')
        ->select( '*', 'gr.id as id')
        ->leftjoin('users_usr as usr', 'usr.id', '=', 'gr.gr_confirmed_by')
        ->leftjoin('coffee_growers_cgr as cgr', 'cgr.id', '=', 'gr.cgr_id')
        );
        $filter->add('gr_number','Grn', 'text');
        $filter->add('cgr_grower','Grower', 'text');
        // $filter->add('publication_date','publication date','daterange')->format('m/d/Y', 'en');
        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = \DataGrid::source($filter);
        
        // $grid->add('id','ID', true)->style("width:100px");
        $grid->add('gr_number','Grn', 'text');
        $grid->add('cgr_grower','Grower', 'text');
        $grid->add('usr_email','Confirmed By', 'text');
      
        //$grid->add('{!! str_limit($body,4) !!}','Body');
       
        //$grid->add('{{ implode(", ", $categories->pluck("name")->all()) }}','Categories');

        $grid->edit('editparchmentgrnedit', 'Edit','show|modify|delete');
        // $grid->link('/editparchment/edit',"New Item", "TR");
        $grid->orderBy('gr.id','desc');
        $grid->paginate(10);

        $grid->row(function ($row) {
            // $row->cell('st.st_outturn')->style("font-weight:bold");
        //    if ($row->cell('id')->value == 20) {
        //        $row->style("background-color:#CCFF66");
        //    } elseif ($row->cell('id')->value > 15) {
        //        $row->cell('st_outturn')->style("font-weight:bold");
        //        $row->style("color:#f00");
        //    }
        });
        
        return  view('editparchmentgrn', compact('filter','grid'));
    }

    public function ParchmentGrnEdit()
    {
        if (\Input::get('do_delete')==1) return  "not the first";
        // dd(\Input::get('gr_confirmed_by'));exit;
        // if(\Input::get('gr_confirmed_by')==null){
        //     dd(\Input::get('gr_confirmed_by'));exit;
        // }
        $edit = \DataEdit::source(new Grn());
        $edit->label('Edit Partchment Grn Item');
        $edit->link("editparchment/unconfirm/{$edit->model->id}","Unconfirm", "TR")->back();
        $edit->add('gr_number','Gr no', 'text')->rule('required|min:1');
        
        // $edit->add('body','Body', 'redactor');
        // $edit->add('detail.note','Note', 'textarea')->attributes(array('rows'=>2));
       
        
        $edit->add('cgr_id','Grower','select')->options(coffeegrower::orderBy('cgr_grower')->pluck("cgr_grower", "id")->all());
        $edit->add('gr_confirmed_by','Confirmed By','select')->options(User::pluck("usr_email", "id")->all());
        // $edit->add('publication_date','Date','date')->format('d/m/Y', 'it');
        // $edit->add('photo','Photo', 'image')->move('uploads/demo/')->fit(240, 160)->preview(120,80);
        // $edit->add('categories.name','Categories','tags');

        return $edit->view('editparchmentbatchedit', compact('edit'));

    }
    public function unconfirm($id){
        Grn::where('id', '=', $id)
                        ->update(['gr_confirmed_by' => null]);
            return redirect()->action('ParchmentController@getParchmentGrnGrid');
    }


}