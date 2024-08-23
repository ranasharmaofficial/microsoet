@extends('frontend.layouts.user_panel')

@section('panel_content')
<div class=" w-100 mb-1 mys_accounts">
    <div class="bootstrap-accordiana">
        <div class="backtabs-dp_servicespros2 backtabs-dp ">

            <div class="border-bottom1 border-color-111 mt-0 mb-3">
                <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">Bulk Order History
                </h3>

            </div>
            <div class="flash-message mt-2 mb-2">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if (Session::has('alert-' . $msg))
                <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                    {{ Session::get('alert-' . $msg) }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @endforeach
                <ul class="ulines-dps justify-content-start">
                    <li class="ukine ukine1b active4">
                        <a href="{{url('purchase_history')}}">
                            Bulk Order Request
                        </a>
                    </li>
                </ul>

                <div class="hotel-form py-4 shadow-none">
                    <ul class="ulines-dps-para">
                        @foreach ($bulk_orders as $key => $order)
                        <li class="ukine ukine2b active4">
                            <div class="row border-bottom pb-2 mb-4">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                    <div class="orderid_holder">
                                        <p class="mb-0 orderSubId m-0">
                                            <span class="_order ">
                                                Order :
                                            </span>
                                            <a href="#1" class="ms-1 customer_id">
                                                {{ $order->code }}
                                            </a>
                                        </p>
                                        <p class="Order_Detail m-0">
                                            <b>Order Placed on</b>
                                            {{ date('D', $order->date) }}, {{ date('d M Y', $order->date) }}
                                        </p>
                                        <p class="Order_Detail m-0">
                                            <b>Order Amount :</b> {{ single_price($order->grand_total) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                    <div class="order_detail-btn">
                                        <a href="{{url('bulk-order-details/'.$order->id)}}"
                                            class="mt-1 order_btn text-capitalize ">
                                            Order Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                {!! $bulk_orders->links() !!}
            </div>
        </div>
    </div>

    @endsection
    @section('modal')
    @include('modals.delete_modal')
    <div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div id="order-details-modal-body">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="payment_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div id="payment_modal_body">

                </div>
            </div>
        </div>
    </div>
    <script>
        function confirm_modal(delete_url) {
            jQuery('#confirm-delete').modal('show', { backdrop: 'static' });
            document.getElementById('delete_link').setAttribute('href', delete_url);
        }
    </script>
    @endsection

    @section('script')
    <script type="text/javascript">
        $('#order_details').on('hidden.bs.modal', function () {
            location.reload();
        })
    </script>

    @endsection