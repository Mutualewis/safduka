@extends ('layouts.dashboard')
@section('page_heading','User Roles')

@section('section')

<div class="col-md-14 col-md-offset-2">

	<div class="row">
		<div class="col-md-6">
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif	


			<div class="flash-message">
			    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
			      @if(Session::has('alert-' . $msg))

			      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
			      @endif
			    @endforeach
			  </div> <!-- end .flash-message -->

		</div>				
	</div>

<?php 
	
	if (old('country') != NULL) {
		$cid = old('country');
	}
	if (!isset($cid)) {
		$cid = NULL;
	}

?>

	<div class="col-md-6 col-md-offset-0" style="margin-left: -200px;">
		<form role="form" method="POST" action="settingsdepartment">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>User Roles</h3>
				<table class="table table-striped" id="department-table">
				<thead>
				  <tr>
					<th>
						No.
					</th>
					<th>
						User
					</th>
					<th>
						Role
					</th>
					<th></th>
				  </tr>
				</thead>
				<tbody>



					<?php
						$count = 0;

						if (isset($roleusers) && count($roleusers) > 0) {

							foreach ($roleusers as $value) {
								$count += 1;
								$id = $value->id;
								echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$value->usr_name."</td>";
									echo "<td>".$value->name."</td>";
								
									// echo "<td>"."<a id='{$id}' class='btn btn-warning' data-toggle='modal' data-target='#menuModalCenter' onclick='getMenu(event, this)'>View Menu</a>";
									echo "<td>"."<a id='{$value->usr_id}' class='btn btn-success' data-toggle='modal' data-target='#menuModalCenter' onclick='getRolesList(event, this)' data-dprtname='{$value->name}'>Manage Role</a>";
									// echo "<td>"."<a id='{$id}' class='btn btn-success btn-danger' id='notification-trigger' onclick='checkDeletable(event, this)'>Delete</a>"."</td>";
								echo "</tr>";

							}
						}
					?>
				</tbody>
				</table>
		</form>
	</div>

<!-- Modal -->
<div class="modal fade" id="menuModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="title">
        <div class="alert alert-info" role="alert">
		  <h4 class="alert-heading"></h4>
		</div>
    	</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
				
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
        <!-- <a href='' class='btn btn-danger confirm-delete'>Delete</a> -->
      </div>
    </div>
  </div>
</div>
</div>
@stop

