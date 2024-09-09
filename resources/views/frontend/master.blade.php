<!DOCTYPE html>
<html>
    <head>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="app-url" content="{{ getBaseURL() }}">
        <meta name="file-base-url" content="{{ getFileBaseURL() }}">
        <meta name="theme-color" content="#d1e4e1">
        <title>@yield('meta_title', get_setting('website_name').' | '.get_setting('site_motto'))</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="description" content="@yield('meta_description', get_setting('meta_description') )" />
        <meta name="keywords" content="@yield('meta_keywords', get_setting('meta_keywords') )">

        @yield('meta')
        @if(!isset($detailedProduct) && !isset($customer_product) && !isset($shop) && !isset($page) && !isset($blog))
            <!-- Schema.org markup for Google+ -->
            <meta itemprop="name" content="{{ get_setting('meta_title') }}">
            <meta itemprop="description" content="{{ get_setting('meta_description') }}">
            <meta itemprop="image" content="{{ uploaded_asset(get_setting('meta_image')) }}">

            <!-- Twitter Card data -->
            <meta name="twitter:card" content="product">
            <meta name="twitter:site" content="@publisher_handle">
            <meta name="twitter:title" content="{{ get_setting('meta_title') }}">
            <meta name="twitter:description" content="{{ get_setting('meta_description') }}">
            <meta name="twitter:creator" content="@author_handle">
            <meta name="twitter:image" content="{{ uploaded_asset(get_setting('meta_image')) }}">

            <!-- Open Graph data -->
            <meta property="og:title" content="{{ get_setting('meta_title') }}" />
            <meta property="og:type" content="website" />
            <meta property="og:url" content="{{ route('home') }}" />
            <meta property="og:image" content="{{ uploaded_asset(get_setting('meta_image')) }}" />
            <meta property="og:description" content="{{ get_setting('meta_description') }}" />
            <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
            <meta property="fb:app_id" content="{{ env('FACEBOOK_PIXEL_ID') }}">
        @endif
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


        <?php
	    $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://".$_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	  ?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" sizes="16x16" href="<?=$base_url?>images/web__1_-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
	<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">-->
	<link rel="icon" href="../assets/images/favicon/1.png" type="image/x-icon">
    <title>On-demand last-mile delivery</title>

    <!-- Google font -->

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap">


    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{static_asset('assets_web/css/vendors/bootstrap.css')}}">
    <link id="color-link" rel="stylesheet" type="text/css" href="{{static_asset('assets_web/css/animate.min.css')}}" media="all">
    <link id="color-link" rel="stylesheet" type="text/css" href="{{static_asset('assets_web/css/bulk-style.css')}}" media="all">
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{static_asset('assets_web/css/vendors/animate.css')}}">
    <link id="color-link" rel="stylesheet" type="text/css" href="{{static_asset('assets_web/css/slick.css')}}" media="all">
    <link id="color-link" rel="stylesheet" type="text/css" href="{{static_asset('assets_web/css/slick-theme.css')}}" media="all">
    <link id="color-link" rel="stylesheet" type="text/css" href="{{static_asset('assets_web/css/style.css')}}" media="all">
    <link id="color-link" rel="stylesheet" type="text/css" href="{{static_asset('assets_web/css/custom_style.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{static_asset('assets_web/css/vendors/ion.rangeSlider.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

        @yield('style')

        <script>
            $(document).ready(function() {
                toastr.options.timeOut = 5000;
                @if (Session::has('alert-danger'))
                    toastr.error('{{ Session::get('alert-danger') }}');
                @elseif(Session::has('alert-success'))
                    toastr.success('{{ Session::get('alert-success') }}');
                @elseif(Session::has('alert-warning'))
                    toastr.success('{{ Session::get('alert-warning') }}');
                @endif
            });

        </script>



        @if (get_setting('facebook_pixel') == 1)
            <!-- Facebook Pixel Code -->
            <script>
                !function(f,b,e,v,n,t,s)
                {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '{{ env('FACEBOOK_PIXEL_ID') }}');
                fbq('track', 'PageView');
            </script>
            <noscript>
                <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id={{ env('FACEBOOK_PIXEL_ID') }}&ev=PageView&noscript=1"/>
            </noscript>
            <!-- End Facebook Pixel Code -->
        @endif

        @php
            echo get_setting('header_script');
        @endphp


    </head>
    <body>
	    @include('frontend.header')
        @yield('content')
        @include('frontend.footer')


        @yield('modal')

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript">
            //get state city names from pin code
            function get_state_city(){
                var pincode = jQuery('#pincode').val();
                if(pincode==''){
                    jQuery('#city').val('');
                    jQuery('#state').val('');
                    document.getElementById("wrong_pincode").innerHTML="";
                }else{
                    jQuery.ajax({
                        url:'{{route('getPinCodeDetails')}}',
                        type:'post',
                        data:'pincode='+pincode+'&_token={{csrf_token()}}',
                        success:function(data){
                            if(data=='no'){
                                // alert('Wrong Pincode');
                                document.getElementById("wrong_pincode").innerHTML="Wrong Pincode.";
                                jQuery('#city').val('test');
                                jQuery('#state').val('');
                            }else{
                                var getData=$.parseJSON(data);
                                //alert(getData.city);
                                //alert(getData.state);
                                // $('#city').val(getData.city);
                                // $('#state').val(getData.state);
                                // $("#city").val('getData.city');
                                // $("#state").val('getData.state');
                                document.getElementById("cityid").value = getData.city;
                                document.getElementById("stateid").value = getData.state;
                                // document.getElementById("city").value = "Patna";
                                document.getElementById("wrong_pincode").innerHTML="";
                            }
                        }
                    });
                }
            }

            //static modal enquiry form
            $(document).on('click', '.add_cart_button_plus', function(e) {
                console.log("clicked plus btn");
                e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                var quantity = 1;
                var id = $(this).closest('.product_data').find('.prod_id').val();
                    $.ajax({
                    url: '{{route('cart.updateCartPlus')}}',
                    method: "POST",
                    data: {
                            'quantity':quantity,
                            'id':id,
                        },

                    success: function (response) {
                        toastr.info(response.status);
                        updateNavCart(response.nav_cart_view,response.cart_count,response.sum_cart_count);
                            $('#cart-summary').html(response.cart_view);
                        //  loadcart();
                        $('.add_cart_button_minus').prop('disabled', false);
                    }
                });
            });

            $(document).on('click', '.add_cart_button_minus', function(e) {
                console.log("clicked plus btn");
                e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                var quantity = 1;
                var id = $(this).closest('.product_data').find('.prod_id').val();
                    $.ajax({
                    url: '{{route('cart.updateCartMinus')}}',
                    method: "POST",
                    data: {
                            'quantity':quantity,
                            'id':id,
                        },

                    success: function (response) {
                        toastr.info(response.status);
                        updateNavCart(response.nav_cart_view,response.cart_count,response.sum_cart_count);
                            $('#cart-summary').html(response.cart_view);
                        //  loadcart();
                        $('.add_cart_button_minus').prop('disabled', false);
                    }
                });
            });

            //cart page qty update plus minus
            $(document).on('click', '.cart_button_plus', function(e) {
                console.log("clicked plus btn");
                e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                var quantity = 1;
                var id = $(this).closest('.product_data').find('.prod_id').val();
                    $.ajax({
                    url: '{{route('cart.updateCartQtyPlus')}}',
                    method: "POST",
                    data: {
                            'quantity':quantity,
                            'id':id,
                        },

                    success: function (response) {
                        toastr.info(response.status);
                        updateNavCart(response.nav_cart_view,response.cart_count,response.sum_cart_count,response.cart_view_ajax);
                            $('#cart-summary').html(response.cart_view_ajax);
                        //  loadcart();
                        $('.cart_button_plus').prop('disabled', false);
                    }
                });
            });

            $(document).on('click', '.cart_button_minus', function(e) {
                console.log("clicked plus btn");
                e.preventDefault();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                var quantity = 1;
                var id = $(this).closest('.product_data').find('.prod_id').val();
                    $.ajax({
                    url: '{{route('cart.updateCartQtyMinus')}}',
                    method: "POST",
                    data: {
                            'quantity':quantity,
                            'id':id,
                        },

                    success: function (response) {
                        toastr.info(response.status);
                        updateNavCart(response.nav_cart_view,response.cart_count,response.sum_cart_count,response.cart_view_ajax);
                        $('#cart-summary').html(response.cart_view_ajax);
                        $('.cart_button_minus').prop('disabled', false);
                    }
                });
            });

            //cart page qty update plus minus
            // request call back section
            $(".request-call-back").click(function(e){
                e.preventDefault();
                // var data = $(this).serialize();
                var name =  $('#names').val();
                var mobile = $("input[name=mobile]").val();
                var email = $('#emails').val();
                if(name!=='' && mobile!=='' && email!==''){
                    var url = '{{ url('insertCallRequest') }}';
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url:url,
                        method:'POST',
                        data:{
                            name:name,
                            mobile:mobile,
                            email:email,
                        },
                        success:function(response){
                            toastr.info("Call Request Sent Successfully!");
                            document.getElementById("error_message").innerHTML="";
                                $('#names').val('');
                                $("input[name=mobile]").val('');
                                $('#emails').val('');
                        },
                        error:function(error){
                            console.log(error)
                        }
                    });
                }else{
                    // alert('Required');
                    document.getElementById("error_message").innerHTML="All fields are Required.";
                }
            });
            // request call back

            // email subscribe
            $(".SubscribeBtn").click(function(e){
                e.preventDefault();
                // var data = $(this).serialize();
                var email =  $('#email_subscribe').val();

                if(email!==''){
                    var url = '{{ route('subscribers.store') }}';
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url:url,
                        method:'POST',
                        data:{
                            email:email,
                        },
                        success:function(response){
                            toastr.success("You have subscribed successfully!");
                            // toastr.success(response.msg);
                           $('#email_subscribe').val('');

                        },
                        error:function(error){
                            console.log(error)
                        }
                    });
                }else{
                    toastr.danger("Email is Required!");
                }
            });
            // email subscribe

            //notify me section start
            $(".notifyme").click(function(e){
                e.preventDefault();
                // var data = $(this).serialize();
                var pid =  $('#pid').val();
                var userid =  $('#userid').val();
                var url = '{{ url('productnotifyme') }}';
                // alert(pid);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                url:url,
                method:'POST',
                    data:{
                        pid:pid,
                        userid:userid,
                        },
                    success:function(response){
                        toastr.info("We we'll notify you when this product is back in stock!");
                    },
                error:function(error){
                    console.log(error)
                }

                });

            });

            //notifyme section end
            $(".loginAgain").click(function(e){
                e.preventDefault();
                var login_password =  $('#login_password').val();

                if(login_password!=='')
                    {
                    var url = '{{ url('checkLogin') }}';
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                    url:url,
                    method:'POST',
                    data:{
                        login_password:login_password,
                        },
                    success:function(response){
                        console.log(response.status);
                        document.getElementById("login_error").innerHTML="";
                            $('#login_password').val('');

                            if(response.success==true){
                                setTimeout(function() {
                                    /*Redirect to payment page after 1 sec*/
                                    window.location.href ='{{url('manage-payments')}}';
                                }, 1000)
                                console.log(response);
                            }
                            else if(response.status==false){
                                /*setTimeout(function() {
                                // Redirect to payment page after 1 sec
                                    window.location.href ='{{url('')}}';
                                }, 1000) */
                                document.getElementById("login_error").innerHTML="Login Failed, pls check password";
                            }
                    },
                    error:function(error){
                        console.log(error)
                    }

                    });
                }else{
                    // alert('Required');
                    document.getElementById("login_error").innerHTML="Field Required.";
                }
            });

            $(document).ready(function() {
            //alert('hi');
            /*$.ajax({
                type: "GET",
                url: "{{url('getcatWiseBrands')}}",
                success: function (response) {
                    $('#catewisebrands').html(response);
                }
            });*/
            //Vicky-3 dec 2022
            $.ajax({
                type: "GET",
                url: "{{url('getHeaderProductsMenu')}}",
                success: function (response) {
                $('.shop').html(response);
                $(".shop").hover(function () {
                    $(".shop .top_ul").show();
                    $(".proservices .top_ul").hide();
                    $(".enquryfrm").show();
                }, function () {
					$(".shop .top_ul").hide();
				});
                $(".megamenusubs li").hover(function() {
                    //$(".megamenusubs231").hide();
                    $(this).parent('ul').children("li").removeClass("orange_active");
                    $(this).parent('ul').children("li").children(".megamenusubs231").hide();
                    $(this).children(".megamenusubs231").show();
                });
                }
            });
            $.ajax({
                type: "GET",
                url: "{{url('getHeaderServiceMenu')}}",
                success: function (response) {
                $('.proservices').html(response);
                $(".proservices").hover(function () {
                    $(".proservices .top_ul").show();
                    $(".shop .top_ul").hide();
				}, function () {
					$(".proservices .top_ul").hide();
                });
                $(".megamenusubs li").hover(function() {
                    //$(".megamenusubs231").hide();
                    $(this).parent('ul').children("li").removeClass("orange_active");
                    $(this).parent('ul').children("li").children(".megamenusubs231").hide();
                    $(this).children(".megamenusubs231").show();
                });
                }
            });
            });

            function showAddToCartModals(showAddToCartModals){
                $('#addToCart').modal('show');
                let id = $(showAddToCartModals).attr('id');
                $('#userid').html(id);
                $.ajax({
                    url: '{{route('cart.showCartModal')}}',
                    type: 'post',
                    data:'id='+id+'&_token={{csrf_token()}}',
                    success:function(respons){
                        // $('#concontractid').html(JSON.parse(respons)[0].contractorID);
                        $('#addToCart-modal-body').html(respons);
                        // console.log(JSON.parse(respons)[0].contractorID);
                    }
                })
            }

            function showCategoryWiseBrand(showCategoryWiseBrand){
                let address_id = $(showCategoryWiseBrand).attr('id');
                let datas = "";
                $.ajax({
                    url: '{{url('getcategorybrands')}}',
                    type: 'post',
                    data:'address_id='+address_id+'&_token={{csrf_token()}}',
                    success:function(respons){

                        if (respons == '') {

                        } else{
                            //  console.log(respons);
                            $.each(respons, function (i) {
                                datas += '<div class="item"><div class="product-box"><div class="box-elech"><img src="'+respons[i].brand_id+'" alt=""></div><div class="pro_img_mens"><img src="'+respons[i].image+'" alt=""></div><div class="discrptions"><h5>  '+respons[i].title+'</h5><h6 id="title"></h6></div><div class="discrptions_button"><h5><a href="product-detail.php">View Detail-cat-'+respons[i].category_id+'</a></h5></div></div></div>';
                                console.log(datas);
                            });
                        }
                        $("#cat-list .catbrandslistss").html(datas);
                        $('#onloadactivecatbrand').addClass('d-none');
                    }
                })
            }

            $(document).ready(function() {
                getVariantPrice();
            });

            $('#option-choice-form input').on('change', function(){
                getVariantPrice();
            });

            $('#service-option-choice-form input').on('change', function(){
                getServiceVariantPrice();
            });

            function getVariantPrice(){
                if($('#option-choice-form input[name=quantity]').val() > 0 && checkAddToCartValidity()){
                    $.ajax({
                        type:"POST",
                        url: '{{ route('products.variant_price') }}',
                        data: $('#option-choice-form').serializeArray(),
                        success: function(data){
                            console.log(data);
                            $('.product-gallery-thumb .carousel-box').each(function (i) {
                                if($(this).data('variation') && data.variation == $(this).data('variation')){
                                    $('.product-gallery-thumb').slick('slickGoTo', i);
                                }
                            })

                            $('#option-choice-form #chosen_price_div').removeClass('d-none');
                            $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
                        //    $('#option-choice-form #chosen_price_div').removeClass('d-none');
                        //    $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
                            $('#show_total_price').removeClass('d-none');
                            $('#sku').html(data.sku);
                            $('#total_price').html(data.price);
                            $('#total_product_price').val(data.total_price);
                            $('#available-quantity').html(data.quantity);
                            $('.input-number').prop('max', data.max_limit);
                            if(parseInt(data.in_stock) == 0 && data.digital  == 0){
                                $('.bulk-order-buttons').addClass('d-none');
                                $('.addtocartbut').addClass('d-none');
                                $('.out-of-stock').removeClass('d-none');
                                // $('.ga-producttot').addClass('d-none');

                            }
                            else{
                                $('.bulk-order-buttons').removeClass('d-none');
                                $('.addtocartbut').removeClass('d-none');
                                $('.out-of-stock').addClass('d-none');
                            }
                        }
                    });
                }
            }

            function getServiceVariantPrice(){
                if($('#service-option-choice-form input[name=quantity]').val() > 0 && checkAddToServiceCartValidity()){
                    $.ajax({
                        type:"POST",
                        url: '{{ route('service.service_variant_price') }}',
                        data: $('#service-option-choice-form').serializeArray(),
                        success: function(data){
                                console.log(data);
                                $('.product-gallery-thumb .carousel-box').each(function (i) {
                                    if($(this).data('variation') && data.variation == $(this).data('variation')){
                                        $('.product-gallery-thumb').slick('slickGoTo', i);
                                    }
                                })

                            $('#service-option-choice-form #chosen_price_div').removeClass('d-none');
                            $('#service-option-choice-form #chosen_price_div #chosen_price').html(data.price);
                                //    $('#option-choice-form #chosen_price_div').removeClass('d-none');
                                //    $('#option-choice-form #chosen_price_div #chosen_price').html(data.price);
                            $('#show_total_price').removeClass('d-none');
                            $('#sku').html(data.sku);
                            $('#total_price').html(data.price);
                            $('#total_product_price').val(data.total_price);
                            $('#available-quantity').html(data.quantity);
                            $('.input-number').prop('max', data.max_limit);
                            if(parseInt(data.in_stock) == 0 && data.digital  == 0){
                                $('.bulk-order-buttons').addClass('d-none');
                                $('.addtocartbut').addClass('d-none');
                                $('.out-of-stock').removeClass('d-none');
                                // $('.ga-producttot').addClass('d-none');
                            }
                            else{
                                $('.bulk-order-buttons').removeClass('d-none');
                                $('.addtocartbut').removeClass('d-none');
                                $('.out-of-stock').addClass('d-none');
                            }
                        }
                    });
                }
            }

            function checkAddToCartValidity(){
                var names = {};
                $('#option-choice-form input:radio').each(function() { // find unique names
                        names[$(this).attr('name')] = true;
                });
                var count = 0;
                $.each(names, function() { // then count them
                        count++;
                });

                if($('#option-choice-form input:radio:checked').length == count){
                    return true;
                }
                return false;
            }

            function checkAddToServiceCartValidity(){
                var names = {};
                $('#service-option-choice-form input:radio').each(function() { // find unique names
                        names[$(this).attr('name')] = true;
                });
                var count = 0;
                $.each(names, function() { // then count them
                        count++;
                });

                if($('#service-option-choice-form input:radio:checked').length == count){
                    return true;
                }
                return false;
            }

            function updateNavCart(view,count,amount){
                $('.cart-count').html(count);
                $('#cart_items').html(view);
                $('.cart-amount').html(amount);
            }

            var res = $('.showcatlist').text();
            var imagesvar = $('#gallery_01 img').attr('src');

            function addToCart(){
                if(checkAddToCartValidity()) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $(".printproname").text(res);
                    $(".printproimg").attr("src",imagesvar);

                    $.ajax({
                        type:"POST",
                        url: '{{ route('cart.addToCart') }}',
                        data: $('#option-choice-form').serializeArray(),

                        success: function(data){
                            toastr.info(data.status);
                            updateNavCart(data.nav_cart_view,data.cart_count,data.sum_cart_count);
                            //$('.showcatlist').text();
                        }
                    });
                }
                else{
                    AIZ.plugins.notify('warning', "{{ translate('Please choose all the options') }}");
                }
            }

            // add to service cart function
            function addToServiceCart(){
                if(checkAddToServiceCartValidity()) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $(".printproname").text(res);
                    $(".printproimg").attr("src",imagesvar);
                    $.ajax({
                        type:"POST",
                        url: '{{ route('service.addToServiceCart') }}',
                        data: $('#service-option-choice-form').serializeArray(),
                        success: function(data){
                            // console.log(data);
                            // console.log(data.services_nav_cart_view);
                            // console.log(data.services_cart_count);
                            // console.log(data.services_sum_cart_count);
                            // console.log(data.sevices_prices);
                            // toastr.info(data.status);
                            // $('#service_cart_items').html(data.services_nav_cart_view);
                            updateServicesNavCart(data.services_nav_cart_view,data.services_cart_count,data.services_sum_cart_count);
                            //$('.showcatlist').text();
                        }
                    });
                }
                else{
                    AIZ.plugins.notify('warning', "{{ translate('Please choose all the options') }}");
                }
            }

            function updateServicesNavCart(view,count,amount) {
                $('#service_cart_items').html(view);
                $('.service_cart-count').html(count);
                $('.service_cart-amount').html(amount);
            }

            function updateServiceNavCart(view,count,amount) {
                $('#service_cart_items').html(view);
                $('.service_cart-count').html(count);
                $('.service_cart-amount').html(amount);
            }

            function buyNow(){
                if(checkAddToCartValidity()) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:"POST",
                        url: '{{ route('cart.buyNow') }}',
                        data: $('#option-choice-form').serializeArray(),
                        success: function(data){
                            console.log(data);
                            // alert("i am success");
                            // updateNavCart(data.nav_cart_view,data.cart_count,data.sum_cart_count);
                            $('.addtocartbut').addClass('d-none');
                            $('.buttonnone').toggle()
                            $('.countnone').removeClass('countnone');
                            toastr.info(data.status);
                            updateNavCart(data.nav_cart_view,data.cart_count,data.sum_cart_count);
                            $('#product-box').html(data.product_box_view);
                            // $('#addToCart-modal-body').html(null);
                            // $('.c-preloader').hide();
                            // $('#modal-size').removeClass('modal-lg');
                            // $('#addToCart-modal-body').html(data.modal_view);
                            // AIZ.extra.plusMinus();
                            setTimeout(function() {
                                /*Redirect to checkout page after 1 sec*/
                                window.location.href ='{{url('cart')}}';
                            }, 1000)

                        }
                    });
                }
                else{
                    AIZ.plugins.notify('warning', "{{ translate('Please choose all the options') }}");
                }
            }

            $(document).ready(function() {
                //Remove product from product cart
                $('.delete-cart-item').click(function (e) {
                    e.preventDefault();
                    $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                    var id =  $(this).closest('.product_data').find('.cart_id').val();

                    $.ajax({
                        method: "POST",
                        url: '{{ route('cart.removeFromCart') }}',
                        data: {
                            'id':id,
                        },
                        success: function (data) {
                            // toastr.info("Removed from Cart!");
                            updateNavCart(data.nav_cart_view,data.cart_count);
                            $('#cart-summary').html(data.cart_view);
                        }
                    });
                });

                //Remove service from service cart
                $('.delete-service-cart-item').click(function (e) {
                    // console.log("I am click delete function");
                    e.preventDefault();
                    $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                    var id =  $(this).closest('.product_data').find('.cart_id').val();
                    // console.log("ID : "+id);

                    $.ajax({
                        method: "POST",
                        url: '{{ route('service_cart.ServiceremoveFromCart') }}',
                        data: {
                            'id':id,
                        },
                        success: function (data) {
                            // console.log("Removed");
                            // toastr.info("Removed from Service Cart!");
                            // updateServiceNavCart(data.service_nav_cart_view,data.service_cart_count);
                            $('#service-cart-summary').html(data.service_cart_view);
                            location.reload();
                        }
                    });
                });

                $('.category-nav-element').each(function(i, el) {
                    $(el).on('mouseover', function(){
                        if(!$(el).find('.sub-cat-menu').hasClass('loaded')){
                            $.post('{{ route('category.elements') }}', {_token: AIZ.data.csrf, id:$(el).data('id')}, function(data){
                                $(el).find('.sub-cat-menu').addClass('loaded').html(data);
                            });
                        }
                    });
                });

                if ($('#lang-change').length > 0) {
                    $('#lang-change .dropdown-menu a').each(function() {
                        $(this).on('click', function(e){
                            e.preventDefault();
                            var $this = $(this);
                            var locale = $this.data('flag');
                            $.post('{{ route('language.change') }}',{_token: AIZ.data.csrf, locale:locale}, function(data){
                                location.reload();
                            });

                        });
                    });
                }

                if ($('#currency-change').length > 0) {
                    $('#currency-change .dropdown-menu a').each(function() {
                        $(this).on('click', function(e){
                            e.preventDefault();
                            var $this = $(this);
                            var currency_code = $this.data('currency');
                            $.post('{{ route('currency.change') }}',{_token: AIZ.data.csrf, currency_code:currency_code}, function(data){
                                location.reload();
                            });

                        });
                    });
                }

            });

            $('#searchid').on('keyup', function(){
                search();
            });

            $('#searchid').on('focus', function(){
                search();
            });

            function search(){
                var searchKey = $('#searchid').val();
                var type = $('#type').val();
                if(type != ""){
                    type = $('#type').val();
                }else{
                    type = "Product";
                }

                if(searchKey.length > 0){
                    $('body').addClass("typed-search-box-shown");

                    $('.typed-search-box').removeClass('d-none');
                    $('.search-preloader').removeClass('d    -none');
                    $.post('{{ route('search.ajax') }}', { _token: '{{csrf_token()}}', search:searchKey, type:type}, function(data){
                        if(data == '0'){
                            // $('.typed-search-box').addClass('d-none');
                            $('#search-content').html(null);
                            $('.typed-search-box .search-nothing').removeClass('d-none').html('Sorry, nothing found for <strong>"'+searchKey+'"</strong>');
                            $('.search-preloader').addClass('d-none');

                        }
                        else{
                            $('.typed-search-box .search-nothing').addClass('d-none').html(null);
                            $('#search-content').html(data);
                            $('.search-preloader').addClass('d-none');
                        }
                    });
                }
                else {
                    $('.typed-search-box').addClass('d-none');
                    $('body').removeClass("typed-search-box-shown");
                }
            }

            //bought together bulk add carts
            $('.bulkaddcart').click(function(){
                alert('i am clicked');
                var product_id = [];
                var product_price = [];
                var action = "add";

                $('.select_product').each(function(){
                    if($(this).prop('checked') == true)
                    {
                        product_id.push($(this).data('product_id'));
                        product_price.push($(this).data('product_price'));
                    }
                });

                if(product_id.length > 0){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url:'{{route('cart.addBoughtTogether')}}',
                        method:"POST",
                        data:{product_id:product_id, product_price:product_price, action:action},
                        success:function(data)
                        {
                            $('.addtocartbut').addClass('d-none');
                            $('.buttonnone').toggle()
                            $('.countnone').removeClass('countnone');
                            toastr.info(data.status);
                            updateNavCart(data.nav_cart_view,data.cart_count,data.sum_cart_count,data.bought_together);
                            $('#product-box').html(data.product_box_view);
                        }
                    });
                }else{
                    toastr.danger('Select atleast one item');
                }
            });

            //service bulk add carts
            $('.servicebulkaddcart').click(function(){
                var service_id = [];
                var product_price = [];
                var action = "add";

                $('.select_product').each(function(){
                    if($(this).prop('checked') == true)
                    {
                        service_id.push($(this).data('service_id'));
                            product_price.push($(this).data('product_price'));
                    }
                });

                if(service_id.length > 0){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url:'{{route('servicecart.addServiceBoughtTogether')}}',
                        method:"POST",
                        data:{service_id:service_id, product_price:product_price, action:action},
                        success:function(data)
                        {
                        // toastr.info(data.status);
                        updateServiceNavCart(data.service_nav_cart_view,data.service_cart_count,data.service_sum_cart_count,data.bought_together);
                        $('#product-box').html(data.product_box_view);
                        $('#bought_together').html(data.bought_together);
                        }
                    });
                }else{
                    toastr.danger('Select atleast one item');
                }

            });

            function updateNavCart(view,count,amount,bought_together,cart_view_ajax){
                $('.cart-count').html(count);
                $('#cart_items').html(view);
                $('.cart-amount').html(amount);
                $('#bought_together').html(bought_together);
                $('#cart-summary').html(cart_view_ajax);
            }

            function serviceCartModal(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{url('service/cart_modal')}}',
                    type: 'post',
                    success: function(response){
                        console.log(response);
                        // Add response in Modal body
                        $('.service_cart_modal_body').html(response.data);
                        // Display Modal
                        // $('#myQuoteModal').modal('show');
                    }
                });

            }

            $(document).ready(function () {
                $(document).on('click', '.service_cart_btn', function (){
                    serviceCartModal();
                });

            });

        </script>


            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script> --}}
            <script src="{{static_asset('assets_web/js/sweetalert2.all.min.js')}}" type="text/javascript"></script>

            <!-- latest jquery-->
    <script src="{{static_asset('assets_web/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{static_asset('assets_web/js/jquery-ui.min.js')}}"></script>
    <script src="{{static_asset('assets_web/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <script src="{{static_asset('assets_web/js/bootstrap/bootstrap-notify.min.js')}}"></script>
    <script src="{{static_asset('assets_web/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{static_asset('assets_web/js/feather/feather.min.js')}}"></script>
    <script src="{{static_asset('assets_web/js/feather/feather-icon.js')}}"></script>
    <script src="{{static_asset('assets_web/js/lazysizes.min.js')}}"></script>
    <script src="{{static_asset('assets_web/js/slick/slick.js')}}"></script>
    <script src="{{static_asset('assets_web/js/slick/slick-animation.min.js')}}"></script>
    <script src="{{static_asset('assets_web/js/slick/custom_slick.js')}}"></script>
    <script src="{{static_asset('assets_web/js/auto-height.js')}}"></script>
    <script src="{{static_asset('assets_web/js/timer1.js')}}"></script>
    <script src="{{static_asset('assets_web/js/fly-cart.js')}}"></script>
    <script src="{{static_asset('assets_web/js/quantity-2.js')}}"></script>
    <script src="{{static_asset('assets_web/js/wow.min.js')}}"></script>
    <script src="{{static_asset('assets_web/js/custom-wow.js')}}"></script>
    <script src="{{static_asset('assets_web/js/script.js')}}"></script>
    <script src="{{static_asset('assets_web/js/theme-setting.js')}}"></script>
    <script src="{{static_asset('assets_web/js/slick/slick.js')}}"></script>
    <!-- sidebar open js -->
    <script src="{{static_asset('assets_web/js/filter-sidebar.js')}}"></script>
    <!-- Quantity js -->
    <script src="{{static_asset('assets_web/js/ion.rangeSlider.min.js')}}"></script>
    <!-- Lord-icon Js -->
    <script src="{{static_asset('assets_web/js/lusqsztk.js')}}"></script>




        <!-- Quantity js -->
        <script src="{{static_asset('assets_web/js/quantity-2.js')}}"></script>

        <!-- Nav & tab upside js -->
        <script src="{{static_asset('assets_web/js/nav-tab.js')}}"></script>

        @yield('script')

    </body>
</html>
