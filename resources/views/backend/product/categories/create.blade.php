
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
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Category Information')}}</h5>
            </div>
            <div class="card-body add-new-style">
                <form class="form-horizontal" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                	@csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Name')}}</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="{{translate('Name')}}" id="name" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Category Type')}}</label>
                        <div class="col-md-9">
                            <select onchange="showDiv(this)" class="select2 form-control aiz-selectpicker" name="type" id="type" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
                                {{-- <option selected disabled>Select Category Type</option> --}}
                                <option value="1" selected>Product</option>
                                {{-- <option value="2">Service</option> --}}

                            </select>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Parent Category')}}</label>
                        <div class="col-md-9">
                            <select class="select2 form-control " name="parent_id" id="cats_id" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">

                            </select>
                        </div>


                    </div> --}}
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Parent Category')}}</label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="parent_id" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
                                <option value="0">{{ translate('No Parent') }}</option>
                                @foreach ($product_categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>
                                    @foreach ($category->childrenCategories as $childCategory)
                                        @include('categories.child_category', ['child_category' => $childCategory])
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
					<div id="service_div" class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Service Parent Category')}}</label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="parent_id1" data-toggle="select2" data-placeholder="Choose ..." data-live-search="true">
                                <option value="0">{{ translate('No Parent') }}</option>
                                @foreach ($service_categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>
                                    @foreach ($category->childrenCategories as $childCategory)
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
                            <input type="number" name="order_level" class="form-control" id="order_level" placeholder="{{translate('Order Level')}}">
                            <small>{{translate('Higher number has high priority')}}</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Type')}}</label>
                        <div class="col-md-9">
                            <select name="digital" required class="form-control aiz-selectpicker mb-2 mb-md-0">
                                <option value="0">{{translate('Physical')}}</option>
                                @if(false)
                                <option value="1">{{translate('Digital')}}</option>
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
                                <input type="hidden" name="page_wise_banner" class="selected-files">
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
                                <input type="hidden" name="home_image" class="selected-files">

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
                                <input type="hidden" name="banner" class="selected-files">
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
                                <input type="hidden" name="icon" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Short Description')}}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="short_description" placeholder="{{translate('Short Description')}}">
                        </div>
                    </div>
					<div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Meta Title')}}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="meta_title" placeholder="{{translate('Meta Title')}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Meta Description')}}</label>
                        <div class="col-md-9">
                            <textarea name="meta_description" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    @if (get_setting('category_wise_commission') == 1)
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">{{translate('Commission Rate')}}</label>
                            <div class="col-md-9 input-group">
                                <input type="number" lang="en" min="0" step="0.01" placeholder="{{translate('Commission Rate')}}" id="commision_rate" name="commision_rate" class="form-control">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row form_status d-none">
                        <label class="col-md-3 col-form-label">{{translate('Is field add in form')}}</label>
                        <div class="col-md-9">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input type="checkbox" name="is_form_status" onchange="update_form_status(this)">
                                <span></span>
                            </label>
                        </div>
                        <input type="hidden" id="is_form_id" name="is_form_field" value="">
                    </div>

                    <div class="form-group row form_div_status d-none">
                        <label class="col-md-3 col-form-label">{{ translate('Form Fields') }}</label>
                        <div class="col-md-9 home-banner2-target">

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
                            <select class="select2 form-control aiz-selectpicker" name="filtering_attributes[]" data-toggle="select2" data-placeholder="Choose ..."data-live-search="true" multiple>
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
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script>
    function showDiv(select){
        if(select.value==1){
            document.getElementById('hidden_div').style.display = "block";
            $('.form_status').addClass('d-none'); // Added by AviSingh
            $('.form_div_status').addClass('d-none')
        } else{
            document.getElementById('hidden_div').style.display = "none";
        }

        if(select.value==2){
            document.getElementById('service_div').style.display = "block";
            $('.form_status').removeClass('d-none'); // Added by AviSingh
        } else{
            document.getElementById('service_div').style.display = "none";
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

    jQuery(document).ready(function(){
        jQuery('#type').change(function(){
            let type=jQuery(this).val();
            let datas = "";
            jQuery.ajax({
                url:'{{route('getCategoryName')}}',
                type:'post',
                data:'type='+type+'&_token={{csrf_token()}}',
                success:function(result){
                    // jQuery('#project_id').val(''+result+'')
                    if (result == '') {
                        datas += '<option>Not Found.</option>';
                    } else{
                        // console.log(result);
                        $.each(result, function (i) {
                            datas += '<option value="'+result[i].id+'">'+result[i].name+'</option>';
                             //console.log(datas);
                        });
                    }
                    jQuery('#cats_id').html(datas);
                }
            });
        });
    });
</script>
@endsection