@push('scripts')
<script>
var path= "{{URL::to('settingsdepartment')}}";
$(document).ready(function (){  
	var table = $('#department-table').DataTable({
	});//end datatable
});//end doc ready

	function checkDeletable(e, val){
	  e.preventDefault();

	  var departmentID=val.id;
	

	  var url = '{{ route('settingsdepartment.department_delete',['id'=>":id"]) }}';
	  url = url.replace(':id', departmentID);
	 
		 $.ajax({
			  url: url,
			  dataType: 'json',
			}).done(function(data) {
			  if (data.deletable) {
			  	//location.reload();
			  	$(location).attr('href',path)
			  }else{
			  	// create the notification
							var notification = new NotificationFx({
								message : '<p>This item cannot be deleted. It already has other details</p>',
								layout : 'attached',
								effect : 'bouncyflip',
								type : 'notice', // notice, warning or error
								onClose : function() {
									
								}
							});

							// show the notification
							notification.show();
			  }
			}).error(function(error) {
			  	// create the notification
							var notification = new NotificationFx({
								message : '<p>Error occured on attempt to delete</p>',
								layout : 'attached',
								effect : 'bouncyflip',
								type : 'notice', // notice, warning or error
								onClose : function() {
									
								}
							});

							// show the notification
							notification.show();
			  
			});

		}
	function getMenu(e, value){
	 e.preventDefault();
	 $('.modal-body').html('')

	 var departmentID=value.id;
	 var url = '{{ route('settingsdepartment.getmenus',['departmentID'=>":id"]) }}';
	 url = url.replace(':id', departmentID);

	 //var urlconfirmdelete = '{{ route('settingsregion.region_delete',['id'=>":id"]) }}';
	 //urlconfirmdelete = urlconfirmdelete.replace(':id', regionID);

	 //$("a.confirm-delete").attr("href", urlconfirmdelete);
	 console.log(url)

	 $('.modal-body').html('<table id="warehouses-table" class="table table-condensed table-striped" width="100%">'+
						'<thead bgcolor="#086b36">'+
							'<tr>'+				  
								'<th>'+
									'<font color="white"> Department</font>'+
								'</th>'+
								'<th>'+
									'<font color="white"> Menu</font>'+
								'</th>'+
								'<th>'+
									'<font color="white"> Url</font>'+
								'</th>'+
							  '</tr>'+						
						'</thead>'+
				'</table>')

	var table = $('#warehouses-table').DataTable({
		dom: 'Bfrtip',  
		type: 'POST',
   		url: '',
        processing: true,
        deferRender: true,
        ajax: url,
     	
        columns: [
            { data: 'dprt_name', name: 'department' },
            { data: 'mn_name', name: 'menu'},
			{ data: 'mn_url', name: 'url'}

        ], 


        language: {
            lengthMenu: "Display _MENU_ records per page",
            zeroRecords: "Nothing found - sorry",
            info: "Showing page _PAGE_ of _PAGES_",
            infoEmpty: "No records available",
            infoFiltered: "(filtered from _MAX_ total records)"
        },

		'order': [0, 'asc'],



	});

}

	function getRolesList(e, value){
	 e.preventDefault();
	 $('.modal-body').html('')

	 var roleID=value.id;
	 var url = '{{ route('roles.getroleslist') }}';


	 $('.modal-body').html('<table id="menulist-table" class="table table-condensed table-striped" width="100%">'+
						'<thead bgcolor="#086b36">'+
							'<tr>'+				  
								'<th>'+
									'<font color="white"> Role</font>'+
								'</th>'+
                                '<th>'+
									'<font color="white">Display Name</font>'+
								'</th>'+
                                '<th>'+
									'<font color="white">Description</font>'+
								'</th>'+
								'<th>'+
									'<font color="white"> Assign</font>'+
								'</th>'+
							  '</tr>'+						
						'</thead>'+
				'</table>')

	var table = $('#menulist-table').DataTable({
		dom: 'Bfrtip',  
		type: 'POST',
   		url: '',
        processing: true,
        deferRender: true,
        ajax: url,
     	
        columns: [
            { data: 'name', name: 'name'},
			{ data: 'display_name', name: 'display_nameurl'},
            { data: 'description', name: 'description'},
			{ data: 'id', name: 'url'}
        ], 


        language: {
            lengthMenu: "Display _MENU_ records per page",
            zeroRecords: "Nothing found - sorry",
            info: "Showing page _PAGE_ of _PAGES_",
            infoEmpty: "No records available",
            infoFiltered: "(filtered from _MAX_ total records)"
        },

		columnDefs: [

		{targets: 3, 
			'className': 'dt-body-center',
			'render': function (data, type, full, meta, row){
					return '<a class="assign" id='+data+'><i class="fa fa-check fa-fw fa-2x" style="color:green"></i></a>';	

			}
		}
		],

		fnDrawCallback: function( oSettings ) {
			


		    $(document).ready(function() {
		    	

			$('.assign').off('click').on('click', function(){
				var selectedID = $(this).attr('id');
				selectedID = parseInt(selectedID);
				var assignurl = '{{ route('roles.assignrole',['ID'=>":id",'roleID'=>":roleid" ]) }}';
				assignurl = assignurl.replace(':id', roleID);
				assignurl = assignurl.replace(':roleid', selectedID);
				var dialog = bootbox.dialog({
					onEscape: function() { console.log("Escape!"); },
  					backdrop: true,
					message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
				});
						$.ajax({
						url: assignurl,
						dataType: 'json',
						}).done(function(response) {
                            if(response.updated){
							dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Assigned successfully</i></div>');
                            
                            setTimeout(() => {
                                location.reload(true)
                            }, 200);
                            }
							else if(response.error)
							dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Error occ0000001ured while processing this request</i></div>');
						}).error(function(error) {
							dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  An error occurred while trying to process this request</i></div>');
						});
			});

				$('.revoke').off('click').on('click', function(){
				var selectedID = $(this).attr('id');
				selectedID = parseInt(selectedID);
				var revokeurl = '{{ route('settingsdepartment.revokemenu',['departmentID'=>":id",'menuID'=>":menuid" ]) }}';
				revokeurl = revokeurl.replace(':id', departmentID);
				revokeurl = revokeurl.replace(':menuid', selectedID);

				var dialog = bootbox.dialog({
					onEscape: function() { console.log("Escape. We are escaping, we are the escapers, meant to escape, does that make up escarpments!"); },
  					backdrop: true,
					message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Processing...</div>'
				});
						$.ajax({
						url: revokeurl,
						dataType: 'json',
						}).done(function(response) {
						    if(response.deleted)
							dialog.find('.bootbox-body').html('<div class="text-center" style="color: green"><i class="fa fa-check fa-2x">  Menu removed successfully</i></div>');
							else if(response.error==404)
							dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  Menu has not been assigned to this department</i></div>');
						}).error(function(error) {
							dialog.find('.bootbox-body').html('<div class="text-center" style="color: red"><i class="fa fa-exclamation-triangle fa-2x">  An error occurred while trying to process this request</i></div>');
						});
			});


		    });
	    },

		'order': [0, 'asc'],
		

	});

}


</script>
@endpush