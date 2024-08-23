@extends('backend.layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class=" align-items-center">
       <h1 class="h3">{{translate('User Search Report')}}</h1>
	</div>
</div>
<div class="row">
    <div class="col-md-12 mx-auto">
        <div class="card">
    		<div class="card-header mb-0">
    			<h1 class="h6">{{translate('User Search Report')}}</h1>
    		</div>
            <div class="card-body style_lisket">
                <table class="table table-bordered aiz-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ translate('Search By') }}</th>
                            <th>{{ translate('Number searches') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($searches as $key => $searche)
                            <tr>
                                <td>{{ ($key+1) + ($searches->currentPage() - 1)*$searches->perPage() }}</td>
                                <td>{{ $searche->query }}</td>
                                <td>{{ $searche->count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="aiz-pagination mt-4">
                    {{ $searches->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
