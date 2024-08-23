@extends('backend.layouts.app')

@section('content')
@if(env('MAIL_USERNAME') == null && env('MAIL_PASSWORD') == null)
    <div class="">
        <div class="alert alert-danger d-flex align-items-center">
            {{translate('Please Configure SMTP Setting to work all email sending functionality')}},
            <a class="alert-link ml-2" href="{{ route('smtp_settings.index') }}">{{ translate('Configure Now') }}</a>
        </div>
    </div>
@endif
@if(Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
<!--1st Row Start -->
<div class="row gutters-10">
    <div class="col-lg-12">
        <div class="row gutters-10">
            <div class="col-3">
                <div class="box-shadow-opacitys align-items-center justify-content-between text-white rounded-lg mb-4 overflow-hidden">
                    <div class="px-3 pt-3 text-center">
                        <div class="opacity-50">
                            <span class="fs-12 d-block">{{ translate('Total') }}</span>
                            {{ translate('Customer Order') }}
                        </div>
                        <i class="fa fa-solid fa-user"></i>
                        <div class="h3 fw-700 mb-3">
                            {{ \App\Models\User::where('user_type', 'customer')->where('email_verified_at', '!=', null)->count() }}
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                            d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="col-3">
                <div class="box-shadow-opacitys align-items-center justify-content-between text-white rounded-lg mb-4 overflow-hidden">
                    <div class="px-3 pt-3 text-center">
                        <div class="opacity-50">
                            <span class="fs-12 d-block">{{ translate('Total') }}</span>
                            {{ translate('Order Received') }}
                        </div>
                        <i class="fa fa-solid fa-box"></i>
                        <div class="h3 fw-700 mb-3">{{ \App\Models\Order::count() }}</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                            d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="col-3">
                <div class="box-shadow-opacitys align-items-center justify-content-between  text-white rounded-lg mb-4 overflow-hidden">
                    <div class="px-3 pt-3 text-center">
                        <div class="opacity-50">
                            <span class="fs-12 d-block">{{ translate('Total') }}</span>
                            {{ translate('Product categories') }}
                        </div>
                        <i class="fa fa-solid fa-cube"></i>
                        <div class="h3 fw-700 mb-3">{{ \App\Models\Category::count() }}</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                            d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                        </path>
                    </svg>
                </div>
            </div>
            <div class="col-3">
                <div class=" box-shadow-opacitys text-white rounded-lg mb-4 overflow-hidden">
                    <div class="px-3 pt-3 text-center">
                        <div class="opacity-50">
                            <span class="fs-12 d-block">{{ translate('Total') }}</span>
                            {{ translate('Product brands') }}
                        </div>
                        <i class="fa fa-solid fa-desktop"></i>
                        <div class="h3 fw-700 mb-3">{{ \App\Models\Brand::count() }}</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                        <path fill="rgba(255,255,255,0.3)" fill-opacity="1"
                            d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
<!--1st Row End -->

{{-- <div class="row gutters-10">
    <div class="col-lg-12">
        <div class="row gutters-10">
            <div class="col-6">
                <div class="card px-5 pb-3">
                    <div class="card-header">
                        <h6 class="mb-0 fs-14">{{ translate('Products') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4" style="position: relative;">
                           <div class="d-flex flex-column align-items-center gap-1">
                                <h2 class="mb-2">
                                {{ \App\Models\Order::where('delivery_status', 'completed')->count() }}
                                </h2>
                                <span>Total Orders</span>
                            </div> 
                            <div id="orderStatisticsChart" style="min-height: 170px;width:200px">
                                <canvas id="pie-1" class="w-10" width="200" height="200"></canvas>
                            </div>
                        </div>

                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class="fa fa-mobile-alt"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Total Published </h6>
                                        <small class="text-muted">Products</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">
                                            {{ \App\Models\Product::where('published', 1)->count() }}
                                        </small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-success"><i class="fa fa-cubes"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Total Un-published</h6>
                                        <small class="text-muted">Products</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">
                                            {{ \App\Models\Product::where('published', 0)->count() }}
                                        </small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-info"><i class="fa fa-home"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Total Vender</h6>
                                        <small class="text-muted">Products</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">
                                            {{ \App\Models\Product::where('published', 1)->where('added_by', 'seller')->count() }}
                                        </small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-secondary">
                                        <i class="fa fa-solid fa-futbol"></i>
                                    </span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Total Admin</h6>
                                        <small class="text-muted">Products</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">
                                        {{ \App\Models\Product::where('published', 1)->where('added_by', 'admin')->count() }}
                                        </small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card px-5 pb-3">
                    <div class="card-header">
                        <h6 class="mb-0 fs-14">{{ translate('Vendors') }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4" style="position: relative;">
                           <div class="d-flex flex-column align-items-center gap-1">
                                <h2 class="mb-2">
                                {{ \App\Models\Order::where('delivery_status', 'completed')->count() }}
                                </h2>
                                <span>Total Orders</span>
                            </div> 
                            <div id="orderStatisticsChart" style="min-height: 170px;width:200px">
                                <canvas id="pie-2" class="w-10" width="200" height="200"></canvas>
                            </div>
                        </div>

                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class="fa fa-mobile-alt"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Total </h6>
                                        <small class="text-muted">Vendor</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">
                                        {{ \App\Models\Seller::count() }}
                                        </small>
                                    </div>
                                </div>
                            </li>
                            
                        
                        
                    
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-success"><i class="fa fa-cubes"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Total Approved</h6>
                                        <small class="text-muted">Vendor</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">
                                        {{ \App\Models\Seller::where('verification_status', 1)->count() }}
                                        </small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-info"><i class="fa fa-home"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Total Pending</h6>
                                        <small class="text-muted">Vendor</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-semibold">
                                        {{ \App\Models\Seller::where('verification_status', 0)->count() }}
                                        </small>
                                    </div>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> --}}
@endif


@if(Auth::user()->user_type == 'admin' || in_array('1', json_decode(Auth::user()->staff->role->permissions)))
    {{-- <div class="row gutters-10">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0 fs-14">{{ translate('Category wise product sale') }}</h6>
                </div>
                <div class="card-body">
                    <canvas id="graph-1" class="w-100" height="500"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0 fs-14">{{ translate('Category wise product stock') }}</h6>
                </div>
                <div class="card-body">
                    <canvas id="graph-2" class="w-100" height="500"></canvas>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- <div class="card mt-4">
        <div class="table-responsive text-nowrap">
            <table class="table text-nowrap">
                <thead>
                    <tr>                   
                        <th>{{ translate('Product') }}</th>
                        <th>{{ translate('Amount') }}</th>
                        <th>{{ translate('Order Status') }}</th>
                        <th>{{ translate('Payment Status') }}</th>
                        <th>{{translate('Actions')}}</th>
                    
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0 table-werost">
                    
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ static_asset('assets/img/oneplus.png') }} " alt="Oneplus" height="32"
                                    width="32" class="me-2">
                                <div class="d-flex flex-column">
                                    <span class="fw-semibold lh-1">OnePlus 7Pro</span>
                                    <small class="text-muted">OnePlus</small>
                                </div>
                            </div>
                        </td>

                        <td>
                            <span class="badge bg-label-primary rounded-pill badge-center p-3 me-2">
                                <i class="fa fa-mobile-alt bx-xs"></i>
                            </span>
                            Smart Phone
                        </td> 

                        <td>
                            <div class="text-muted lh-1">
                                <span class="text-primary fw-semibold">
                                    Rs.120
                                </span>
                            </div>
                        </td>

                        <td>
                            <span class="badge bg-label-primary d-block mt-2 p-2 h-auto w-auto">
                                Confirmed
                            </span>
                        </td>

                        <td>
                            <div class="dropdown">
                                <button type="button" id="" class="btn  m-auto px-3 w-25 d-block dropdown-toggle hide-arrow">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </button>

                                <div id="" class="dropdown-menu button0001 drop-downs1">
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <i class="fa fa-edit-alt me-1"></i>
                                        View Detail 
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <i class="fa fa-trash me-1"></i> 
                                        Buy Again
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div> -->
@endif

@endsection
@section('script')
<script type="text/javascript">
    AIZ.plugins.chart('#pie-1',{
        type: 'doughnut',
        data: {
            labels: [
                '{{translate('Total published products')}}',
                '{{translate('Total unpublished products')}}',
                '{{translate('Total Vendors products')}}',
                '{{translate('Total admin products')}}'
            ],
            datasets: [
                {
                    data: [
                        {{ \App\Models\Product::where('published', 1)->count() }},
                        {{ \App\Models\Product::where('published', 0)->count() }},
                        {{ \App\Models\Product::where('published', 1)->where('added_by', 'seller')->count() }},
                        {{ \App\Models\Product::where('published', 1)->where('added_by', 'admin')->count() }}
                    ],
                    backgroundColor: [
                        "#696cff",
                        "#8592a3",
                        "#03c3ec",
                        '#71dd37',
                        '#d35400',
                        '#8e44ad',
                        '#006442',
                        '#4D8FAC',
                        '#CA6924',
                        '#C91F37'
                    ]
                }
            ]
        },
        options: {
            cutoutPercentage: 80,
            legend: {
                labels: {
                    fontFamily: 'Poppins',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
                position: 'bottom'
            }
        }
    });

    AIZ.plugins.chart('#pie-2',{
        type: 'doughnut',
        data: {
            labels: [
                '{{translate('Total Vendors')}}',
                '{{translate('Total approved Vendors')}}',
                '{{translate('Total pending Vendors')}}'
            ],
            datasets: [
                {
                    data: [
                        {{ \App\Models\Seller::count() }},
                        {{ \App\Models\Seller::where('verification_status', 1)->count() }},
                        {{ \App\Models\Seller::where('verification_status', 0)->count() }}
                    ],
                    backgroundColor: [
                        "#696cff",
                        "#8592a3",
                        "#03c3ec",
                        '#71dd37',
                        '#fdcb6e',
                        '#d35400',
                        '#8e44ad',
                        '#006442',
                        '#4D8FAC',
                        '#CA6924',
                        '#C91F37'
                    ]
                }
            ]
        },
        options: {
            cutoutPercentage: 80,
            legend: {
                labels: {
                    fontFamily: 'Montserrat',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
                position: 'bottom'
            }
        }
    });
    AIZ.plugins.chart('#graph-1',{
        type: 'bar',
        data: {
            labels: [
                @foreach ($root_categories as $key => $category)
                '{{ $category->getTranslation('name') }}',
                @endforeach
            ],
            datasets: [{
                label: '{{ translate('Number of sale') }}',
                data: [
                    {{ $cached_graph_data['num_of_sale_data'] }}
                ],
                backgroundColor: [
                    @foreach ($root_categories as $key => $category)
                        'rgba(55, 125, 255, 0.4)',
                    @endforeach
                ],
                borderColor: [
                    @foreach ($root_categories as $key => $category)
                        'rgba(55, 125, 255, 1)',
                    @endforeach
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    gridLines: {
                        color: '#f2f3f8',
                        zeroLineColor: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10,
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10
                    }
                }]
            },
            legend:{
                labels: {
                    fontFamily: 'Poppins',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
            }
        }
    });
    AIZ.plugins.chart('#graph-2',{
        type: 'bar',
        data: {
            labels: [
                @foreach ($root_categories as $key => $category)
                '{{ $category->getTranslation('name') }}',
                @endforeach
            ],
            datasets: [{
                label: '{{ translate('Number of Stock') }}',
                data: [
                    {{ $cached_graph_data['qty_data'] }}
                ],
                backgroundColor: [
                    @foreach ($root_categories as $key => $category)
                        'rgba(253, 57, 149, 0.4)',
                    @endforeach
                ],
                borderColor: [
                    @foreach ($root_categories as $key => $category)
                        'rgba(253, 57, 149, 1)',
                    @endforeach
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    gridLines: {
                        color: '#f2f3f8',
                        zeroLineColor: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10,
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: '#f2f3f8'
                    },
                    ticks: {
                        fontColor: "#8b8b8b",
                        fontFamily: 'Poppins',
                        fontSize: 10
                    }
                }]
            },
            legend:{
                labels: {
                    fontFamily: 'Poppins',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
            }
        }
    });
</script>
@endsection
