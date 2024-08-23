@extends('backend.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Sitemap Information')}}</h5>
            </div>
            <div class="card-body">
                <form id="add_form" class="form-horizontal" action="{{ route('sitemaps.update', $sitemap->id) }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">
                            {{translate('Sitemap Url')}}
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-9">
                            <input type="text" placeholder="{{translate('Sitemap Url')}}" id="title" name="title" class="form-control" value="{{$sitemap->title}}" required>
                        </div>
                    </div>
                    
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">
                            {{translate('Update')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
