@extends('frontend.layouts.user_panel')

@section('panel_content')

<div class=" w-100 mb-1 mys_accounts">
                     <div class="bootstrap-accordiana">
                        <div class="backtabs-dp_servicespros2 backtabs-dp ">
						 
						  <div class="border-bottom1 border-color-111 mt-0 mb-3">
                                <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">My Wishlist
                                </h3>
                               
                            </div>
                           <!-- <ul class="ulines-dps justify-content-start">
                            <li class="ukine ukine1b active4"><a href="product-order.php">
                            Orders
                            </a></li>
                            <li class="ukine ukine2b "><a href="product-return.php">
                            Returns
                            </a>  </li>
                           </ul> -->
                             
                        <div class="hotel-form py-4 shadow-none pt-0">
						  <ul class="ulines-dps-para">
                            <li class="ukine ukine2b active4">
                                <div class="mb-10 cart-table">
                                    <form class="mb-4 border" action="#" method="post">
                                        <table class="table" cellspacing="0">
                    
                                            <thead>
                                                <tr>
                                                    <th class="product-remove"> </th>
                                                    <th class="product-thumbnail"> </th>
                                                    <th class="product-name">
                                                        <h5>Product</h5>
                                                    </th>
                                                    <th class="product-price">
                                                        <h5>Item</h5>
                                                    </th>
                                                   
                                                    <th class="product-subtotal">
                                                        <h5>Total</h5>
                                                    </th>
                                                </tr>
                                            </thead>
                    
                                            <tbody>
                                                <tr class="">
                                                    <td class="text-center"><a href="#" class="text-gray-32 font-size-26" style="    color: #333;">×</a></td>
                                                    <td class="d-none d-md-table-cell img-boxpart6">
                                                        <a href="#"><img class="img-fluid max-width-100 p-1 border" src="{{static_asset('assets_web/img/index0/pro68.png')}}" alt="Image Description"></a>
                                                    </td>
                                                    <td data-title="Product">
                                                        <p class="prospre1"><a href="#" class="text-gray-90" style="color:#333e48;">  Cement</a></p>
                                                    </td>
                                                    <td data-title="Price">
                                                        <p class="prospre1"> 1</p>
                                                    </td>
                                                    
                                                    <td data-title="Total">
                                                        <p class="prospre1">  1</p>
                                                    </td>
                                                </tr>
                                                <tr class="">
                                                    <td class="text-center"><a href="#" class="text-gray-32 font-size-26" style="    color: #333;">×</a></td>
                                                    <td class="d-none d-md-table-cell">
                                                        <a href="#"><img class="img-fluid max-width-100 p-1 border" src="{{static_asset('assets_web/img/index0/pro78.png')}}" alt="Image Description"></a>
                                                    </td>
                                                    <td data-title="Product">
                                                        <p class="prospre1"><a href="#" class="text-gray-90" style="color:#333e48;">  Switches </a></p>
                                                    </td>
                                                    <td data-title="Price">
                                                        <p class="prospre1">  3</p>
                                                    </td>
                                                   
                                                    <td data-title="Total">
                                                        <p class="prospre1">  3</p>
                                                    </td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                </li>
                             
                            
                           </ul>
                         
                        
                        </div>
                        </div>
                     </div>
                  </div>
@endsection