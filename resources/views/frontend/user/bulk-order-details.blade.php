@extends('frontend.layouts.user_panel')

@section('panel_content')
 <section class="pageTitle" style="    background-image: url(img/orderbanner.png);height: 240px; background-size: contain;">
         <div class="container">
         </div>
      </section>
      <!--top banner end -->
      <div class="service-pros animated animate__fadeInUp wow product-categorys ulines-dps-para ">
         <div class="container">
            <div class="row">
               <div class="col-md-12 breadmcrumsize">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('bulk_purchase_history')}}">Bulk Order</a></li> 
                        <li class="breadcrumb-item active" aria-current="page">Bulk Order Detail</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
         <div class="container details-product">
            <div class="row">
               <div class="col-xl-12 col-wd-9gdot5">
                 
                  <div class="cards_sections bulk-order3">
                     <div class="container1">
                        <div class="card">
                           <div class="card-header gutters-5 pb-2">
                              <div class="row">
                                 <div class="col col-md-8 text-left text-md-left">
                                    <h5 class="mb-md-0 h6"> Order Details </h5>
									<h6 class="mt-2">Ordered on 16 March 2021 | Order# 406-5004503-6919548</h6>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="discrptions_button text-right align-right">
									<h5 class="py-0">  
									<a href="invoice.php" class="py-0 invoices"> Invoice  </a>  </h5>
                                    </div>
                                 </div>
                              </div>
                           
                            
                           </div>
                           <div class="card-body">
                              <div class="table-crack-overflow h-auto mb-3">
                                 <table class="table aiz-table mb-0 footable footable-1 breakpoint-lg">
                                    <thead>
                                       <tr class="footable-header pt-0">
                                          <th>Shipping Address</th>
                                         
                                          <th>Payment Method</th>
                                          <th>Order Summary</th>
                                          <th>&nbsp; </th>
                                          
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>      Ujjwal Kumar    </td>
                                          <td>        BHIM UPI     </td>
                                          <td>        Item(s) Subtotal     </td>
                                          <td>  :&nbsp;&nbsp; 1,699.00     </td>
                                            </tr>
                                       <tr>
                                          <td>     Phalpura   </td>
                                          <td>           </td>
                                          <td>        Shipping: </td>
                                          <td>  :&nbsp;&nbsp; 40.00     </td>
                                            </tr>
                                       <tr>
                                          <td>     Phalpura , Rashulpur ,pachrukhi ,siwan
SIWAN, BIHAR 841233
India   </td>
                                          <td>           </td>
                                          <td>        Total: </td>
                                          <td>  :&nbsp;&nbsp;   1,739.00     </td>
                                            </tr>
                                       <tr>
                                          <td>       </td>
                                          <td>           </td>
                                          <td>        Promotion Applied: </td>
                                          <td>  :&nbsp;&nbsp;  -  40.00  </td>
                                            </tr>
                                       <tr>
                                          <td>       </td>
                                          <td>           </td>
                                          <td>        Grand Total: </td>
                                          <td>  :&nbsp;&nbsp;   1,699.00 </td>
                                            </tr>
                                          
                                 </tbody>
                              </table>
                           </div>  
						   <div class="table-crack-overflow h-auto overflow-visible">
                                <table class="table1" id="cart">
                         
                           <tbody style="border: 1px solid #d3d3d385; border-radius:10px;">
                              <tr>
                                 <td data-th="Product">
                                    <div class="row p-2">
                                       <div class="col-sm-2 hidden-xs">
                                          <img src="img/structure-material/steel-and-tmt.png" alt=" ..." class="cart-img w-100">
                                       </div>
                                       <div class="col-sm-7 text-cart">
                                          <h4 class="nomargin pt-1">TMT Steel</h4>
                                          <p class="pr-des-cart pt-0 mt-0">
