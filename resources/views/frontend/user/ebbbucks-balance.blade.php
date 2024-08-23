@extends('frontend.layouts.user_panel')

@section('panel_content')
  <div class=" w-100 mb-1 mys_accounts">
                     <div class="bootstrap-accordiana">
                        <div class="backtabs-dp_servicespros2 backtabs-dp my-ebb_bucks">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <p class="text-center text-capitalize fs-6 my-0 text-white">
                                        ebb Bucks<sup>+</sup> Balance
                                    </p>
                                    <p class="coin_icon-holder text-center text-white fs-1">
                                        <i class="coin_here"></i>                     
                                            ₹ 500
                                    </p>

                                    <p class="text-center">
                                        <span class="rounded_span rounded-pill text-white">
                                            <i></i>
                                        ₹500 expiring on 08 Jul
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="row _main-Eraned-till mt-4">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-center">
                                            <!-- card -->
                                            <div class="earn_till-date d-flex mt-0 align-items-center justify-content-center border-end border-light">
                                                <div class="img_holder">
                                                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNSIgaGVpZ2h0PSIyNiIgdmlld0JveD0iMCAwIDI1IDI2Ij4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPGcgZmlsbD0iI0JEQkRCRCI+CiAgICAgICAgICAgIDxnPgogICAgICAgICAgICAgICAgPGc+CiAgICAgICAgICAgICAgICAgICAgPGc+CiAgICAgICAgICAgICAgICAgICAgICAgIDxwYXRoIGZpbGwtcnVsZT0ibm9uemVybyIgZD0iTTI0LjA5OCAzLjMyNGgtMy43NzdsLjExOS0xLjY2MmguMzM0Yy40NiAwIC44MzEtLjM3Mi44MzEtLjgzMSAwLS40NTktLjM3Mi0uODMxLS44My0uODMxSDQuMTU0Yy0uNDYgMC0uODMxLjM3Mi0uODMxLjgzMSAwIC40NTkuMzcyLjgzLjgzLjgzaC4zMzVsLjExOSAxLjY2M0guODNjLS40NTkgMC0uODMxLjM3Mi0uODMxLjgzVjcuMjhjMCAzLjc4MyAyLjk2NSA2Ljg4NiA2LjY5MyA3LjExLjIyNy4yODUuNDc1LjU1NC43NDUuODA2Ljc0LjY4OSAxLjYwMyAxLjIxIDIuNTM0IDEuNTQ1di4xMzJjMCAxLjE4Mi0uNDIyIDIuMjk5LTEuMTkzIDMuMThoLS4xOTJjLTEuMzc1IDAtMi40OTMgMS4xMi0yLjQ5MyAyLjQ5NHYuODQ3Yy0xLjI0NS4xMzgtMi4yMTYuNDg3LTIuMjE2IDEuNzY4SDIxLjA1YzAtMS4yODEtLjk3MS0xLjYzLTIuMjE2LTEuNzY4di0uODQ3YzAtMS4zNzUtMS4xMTgtMi40OTMtMi40OTMtMi40OTNoLS4xOTJjLS43Ny0uODgyLTEuMTkzLTEuOTk5LTEuMTkzLTMuMTgxdi0uMTMyYy45MzEtLjMzNCAxLjc5My0uODU2IDIuNTM0LTEuNTQ1LjI3LS4yNTIuNTE4LS41MjEuNzQ1LS44MDYgMy43MjgtLjIyNCA2LjY5My0zLjMyNyA2LjY5My03LjExVjQuMTU1YzAtLjQ2LS4zNzItLjgzMS0uODMxLS44MzF6TTEuNjYyIDcuMjhWNC45ODZoMy4wNjRsLjM4MiA1LjMzN2MuMDU0Ljc2Ni4yMjYgMS41MDguNTA0IDIuMjA1LTIuMjc5LS42NTctMy45NS0yLjc2MS0zLjk1LTUuMjQ4em0xNS41MTEgMTUuMjY3di44M0g3Ljc1NnYtLjgzYzAtLjQ1OC4zNzItLjgzMS44My0uODMxaDcuNzU2Yy40NTkgMCAuODMxLjM3My44MzEuODN6bS0zLjA1LTIuNDkzaC0zLjMxN2MuNS0uODg5Ljc4My0xLjg4Ny44MjItMi45MjguMjc2LjAzMS41NTUuMDQ3LjgzNi4wNDcuMjgyIDAgLjU2LS4wMTYuODM3LS4wNDcuMDQgMS4wNDEuMzIyIDIuMDQuODIyIDIuOTI4em0yLjIzNS02LjA3NWMtMS4wNjEuOTg4LTIuNDQ0IDEuNTMyLTMuODk0IDEuNTMyLTEuNDUgMC0yLjgzMi0uNTQ0LTMuODkzLTEuNTMycy0xLjcwMi0yLjMyOC0xLjgwNi0zLjc3NGwtLjYxLTguNTQzaDEyLjYxOWwtLjYxIDguNTQzYy0uMTA0IDEuNDQ2LS43NDUgMi43ODYtMS44MDYgMy43NzR6bTYuOTA5LTYuN2MwIDIuNDg4LTEuNjcxIDQuNTkyLTMuOTUgNS4yNS4yNzgtLjY5OC40NS0xLjQ0LjUwNC0yLjIwNmwuMzgxLTUuMzM3aDMuMDY1VjcuMjh6IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMjYgLTIzMSkgdHJhbnNsYXRlKDAgMjEzKSB0cmFuc2xhdGUoMjYgOSkgdHJhbnNsYXRlKDAgOSkiLz4KICAgICAgICAgICAgICAgICAgICAgICAgPHRleHQgZm9udC1mYW1pbHk9IkJhbmdsYVNhbmdhbU1OLUJvbGQsIEJhbmdsYSBTYW5nYW0gTU4iIGZvbnQtc2l6ZT0iMTMiIGZvbnQtd2VpZ2h0PSJib2xkIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMjYgLTIzMSkgdHJhbnNsYXRlKDAgMjEzKSB0cmFuc2xhdGUoMjYgOSkgdHJhbnNsYXRlKDAgOSkiPgogICAgICAgICAgICAgICAgICAgICAgICAgICAgPHRzcGFuIHg9IjguMDM2IiB5PSIxMy4zNTUiPuKCuTwvdHNwYW4+CiAgICAgICAgICAgICAgICAgICAgICAgIDwvdGV4dD4KICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgIDwvZz4KICAgICAgICA8L2c+CiAgICA8L2c+Cjwvc3ZnPgo=" alt="">
                                                </div>
                                            <div class="text_holder">
                                                <p class="text-white earned_till-text-parent text-left">
                                                    <span class="earned_till-text">
                                                        Earned till date
                                                    </span>
                                                    ₹500 
                                                </p>
                                            </div>
                                            </div>
                                            <!-- card -->
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                                    <!-- card -->
                                    <div class="earn_till-date d-flex mt-0 align-items-center justify-content-center">
                                        <div class="img_holder">
                                            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgdmlld0JveD0iMCAwIDMyIDMyIj4KICAgIDxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+CiAgICAgICAgPGc+CiAgICAgICAgICAgIDxnPgogICAgICAgICAgICAgICAgPGc+CiAgICAgICAgICAgICAgICAgICAgPGc+CiAgICAgICAgICAgICAgICAgICAgICAgIDxwYXRoIHN0cm9rZT0iI0JEQkRCRCIgc3Ryb2tlLXdpZHRoPSIxLjYiIGQ9Ik0xNS41ODkgMjUuNjFsLTIuODA0IDEuMjY1Yy0uNDk1LjIyMy0xLjA3Ny4wMTEtMS4zMTItLjQ3N2wtMS4zMzUtMi43NzJjLS4xMjUtLjI1OC0uMzU0LS40NS0uNjMtLjUyOWwtMi45NjEtLjgzM2MtLjUyMy0uMTQ3LS44MzMtLjY4My0uNjk5LTEuMjFsLjc2LTIuOThjLjA3LS4yNzguMDE4LS41NzMtLjE0NC0uODFsLTEuNzMyLTIuNTQyYy0uMzA2LS40NDgtLjE5OC0xLjA1OC4yNDItMS4zNzVsMi40OTgtMS43OTZjLjIzMy0uMTY3LjM4Mi0uNDI3LjQxLS43MTJsLjMwNy0zLjA2MWMuMDU0LS41NC41My0uOTM4IDEuMDctLjg5OGwzLjA2OC4yM2MuMjg2LjAyMS41NjctLjA4MS43NzMtLjI4MWwyLjIwMi0yLjE0OGMuMzg4LS4zNzkgMS4wMDgtLjM3OSAxLjM5NiAwTDE4LjkgNi44MjljLjIwNi4yLjQ4Ny4zMDIuNzczLjI4MWwzLjA2OC0uMjNjLjU0LS4wNCAxLjAxNi4zNTggMS4wNy44OThsLjMwNiAzLjA2Yy4wMjkuMjg2LjE3OC41NDYuNDExLjcxM2wyLjQ5OCAxLjc5NmMuNDQuMzE3LjU0OC45MjcuMjQyIDEuMzc1bC0xLjczMiAyLjU0MmMtLjE2Mi4yMzctLjIxNC41MzItLjE0My44MWwuNzU5IDIuOThjLjEzNC41MjctLjE3NiAxLjA2My0uNjk5IDEuMjFsLTIuOTYuODMzYy0uMjc3LjA3OC0uNTA2LjI3LS42My41M2wtMS4zMzYgMi43N2MtLjIzNS40OS0uODE3LjcwMS0xLjMxMi40NzhsLTIuODA0LTEuMjY1Yy0uMjYxLS4xMTgtLjU2LS4xMTgtLjgyMiAweiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTIwMiAtMjI2KSB0cmFuc2xhdGUoMCAyMTMpIHRyYW5zbGF0ZSgyMDIgOSkgdHJhbnNsYXRlKDAgNCkiLz4KICAgICAgICAgICAgICAgICAgICAgICAgPHBhdGggZmlsbD0iI0JEQkRCRCIgZmlsbC1ydWxlPSJub256ZXJvIiBkPSJNMTcuMjgxIDIyLjAzNGwxLjM4My0uNTg2LTQuMjE5LTMuODY3Yy40MDEtLjA2Mi43OTMtLjE2NCAxLjE3Ni0uMzA0LjM4My0uMTQxLjczMi0uMzIzIDEuMDQ3LS41NDcuMzE1LS4yMjQuNTg5LS40ODkuODItLjc5My4yMzItLjMwNS4zOTctLjY1LjQ5Ni0xLjAzNWgxLjg2di0xLjI5N0gxOGMtLjAyNi0uMTE1LS4wNjgtLjI0MS0uMTI1LS4zOC0uMDU3LS4xMzctLjEyNC0uMjc1LS4yLS40MTMtLjA3NS0uMTM4LS4xNTctLjI3MS0uMjQ1LS4zOTktLjA4OS0uMTI3LS4xOC0uMjM4LS4yNzQtLjMzMmgyLjY4OFYxMC42NmgtNy4yMTF2MS40MjJoMS4wMzljLjQwNiAwIC43Ny4wNCAxLjA5NC4xMjEuMzIzLjA4MS42MDQuMTkyLjg0My4zMzIuMjQuMTQxLjQzOC4zMDQuNTk0LjQ4OS4xNTYuMTg1LjI3NC4zNzkuMzUyLjU4MmgtMy45MjJ2MS4yOTdoMy44ODNjLS4xMy4yOC0uMzMxLjUyLS42MDIuNzE4LS4yNy4xOTgtLjU3My4zNi0uOTA2LjQ4NS0uMzM0LjEyNS0uNjc1LjIxNy0xLjAyNC4yNzctLjM0OS4wNi0uNjY2LjA5Mi0uOTUzLjA5OGwtLjYyNSAxIDQuODc1IDQuNTU0eiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTIwMiAtMjI2KSB0cmFuc2xhdGUoMCAyMTMpIHRyYW5zbGF0ZSgyMDIgOSkgdHJhbnNsYXRlKDAgNCkiLz4KICAgICAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgICAgICA8L2c+CiAgICAgICAgICAgIDwvZz4KICAgICAgICA8L2c+CiAgICA8L2c+Cjwvc3ZnPgo=" alt="">
                                        </div>
                                    <div class="text_holder d-flex">
                                        <p class="text-white earned_till-text-parent">
                                            <span class="earned_till-text">
                                                Saved on deals
                                            </span>
                                            ₹0
                                        </p>
                                    </div>
                                    </div>
                                    <!-- card -->
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
                                <p class="text-dark text-center my-0">
                                    * Max 2% redeemable of your total order value.
                                    <a href="javascript:void(0)" class="text-center text-dark border-bottom border-secondary">
                                        How to use it?
                                    </a>
                                </p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <p class="coin_text-holder text-left text-dark fs-6">
                                    <i class="coin_here"></i>                     
                                    Recent Ebb Bucks<sup>+</sup> Activity
                                </p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <p class="coin_icon-holder text-right text-dark d-flex align-items-center justify-content-end">
                                    <i class="coin_here coin_here2 my-0 me-2"></i>                     
                                        Ebb Bucks<sup>+</sup>
                                </p>
                            </div>
                        </div>


					
                        </div>

                      

                        <div class="backtabs-dp_servicespros2 backtabs-dp ">
						 
                          
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
                         <div class="holderr_of_transaction new_registeration">
                           <div class="first_holder">
                            <p class="text-secondary text-center my-0">
                                <img src="{{static_asset('assets_web/img/reward-ico.png')}}" alt="">
                                <span class="new_reg-text">
                                    New Registeration Ebb Bucks+
                                    <span class="text-secondary my-0">
                                        Credited On : 08 Jun 2022
                                    </span>
                                </span>
                             </p>
                           </div>
    
                          <div class="second_holder">
                            <p class="text-secondary text-center fs-6 mt-5">
                                <span class="text-success">
                                    + ₹500
                                    <p class="text-secondary my-0">
                                        Expiry : 08 Jul 2022
                                    </p>
                                </span>
                             </p>
                          </div>
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
