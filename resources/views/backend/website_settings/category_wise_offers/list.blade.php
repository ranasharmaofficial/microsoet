@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h4 class="fw-bold py-3 mb-4">{{translate('Category Wise Offer List')}}</h4>
        </div>
        
        <div class="col text-right">
            <a href="{{ url('admin/website/add-cat-offers') }}" class="btn btn-circle btn-info">
                <span>{{translate('Add Category Wise Offer')}}</span>
            </a>
        </div>
        
    </div>
</div>
<br>

<div class="card">
    
        
    
        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        
                        <th data-breakpoints="sm">{{translate('Banner')}}</th>
                        <th data-breakpoints="md">{{translate('Url')}}</th>
                        <th data-breakpoints="lg">{{translate('Category')}}</th>
                        <th data-breakpoints="sm" class="text-right">{{translate('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($catwiseofferlist as $key)
                    <tr>
                       <td>
                            <div class="row gutters-5 w-200px w-md-300px mw-100">
                                <div class="col-auto">
                                    <img src="{{ uploaded_asset($key->banner)}}" alt="Image" class="size-50px img-fit">
                                </div>
                               
                            </div>
                        </td>
						<td>{{ $key->slug_url}}</td>
						<td>{{ $key->category->name}}</td>
						
						<td><a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{url('admin/website/edit-cat-wise-offer/'.$key->id) }}" title="{{ translate('Edit') }}">
                                <i class="las la-edit"></i>
                            </a>
							<a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('website.destroycatoffer', $key->id)}}" title="{{ translate('Delete') }}">
		                                <i class="las la-trash"></i>
		                            </a>
							</td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
   
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection
