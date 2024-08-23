@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="align-items-center">
        <h1 class="h3">{{translate('Add Franchise')}}</h1>
    </div>
</div>


<div class="card">
    
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-0 h6"><b>Add Franchise</b></h5>
				 
            </div>
             
        </div>

        <div class="card-body">
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
            <form method="post" action="{{ route('franchise.save') }}" class="row"> 
				@csrf
				<div class="form-group row mt-3">
					<label class="col-md-3 col-from-label">{{translate('Franchise Name')}} <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="text" value="{{ old('name') }}" class="form-control" name="name" placeholder="{{ translate('Franchise Name') }}" required>
					</div>
				</div>
				
				<div class="form-group row mt-3">
					<label class="col-md-3 col-from-label">{{translate('Franchise Mobile')}} <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="text" value="{{ old('phone') }}" class="form-control" name="phone" placeholder="{{ translate('Franchise Mobile') }}" required>
					</div>
				</div>
				
				<div class="form-group row mt-3">
					<label class="col-md-3 col-from-label">{{translate('Franchise Email')}} <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="email" value="{{ old('email') }}" class="form-control" name="email" placeholder="{{ translate('Franchise Email') }}" required>
					</div>
				</div>
				
				<div class="form-group row mt-3">
					<label class="col-md-3 col-from-label">{{translate('State')}} <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="text" value="{{ old('state') }}" class="form-control" name="state" placeholder="{{ translate('State') }}" required>
					</div>
				</div>
				
				<div class="form-group row mt-3">
					<label class="col-md-3 col-from-label">{{translate('City')}} <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="text" value="{{ old('city') }}" class="form-control" name="city" placeholder="{{ translate('City') }}" required>
					</div>
				</div>
				
				<div class="form-group row mt-3">
					<label class="col-md-3 col-from-label">{{translate('Pin Code')}} <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="tel" value="{{ old('postal_code') }}" class="form-control" name="postal_code" placeholder="{{ translate('Pin Code') }}" required>
					</div>
				</div>
				
				<div class="form-group row mt-3">
					<label class="col-md-3 col-from-label">{{translate('Password')}} <span class="text-danger">*</span></label>
					<div class="col-md-8">
						<input type="text" class="form-control" name="password" placeholder="{{ translate('Password') }}" required>
					</div>
				</div>
				
				<div class="col-12">
					<div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
						<div class="btn-group" role="group" aria-label="Second group">
							<button type="submit" name="button" value="publish" class="btn btn-success">{{ translate('Save') }}</button>
						</div>
					</div>
				</div>
                         
            </form>
        </div>
     
</div>


<div class="modal fade" id="confirm-ban">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h6">{{translate('Confirmation')}}</h5>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>{{translate('Do you really want to ban this Customer?')}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Cancel')}}</button>
                <a type="button" id="confirmation" class="btn btn-primary">{{translate('Proceed!')}}</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-unban">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h6">{{translate('Confirmation')}}</h5>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>{{translate('Do you really want to unban this Customer?')}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Cancel')}}</button>
                <a type="button" id="confirmationunban" class="btn btn-primary">{{translate('Proceed!')}}</a>
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

        $(document).on("change", ".check-all", function() {
            if(this.checked) {
                // Iterate each checkbox
                $('.check-one:checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.check-one:checkbox').each(function() {
                    this.checked = false;
                });
            }

        });

        function sort_customers(el){
            $('#sort_customers').submit();
        }
        function confirm_ban(url)
        {
            $('#confirm-ban').modal('show', {backdrop: 'static'});
            document.getElementById('confirmation').setAttribute('href' , url);
        }

        function confirm_unban(url)
        {
            $('#confirm-unban').modal('show', {backdrop: 'static'});
            document.getElementById('confirmationunban').setAttribute('href' , url);
        }

        function bulk_delete() {
            var data = new FormData($('#sort_customers')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('bulk-customer-delete')}}",
                type: 'POST',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response == 1) {
                        location.reload();
                    }
                }
            });
        }
    </script>
@endsection
