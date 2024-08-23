<section class="similar-pros-section mt-0">
    <div class="pros-section_prent">
	    <!-- Product relative Carousel -->
        <div class="headsections111 pt-0">
            <div class="container">
                <div class="service-pros" style="padding:0px;margin:0px;">
                    <div class="head-cnt work-center text-center">
                        <div class="bounceIn animated">
                            <h4>{{ translate('You May Also Like')}}</h4>
                            <hr class="underlinskd">
                        </div>
                    </div>
                </div>
              
                <div class="owl-carousel owl-theme trending0">
                    @foreach (filter_services(\App\Models\Service::orderBy('num_of_sale', 'desc'))->limit(6)->get() as $key => $top_product)
					  <div class="item">
						 <div class="product-box">
							<div class="beachs">
                                @if($top_product->discount != null && $top_product->discount != "amount")
                                    {{$top_product->discount}} % OFF
                                @else
                                    ₹{{$top_product->discount}} OFF
                                @endif
                            </div>
							<img src="{{ uploaded_asset($top_product->thumbnail_img) }}" alt="">
							<div class="discrptions">
							   <h5 class="text-truncate-2">{{ $top_product->getTranslation('name') }} </h5>
							   <h6>{{ home_discounted_base_price($top_product) }}
							   @if(home_base_price($top_product) != home_discounted_base_price($top_product))
								   <strike> {{ home_base_price($top_product) }}</strike>
							    @endif
							   </h6>
							</div>
							<div class="discrptions_button">
							   <h5><a href="{{ route('product', $top_product->slug) }}">View Detail</a></h5>
							</div>
						 </div>
					  </div>
				    @endforeach
                 
               </div>
            </div>            
        </div>        
    </div>
</section>