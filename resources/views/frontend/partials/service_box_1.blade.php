

<div class="col-md-4">
	<div class="product-box services">
		<div class="ser-prd-img position-relative">
			<div class="beachsq position-absolute">
				<p>Featured</p>
			</div>
			<div class="beachs2  position-absolute">
				<p>For Rent</p>
			</div>
			<div class="beach3  position-absolute">
				<p>₹ 3,600/mo</p>
			</div> <img src="img/services/architectural-drawings.png" alt=""> </div>
		<div class="discrptions">
			<a href="service_details.php">
				<h5> Architectural Drawings</h5> </a>
			<h6> F-47, 1st Floor, Galleria Market, Gurgaon, Haryana</h6> </div>
		<ul class="item-amenities d-flex item-amenities-with-icons">
			<li class="h-beds"><span class="hz-figure">4 <i class="fa fa-bed"
                                                aria-hidden="true"></i></span> Bedrooms</li>
			<li class="h-baths border-left border-right"><span class="hz-figure">2 <i
                                                class="fa fa-shower" aria-hidden="true"></i></span> Bathrooms</li>
			<li class="h-area"><span class="hz-figure">1200 <i class="fa fa-indent"
                                                aria-hidden="true"></i></span> Sq Ft </li>
		</ul>
		<div class="border-bottom d-flex1"> <a class="btn btn-info" href="javascript:void(0);" data-toggle="modal" data-target="#myModal">Get A Quot</a> <a class="btn btn-primary" href="service_details.php"> Detail</a> </div>
		<div class="item-footer clearfix">
			<div class="item-author"> <i class="fa fa-user mr-1"></i> <a href="#">Pankaj Singh</a> </div>
			<div class="item-date"> <i class="fa fa-paperclip" aria-hidden="true"></i> 2 years ago </div>
		</div>
	</div>
</div>	



<?php if(false) { ?>
<div class="product-box h-auto product_data pb-3">
   <div class="beachs">{{$product->discount}}% Off</div>
   <img src="{{ uploaded_asset($product->thumbnail_img) }}" alt="{{  $product->getTranslation('name')  }}"
      onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
	
   <div class="discrptions">
      <a href="{{ route('product', $product->slug) }}">
         <h5 class="text-truncate-2">{{ $product->getTranslation('name') }} </h5>
      </a>
      <h6>MRP/- {{ home_discounted_base_price($product) }}</h6>
   </div>
   <!-- <ul class="ulproducts">
                              <li>In stock</li>
                              <li>Non returnable</li>
                              <li>Usually ships in 24-72 Hours</li>
                           </ul> -->
   @php
   $price = $product->unit_price - ($product->unit_price * $product->discount) / 100;
   @endphp
    
	
	 <div class="discrptions_button buddonjdk">
                            <h5 class="mask-overflow">
							<a href="{{ route('product', $product->slug) }}"><i class="fa fa-eye"></i></a>
							</h5>
							
                              <button  type="button" id="{{$product->id}}" onclick="showAddToCartModals(this)" class="btn cart active">
							  <i class="fa fa-shopping-cart" aria-hidden="true"></i> 
							  <span class="name">Add to cart</span> 
							  </button>
							  
                             
                           </div>
	
	
</div>
<?php } ?>