TMT Steel Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. 
</p>
<span><b>Sold by :</b> Appario Retail Private Ltd</span>
<span>Return window closed on 31-Mar-2021</span>
                                      

										<div class="row p-2">
                                             <div class="col-sm-3 ">
                                              <p class="pp-cart m-0"><b><i class="fa-solid fa-indian-rupee-sign"></i> 1,699.00</b></p>
                                             </div>
                                             <!-- <div class="col-sm-3 cartoff">
                                                8 % Off
                                                </div> -->
                                          </div>
                                       </div>
                                       <div class="col-sm-3 input-cart">
									  <button class="class_buy_again mt-4">Buy it Again</button>  
                                        
                                       </div>
                                       <div class=" col-lg-12 bd-bt "></div>
                                    </div>
                                 </td>
                              </tr>
                              
                             
                           </tbody>
                        </table>
                           </div>
                              
                           </div>
                        </div>
                     </div>
                  </div>
                
               </div>
              
            </div>
         </div>
      </div>
	  
     
      <section class="similar-pros-section mb-30" >
         <div class="container">
            <div class="mb-8 similar-pros">
               <div class="service-pros" style="padding:0px;margin:0px;">
                  <div class="head-cnt work-center text-center">
                     <div class="bounceIn animated">
                        <h4>Similar Relative</h4>
                        <hr class="underlinskd">
                     </div>
                  </div>
               </div>
               <ul class="list-unstyled owl-carousel owl-theme trending021">
                  <li class="mb-4">
                     <div class="row">
                        <div class="col-auto col-md-4">
                           <a href="#" class="d-block width-75">
                           <img class="img-fluid" src="img/sim1.jpg" alt="Image Description">
                           </a>
                        </div>
                        <div class="col col-md-8">
                           <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="#">Finolex Selfit Pipe</a></h3>
                           <div class="row">
                              <div class="font-weight-bold col-md-7"> 
                                 <ins class="font-size-15 text-red text-decoration-none d-block">₹1999.00</ins>
                              </div>
                              <div class="text-warning text-ls-n2 font-size-16 mb-1 col-md-5" >
                                 <p>35% off</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="mb-4">
                     <div class="row">
                        <div class="col-auto col-md-4">
                           <a href="#" class="d-block width-75">
                           <img class="img-fluid" src="img/sim2.jpg" alt="Image Description">
                           </a>
                        </div>
                        <div class="col col-md-8">
                           <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="#">HDPE Pipes</a></h3>
                           <div class="row">
                              <div class="font-weight-bold col-md-7"> 
                                 <ins class="font-size-15 text-red text-decoration-none d-block">₹1999.00</ins>
                              </div>
                              <div class="text-warning text-ls-n2 font-size-16 mb-1 col-md-5" >
                                 <p>35% off</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="mb-4">
                     <div class="row">
                        <div class="col-auto col-md-4">
                           <a href="#" class="d-block width-75">
                           <img class="img-fluid" src="img/sim3.jpg" alt="Image Description">
                           </a>
                        </div>
                        <div class="col col-md-8">
                           <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="#">PVC Elbow</a></h3>
                           <div class="row">
                              <div class="font-weight-bold col-md-7"> 
                                 <ins class="font-size-15 text-red text-decoration-none d-block">₹1999.00</ins>
                              </div>
                              <div class="text-warning text-ls-n2 font-size-16 mb-1 col-md-5" >
                                 <p>35% off</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="mb-4">
                     <div class="row">
                        <div class="col-auto col-md-4">
                           <a href="#" class="d-block width-75">
                           <img class="img-fluid" src="img/sim4.jpg" alt="Image Description">
                           </a>
                        </div>
                        <div class="col col-md-8">
                           <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="#">CPVC SDR</a></h3>
                           <div class="row">
                              <div class="font-weight-bold col-md-7"> 
                                 <ins class="font-size-15 text-red text-decoration-none d-block">₹1999.00</ins>
                              </div>
                              <div class="text-warning text-ls-n2 font-size-16 mb-1 col-md-5" >
                                 <p>35% off</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li class="mb-4">
                     <div class="row">
                        <div class="col-auto col-md-4">
                           <a href="#" class="d-block width-75">
                           <img class="img-fluid" src="img/sim5.jpg" alt="Image Description">
                           </a>
                        </div>
                        <div class="col col-md-8">
                           <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="#">Heavy Pressure</a></h3>
                           <div class="row">
                              <div class="font-weight-bold col-md-7"> 
                                 <ins class="font-size-15 text-red text-decoration-none d-block">₹1999.00</ins>
                              </div>
                              <div class="text-warning text-ls-n2 font-size-16 mb-1 col-md-5" >
                                 <p>35% off</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </section>
 
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
