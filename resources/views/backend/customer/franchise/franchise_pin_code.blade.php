@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="align-items-center">
			<h1 class="h3">{{translate('Franchise Pin Code')}}</h1>
	</div>
</div>

<div class="row">
	<div class="col-md-7">
		<div class="card">
		    <div class="card-header row gutters-5">
			<div class="col-12">
                <h5 class="mb-0 h6"><b>Franchise Name :</b> {{ $user_details->name }}</h5>
				<br>
				<h5 class="mb-0 h6"><b>Phone :</b> {{ $user_details->phone }}</h5>
				<br>
				<h5 class="mb-0 h6"><b>Email :</b> {{ $user_details->email }}</h5>
				<br>
            </div>
			<hr>
				<div class="col text-center text-md-left">
					<h5 class="mb-md-0 h6">{{ translate('Franchise Pincodes') }}</h5>
					
				</div>
				<div class="col-md-4">
					<form class="" id="sort_brands" action="" method="GET">
						<div class="input-group input-group-sm">
					  		<input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type name & Enter') }}">
						</div>
					</form>
				</div>
		    </div>
		    <div class="card-body">
		        <table class="table aiz-table mb-0">
		            <thead>
		                <tr>
		                    <th>#</th>
		                    <th>{{translate('Pincode')}}</th>
		                    <th>{{translate('Details')}}</th>
		                    <th class="text-right">{{translate('Options')}}</th>
		                </tr>
		            </thead>
		            <tbody>
		                @foreach($franchise_pin_codes as $key => $item)
		                    <tr>
		                        <td>{{ ($key+1) + ($franchise_pin_codes->currentPage() - 1)*$franchise_pin_codes->perPage() }}</td>
		                        <td>{{ $item->pincode }}</td>
								<td>
									<p><b>Country:</b>&nbsp;{{ $item->pincode }}</p>
									<p><b>State:</b>&nbsp;{{ $item->state }}</p>
									<p><b>City:</b>&nbsp;{{ $item->city }}</p>
								
								</td>
		                        <td class="text-right">
		                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('brands.edit', ['id'=>$item->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
		                                <i class="las la-edit"></i>
		                            </a>
		                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('brands.destroy', $item->id)}}" title="{{ translate('Delete') }}">
		                                <i class="las la-trash"></i>
		                            </a>
		                        </td>
		                    </tr>
		                @endforeach
		            </tbody>
		        </table>
		        <div class="aiz-pagination">
                	{{ $franchise_pin_codes->appends(request()->input())->links() }}
            	</div>
		    </div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="card">
			<div class="card-header">
				<h5 class="mb-0 h6">{{ translate('Add New Pincode') }}</h5>
			</div>
			<div class="card-body">
				<form action="{{ route('franchise_pincode.store') }}" method="POST">
					@csrf
					<div class="form-group mb-3">
						<label for="name">{{translate('Pincode')}}</label>
						<input type="tel" id="pincode" placeholder="{{translate('Pincode')}}" name="pincode" class="form-control" required>
						<input type="hidden" name="franchise_id" value="{{ $user_details->id }}" required>
						<span class="text-warning form-text font-weight-bold" id="wrong_pincode"></span>
					</div>
					
					<div style="float:right;" class="form-group mb-3">
						<button type="button" onclick="get_state_city()" class="btn btn-success" required>Get Details</button>
					</div>
					 <hr>
					<div class="form-group mb-3 mt-3 ">
						<label for="name">{{translate('Country')}}</label>
						<input type="text" class="form-control" id="country" name="country" placeholder="{{translate('Country')}}">
					</div>
					<div class="form-group mb-3">
						<label for="name">{{translate('State')}}</label>
						<input type="text" class="form-control" id="stateid" name="state" placeholder="{{translate('State')}}">
					</div>
					<div class="form-group mb-3">
						<label for="name">{{translate('City')}}</label>
						<input type="text" class="form-control" id="cityid" name="city" placeholder="{{translate('City')}}">
					</div>
					<div class="form-group mb-3 text-right">
						<button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
<script type="text/javascript">
    function sort_brands(el){
        $('#sort_brands').submit();
    }
	
	function get_state_city(){
                var pincode = jQuery('#pincode').val();
                if(pincode==''){
                    jQuery('#city').val('');
                    jQuery('#state').val('');
                    document.getElementById("wrong_pincode").innerHTML="";
                }else{
                    jQuery.ajax({
                        url:'{{route('getPinCodeDetails')}}',
                        type:'post',
                        data:'pincode='+pincode+'&_token={{csrf_token()}}',
                        success:function(data){
                            if(data=='no'){
                                // alert('Wrong Pincode');
                                document.getElementById("wrong_pincode").innerHTML="Wrong Pincode.";
                               document.getElementById("cityid").value = '';
                                document.getElementById("stateid").value = '';
                                document.getElementById("country").value = '';
                            }else{
                                var getData=$.parseJSON(data);
                                document.getElementById("cityid").value = getData.city;
                                document.getElementById("stateid").value = getData.state;
                                document.getElementById("country").value = getData.country;
                                document.getElementById("wrong_pincode").innerHTML="";
                            }
                        }
                    });
                }
            }
			
</script>
@endsection
