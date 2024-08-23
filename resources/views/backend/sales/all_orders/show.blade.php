@extends('backend.layouts.app')

@section('content')

<div class="card style_sinters">
    <div class="card-header">
        <h1 class="h2 fs-16 mb-0">{{ translate('Order Details') }}</h1>
    </div>
    <div class="card-body">
        <div class="row gutters-5">
            <div class="col text-center text-md-left">
            </div>
            @php
                $delivery_status = $order_table->delivery_status;
                $payment_status = $order_table->payment_status;
            @endphp
					@php
						$combined_order = \App\Models\CombinedOrder::where('id', $order->combined_order_id)->first();
					@endphp
            <!--Assign Delivery Boy-->
            @if (addon_is_activated('delivery_boy'))
                <div class="col-md-3 ml-auto">
                    <label for="assign_deliver_boy">{{translate('Assign Deliver Boy')}}</label>
                    @if($delivery_status == 'pending' || $delivery_status == 'confirmed' || $delivery_status == 'picked_up')
                    <select class="form-control aiz-selectpicker" data-live-search="true" data-minimum-results-for-search="Infinity" id="assign_deliver_boy">
                        <option value="">{{translate('Select Delivery Boy')}}</option>
                        @foreach($delivery_boys as $delivery_boy)
                        <option value="{{ $delivery_boy->id }}" @if($order->assign_delivery_boy == $delivery_boy->id) selected @endif>
                            {{ $delivery_boy->name }}
                        </option>
                        @endforeach
                    </select>
                    @else
                        <input type="text" class="form-control" value="{{ optional($order->delivery_boy)->name }}" disabled>
                    @endif
                </div>
            @endif

            <div class="col-md-3 ml-auto">
                <label for="update_payment_status">{{translate('Payment Status')}}</label>
                <select class="form-control aiz-selectpicker"  data-minimum-results-for-search="Infinity" id="update_payment_status">
                    <option value="unpaid" @if ($payment_status == 'unpaid') selected @endif>{{translate('Unpaid')}}</option>
                    <option value="paid" @if ($payment_status == 'paid') selected @endif>{{translate('Paid')}}</option>
                </select>
            </div>
            <div class="col-md-3 ml-auto">
                <label for="update_delivery_status">{{translate('Delivery Status')}}</label>
                @if($delivery_status != 'delivered' && $delivery_status != 'cancelled')
                    <select class="form-control aiz-selectpicker"  data-minimum-results-for-search="Infinity" id="update_delivery_status">
                        <option value="pending" @if ($delivery_status == 'pending') selected @endif>{{translate('Pending')}}</option>
                        <option value="confirmed" @if ($delivery_status == 'confirmed') selected @endif>{{translate('Confirmed')}}</option>
                        <option value="picked_up" @if ($delivery_status == 'picked_up') selected @endif>{{translate('Picked Up')}}</option>
                        <option value="on_the_way" @if ($delivery_status == 'on_the_way') selected @endif>{{translate('On The Way')}}</option>
                        <option value="delivered" @if ($delivery_status == 'delivered') selected @endif>{{translate('Delivered')}}</option>
                        <option value="cancelled" @if ($delivery_status == 'cancelled') selected @endif>{{translate('Cancel')}}</option>
                        <option value="return_request" @if ($delivery_status == 'return_request') selected @endif>{{translate('Return Request')}}</option>
                        <option value="returned" @if ($delivery_status == 'returned') selected @endif>{{translate('Returned')}}</option>
                    </select>
                @else
                    <input type="text" class="form-control" value="{{ $delivery_status }}" disabled>
                @endif
            </div>
            <div class="col-md-3 ml-auto">
                <label for="update_tracking_code">{{translate('Tracking Code (optional)')}}</label>
                <input type="text" class="form-control" id="update_tracking_code" value="{{ $order_table->tracking_code }}">
            </div>
        </div>
        <div class="mb-3">
            @php
                $removedXML = '<?xml version="1.0" encoding="UTF-8"?>';
            @endphp
                            {!! str_replace($removedXML,"", QrCode::size(100)->generate($order->order_number)) !!}
        </div>
        <div class="row gutters-5">
            <div class="col text-center text-md-left">
                <address>
                    <strong class="text-main">{{ json_decode($order_table->shipping_address)->name }}</strong><br>
                    {{ json_decode($order_table->shipping_address)->phone }}<br>
                    {{ json_decode($order_table->shipping_address)->address }}, {{ json_decode($order->shipping_address)->city }}, {{ json_decode($order->shipping_address)->postal_code }}<br>
                </address>
                @if ($order_table->manual_payment && is_array(json_decode($order_table->manual_payment_data, true)))
                <br>
                <strong class="text-main">{{ translate('Payment Information') }}</strong><br>
                {{ translate('Name') }}: {{ json_decode($order_table->manual_payment_data)->name }}, {{ translate('Amount') }}: {{ single_price(json_decode($order->manual_payment_data)->amount) }}, {{ translate('TRX ID') }}: {{ json_decode($order->manual_payment_data)->trx_id }}
                <br>
                <a href="{{ uploaded_asset(json_decode($order_table->manual_payment_data)->photo) }}" target="_blank"><img src="{{ uploaded_asset(json_decode($order->manual_payment_data)->photo) }}" alt="" height="100"></a>
                @endif
            </div>
            <div class="col-md-4 ml-auto">
                <table>
                    <tbody>
                        <tr>
                            <td class="text-main text-bold">{{translate('Order #')}}</td>
                            <td class="text-right text-info text-bold">	{{ $order->code }}</td>
                        </tr>
                        <tr>
                            <td class="text-main text-bold">{{translate('Order Status')}}</td>
                            <td class="text-right">
                                @if($delivery_status == 'delivered')
                                <span class="badge badge-inline badge-success">{{ translate(ucfirst(str_replace('_', ' ', $delivery_status))) }}</span>
                                @else
                                <span class="badge badge-inline badge-info">{{ translate(ucfirst(str_replace('_', ' ', $delivery_status))) }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="text-main text-bold">{{translate('Order Date')}}	</td>
                            <td class="text-right">{{ date('d-m-Y h:i A', $order->date) }}</td>
                        </tr>
                        <tr>
                            <td class="text-main text-bold">
                                {{translate('Total amount')}}
                            </td>
                            <td class="text-right">
                                {{ single_price($order->grand_total+$order->delivery_charge) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-main text-bold">{{translate('Payment method')}}</td>
                            <td class="text-right">{{ ucfirst(str_replace('_', ' ', $order->payment_type)) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr class="new-section-sm bord-no">
        <div class="row">
            <div class="col-lg-12 table-responsive">
                <table class="table table-bordered aiz-table invoice-summary">
                    <thead>
                        <tr class="bg-trans-dark">
                            <th data-breakpoints="lg" class="min-col">#</th>
                            <th width="10%">{{translate('Photo')}}</th>
                            <th class="text-uppercase">{{translate('Description')}}</th>
                            <th data-breakpoints="lg" class="text-uppercase">{{translate('Delivery Type')}}</th>
                            <th data-breakpoints="lg" class="min-col text-center text-uppercase">{{translate('Qty')}}</th>
                            <th data-breakpoints="lg" class="min-col text-center text-uppercase">{{translate('Price')}}</th>
                            <th data-breakpoints="lg" class="min-col text-right text-uppercase">{{translate('Total')}}</th>
                            <th data-breakpoints="lg" class="min-col text-right text-uppercase">{{translate('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order__details_table as $key => $orderDetail)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                @if ($orderDetail->product != null && $orderDetail->product->auction_product == 0)
                                    <a href="{{ route('product', $orderDetail->product->slug) }}" target="_blank"><img height="50" src="{{ uploaded_asset($orderDetail->product->thumbnail_img) }}"></a>
                                @elseif ($orderDetail->product != null && $orderDetail->product->auction_product == 1)
                                    <a href="{{ route('auction-product', $orderDetail->product->slug) }}" target="_blank"><img height="50" src="{{ uploaded_asset($orderDetail->product->thumbnail_img) }}"></a>
                                @else
                                    <strong>{{ translate('N/A') }}</strong>
                                @endif
                            </td>
                            <td>
                                @if ($orderDetail->product != null && $orderDetail->product->auction_product == 0)
                                    <strong><a href="{{ route('product', $orderDetail->product->slug) }}" target="_blank" class="text-muted">{{ $orderDetail->product->getTranslation('name') }} - {{ $orderDetail->product->unit }}</a></strong>
                                    <small>{{ $orderDetail->variation }}</small>
                                @elseif ($orderDetail->product != null && $orderDetail->product->auction_product == 1)
                                    <strong><a href="{{ route('auction-product', $orderDetail->product->slug) }}" target="_blank" class="text-muted">{{ $orderDetail->product->getTranslation('name') }}</a></strong>
                                @else
                                    <strong>{{ translate('Product Unavailable') }}</strong>
                                @endif
                            </td>
                            <td>
                                @if ($orderDetail->shipping_type != null && $orderDetail->shipping_type == 'home_delivery')
                                {{ translate('Home Delivery') }}
                                @elseif ($orderDetail->shipping_type == 'pickup_point')

                                @if ($orderDetail->pickup_point != null)
                                {{ $orderDetail->pickup_point->getTranslation('name') }} ({{ translate('Pickup Point') }})
                                @else
                                {{ translate('Pickup Point') }}
                                @endif
                                @endif
                            </td>
                            <td class="text-center">{{ $orderDetail->quantity }}</td>
                            <td class="text-center">{{ single_price($orderDetail->price/$orderDetail->quantity) }}</td>
                            <td class="text-center">{{ single_price($orderDetail->price) }}</td>
                            <td class="text-center product_data">
                                
                                @if($orderDetail->delivery_status != 'delivered' && $orderDetail->delivery_status != 'cancelled' && $orderDetail->delivery_status != 'returned')
                                <form method="post" action="{{ route('orders.update_item_status') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="item_id" class="item_id" value="{{ $orderDetail->id }}">
                                    <select class="form-control"  name="update_item_status" id="update_item_status">
                                        <option value="pending" @if ($orderDetail->delivery_status == 'pending') selected @endif>{{translate('Pending')}}</option>
                                        <option value="confirmed" @if ($orderDetail->delivery_status == 'confirmed') selected @endif>{{translate('Confirmed')}}</option>
                                        <option value="picked_up" @if ($orderDetail->delivery_status == 'picked_up') selected @endif>{{translate('Picked Up')}}</option>
                                        <option value="on_the_way" @if ($orderDetail->delivery_status == 'on_the_way') selected @endif>{{translate('On The Way')}}</option>
                                        <option value="delivered" @if ($orderDetail->delivery_status == 'delivered') selected @endif>{{translate('Delivered')}}</option>
                                        <option value="cancelled" @if ($orderDetail->delivery_status == 'cancelled') selected @endif>{{translate('Cancel')}}</option>
                                        <option value="return_request" @if ($orderDetail->delivery_status == 'return_request') selected @endif>{{translate('Return Request')}}</option>
                                        <option value="returned" @if ($orderDetail->delivery_status == 'returned') selected @endif>{{translate('Returned')}}</option>
                                    </select>
                                    <button class="btn btn-info" type="submit" name="update_item">Update</button>
                                </form>
                                @else
                                    <input type="text" class="form-control" value="{{ $orderDetail->delivery_status }}" disabled>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="clearfix float-right">
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <strong class="text-muted">{{translate('Sub Total')}} :</strong>
                        </td>
                        <td>
                            {{ single_price($order->grand_total) }}
                        </td>
                    </tr>
					
                    <tr>
                        <td>
                            <strong class="text-muted">{{translate('Shipping')}} :</strong>
                        </td>
                        <td>
                            {{ single_price($order->delivery_charge) }}
                        </td>
                    </tr>
                     
                    <tr>
                        <td>
                            <strong class="text-muted">{{translate('TOTAL')}} :</strong>
                        </td>
                        <td class="text-muted h5">
                            {{ single_price($order->grand_total+$order->delivery_charge) }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="text-right no-print">
                <a style="background:orange;margin-top:3px !important;" href="{{ route('invoice.download', $order->id) }}" type="button" class="btn"><i class="las la-print"></i>&nbsp;Print</a>
            </div>
        </div>

    </div>
</div>
@endsection
<script>
    // $(document).ready(function () {
    //         $('#update_item_status').on('change', function(){
    //             var item_id = $(this).closest('.product_data').find('.item_id').val();
    //             var status = $('#update_item_status').val();
    //             alert(item_id);
    //             alert(status);
    //             $.post('{{ route('orders.update_item_status') }}', {
    //                 _token:'{{ @csrf_token() }}',
    //                 item_id:item_id,
    //                 status:status
    //             }, function(data){
    //                 AIZ.plugins.notify('success', '{{ translate('Delivery status has been updated') }}');
    //             });
    //         });
    // });

    // $(document).on('change','#update_item_status',function(){
    //     alert('Change Happened');
    // });

//     $(document.body).on('change','#update_item_status',function(){
//         alert('Change Happened');
// });
</script>
@section('script')
    <script type="text/javascript">
        
        

        $('#assign_deliver_boy').on('change', function(){
            var order_id = {{ $order->id }};
            var delivery_boy = $('#assign_deliver_boy').val();
            $.post('{{ route('orders.delivery-boy-assign') }}', {
                _token          :'{{ @csrf_token() }}',
                order_id        :order_id,
                delivery_boy    :delivery_boy
            }, function(data){
                AIZ.plugins.notify('success', '{{ translate('Delivery boy has been assigned') }}');
            });
        });

        $('#update_delivery_status').on('change', function(){
            var order_id = {{ $order->id }};
            var status = $('#update_delivery_status').val();
            $.post('{{ route('orders.update_delivery_status') }}', {
                _token:'{{ @csrf_token() }}',
                order_id:order_id,
                status:status
            }, function(data){
                AIZ.plugins.notify('success', '{{ translate('Delivery status has been updated') }}');
            });
        });
        
        $('#update_payment_status').on('change', function(){
            var order_id = {{ $order->id }};
            var status = $('#update_payment_status').val();
            $.post('{{ route('orders.update_payment_status') }}', {_token:'{{ @csrf_token() }}',order_id:order_id,status:status}, function(data){
                AIZ.plugins.notify('success', '{{ translate('Payment status has been updated') }}');
            });
        });

        $('#update_tracking_code').on('change', function(){
            var order_id = {{ $order->id }};
            var tracking_code = $('#update_tracking_code').val();
            $.post('{{ route('orders.update_tracking_code') }}', {_token:'{{ @csrf_token() }}',order_id:order_id,tracking_code:tracking_code}, function(data){
                AIZ.plugins.notify('success', '{{ translate('Order tracking code has been updated') }}');
            });
        });
    </script>
@endsection
