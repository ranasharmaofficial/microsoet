@extends('backend.layouts.app')

@section('content')
    <div class="aiz-titlebar text-left mt-2 mb-3">
      <div class="row align-items-center">
        <div class="col-md-12">
            <h1 class="h3">{{ translate('Manage Seller Category Update Request') }}</h1>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table aiz-table mb-0">
                <thead>
                    <tr>
                        <th>{{translate('S.No.')}}</th>
                        <th>{{translate('Seller Name')}}</th>
                        <th>{{translate('Product Request')}}</th>
                        <th>{{translate('Service Request')}}</th>
                        <th width="10%">{{translate('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requestData as $key => $data)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$data->seller_name}}</td>
                        <td>{{$data->product_category_names}}</td>
                        <td>{{$data->service_category_names}}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-circle btn-soft-primary btn-icon dropdown-toggle no-arrow" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="las la-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                    <a href="javascript:void()" class="dropdown-item" onclick="update_request_status('{{encrypt($data->id)}}',2);">
                                        {{translate('Approved')}}
                                    </a>
                                    <a href="javascript:void()" class="dropdown-item" onclick="update_request_status('{{encrypt($data->id)}}',4);">
                                        {{translate('Decline')}}
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="aiz-pagination">
                {{ $requestData->appends(request()->input())->links() }}
            </div> --}}
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function update_request_status(id,status) {
            var formData = new FormData();
            formData.append('_token','{{csrf_token()}}');
            formData.append('id',id);
            formData.append('status',status);
            $.ajax({
                url: "{{ url('admin/sellers/updateCategoryRequest') }}",
                method: 'POST',
                data: formData,
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response){
                    console.log("response",response);
                    if(response.status){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        window.location.reload();
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.msg,
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                },
                error: function(response){
                    console.log('Error:'+response);
                }
            });
        }
    </script>

    @if (get_setting('google_map') == 1)
        @include('frontend.partials.google_map')
    @endif

@endsection
