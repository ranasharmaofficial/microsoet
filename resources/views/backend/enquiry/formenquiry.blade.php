@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h1 class="h3">{{translate('Common Enquiry List')}}</h1>
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
    <form class="" id="sort_blogs" action="" method="GET">
        <div class="card-header row gutters-5">
            <div class="col text-center text-md-left">
                <h5 class="mb-md-0 h6">{{ translate('Common Enquiry List') }}</h5>
            </div>
            
            <div class="col-md-12">
                <form action="" method="GET">
                    <div class="form-group p-3">
                    <div class="row">
                        <label class="col-md-3 col-form-label">{{translate('Sort by Pages')}} :</label>
                        <div class="col-md-5">
                            <select id="demo-ease" class="from-control aiz-selectpicker" name="page" required>
                               <option selected value="">Select Page</option>
                               <option value="resedential_page">Resedential Page</option>
                               <option value="architect_page">Architect Page</option>
                               <option value="building_page">Building Page</option>
                               <option value="interiotr_exterior_page">Interior Exterior Page</option>
                               <option value="talk_to_page">Tak To Page</option>
                               <option value="commercial_page">Commercial Page</option>
                               <option value="sales_partner_page">Sales Partner Page</option>
                               <option value="labour_supplier_page">Labourer Supplier Page</option>
                               <option value="material_supplier_page">Material Supplier Page</option>
                               <option value="engineer_architect_page">Engineer Architect Page</option>
                               <option value="contact_page">Contact Page</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary" type="submit">{{ translate('Filter') }}</button>
                        </div>
                    </div></div>
                </form>
            </div>
        </div>
        </form>
        <div class="card-body table-responsive">
            <table class="table mb-0 aiz-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th data-breakpoints="lg">{{translate('Name')}}</th>
                        <th data-breakpoints="lg">{{translate('Mobile')}}</th>
                        <th data-breakpoints="lg">{{translate('Email')}}</th>
                        <th data-breakpoints="lg">{{translate('Message')}}</th>
                        <th data-breakpoints="lg">{{translate('Enquiry From')}}</th>
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
                            {{ $enq->full_name }}
                        </td>
                        
                        <td>
                            {{ $enq->phone_no }}
                        </td>
						<td>
                            {{ $enq->email }}
                        </td>
						<td>
                            {{ $enq->message }}
                        </td>
						<td>
                            {{ $enq->form_type }}
                        </td>
						
						
                        
                        <td class="text-right">
                            
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('enq.commonEnqdelete', $enq->id)}}" title="{{ translate('Delete') }}">
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
