@extends('frontend.master')
@section('content')
<section class="pageTitle product-detail_banner" style="background-image:url({{static_asset('assets_web/img/orderbanner.png')}})">
   <div class="container"> </div>
</section>

<section class="bannerslid mb-5 pt-5 animated animate__fadeInUp wow">
    <div class="container">
        <div class="table-crack-border">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table aiz-table mb-0 footable footable-1 breakpoint-lg brdrnone">
                <tr>
                    <td colspan="4">
                        <div class="row">
                            <div class="col-md-6 allsettertxt">More Service Providers</div>
                            <div class="col-md-6">
                                <h5 class="fr">
                                    <img src="{{uploaded_asset($service->thumbnail_img)}}" class="sellerproImg">
                                    <span class="sellerproTitle">{{$service->name}}</span>
                                </h5>
                            </div>
                        </div>
                    </td>    
                </tr>

                <tr class="footable-header">
                    <th>Seller Name</th>
                    <th class="thwidth">Price</th>
                    <th>Delivery</th>
                    <th>&nbsp;</th>
                </tr>

                @foreach($services as $item)
                    <tr>
                        <td colspan="4" class="product_data">
                            <div class="row">
                                <div class="col-md-3">
                                    <span><strong>{{$item->user->shop->name}} </strong></span><br/>
                                    <ul>
                                        @if ($item->cash_on_delivery == 1)
                                        <li>Cash On Delivery available</li>
                                        @endif
                                        <li>7 Days Replacement Policy</li>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    @if($item->discount != null && $item->discount_start_date <= $current_date_time && $item->discount_end_date >= $current_date_time)  
                                        <strong class="pricestrong">{{ home_discounted_base_price($item) }}</strong> 
                                        <input type="hidden" value="{{ home_discounted_base_price($item, false) }}" class="prod_price">

                                        @if($item->discount_type == "percent")
                                            <strike>{{ home_base_price($item) }}</strike> <span class="starrating">{{$item->discount}} % Off</span><br />
                                        @else
                                            <strike>{{ home_base_price($item) }}</strike> <span class="starrating">₹ {{$item->discount}} Flat Off</span><br />
                                        @endif
                                    @else
                                        <input type="hidden" value="{{ home_base_price($item, false) }}" class="prod_price">
                                        <strong class="pricestrong">{{ home_base_price($item) }}</strong> 
                                    @endif
                                    <ul class="offershowhide">
                                        <li>10% off on SBI Credit Card, up to ₹750. On orders of ₹5000 and above</li>
                                        <li class="collapseli">10% off on SBI Credit Card EMI Transactions, up to ₹1500. On orders of ₹5000 and above</li>
                                        <li class="collapseli">5% Cashback on Flipkart Axis Bank Card</li>
                                        <li class="collapseli">Get extra ₹1200 off (price inclusive of discount)</li>
                                        <li class="collapseli">Get Google Nest hub at just ₹4999</li>
                                        <li class="collapseli">Google Nest mini- attach 1999</li>
                                        <li class="collapseli">Sign up for Flipkart Pay Later and get Flipkart Gift Card worth up to ₹500*</li>
                                        <span class="showoffer">6 more offers</span>
                                        <span class="hideoffer">Hide more offers</span>
                                    </ul>
                                </div>
                                <div class="col-md-3">
                                    <span class="deltxt">Usually delivered in 3 days Enter pincode for exact delivery dates/charges</span>
                                </div>

                                <input type="hidden" value="{{ $item->id }}" class="prod_id">                
                                <input type="hidden" value="{{ $item->name }}" class="serv_prod_name">
                                <input type="hidden" value="{{ uploaded_asset('$item->thumbnail_img') }}" class="serv_prod_img">
                                <input type="hidden" value="1" class="input-number">

                                <div class="col-md-3">
                                    @if(Auth::user() != null)
                                        <button class="addserviceaquote quoteModal" data-id="{{$item->id}}" >Get A Quote</button>
                                        <a class="buttonbuynow askpricebtn askPriceModal" data-id="{{$item->id}}">  Ask Price</a>
                                    @else
                                        <a href="{{url('login')}}" class="addserviceaquote"> Get A Quote </a>
                                        <a href="{{url('login')}}" class="buttonbuynow askpricebtn"> Ask Price</a> 
                                    @endif
                                </div>
                            </div>
                        </td>    
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</section>

<div id="myQuoteModal" class="modal fade prolidneis in" role="dialog">
    <div class="modal-dialog" id="modal-dialog45">
        <div class="modal-content">
            
            <div class="modal-header">
                        <div class="box-soldid1back box-soldid2" style="height:25px;">&nbsp;
                        </div>
                        <button type="button" class="close">×</button>
                    </div>
                    
            <div class="modal-body">
                <div class="form_section pt-0 pb-0">
                    <form method="post" action="{{ route('service_orders.quotation')}}" autocomplete="off" class="bottom-form mt-0 shadow-none border">
                       @csrf
                       <div class="row form_modal_body">
     
                          
     
                       </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<div id="myAskPriceModal" class="modal fade prolidneis in" role="dialog">
    <div class="modal-dialog" id="modal-dialog45">
        <div class="modal-content">
        
        <div class="modal-header">
                        <div class="box-soldid1back box-soldid2" style="height:25px;">&nbsp;
                        </div>
                        <button type="button" class="close">×</button>
                    </div>
            
            <div class="modal-body">
                <div class="form_section pt-0 pb-0">
                    <form method="post" action="{{ route('service_enquiry.insertServiceEnquiry')}}" autocomplete="off" class="bottom-form mt-0 shadow-none border">
                       @csrf
                       <div class="row ask_price_modal_body">
     
                          
     
                       </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.quoteModal', function (){
                var service_id = $(this).data('id');

                // AJAX request
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{url('service_modal_details')}}',
                    type: 'post',
                    data: {service_id: service_id},
                    success: function(response){ 
                        // Add response in Modal body
                        $('.form_modal_body').html(response.data);
                        // Display Modal
                        $('#myQuoteModal').modal('show'); 
						
						$("#myQuoteModal").addClass("fadeshow");
                    }
                });

            });

            $(document).on('click', '.askPriceModal', function (){
                var service_id = $(this).data('id');

                // AJAX request
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{url('service_ask_price_modal')}}',
                    type: 'post',
                    data: {service_id: service_id},
                    success: function(response){ 
                        // Add response in Modal body
                        $('.ask_price_modal_body').html(response.data);
                        // Display Modal
                        $('#myAskPriceModal').modal('show'); 
						
						$("#myAskPriceModal").addClass("fadeshow");
                    }
                });

            });
        });
    </script>
@endsection
