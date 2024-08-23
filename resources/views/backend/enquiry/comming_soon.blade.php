@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h3">{{translate('All Comming Soon Enquiry')}}</h1>
        </div>
    </div>
</div>
<br>

<div class="card">
    <form class="" id="sort_blogs" action="" method="GET">
        <div class="card-header row gutters-5">
            <div class="col text-center text-md-left">
                <h5 class="mb-md-0 h6">{{ translate('All Comming Soon Enquiry') }}</h5>
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
                        <th>{{translate('Contact')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enquiry as $key => $enq)
                    <tr>
                        <td>
                            {{ ($key+1) + ($enquiry->currentPage() - 1) * $enquiry->perPage() }}
                        </td>
                        <td>
                            {{ $enq->contact }}
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

