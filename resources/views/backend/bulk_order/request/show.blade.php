@extends('backend.layouts.app')

@section('content')

<div class="card style_sinters">
    <div class="card-header">
        <h1 class="h2 fs-16 mb-0">{{ translate('Bulk Order Request Details') }}</h1>
    </div>
    <div class="card-body">
        
        <hr class="new-section-sm bord-no">
        <div class="row">
            <div class="col-lg-12 table-responsive">
                <table class="table table-bordered aiz-table invoice-summary">
                    <thead>
                        <tr class="bg-trans-dark">
                            <th data-breakpoints="lg" class="min-col">#</th>
                            <th width="10%">{{translate('Photo')}}</th>
                            <th class="text-uppercase">{{translate('Description')}}</th>
                            <th data-breakpoints="lg" class="min-col text-center text-uppercase">{{translate('Qty')}}</th>
                            <th data-breakpoints="lg" class="min-col text-center text-uppercase">{{translate('Price')}}</th>
                            <th data-breakpoints="lg" class="min-col text-right text-uppercase">{{translate('Total')}}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($order->BulkorderDetails as $key => $orderDetail)
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
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
                                    <strong><a href="{{ route('product', $orderDetail->product->slug) }}" target="_blank" class="text-muted">{{ $orderDetail->product->getTranslation('name') }}</a></strong>
                                    <small>{{ $orderDetail->variation }}</small>
                                @elseif ($orderDetail->product != null && $orderDetail->product->auction_product == 1)
                                    <strong><a href="{{ route('auction-product', $orderDetail->product->slug) }}" target="_blank" class="text-muted">{{ $orderDetail->product->getTranslation('name') }}</a></strong>
                                @else
                                    <strong>{{ translate('Product Unavailable') }}</strong>
                                @endif
                            </td>
                           
                            <td class="text-center">{{ $orderDetail->quantity }}</td>
                            <td class="text-center">{{ single_price($orderDetail->price/$orderDetail->quantity) }}</td>
                            <td class="text-center">{{ single_price($orderDetail->price) }}</td>
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
                            {{ single_price($order->BulkorderDetails->sum('price')) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong class="text-muted">{{translate('Tax')}} :</strong>
                        </td>
                        <td>
                            {{ single_price($order->BulkorderDetails->sum('tax')) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong class="text-muted">{{translate('Shipping')}} :</strong>
                        </td>
                        <td>
                            {{ single_price($order->BulkorderDetails->sum('shipping_cost')) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong class="text-muted">{{translate('Coupon')}} :</strong>
                        </td>
                        <td>
                            {{ single_price($order->coupon_discount) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong class="text-muted">{{translate('TOTAL')}} :</strong>
                        </td>
                        <td class="text-muted h5">
                            {{ single_price($order->grand_total) }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="text-right no-print">
                <a href="{{ route('invoice.download', $order->id) }}" type="button" class="btn btn-icon btn-light"><i class="las la-print"></i></a>
            </div>
        </div>

    </div>
</div>
@endsection

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
