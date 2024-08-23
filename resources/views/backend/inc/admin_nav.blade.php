<div class="aiz-topbar px-15px px-lg-25px d-flex align-items-stretch justify-content-between">
    <div class="d-flex kdidhileig">
        <div class="aiz-topbar-nav-toggler d-flex align-items-center justify-content-start mr-2 mr-md-3 ml-0" data-toggle="aiz-mobile-nav">
            <!-- <button class="aiz-mobile-toggler"> -->
                <i class="fas fa fa-angle-left"></i>
                
            <!-- </button> -->
        </div>
    </div>
     
    <div class="d-flex justify-content-between align-items-stretch flex-grow-xl-1">
     
    
      <div class="d-flex justify-content-around align-items-center align-items-stretch">
      <div class="px-10px mt-3 mb-1 position-relative ">
      <i class="fas fa-search bx-sm position-absolute start-0 top-50 px-3"></i><input class="form-control bg-soft-secondary border-0 form-control-sm" type="text" name="" placeholder="{{ translate('Search in menu') }}" id="menu-search" onkeyup="menuSearch()">
            </div>
            @if (addon_is_activated('pos_system'))
            <div class="d-flex justify-content-around align-items-center align-items-stretch ml-3">
                <div class="aiz-topbar-item">
                    <div class="d-flex align-items-center">
                        <a class="btn btn-icon btn-circle btn-light" href="{{ route('poin-of-sales.index') }}" target="_blank" title="{{ translate('POS') }}">
                            <i class="las la-print"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endif
         
        </div> 
        <div class="d-flex justify-content-around align-items-center align-items-stretch">
        {{-- language --}}
            @php
            if(Session::has('locale')){
            $locale = Session::get('locale', Config::get('app.locale'));
            }
            else{
            $locale = env('DEFAULT_LANGUAGE');
            }
            @endphp
            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown " id="lang-change">
                    <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="btn btn-icon">
                            <img src="{{ static_asset('assets/img/flags/'.$locale.'.png') }}" height="11">
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-xs">

                        @foreach (\App\Models\Language::all() as $key => $language)
                        <li>
                            <a href="javascript:void(0)" data-flag="{{ $language->code }}" class="dropdown-item @if($locale == $language->code) active @endif">
                                <img src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}" class="mr-2">
                                <span class="language">{{ $language->name }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            


            <div class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
            <a class="nav-link hide-arrow grid-placekd">
            <i class="fas fa-border-all"></i> 
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0 grid-list-sectiond">
               <div class="dropdown-menu-header border-bottom">
                  <div class="dropdown-header d-flex align-items-center py-3">
                     <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
                     <a href="javascript:void(0)" class="dropdown-shortcuts-add text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Add shortcuts" aria-label="Add shortcuts"><i class="fas fa-grid"></i></a>
                  </div>
               </div>
               <div class="dropdown-shortcuts-list scrollable-container ps">
                  <div class="row row-bordered overflow-visible g-0">
                     <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                        <i class="bx bx-calendar fs-4"></i>
                        </span>
                        <a href="app-calendar.php" class="stretched-link">Calendar</a>
                        <small class="text-muted mb-0">Appointments</small>
                     </div>
                     <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                        <i class="bx bx-food-menu fs-4"></i>
                        </span>
                        <a href="app-invoice-list.php" class="stretched-link">Invoice App</a>
                        <small class="text-muted mb-0">Manage Accounts</small>
                     </div>
                  </div>
                  <div class="row row-bordered overflow-visible g-0">
                     <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                        <i class="bx bx-user fs-4"></i>
                        </span>
                        <a href="app-user-list.php" class="stretched-link">User App</a>
                        <small class="text-muted mb-0">Manage Users</small>
                     </div>
                     <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                        <i class="bx bx-check-shield fs-4"></i>
                        </span>
                        <a href="app-access-roles.php" class="stretched-link">Role Management</a>
                        <small class="text-muted mb-0">Permission</small>
                     </div>
                  </div>
                  <div class="row row-bordered overflow-visible g-0">
                     <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                        <i class="bx bx-pie-chart-alt-2 fs-4"></i>
                        </span>
                        <a href="index.php" class="stretched-link">Dashboard</a>
                        <small class="text-muted mb-0">User Profile</small>
                     </div>
                     <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                        <i class="bx bx-cog fs-4"></i>
                        </span>
                        <a href="pages-account-settings-account.php" class="stretched-link">Setting</a>
                        <small class="text-muted mb-0">Account Settings</small>
                     </div>
                  </div>
                  <div class="row row-bordered overflow-visible g-0">
                     <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                        <i class="bx bx-help-circle fs-4"></i>
                        </span>
                        <a href="help-center-landing.php" class="stretched-link">Help Center</a>
                        <small class="text-muted mb-0">FAQs &amp; Articles</small>
                     </div>
                     <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                        <i class="bx bx-window-open fs-4"></i>
                        </span>
                        <a href="useful-popups.php" class="stretched-link">Modals</a>
                        <small class="text-muted mb-0">Useful Popups</small>
                     </div>
                  </div>
               <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
            </div>
        </div>
            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="btn btn-icon p-0 d-flex justify-content-center align-items-center">
                            <span class="d-flex align-items-center position-relative">
                                <i class="las la-bell fs-24"></i>
                                @if(Auth::user()->unreadNotifications->count() > 0)
                                <span class="badge badge-sm badge-dot badge-circle badge-primary position-absolute absolute-top-right"></span>
                                @endif
                            </span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg py-0">
                        <div class="p-3 bg-light border-bottom">
                            <h6 class="mb-0">{{ translate('Notifications') }}</h6>
                        </div>
                        <div class="px-3 c-scrollbar-light overflow-auto " style="max-height:300px;">
                            <ul class="list-group list-group-flush">
                                @forelse(Auth::user()->unreadNotifications->take(20) as $notification)
                                <li class="list-group-item d-flex justify-content-between align-items- py-3">
                                    <div class="media text-inherit">
                                        <div class="media-body">
                                            @if($notification->type == 'App\Notifications\OrderNotification')
                                            <p class="mb-1 text-truncate-2">
                                                {{translate('Order code: ')}} {{$notification->data['order_code']}} {{ translate('has been '. ucfirst(str_replace('_', ' ', $notification->data['status'])))}}
                                            </p>
                                            <small class="text-muted">
                                                {{ date("F j Y, g:i a", strtotime($notification->created_at)) }}
                                            </small>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                @empty
                                <li class="list-group-item">
                                    <div class="py-4 text-center fs-16">
                                        {{ translate('No notification found') }}
                                    </div>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                        <div class="text-center border-top">
                            <a href="{{ route('admin.all-notification') }}" class="text-reset d-block py-2">
                                {{translate('View All Notifications')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

         

            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <span class="avatar avatar-sm mr-md-2">
                                <img src="{{ uploaded_asset(Auth::user()->avatar_original) }}" onerror="this.onerror=null;this.src='{{ static_asset('assets/img/avatar-place.png') }}';">
                            </span>
                           <!-- <span class="d-none d-md-block">
                                <span class="d-block fw-500">{{Auth::user()->name}}</span>
                                <span class="d-block small opacity-60">{{Auth::user()->user_type}}</span>
                            </span>-->
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-md">
                        <a href="{{ route('profile.index') }}" class="dropdown-item">
                            <i class="las la-user-circle"></i>
                            <span>{{translate('Profile')}}</span>
                        </a>

                        <a href="{{ route('logout')}}" class="dropdown-item">
                            <i class="las la-sign-out-alt"></i>
                            <span>{{translate('Logout')}}</span>
                        </a>
                    </div>
                </div>
            </div><!-- .aiz-topbar-item -->
        </div>
    </div>
</div><!-- .aiz-topbar -->