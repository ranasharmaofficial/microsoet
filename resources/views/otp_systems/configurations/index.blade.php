@extends('backend.layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{translate('Twilio Credential')}}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                        <input type="hidden" name="otp_method" value="twillo">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="TWILIO_SID">
                            <div class="col-lg-6">
                                <label class="col-from-label">{{translate('TWILIO SID')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="TWILIO_SID" value="{{  env('TWILIO_SID') }}" placeholder="TWILIO SID" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="TWILIO_AUTH_TOKEN">
                            <div class="col-lg-6">
                                <label class="col-from-label">{{translate('TWILIO AUTH TOKEN')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="TWILIO_AUTH_TOKEN" value="{{  env('TWILIO_AUTH_TOKEN') }}" placeholder="TWILIO AUTH TOKEN" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="VALID_TWILLO_NUMBER">
                            <div class="col-lg-6">
                                <label class="col-from-label">{{translate('VALID TWILIO NUMBER')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="VALID_TWILLO_NUMBER" value="{{  env('VALID_TWILLO_NUMBER') }}" placeholder="VALID TWILLO NUMBER" >
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 h6">{{translate('Gupshup Credential')}}</h5>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('update_credentials') }}" method="POST">
                        <input type="hidden" name="otp_method" value="gupshup">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="GUPSHUP_USER_ID">
                            <div class="col-lg-6">
                                <label class="col-from-label">{{translate('GUPSHUP_USER_ID')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="GUPSHUP_USER_ID" value="{{  env('GUPSHUP_USER_ID') }}" placeholder="GUPSHUP_USER_ID" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="types[]" value="GUPSHUP_PASSWORD">
                            <div class="col-lg-6">
                                <label class="col-from-label">{{translate('GUPSHUP_PASSWORD')}}</label>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="GUPSHUP_PASSWORD" value="{{  env('GUPSHUP_PASSWORD') }}" placeholder="GUPSHUP_PASSWORD" required>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection
