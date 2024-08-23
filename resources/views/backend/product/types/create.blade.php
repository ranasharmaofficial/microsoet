
@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Type Information')}}</h5>
            </div>
            <div class="card-body add-new-style">
                <form class="form-horizontal" action="{{ route('types.store') }}" method="POST" enctype="multipart/form-data">
                	@csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Name')}}</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="{{translate('Name')}}" id="name" name="name" class="form-control" required>
                        </div>
                    </div>
                    
					<div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('First Category')}}</label>
                        <div class="col-md-9">
                            <select class="form-control" id="firstcategory" onchange="category1(this.value);" name="first_category_id" required>
                                <option> Choose First Category </option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->getTranslation('name') }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Second Category')}}</label>
                        <div class="col-md-9">
                            <select class="form-control" id="secondcategory" onchange="category2(this.value);" name="second_category_id" required>
                                <option value="">Select Second Category</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Third Category')}}</label>
                        <div class="col-md-9">
                            <select class="form-control" id="thirdcategory" name="third_category_id" required>
                                <option value="">Select Third Category</option>
                            </select>
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
                                <input type="hidden" name="icon" class="selected-files" required>
                            </div>
                            <div class="file-preview box sm">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">{{translate('Status')}}</label>
                        <div class="col-md-9">
                            <select class="select2 form-control aiz-selectpicker" name="status" data-toggle="select2" data-placeholder="Choose  Status" data-live-search="true" required> 
                                <option value="0"> InActive </option>
                                <option value="1" selected> Active </option>
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
<script type="text/javascript"> 
    function category1(id1){
        $.ajax({
            type:"get",
            url:"{{route('product-master.get-second-level')}}",
            data:{"_token": "{{ csrf_token() }}",categoryid:id1,type:2},
            dataType:"json",
            success:function(data)
            {
                var html =  ``;
                html+=`<option value="">Select Second Category</option>`;
                $(data).each(function(i,j){
                    html+=`<option value="${j.id}">${j.name}</option>`;
                });
                $("#secondcategory").html(html);
            }
        })
    }
    
    function category2(id1){
        $.ajax({
            type:"get",
            url:"{{route('product-master.get-third-level')}}",
            data:{"_token": "{{ csrf_token() }}",subcategoryid:id1,type:2},
            dataType:"json",
            success:function(data)
            {
                var html =  ``;
                html+=`<option value="">Select Third Category</option>`;
                $(data).each(function(i,j){
                    html+=`<option value="${j.id}">${j.name}</option>`;
                });
                $("#thirdcategory").html(html);
            }

        })
    }

</script>
@endsection
