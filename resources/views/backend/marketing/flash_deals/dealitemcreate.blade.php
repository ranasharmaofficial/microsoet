@extends('backend.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{translate('Flash Deal Item Information')}}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('flash_deals_item.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-lg-3 control-label" for="name">{{translate('Type')}}</label>
                        <div class="col-lg-9">
                            @php
                         $dealdata =  \DB::table('flash_deals')->get();
                         
                            @endphp
                            <select name="deal_id" id="type" class="form-control aiz-selectpicker" required>
                                @foreach($dealdata as $deal)
                                <option value="{{ $deal->id }}">{{ $deal->title }}</option>
                                @endforeach
                               
                            </select>
                        </div>
                    </div>
 
                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="name">{{translate('Title')}}</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{translate('Title')}}" id="name" name="title" class="form-control" required>
                        </div>
                    </div>
                      <div class="form-group row">
                        <label class="col-sm-3 control-label" for="name">{{translate('Sub Title')}}</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="{{translate('Sub Title')}}" id="name" name="sub_title" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="name">{{translate('Page Link')}}</label>
                        <div class="col-sm-9">
                            <input type="url" placeholder="{{translate('Page link')}}" id="name" name="page_link" class="form-control" required>
                        </div>
                    </div>
                   

                  

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="signinSrEmail">{{translate('Banner')}} <small>(1920x500)</small></label>
                        <div class="col-md-9">
                            <div class="input-group" data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                    <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="banner" class="selected-files">
                            </div>
                            <div class="file-preview box sm">
                            </div>
                            <span class="small text-muted">{{ translate('This image is shown as cover banner in flash deal details page.') }}</span>
                        </div>
                    </div>


                

                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#products').on('change', function(){
                var product_ids = $('#products').val();
                if(product_ids.length > 0){
                    $.post('{{ route('flash_deals.product_discount') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids}, function(data){
                        $('#discount_table').html(data);
                        AIZ.plugins.fooTable();
                    });
                }
                else{
                    $('#discount_table').html(null);
                }
            });
        });
    </script>
@endsection
