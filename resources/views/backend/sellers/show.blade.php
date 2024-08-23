@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('View Seller Information')}}</h5>
</div>

<div class="col-lg-10 mx-auto">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">{{translate('Seller Information')}}</h5>
        </div>

        <div class="card-body">     
            <div class="form-group row">
                <label class="col-sm-3 col-from-label" for="name">{{translate('Name')}} :</label>
                <div class="col-sm-9">
                    <p> {{$seller->user->name}} </p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-from-label" for="email">{{translate('Email Address')}} :</label>
                <div class="col-sm-9">
                    <p>{{$seller->user->email}}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-from-label" for="email">{{translate('Phone Number')}} :</label>
                <div class="col-sm-9">
                    <p>{{$seller->user->phone}}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-from-label" for="email">{{translate('Vendor Type')}} :</label>
                <div class="col-sm-9">
                    <p>{{$seller->vendor_type}}</p>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-from-label" for="email">{{translate('Product Category')}} :</label>
                <div class="col-sm-9">
                    @if($seller->product_category != null)
                        <p>{{json_encode($seller->product_category)}}</p>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-from-label" for="email">{{translate('Service Category')}} :</label>
                <div class="col-sm-9">  
                    @if($seller->service_category != null)
                        <p>{{json_encode($seller->service_category)}}</p>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-from-label" for="email">{{translate('Vendor Approval')}} :</label>
                <div class="col-sm-9">
                    @if($seller->verification_status == 1)
                    <p>Approved</p>
                    @else
                    <p>Not Approved</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
