<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{  translate('INVOICE') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <style media="all">
        @page {
            margin: 50px;
            padding: 0;
        }

        body {
            font-size: 1rem;
            font-family: '<?php echo  $font_family ?>';
            font-weight: normal;
            direction: <?php echo $direction ?>;
            text-align: <?php echo $text_align ?>;
            padding: 0;
            margin: 0;
        }

        .gry-color *,
        .gry-color {
            color: #000;
        }

        table {
            /*width: 100%;*/
        }

        table th {
            font-weight: normal;
        }

        table.padding th {
            padding: .25rem .7rem;
        }

        table.padding td {
            padding: .25rem .7rem;
        }

        table.sm-padding td {
            padding: .1rem .7rem;
        }

        .border-bottom td,
        .border-bottom th {
            border-bottom: 1px solid #eceff4;
        }

        .text-left {
            text-align: <?php echo $text_align ?>;
        }

        .text-right {
            text-align: <?php echo $not_text_align ?>;
        }

    </style>
</head>

<body>
    <table border="0" cellspacing="0" cellpadding="0" align="center" style="border:5px solid #3e3d42; color:#3e3e3e;">
        <tr>
            <td>

                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td style="font-family:arial; color:#3e3e3e;">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="400">
                                       
                                      @php
                                        $logo = get_setting('header_logo');
                                      @endphp
                                      @if($logo != null)
                                        <img style="height:30px;" src="{{ uploaded_asset($logo) }}">
                                      @else
                                        <img src="{{ static_asset('assets/img/logo.png') }}">
                                      @endif
                                    </td>
                                    <td>
                                        <table width="90%" border="0" cellspacing="0" cellpadding="0" align="right">
                                            <tr>
                                                <td colspan="3" style="text-align:right; font-size:12px; padding:10px 10px 30px 0px; line-height:14px;">
                                                    <strong>Tax Invoice/Bill By Supply/Cash Memo</strong><br />
                                                    (Original for Recipient)</td>
                                            </tr>
                                            <tr>
                                                <td style="width:35%; padding:0 5px 0px 5px; border-right:1px solid #3e3d42; font-size:11px; line-height:14px;">
                                                    <strong>ADDRESS</strong><br />
                                                    <span style="font-size:11px;">
                                                      {{ get_setting('contact_address') }}
                                                    </span>
                                                </td>
                                                <td
                                                    style="width:27%; padding:0px 5px 0px 10px; border-right:1px solid #3e3d42; font-size:11px; line-height:14px;">
                                                    <strong>PHONE</strong><br />
                                                    <span style="font-size:11px;">{{ get_setting('contact_phone') }}</span>  
                                                </td>
                                                <td
                                                    style="width:23%; padding:0px 10px 0px 10px; font-size:11px; line-height:14px;">
                                                    <strong>WEB/MAIL</strong><br />
                                                    <span style="font-size:11px;">{{ get_setting('contact_email') }}</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table width="97%" border="0" cellspacing="0" cellpadding="0"
                                style="padding-top:25px; padding-bottom:20px;" align="right">
                                <tr>
                                    @php
                                        $shipping_address = json_decode($order_table->shipping_address);
                                    @endphp

                                    <td style="width:30%; font-size:12px; line-height:14px;" align="left" valign="top">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td>
                                                  <strong style="text-decoration:underline; font-size:12px;">
                                                    BILLING ADDRESS
                                                  </strong>
                                                </td>
                                            </tr>

                                            <tr>
                                              <td height="28"><strong
                                                      style="font-size:18px;">{{ $shipping_address->name }}</strong>
                                              </td>
                                          </tr>
                                          <tr>
                                                <td>
                                                    {{ $shipping_address->address }},
                                                    {{ $shipping_address->area }}<br /> {{ $shipping_address->city }},
                                                    {{ $shipping_address->state }}<br/> 
                                                    Pin : {{ $shipping_address->postal_code }}<br/><br/>
                                                    Ph : {{ $shipping_address->phone }}<br/>
                                                    Email : {{ $order->user->email }}
                                                </td>
                                          </tr>
                                        </table>
                                    </td>
                                   
                                    <td style="width:30%; font-size:12px; line-height:14px; padding-right:30px;"
                                        align="left" valign="top">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td>
                                                  <strong style="text-decoration:underline; font-size:12px;">
                                                    SHIPPING ADDRESS
                                                  </strong>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td height="28"><strong
                                                        style="font-size:18px;">{{ $shipping_address->name }}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ $shipping_address->address }},
                                                    {{ $shipping_address->area }}<br /> {{ $shipping_address->city }},
                                                    {{ $shipping_address->state }}<br />Pin :
                                                    {{ $shipping_address->postal_code }}<br /><br />
                                                    Ph : {{ $shipping_address->phone }}<br />
                                                    Email : {{ $order->user->email }}</td>
                                            </tr>
                                        </table>
                                    </td>

                                    <td width="33%" valign="top">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td
                                                    style="background:#3e3d42; color:#ffffff; font-size:35px; text-align:center; letter-spacing: 3px;">
                                                    INVOICE</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table cellpadding="0" cellspacing="0" style="width:90%;"
                                                        align="right">
                                                        <tr>
                                                            <td colspan="3" height="22"><strong>Invoice Number
                                                                    #</strong> GCT{{ $order_table->code }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td height="22"><strong>Order Id</strong></td>
                                                            <td width="10"><strong>:</strong></td>
                                                            <td>{{ $order->order_number }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td height="22"><strong>Order Date</strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td>{{ date('d-m-Y', $order_table->date)}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td height="22"><strong>Invoice Date</strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td>{{ date('d-m-Y', $order_table->date) }}</td>
                                                        </tr>
                                                         <tr>
                                                            <td height="22"><strong>CIN</strong></td>
                                                            <td><strong>:</strong></td>
                                                            <td>U63999BR2024PTC069907</td>
                                                        </tr> 
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr style="background:#3e3d42; color:#ffffff; font-size:18px; line-height:35px; text-align:center;">
                                    <td>&nbsp;</td>
                                    <td height="30" style="color:#ffffff;"><strong>No.</strong></td>
                                    <td style="color:#ffffff;"><strong>Product Descriptions</strong></td>
                                    <td style="color:#ffffff;"><strong>Qty</strong></td>
                                    <td style="color:#ffffff;"><strong>Unit Price ₹</strong></td>
                                    <td style="background:#3e3d42; border-left:4px solid #ffffff; border-top:4px solid #ffffff; color:#ffffff;">
                                        <strong>Discounted Price ₹</strong>
                                    </td>
                                    {{-- <td style="background:#3e3d42; border-top:4px solid #ffffff; color:#ffffff;">
                                        <strong>IGST ₹</strong>
                                    </td> --}}
                                    <td style="background:#3e3d42; border-top:4px solid #ffffff; border-right:4px solid #ffffff; color:#ffffff;">
                                        <strong>Total ₹</strong>
                                    </td>
                                     
                                </tr>
								@php
									$total_price = 0;
									$total_unit_price = 0;
									$total_discount = 0;
								@endphp
                                @foreach ($order__details_table as $key => $orderDetail)
										
										
										
                                    @if ($orderDetail->product != null)
                                        <tr style="color:#3e3d42; font-size:16px; line-height:35px; text-align:center;">
                                            <td>&nbsp;</td>
                                            <td height="30" style="border-bottom:1px solid #3e3d42;">{{$counter}}</td>
                                            @php $counter++; @endphp
                                            <td style="border-bottom:1px solid #3e3d42;text-align:left;">{{ $orderDetail->product->name }}
                                                @if($orderDetail->variation != null) ({{ $orderDetail->variation }}) @endif -  {{ $orderDetail->product->unit }}</td>
                                            <td style="border-bottom:1px solid #3e3d42;">{{ $orderDetail->quantity }}</td>
                                            <td style="border-bottom:1px solid #3e3d42;"> {{ single_price($orderDetail->product->unit_price) }}  </td>
                                            <td style="background:#fff; border-left:4px solid #ffffff; border-bottom:1px solid #3e3d42;">
													@php
														$single_unit_price = $orderDetail->product->unit_price*$orderDetail->quantity;
														$single_discount = $single_unit_price-$orderDetail->price;
													@endphp
                                              {{ single_price($single_discount) }}</td>
											  
											   @php
													$total_price = $total_price+$orderDetail->price/$orderDetail->quantity;
													$total_unit_price = $total_unit_price+$orderDetail->product->unit_price*$orderDetail->quantity;
													$total_discount = $total_discount+$single_discount;
												@endphp
											{{--<td style="background:#fff; border-bottom:1px solid #3e3d42;">47.00</td>--}}
                                            <td style="background:#fff; border-right:4px solid #ffffff; border-bottom:1px solid #3e3d42;">
                                                {{ single_price($orderDetail->price+$orderDetail->tax) }}</td>
                                             
                                        </tr>
                                    @endif
                                @endforeach

                                <tr style="color:#3e3d42; font-size:16px; line-height:35px; text-align:center;">
                                    <td style="border-bottom:4px solid #ffffff;">&nbsp;</td>
                                    <td style="border-bottom:4px solid #ffffff;">&nbsp;</td>
                                    <td style="border-bottom:4px solid #ffffff; text-align:left;" colspan="3">
                                        <strong>Terms & Conditions :</strong><br />
                                        <span style=" line-height:22px;">
                                            * Cash on Delivery <br />
                                            * Card payment : Visa, Mastercard, UPI
                                        </span>
                                    </td>
                                    <td colspan="3" style="background:#fff; border-bottom:4px solid #ffffff; border-left:4px solid #ffffff; border-right:4px solid #ffffff;">
                                        <table cellpadding="0" cellspacing="0"
                                            style="float:left; width:98%; line-height:25px; text-align:right;">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Sub Total</strong></td>
                                                    <td width="20"><strong>:</strong></td>
                                                    <td><strong>{{ single_price($order->grand_total) }}</strong></td>
                                                </tr>
												@php
													$combined_order = \App\Models\CombinedOrder::where('id', $order->combined_order_id)->first();
												@endphp
                                                <tr>
                                                    <td><strong>Shipping Cost</strong></td>
                                                    <td><strong>:</strong></td>
                                                    <td><strong>{{ single_price($order->delivery_charge) }}</strong></td>
                                                </tr>
                                                {{--<tr>
                                                    <td><strong>Total Tax</strong></td>
                                                    <td><strong>:</strong></td>
                                                    <td><strong>{{ single_price($order->orderDetails->sum('tax')) }}</strong></td>
                                                </tr>--}}
                                                <tr>
                                                    <td><strong>Total Discount</strong></td>
                                                    <td><strong>:</strong></td>
                                                    <td><strong>₹ {{ $total_discount }}</strong></td>
                                                </tr>
												 
                                            </tbody>
                                        </table>
                                    </td>
                                    <td style="border-bottom:4px solid #ffffff;">&nbsp;</td>
                                </tr>
								@php
								  $amount_in_words = $order->amount_in_words;
								@endphp
                                <tr style="color:#ffffff; font-size:16px; line-height:25px; text-align:center;">
                                    <td>&nbsp;</td>
                                    <td style="text-align:left; background:#3e3d42; text-align:center; color:#fff;"
                                        colspan="4">{{ $amount_in_words }} Rupees Only.</td>
                                    <td colspan="3"
                                        style="background:#c17e27; border-right:4px solid #ffffff; border-left:4px solid #3e3d42;">
                                        <table cellpadding="0" cellspacing="0" style="width:98%; line-height:25px;"
                                            align="right">
                                            <tbody>
                                                <tr>
                                                    <td width="57%" style="color:#ffffff;"><strong>Grand Total</strong>
                                                    </td>
                                                    <td width="20" style="color:#ffffff;"><strong>:</strong></td>
                                                    <td style="color:#ffffff;">
                                                        <strong>{{ single_price($order->grand_total+$order->delivery_charge) }}</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td style="border-bottom:4px solid #ffffff;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table width="95%" border="0" cellspacing="0" cellpadding="0"
                                style="padding-top:30px; padding-bottom:20px;" align="right">
                                <tr>
                                    <td style="width:35%; font-size:11px; line-height:20px;" align="left">
                                         

                                        
                                    </td>

                                    <td style="width:20%; padding-top:40px; text-align:center;">
                                        @php
                                            $removedXML = '<?xml version="1.0" encoding="UTF-8"?>';
                                        @endphp
                                        {!! str_replace($removedXML,"", QrCode::size(100)->generate($order->order_number)) !!}
                                    </td>

                                    <td style="width:25%; font-size:11px; line-height:20px; text-align:center;"><img style="height:50px;" src="{{ static_asset('assets_web/img/signature.jpg') }}" /><br />&iota;........................................&iota;<br />
                                        Authorised Signatory
                                    </td>

                                    {{--<td style="width:20%; padding-top:40px; text-align:center;"><img
                                            src="{{ static_asset('assets_web/img/thankulogo.jpg ') }}" /></td>--}}
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <table width="98%" border="0" cellspacing="0" cellpadding="0"
                                style="font-size:10px; line-height:14px; color:#000000; border-bottom:1px dotted #333333; margin-bottom:8px; margin-right:20px;">
                                <tr>
                                    <td
                                        style="font-size:11px; line-height:14px; color:#000000; border-bottom:1px dotted #333333; margin-bottom:8px; text-align:left; margin-right:20px;">
                                        <strong>Returns Policy:</strong> <em>At {{ env('APP_NAME') }} we try to deliver perfectly
                                            each and every time. but in the off-chance that you need to return the item,
                                            please do so with the</em> <strong>Original Brand box/Price tag, original
                                            packing and invoice</strong> <em>without which it will be really difficult
                                            for us to act on your request. Please help us in helping you. Terms and
                                            conditions apply</em><br />

                                        <em>The goods sold as are intended for end user consumption and not for
                                            re-sale.</em>
                                            <br/>

                                        <em>Regd. office: {{$order->shop_name}}, {{$order->address}}, 
                                            {{$order->city}}, {{$order->state}}, {{$order->pincode}} </em><br/>
                                        <strong>Contact {{ env('APP_NAME') }} : {{ get_setting('contact_phone') }}||
                                            <a href="{{url('contact-us')}}">{{url('contact-us')}}</a>
                                        </strong>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>

    </table>

</body>

</html>
