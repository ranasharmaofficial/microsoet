@extends('frontend.layouts.user_panel')

@section('panel_content')
 <div class="shadow w-100 mb-1 mys_accounts">
                     <div class="bootstrap-accordiana">
                        <div class="backtabs-dp_servicespros2 backtabs-dp ">

						  <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">Help & Support </h3>

                            </div>


                        <div class="hotel-form py-4 pt-0 shadow-none">
						  <ul class="ulines-dps-para">
                              <li class="ukine active4">
							  <div class="d-flex position-relative justify-content-center">
                            <div class="hotel-form py-4 px-4 mb-3 mt-1 align-center background-white shadow-none w-50 pt-2 border">
                            <div class="px-2">
                                    <div class="user_location mt-1 pb-3">
                                        <span class="userf-name">
                                          <img src="{{static_asset('assets_web/img/online-shopping.png')}}" alt="">
                                        </span>
                                    </div>


                                    <div class="user_email mt-1 pb-3">
                                        <span class="user-email">
                                          Track order, cancel order and email ShopClues Bazaar support
                                        </span>
                                    </div>
                                   <div class="user_email edit-address mt-1">
								   <a href="{{url('purchase_history')}}" class="edit-address1 btn btn-primary-dark-w px-5 w-50 ctxtwhite">My Order</a>

                                    </div>
                                    </div>






                        </div>
						<div class="hotel-form py-4 px-4 mx-2 mb-3 mt-1 align-center background-white shadow-none w-50 pt-2 border">
                            <div class="px-2">
                                    <div class="user_location mt-1 pb-3">
                                        <span class="userf-name">
                                          <img src="{{static_asset('assets_web/img/cycle.png')}}" alt="">
                                        </span>
                                    </div>


                                    <div class="user_email mt-1 pb-3">
                                        <span class="user-email">
                                         Track order, cancel order and email ebb Build Bazaar support
                                        </span>
                                    </div>
                                   <div class="user_email edit-address mt-1">
								   <a href="{{url('product_return')}}" class="edit-address1 btn btn-primary-dark-w px-5 w-50 ctxtwhite">My Returns</a>

                                    </div>
                                    </div>






                        </div>

						</div>


                              </li>


                           </ul>


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

@endsection

@section('script')
    <script type="text/javascript">
        $('#order_details').on('hidden.bs.modal', function () {
            location.reload();
        })
    </script>

@endsection
