<!doctype html>
@if(\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@else
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endif
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="app-url" content="{{ getBaseURL() }}">
	<meta name="file-base-url" content="{{ getFileBaseURL() }}">

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Favicon -->
	<link rel="icon" href="{{ uploaded_asset(get_setting('site_icon')) }}">
	<title>{{ get_setting('website_name').' | '.get_setting('site_motto') }}</title>

	<!-- google font -->
	<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"> -->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">	<!-- aiz core css -->
	<link rel="stylesheet" href="{{ static_asset('assets/css/vendors.css') }}">
    @if(\App\Models\Language::where('code', Session::get('locale', Config::get('app.locale')))->first()->rtl == 1)
    <link rel="stylesheet" href="{{ static_asset('assets/css/bootstrap-rtl.min.css') }}">
    @endif
	<link rel="stylesheet" href="{{ static_asset('assets/css/aiz-core.css') }}">

	<!-- custom  -->
	<link rel="stylesheet" href="{{ static_asset('assets/css/core.css') }}"/>
	<link rel="stylesheet" href="{{ static_asset('assets/css/demo.css') }}"/>

    <style>
       

		/* For text editor color Start */
		.note-editable header {
    		color: #000;
		}
		/* For text editor color End */
    </style>
	<script>
    	var AIZ = AIZ || {};
        AIZ.local = {
            nothing_selected: '{{ translate('Nothing selected') }}',
            nothing_found: '{{ translate('Nothing found') }}',
            choose_file: '{{ translate('Choose file') }}',
            file_selected: '{{ translate('File selected') }}',
            files_selected: '{{ translate('Files selected') }}',
            add_more_files: '{{ translate('Add more files') }}',
            adding_more_files: '{{ translate('Adding more files') }}',
            drop_files_here_paste_or: '{{ translate('Drop files here, paste or') }}',
            browse: '{{ translate('Browse') }}',
            upload_complete: '{{ translate('Upload complete') }}',
            upload_paused: '{{ translate('Upload paused') }}',
            resume_upload: '{{ translate('Resume upload') }}',
            pause_upload: '{{ translate('Pause upload') }}',
            retry_upload: '{{ translate('Retry upload') }}',
            cancel_upload: '{{ translate('Cancel upload') }}',
            uploading: '{{ translate('Uploading') }}',
            processing: '{{ translate('Processing') }}',
            complete: '{{ translate('Complete') }}',
            file: '{{ translate('File') }}',
            files: '{{ translate('Files') }}',
        }
	</script>

</head>
<body class="side-menu-open1">

	<div class="aiz-main-wrapper">
        @include('backend.inc.admin_sidenav')
		<div class="aiz-content-wrapper">
            @include('backend.inc.admin_nav')
			<div class="aiz-main-content">
				<div class="px-15px px-lg-25px">
                    @yield('content')
				</div>




				<div class="bg-white text-right py-3 px-15px px-25px mt-auto footer-bottoms position-fixed w-1000 pb-0 bottom-0 end-0">
					<!-- <p class="mb-0">&copy; {{ get_setting('site_name') }} v{{ get_setting('current_version') }}</p> -->
				
					<p>© 2024 , made with ❤️ by Rana Sharma</p>
				</div>




			</div><!-- .aiz-main-content -->
		</div><!-- .aiz-content-wrapper -->
	</div><!-- .aiz-main-wrapper -->

    @yield('modal')

	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script src="{{ static_asset('assets/js/vendors.js') }}" ></script>
	<script src="{{ static_asset('assets/js/aiz-core.js') }}" ></script>
	<script src="{{ static_asset('assets/js/common.js') }}" ></script>
	<script src="{{ static_asset('assets_web/js/sweetalert2.all.min.js') }}" ></script>

    @yield('script')

    <script type="text/javascript">
	    @foreach (session('flash_notification', collect())->toArray() as $message)
	        AIZ.plugins.notify('{{ $message['level'] }}', '{{ $message['message'] }}');
	    @endforeach


        if ($('#lang-change').length > 0) {
            $('#lang-change .dropdown-menu a').each(function() {
                $(this).on('click', function(e){
                    e.preventDefault();
                    var $this = $(this);
                    var locale = $this.data('flag');
                    $.post('{{ route('language.change') }}',{_token:'{{ csrf_token() }}', locale:locale}, function(data){
                        location.reload();
                    });

                });
            });
        }
        function menuSearch(){
			var filter, item;
			filter = $("#menu-search").val().toUpperCase();
			items = $("#main-menu").find("a");
			items = items.filter(function(i,item){
				if($(item).find(".aiz-side-nav-text")[0].innerText.toUpperCase().indexOf(filter) > -1 && $(item).attr('href') !== '#'){
					return item;
				}
			});

			if(filter !== ''){
				$("#main-menu").addClass('d-none');
				$("#search-menu").html('')
				if(items.length > 0){
					for (i = 0; i < items.length; i++) {
						const text = $(items[i]).find(".aiz-side-nav-text")[0].innerText;
						const link = $(items[i]).attr('href');
						 $("#search-menu").append(`<li class="aiz-side-nav-item"><a href="${link}" class="aiz-side-nav-link"><i class="las la-ellipsis-h aiz-side-nav-icon"></i><span>${text}</span></a></li`);
					}
				}else{
					$("#search-menu").html(`<li class="aiz-side-nav-item"><span	class="text-center text-muted d-block">{{ translate('Nothing Found') }}</span></li>`);
				}
			}else{
				$("#main-menu").removeClass('d-none');
				$("#search-menu").html('')
			}
        }
    </script>
    <script type="text/javascript">
	// 	$("body.side-menu-open1.side-menu-closed .aiz-sidebar.left.c-scrollbar").hover(function(){
	// 	  $('body').removeClass('side-menu-closed');
	// 	 $('.side-menu-open1').addClass('side-menu-open'); 
    //   }, function(){
	// 	 $('.side-menu-open1').removeClass('side-menu-open');
    //    $('body').addClass('side-menu-closed'); 
    //   });

	//   $("body.side-menu-open1.side-menu-open .aiz-sidebar.left.c-scrollbar").hover(function(){
	// 	  $('body').removeClass('side-menu-closed');
	// 	 $('.side-menu-open1').addClass('side-menu-open'); 
    //   }, function(){
	// 	 $('.side-menu-open1').removeClass('side-menu-closed');
    //    $('body').addClass('side-menu-open'); 
    //   });
	</script>
</body>
</html>
