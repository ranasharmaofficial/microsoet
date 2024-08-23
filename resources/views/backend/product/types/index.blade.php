@extends('backend.layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{translate('All Types')}}</h1>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="{{ route('types.create') }}" class="btn btn-primary">
                <span>{{translate('Add New Type')}}</span>
            </a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-block d-md-flex">
        <h5 class="mb-0 h6">{{ translate('Types') }}</h5>
        <form class="" id="sort_categories" action="" method="GET">
            <div class="box-inline pad-rgt pull-left">
                <div class="" style="min-width: 200px;">
                    <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type name & Enter') }}">
                </div>
            </div>
        </form>
    </div>
    <div class="card-body style_lisket">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th data-breakpoints="lg">{{ translate('first Category') }}</th>
                    <th data-breakpoints="lg">{{ translate('Second Category') }}</th>
                    <th>{{ translate('Third Category') }}</th>
                    <th>{{translate('Name')}}</th>
                    <th>{{translate('Icon')}}</th>
                    <th>{{translate('Status')}}</th>
                    <th width="10%" class="text-right">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($types as $key => $type)
                    <tr>
                        <td>{{ ($key+1) + ($types->currentPage() - 1)*$types->perPage() }}</td>
                        <td>{{ $type->first_cat_name }}</td>
                        <td>{{ $type->second_cat_name }}</td>
                        <td>{{ $type->third_cat_name }}</td>
                        <td>{{ $type->name }}</td>
                        <td>
                            @if($type->icon != null)
                                <span class="avatar avatar-square avatar-xs">
                                    <img src="{{ uploaded_asset($type->icon) }}" alt="{{translate('icon')}}">
                                </span>
                            @else
                                —
                            @endif
                        </td>
                        <td>
                            @if($type->status == 0) Inactive  @else Active  @endif
                        </td>
                        <td class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('types.edit', ['id'=>$type->id] )}}" title="{{ translate('Edit') }}">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('types.destroy', $type->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination">
            {{ $types->appends(request()->input())->links() }}
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
    </script>
@endsection
