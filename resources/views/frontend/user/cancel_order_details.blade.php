@extends('frontend.layouts.user_panel')

@section('panel_content')
 <div class=" w-100 mb-1 mys_accounts">
                    <div class="bootstrap-accordiana">
                        <div class="backtabs-dp_servicespros2 backtabs-dp ">

						    <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">
                                    Cancel Your Order
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

                                <ul class="ulines-dps justify-content-start d-none">
                                    <li class="ukine ukine1b active4"><a href="javascript:void(0);">
                                    All Orders
                                    </a>
									
									</li>
                                     
                                    </li>
                                </ul>

                                <div class="hotel-form py-4 shadow-none">
                                    <ul class="ulines-dps-para">
                                        <!-- All Order Start -->
                                        
                                                <li class="ukine ukine1b active4">
                                                    <div class="row border-bottom pb-2 mb-4">
                                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 ">
								<div class="orderid_holder">
									<p class="mb-0 orderSubId m-0">
										<span class="_order ">
											Order :
										</span>
										<a href="javascript:void(0);" class="ms-1 customer_id">
										    {{ $orders->code }}
										</a>
									</p>
									<p class="mb-0 orderSubId m-0">
										<span class="_order ">
											Product Name :
										</span>
										<a href="javascript:void(0);" class="ms-1 customer_id">
										    {{ $product_name->name }}
										</a>
									</p>
									<p class="mb-0 orderSubId m-0">
										<span class="_order ">
											Order :
										</span>
										<a href="javascript:void(0);" class="ms-1 customer_id">
										    {{ date('D', $orders->date) }}, {{ date('d M Y', $orders->date) }}
										</a>
									</p>
									
									<p class="Order_Detail m-0">
										<br /><b>Cancellation Reason :</b>
									</p>
									
								</div>
								
								<form class="js-validate row" method="post" action="{{ route('cancel_product_order') }}" novalidate="novalidate">
									@csrf
									<div class="js-form-message form-group col-md-12 mb-3">  
									<ul class="list-unstyled">
										
											<li class="m-3 mt-2 mb-2 w-100">
												<label for="office">
													<input id="office" class="input-radio" type="radio" value="Order Created by Mistake" name="cancellation_reason">
													<span>Order Created by Mistake</span>
												</label> 
											</li>
											<li class="m-3 mt-2 mb-2 w-100">
												<label for="Home">
													<input type="radio" value="Item(s) Would Not Arrive on Time" name="cancellation_reason" class="input-radio" id="Home">
													<span>Item(s) Would Not Arrive on Time</span>
												</label> 
											</li>
											<li class="m-3 mt-0 mb-2 w-100">
												<label for="other">
													<input type="radio" value="Shipping Cost Too High" name="cancellation_reason" class="input-radio" id="other">
													<span>Shipping Cost Too High</span>
												</label> 
											</li>
											<li class="m-3 mt-0 mb-2 w-100">
												<label for="other1">
													<input type="radio" value="Item price too high" name="cancellation_reason" class="input-radio" id="other1">
													<span>Item price too high</span>
												</label> 
											</li>
											<li class="m-3 mt-0 mb-2 w-100">
												<label for="other2">
													<input type="radio" value="Found Cheaper Somewhere Else" name="cancellation_reason" class="input-radio" id="other2">
													<span>Found Cheaper Somewhere Else</span>
												</label> 
											</li>
											<li class="m-3 mt-0 mb-2 w-100">
												<label for="other3">
													<input type="radio" value="Need to Change Shipping Address" name="cancellation_reason" class="input-radio" id="other3">
													<span>Need to Change Shipping Address</span>
												</label> 
											</li>
											<li class="m-3 mt-0 mb-2 w-100">
												<label for="other3">
													<input type="radio" value="Need to Change Billing Address" name="cancellation_reason" class="input-radio" id="other3">
													<span>Need to Change Billing Address</span>
												</label> 
											</li>
											<li class="m-3 mt-0 mb-2 w-100">
												<label for="other3">
													<input type="radio" value="Need to Change Payment Method" name="cancellation_reason" class="input-radio" id="other3">
													<span>Need to Change Payment Method</span>
												</label> 
											</li>
											<li class="m-3 mt-0 mb-2 w-100">
												<label for="other3">
													<input type="radio" value="Other Reason" name="cancellation_reason" class="input-radio" id="other3">
													<span>Other Reason</span>
												</label> 
											</li>
										</ul>
									</div>
									<input type="hidden" value="{{ $order_details->product_id }}" name="product_id" id="product_id">
									<input type="hidden" value="{{ $orders->user_id }}"name="user_id" id="user_id">
									<input type="hidden" value="{{ $order_details->order_id }}" name="order_id" id="order_id">
			                        <div class="mb-600 d-flex w-50">
										<div class="mb-3 w-50 mx-3">
                                            <button type="submit" class="btn edit-address1_1 btn-primary-dark-w px-5 w-auto">Submit</button>
                                        </div>
									</div>
								</form>
							</div>
							
                                                    </div>

 

                                                </li>
                                           
                                         
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
