@extends('backend.layouts.app')
@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col">
			<h1 class="h3">{{ translate('Edit Category Wise Offer') }}</h1>
		</div>
		<div class="col text-right">
            <a href="{{ url('admin/website/cat-wise-offer-list') }}" class="btn btn-circle btn-info">
                <span>{{translate('View List')}}</span>
            </a>
        </div>
	</div>
</div>
<div class="card">
	<form action="{{ route('website.edit_cat_offer') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="cid" value="{{$catwiseofferid->id}}">
		<div class="card-header">
			<h6 class="fw-600 mb-0">{{ translate('Edit Category Wise Offer') }}</h6>
		</div>
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="name">{{translate('Select Category')}} <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<select type="text" class="form-control aiz-selectpicker" placeholder="{{translate('Title')}}" name="category_id" data-live-search="true">
						<option selected disabled>Select Category</option>
					@foreach (\App\Models\Category::where('parent_id', '0')->get() as $key => $category)
						<option value="{{ $category->id }}" @if($catwiseofferid->category_id == $category->id) selected @endif>{{  $category->getTranslation('name') }}</option>
					@endforeach
					</select>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="name">{{translate('Enter Url Link')}} <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<div class="input-group d-block d-md-flex">
						<input type="text" class="form-control w-100 w-md-auto" value="{{$catwiseofferid->slug_url}}" placeholder="{{ translate('Enter Url') }}" name="slug_url" required>
					</div>
					<small class="form-text text-muted">{{ translate('Use character, number, hypen only') }}</small>
				</div>
			</div>
			<div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Banner')}} <small>(500x268)</small></label>
                            <div class="col-md-8">
                                <div class="input-group" data-toggle="aizuploader" data-type="image">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                    </div>
                                    <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                    <input type="hidden" name="banner" value="{{ $catwiseofferid->banner }}" class="selected-files">
                                </div>
                                <div class="file-preview box sm">
                                </div>
                            </div>
                        </div>
						<div class="col-12">
                <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group" role="group" aria-label="Second group">
                        <button type="submit" name="button" value="publish" class="btn btn-success">{{ translate('Update') }}</button>
                    </div>
                </div>
            </div>
		</div>

		
	</form>
</div>
@endsection
