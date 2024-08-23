@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h4 class="fw-bold py-3 mb-4">{{translate('All Products Masters')}}</h4>
        </div>
        @if($type != 'Seller')
        <div class="col text-right">
            <a href="{{route('get_master_product_data.export')}}" class="btn btn-circle btn-info">
                <span>{{translate('Export in Excel')}}</span>
            </a>
        </div>
        <div class="col text-right">
            <a href="{{route('productmasters.create')}}" class="btn btn-circle btn-info">
                <span>{{translate('Add New Product Master')}}</span>
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
                <h5 class="mb-md-0 h6">{{ translate('All Product Master') }}</h5>
            </div>

            <div class="dropdown col-md-2 ml-auto">
                <button class="btn border dropdown-toggle" type="button" data-toggle="dropdown">
                    {{translate('Bulk Action')}}
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#" onclick="bulk_delete()"> {{translate('Delete selection')}}</a>
                </div>
            </div>

            <div class="col-md-2">
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
            <div class="col-md-2 mb-2">
                <select class="form-control" id="thirdcategory" onchange="category3(this.value)" name="third_category">
                    <option value="">Select Third Category</option>
                </select>
            </div>

            <div class="col-md-2 mb-2">
                <select class="form-control" id="branddata" name="brand">
                    <option value="">Select Brand</option>
                </select>
            </div>
            <div class="col-md-2 mb-2">
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
                        <th>{{translate('Product Id')}}</th>
                        <th>{{translate('Category')}}</th>
                        <th>{{translate('Name')}}</th>
                        @if($type == 'Seller' || $type == 'All')
                            <th data-breakpoints="lg">{{translate('Added By')}}</th>
                        @endif
                        <th data-breakpoints="sm">{{translate('Info')}}</th>
                        <th data-breakpoints="md">{{translate('Total Stock')}}</th>
                        <th data-breakpoints="sm" class="text-right">{{translate('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                    <tr>
                        <!--<td>{{ ($key+1) + ($products->currentPage() - 1)*$products->perPage() }}</td>-->
                        <td>
                            <div class="form-group d-inline-block">
                                <label class="aiz-checkbox">
                                    <input type="checkbox" class="check-one" name="id[]" value="{{$product->id}}">
                                    <span class="aiz-square-check"></span>
                                </label>
                            </div>
                        </td>
                        <td>
                            {{ $product->id}}
                        </td>
                        @php
                            $category_name = \App\Models\Category::where('id', $product->category_id)->first();
                        @endphp
                        <td>
                            {{ $category_name->name }}
                        </td>
                        <td>
                            <div class="row gutters-5 w-200px w-md-300px mw-100">
                                <div class="col-auto">
                                    <img src="{{ uploaded_asset($product->thumbnail_img)}}" alt="Image" class="size-50px img-fit">
                                </div>
                                <div class="col">
                                    <span class="text-muted text-truncate-2">{{ $product->name }}</span>
                                </div>
                            </div>
                        </td>
                        @if($type == 'Seller' || $type == 'All')
                            <td>{{ $product->user->name }}</td>
                        @endif
                        <td>
                            <strong>{{translate('Num of Sale')}}:</strong> {{ $product->num_of_sale }} {{translate('times')}} </br>
                            <strong>{{translate('Base Price')}}:</strong> {{ single_price($product->unit_price) }} </br>
                            <strong>{{translate('Rating')}}:</strong> {{ $product->rating }} </br>
                        </td>
                        <td>
                            @php
                                $qty = 0;
                                if($product->variant_product) {
                                    foreach ($product->stocks as $key => $stock) {
                                        $qty += $stock->qty;
                                        echo $stock->variant.' - '.$stock->qty.'<br>';
                                    }
                                }
                                else {
                                    //$qty = $product->current_stock;
                                    $qty = optional($product->stocks->first())->qty;
                                    echo $qty;
                                }
                            @endphp
                            @if($qty <= $product->low_stock_quantity)
                                <span class="badge badge-inline badge-danger">Low</span>
                            @endif
                        </td>
                        <td class="text-right">
                            @if(false)
                            <a class="btn btn-soft-success btn-icon btn-circle btn-sm"  href="{{ route('product', $product->slug) }}" target="_blank" title="{{ translate('View') }}">
                                <i class="las la-eye"></i>
                            </a>
                            @endif
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('productmasters.edit', ['id'=>$product->id] )}}" title="{{ translate('Edit') }}">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('productmasters.destroy', $product->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $products->appends(request()->input())->links() }}
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

        // function update_todays_deal(el){
        //     if(el.checked){
        //         var status = 1;
        //     }
        //     else{
        //         var status = 0;
        //     }
        //     $.post('{{ route('products.todays_deal') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
        //         if(data == 1){
        //             AIZ.plugins.notify('success', '{{ translate('Todays Deal updated successfully') }}');
        //         }
        //         else{
        //             AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
        //         }
        //     });
        // }

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

        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.featured') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Featured products updated successfully') }}');
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
                data:{"_token": "{{ csrf_token() }}",categoryid:id1,type:1},
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
            brandname(id1);
            $.ajax({
                type:"get",
                url:"{{route('product-master.get-third-level')}}",
                data:{"_token": "{{ csrf_token() }}",subcategoryid:id1,type:1},
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

        function category3(step3){
            brandname(step3);
        }

        function brandname(category_id){
            $.ajax({
                type:"get",
                url:"{{route('product-master.get-brand-list')}}",
                data:{"_token": "{{ csrf_token() }}",category_id:category_id,is_master:1},
                dataType:"json",
                success:function(data)
                {
                    console.log(data);
                    var html =  ``;
                    html+=`<option value="">Select Brand</option>`;
                    $(data).each(function(i,j){
                        html+=`<option value="${j.brand_id}">${j.name}</option>`;
                    });
                    $("#branddata").html(html);
                }

            })

        }

        function redirectfilter(){
            // var firstcategory = $("#firstcategory").val();
            // var secondcategory = $("#secondcategory").val();
            // var thirdcategory = $("#thirdcategory").val();
            // var branddata = $("#branddata").val();
            $('#sort_products').submit();
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
