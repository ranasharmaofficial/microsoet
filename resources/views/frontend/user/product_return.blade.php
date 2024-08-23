@extends('frontend.layouts.user_panel')

@section('panel_content')
 <div class="shadow w-100 mb-1 mys_accounts">
                     <div class="bootstrap-accordiana">
                        <div class="backtabs-dp_servicespros2 backtabs-dp ">

						  <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">My Orders
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
                            <li class="ukine ukine1b active4"><a href="javascript:void(0);">
                            Return Request List
                            </a></li>

                             <li class="ukine ukine2b "><a href="javascript:void(0);">
                            Returned Order
                            </a>
							</li>


                           </ul>

                        <div class="hotel-form py-4 shadow-none">
                                        <ul class="ulines-dps-para">


                        @foreach ($orders as $key => $order)
                            @if (count($order->orderDetails) > 0)

                                        @if($order->count_returned_order>0)
                                            <li class="ukine ukine2b">
                                                <div class="row border-bottom pb-2 mb-4">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                                        <div class="orderid_holder">
                                                            <p class="mb-0 orderSubId m-0">
                                                                <span class="_order ">
                                                                    Returned Order :
                                                                </span>
                                                                <a href="#1" class="ms-1 customer_id">
                                                                    {{ $order->code }}
                                                                </a>
                                                            </p>
                                                            <p class="Order_Detail m-0">
                                                                <b>Order Placed on</b> {{ date('D', $order->date) }}, {{ date('d M Y', $order->date) }}
                                                            </p>
                                                            {{-- <p class="Order_Detail m-0">
                                                                <b>Order Amount :</b> {{ single_price($order->grand_total) }}
                                                            </p>
                                                             <p class="Order_Detail m-0">
                                                                <b>Delivery Status :</b> {{ translate(ucfirst(str_replace('_', ' ', $order->delivery_status))) }}
                                                                @if($order->delivery_viewed == 0)
                                                                    <span class="ml-2" style="color:green"><strong>*</strong></span>
                                                                @endif
                                                            </p> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                                        <div class="order_detail-btn">

                                                            <a href="{{url('order-details/'.$order->id)}}" class="mt-1 order_btn text-capitalize ">
                                                                Order Detail
                                                            </a>


                                                        </div>
                                                    </div>
                                                </div>
                                               @foreach ($order->returned_order_list as $key)
												<div class="row">
                                                    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
                                                        <a href="javascript:void(0)" target="_blank"
                                                            class="w-100 order_detail_img-holder border d-inline-block p-1">
                                                            @if ($key->product->thumbnail_img!=null)
                                                                <img src="{{ uploaded_asset($key->product->thumbnail_img) }}" alt=""
                                                                class="w-100">
                                                            @endif

                                                        </a>
                                                    </div>
                                                    <div class="col-lg-7 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <p class="heading_ m-0 fs-7 text-dark">
																{{$key->product->name}}
                                                                </p>
                                                                <p class="quantity_holder m-0">
                                                                    <span class="total_count text-secondary">Total:
                                                                        <span class="price_holder text-dark" id="">
                                                                            {{ single_price($key->price) }}</span>
                                                                    </span>
                                                                    <span>
                                                                        |
                                                                    </span>
                                                                    <span class="_quantity text-secondary">
                                                                        QTY:
                                                                        <span class="quantity_number text-dark " id="">
																		{{$key->quantity}}
                                                                        </span>
                                                                    </span>

                                                                </p>
                                                                {{-- <p class="delivery_full-detail text-dark fs-7 mb-0">
                                                                    Delivery expected by Sat, 18 Jun' 22
                                                                </p> --}}
                                                                <p class="order_processing m-0">
                                                                    Order : {{ translate(ucfirst(str_replace('_', ' ', $key->delivery_status))) }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs">
                                                        <div class="row align-items-center flex-column">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-3 col-xs-12">
                                                                         <p class="order_listing text-capitalize my-1">
                                                                             <a href="{{url('track-your-order?order_code='.$order->code)}}">
                                                                            <span class="icon rounded-circle py-1 px-1 d-inline-block bg-success text-center m-auto">
                                                                                    <i class="fa fa-map-marker-alt mx-2 text-white"></i>
                                                                                </span>
                                                                                <span class="txth">Track Order</span>
                                                                            </a>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-lg-12 col-sm-3">
                                                                         <p class="order_listing text-capitalize my-1">
                                                                             <a href="#">
                                                                            <span class="icon rounded-circle py-1 px-1 d-inline-block bg-primary text-center m-auto">
                                                                                    <i class="fa fa-phone mx-2 text-white"></i>
                                                                                </span>
                                                                                <span class="txth">Customer Support</span>
                                                                            </a>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-lg-12 col-sm-3">
                                                                         <p class="order_listing text-capitalize my-1">
                                                                             <a href="{{ route('invoice.download', $order->id) }}">
                                                                            <span class="icon rounded-circle py-1 px-1 d-inline-block bg-warning text-center m-auto">
                                                                                    <i class="fa-solid fa-print mx-2 text-white"></i>
                                                                                </span>
                                                                                <span class="txth">Print Order Detail</span>
                                                                            </a>
                                                                        </p>
                                                                    </div>

																@if($key->delivery_status == 'pending' && $key->payment_status == 'unpaid')
                                                                     <div class="col-lg-12 col-sm-3">
                                                                         <p class="order_listing text-capitalize my-1">
                                                                             <a href="{{url('orders/destroy/'.$key->id)}}">
                                                                            <span class="icon rounded-circle py-1 px-1 d-inline-block bg-danger text-center m-auto">
                                                                                    <i class="fa fa-times mx-2 text-white text-center"></i>
                                                                                </span>
                                                                                <span class="txth">Cancel Order</span>
                                                                            </a>
                                                                        </p>
                                                                    </div>
																@endif
                                                                 </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
													<hr>
												@endforeach

                                            </li>
                                        @endif
											 @endif
                        @endforeach


						 @foreach ($orders as $key => $order)
                            @if (count($order->orderDetails) > 0)

                                        @if($order->count_return_request>0)
                                            <li class="ukine ukine1b">
                                                <div class="row border-bottom pb-2 mb-4">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                                        <div class="orderid_holder">
                                                            <p class="mb-0 orderSubId m-0">
                                                                <span class="_order ">
                                                                    Return Request List Order :
                                                                </span>
                                                                <a href="#1" class="ms-1 customer_id">
                                                                    {{ $order->code }}
                                                                </a>
                                                            </p>
                                                            <p class="Order_Detail m-0">
                                                                <b>Order Placed on</b> {{ date('D', $order->date) }}, {{ date('d M Y', $order->date) }}
                                                            </p>
                                                            {{-- <p class="Order_Detail m-0">
                                                                <b>Order Amount :</b> {{ single_price($order->grand_total) }}
                                                            </p>
                                                             <p class="Order_Detail m-0">
                                                                <b>Delivery Status :</b> {{ translate(ucfirst(str_replace('_', ' ', $order->delivery_status))) }}
                                                                @if($order->delivery_viewed == 0)
                                                                    <span class="ml-2" style="color:green"><strong>*</strong></span>
                                                                @endif
                                                            </p> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                                                        <div class="order_detail-btn">

                                                            <a href="{{url('order-details/'.$order->id)}}" class="mt-1 order_btn text-capitalize ">
                                                                Order Detail
                                                            </a>


                                                        </div>
                                                    </div>
                                                </div>
                                               @foreach ($order->return_request_list as $key)
												<div class="row">
                                                    <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
                                                        <a href="javascript:void(0)" target="_blank"
                                                            class="w-100 order_detail_img-holder border d-inline-block p-1">
                                                            @if ($key->product->thumbnail_img!=null)
                                                                <img src="{{ uploaded_asset($key->product->thumbnail_img) }}" alt=""
                                                                class="w-100">
                                                            @endif

                                                        </a>
                                                    </div>
                                                    <div class="col-lg-7 col-md-6 col-sm-6 col-xs-6">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <p class="heading_ m-0 fs-7 text-dark">
																{{$key->product->name}}
                                                                </p>
                                                                <p class="quantity_holder m-0">
                                                                    <span class="total_count text-secondary">Total:
                                                                        <span class="price_holder text-dark" id="">
                                                                            {{ single_price($key->price) }}</span>
                                                                    </span>
                                                                    <span>
                                                                        |
                                                                    </span>
                                                                    <span class="_quantity text-secondary">
                                                                        QTY:
                                                                        <span class="quantity_number text-dark " id="">
																		{{$key->quantity}}
                                                                        </span>
                                                                    </span>

                                                                </p>
                                                                {{-- <p class="delivery_full-detail text-dark fs-7 mb-0">
                                                                    Delivery expected by Sat, 18 Jun' 22
                                                                </p> --}}
                                                                <p class="order_processing m-0">
                                                                    Order : {{ translate(ucfirst(str_replace('_', ' ', $key->delivery_status))) }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs">
                                                        <div class="row align-items-center flex-column">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-3 col-xs-12">
                                                                         <p class="order_listing text-capitalize my-1">
                                                                             <a href="{{url('track-your-order?order_code='.$order->code)}}">
                                                                            <span class="icon rounded-circle py-1 px-1 d-inline-block bg-success text-center m-auto">
                                                                                    <i class="fa fa-map-marker-alt mx-2 text-white"></i>
                                                                                </span>
                                                                                <span class="txth">Track Order</span>
                                                                            </a>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-lg-12 col-sm-3">
                                                                         <p class="order_listing text-capitalize my-1">
                                                                             <a href="#">
                                                                            <span class="icon rounded-circle py-1 px-1 d-inline-block bg-primary text-center m-auto">
                                                                                    <i class="fa fa-phone mx-2 text-white"></i>
                                                                                </span>
                                                                                <span class="txth">Customer Support</span>
                                                                            </a>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-lg-12 col-sm-3">
                                                                         <p class="order_listing text-capitalize my-1">
                                                                             <a href="{{ route('invoice.download', $order->id) }}">
                                                                            <span class="icon rounded-circle py-1 px-1 d-inline-block bg-warning text-center m-auto">
                                                                                    <i class="fa-solid fa-print mx-2 text-white"></i>
                                                                                </span>
                                                                                <span class="txth">Print Order Detail</span>
                                                                            </a>
                                                                        </p>
                                                                    </div>

																@if($key->delivery_status == 'pending' && $key->payment_status == 'unpaid')
                                                                     <div class="col-lg-12 col-sm-3">
                                                                         <p class="order_listing text-capitalize my-1">
                                                                             <a href="{{url('orders/destroy/'.$key->id)}}">
                                                                            <span class="icon rounded-circle py-1 px-1 d-inline-block bg-danger text-center m-auto">
                                                                                    <i class="fa fa-times mx-2 text-white text-center"></i>
                                                                                </span>
                                                                                <span class="txth">Cancel Order</span>
                                                                            </a>
                                                                        </p>
                                                                    </div>
																@endif
                                                                 </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
													<hr>
												@endforeach

                                            </li>
                                        @endif
											 @endif
                        @endforeach







                                        </ul>


                                    </div>
                        </div>
                     </div>
                  </div>


                  <div id="myModalreturn" class="modal fade prolidneis in" role="dialog">
            <div class="modal-dialog w-50" id="modal-dialog45">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="box-soldid1back box-soldid2">
                        </div>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        <!--<h2 style=" font-size: 22px; text-transform: uppercase;    text-align: center; font-weight: 600;"></h2> -->
                        <div class="border-bottom1 border-color-111 mt-0 mb-3">
						  <h3 class="section-title section-title__sm mb-0 pb-0 font-size-18 mt-0">Return Order</h3>
							  <div class="deals">
								 <hr class="mt-2">
							  </div>
						</div>

						<div class="row 0pb-2 mb-0">
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
								<div class="orderid_holder">
									<p class="mb-0 orderSubId m-0">
										<span class="_order ">
											Order :
										</span>
										<a href="javascript:void(0);" class="ms-1 customer_id">
										   <span id="order_code"></span>
										</a>
									</p>
									<p class="Order_Detail m-0">
										<b>Product Name</b> <span id="product_name"></span>
									</p>
									<p class="Order_Detail m-0">
										<b>Order Placed on</b> <span id="order_date"></span>
									</p>

									<p class="Order_Detail m-0">
										<br /><b>Reason :</b>
									</p>

								</div>

								<form class="js-validate row" method="post" action="{{ route('orders.sendReturnRequest') }}" novalidate="novalidate">
									@csrf
									<div class="js-form-message form-group col-md-12 mb-3">
									<ul class="list-unstyled">

											<li class="m-3 mt-2 mb-2 w-100">
												<label for="office">
													<input id="office" class="input-radio" type="radio" value="Missing Product" name="return_request_reason">
													<span>Missing Product</span>
												</label>
											</li>
											<li class="m-3 mt-2 mb-2 w-100">
												<label for="Home">
													<input type="radio" data-order_button_text="Proceed to PayPal" value="Not Original Product" name="return_request_reason" class="input-radio" id="Home">
													<span>Not Original Product</span>
												</label>
											</li>
											<li class="m-3 mt-0 mb-2 w-100">
												<label for="other">
													<input type="radio" data-order_button_text="Proceed to PayPal" value="Damage Product" name="return_request_reason" class="input-radio" id="other">
													<span>Damage Product</span>
												</label>
											</li>
											<li class="m-3 mt-0 mb-2 w-100">
												<label for="other1">
													<input type="radio" data-order_button_text="Proceed to PayPal" value="Different Product" name="return_request_reason" class="input-radio" id="other1">
													<span>Different Product</span>
												</label>
											</li>
											<li class="m-3 mt-0 mb-2 w-100">
												<label for="other2">
													<input type="radio" data-order_button_text="Proceed to PayPal" value="Product is fake, used or expired" name="return_request_reason" class="input-radio" id="other2">
													<span>Product is fake, used or expired</span>
												</label>
											</li>
											<li class="m-3 mt-0 mb-2 w-100">
												<label for="other3">
													<input type="radio" data-order_button_text="Proceed to PayPal" value="Better Price Available" name="return_request_reason" class="input-radio" id="other3">
													<span>Better Price Available</span>
												</label>
											</li>
										</ul>
									</div>
									<input type="text" name="product_id" id="product_id">
									<input type="text" name="user_order_id" id="user_id">
									<input type="text" name="order_id" id="order_id">
			                        <div class="mb-600 d-flex w-50">
										<div class="mb-3 w-50 mx-3">
                                            <button type="submit" class="btn edit-address1_1 btn-primary-dark-w px-5 w-auto">Submit</button>
                                        </div>
									</div>
								</form>
							</div>


							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
								<a id="product_image" href="javascript:void(0)" target="_blank" class="w-100 order_detail_img-holder border d-inline-block p-1">
									<!--<img id="product_image" src="" alt="" class="w-100">-->

								</a>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>

@endsection
@section('modal')
    @include('modals.delete_modal')

    <div class="modal fade" id="order_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div id="order-details-modal-body">

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="payment_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div id="payment_modal_body">

                </div>
            </div>
        </div>
    </div>
<script>
// data-toggle="modal" data-target="#myModalreturn"
	function showOrderDetails(showdetails){
		$('#myModalreturn').modal('show');
		let order_details_id = $(showdetails).attr('id');
		$('#order_details_id').html(order_details_id);
		$.ajax({
			url: '{{route('orders.getItemDetails')}}',
			type: 'post',
			data:'order_details_id='+order_details_id+'&_token={{csrf_token()}}',
			success:function(response){
				console.log(response);
				$('#product_name').html(response.product_name);
				$('#order_code').html(response.order_code);
				$('#product_id').val(response.product_id);
				$('#user_id').val(response.user_order_id);
				$('#order_id').val(response.order_id);
				// $('#product_image').src(response.product_image);
				$('#product_image').html('<img src="' + response.product_image + '" alt="" class="w-100">');
				$('#order_date').html('<span>' + response.order_date+ '</span>');
			}
		})
	}
    function confirm_modal(delete_url)
    {
        jQuery('#confirm-delete').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
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
