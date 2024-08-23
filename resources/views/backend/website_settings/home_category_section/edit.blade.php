@extends('backend.layouts.app')
@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col">
			<h1 class="h3">{{ translate('Edit Home Category Section') }}</h1>
		</div>
		<div class="col text-right">
            <a href="{{ url('admin/website/home-category-section') }}" class="btn btn-circle btn-info">
                <span>{{translate('View List')}}</span>
            </a>
        </div>
	</div>
</div>
<div class="card">
	<form action="{{ route('website.updatehomeCatSection') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="cid" value="{{$homecatsec->id}}">
		<div class="card-header">
			<h6 class="fw-600 mb-0">{{ translate('Edit Home Category Section') }}</h6>
		</div>
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="name">{{translate('Select Category')}} <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<select type="text" class="form-control aiz-selectpicker" placeholder="{{translate('Title')}}" name="category_attribute" data-live-search="true">
						<option @if($homecatsec->category_attribute == $homecatsec->category_attribute) selected @endif value="{{$homecatsec->category_attribute}}" >
							@if($homecatsec->category_attribute=='service_1')
								Service 1
							@elseif($homecatsec->category_attribute=='service_2')
								Service 2
							@elseif($homecatsec->category_attribute=='service_3')
								Service 3
							@elseif($homecatsec->category_attribute=='service_4')
								Service 4
							@elseif($homecatsec->category_attribute=='service_5')
								Service 5
							@elseif($homecatsec->category_attribute=='service_offered')
								Service Offered
							@elseif($homecatsec->category_attribute=='building_materials')
								Building Materials
							@elseif($homecatsec->category_attribute=='furnishing_material')
								Furnishing Material
							@elseif($homecatsec->category_attribute=='sanitary_items')
								Sanitary Items
							@endif
						</option>
						<option value="service_1">Service 1</option>
						<option value="service_2">Service 2</option>
						<option value="service_3">Service 3</option>
						<option value="service_4">Service 4</option>
						<option value="service_5">Service 5</option>
						<option value="service_offered">Service Offered</option>
						<option value="building_materials">Building Material</option>
						<option value="furnishing_material">Furnishing Material</option>
						<option value="sanitary_items">Sanitary Items</option>
					
					</select>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="name">{{translate('Enter Url Link')}} <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<div class="input-group d-block d-md-flex">
						<input type="text" class="form-control w-100 w-md-auto" value="{{$homecatsec->slug_url}}" placeholder="{{ translate('Enter Url') }}" name="slug_url" required>
					</div>
					<small class="form-text text-muted">{{ translate('Use character, number, hypen only') }}</small>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-from-label" for="name">{{translate('Enter Title')}} <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<div class="input-group d-block d-md-flex">
						<input type="text" class="form-control w-100 w-md-auto" value="{{$homecatsec->title}}" placeholder="{{ translate('Enter Title') }}" name="title" required>
					</div>
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
                                    <input type="hidden" name="image" value="{{ $homecatsec->image }}" class="selected-files">
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
