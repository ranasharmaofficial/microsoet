@extends('backend.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
      <div class="row align-items-center">
        <div class="col-md-12">
            <h1 class="h3">{{ translate('Manage Profile') }}</h1>
        </div>
      </div>
    </div>
    <style>
        body.side-menu-open1 br {
            display: block !important;
        }
        .psDiv {
            max-height: 180px;
            overflow-x: visible;
            overflow-y: scroll;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid lightgrey;
        }
    </style>
    <!-- Basic Info-->
    <div class="col-md-12 border-sm-bottom row mb-2 clist mx-1" style="padding:0 0px;">
        <label id="accountid" class="list_active">Account Details</label>
        <label id="bankid">Bank Details</label>
        <label id="businessid">Business Details</label>
        {{-- <label id="manageid">Manage Users</label>
        <label id="sessionid">Manage Session</label> --}}
    </div>

    <div class="row tab1 mb-5">
        <div class="col-md-6 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-header row gutters-5">
                    <div class="col">
                        <h6 class="mb-06 text-dark"><strong>{{ translate('Display Information')}}</strong><a href="javascript:void(0)" onclick="open_display_info_modal();" class="float-right fs-14">Edit</a></h6>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            Display Name<br /><span class="text-dark">{{$shopData->name}} <i class="fa fa-check-circle text-success" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Designation<br /><span class="text-dark">{{$shopData->designation}}</span>
                        </div>
                        <div class="col-md-12">
                            Business Description<br /><span class="text-dark">{{$shopData->business_description}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Product Categories<br /><span class="text-dark">{{$sellerData->product_category_names}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Service Categories<br /><span class="text-dark">{{$sellerData->service_category_names}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-header row gutters-5">
                    <div class="col">
                        <h6 class="mb-06 text-dark"><strong>{{ translate('Pick up Address')}}</strong><a href="javascript:void(0)" onclick="open_pickup_address_modal();" class="float-right fs-14">Edit</a></h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            Address line 1<br /><span class="text-dark">{{$shopData->pickup_address_line1}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Address line 2<br /><span class="text-dark">{{$shopData->pickup_address_line2}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Pin code<br /><span class="text-dark">{{$shopData->pickup_pincode}}</span>
                        </div>
                        <div class="col-md-12">
                            Pick up City<br /><span class="text-dark">{{$shopData->pickup_address_city}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-header row gutters-5">
                    <div class="col">
                        <h6 class="mb-06 text-dark"><strong>{{ translate('Login Details')}}</strong><a href="javascript:void(0)" onclick="open_login_details_modal();" class="float-right fs-14">Change Password</a></h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            Display Name<br />
                            <span class="text-dark">{{$user->name}} <i class="fa fa-check-circle text-success" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Your Mobile Number<br />
                            <span class="text-dark">{{$user->phone}} <i class="fa fa-check-circle text-success" aria-hidden="true"></i></span>
                            {{-- <a href="javascript:void(0)" onclick="open_mobile_edit_modal();" class="float-right">Edit</a> --}}
                        </div>
                        <div class="col-md-12 mb-1">
                            Your Email Address<br />    
                            <span class="text-dark">{{$user->email}} <i class="fa fa-check-circle text-success" aria-hidden="true"></i></span>
                            {{-- <a href="javascript:void(0)" onclick="open_email_edit_modal();" class="float-right">Edit</a> --}}
                        </div>
                        <div class="col-md-12">
                            Password<br /><span class="text-dark">********</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-header row gutters-5">
                    <div class="col">
                        <h6 class="mb-06 text-dark"><strong>{{ translate('Contact Details')}}</strong><a href="javascript:void(0)" onclick="open_contact_details_modal();" class="float-right fs-14">Edit</a></h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12  mb-1">
                            Yout Name<br /><span class="text-dark">{{$user->name}}</span>
                        </div>
                        <div class="col-md-12  mb-1">
                            Yout Mobile Number<br /><span class="text-dark">{{$user->secondary_mobile}} <i class="fa fa-check-circle text-success" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-md-12  mb-1">
                            Yout Email ID<br /><span class="text-dark">{{$user->secondary_email}} <i class="fa fa-check-circle text-success" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-md-12">
                            Landline No.<br /><span class="text-dark">{{$user->landline_no}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <div class="row tab2 tab_none mb-5">
        <div class="col-md-6 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-header row gutters-5">
                    <div class="col">
                        <h6 class="mb-06 text-dark"><strong>{{ translate('Bank Details')}}</strong><a href="javascript:void(0)" onclick="open_bank_details_modal();" class="float-right fs-14">Edit</a></h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            Account Holder Name<br /><span class="text-dark">{{$sellerData->bank_acc_name}} <i class="fa fa-check-circle text-success" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Account Number<br /><span class="text-dark">{{$sellerData->bank_acc_no}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            IFSC Code<br /><span class="text-dark">{{$sellerData->bank_ifsc}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Bank Name<br /><span class="text-dark">{{$sellerData->bank_name}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            State<br /><span class="text-dark">{{$sellerData->bank_state}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            City<br /><span class="text-dark">{{$sellerData->bank_city}}</span>
                        </div>
                        <div class="col-md-12">
                            Branch<br /><span class="text-dark">{{$sellerData->bank_branch}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-header row gutters-5">
                    <div class="col">
                        <h6 class="mb-06 text-dark"><strong>{{ translate('Claim LDC for TDS under 194O')}}</strong><a href="javascript:void(0)" onclick="open_ldc_details_modal();" class="float-right fs-14">Edit</a></h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            Certificate Number<br /><span class="text-dark">{{$sellerData->ldc_certificate_no}}</span>
                        </div>
                        
                        <div class="col-md-12 mb-1">
                            Lower Tax Rate<br /><span class="text-dark">{{$sellerData->ldc_lower_tax_rate}}%</span>
                        </div>
                        
                        <div class="col-md-12 mb-1">
                            Validity<br /><span class="text-dark">{{$sellerData->ldc_validity}} to {{$sellerData->ldc_validity}}</span>
                        </div>
                        
                        <div class="col-md-12">
                            Amount<br /><span class="text-dark">Rs. {{$sellerData->ldc_amount}}</span>
                        </div>
                        
                        <div class="col-md-12">
                            Upload Document<br /><span class="text-dark"><a href="{{url("public/uploads/".$sellerData->ldc_document)}}" target="_blank">View</a></span>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
        
    <div class="row tab3 tab_none mb-5">
        <div class="col-md-6 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-header row gutters-5">
                    <div class="col">
                        <h6 class="mb-06 text-dark"><strong>{{ translate('Business Details')}}</strong><a href="javascript:void(0)" onclick="open_business_details_modal();" class="float-right fs-14">Edit</a></h6>
                    </div>
                    <div class="col-md-4 text-right">
                        
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            Business Name<br /><span class="text-dark">{{$shopData->business_name}} <i class="fa fa-check-circle text-success" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-md-12 mb-1">
                            TAN<br /><span class="text-dark">{{$shopData->tan_no}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            GSTIN / Provisional ID Number<br /><span class="text-dark">{{$shopData->gst_no}} <i class="fa fa-check-circle text-success" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Registered business address<br /><span class="text-dark">{{$shopData->address_line_1 .' '. $shopData->address_line2}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Signature<br /><span class="text-dark">{{$shopData->signature}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Business Type<br /><span class="text-dark">{{$shopData->business_type}}</span>
                        </div>
                        <div class="col-md-12">
                            PAN<br /><span class="text-dark">{{$shopData->personal_pan}} <i class="fa fa-check-circle text-success" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Address proof<br /><span class="text-dark">Not Available</span>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
        
        <div class="col-md-6 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-header row gutters-5">
                    <div class="col">
                        <h6 class="mb-06 text-dark"><strong>{{ translate('Company Details')}}</strong><a href="javascript:void(0)" onclick="open_company_details_modal();" class="float-right fs-14">Edit</a></h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            Company Name<br /><span class="text-dark">{{$shopData->company_name}} <i class="fa fa-check-circle text-success" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Year of Establishment<br /><span class="text-dark">{{$shopData->year_of_estb}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            CEO Name<br /><span class="text-dark">{{$shopData->ceo_name}} <i class="fa fa-check-circle text-success" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Website URL<br /><span class="text-dark">{{$shopData->website_url}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Google Business URL<br /><span class="text-dark">{{$shopData->google}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Facebook Business URL<br /><span class="text-dark">{{$shopData->facebook}}</span>
                        </div>
                        <div class="col-md-12">
                            Instagram Business URL<br /><span class="text-dark">{{$shopData->instagram}}</span>
                        </div>
                        <div class="col-md-12">
                            Company Logo<br /><span class="text-dark"><a href="{{url('public/uploads')}}/{{$shopData->company_logo}}" target="_blank">View Logo</a></span>
                        </div>
                        <div class="col-md-12">
                            Profile Image<br /><span class="text-dark"><a href="{{url('public/uploads')}}/{{Auth::user()->avatar_original}}" target="_blank">View Profile Image</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-header row gutters-5">
                    <div class="col">
                        <h6 class="mb-06 text-dark"><strong>{{ translate('Company Address')}}</strong><a href="javascript:void(0)" onclick="open_company_address_modal();" class="float-right fs-14">Edit</a></h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            Address (Bld. No./floor)<br /><span class="text-dark">{{$shopData->floor}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Address (Area/Street)<br /><span class="text-dark">{{$shopData->address}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            City<br /><span class="text-dark">{{$shopData->city}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            State<br /><span class="text-dark">{{$shopData->state}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Country<br /><span class="text-dark">{{$shopData->country}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Pin Code<br /><span class="text-dark">{{$shopData->pincode}}</span>
                        </div>
                        <div class="col-md-12">
                            Locality<br /><span class="text-dark">{{$shopData->locality}}</span>
                        </div>
                        <div class="col-md-12">
                            Landmark<br /><span class="text-dark">{{$shopData->landmark}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-header row gutters-5">
                    <div class="col">
                        <h6 class="mb-06 text-dark"><strong>{{ translate('Nature of Business')}}</strong><a href="javascript:void(0)" onclick="open_nature_of_business_modal();" class="float-right fs-14">Edit</a></h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            Primary Business Type<br /><span class="text-dark">{{$sellerData->primary_business_type}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Ownership Type<br /><span class="text-dark">{{$sellerData->ownership_type}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Number of Employees<br /><span class="text-dark">{{$sellerData->no_of_employee}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Annual Turnover<br /><span class="text-dark">{{$sellerData->annual_turnover}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Secondary Business<br /><span class="text-dark">{{$sellerData->secondary_business}}</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Business Card<br />
                            <span class="text-dark">
                                <a href="{{url('public/uploads')}}/{{$sellerData->business_card_front}}" target="_blank">Front View</a>
                                &nbsp;&nbsp;&nbsp;
                                <a href="{{url('public/uploads')}}/{{$sellerData->business_card_back}}" target="_blank">Back View</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    {{-- <div class="row tab4 tab_none mb-5">
        <div class="col-md-12 border-sm-bottom mb-3">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mt-2">Manage Users</h5>
                </div>
                <div class="col-md-6 text-right pb-2">
                    <a href="javascript:void(0)" onclick="open_add_user_modal();" class="btn btn-primary">
                        <i class="las la-plus"></i> Add New User
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-header row gutters-5">
                    <div class="col">
                        <h6 class="mb-06 text-dark"><strong>{{ translate('Vikash Kumar')}}</strong></h6>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="javascript:void(0);">Delete</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            Role<br /><span class="text-dark">Admin <i class="fa fa-check-circle text-success" aria-hidden="true"></i></span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Email Id<br /><span class="text-dark">vikash@orrish.com</span>
                        </div>
                        <div class="col-md-12 mb-1">
                            Phone Number<br /><span class="text-dark">98xxxxxxxx</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row tab5 tab_none mb-5">
        <div class="col-md-12 border-sm-bottom mb-3">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mt-2">Manage Sessions</h5>
                </div>
                <div class="col-md-6 text-right pb-2">
                    <a  href="javascript:void(0)" class="btn btn-primary">Logout Other Sessoins</a>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 mb-4">
            <div class="card h-100">
                <div class="card-header row gutters-5">
                    <div class="col">
                        <h6 class="mb-06 text-dark"><strong>{{ translate('Active Sessions:')}}</strong></h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table aiz-table1 mb-0 footable footable-1 breakpoint-lg" style="">
                            <thead>
                                <tr class="footable-header">
                                    <th>IP Address</th>
                                    <th>Login Type?</th>
                                    <th>Login Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>157.35.64.186</td>
                                    <td>Seller Login</td>
                                    <td>10-12-2022 10:12:54</td>
                                    <td>Current Session</td>
                                </tr>
                                <tr>
                                    <td>157.35.64.186</td>
                                    <td>Seller Login</td>
                                    <td>10-12-2022 10:12:54</td>
                                    <td><a href="#">Logout Session</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@endsection

{{-- display information modal  --}}
<div class="modal fade" id="display_info_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('Display Information') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" id="display_info_modal_form" method="post">
                @csrf
                <div class="modal-body gry-bg px-3 pt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label>{{ translate('Display Name')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" lang="en" class="form-control mb-3" name="display_name" id="display_name" placeholder="{{ translate('Display Name') }}" value="{{$shopData->name}}">
                            <span id="display_name_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>{{ translate('Designation')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" lang="en" class="form-control mb-3" name="designation" id="designation" placeholder="{{ translate('Designation') }}" value="{{$shopData->designation}}">
                            <span id="designation_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>{{ translate('Description')}}</label>
                        </div>
                        <div class="col-md-9">
                            <textarea name="description" id="description" rows="3" class="form-control mb-3">{{$shopData->business_description}}</textarea>
                            <span id="description_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>{{ translate('Vendor Type')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <ul class="form-control list-unstyled d-flex" style="font-size:14px;">
                                <li class="mt-0 mb-0">
                                    <label for="both">
                                        <input class="input-radio input-radio1" type="radio" id="vendor_type_both" value="Both" name="vendor_type" @if($sellerData->vendor_type=='Both') checked @endif onclick="show_hide_proSer_cat(this.value);">
                                        <label for="vendor_type_both">Both </label>
                                    </label>
                                </li>
                                <li class="mx-3 mt-0 mb-0">
                                    <label for="product">
                                        <input class="input-radio input-radio1" type="radio" id="vendor_type_product" value="Product" name="vendor_type" @if($sellerData->vendor_type=='Product') checked @endif onclick="show_hide_proSer_cat(this.value);">
                                        <label for="vendor_type_product">Product</label>
                                    </label>
                                </li>
                                <li class="mx-3 mt-0 mb-0">
                                    <label for="service">
                                        <input class="input-radio input-radio1" type="radio" id="vendor_type_service" value="Service" name="vendor_type" @if($sellerData->vendor_type=='Service') checked @endif onclick="show_hide_proSer_cat(this.value);">
                                        <label for="vendor_type_service">Service</label>
                                    </label>
                                </li>
                            </ul>
                            <span id="vendor_type_error"></span>
                        </div>
                    </div>
                    <div class="row @if($sellerData->vendor_type && $sellerData->vendor_type=='Service') d-none @endif" id="view_seller_product_cat">
                        <div class="col-md-3">
                            <label>{{ translate('Product Category')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group psDiv">
                                @php $seller_pro_cat_arr = explode(',',$sellerData->product_category_ids); @endphp
                                @foreach($productCategoryList as $key=>$product)
                                    <div class="js-form-message mb-2">
                                        <div class="custom-control custom-checkbox d-flex">
                                            <input type="checkbox" class="custom-control-input product_checkbox" id="productname_{{$key}}" name="product_category_ids[]" value="{{$product->id}}" @if(in_array($product->id,$seller_pro_cat_arr)) checked @endif >
                                            <label class="custom-control-label" for="productname_{{$key}}">{{$product->name}}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <span id="product_category_error"></span>
                        </div>
                    </div>
                    <div class="row @if($sellerData->vendor_type && $sellerData->vendor_type=='Product') d-none @endif" id="view_seller_service_cat">
                        <div class="col-md-3">
                            <label>{{ translate('Service Category')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group psDiv">
                                @php $seller_ser_cat_arr = explode(',',$sellerData->service_category_ids); @endphp
                                @foreach($serviceCategoryList as $key=>$service)
                                    <div class="js-form-message mb-2">
                                        <div class="custom-control custom-checkbox d-flex">
                                            <input type="checkbox" class="custom-control-input service_checkbox" id="servicename_{{$key}}" name="service_category_ids[]" value="{{$service->id}}" @if(in_array($service->id,$seller_ser_cat_arr)) checked @endif >
                                            <label class="custom-control-label" for="servicename_{{$key}}">{{$service->name}}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <span id="service_category_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>{{ translate('Web Preview')}}</label>
                        </div>
                        <div class="col-md-9">
                            <img src="{{ static_asset('assets/img/saller.jpg') }}" class="border-sm w-100"/>
                        </div>
                    </div>
                    <div class="form-group text-right mt-2">
                        <input type="hidden" name="id" value="{{$shopData->id}}">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button type="button" data-dismiss="modal" class="btn btn-sm border-sm">{{translate('Cancel')}}</button>
                        &nbsp;&nbsp;
                        <button type="button" class="btn btn-sm btn-dark" id="display_info_submit_btn" onclick="display_info_form_submit()">{{translate('Save')}}</button>                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- pickup address  --}}
<div class="modal fade" id="pickup_address_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('Pickup Address') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" id="pickup_address_modal_form" method="post">
                @csrf
                <div class="modal-body gry-bg px-3 pt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label>{{ translate('Address line 1')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" lang="en" class="form-control mb-3" name="address_line_1" id="address_line_1" placeholder="{{ translate('Address line 1') }}" value="{{$shopData->pickup_address_line1}}">
                            <span id="address_line_1_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>{{ translate('Address line 2')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" lang="en" class="form-control mb-3" name="address_line_2" id="address_line_2" placeholder="{{ translate('Address line 2') }}" value="{{$shopData->pickup_address_line2}}">
                            <span id="address_line_2_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>{{ translate('Pincode')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" lang="en" class="form-control mb-3 number" name="pincode" id="pincode" placeholder="{{ translate('Pincode') }}" value="{{$shopData->pickup_pincode}}">
                            <span id="pincode_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>{{ translate('Address City')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" lang="en" class="form-control mb-3" name="address_city" id="address_city" placeholder="{{ translate('Address City') }}" value="{{$shopData->pickup_address_city}}">
                            <span id="address_city_error"></span>
                        </div>
                    </div>
                    <div class="form-group text-right mt-2">
                        <input type="hidden" name="id" value="{{$shopData->id}}">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button type="button" data-dismiss="modal" class="btn btn-sm border-sm">{{translate('Cancel')}}</button>
                        &nbsp;&nbsp;
                        <button type="button" class="btn btn-sm btn-dark" id="pickup_address_submit_btn" onclick="pickup_address_form_submit()">{{translate('Save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- login details  --}}
<div class="modal fade" id="login_details_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('Change Password') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" id="login_details_modal_form" method="post">
                @csrf
                <div class="modal-body gry-bg px-3 pt-3">
                    {{-- <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Enter old password')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="password" class="form-control mb-3" name="old_password" id="old_password" placeholder="{{ translate('Enter old password') }}">
                            <span id="old_password_error"></span>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Enter new password')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="password" class="form-control mb-3" name="new_password" id="new_password" onkeyup="isStrong(this.value,'new_password_error')" placeholder="{{ translate('Enter new password') }}">
                            <span id="new_password_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Confirm new password')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="password" class="form-control mb-3" name="confirm_new_password" id="confirm_new_password" onkeyup="isMatch(this.value,'new_password','confirm_new_password','confirm_new_password_error','Password ')" placeholder="{{ translate('Confirm new password') }}">
                            <span id="confirm_new_password_error"></span>
                        </div>
                    </div>
                    <div class="form-group text-right mt-2">
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button type="button" data-dismiss="modal" class="btn btn-sm border-sm">{{translate('Cancel')}}</button>
                        &nbsp;&nbsp;
                        <button type="button" class="btn btn-sm btn-dark" id="login_details_submit_btn" onclick="login_details_form_submit()">{{translate('Save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Mobile Edit  --}}
<div class="modal fade" id="mobile_edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('Edit Registered Mobile Number') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" id="mobile_edit_modal_form" method="post">
                @csrf
                <div class="modal-body gry-bg px-3 pt-3">
                    <div class="row">
                        <div class="col-md-12">
                            <label>{{ translate('As a safety precaution, we will be sending you an authentication code to verify your identity. Please choose where you would like to receive it :')}} <span class="text-danger">*</span></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="col-md-12">
                                <input type="radio" name="RadioGroup1" value="radio" id="RadioGroup1_0" checked="checked" style="margin-left:-10px; margin-top:30px;" />
                                <div class="col-md-12 border-sm float-right row p-2">
                                    <div class="col-md-1 pt-2 fs-30"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                    <div class="col-md-7">Your Registered Mobile Number<br />9555110707<br />
                                        <input type="text" lang="en" class="form-control" name="newemail" placeholder="{{ translate('Enter OTP') }}">
                                    </div>
                                    <div class="col-md-3"> <a href="#"><strong>Resend OTP</strong></a><br />0:59</div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="col-md-12">
                                <input type="radio" name="RadioGroup1" value="radio" id="RadioGroup1_1" style="margin-left:-10px; margin-top:30px;" />
                                <div class="col-md-12 border-sm float-right row p-2">
                                    <div class="col-md-1 pt-2 fs-30"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    <div class="col-md-7">Your Registered Email Address<br />vikash@orrish.com</div>
                                    <div class="col-md-3"><a href="#"><strong>Send OTP</strong></a></div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="form-group text-right mt-2">
                        <button type="submit" data-dismiss="modal" class="btn btn-sm btn-link border-sm">{{translate('Cancel')}}</button>&nbsp;&nbsp;<button type="submit" class="btn btn-sm btn-dark">{{translate('Save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Email Edit  --}}
<div class="modal fade" id="email_edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('Account Authentication') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" id="email_edit_modal_form" method="post">
                @csrf
                <div class="modal-body gry-bg px-3 pt-3">
                    <div class="row">
                        <div class="col-md-12">
                            <label>{{ translate('Your Current Email address is ')}} <strong>"vikash@orrish.com"</strong></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Enter New Email Address')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="newemail" placeholder="{{ translate('Enter New Email Address') }}">
                        </div>
                    </div>
                    <div class="form-group text-right mt-2">
                        <button type="submit" data-dismiss="modal" class="btn btn-sm btn-link border-sm">{{translate('Cancel')}}</button>&nbsp;&nbsp;
                        <button type="submit" data-dismiss="modal" class="btn btn-sm btn-dark" onclick="open_email_edit_modal1();">{{translate('Next')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Email Edit1  --}}
<div class="modal fade" id="email_edit_modal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('Account Authentication') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" id="email_edit_modal1_form" method="post">
                @csrf
                <div class="modal-body gry-bg px-3 pt-3">
                    <div class="row">
                        <div class="col-md-12">
                            <label>{{ translate('As a safety precaution, please input OTP sent to your registered email address ')}} <strong>"vikash@orrish.com"</strong></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <input type="number" lang="en" class="form-control mb-3" name="newemail" placeholder="{{ translate('Enter OTP') }}">
                        </div>
                        <div class="col-md-5">
                            <a href="#"><strong>Resend OTP</strong></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>{{ translate('Please enter your account password')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="newemail" placeholder="{{ translate('Enter Password') }}">
                        </div>
                    </div>
                    <div class="form-group text-right mt-2">
                        <button type="submit" data-dismiss="modal" class="btn btn-sm btn-link border-sm">{{translate('Cancel')}}</button>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-sm btn-dark">{{translate('Submit')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- contact details  --}}
<div class="modal fade" id="contact_details_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('Contact Details') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body gry-bg px-3 pt-3">
                <form class="" id="contact_details_modal_form" method="post">
                    @csrf
                    <div class="modal-body gry-bg px-3 pt-3">
                    <div class="row">
                            <div class="col-md-3">
                                <label>{{ translate('Your Name')}} <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" lang="en" class="form-control mb-3" name="your_name" id="your_name" placeholder="{{ translate('Your Name') }}" value="{{$user->name}}">
                                <span id="your_name_error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>{{ translate('Mobile No.')}} <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" lang="en" class="form-control mb-3 number" name="mobile" id="mobile" maxlength="10" minlength="10" placeholder="{{ translate('Mobile No.') }}" value="{{$user->secondary_mobile}}">
                                <span id="mobile_error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>{{ translate('Email Id')}} <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" lang="en" class="form-control mb-3" name="email" id="email" placeholder="{{ translate('Email') }}" value="{{$user->secondary_email}}">
                                <span id="email_error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>{{ translate('Landline No.')}} <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" lang="en" class="form-control mb-3 number" name="landline" id="landline" maxlength="12" minlength="6" placeholder="{{ translate('Landline No.') }}" value="{{$user->landline_no}}">
                                <span id="landline_error"></span>
                            </div>
                        </div>
                        <div class="form-group text-right mt-2">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <button type="button" data-dismiss="modal" class="btn btn-sm border-sm">{{translate('Cancel')}}</button>
                            &nbsp;&nbsp;
                            <button type="button" class="btn btn-sm btn-dark" id="contact_details_submit_btn" onclick="contact_details_form_submit()">{{translate('Save')}}</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

{{-- Bank details  --}}
<div class="modal fade" id="bank_details_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('Bank Details') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" id="bank_details_modal_form" method="post">
                @csrf
                <div class="modal-body gry-bg px-3 pt-3">
                <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Account Holder Name')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="bank_acc_name" id="bank_acc_name" placeholder="{{ translate('Account Holder Name') }}" value="{{$sellerData->bank_acc_name}}">
                            <span id="bank_acc_name_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Account Number')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="bank_acc_no" id="bank_acc_no" placeholder="{{ translate('Account Number') }}" value="{{$sellerData->bank_acc_no}}">
                            <span id="bank_acc_no_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('IFSC Code')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="bank_ifsc" id="bank_ifsc" placeholder="{{ translate('IFSC Code') }}" value="{{$sellerData->bank_ifsc}}">
                            <span id="bank_ifsc_error"></span>
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <div class="col-md-5">
                            &nbsp;
                        </div>
                        <div class="col-md-7">
                            <a href="#">I dont know my IFSC</a>&nbsp;&nbsp;<button type="button" class="btn btn-sm btn-primary">{{translate('Submit')}}</button>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Bank Name')}}</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="bank_name" id="bank_name" placeholder="{{translate('Bank Name')}}" value="{{$sellerData->bank_name}}">
                            <span id="bank_name_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('State')}}</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="bank_state" id="bank_state" placeholder="{{translate('State')}}" value="{{$sellerData->bank_state}}">
                            <span id="bank_state_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('City')}}</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="bank_city" id="bank_city" placeholder="{{translate('City')}}" value="{{$sellerData->bank_city}}">
                            <span id="bank_city_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Branch')}}</label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="bank_branch" id="bank_branch" placeholder="{{translate('Branch Name')}}" value="{{$sellerData->bank_branch}}">
                            <span id="bank_branch_error"></span>
                        </div>
                    </div>
                    <div class="form-group text-right mt-2">
                        <input type="hidden" name="id" value="{{$sellerData->id}}">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button type="button" data-dismiss="modal" class="btn btn-sm btn-link border-sm">{{translate('Cancel')}}</button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-sm btn-dark" id="bank_details_submit_btn" onclick="bank_details_form_submit()">{{translate('Save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Claim details  --}}
<div class="modal fade" id="ldc_details_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('Provide LDC Details') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" id="ldc_details_modal_form" method="post">
                @csrf
                <div class="modal-body gry-bg px-3 pt-3">
                <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Certificate Number')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="ldc_certificate_no" id="ldc_certificate_no" placeholder="{{ translate('Certificate Number') }}" value="{{$sellerData->ldc_certificate_no}}">
                            <span id="ldc_certificate_no_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Lower Tax Rate')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="ldc_lower_tax_rate" id="ldc_lower_tax_rate" placeholder="{{ translate('Tax Rate') }}" value="{{$sellerData->ldc_lower_tax_rate}}">
                            <span id="ldc_lower_tax_rate_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Validity')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="date" lang="en" class="form-control w-100 mb-3 w-49 float-left" name="ldc_validity" id="ldc_validity" value="{{$sellerData->ldc_validity}}">
                            <span id="ldc_validity"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Amount')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="number" lang="en" class="form-control mb-3" name="ldc_amount" id="ldc_amount" placeholder="{{ translate('Amount') }}" value="{{$sellerData->ldc_amount}}">
                            <span id="ldc_amount_error"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Upload Document')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="file" name="ldc_document" id="ldc_document" class="form-control mb-3" accept=".jpg,.png,.pdf" />
                            <a href="{{url("public/uploads/".$sellerData->ldc_document)}}" target="_blank">View</a>
                            <input type="hidden" name="old_ldc_document" id="old_ldc_document" value="{{$sellerData->ldc_document}}">
                            <span id="ldc_document_error"></span>
                        </div>
                    </div>
                    <div class="form-group text-right mt-2">
                        <input type="hidden" name="id" value="{{$sellerData->id}}">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button type="button" data-dismiss="modal" class="btn btn-sm btn-link border-sm">{{translate('Cancel')}}</button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-sm btn-dark" id="ldc_details_submit_btn" onclick="ldc_details_form_submit()">{{translate('Save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Business details  --}}
<div class="modal fade" id="business_details_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('Business Details') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" id="business_details_modal_form" method="post">
                @csrf
                <div class="modal-body gry-bg px-3 pt-3">
                <div class="row">
                        <div class="col-md-4">
                            <label>{{ translate('Business Name')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" lang="en" class="form-control mb-3" name="business_name" id="business_name" placeholder="{{ translate('Business Name') }}" value="{{$shopData->business_name}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>{{ translate('GSTIN')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" lang="en" class="form-control mb-3" name="gst_no" id="gst_no" placeholder="{{ translate('GSTIN') }}" value="{{$shopData->gst_no}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>{{ translate('TAN ')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" lang="en" class="form-control" name="tan_no" id="tan_no" placeholder="{{ translate('TAN') }}" value="{{$shopData->tan_no}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            &nbsp;
                        </div>
                        <div class="col-md-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" name="tan_checkbox" id="tan_checkbox" />
                                <label class="form-check-label text-dark fs-12" for="tan_checkbox" style="line-height:24px;">I don't have TAN</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 border-sm-bottom">
                        <div class="col-md-4">
                            &nbsp;
                        </div>
                        
                        <div class="col-md-8 text-dark fs-12">
                            <input type="file" class="form-control" name="tan_document" id="tan_document" accept=".jpg,.png,.pdf">
                            <input type="hidden" name="old_tan_document" id="old_tan_document" value="{{$shopData->tan_document}}">
                            Accepted file formats: png, jpg & pdf&nbsp;&nbsp;&nbsp;&nbsp;
                            {{-- <a href="javascript:void(0)" onclick="select_file('tan_document')" class="float-right">Upload</a> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>{{ translate('Signature')}} <span class="text-danger">*</span><br />
                                <span class="fs-12" style="line-height:20px;"><strong>NOTE:</strong> Please ensure that the image of the signature is of an authorised signatory (as endorsed by the Tax Authorities) Sign on a white background, scan the signature and upload it.</span>
                            </label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="signature" rows="7" class="form-control mb-3" id="signature">{{$shopData->signature}}</textarea>
                        </div>
                    </div>
                    
                    <div class="row mb-3 border-sm-bottom">
                        <div class="col-md-4">
                            &nbsp;
                        </div>
                        <div class="col-md-8 fs-12 text-right">
                            <input type="file" class="form-control" name="signature_document" id="signature_document" accept=".jpg,.png,.pdf">
                            <input type="hidden" name="old_signature_document" id="old_signature_document" value="{{$shopData->signature_document}}">
                            {{-- <a href="javascript:void(0)" onclick="select_file('signature_document')">Upload</a> --}}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            REGISTERED BUSINESS ADDRESS
                        </div>
                        <div class="col-md-6 text-right">
                            <input type="checkbox" class="d-none" name="same_as_pickup_address" id="same_as_pickup_address">
                            <label style="cursor:pointer" for="same_as_pickup_address">Same as my pickup address</label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <label>{{ translate('Address line 1')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" lang="en" class="form-control mb-3" name="business_address_line1" id="business_address_line1" placeholder="{{ translate('Address Line 1') }}" value="{{$shopData->address_line1}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>{{ translate('Address line 1')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" lang="en" class="form-control mb-3" name="business_address_line2" id="business_address_line2" placeholder="{{ translate('Address Line 2') }}" value="{{$shopData->address_line2}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>{{ translate('Pincode')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" lang="en" class="form-control mb-3" name="business_pincode" id="business_pincode" placeholder="{{ translate('Pincode') }}" value="{{$shopData->pincode}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>{{ translate('City')}}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" lang="en" class="form-control mb-3" name="business_city" id="business_city" placeholder="{{ translate('City') }}" value="{{$shopData->city}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>{{ translate('State')}}</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" lang="en" class="form-control mb-3" name="business_state" id="business_state" placeholder="{{ translate('State') }}" value="{{$shopData->state}}">
                        </div>
                    </div>
                    <div class="row mb-3 border-sm-bottom">
                        <div class="col-md-6 fs-20 pb-2">
                            KYC Documents
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>{{ translate('Business type')}}</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control mb-3" name="business_type" id="business_type">
                                <option value="Company" {{($shopData->business_type=='Company')?'selected':''}}>Company</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>{{ translate('Personal PAN')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" lang="en" class="form-control mb-3" name="personal_pan" id="personal_pan" placeholder="{{ translate('Personal PAN') }}" value="{{$shopData->personal_pan}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>{{ translate('Business PAN')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" lang="en" class="form-control mb-3" name="business_pan" id="business_pan" placeholder="{{ translate('Business PAN') }}" value="{{$shopData->business_pan}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>{{ translate('Address proof')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-8">
                                <select class="form-control mb-3" name="address_proof" id="address_proof">
                                <option value="Passport" {{($shopData->address_proof=='Passport')?'selected':''}}>Passport</option>
                                <option value="Electricity bill" {{($shopData->address_proof=='Electricity bill')?'selected':''}}>Electricity bill</option>
                                <option value="Aadhar card" {{($shopData->address_proof=='Aadhar card')?'selected':''}}>Aadhar card</option>
                                <option value="Telephone/mobile bill" {{($shopData->address_proof=='Telephone/mobile bill')?'selected':''}}>Telephone/ mobile bill</option>
                                <option value="Bank account" {{($shopData->address_proof=='Bank account')?'selected':''}}>Bank account</option>
                                <option value="Voters identity card" {{($shopData->address_proof=='Voters identity card')?'selected':''}}>Voter's identity card</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-4">
                            &nbsp;
                        </div>
                        <div class="col-md-8 text-dark fs-12">
                            <input type="file" class="form-control" name="address_proof_document" id="address_proof_document" accept=".jpg,.png,.pdf">
                            <input type="hidden" name="old_address_proof_document" id="old_address_proof_document" value="{{$shopData->address_proof_document}}">
                            Accepted file formats: png, jpg & pdf&nbsp;&nbsp;&nbsp;&nbsp;
                            {{-- <a href="javascript:void(0)" onclick="select_file('address_proof_document')" class="float-right">Upload</a> --}}
                        </div>
                    </div>
                    <div class="form-group text-right mt-2">
                        <input type="hidden" name="id" value="{{$shopData->id}}">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button type="button" data-dismiss="modal" class="btn btn-sm btn-link border-sm">{{translate('Cancel')}}</button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-sm btn-dark" id="business_details_submit_btn" onclick="business_details_form_submit()">{{translate('Save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Add User details  --}}
<div class="modal fade" id="add_user_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('Add a new User') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" id="add_user_modal_form" method="post">
                @csrf
                <div class="modal-body gry-bg px-3 pt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label>{{ translate('Role')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <select class="form-control mb-3">
                                <option value="">Select a Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Operations Manager">Operations Manager</option>
                                <option value="Catalog Manager">Catalog Manager</option>
                                <option value="Product Listing Ads Manager">Product Listing Ads Manager</option>
                                <option value="Ads Partner">Ads Partner</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>{{ translate('Name')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" lang="en" class="form-control mb-3" name="mobile">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>{{ translate('Email Id')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="text" lang="en" class="form-control mb-3" name="mobile">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>{{ translate('Phone number')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" lang="en" class="form-control mb-3" name="landline">
                        </div>
                    </div>
                    <div class="form-group text-right mt-2">
                        <button type="submit" data-dismiss="modal" class="btn btn-sm btn-link border-sm">{{translate('Cancel')}}</button>&nbsp;&nbsp;<button type="submit" class="btn btn-sm btn-dark">{{translate('Save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- company details  --}}
<div class="modal fade" id="company_details_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('Company Details') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" id="company_details_modal_form" method="post">
                @csrf
                <div class="modal-body gry-bg px-3 pt-3">
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Company Name')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="company_name" id="company_name" value="{{$shopData->company_name}}">
                            <span id="company_name_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Year of Establishment')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="year_of_estb" id="year_of_estb" value="{{$shopData->year_of_estb}}">
                            <span id="year_of_estb_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('CEO Name')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="ceo_name" id="ceo_name" value="{{$shopData->ceo_name}}">
                            <span id="ceo_name_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Website URL')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="website_url" id="website_url" value="{{$shopData->website_url}}">
                            <span id="website_url_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Google Business URL')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="google" id="google" value="{{$shopData->google}}">
                            <span id="google_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Facebook Business URL')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="facebook" id="facebook" value="{{$shopData->facebook}}">
                            <span id="facebook_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Instagram Business URL')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="instagram" id="instagram" value="{{$shopData->instagram}}">
                            <span id="instagram_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Company Logo')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <div class="input-group ml-2">
                                <div class="input-group-prepend">
                                    <div class="font-weight-medium text-center">
                                        <input type="file" name="company_logo" id="company_logo" class="d-none" accept=".jpg,.png,.pdf">
                                        <img onclick="document.getElementById('company_logo').click();" src="{{url('public/uploads')}}/{{$shopData->company_logo}}" alt="" style="width:80px;">
                                        &nbsp;&nbsp;{{ translate('Company Logo') }}
                                    </div>
                                    <input type="hidden" name="old_company_logo" id="old_company_logo" value="{{$shopData->company_logo}}">
                                    <span id="company_logo_error"></span>
                                </div>
                            </div>
                            <div class="file-preview box sm"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Profile Image')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <div class="input-group ml-2">
                                <div class="input-group-prepend">
                                    <div class="font-weight-medium text-center">
                                        <input type="file" name="profile_icon" id="profile_icon" class="d-none" accept=".jpg,.png,.pdf">
                                        <img onclick="document.getElementById('profile_icon').click();" src="{{url('public/uploads')}}/{{Auth::user()->avatar_original}}" alt="" style="width:80px;">
                                        &nbsp;&nbsp;{{ translate('Profile Image') }}
                                    </div>
                                    <input type="hidden" id="old_profile_icon" name="old_profile_icon" value="{{Auth::user()->avatar_original}}">
                                    <span id="profile_icon_error"></span>
                                </div>
                            </div>
                            <div class="file-preview box sm"></div>
                        </div>
                    </div>
                    
                    <div class="form-group text-right mt-2">
                        <input type="hidden" name="id" value="{{$shopData->id}}">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button type="button" data-dismiss="modal" class="btn btn-sm btn-link border-sm">{{translate('Cancel')}}</button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-sm btn-dark" id="company_details_submit_btn" onclick="company_details_form_submit()">{{translate('Save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- company Address  --}}
<div class="modal fade" id="company_address_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('Company Address') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="" id="company_address_modal_form" method="post">
                @csrf
                <div class="modal-body gry-bg px-3 pt-3">
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Address (Bld. No./floor)')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3" name="floor" id="floor" value="{{$shopData->floor}}">
                            <span id="floor_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Address (Area/Street)')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3"  name="area" id="area" value="{{$shopData->area}}">
                            <span id="area_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('City')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3"  name="city" id="city" value="{{$shopData->city}}">
                            <span id="city_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('State')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3"  name="state" id="state" value="{{$shopData->state}}">
                            <span id="state_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Country')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3"  name="country" id="country" value="{{$shopData->country}}">
                            <span id="country_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Pin Code')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3"  name="pincode" id="pincode" value="{{$shopData->pincode}}">
                            <span id="pincode_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Locality')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3"  name="locality" id="locality" value="{{$shopData->locality}}">
                            <span id="locality_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Landmark')}} <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-7">
                            <input type="text" lang="en" class="form-control mb-3"  name="landmark" id="landmark" value="{{$shopData->landmark}}">
                            <span id="landmark_error"></span>
                        </div>
                    </div>
                    <div class="form-group text-right mt-2">
                        <input type="hidden" name="id" value="{{$shopData->id}}">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button type="button" data-dismiss="modal" class="btn btn-sm btn-link border-sm">{{translate('Cancel')}}</button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-sm btn-dark" id="company_address_submit_btn" onclick="company_address_form_submit()">{{translate('Save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Nature of Business  --}}
<div class="modal fade" id="nature_of_business_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('Nature of Business') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
                <form class="" id="nature_of_business_modal_form" method="post">
                    @csrf
                    <div class="modal-body gry-bg px-3 pt-3">
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Primary Business Type') }}</label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <select class="form-control" name="primary_business_type" id="primary_business_type" value="{{$sellerData->primary_business_type}}">
                                <option value="">---- Choose One ----</option>
                                <option value="Products" {{($sellerData->primary_business_type=='Products')?'selected':''}}>Products</option>
                                <option value="Services" {{($sellerData->primary_business_type=='Services')?'selected':''}}>Services</option>
                                <option value="Both" {{($sellerData->primary_business_type=='Both')?'selected':''}}>Both</option>
                            </select> 
                            <span id="primary_business_type_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Ownership Type') }}</label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <select class="form-control" name="ownership_type" id="ownership_type" value="{{$sellerData->ownership_type}}">
                                <option value="">---- Choose One ----</option>
                                <option value="Service Providers" {{($sellerData->ownership_type=='Service Providers')?'selected':''}}>Service Providers</option>
                                <option value="Manufacturer" {{($sellerData->ownership_type=='Manufacturer')?'selected':''}}>Manufacturer</option>
                                <option value="Trader" {{($sellerData->ownership_type=='Trader')?'selected':''}}>Trader</option>
                                <option value="Wholesaler" {{($sellerData->ownership_type=='Wholesaler')?'selected':''}}>Wholesaler</option>
                            </select>
                            <span id="ownership_type_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Number of Employees') }}</label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <input type="text" class="form-control" name="no_of_employee" id="no_of_employee" value="{{$sellerData->no_of_employee}}">
                            <span id="no_of_employee_error"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <label>{{ translate('Annual Turnover') }}</label>
                        </div>
                        <div class="col-md-7 mb-3">
                            <input type="text" class="form-control" name="annual_turnover" id="annual_turnover" value="{{$sellerData->annual_turnover}}">
                            <span id="annual_turnover_error"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-12 border-sm-bottom mb-2"><strong>{{ translate('Secondary Business') }}</strong></label>
                        <div class="col-md-12">
                            @php 
                            $secondary_business_array = explode(',',$sellerData->secondary_business);
                            @endphp
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="secondary_business" {{((in_array("Wholesaler",$secondary_business_array))?'checked':'')}} value="Wholesaler" id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">Wholesaler</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secondary_business" {{((in_array("Exporter",$secondary_business_array))?'checked':'')}} value="Exporter" id="flexCheckDefault1" />
                                    <label class="form-check-label" for="flexCheckDefault1">Exporter</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secondary_business" {{((in_array("Distributor",$secondary_business_array))?'checked':'')}} value="Distributor" id="flexCheckDefault2" />
                                    <label class="form-check-label" for="flexCheckDefault2">Distributor</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secondary_business" {{((in_array("Non Profit Organization",$secondary_business_array))?'checked':'')}} value="Non Profit Organization" id="flexCheckDefault3" />
                                    <label class="form-check-label" for="flexCheckDefault3">Non Profit Organization</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secondary_business" {{((in_array("Association",$secondary_business_array))?'checked':'')}} value="Association" id="flexCheckDefault4" />
                                    <label class="form-check-label" for="flexCheckDefault4">Association</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secondary_business" {{((in_array("Supplier",$secondary_business_array))?'checked':'')}} value="Supplier" id="flexCheckDefault5" />
                                    <label class="form-check-label" for="flexCheckDefault5">Supplier</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secondary_business" {{((in_array("Buyer Individual",$secondary_business_array))?'checked':'')}} value="Buyer Individual" id="flexCheckDefault6" />
                                    <label class="form-check-label" for="flexCheckDefault6">Buyer Individual</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secondary_business" {{((in_array("Service Provider",$secondary_business_array))?'checked':'')}} value="Service Provider" id="flexCheckDefault7" />
                                    <label class="form-check-label" for="flexCheckDefault7">Service Provider</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secondary_business" {{((in_array("Importer",$secondary_business_array))?'checked':'')}} value="Importer" id="flexCheckDefault8" />
                                    <label class="form-check-label" for="flexCheckDefault8">Importer</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secondary_business" {{((in_array("Manufacturer",$secondary_business_array))?'checked':'')}} value="Manufacturer" id="flexCheckDefault9" />
                                    <label class="form-check-label" for="flexCheckDefault9">Manufacturer</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secondary_business" {{((in_array("Trader",$secondary_business_array))?'checked':'')}} value="Trader" id="flexCheckDefault10" />
                                    <label class="form-check-label" for="flexCheckDefault10">Trader</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secondary_business" {{((in_array("Retailer",$secondary_business_array))?'checked':'')}} value="Retailer" id="flexCheckDefault11" />
                                    <label class="form-check-label" for="flexCheckDefault11">Retailer</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secondary_business" {{((in_array("Buyer Company",$secondary_business_array))?'checked':'')}} value="Buyer Company" id="flexCheckDefault12" />
                                    <label class="form-check-label" for="flexCheckDefault12">Buyer Company</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="secondary_business" {{((in_array("Buying House",$secondary_business_array))?'checked':'')}} value="Buying House" id="flexCheckDefault13" />
                                    <label class="form-check-label" for="flexCheckDefault13">Buying House</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <span id="secondary_business_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 border-sm-bottom">
                            <label><strong>{{ translate('Business Card')}}</strong></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="col-md-12 col-form-label">{{ translate('Front View') }}</label>
                            <div class="col-md-12">
                                <div class="font-weight-medium text-center py-3" onclick="document.getElementById('business_card_front').click()" style="border:1px solid #ebedf2;"><i class="fas fa-upload fs-18 uploadcard"></i><br />{{ translate('Click to Upload') }}</div>
                                <input type="file" class="d-none" name="business_card_front" id="business_card_front" accept=".jpg,.png,.pdf">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-md-12 col-form-label">{{ translate('Back View') }}</label>
                            <div class="col-md-12">
                                <div class="font-weight-medium text-center py-3" onclick="document.getElementById('business_card_back').click()" style="border:1px solid #ebedf2;"><i class="fas fa-upload fs-18 uploadcard"></i><br />{{ translate('Click to Upload') }}</div>
                                <input type="file" class="d-none" name="business_card_back" id="business_card_back" accept=".jpg,.png,.pdf">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right mt-2">
                        <input type="hidden" name="id" value="{{$sellerData->id}}">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <button type="button" data-dismiss="modal" class="btn btn-sm btn-link border-sm">{{translate('Cancel')}}</button>&nbsp;&nbsp;
                        <button type="button" id="nature_of_business_submit_btn" class="btn btn-sm btn-dark" onclick="nature_of_business_form_submit()">{{translate('Save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- 2 step login  --}}
<div class="modal fade" id="2_step_login_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('2 Step Login') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body gry-bg px-3 pt-3">
                <form class="" id="2_step_login_modal_form" method="post">
                    @csrf
                    <div class="modal-body gry-bg px-3 pt-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label>{{ translate('Amount')}} <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" lang="en" class="form-control mb-3" name="amount" placeholder="{{ translate('Amount') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>{{ translate('Message')}}</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="message" rows="8" class="form-control mb-3"></textarea>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{translate('Send')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- delete account  --}}
<div class="modal fade" id="delete_account_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ translate('Delete Account') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body gry-bg px-3 pt-3">
                <form class="" id="delete_account_modal_form" method="post">
                    @csrf
                    <div class="modal-body gry-bg px-3 pt-3">
                        <div class="row">
                            <div class="col-md-3">
                                <label>{{ translate('Amount')}} <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" lang="en" class="form-control mb-3" name="amount" placeholder="{{ translate('Amount') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>{{ translate('Message')}}</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="message" rows="8" class="form-control mb-3"></textarea>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{translate('Send')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script type="text/javascript">
        
        function open_display_info_modal(){
            $('#display_info_modal').modal('show');
        }
        function open_pickup_address_modal(){
            $('#pickup_address_modal').modal('show');
        }
        function open_login_details_modal(){
            $('#login_details_modal').modal('show');
        }
        function open_contact_details_modal(){
            $('#contact_details_modal').modal('show');
        }
        function open_2_step_login_modal(){
            $('#2_step_login_modal').modal('show');
        }
        function open_delete_account_modal(){
            $('#delete_account_modal').modal('show');
        }
		function open_mobile_edit_modal(){
            $('#mobile_edit_modal').modal('show');
        }
		function open_email_edit_modal(){
            $('#email_edit_modal').modal('show');
        }
		function open_email_edit_modal1(){
            $('#email_edit_modal1').modal('show');
        }
		function open_bank_details_modal(){
            $('#bank_details_modal').modal('show');
        }
		function open_ldc_details_modal(){
            $('#ldc_details_modal').modal('show');
        }
		function open_business_details_modal(){
            $('#business_details_modal').modal('show');
        }
		function open_add_user_modal(){
            $('#add_user_modal').modal('show');
        }
        function open_company_details_modal(){
            $('#company_details_modal').modal('show');
        }
		function open_company_address_modal(){
            $('#company_address_modal').modal('show');
        }
		function open_nature_of_business_modal(){
            $('#nature_of_business_modal').modal('show');
        }
        function select_file(id) {
            $('#'+id).click();
        }
        function clearValidation(arr=[]) {
            if(arr.length > 0){
                for(var i=0;i<arr.length;i++){
                    $('#'+arr[i]).removeClass('error_bdr');
                    $('#'+arr[i]+'_error').html('');
                }
            }
        }
        function show_hide_proSer_cat(vendor_type) {
            if(vendor_type=='Both') {
                $('#view_seller_product_cat').removeClass('d-none');
                $('#view_seller_service_cat').removeClass('d-none');
            }else if(vendor_type=='Product'){
                $('#view_seller_product_cat').removeClass('d-none');
                $('#view_seller_service_cat').addClass('d-none');
            }else if(vendor_type=='Service'){
                $('#view_seller_product_cat').addClass('d-none');
                $('#view_seller_service_cat').removeClass('d-none');
            }else{
                $('#view_seller_product_cat').addClass('d-none');
                $('#view_seller_service_cat').addClass('d-none');
            }
        }

        function display_info_form_submit() {
            var display_name = $('#display_name').val();
            var designation = $('#designation').val();
            var description = $('#description').val();
            clearValidation(['display_name','designation','description','vendor_type_error','service_category_error','product_category_error']);
            var isValidForm = [
                {'value':description,'id':'description','error_id':'description_error','delimeter':'','msg':'Description Required.'},
                {'value':designation,'id':'designation','error_id':'designation_error','delimeter':'','msg':'Designation Required.'},
                {'value':display_name,'id':'display_name','error_id':'display_name_error','delimeter':'','msg':'Display Name Required.'},
            ];
            
            var vendor_type = $("input[name='vendor_type']:checked").val();
            var service_category = [];
            var product_category = [];
            $("input[name='service_category_ids[]']:checked").each(function(){
                service_category.push($(this).val());
            });
            $("input[name='product_category_ids[]']:checked").each(function(){
                product_category.push($(this).val());
            });

            var isValidVendorType = false;
            var isValidProductCategory = false;
            var isValidServiceCategory = false;

            if(vendor_type==undefined){ 
                isValidVendorType = true;
            }
            if((vendor_type=='Both' || vendor_type=='Service') && service_category.length == 0){
                isValidServiceCategory = true;
            }
            if((vendor_type=='Both' || vendor_type=='Product') && product_category.length == 0){
                isValidProductCategory = true; 
            }
            
            ShowError('','vendor_type_error',isValidVendorType,'Vendor Type Required.',false);
            ShowError('','service_category_error',isValidServiceCategory,'Service category required.',false);
            ShowError('','product_category_error',isValidProductCategory,'Product category required.',false);
            
            if(checkBulkEmpty(isValidForm) || isValidVendorType || isValidProductCategory || isValidServiceCategory){
                return false;
            }

            $('#display_info_submit_btn').attr('disabled',true);
            var form = document.getElementById('display_info_modal_form');
            var formData = new FormData(form);
            formData.append('vendor_type',vendor_type);
            formData.append('service_category_ids',service_category);
            formData.append('product_category_ids',product_category);
            formData.append('form_name','display_info');

            $.ajax({
                url: "{{ url('admin/sellers/updateProfileData') }}",
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    console.log("response",response);
                    if(response.status){
                        // toastr.success(response.msg);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#display_info_modal_form')[0].reset();
                        $('#display_info_modal').modal('hide');
                        window.location.reload();
                    }else{
                        $('#display_info_submit_btn').attr('disabled',false);
                        // toastr.error(response.msg);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function(response){
                    $('#display_info_submit_btn').attr('disabled',false);
                    console.log('Error:'+response);
                }
            });
        }

        function pickup_address_form_submit() {
            var address_line_1 = $('#address_line_1').val();
            var address_line_2 = $('#address_line_2').val();
            var pincode = $('#pincode').val();
            var address_city = $('#address_city').val();
            clearValidation(['address_line_1','address_line_2','pincode','address_city']);
            
            var isValidForm = [
                {'value':address_city,'id':'address_city','error_id':'address_city_error','delimeter':'','msg':'Address City Required.'},
                {'value':pincode,'id':'pincode','error_id':'pincode_error','delimeter':'','msg':'Pincode Required.'},
                {'value':address_line_2,'id':'address_line_2','error_id':'address_line_2_error','delimeter':'','msg':'Address Line 1 Required.'},
                {'value':address_line_1,'id':'address_line_1','error_id':'address_line_1_error','delimeter':'','msg':'Address Line 2 Required.'},
            ];

            if(checkBulkEmpty(isValidForm)){
                return false;
            }

            $('#pickup_address_submit_btn').attr('disabled',true);
            var form = document.getElementById('pickup_address_modal_form');
            var formData = new FormData(form);
            formData.append('form_name','pickup_address');
            
            $.ajax({
                url: "{{ url('admin/sellers/updateProfileData') }}",
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    console.log("response",response);
                    if(response.status){
                        // toastr.success(response.msg);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#pickup_address_modal_form')[0].reset();
                        $('#pickup_address_modal').modal('hide');
                        window.location.reload();
                    }else{
                        $('#pickup_address_submit_btn').attr('disabled',false);
                        // toastr.error(response.msg);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function(response){
                    $('#pickup_address_submit_btn').attr('disabled',false);
                    console.log('Error:'+response);
                }
            });
        }

        function login_details_form_submit() {
            var old_password = $('#old_password').val();
            var new_password = $('#new_password').val();
            var confirm_new_password = $('#confirm_new_password').val();
            clearValidation(['old_password','new_password','confirm_new_password']);
            
            var isValidForm = [
                {'value':confirm_new_password,'id':'confirm_new_password','error_id':'confirm_new_password_error','delimeter':'','msg':'Confirm New Password Required.'},
                {'value':new_password,'id':'new_password','error_id':'new_password_error','delimeter':'','msg':'New Password Required.'},
                // {'value':old_password,'id':'old_password','error_id':'old_password_error','delimeter':'','msg':'Old Password Required.'},
            ];

            if(checkBulkEmpty(isValidForm)){
                return false;
            }

            $('#login_details_submit_btn').attr('disabled',true);
            var form = document.getElementById('login_details_modal_form');
            var formData = new FormData(form);
            formData.append('form_name','change_password');
            
            $.ajax({
                url: "{{ url('admin/sellers/updateProfileData') }}",
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    console.log("response",response);
                    if(response.status){
                        // toastr.success(response.msg);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#login_details_modal_form')[0].reset();
                        $('#login_details_modal').modal('hide');
                        window.location.reload();
                    }else{
                        $('#login_details_submit_btn').attr('disabled',false);
                        // toastr.error(response.msg);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function(response){
                    $('#login_details_submit_btn').attr('disabled',false);
                    console.log('Error:'+response);
                }
            });
        }

        function contact_details_form_submit() {
            var your_name = $('#your_name').val();
            var mobile = $('#mobile').val();
            var email = $('#email').val();
            var landline = $('#landline').val();
            clearValidation(['your_name','mobile','email','landline']);
            
            var isValidForm = [
                {'value':landline,'id':'landline','error_id':'landline_error','delimeter':'','msg':'Landline Required.'},
                {'value':email,'id':'email','error_id':'email_error','delimeter':'','msg':'Email Required.'},
                {'value':mobile,'id':'mobile','error_id':'mobile_error','delimeter':'','msg':'Mobile Required.'},
                {'value':your_name,'id':'your_name','error_id':'your_name_error','delimeter':'','msg':'Name Required.'},
            ];

            if(checkBulkEmpty(isValidForm)){
                return false;
            }else{
                var isValidEmail = IsValidEmail('email','email_error',email,'Invalid Email.');
                var isValidMobile = IsValidMobile('mobile','mobile_error',mobile,'Invalid Mobile.');
                if(!isValidEmail || !isValidMobile){
                    return false;
                }
            }

            $('#contact_details_submit_btn').attr('disabled',true);
            var form = document.getElementById('contact_details_modal_form');
            var formData = new FormData(form);
            formData.append('form_name','contact_details');
            
            $.ajax({
                url: "{{ url('admin/sellers/updateProfileData') }}",
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    console.log("response",response);
                    if(response.status){
                        // toastr.success(response.msg);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#contact_details_modal_form')[0].reset();
                        $('#contact_details_modal').modal('hide');
                        window.location.reload();
                    }else{
                        $('#contact_details_submit_btn').attr('disabled',false);
                        // toastr.error(response.msg);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function(response){
                    $('#contact_details_submit_btn').attr('disabled',false);
                    console.log('Error:'+response);
                }
            });
        }

        function bank_details_form_submit() {
            var bank_acc_name = $('#bank_acc_name').val();
            var bank_acc_no = $('#bank_acc_no').val();
            var bank_ifsc = $('#bank_ifsc').val();
            var bank_name = $('#bank_name').val();
            var bank_state = $('#bank_state').val();
            var bank_city = $('#bank_city').val();
            var bank_branch = $('#bank_branch').val();
            clearValidation(['bank_acc_name','bank_acc_no','bank_ifsc','bank_name','bank_state','bank_city','bank_branch']);
            
            var isValidForm = [
                {'value':bank_acc_name,'id':'bank_acc_name','error_id':'bank_acc_name_error','delimeter':'','msg':'Account Holder Name Required.'},
                {'value':bank_acc_no,'id':'bank_acc_no','error_id':'bank_acc_no_error','delimeter':'','msg':'Account No. Required.'},
                {'value':bank_ifsc,'id':'bank_ifsc','error_id':'bank_ifsc_error','delimeter':'','msg':'IFSC Code Required.'},
                {'value':bank_name,'id':'bank_name','error_id':'bank_name_error','delimeter':'','msg':'Bank Name Required.'},
                {'value':bank_state,'id':'bank_state','error_id':'bank_state_error','delimeter':'','msg':'State Required.'},
                {'value':bank_city,'id':'bank_city','error_id':'bank_city_error','delimeter':'','msg':'City Required.'},
                {'value':bank_branch,'id':'bank_branch','error_id':'bank_branch_error','delimeter':'','msg':'Branch Required.'},
            ];

            if(checkBulkEmpty(isValidForm)){
                return false;
            }

            $('#bank_details_submit_btn').attr('disabled',true);
            var form = document.getElementById('bank_details_modal_form');
            var formData = new FormData(form);
            formData.append('form_name','bank_details');
            
            $.ajax({
                url: "{{ url('admin/sellers/updateProfileData') }}",
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    console.log("response",response);
                    if(response.status){
                        // toastr.success(response.msg);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#bank_details_modal_form')[0].reset();
                        $('#bank_details_modal').modal('hide');
                        window.location.reload();
                    }else{
                        $('#bank_details_submit_btn').attr('disabled',false);
                        // toastr.error(response.msg);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function(response){
                    $('#bank_details_submit_btn').attr('disabled',false);
                    console.log('Error:'+response);
                }
            });
        }
        
        function ldc_details_form_submit() {
            var ldc_certificate_no = $('#ldc_certificate_no').val();
            var ldc_lower_tax_rate = $('#ldc_lower_tax_rate').val();
            var ldc_validity = $('#ldc_validity').val();
            var ldc_amount = $('#ldc_amount').val();
            var ldc_document = $('#ldc_document')[0].files;
            var old_ldc_document = $('#old_ldc_document').val();
            clearValidation(['ldc_certificate_no','ldc_lower_tax_rate','ldc_validity','ldc_amount','ldc_document']);
            
            var isValidForm = [
                {'value':ldc_amount,'id':'ldc_amount','error_id':'ldc_amount_error','delimeter':'','msg':'Amount Required.'},
                {'value':ldc_validity,'id':'ldc_validity','error_id':'ldc_validity_error','delimeter':'','msg':'Validity Required.'},
                {'value':ldc_lower_tax_rate,'id':'ldc_lower_tax_rate','error_id':'ldc_lower_tax_rate_error','delimeter':'','msg':'Loer Tax Rate Required.'},
                {'value':ldc_certificate_no,'id':'ldc_certificate_no','error_id':'ldc_certificate_no_error','delimeter':'','msg':'Certificate No. Required.'},
            ];

            if(checkBulkEmpty(isValidForm)){
                return false;
            }else{
                if($('#ldc_document')[0].files.length==0 && old_ldc_document==''){
                    return false;
                    $('#ldc_document_error').text('Document required!');
                }else{
                    $('#ldc_document_error').text('');
                }
            }

            $('#ldc_details_submit_btn').attr('disabled',true);
            var form = document.getElementById('ldc_details_modal_form');
            var formData = new FormData(form);
            formData.append('document',ldc_document);
            formData.append('form_name','ldc_details');
            
            $.ajax({
                url: "{{ url('admin/sellers/updateProfileData') }}",
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    console.log("response",response);
                    if(response.status){
                        // toastr.success(response.msg);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#ldc_details_modal_form')[0].reset();
                        $('#ldc_details_modal').modal('hide');
                        window.location.reload();
                    }else{
                        $('#ldc_details_submit_btn').attr('disabled',false);
                        // toastr.error(response.msg);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function(response){
                    $('#ldc_details_submit_btn').attr('disabled',false);
                    console.log('Error:'+response);
                }
            });
        }

        function business_details_form_submit() {
            var business_name = $('#business_name').val();
            var gst_no = $('#gst_no').val();
            var tan_no = $('#tan_no').val();
            var signature = $('#signature').val();
            var business_type = $('#business_type').val();
            var personal_pan = $('#personal_pan').val();
            var business_pan = $('#business_pan').val();
            var address_proof = $('#address_proof').val();
            var address_line1 = $('#business_address_line1').val();
            var address_line2 = $('#business_address_line2').val();
            var business_pincode = $('#business_pincode').val();
            var is_tan_checked = 0;
            if($('input[name=tan_checkbox]').is(':checked')){
                is_tan_checked = 1;
            }
            
            var is_sapa_checked = 0;
            if($('input[name=same_as_pickup_address]').is(':checked')){
                is_sapa_checked = 1;
                $('#business_address_line1').val('{{$sellerData->pickup_address_line1}}');
                $('#business_address_line2').val('{{$sellerData->pickup_address_line2}}');
                $('#business_city').val('{{$sellerData->pickup_address_city}}');
                $('#business_pincode').val('{{$sellerData->pickup_pincode}}');
            }else{
                $('#business_address_line1').val('{{$sellerData->address_line1}}');
                $('#business_address_line2').val('{{$sellerData->address_line2}}');
                $('#business_city').val('{{$sellerData->city}}');
                $('#business_pincode').val('{{$sellerData->pincode}}');
            }
            var signature_document = $('#signature_document')[0].files;
            var old_signature_document = $('#old_signature_document').val();
            var tan_document = $('#tan_document')[0].files;
            var old_tan_document = $('#old_tan_document').val();
            var address_proof_document = $('#address_proof_document')[0].files;
            var old_address_proof_document = $('#old_address_proof_document').val();
            clearValidation(['business_name','gst_no','tan_no','signature','signature_document']);
            
            var isValidForm = [
                {'value':address_line2,'id':'business_address_line2','error_id':'business_address_line2_error','delimeter':'','msg':'Address Line 2 Required.'},
                {'value':address_line1,'id':'business_address_line1','error_id':'business_address_line1_error','delimeter':'','msg':'Address Line 1 Required.'},
                {'value':address_proof,'id':'address_proof','error_id':'address_proof_error','delimeter':'','msg':'Address Proof Required.'},
                {'value':business_pan,'id':'business_pan','error_id':'business_pan_error','delimeter':'','msg':'Business PAN Required.'},
                {'value':personal_pan,'id':'personal_pan','error_id':'personal_pan_error','delimeter':'','msg':'Personal PAN Required.'},
                {'value':business_type,'id':'business_type','error_id':'business_type_error','delimeter':'','msg':'Business Type Required.'},
                {'value':business_pincode,'id':'business_pincode','error_id':'business_pincode_error','delimeter':'','msg':'Pincode Required.'},
                {'value':signature,'id':'signature','error_id':'signature_error','delimeter':'','msg':'Signature Required.'},
                {'value':tan_no,'id':'tan_no','error_id':'tan_no_error','delimeter':'','msg':'TAN Required.'},
                {'value':gst_no,'id':'gst_no','error_id':'gst_no_error','delimeter':'','msg':'GSTIN Required.'},
                {'value':business_name,'id':'business_name','error_id':'business_name_error','delimeter':'','msg':'Business Name Required.'},
            ];

            if(checkBulkEmpty(isValidForm)){
                return false;
            }

            // if($('#signature_document')[0].files.length==0 && old_signature_document==''){
            //     // toastr.error('Signature Document required!');
            //     Swal.fire({
            //         icon: 'error',
            //         title: 'Error',
            //         text: 'Signature Document required!',
            //         showConfirmButton: false,
            //         timer: 1500
            //     });
            //     return false;
            // }

            // if($('#tan_document')[0].files.length==0 && old_tan_document==''){
            //     // toastr.error('TAN Document required!');
            //     Swal.fire({
            //         icon: 'error',
            //         title: 'Error',
            //         text: 'TAN Document required!',
            //         showConfirmButton: false,
            //         timer: 1500
            //     });
            //     return false;
            // }

            // if($('#address_proof_document')[0].files.length==0 && old_address_proof_document==''){
            //     // toastr.error('Address Proof Document required!');
            //     Swal.fire({
            //         icon: 'error',
            //         title: 'Error',
            //         text: 'Address Proof Document required!',
            //         showConfirmButton: false,
            //         timer: 1500
            //     });
            //     return false;
            // }

            $('#business_details_submit_btn').attr('disabled',true);
            var form = document.getElementById('business_details_modal_form');
            var formData = new FormData(form);
            formData.append('signature_document',signature_document);
            formData.append('tan_document',tan_document);
            formData.append('address_proof_document',address_proof_document);
            formData.append('form_name','business_details');
            
            $.ajax({
                url: "{{ url('admin/sellers/updateProfileData') }}",
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    console.log("response",response);
                    if(response.status){
                        // toastr.success(response.msg);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#business_details_modal_form')[0].reset();
                        $('#business_details_modal').modal('hide');
                        window.location.reload();
                    }else{
                        $('#business_details_submit_btn').attr('disabled',false);
                        // toastr.error(response.msg);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function(response){
                    $('#business_details_submit_btn').attr('disabled',false);
                    console.log('Error:'+response);
                }
            });
        }

        function company_details_form_submit() {
            var company_name = $('#company_name').val();
            var year_of_estb = $('#year_of_estb').val();
            var ceo_name = $('#ceo_name').val();
            var website_url = $('#website_url').val();
            var google = $('#google').val();
            var facebook = $('#facebook').val();
            var instagram = $('#instagram').val();
            var company_logo = $('#company_logo')[0].files;
            var old_company_logo = $('#old_company_logo').val();
            var profile_icon = $('#profile_icon')[0].files;
            var old_profile_icon = $('#old_profile_icon').val();
            
            clearValidation(['company_name','year_of_estb','ceo_name','website_url','google','facebook','instagram','company_logo']);
            
            var isValidForm = [
                {'value':instagram,'id':'instagram','error_id':'instagram_error','delimeter':'','msg':'Instagram Business Required.'},
                {'value':facebook,'id':'facebook','error_id':'facebook_error','delimeter':'','msg':'Facebook Business Required.'},
                {'value':google,'id':'google','error_id':'google_error','delimeter':'','msg':'Google Business Required.'},
                {'value':website_url,'id':'website_url','error_id':'website_url_error','delimeter':'','msg':'Website URL Required.'},
                {'value':ceo_name,'id':'ceo_name','error_id':'ceo_name_error','delimeter':'','msg':'CEO Name Required.'},
                {'value':year_of_estb,'id':'year_of_estb','error_id':'year_of_estb_error','delimeter':'','msg':'Year Of Established Required.'},
                {'value':company_name,'id':'company_name','error_id':'company_name_error','delimeter':'','msg':'Company Name Required.'},
            ];

            if(checkBulkEmpty(isValidForm)){
                return false;
            }
            if($('#company_logo')[0].files.length==0 && old_company_logo==''){
                return false;
                toastr.error('Company Logo required!');
            }
            if($('#profile_icon')[0].files.length==0 && old_profile_icon==''){
                return false;
                toastr.error('Profile Image required!');
            }

            $('#company_details_submit_btn').attr('disabled',true);
            var form = document.getElementById('company_details_modal_form');
            var formData = new FormData(form);
            formData.append('company_logo',company_logo);
            formData.append('profile_icon',profile_icon);
            formData.append('form_name','company_details');
            
            $.ajax({
                url: "{{ url('admin/sellers/updateProfileData') }}",
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    console.log("response",response);
                    if(response.status){
                        // toastr.success(response.msg);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#company_details_modal_form')[0].reset();
                        $('#company_details_modal').modal('hide');
                        window.location.reload();
                    }else{
                        $('#company_details_submit_btn').attr('disabled',false);
                        // toastr.error(response.msg);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function(response){
                    $('#company_details_submit_btn').attr('disabled',false);
                    console.log('Error:'+response);
                }
            });
        }

        function company_address_form_submit() {
            var floor = $('#floor').val();
            var area = $('#area').val();
            var city = $('#city').val();
            var state = $('#state').val();
            var country = $('#country').val();
            var pincode = $('#pincode').val();
            var locality = $('#locality').val();
            var landmark = $('#landmark').val();
            
            clearValidation(['floor','area','city','state','country','pincode','locality','landmark']);
            
            var isValidForm = [
                {'value':landmark,'id':'landmark','error_id':'landmark_error','delimeter':'','msg':'Landmark Required.'},
                {'value':locality,'id':'locality','error_id':'locality_error','delimeter':'','msg':'Locality Required.'},
                {'value':pincode,'id':'pincode','error_id':'pincode_error','delimeter':'','msg':'Pincode Required.'},
                {'value':country,'id':'country','error_id':'country_error','delimeter':'','msg':'Country Required.'},
                {'value':state,'id':'state','error_id':'state_error','delimeter':'','msg':'State Required.'},
                {'value':city,'id':'city','error_id':'city_error','delimeter':'','msg':'City Required.'},
                {'value':area,'id':'area','error_id':'area_error','delimeter':'','msg':'Area/Street Required.'},
                {'value':floor,'id':'floor','error_id':'floor_error','delimeter':'','msg':'Bid. No./Floor Required.'},
            ];

            if(checkBulkEmpty(isValidForm)){
                return false;
            }

            $('#company_address_submit_btn').attr('disabled',true);
            var form = document.getElementById('company_address_modal_form');
            var formData = new FormData(form);
            formData.append('form_name','company_address');
            
            $.ajax({
                url: "{{ url('admin/sellers/updateProfileData') }}",
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    console.log("response",response);
                    if(response.status){
                        // toastr.success(response.msg);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#company_address_modal_form')[0].reset();
                        $('#company_address_modal').modal('hide');
                        window.location.reload();
                    }else{
                        $('#company_address_submit_btn').attr('disabled',false);
                        // toastr.error(response.msg);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function(response){
                    $('#company_address_submit_btn').attr('disabled',false);
                    console.log('Error:'+response);
                }
            });
        }

        function nature_of_business_form_submit() {
            var primary_business_type = $('#primary_business_type').val();
            var ownership_type = $('#ownership_type').val();
            var no_of_employee = $('#no_of_employee').val();
            var annual_turnover = $('#annual_turnover').val();
            var business_card_front = $('#business_card_front')[0].files;
            var old_business_card_front = $('#old_business_card_front').val();
            var business_card_back = $('#business_card_back')[0].files;
            var old_business_card_back = $('#old_business_card_back').val();
            let secondary_business_arr = [];
            let checkbox_arr = $("input[name='secondary_business']:checked").val();
            
            if(checkbox_arr!=undefined){
                $("input:checkbox[name='secondary_business']:checked").each(function(){    
                    secondary_business_arr.push($(this).val());    		
                });
            }

            let secondary_business = secondary_business_arr.join(',');
            
            clearValidation(['primary_business_type','ownership_type','no_of_employee','annual_turnover','business_card_front','business_card_back']);
            
            var isValidForm = [
                {'value':annual_turnover,'id':'annual_turnover','error_id':'annual_turnover_error','delimeter':'','msg':'Annual Turnover Required.'},
                {'value':no_of_employee,'id':'no_of_employee','error_id':'no_of_employee_error','delimeter':'','msg':'No of Employee Required.'},
                {'value':ownership_type,'id':'ownership_type','error_id':'ownership_type_error','delimeter':'','msg':'Ownership Type Required.'},
                {'value':primary_business_type,'id':'primary_business_type','error_id':'primary_business_type_error','delimeter':'','msg':'Primary Business Type Required.'},
            ];

            if(checkBulkEmpty(isValidForm)){
                return false;
            }else{
                if($('#business_card_front')[0].files.length==0 && old_business_card_front==''){
                    return false;
                    $('#business_card_front_error').text('Business Card Front required!');
                }else{
                    $('#business_card_front_error').text('');
                }
                if($('#business_card_back')[0].files.length==0 && old_business_card_back==''){
                    return false;
                    $('#business_card_back_error').text('Business Card Back required!');
                }else{
                    $('#business_card_back_error').text('');
                }
                if(secondary_business_arr.length==0){
                    return false;
                    $('#secondary_business_error').text('Secondary Business required!');
                }else{
                    $('#secondary_business_error').text('');
                }
            }

            $('#nature_of_business_submit_btn').attr('disabled',true);
            var form = document.getElementById('nature_of_business_modal_form');
            var formData = new FormData(form);
            formData.set('secondary_business',secondary_business);
            formData.append('business_card_front',business_card_front);
            formData.append('business_card_back',business_card_back);
            formData.append('form_name','nature_of_business');
            
            $.ajax({
                url: "{{ url('admin/sellers/updateProfileData') }}",
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    console.log("response",response);
                    if(response.status){
                        // toastr.success(response.msg);
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#nature_of_business_modal_form')[0].reset();
                        $('#nature_of_business_modal').modal('hide');
                        window.location.reload();
                    }else{
                        $('#nature_of_business_submit_btn').attr('disabled',false);
                        // toastr.error(response.msg);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function(response){
                    $('#nature_of_business_submit_btn').attr('disabled',false);
                    console.log('Error:'+response);
                }
            });
        }
		
        
    </script>

    @if (get_setting('google_map') == 1)
        
        @include('frontend.partials.google_map')
        
    @endif
@endsection
