@extends('frontend.master')

@section('title')Home -  @endsection

@section('description') @endsection


@section('content')
@php
    $status = $order->orderDetails->first()->delivery_status;
@endphp
 <section class="pageTitle" style="    background-image: url({{static_asset('assets_web/img/orderbanner.png')}});height: 240px; background-size: contain;">
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
                        <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('service/purchase_history')}}">Order</a></li> 
                        <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
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
                                 <div class="col col-md-8 col-sm-6 text-left text-md-left">
                                    <h5 class="mb-md-0 h6"> Order Details </h5>
									         <h6 class="mt-2">Ordered on {{ date('d-m-Y', $order->date) }} | Order# {{ $order->code }}</h6>
                                 </div>
                                 <div class="col-md-4 col-sm-6">
                                    <div class="discrptions_button text-right align-right">
                                       <h5 class="py-0">  
                                       <a href="{{ route('invoice.download', $order->id) }}" class="py-0 invoices"> Invoice  </a>  </h5>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card-body">
                              <div class="table-crack-overflow h-auto mb-3">
                                 <table class="table aiz-table mb-0 footable footable-1 breakpoint-lg" style="border-collapse:inherit;">
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
                                          <td>      {{ json_decode($order->shipping_address)->name }}    </td>
                                          <td>        {{ ucfirst(str_replace('_', ' ', $order->payment_staus)) }} <hr>    
                                               Order Status : {{ translate(ucfirst(str_replace('_', ' ', $status))) }}  
                                          </td>											   
                                          <td>        {{ translate('Subtotal')}}     </td>
                                          <td>  :&nbsp;&nbsp; {{ single_price($order->orderDetails->sum('price')) }}     </td>
                                       </tr>
                                            
                                       <tr>
                                          <td>     {{ json_decode($order->shipping_address)->address }}, {{ json_decode($order->shipping_address)->area }}, {{ json_decode($order->shipping_address)->postal_code }}   </td>
                                          <td>           </td>
                                          <td>        {{ translate('Shipping')}}: </td>
                                          <td>  :&nbsp;&nbsp; {{ single_price($order->orderDetails->sum('shipping_cost')) }}     </td>
                                       </tr>
                                       <tr>
                                          <td>     {{ json_decode($order->shipping_address)->state }}, {{ json_decode($order->shipping_address)->city }}, {{ json_decode($order->shipping_address)->postal_code }}   </td>
                                          <td>           </td>
                                          <td>        {{ translate('Tax')}} </td>
                                          <td>  :&nbsp;&nbsp;  {{ single_price($order->orderDetails->sum('tax')) }}   </td>
                                       </tr>
											      {{--<tr>
                                          <td>       </td>
                                          <td>           </td>
                                          <td>        Promotion Applied: </td>
                                          <td>  :&nbsp;&nbsp;  -  00.00  </td>
                                            </tr>--}}
                                       <tr>
                                          <td> </td>
                                          <td> </td>
                                          <td> {{ translate('Grand Total')}}: </td>
                                          <td>  :&nbsp;&nbsp;   {{ single_price($order->grand_total) }}</td>
                                       </tr>
                                          
                                    </tbody>
                                 </table>
                              </div>  
                           
                              @foreach ($order_details as $key => $orderDetail)
                              <div class="table-crack-overflow h-auto overflow-visible">
                                 <table class="table1" id="cart" width="100%">
                                    <tbody style="border: 1px solid #d3d3d385; border-radius:10px;">
                                       <tr>
                                          <td data-th="Product">
                                             <div class="row p-2">
                                                <div class="col-md-2 col-sm-6 hidden-xs">
                                                   <img src="{{ uploaded_asset($orderDetail->service->thumbnail_img) }}" alt=" ..." class="cart-img w-100">
                                                </div>
                                                <div class="col-md-7 col-sm-6 text-cart">
                                                   <h4 class="nomargin pt-1">{{ $orderDetail->service->getTranslation('name') }}</h4>

                                                   <div class="row p-2">
                                                      <div class="col-md-12">
                                                         <p class="pp-cart m-0">
                                                            <b> {{ single_price($orderDetail->price) }}</b>
                                                         </p>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-3 col-sm-12 input-cart">
                                                   <a href="{{ route('service', $orderDetail->service->slug) }}">
                                                      <button class="class_buy_again">Buy it Again</button>  
                                                   </a>     
                                                </div>
                                                <div class=" col-lg-12 bd-bt "></div>
                                             </div>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              @endforeach 
                           </div>
                        </div>
                     </div>
                  </div>
                
               </div>
              
            </div>
         </div>
      </div>
	  
     
      @include('frontend.partials.youmaylike')
 
@endsection
 

@section('script')
    <script type="text/javascript">
        $('#order_details').on('hidden.bs.modal', function () {
            location.reload();
        })
    </script>

@endsection
