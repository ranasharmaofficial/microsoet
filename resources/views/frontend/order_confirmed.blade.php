@extends('frontend.master')

@section('content')
   
    
    <section class="py-4">
        <div class="container text-left">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    @php
                        $first_order = $combined_order->orders->first()
                    @endphp
                    <div class="text-center py-4 mb-4">
                        <i class="la la-check-circle la-3x text-white mb-3"></i>
                        <h1 class="h3 mb-3 fw-600 text-white">{{ translate('Thank You for Your Order!')}}</h1>
							{{--<p class="opacity-70 font-italic">{{  translate('A copy or your order summary has been sent to') }} {{ json_decode($first_order->shipping_address)->email }}</p>--}}
                    </div>
                    <div class="mb-4 bg-white p-4 rounded shadow-sm">
                        <h5 class="fw-600 mb-3 fs-17 pb-2">{{ translate('Order Summary')}}</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table">
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Order date')}}:</td>
                                        <td>{{ date('d-m-Y H:i A', $first_order->date) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Name')}}:</td>
                                        <td>{{ json_decode($first_order->shipping_address)->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Email')}}:</td>
                                        <td>{{ json_decode($first_order->shipping_address)->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Shipping address')}}:</td>
                                        <td>{{ json_decode($first_order->shipping_address)->address }}, {{ json_decode($first_order->shipping_address)->city }}, India</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-6">
                                <table class="table">
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Order status')}}:</td>
                                        <td>{{ translate(ucfirst(str_replace('_', ' ', $first_order->delivery_status))) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Total order amount')}}:</td>
                                        <td>{{ single_price($combined_order->grand_total) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Shipping')}}:</td>
                                        <td>{{ $combined_order->delivery_charge }}</td>
                                    </tr>
                                    <tr>
                                        <td class="w-50 fw-600">{{ translate('Payment method')}}:</td>
                                        <td>{{ translate(ucfirst(str_replace('_', ' ', $first_order->payment_type))) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
		
		@php
		
		//	dd($combined_order);
			
		@endphp
                     
                        <div class="card shadow-sm border-0 rounded">
                            <div class="card-body">
                                <div class="text-center py-4 mb-4">
                                    <h2 class="h5">{{ translate('Order Code:')}} <span class="fw-700 text-primary">{{ $combined_order->order_number }}</span></h2>
                                </div>
                                <div>
                                    <h5 class="fw-600 mb-3 fs-17 pb-2">{{ translate('Order Details')}}</h5>
                                    <div>
                                        <table class="table table-responsive-md">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th width="30%">{{ translate('Product')}}</th>
                                                    <th>{{ translate('Quantity')}}</th>
                                                    <th class="text-right">{{ translate('Price')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order_details as $key => $orderDetail)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>
                                                            @if ($orderDetail->product != null)
                                                                <a href="{{ route('product', $orderDetail->product->slug) }}" target="_blank" class="text-reset">
                                                                    {{ $orderDetail->product->getTranslation('name') }}
                                                                    @php
                                                                        if($orderDetail->combo_id != null) {
                                                                            $combo = \App\ComboProduct::findOrFail($orderDetail->combo_id);

                                                                            echo '('.$combo->combo_title.')';
                                                                        }
                                                                    @endphp
                                                                </a>
                                                            @else
                                                                <strong>{{  translate('Product Unavailable') }}</strong>
                                                            @endif
                                                        </td>
                                                       
                                                        <td>
                                                            {{ $orderDetail->quantity }}
                                                        </td>
                                                        
                                                        <td class="text-right">{{ single_price($orderDetail->price) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                                    <div class="row">
                                        <div class="d-flex justify-content-end">
                                            <table class="table table-cus w-50" style="background: #f1f1f1">
                                            <style>
                                                    .table-cus{
                                                        background: #f1f1f1 !important;
                                                    }
                                                    .table-cus td{
                                                        background: #f1f1f1 !important;
                                                    }
                                                    .table-cus th{
                                                        width: 130px !important;
                                                    }
                                            </style>
                                                <tbody>
                                                    <tr>
                                                        <th>{{ translate('Subtotal')}}</th>
                                                        <td class="text-right">
                                                            <span class="fw-600">{{ single_price($combined_order->grand_total) }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>{{ translate('Shipping')}}</th>
                                                        <td class="text-right">
                                                            <span class="font-italic">{{ single_price($combined_order->delivery_charge) }}</span>
                                                        </td>
                                                    </tr>
                                                    @if(false)<tr>
                                                        <th>{{ translate('Tax')}}</th>
                                                        <td class="text-right">
                                                            <span class="font-italic">{{ single_price($order->orderDetails->sum('tax')) }}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>{{ translate('Coupon Discount')}}</th>
                                                        <td class="text-right">
                                                            <span class="font-italic">{{ single_price($order->coupon_discount) }}</span>
                                                        </td>
                                                    </tr>@endif
                                                    <tr>
                                                        <th><span class="fw-600">{{ translate('Total')}}</span></th>
                                                        <td class="text-right">
                                                            <strong><span>{{ single_price($combined_order->grand_total+$combined_order->delivery_charge) }}</span></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                     
                                    
                    <div class="row">
                        <div class="col-md-6"> <div class="butn mb-5 mt-3"> <a href="{{url('/')}}" class="float-right btn btn-primary">Go to Home</a></div></div>
                        <div class="col-md-6">  <div class="butn mb-5 mt-3"><a href="{{url('purchase_history')}}" class="btn btn-success">Go to Order</a> </div></div>
                    </div>
                                                

                </div>
            </div>
        </div>
    </section>
@endsection
