@extends('frontend.layouts.user_panel')

@section('panel_content')
 <div class=" w-100 mb-1 mys_accounts">
    <div class="bootstrap-accordiana">
        <div class="backtabs-dp_servicespros2 backtabs-dp ">

            <div class="border-bottom1 border-color-111 mt-0 mb-3">
                <h3 class="section-title section-title__sm mb-0 pt-2 pb-0 mt-0 font-size-18">My Service Enquiry
                </h3>
            </div>
            <div class="flash-message mt-2 mb-2">
                <div class="hotel-form py-4 shadow-none">
                    <div class="table-responsive">
                        <table class="table servicetable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ translate('Service') }}</th>
                                    <th>{{ translate('Nature of work') }}</th>
                                    <th>{{ translate('Location') }}</th>
                                    <th>{{ translate('Created At') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enquiries as $key => $order)
                                {{-- @php $locations = json_decode($order->location); @endphp --}}
                                    <tr>
                                        <td>{{ ($key+1) + ($enquiries->currentPage() - 1)*$enquiries->perPage() }}</td>
                                        <td>{{ $order->service->name }} </td>
                                        <td>{{ $order->nature_work }}</td>
                                        <td>
                                            {{ json_decode($order->location)->name }},  {{ json_decode($order->location)->address }},  {{ json_decode($order->location)->area }}
                                            ,  {{ json_decode($order->location)->city }} ,  {{ json_decode($order->location)->state }}
                                            ,  {{ json_decode($order->location)->locality }} ,  {{ json_decode($order->location)->landmark }} - ,  {{ json_decode($order->location)->postal_code }}
                                        </td>
                                        <td>{{ $order->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="table-pagination">
                            {{ $enquiries->appends(request()->input())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>
@endsection

