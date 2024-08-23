<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="{{ route('admin.dashboard') }}" class="d-blockdsa text-left">
                @if (get_setting('system_logo_white') != null)
                    <img class="mw-100 float-left" src="{{ uploaded_asset(get_setting('system_logo_white')) }}"
                        class="brand-icon" alt="{{ get_setting('site_name') }}">
                @else
                    <img class="mw-100" src="{{ static_asset('assets/img/logo.png') }}" class="brand-icon"
                        alt="{{ get_setting('site_name') }}">
                @endif
                {{-- <span class="admin_custom_logo float-right"> admin</span> --}}
            </a>
        </div>

        <div class="aiz-side-nav-wrap">
            <ul class="aiz-side-nav-list" id="search-menu">
            </ul>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                <li class="aiz-side-nav-item dashboard_active">
                    <a href="{{ route('admin.dashboard') }}" class="aiz-side-nav-link ">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Dashboard') }}</span>
                    </a>
                </li>

                <!-- Product -->
                @if (Auth::user()->user_type == 'admin' ||
                        in_array('1', json_decode(Auth::user()->staff->role->permissions)) ||
                        in_array('1', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('categories.index') }}"
                            class="aiz-side-nav-link {{ areActiveRoutes(['categories.index', 'categories.create', 'categories.edit']) }}">
                            <i class="fa fa-list-alt aiz-side-nav-icon" aria-hidden="true"></i>
                            <span class="aiz-side-nav-text">{{ translate('Category') }}</span>
                        </a>
                    </li>

                    {{-- <li class="aiz-side-nav-item">
                        <a href="{{ route('types.index') }}"
                            class="aiz-side-nav-link {{ areActiveRoutes(['types.index', 'types.create', 'types.update']) }}">
                            <i class="fa fa-list-alt aiz-side-nav-icon" aria-hidden="true"></i>
                            <span class="aiz-side-nav-text">{{ translate('Service Type') }}</span>
                        </a>
                    </li> --}}

                    <li class="aiz-side-nav-item">
                        <a href="{{ route('brands.index') }}"
                            class="aiz-side-nav-link {{ areActiveRoutes(['brands.index', 'brands.create', 'brands.edit']) }}">
                            <i class="fas fa-tags aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Brand') }}</span>
                        </a>
                    </li>

                    <li class="aiz-side-nav-item">
                        <a href="{{ route('attributes.index') }}"
                            class="aiz-side-nav-link {{ areActiveRoutes(['attributes.index', 'attributes.create', 'attributes.edit']) }}">
                            <i class="fa fa-ellipsis-h aiz-side-nav-icon" aria-hidden="true"></i>
                            <span class="aiz-side-nav-text">{{ translate('Attribute') }}</span>
                        </a>
                    </li>

                    <li class="aiz-side-nav-item">
                        <a href="{{ route('colors') }}"
                            class="aiz-side-nav-link {{ areActiveRoutes(['attributes.index', 'attributes.create', 'attributes.edit']) }}">
                            <i class="fa fa-tint aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Colors') }}</span>
                        </a>
                    </li>
                @endif

                {{-- Products --}}
                {{-- @if (Auth::user()->user_type == 'admin' || in_array('3', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="fa fa-box aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{translate('Products')}}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">

                            <li class="aiz-side-nav-item">
                                <a href="{{route('products.all')}}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('All Products') }}</span>
                                </a>
                            </li>


                            @if (get_setting('vendor_system_activation') == 1)
                            <li class="aiz-side-nav-item">
                                <a href="{{route('products.seller')}}" class="aiz-side-nav-link {{ areActiveRoutes(['products.seller', 'products.seller.edit']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('Seller Products') }}</span>
                                </a>
                            </li>
                            @endif

                            @if (false)
                                <li class="aiz-side-nav-item">
                                    <a href="{{route('reviews.index')}}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{translate('Product Reviews')}}</span>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif --}}

                {{-- Product Master --}}
                @if (Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="fa fa-cube aiz-side-nav-icon" aria-hidden="true"></i>
                            <span class="aiz-side-nav-text">{{ translate('Products') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a class="aiz-side-nav-link" href="{{ route('products.create') }}">
                                    <span class="aiz-side-nav-text">{{ translate('Add Product') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('products.all') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('All Product') }}</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif

                <!-- Commented by AviSingh -->
                @if (false)
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="fa fa-list-alt aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Category') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a class="aiz-side-nav-link" href="{{ route('categories.addcategory') }}">
                                    <span class="aiz-side-nav-text">{{ translate('Add Category') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('categories.categorylist') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('All Categories') }}</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif

                {{-- Service Master --}}
                {{-- @if (Auth::user()->user_type == 'admin' || in_array('2', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="fa fa-cog aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Service Masters') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a class="aiz-side-nav-link" href="{{ route('master_services.create') }}">
                                    <span class="aiz-side-nav-text">{{ translate('Add Service Master') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('master_services.all') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('All Service master') }}</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif --}}

                <!-- Service -->
                {{-- @if (Auth::user()->user_type == 'admin' || in_array('4', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="fa fa-wrench aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Services') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('services.all') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('All Services') }}</span>
                                </a>
                            </li>

                            @if (get_setting('vendor_system_activation') == 1)
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('services.seller') }}"
                                        class="aiz-side-nav-link {{ areActiveRoutes(['products.seller', 'products.seller.edit']) }}">
                                        <span class="aiz-side-nav-text">{{ translate('Seller Services') }}</span>
                                    </a>
                                </li>
                            @endif

                            @if (false)
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('service.reviews') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{ translate('Service Reviews') }}</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif --}}

                <!-- Sale -->
                @if (Auth::user()->user_type == 'admin' ||
                        in_array('5', json_decode(Auth::user()->staff->role->permissions)) ||
                        in_array('6', json_decode(Auth::user()->staff->role->permissions)) ||
                        in_array('7', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-money-bill aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Sales') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">
                            {{-- Product Order --}}
                            @if (Auth::user()->user_type == 'admin' || in_array('5', json_decode(Auth::user()->staff->role->permissions)))
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('all_orders.index') }}"
                                        class="aiz-side-nav-link {{ areActiveRoutes(['all_orders.index', 'all_orders.show']) }}">
                                        <span class="aiz-side-nav-text">{{ translate('All Product Orders') }}</span>
                                    </a>
                                </li>
                            @endif

                            {{-- Service Order --}}
                            {{-- @if (Auth::user()->user_type == 'admin' || in_array('6', json_decode(Auth::user()->staff->role->permissions)))
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('service.all_orders.index') }}"
                                        class="aiz-side-nav-link {{ areActiveRoutes(['service.all_orders.index', 'service.all_orders.show']) }}">
                                        <span class="aiz-side-nav-text">{{ translate('All Service Orders') }}</span>
                                    </a>
                                </li>

                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('service.service-quotation-request') }}"
                                        class="aiz-side-nav-link {{ areActiveRoutes(['service.service-quotation-request']) }}">
                                        <span class="aiz-side-nav-text">{{ translate('All Service Quotation') }}</span>
                                    </a>
                                </li>
                            @endif --}}

                            {{-- Pickup Point Order --}}
                            @if (Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('pick_up_point.order_index') }}"
                                        class="aiz-side-nav-link {{ areActiveRoutes(['pick_up_point.order_index', 'pick_up_point.order_show']) }}">
                                        <span class="aiz-side-nav-text">{{ translate('Pick-up Point Order') }}</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                <!--Bulk Order-->
                {{-- @if (Auth::user()->user_type == 'admin' || in_array('15', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="fas fa-shapes aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{translate('Bulk Order')}}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <!--Submenu-->
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('bulkorders.request') }}" class="aiz-side-nav-link {{ areActiveRoutes(['bulkorders.request', 'bulkorders.show'])}}">
                                    <span class="aiz-side-nav-text">{{translate('All Bulk Order Request')}}</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif --}}

                {{-- Franchise Menu --}}
                {{-- @if (Auth::user()->user_type == 'admin')
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-friends aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Franchise') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ url('admin/franchise/list') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Franchise list') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ url('admin/franchise/add-franchise') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Add Franchise') }}</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif --}}

                <!-- Customers -->
                @if (Auth::user()->user_type == 'admin' || in_array('8', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-friends aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Customers') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('customers.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Customer list') }}</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif

                <!-- Sellers -->
                @if (
                    (Auth::user()->user_type == 'admin' || in_array('9', json_decode(Auth::user()->staff->role->permissions))) &&
                        get_setting('vendor_system_activation') == 1)
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Sellers') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                @php
                                    $sellers = \App\Models\Shop::where('verification_status', 0)
                                        ->where('verification_info', '!=', null)
                                        ->count();
                                @endphp
                                <a href="{{ route('sellers.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['sellers.index', 'sellers.create', 'sellers.edit', 'sellers.payment_history', 'sellers.approved', 'sellers.profile_modal', 'sellers.show_verification_request']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('All Seller') }}</span>
                                    @if ($sellers > 0)
                                        <span class="badge badge-info">{{ $sellers }}</span>
                                    @endif
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('categoryUpdateRequest') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Category Update Request') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('sellers.payment_histories') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Payouts') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('withdraw_requests_all') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Payout Requests') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('business_settings.vendor_commission') }}"
                                    class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Seller Commission') }}</span>
                                </a>
                            </li>


                        </ul>
                    </li>
                @endif

                <!-- Upload Files -->
                @if (Auth::user()->user_type == 'admin' || in_array('22', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('uploaded-files.index') }}"
                            class="aiz-side-nav-link {{ areActiveRoutes(['uploaded-files.create']) }}">
                            <i class="fa fa-upload aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Uploaded Files') }}</span>
                        </a>
                    </li>
                @endif

                <!-- Reports -->
                @if (Auth::user()->user_type == 'admin' || in_array('10', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-file-alt aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Reports') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">

                            <li class="aiz-side-nav-item">
                                <a href="{{ route('seller_sale_report.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['seller_sale_report.index']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('Seller Products Sale') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('stock_report.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['stock_report.index']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('Products Stock') }}</span>
                                </a>
                            </li>

                            <li class="aiz-side-nav-item">
                                <a href="{{ route('user_search_report.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['user_search_report.index']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('User Searches') }}</span>
                                </a>
                            </li>

                            <li class="aiz-side-nav-item">
                                <a href="{{ route('commission-log.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Commission History') }}</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif

                <!--Blog System-->
                @if (Auth::user()->user_type == 'admin' || in_array('23', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="fa fa-blog aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Blog System') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('blog.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['blog.create', 'blog.edit']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('All Posts') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('blog.news') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['blog.create', 'blog.edit']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('All News') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('blog-category.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['blog-category.create', 'blog-category.edit']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('Categories') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- marketing -->
                @if (Auth::user()->user_type == 'admin' || in_array('11', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-bullhorn aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Sponsored Marketing') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">

                            <li class="aiz-side-nav-item">
                                <a href="{{ route('flash_deals.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['flash_deals.index', 'flash_deals.create', 'flash_deals.edit']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('Flash deals') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('flash_deals_item.index') }}" class="aiz-side-nav-link ">
                                    <span class="aiz-side-nav-text">{{ translate('Flash deal Items') }}</span>
                                </a>
                            </li>

                            @if (Auth::user()->user_type == 'admin' || in_array('7', json_decode(Auth::user()->staff->role->permissions)))
                                <li class="aiz-side-nav-item">
                                    <a href="{{ route('newsletters.index') }}" class="aiz-side-nav-link">
                                        <span class="aiz-side-nav-text">{{ translate('Newsletters') }}</span>
                                    </a>
                                </li>
                                @if (addon_is_activated('otp_system'))
                                    <li class="aiz-side-nav-item">
                                        <a href="{{ route('sms.index') }}" class="aiz-side-nav-link">
                                            <span class="aiz-side-nav-text">{{ translate('Bulk SMS') }}</span>
                                        </a>
                                    </li>
                                @endif
                            @endif
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('subscribers.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Subscribers') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('coupon.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['coupon.index', 'coupon.create', 'coupon.edit']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('Coupon') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Website Setup -->
                @if (Auth::user()->user_type == 'admin' || in_array('13', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#"
                            class="aiz-side-nav-link {{ areActiveRoutes(['website.footer', 'website.header', 'website.cat-wise-brand-list', 'website.cat-wise-offer-list', 'website.home-category-section']) }}">
                            <i class="las la-desktop aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Website Setup') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ url('admin/sitemaps') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('SiteMaps') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('website.header') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Header') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('website.footer', ['lang' => App::getLocale()]) }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['website.footer']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('Footer') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('website.pages') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['website.pages', 'custom-pages.create', 'custom-pages.edit']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('Pages') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('website.appearance') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Appearance') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('website.cat-wise-brand-list') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Category Wise Brand') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('website.cat-wise-offer-list') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Category Wise Offer') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('website.home-category-section') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Home Category Section') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- Enquiry Setup -->
                @if (Auth::user()->user_type == 'admin' || in_array('16', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#"
                            class="aiz-side-nav-link {{ areActiveRoutes(['admin/enquiry', 'enq.productEnquiry']) }}">
                            <i class="fa fa-question aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Enquiry') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ url('admin/enquiry') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Enquiry') }}</span>
                                </a>
                                <a href="{{ url('admin/enquiry/product-enquiry') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Product Request Enquiry') }}</span>
                                </a>
                                <a href="{{ url('admin/enquiry/hire-now-request') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Hire Now Request') }}</span>
                                </a>
                                <a href="{{ url('admin/enquiry/common-enquiry') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Common Enquiry List') }}</span>
                                </a>
                                <a href="{{ url('admin/comming_soon/enquiry') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Comming Soon Enquiry') }}</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif

                {{-- SMS QUEUE SETUP- --}}

                {{-- @if (Auth::user()->user_type == 'admin' || in_array('16', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link {{ areActiveRoutes(['sms_list', 'sms_list']) }}">
                            <i class="fa fa-envelope aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('SMS') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('sms_list') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Sent SMS List') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('email_list') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Sent Email List') }}</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endif --}}

                <!-- Setup & Configurations -->
                @if (Auth::user()->user_type == 'admin' || in_array('14', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-dharmachakra aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Setup & Configurations') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('general_setting.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('General Settings') }}</span>
                                </a>
                            </li>

                            <li class="aiz-side-nav-item">
                                <a href="{{ route('tax.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['tax.index', 'tax.create', 'tax.store', 'tax.show', 'tax.edit']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('Vat & TAX') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('pick_up_points.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['pick_up_points.index', 'pick_up_points.create', 'pick_up_points.edit']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('Pickup point') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('smtp_settings.index') }}" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('SMTP Settings') }}</span>
                                </a>
                            </li>

                            <li class="aiz-side-nav-item">
                                <a href="javascript:void(0);" class="aiz-side-nav-link">
                                    <span class="aiz-side-nav-text">{{ translate('Shipping') }}</span>
                                    <span class="aiz-side-nav-arrow"></span>
                                </a>
                                <ul class="aiz-side-nav-list level-3">
                                    <li class="aiz-side-nav-item">
                                        <a href="{{ route('shipping_configuration.index') }}"
                                            class="aiz-side-nav-link {{ areActiveRoutes(['shipping_configuration.index', 'shipping_configuration.edit', 'shipping_configuration.update']) }}">
                                            <span
                                                class="aiz-side-nav-text">{{ translate('Shipping Configuration') }}</span>
                                        </a>
                                    </li>
                                    <li class="aiz-side-nav-item">
                                        <a href="{{ route('countries.index') }}"
                                            class="aiz-side-nav-link {{ areActiveRoutes(['countries.index', 'countries.edit', 'countries.update']) }}">
                                            <span
                                                class="aiz-side-nav-text">{{ translate('Shipping Countries') }}</span>
                                        </a>
                                    </li>
                                    <li class="aiz-side-nav-item">
                                        <a href="{{ route('states.index') }}"
                                            class="aiz-side-nav-link {{ areActiveRoutes(['states.index', 'states.edit', 'states.update']) }}">
                                            <span class="aiz-side-nav-text">{{ translate('Shipping States') }}</span>
                                        </a>
                                    </li>
                                    <li class="aiz-side-nav-item">
                                        <a href="{{ route('cities.index') }}"
                                            class="aiz-side-nav-link {{ areActiveRoutes(['cities.index', 'cities.edit', 'cities.update']) }}">
                                            <span class="aiz-side-nav-text">{{ translate('Shipping Cities') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                @endif

                <!-- Staffs -->
                @if (Auth::user()->user_type == 'admin' || in_array('20', json_decode(Auth::user()->staff->role->permissions)))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-user-tie aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Staffs') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('staffs.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['staffs.index', 'staffs.create', 'staffs.edit']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('All staffs') }}</span>
                                </a>
                            </li>
                            <li class="aiz-side-nav-item">
                                <a href="{{ route('roles.index') }}"
                                    class="aiz-side-nav-link {{ areActiveRoutes(['roles.index', 'roles.create', 'roles.edit']) }}">
                                    <span class="aiz-side-nav-text">{{ translate('Staff permissions') }}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif


            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->
