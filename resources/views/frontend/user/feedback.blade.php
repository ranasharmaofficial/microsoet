@extends('frontend.layouts.user_panel')

@section('panel_content')
 <div class=" w-100 mb-1 mys_accounts">
                     <div class="bootstrap-accordiana">
                        <div class="backtabs-dp_servicespros2 backtabs-dp ">
						 
						  <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">My Feedback </h3>
                               
                            </div>
                           
                             
                        <div class="hotel-form py-4 pt-0 shadow-none">
						  <ul class="ulines-dps-para">
                              <li class="ukine active4">
							 <div class="d-flex">
									   <div class="m-3 mb-0 imgid"><img class="notifactions" src="{{static_asset('assets_web/img/feedback.png')}}" alt=""></div>
									   <div>   
                                       <p>  This is where you will see your personalized offers, order updates &amp; price drops </p>
                                       <p class="mt-0"><b>14 Dec, 2021</b></p></div>
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
