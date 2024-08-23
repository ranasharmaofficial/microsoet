@extends('frontend.layouts.user_panel')

@section('panel_content')
    <div class="hotel-form py-4 mb-4 mt-3 background-white shadow-1">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                @if (Auth::user()->avatar != null)
                <div class="profile_user-holder shadow">
                        <img src="{{static_asset('uploads/user/'.Auth::user()->avatar)}}" alt="" class="w-100 h-100">
                </div>
                    @else
                        <div class="profile_user-holder shadow">
                        <img src="{{static_asset('assets_web/img/profile.png')}}" alt="" class="w-100 h-100">
                </div>

                @endif
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <div class="user_name mt-1">
                    <span class="userf-name">
                        {{ Auth::user()->name }}
                    </span>
                </div>
                <div class="user_email mt-1">
                    <span class="user-email">
                        {{ Auth::user()->email }}
                    </span>
                </div>
                <div class="phone_number mt-1">
                    <span class="user-phone">
                        {{ Auth::user()->phone }}
                    </span>
                </div>
                <div class="edit_profile mt-1">
                    <span class="profile-edit_btn">
                        <a style="margin-left:-3px;" class="btn-primary-dark-w text-white" href="{{url('edit_profile')}}">
                            Edit Profile
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="hotel-form p-4 hotel_custom-cls">
        <div class="row">
            {{-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-4">
                <div class="bucks_holder">
                    <p class="_ebucks">
                        ebb bucks
                    </p>

                    <p class="text-success fw-bold _remainbucks">
                        You have 500 ebb Bucks
                    </p>

                    <p class="_detail">
                        Every time you buy an item from ebb.com, we credit your account with ebb
                        Bucks.
                    </p>

                    <a href="javascript:void(0)" class="continue_shopping_">
                        continue shopping
                    </a>
                </div>
            </div> --}}
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-4">
                <div class="bucks_holder">
                    <p class="_ebucks">
                        Rate Your Purchase
                    </p>

                    <p class="text-success fw-bold _remainbucks">
                        Feedback
                    </p>

                    <p class="_detail">
                        No Feedback Pending
                    </p>

                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-4">
                <div class="bucks_holder">
                    <p class="_ebucks">
                        My Favorite Stores
                    </p>

                    <p class="_detail">
                        You have not tagged any Merchant as your Favorite Store.
                    </p>



                </div>
            </div>
            @php
                $addressCount = \App\Models\Address::where('user_id',Auth::user()->id)->get();
            @endphp

            @if (count($addressCount)>=1)
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-4">
                    <div class="bucks_holder">
                        <p class="_ebucks">
                            My Address
                        </p>

                        <p class="_detail">
                            {{$address->first_name.' '.$address->last_name}} , </br>
                            House no. {{$address->house_no}}, {{$address->area}}, {{$address->city}}, {{$address->state}} {{$address->pin}}
                        </p>

                        <a href="{{url('my_addressbook')}}" class="continue_shopping_">
                            edit address
                        </a>
                    </div>
                </div>
            @endif


        </div>
    </div>
@endsection
