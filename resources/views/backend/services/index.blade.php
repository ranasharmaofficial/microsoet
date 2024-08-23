@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h4 class="fw-bold py-3 mb-4">{{translate('All Services')}}</h4>
        </div>
        @if(False)
            @if($type != 'Seller')
            <div class="col text-right">
                <a href="{{ route('services.create') }}" class="btn btn-circle btn-info">
                    <span>{{translate('Add New Service')}}</span>
                </a>
            </div>
            @endif
        @endif
    </div>
</div>
<br>

<div class="card">
    <form class="" id="sort_products" action="" method="GET">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-md-0 h6">{{ translate('All Services') }}</h5>
            </div>
            <div class="col text-right">
                <a href="{{route('get_service_data.export')}}" class="btn btn-circle btn-info">
                    <span>{{translate('Export in Excel')}}</span>
                </a>
            </div>
            @if(false)
            <div class="dropdown col-md-2 ml-auto">
                <button class="btn border dropdown-toggle" type="button" data-toggle="dropdown">
                    {{translate('Bulk Action')}}
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#" onclick="bulk_delete()"> {{translate('Delete selection')}}</a>
                </div>
            </div>
            @endif

            <div class="col-md-3 ml-auto">
                <select class="form-control form-control-sm aiz-selectpicker mb-2 mb-md-0" id="user_id" name="user_id" onchange="sort_products()">
                    <option value="">{{ translate('All Sellers') }}</option>
                    @foreach (App\Models\Seller::all() as $key => $seller)
                        @if ($seller->user != null && $seller->user->shop != null)
                            <option value="{{ $seller->user->id }}" @if ($seller->user->id == $seller_id) selected @endif>{{ $seller->user->shop->name }} ({{ $seller->user->name }})</option>
                        @endif
                    @endforeach
                </select>
            </div>


            <div class="col-md-3">
                <div class="form-group mb-0">
                    <input type="text" class="form-control form-control-sm" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type & Enter') }}">
                </div>
            </div>
        </div>

        <div class="card-header row gutters-5">
            <div class="col-md-3 mb-2">
                <select class="form-control" id="firstcategory" onchange="category1(this.value);" name="first_category">
                    <option value="">Select Parent Category</option>
                    @foreach($category as $categories)
                    <option value="{{$categories['id']}}">{{$categories['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mb-2">
                <select class="form-control" id="secondcategory" onchange="category2(this.value);" name="second_category">
                    <option value="">Select Sub Category</option>
                </select>
            </div>
            <div class="col-md-3 mb-2">
                <select class="form-control" id="thirdcategory" onchange="category3(this.value)" name="third_category">
                    <option value="">Select Third Category</option>
                </select>
            </div>

            <div class="col-md-3 mb-2">
                <div class="d-flex">
                    <button type="button" id="find" class="btn btn-warning mr-2" onclick="sort_products()">Find</button>
                    @if($type == 'All')
                        <a href="all" class="btn btn-dark">Reset</a>
                    @else
                        <a href="seller" class="btn btn-dark">Reset</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th>
                            <div class="form-group">
                                <div class="aiz-checkbox-inline">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" class="check-all">
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                            </div>
                        </th>
                        <!--<th data-breakpoints="lg">#</th>-->
                        <th>{{translate('Service Id')}}</th>
                        <th>{{translate('Sku Code')}}</th>
                        <th>{{translate('Name')}}</th>
                        @if($type == 'Seller' || $type == 'All')
                            <th>{{translate('Added By')}}</th>
                        @endif
                        <th data-breakpoints="sm">{{translate('Info')}}</th>
                        <th data-breakpoints="lg">{{translate('Published')}}</th>
                        @if(get_setting('product_approve_by_admin') == 1)
                            <th data-breakpoints="lg">{{translate('Approved')}}</th>
                        @endif
                        <th data-breakpoints="lg">{{translate('Featured')}}</th>
                        <th data-breakpoints="sm" class="text-right">{{translate('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $key => $service)
                    <tr>
                        <!--<td>{{ ($key+1) + ($services->currentPage() - 1)*$services->perPage() }}</td>-->
                        <td>
                            <div class="form-group d-inline-block">
                                <label class="aiz-checkbox">
                                    <input type="checkbox" class="check-one" name="id[]" value="{{$service->id}}">
                                    <span class="aiz-square-check"></span>
                                </label>
                            </div>
                        </td>
                        <td>
                            {{ $service->id }}
                        </td>
                        <td>
                            {{ $service->sku }}
                        </td>
                        <td>
                            <div class="row gutters-5 w-200px w-md-300px mw-100">
                                <div class="col-auto">
                                    <img src="{{ uploaded_asset($service->thumbnail_img)}}" alt="Image" class="size-50px img-fit">
                                </div>
                                <div class="col">
                                    <span class="text-muted text-truncate-2">{{ $service->getTranslation('name') }}</span>
                                </div>
                            </div>
                        </td>
                        @if($type == 'Seller' || $type == 'All' && $service->user_id != null)
                            <td>{{ $service->user->name }}</td>
                            {{-- <td>{{ $service->user_id }}</td> --}}
                        @else
                            <td class="text-danger">Not Valid Entry</td>
                        @endif
                        <td>
                            <strong>{{translate('Base Price')}}:</strong> {{ single_price($service->unit_price) }} </br>
                        </td>

                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_published(this)" value="{{ $service->id }}" type="checkbox" <?php if ($service->published == 1) echo "checked"; ?> >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        @if(get_setting('product_approve_by_admin') == 1)
                            <td>
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input onchange="update_approved(this)" value="{{ $service->id }}" type="checkbox" <?php if ($service->approved == 1) echo "checked"; ?> >
                                    <span class="slider round"></span>
                                </label>
                            </td>
                        @endif
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input onchange="update_featured(this)" value="{{ $service->id }}" type="checkbox" <?php if ($service->featured == 1) echo "checked"; ?> >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td class="text-right">
                            <a class="btn btn-soft-success btn-icon btn-circle btn-sm"  href="{{ route('service', $service->slug) }}" target="_blank" title="{{ translate('View') }}">
                                <i class="las la-eye"></i>
                            </a>
                            @if ($type == 'Seller')
                            {{-- <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('service.seller.edit', ['id'=>$service->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                <i class="las la-edit"></i>
                            </a> --}}
                            @else
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('services.admin.edit', ['id'=>$service->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                <i class="las la-edit"></i>
                            </a>
                            @endif

                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('services.destroy', $service->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $services->appends(request()->input())->links() }}
            </div>
        </div>
    </form>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')
    <script type="text/javascript">
        $(document).on("change", ".check-all", function() {
            if(this.checked) {
                // Iterate each checkbox
                $('.check-one:checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.check-one:checkbox').each(function() {
                    this.checked = false;
                });
            }

        });

        $(document).ready(function(){
            //$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
        });

        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('services.published') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Published service updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_approved(el){
            if(el.checked){
                var approved = 1;
            }
            else{
                var approved = 0;
            }
            $.post('{{ route('services.approved') }}', {
                _token      :   '{{ csrf_token() }}',
                id          :   el.value,
                approved    :   approved
            }, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Service approval update successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('services.featured') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Featured Service updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function category1(id1){
            // brandname(id1);
            $.ajax({
                type:"get",
                url:"{{route('product-master.get-second-level')}}",
                data:{"_token": "{{ csrf_token() }}",categoryid:id1,type:2},
                dataType:"json",
                success:function(data)
                {
                    var html =  ``;
                    html+=`<option value="">Select Sub Category</option>`;
                    $(data).each(function(i,j){
                        html+=`<option value="${j.id}">${j.name}</option>`;
                    });
                    $("#secondcategory").html(html);
                }

            })

        }

        function category2(id1){
            // brandname(id1);
            $.ajax({
                type:"get",
                url:"{{route('product-master.get-third-level')}}",
                data:{"_token": "{{ csrf_token() }}",subcategoryid:id1,type:2},
                dataType:"json",
                success:function(data)
                {
                    var html =  ``;
                    html+=`<option value="">Select 3 Level Category</option>`;
                    $(data).each(function(i,j){
                        html+=`<option value="${j.id}">${j.name}</option>`;
                    });
                    $("#thirdcategory").html(html);
                }

            })

        }

        function sort_products(el){
            $('#sort_products').submit();
        }

        function bulk_delete() {
            var data = new FormData($('#sort_products')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('bulk-product-delete')}}",
                type: 'POST',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response == 1) {
                        location.reload();
                    }
                }
            });
        }

    </script>
@endsection
