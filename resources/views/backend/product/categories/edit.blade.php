@extends('backend.layouts.app')

@section('content')
<style>
#hidden_div {
    display: none;
}
#service_div {
    display: none;
}
</style>

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('Category Information')}}</h5>
</div>

<div class="row style_lisket">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-body p-0">
                <ul class="nav nav-tabs nav-fill border-light">
                    @foreach (\App\Models\Language::all() as $key => $language)
                    <li class="nav-item">
                        <a class="nav-link text-reset @if ($language->code == $lang) active @else bg-soft-dark border-light border-left-0 @endif py-3" href="{{ route('categories.edit', ['id'=>$category->id, 'lang'=> $language->code] ) }}">
                            <img src="{{ static_asset('assets/img/flags/'.$language->code.'.png') }}" height="11" class="mr-1">
                            <span>{{$language->name}}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
                <form class="p-4" action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PATCH">
    	            <input type="hidden" name="lang" value="{{ $lang }}">
                	@csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Name')}} <i class="las la-language text-danger" title="{{translate('Translatable')}}"></i></label>
                        <div class="col-md-9">
                            <input type="text" name="name" value="{{ $category->getTranslation('name', $lang) }}" class="form-control" id="name" placeholder="{{translate('Name')}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Category Type')}}</label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="type" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true" id="type" onchange="showDiv(this)">
                                <option value="1" @if ($category->type=='1') selected @endif>Product</option>
                                <option value="2" @if ($category->type=='2') selected @endif>Service</option>    
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="hidden_div">
                        <label class="col-md-3 col-form-label">{{translate('Parent Category')}}</label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="parent_id" data-toggle="select2" data-placeholder="Choose ..."data-live-search="true" data-selected="{{ $category->parent_id }}">
                                <option value="0">{{ translate('No Parent') }}</option>
                                @foreach ($categories as $acategory)
                                    <option value="{{ $acategory->id }}">{{ $acategory->getTranslation('name') }}</option>
                                    @foreach ($acategory->childrenCategories as $childCategory)
                                        @include('categories.child_category', ['child_category' => $childCategory])
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            {{translate('Ordering Number')}}
                        </label>
                        <div class="col-md-9">
                            <input type="number" name="order_level" value="{{ $category->order_level }}" class="form-control" id="order_level" placeholder="{{translate('Order Level')}}">
                            <small>{{translate('Higher number has high priority')}}</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Type')}}</label>
                        <div class="col-md-9">
                            <select name="digital" required class="form-control aiz-selectpicker mb-2 mb-md-0">
                                <option value="0" @if ($category->digital == '0') selected @endif>{{translate('Physical')}}</option>
                                @if(false)
                                <option value="1" @if ($category->digital == '1') selected @endif>{{translate('Digital')}}</option>
                                @endif
                            </select>
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Page Wise Banner')}} <small>({{ translate('1366x420') }})</small></label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="page_wise_banner" class="selected-files" value="{{ $category->page_wise_banner}}">
								
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Home Image')}} <small>({{ translate('800x460') }})</small></label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="home_image" class="selected-files" value="{{ $category->home_image}}">
								
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
					
    	            <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Banner')}} <small>({{ translate('200x200') }})</small></label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="banner" class="selected-files" value="{{ $category->banner }}">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Icon')}} <small>({{ translate('32x32') }})</small></label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="icon" class="selected-files" value="{{ $category->icon }}">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
					 <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Short Description')}}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="short_description" value="{{ $category->short_description }}" placeholder="{{translate('Short Description')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Meta Title')}}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="meta_title" value="{{ $category->meta_title }}" placeholder="{{translate('Meta Title')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Meta Description')}}</label>
                        <div class="col-md-9">
                            <textarea name="meta_description" rows="5" class="form-control">{{ $category->meta_description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Slug')}}</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="{{translate('Slug')}}" id="slug" name="slug" value="{{ $category->slug }}" class="form-control">
                        </div>
                    </div>
                    @if (get_setting('category_wise_commission') == 1)
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{translate('Commission Rate')}}</label>
                            <div class="col-md-9 input-group">
                                <input type="number" lang="en" min="0" step="0.01" id="commision_rate" name="commision_rate" value="{{ $category->commision_rate }}" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row form_status @if($category->type == 1) d-none @endif">
                        <label class="col-md-3 col-form-label">{{translate('Is field add in form')}}</label>
                        <div class="col-md-9">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" name="is_form_status" onchange="update_form_status(this)" @if($category->is_form_field == 1) checked @endif>
                                <span></span>
                            </label>
                        </div>
                        <input type="hidden" id="is_form_id" name="is_form_field" value="{{$category->is_form_field}}">
                    </div>

                    <div class="form-group row form_div_status @if($category->type == 1) d-none @endif">
                        <label class="col-md-3 col-form-label">{{ translate('Form Fields') }}</label> 
                        <div class="col-md-9 home-banner2-target">
                            @if ($category->form_fields != null)
                                @foreach (explode(",",$category->form_fields) as $key => $value)
                                <div class="row gutters-5">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Form Fields" name="form_fields[]" value="{{$value}}">
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="form-group">
                                            <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                                <i class="las la-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
								@endforeach
							@endif
                        </div>
                        <div class="col-md-3">
                            <button
                                type="button"
                                class="btn btn-soft-secondary btn-sm"
                                data-toggle="add-more"
                                data-content='
                                <div class="row gutters-5">
                                    <div class="col-md">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Form Fields" name="form_fields[]" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="form-group">
                                            <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                                <i class="las la-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>'
                                data-target=".home-banner2-target">
                                {{ translate('Add New') }}
                            </button>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Filtering Attributes')}}</label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="filtering_attributes[]" data-toggle="select2" data-placeholder="Choose ..."data-live-search="true" data-selected="{{ $category->attributes->pluck('id') }}" multiple>
                                @foreach (\App\Models\Attribute::all() as $attribute)
                                    <option value="{{ $attribute->id }}">{{ $attribute->getTranslation('name') }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')
<script>
    function showDiv(select){
        if(select.value==1){
            $('.form_status').addClass('d-none'); // Added by AviSingh
            $('.form_div_status').addClass('d-none')
        }

        if(select.value==2){
            $('.form_status').removeClass('d-none'); // Added by AviSingh
        } 
    } 

    // Added by AviSingh
    function update_form_status(el){
        var status = 0;
        if(el.checked){
            var status = 1;
            $('.form_div_status').removeClass('d-none')
        }else{
            var status = 0;
            $('.form_div_status').addClass('d-none')
        }
        $('#is_form_id').val(status);
    }

    // jQuery(document).ready(function(){
    //     jQuery('#type').change(function(){
    //         let type=jQuery(this).val();
    //         let datas = "";
    //         jQuery.ajax({
    //             url:'{{route('getCategoryName')}}',
    //             type:'post',
    //             data:'type='+type+'&_token={{csrf_token()}}',
    //             success:function(result){
    //                 // jQuery('#project_id').val(''+result+'')
    //                 if (result == '') {
    //                     datas += '<option>Not Found.</option>';
    //                 } else{
    //                     // console.log(result);
    //                     $.each(result, function (i) {
    //                         datas += '<option value="'+result[i].id+'">'+result[i].name+'</option>';
    //                          //console.log(datas);
    //                     });                    
    //                 }
    //                 jQuery('#cats_id').html(datas);
    //             }
    //         });
    //     });
    // });
</script>
@endsection
