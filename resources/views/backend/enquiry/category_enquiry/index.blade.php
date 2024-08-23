@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h3">{{translate('All Enquiry')}}</h1>
        </div>
    </div>
</div>
<br>

<div class="card">
    <form class="" id="sort_blogs" action="" method="GET">
        <div class="card-header row gutters-5">
            <div class="col text-center text-md-left">
                <h5 class="mb-md-0 h6">{{ translate('All Enquiry') }}</h5>
            </div>
            
            <div class="col-md-2">
                <div class="form-group mb-0">
                    <input type="text" class="form-control form-control-sm" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type & Enter') }}">
                </div>
            </div>
        </div>
        </from>
        <div class="card-body">
            <table class="table mb-0 aiz-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th data-breakpoints=>{{translate('Name')}}</th>
                        <th data-breakpoints="lg">{{translate('Mobile')}}</th>
                        <th data-breakpoints="lg">{{translate('Email')}}</th>
                        <th data-breakpoints="lg">{{translate('Message')}}</th>
                        <th data-breakpoints="lg">{{translate('User Type')}}</th>
                        <th class="text-right">{{translate('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enquiry as $key => $enq)
                    <tr>
                        <td>
                            {{ ($key+1) + ($enquiry->currentPage() - 1) * $enquiry->perPage() }}
                        </td>
                        <td>
                            {{ $enq->name }}
                        </td>
                        
                        <td>
                            {{ $enq->phone }}
                        </td>
						<td>
                            {{ $enq->email }}
                        </td>
						<td>
                            {{ $enq->message }}
                        </td>
						<td>
                            {{ $enq->user_type }}
                        </td>
                        
                        <td class="text-right">
                            
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('enq.destroy', $enq->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $enquiry->links() }}
            </div>
        </div>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')

    <script type="text/javascript">
        function change_status(el){
            var status = 0;
            if(el.checked){
                var status = 1;
            }
            $.post('{{ route('blog.change-status') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Change blog status successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }
    </script>

@endsection
