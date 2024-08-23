@extends('backend.layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h4 class="fw-bold py-3 mb-4">{{ translate('All Service Quotation Request') }}</h4>
        </div>

    </div>
</div>
<br>

<div class="card">
    <form class="" action="" id="sort_orders" method="GET">
        <div class="card-header row gutters-5">
            <div class="col">
                <h5 class="mb-md-0 h6">{{ translate('All Service Quotation Request') }}</h5>
            </div>
        </div>

        <div class="card-body">
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <!--<th>#</th>-->
                        <th>
                            <div class="form-group">
                                <div class="aiz-checkbox-inline">
                                    <label class="aiz-checkbox">
                                        <input type="checkbox" class="check-all">
                                        <span class="aiz-square-check"></span>
                                    </label>
                                </div>
                            </div>
                        </th>
                        <th data-breakpoints="md">{{ translate('Service') }}</th>
                        <th data-breakpoints="md">{{ translate('Nature of work') }}</th>
                        <th data-breakpoints="md">{{ translate('Location') }}</th>
                        <th data-breakpoints="md">{{ translate('phone') }}</th>
                        <th data-breakpoints="md">{{ translate('Created At') }}</th>
                        <th class="text-right" width="15%">{{translate('options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($service_quote_req as $key => $order)
                    <tr>
                        <td>
                            {{ ($key+1) + ($service_quote_req->currentPage() - 1)*$service_quote_req->perPage() }}
                        </td>


                        <td>
                            {{ $order->service->name }}
                        </td>
                        <td>
                            {{ $order->nature_work }}
                        </td>
                        {{-- {"name":"QWWRERE","address":"Srinagae\r\nJanta Chowk","area":null,"city":"PURNEA","state":"Bihar","locality":"TYTYTYTYTY","landmark":null,"postal_code":"854301"} --}}
                        <td>
                           {{ json_decode($order->location)->name }},  {{ json_decode($order->location)->address }},  {{ json_decode($order->location)->area }}
                           ,  {{ json_decode($order->location)->city }} ,  {{ json_decode($order->location)->state }}
                           ,  {{ json_decode($order->location)->locality }} ,  {{ json_decode($order->location)->landmark }} - ,  {{ json_decode($order->location)->postal_code }}
                        </td>
                        <td>
                            {{ $order->phone }}
                        </td>
                        <td>
                            {{ $order->created_at }}
                        </td>

                        <td class="text-right">
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('service.quote_request.quotedestroy', $order->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="aiz-pagination">
                {{ $service_quote_req->appends(request()->input())->links() }}
            </div>

        </div>
    </form>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection

@section('script')
    <script type="text/javascript">
        $(document).on("change", ".check-all", function() {
            if(this.checked) {
                // Iterate each checkbox
                $('.check-one:checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.check-one:checkbox').each(function() {
                    this.checked = false;
                });
            }

        });

        function bulk_delete() {
            var data = new FormData($('#sort_orders')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('service-bulk-order-delete')}}",
                type: 'POST',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response == 1) {
                        location.reload();
                    }
                }
            });
        }
    </script>
@endsection
