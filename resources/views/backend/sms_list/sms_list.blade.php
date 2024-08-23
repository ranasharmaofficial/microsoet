@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h3">{{translate('Sent Sms List')}}</h1>
        </div>
        {{--<div class="col text-right">
            <a href="{{ route('blog.create') }}" class="btn btn-circle btn-info">
                <span>{{translate('Add New Post')}}</span>
            </a>
        </div>--}}
    </div>
</div>
<br>

<div class="card">

        <div class="card-body table-responsive">
            <table class="table mb-0 aiz-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th data-breakpoints="lg">{{translate('Template id')}}</th>
                        <th data-breakpoints="lg">{{translate('Identifier')}}</th>
                        <th data-breakpoints="lg">{{translate('Sms From')}}</th>
                        <th data-breakpoints="lg">{{translate('sms To')}}</th>
                        <th data-breakpoints="lg">{{translate('Sms Body')}}</th>
                        <th data-breakpoints="lg">{{translate('Status')}}</th>
                        {{-- <th class="text-right">{{translate('Options')}}</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($sms_list as $key => $enq)
                    <tr>
                        <td>
                            {{ ($key+1) + ($sms_list->currentPage() - 1) * $sms_list->perPage() }}
                        </td>
                        <td>
                            {{ $enq->template_id }}
                        </td>
                        <td>
                            {{ $enq->sms_indentifier }}
                        </td>


                        <td>
                            {{ $enq->sms_from }}
                        </td>
						<td>
                            {{ $enq->sms_to }}
                        </td>
						<td>
                            {{ $enq->sms_body }}
                        </td>
						<td>
                            @if($enq->status==0)
                            <p class="text-danger"> Not Sent</p>
                             @elseif($enq->status==1)
                             <p style="color:blue" class="text-danger"> Sending</p>
                             @elseif($enq->status==2)
                             <p class="text-success"> Sent</p>
                             @elseif($enq->status==3)
                             <p class="text-danger"> Error</p>
                             @endif
                       </td>



                        {{-- <td class="text-right">

                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('enq.commonEnqdelete', $enq->id)}}" title="{{ translate('Delete') }}">
                                <i class="las la-trash"></i>
                            </a>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="aiz-pagination">
                {{ $sms_list->links() }}
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
