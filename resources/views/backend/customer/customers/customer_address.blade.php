@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="align-items-center">
        <h1 class="h3">{{translate('Customers Address')}}</h1>
    </div>
</div>


<div class="card">
    
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-0 h6"><b>Customer Name :</b> {{ $user_details->first_name.' '.$user_details->last_name }}</h5>
				<br>
				<h5 class="mb-0 h6"><b>Phone :</b> {{ $user_details->phone }}</h5>
				<br>
				<h5 class="mb-0 h6"><b>Email :</b> {{ $user_details->email }}</h5>
				<br>
            </div>
             
        </div>

        <div class="card-body  row">
             @foreach ($customer_address as $key => $address)
                        <div class="col-md-4 col-sm-12">
                            <div class="d-flex position-relative">
                                <div class="hotel-form py-4 px-2 mb-3 mt-1 shadow-none w-100 bg-white pt-2 border">
                                    <div class="px-2">
                                        <div class="user_location mt-1 pb-2">
                                            <label for="payment_method_bacs d-flex">
                                                <input class="input-radio" type="radio" name="address_id"
                                                    value="{{ $address->id }}" @if ($address->set_default)
                                                checked
                                                @endif required>
                                                @php
                                                $addid = $address->id;
                                                @endphp
                                                <span class="userf-name">{{$address->address_type}}</span>
                                            </label>

                                        </div>
                                        <div class="user_name mt-1">
                                            <span class="userf-name">
                                                {{$address->first_name.' '.$address->last_name}}
                                            </span>
                                        </div>
                                        <div class="phone_number mt-1">
                                            <span class="user-phone d-flex">
                                                <i class="fa fa-phone p-2" aria-hidden="true"></i>
                                                +91-{{ $address->phone }}
                                            </span>
                                        </div>
                                        <div class="user_email mt-1">
                                            <span class="user-email d-flex">
                                                <i class="fa fa-map-marker p-2"
                                                    aria-hidden="true"></i> {{$address->house_no}}, {{$address->area}},
                                                {{$address->city}}, {{$address->state}} {{$address->pin}}
                                            </span>
                                        </div>
                                        @if($address->set_default=='1')
                                        <div class="user_email edit-address mt-1 d-flex">
                                            <div class="w-100">
                                                <button class="btn btn-success float-start add-buttonser">Default&nbsp;Address</button>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                </div>

                            </div>
                        </div>
                        @endforeach
            
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
