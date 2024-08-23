@extends('frontend.layouts.user_panel')

@section('panel_content')
  <div class=" w-100 mb-1 mys_accounts">
                     <div class="bootstrap-accordiana">
                        <div class="backtabs-dp_servicespros2 backtabs-dp my-ebb_bucks">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p class="text-center text-capitalize fs-6 my-0 text-white">
                                        ebb Bucks Balance
                                    </p>
                                    <p class="coin_icon-holder text-center text-white fs-1">
                                        <i class="coin_here"></i>                     
                                            ₹ 0
                                    </p>
                                </div>
                            </div>
						


					
                        </div>

                        <div class="backtabs-dp_servicespros2 backtabs-dp my-ebb_bucks bg-white">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p class="coin_icon-holder text-center text-dark fs-6 fw-bold">
                                        <i class="coin_here coin_here2"></i>                     
                                            Ebb Bucks
                                    </p>
                                    <p class="coin_icon-holder text-center text-dark my-0 mb-2 pb-2 broder-secondary border-bottom">
                                        A quick and convenient way to pay & refund  
                                    </p>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <p class="cart_icon-holder text-center fs-4" >
                                                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                                </p>
                                                <p class="cart_text-holder text-center text-dark fs-6 my-0" >
                                                Instant checkout
                                                </p>
                                                <p class="cart_p-text-holder text-center text-secondary my-0" >
                                                One-click, easy and fast checkout
                                                </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <p class="cart_icon-holder refund_icon text-center fs-4">
                                                <i class="fa fa-redo"></i>
                                              
                                                </p>
                                                <p class="cart_text-holder text-center text-dark fs-6 my-0" >
                                                Faster refund
                                                </p>
                                                <p class="cart_p-text-holder text-center text-secondary my-0" >
                                                Get instant refunds as EbbBucks
                                                </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                           
                            </div>
						


					
                        </div>
                    <!--  how to use it starts here -->
                    <div class="backtabs-dp_servicespros2 backtabs-dp my-ebb_bucks bg-white shadow-none mb-0">
                          
						<div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <p class="text-dark text-center my-2">
                                    <a href="javascript:void(0)" class="text-center text-dark border-bottom border-secondary">
                                        How to use it?
                                    </a>
                                </p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <p class="coin_text-holder text-left text-dark">
                                    <i class="coin_here"></i>                     
                                    Recent Ebb Bucks Activity
                                </p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <p class="coin_icon-holder text-right text-dark d-flex align-items-center justify-content-end">
                                    <i class="coin_here coin_here2 my-0 me-2"></i>                     
                                        Ebb Bucks
                                </p>
                            </div>
                        </div>


					
                        </div>

                        <!-- accordion starts here-->

                        <div class="backtabs-dp_servicespros2 backtabs-dp ">
						 
                            <!-- <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                  <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">My Orders
                                  </h3>
                                 
                              </div> -->
                             <ul class="ulines-dps justify-content-start">
                              <li class="ukine ukine1b active4"><a href="javascript:void(0)">
                              All
                              </a></li>
                              <li class="ukine ukine2b "><a href="javascript:void(0)">
                              Earned 
                              </a>  </li>
                              <li class="ukine ukine3b "><a href="javascript:void(0)">
                                Refund
                                </a>  </li>
                                <li class="ukine ukine4b "><a href="javascript:void(0)">
                                    Used
                                    </a>  </li>
                                    <li class="ukine ukine5b "><a href="javascript:void(0)">
                                        Expired
                                        </a>  </li>
                                        
                             </ul>
                               
                          <div class="hotel-form py-4 shadow-none">
                            <ul class="ulines-dps-para">
                              <li class="ukine ukine1b active4">
                         <div class="holderr_of_transaction">
                            <p  class="text-secondary text-center">
                                <i class="fs-1 fa fa-exclamation-circle text-warning"></i>
                             </p>
    
                             <p class="text-secondary text-center fs-6">
                                No transaction history available 
                             </p>
                         </div>
                                  </li>
                                  <li class="ukine ukine2b ">
                                    <div class="holderr_of_transaction">
                                        <p  class="text-secondary text-center">
                                            <i class="fs-1 fa fa-exclamation-circle text-warning"></i>
                                         </p>
                
                                         <p class="text-secondary text-center fs-6">
                                            No transaction history available 
                                         </p>
                                     </div>
                                </li>
                                <li class="ukine ukine3b ">
                                    <div class="holderr_of_transaction">
                                        <p  class="text-secondary text-center">
                                            <i class="fs-1 fa fa-exclamation-circle text-warning"></i>
                                         </p>
                
                                         <p class="text-secondary text-center fs-6">
                                            No transaction history available 
                                         </p>
                                     </div>
                                </li>
                                <li class="ukine ukine4b ">
                                    <div class="holderr_of_transaction">
                                        <p  class="text-secondary text-center">
                                            <i class="fs-1 fa fa-exclamation-circle text-warning"></i>
                                         </p>
                
                                         <p class="text-secondary text-center fs-6">
                                            No transaction history available 
                                         </p>
                                     </div>
                                </li>
                                <li class="ukine ukine5b ">
                                    <div class="holderr_of_transaction">
                                        <p  class="text-secondary text-center">
                                            <i class="fs-1 fa fa-exclamation-circle text-warning"></i>
                                         </p>
                
                                         <p class="text-secondary text-center fs-6">
                                            No transaction history available 
                                         </p>
                                     </div>
                                </li>
                              
                              
                             </ul>
                           
                          
                          </div>
                          </div>

                        <!-- accordion ends here-->
<!-- how to use it ends here -->

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
