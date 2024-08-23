@extends('backend.layouts.app')
@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col">
			<h1 class="h3">{{ translate('Add Category Wise Brands') }}</h1>
		</div>
	</div>
</div>
<div class="card">
	<form action="{{ route('website.uploadCatWiseBrands') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="card-header">
			<h6 class="fw-600 mb-0">{{ translate('Add Category Wise Brands') }}</h6>
		</div>
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="name">{{translate('Select Category')}} <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<select type="text" class="form-control aiz-selectpicker" placeholder="{{translate('Title')}}" name="category_id" data-live-search="true">
						<option selected disabled>Select Category</option>
					@foreach (\App\Models\Category::where('parent_id', '0')->get() as $key => $category)
						<option value="{{ $category->id }}">{{  $category->getTranslation('name') }}</option>
					@endforeach
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="name">{{translate('Select Brand')}} <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					 <select class="form-control aiz-selectpicker" name="brand_id" id="brand_id" data-live-search="true">
					 <option selected disabled>Select Brand</option>
                                    <option value="">{{ translate('Select Brand') }}</option>
                                    @foreach (\App\Models\Brand::all() as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->getTranslation('name') }}</option>
                                    @endforeach
                                </select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="name">{{translate('Enter Url Link')}} <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<div class="input-group d-block d-md-flex">
						<div class="input-group-prepend "><span class="input-group-text flex-grow-1">{{ route('home') }}/</span></div>
						<input type="text" class="form-control w-100 w-md-auto" placeholder="{{ translate('Enter Url') }}" name="url" required>
					</div>
					<small class="form-text text-muted">{{ translate('Use character, number, hypen only') }}</small>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="name">{{translate('Enter Title')}} <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<div class="input-group d-block d-md-flex">
						<input type="text" class="form-control w-100 w-md-auto" placeholder="{{ translate('Enter Title') }}" name="title" required>
					</div>
				</div>
			</div>
			 <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Image')}} <small>(300x300)</small></label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="thumbnail_img" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                                <small class="text-muted">{{translate('This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.')}}</small>
                            </div>
                        </div>
						<div class="col-12">
                <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group" role="group" aria-label="Second group">
                        <button type="submit" name="button" value="publish" class="btn btn-success">{{ translate('Save') }}</button>
                    </div>
                </div>
            </div>
		</div>

		
	</form>
</div>
@endsection
