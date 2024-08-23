@extends('backend.layouts.app')

@section('content')
<style>
.sub-category{
    height:40px;
    color: #898b92 !important;
    background-color: transparent !important;
    border-color: #e2e5ec;
    border-radius:5px;
    z-index: 0!important;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
</style>
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{translate('All Categories')}}</h1>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="{{ route('categories.addcategory') }}" class="btn btn-primary">
                <span>{{translate('Add New category')}}</span>
            </a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-block d-md-flex">
        <h5 class="mb-0 h6">{{ translate('Categories') }}</h5>
        <form class="" id="sort_categories" action="" method="GET">
           <div class="box-inline pad-rgt pull-left">
                <div class="" style="min-width: 200px;">
                    <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type name & Enter') }}">
                </div>
            </div> 
		</form>
    </div>
    <div class="card-body style_lisket">
	            <form method="GET">
                    <div class="form-group p-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-form-label">{{translate('Sort by Main Category')}} :</label>
                                <select id="parent_id" class="from-control" name="parent_id" required>
                                <option value="0">{{ translate('Select Category') }}</option>
                                    @foreach ($parentcategorylist as $category)
                                        <option value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-4">
                                <label class="col-form-label">{{translate('Sort by Sub Category')}} :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <select id="subcategory_id" class="from-control aiz-selectpicker" name="parent_id_one" required>
                                    <option value="0">&nbsp;&nbsp;&nbsp;Select Subcategory&nbsp;&nbsp;&nbsp;</option>
                                    <option value="0">{{ translate('Select Subcategory') }}</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" style="margin-top: 35px;" type="submit">{{ translate('Filter') }}</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary" style="margin-top: 35px;" name="all" type="submit">{{ translate('View All') }}</button>
                            </div>
                        </div>
                    </div>
                 
                    
                </form>
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th data-breakpoints="lg">#</th>
                    <th data-breakpoints="lg">{{ translate('Type') }}</th>
                    <th>{{translate('Name')}}</th>
                    <th data-breakpoints="lg">{{ translate('Parent Category') }}</th>
                    <th data-breakpoints="lg">{{ translate('Order Level') }}</th>
                    <th data-breakpoints="lg">{{ translate('Level') }}</th>
                    <th data-breakpoints="lg">{{translate('Banner')}}</th>
                    <th data-breakpoints="lg">{{translate('Icon')}}</th>
                    <th data-breakpoints="lg">{{translate('Featured')}}</th>
                    <th data-breakpoints="lg">{{translate('Commission')}}</th>
                    <th width="10%" class="text-right">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $key => $category)
                    <tr>
                        <td>{{ ($key+1) + ($categories->currentPage() - 1)*$categories->perPage() }}</td>
                        <td>@if($category->type=='1')Product @else Service @endif</td>
                        <td>{{ $category->getTranslation('name') }}</td>
                        <td>
                            @php
                                $parent = \App\Models\Category::where('id', $category->parent_id)->first();
                            @endphp
                            @if ($parent != null)
                                {{ $parent->getTranslation('name') }}
                            @else
                                —
                            @endif
                        </td>
                        <td>{{ $category->order_level }}</td>
                        <td>{{ $category->level }}</td>
                        <td>
                            @if($category->banner != null)
                                <img src="{{ uploaded_asset($category->banner) }}" alt="{{translate('Banner')}}" class="h-50px">
                            @else
                                —
                            @endif
                        </td>
                        <td>
                            @if($category->icon != null)
                                <span class="avatar avatar-square avatar-xs">
                                    <img src="{{ uploaded_asset($category->icon) }}" alt="{{translate('icon')}}">
                                </span>
                            @else
                                —
                            @endif
                        </td>
                        <td>
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" onchange="update_featured(this)" value="{{ $category->id }}" <?php if($category->featured == 1) echo "checked";?>>
                                <span></span>
                            </label>
                        </td>
                        <td>{{ $category->commision_rate }} %</td>
                        <td class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('categories.edit', ['id'=>$category->id, 'lang'=>env('DEFAULT_LANGUAGE')] )}}" title="{{ translate('Edit') }}">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('categories.destroy', $category->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination">
            {{ $categories->appends(request()->input())->links() }}
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')
    <script type="text/javascript">
        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('categories.featured') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Featured categories updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }
		jQuery(document).ready(function(){
        jQuery('#parent_id').change(function(){
            let parent_id=jQuery(this).val();
            let datas = "";
            jQuery.ajax({
                url:'{{route('getSubCategoriesName')}}',
                type:'post',
                data:'parent_id='+parent_id+'&_token={{csrf_token()}}',
                success:function(result){
                    if (result == '') {
                        datas += '<option value="0">Not Found.</option>';
                    } else{
                        // console.log(result);
                        datas += '<option value="0">---Select Subcategory---</option>';
                        $.each(result, function (i) {
								// if(result.length<1){
									// datas += '<option value="0">---Select Subcategory---</option>';
								// }
                            datas += '<option value="'+result[i].id+'">'+result[i].name+'</option>';
                             console.log(datas);
                        });                    
                    }
                    jQuery('#subcategory_id').html(datas);
                }
            });
        });
    });
    </script>
@endsection
