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
use Ngea\growertype;
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

class GrowerController extends Controller {

    public function getGrid()
    {
        $filter = \DataFilter::source(DB::table('coffee_growers_cgr as cgr')
        ->select( '*', 'cgr.id as id')
        ->leftjoin('grower_type_gt as gt', 'cgr.gt_id', '=', 'gt.id')
        // ->leftjoin('parchment_type_pty as pty', 'st.pty_id', '=', 'pty.id')
        // ->leftjoin('grn_gr as gr', 'gr.id', '=', 'st.grn_id')
        );
        $filter->add('cgr_grower','Grower', 'text');
        $filter->add('cgr_code','Grower Code','text');
        $filter->add('cgr_mark','Grower Mark','text');
        // $filter->add('publication_date','publication date','daterange')->format('m/d/Y', 'en');
        $filter->submit('search');
        $filter->reset('reset');
        $filter->build();

        $grid = \DataGrid::source($filter);
        
        $grid->add('id','ID', true)->style("width:100px");
        $grid->add('cgr_grower','Grower');
        
        $grid->add('cgr_code','Grower Code');
        $grid->add('gt_name','Grower Type', 'pty_name');
        $grid->add('cgr_mark','Grower Mark');
        $grid->add('cgr_organization','Organization');
        $grid->add('cgr_code','Code');
        $grid->add('cg_email','Email');
        $grid->add('cg_mobile','Mobile');
        $grid->add('cg_postal_town','Postal Town');
        $grid->add('cg_post_code','Post Code');
        // $grid->add('cg_factory_id','Factory ID');
        $grid->add('cg_cert','Certificate');
        //$grid->add('{!! str_limit($body,4) !!}','Body');
        //$grid->add('{{ implode(", ", $categories->pluck("name")->all()) }}','Categories');

        $grid->edit('editgroweredit', 'Edit','show|modify|delete');
        $grid->link('editgroweredit',"New Grower", "TR");
        $grid->orderBy('cgr.id','desc');
        $grid->paginate(10);

        
        
        return  view('editgrower', compact('filter','grid'));
    }

    public function Edit()
    {
        if (\Input::get('do_delete')==1) return  "not the first";
        
        $edit = \DataEdit::source(new coffeegrower());
        $edit->label('Edit Grower Item');
        // $edit->link("editparchment/filter","Stock", "TR")->back();
        // $edit->add('title','Title', 'text')->rule('required|min:5');

        // $edit->add('body','Body', 'redactor');
        // $edit->add('detail.note','Note', 'textarea')->attributes(array('rows'=>2));
        $edit->add('cgr_grower','Grower', 'text')->rule('required|min:2');
        $edit->add('cgr_organization','Organization', 'text')->rule('required|min:2');
        $edit->add('cgr_code','Grower Code', 'text')->rule('required|min:2');
        $edit->add('cgr_mark','Grower Mark', 'text')->rule('required|min:2');
        $edit->add('cg_email','Email', 'text');
        $edit->add('cg_mobile','Mobile', 'text');
        $edit->add('cg_postal_address','Postal Address', 'text');
        $edit->add('cg_land_line','Landline', 'text');
        $edit->add('cg_physical_address','Physical Address', 'text');
        $edit->add('gt_id','Grower type','select')->options(growertype::orderBy('id')->pluck("gt_name", "id")->all())->rule('required|min:1');
        $edit->add('cg_postal_town','Postal Town', 'text');
        $edit->add('cg_cert','Cerification', 'text');
        $edit->add('cgr_pin','Pin', 'text');

        return $edit->view('editgroweredit', compact('edit'));

    }

    public function unconfirm($id){
        Grn::where('id', '=', $id)
                        ->update(['gr_confirmed_by' => null]);
            return redirect()->action('ParchmentController@getParchmentGrnGrid');
    }


}