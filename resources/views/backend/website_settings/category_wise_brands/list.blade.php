@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <h4 class="fw-bold py-3 mb-4">{{translate('Category Wise Brand List')}}</h4>
        </div>
        
        <div class="col text-right">
            <a href="{{ url('admin/website/add-cat-brands') }}" class="btn btn-circle btn-info">
                <span>{{translate('Add Category Wise Brannd')}}</span>
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
                        
                        <th data-breakpoints="sm">{{translate('Image')}}</th>
                        <th data-breakpoints="sm">{{translate('Title')}}</th>
                        <th data-breakpoints="md">{{translate('Url')}}</th>
                        <th data-breakpoints="lg">{{translate('Category')}}</th>
                        <th data-breakpoints="lg">{{translate('Brand')}}</th>
                        <th data-breakpoints="sm" class="text-right">{{translate('Options')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($catwisebrandlist as $key)
                    <tr>
                       <td>
                            <div class="row gutters-5 w-200px w-md-300px mw-100">
                                <div class="col-auto">
                                    <img src="{{ uploaded_asset($key->image)}}" alt="Image" class="size-50px img-fit">
                                </div>
                                <div class="col">
                                    <span class="text-muted text-truncate-2">{{ $key->title }}</span>
                                </div>
                            </div>
                        </td>
						<td>{{ $key->title}}</td>
						<td>{{ $key->url}}</td>
						<td>{{ $key->category->name}}</td>
						<td>{{ $key->brand->name}}</td>
						<td><a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{url('admin/website/edit-cat-wise-brand/'.$key->id) }}" title="{{ translate('Edit') }}">
                                <i class="las la-edit"></i>
								<a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('website.destroycatbrand', $key->id)}}" title="{{ translate('Delete') }}">
		                                <i class="las la-trash"></i>
		                            </a>
                            </a></td>
                        
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

        $(document).ready(function(){
            //$('#container').removeClass('mainnav-lg').addClass('mainnav-sm');
        });

        function update_todays_deal(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.todays_deal') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Todays Deal updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_published(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.published') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Published products updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }
        
        function update_approved(el){
            if(el.checked){
                var approved = 1;
            }
            else{
                var approved = 0;
            }
            $.post('{{ route('products.approved') }}', {
                _token      :   '{{ csrf_token() }}', 
                id          :   el.value, 
                approved    :   approved
            }, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Product approval update successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function update_featured(el){
            if(el.checked){
                var status = 1;
            }
            else{
                var status = 0;
            }
            $.post('{{ route('products.featured') }}', {_token:'{{ csrf_token() }}', id:el.value, status:status}, function(data){
                if(data == 1){
                    AIZ.plugins.notify('success', '{{ translate('Featured products updated successfully') }}');
                }
                else{
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }

        function sort_products(el){
            $('#sort_products').submit();
        }
        
        function bulk_delete() {
            var data = new FormData($('#sort_products')[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('bulk-product-delete')}}",
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
