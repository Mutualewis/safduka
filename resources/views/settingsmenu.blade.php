@extends ('layouts.dashboard')
@section('page_heading','Menu Settings')

@section('section')

<div class="col-md-12">

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
	
   if (old('parent') != NULL) {
		$mn_id = old('parent');
	}
	if (!isset($mn_id)) {
		$mn_id = NULL;
	}
	
?>

	<div class="col-md-6 col-md-offset-0">
	

	        <form role="form" method="POST" action="/settingsmenu">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">


		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Name</label>
		                <input class="form-control" placeholder="Name" name="name" value="{{ old('name') }}" required>
		            </div>		            

		        </div>


		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Url</label>
		                <input class="form-control" placeholder="Url" name="url" value="{{ old('url') }}" required>
		            </div>		            

		        </div>

		          <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Icon</label>
		                <input class="form-control" placeholder="Menu Icon" name="icon" value="{{ old('icon') }}">
		            </div>		            

		        </div>


		        <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Level</label>
			                <select class="form-control" id="level" name="level" required>
			                	<option></option> 
							
									<option value="1" selected="selected">1</option>
											
									<option value="2">2</option>

									<option value="3">3</option>
												
			                </select>	
		            </div>		            

		        </div>

		         <div class="row">
	        		
		            <div class="form-group col-md-6" id="parent">
		            	<label>Parent</label>
			                <select class="form-control" id="parentvalue" name="parent">
			                	<option></option> 
								
			                </select>	
		            </div>		            

		        </div>

		          <div class="row">
	        		
		            <div class="form-group col-md-6">
		            	<label>Menu Order</label>
		                <input class="form-control" placeholder="Order" name="order" value="{{ old('order') }}" required>
		            </div>		            

		        </div>
	        	
				<div class="row">
		            <div class="form-group col-md-6">
			            <button type="submit" name="submit" class="btn btn-lg btn-success btn-block">Update/ Add</button>						
		            </div>

		        </div>

	        </form>

    </div>
	<div class="col-md-6 col-md-offset-0" style="margin-left: -200px;">
		<form role="form" method="POST" action="settingsmenu">
	        	<input type="hidden" name="_token" value="{{ csrf_token() }}">		
				<h3>Menu</h3>
				<table class="table table-striped" id="menu-table">
				<thead>
				  <tr>
					<th>
						No.
					</th>
					<th>
						Name
					</th>
					<th>
						Url
					</th>
					<th>
						Icon
					</th>
					<th>
						Level
					</th>
					<th>
						Order
					</th>
					
					<th></th>

				  </tr>
				</thead>
				<tbody>



					<?php
						$count = 0;

						if (isset($menu) && count($menu) > 0) {
							foreach ($menu->all() as $value) {
								$count += 1;
								//var_dump($menu);exit;
								$id = $value->id;
								echo "<tr>";
									echo "<td>".$count."</td>";
									echo "<td>".$value->mn_name."</td>";
									echo "<td>".$value->mn_url."</td>";
									echo "<td>".$value->mn_icon."</td>";
									echo "<td>".$value->mn_level."</td>";
									echo "<td>".$value->mn_order."</td>";
									echo "<td>"."<a id='{$id}' class='btn btn-success btn-danger' id='notification-trigger' onclick='checkDeletable(event, this)'>Delete</a>"."</td>";
									echo "</tr>";
									echo "</tr>";

							}
						}
					?>
				</tbody>
				</table>
		</form>
	</div>



</div>
@stop
<?php
$menujson=$menu->tojson();
?>
@push('scripts')
<script>
var menu = <?php echo json_encode($menujson); ?>;
menu=JSON.parse(menu)
var path= "{{URL::to('settingsmenu')}}";
	$(document).ready(function (){  
		$('#parent').hide()
		var table = $('#menu-table').DataTable({
		});//end datatable
	$('#level').change(function (){
		$("#parent option").remove();
		$('#parentvalue').append($('<option selected>', { 
						value: '',
						text : '---Select Parent---' 
					}));
		var level=this.value
		if(level!=1){
			if(level==2){
				$.each(menu, function (i, item) {
					if(item.mn_level==1){
					$('#parentvalue').append($('<option>', { 
						value: item.id,
						text : item.mn_name 
					}));
					}
				});
				$('#parent').show()
			}else if(level==3){
				$.each(menu, function (i, item) {
					if(item.mn_level==2){
					$('#parentvalue').append($('<option>', { 
						value: item.id,
						text : item.mn_name 
					}));
					}
				});
				$('#parent').show()
			}
		
		}else{
			$('#parent').hide()
		}
	})

	});//end doc ready

	function checkDeletable(e, val){
	  e.preventDefault();

	  var menuID=val.id;
	

	  var url = '{{ route('settingsmenu.menu_delete',['id'=>":id"]) }}';
	  url = url.replace(':id', menuID);
	 
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
</script>
@endpush