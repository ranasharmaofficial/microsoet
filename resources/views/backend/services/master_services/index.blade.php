@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h4 class="fw-bold py-3 mb-4">{{translate('All Master Services')}}</h4>
        </div>
        @if($type != 'Seller')
        <div class="col text-right">
            <a href="{{ route('master_services.create') }}" class="btn btn-circle btn-info">
                <span>{{translate('Add New Master Service')}}</span>
            </a>
        </div>
        @endif
    </div>
</div>
<br>

<div class="card">
    <form class="" id="sort_products" action="" method="GET">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-md-0 h6">{{ translate('All Master Services') }}</h5>
            </div>
            
            <div class="col-md-4">
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
                    <a href="all" class="btn btn-dark">Reset</a>
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
                        <th>{{translate('Name')}}</th>
                        @if($type == 'Seller' || $type == 'All')
                            <th data-breakpoints="lg">{{translate('Added By')}}</th>
                        @endif
                        <th data-breakpoints="sm">{{translate('Info')}}</th>
                        <th data-breakpoints="lg">{{translate('Published')}}</th>
                        @if(get_setting('product_approve_by_admin') == 1 && $type == 'Seller')
                            <th data-breakpoints="lg">{{translate('Approved')}}</th>
                        @endif
                        <th data-breakpoints="sm" class="text-right">{{translate('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($master_services as $key => $service)
                    <tr>
                        <!--<td>{{ ($key+1) + ($master_services->currentPage() - 1)*$master_services->perPage() }}</td>-->
                        <td>
                            <div class="form-group d-inline-block">
                                <label class="aiz-checkbox">
                                    <input type="checkbox" class="check-one" name="id[]" value="{{$service->id}}">
                                    <span class="aiz-square-check"></span>
                                </label>
                            </div>
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
                        @if($type == 'Seller' || $type == 'All')
                            <td>{{ $service->user->name }}</td>
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
                        @if(get_setting('product_approve_by_admin') == 1 && $type == 'Seller')
                            <td>
                                <label class="aiz-switch aiz-switch-success mb-0">
                                    <input onchange="update_approved(this)" value="{{ $service->id }}" type="checkbox" <?php if ($service->approved == 1) echo "checked"; ?> >
                                    <span class="slider round"></span>
                                </label>
                            </td>
                        @endif
                       
                        <td class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('master_services.admin.edit', ['id'=>$service->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                <i class="las la-edit"></i>
                            </a>
                            
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('master_services.destroy', $service->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $master_services->appends(request()->input())->links() }}
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
            $.post('{{ route('products.published') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Published products updated successfully') }}');
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
            $.post('{{ route('products.approved') }}', {
                _token      :   '{{ csrf_token() }}', 
                id          :   el.value, 
                approved    :   approved
            }, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Product approval update successfully') }}');
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
