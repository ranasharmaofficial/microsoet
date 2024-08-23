<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order Cancellation</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
 @font-face {
    font-family: 'Gilroy-Bold';
    font-style: normal;
    font-weight: normal;
    src: local('Gilroy-Bold'), url('Gilroy-Bold.woff') format('woff');
    }
    

    @font-face {
    font-family: 'Gilroy-Heavy';
    font-style: normal;
    font-weight: normal;
    src: local('Gilroy-Heavy'), url('Gilroy-Heavy.woff') format('woff');
    }
    

    @font-face {
    font-family: 'Gilroy-Light';
    font-style: normal;
    font-weight: normal;
    src: local('Gilroy-Light'), url('Gilroy-Light.woff') format('woff');
    }
    

    @font-face {
    font-family: 'Gilroy-Medium';
    font-style: normal;
    font-weight: normal;
    src: local('Gilroy-Medium'), url('Gilroy-Medium.woff') format('woff');
    }
    

    @font-face {
    font-family: 'Gilroy-Regular';
    font-style: normal;
    font-weight: normal;
    src: local('Gilroy-Regular'), url('Gilroy-Regular.woff') format('woff');
    }
</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="700" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr style="padding:0 0px; margin:0 0px; height:90px; clear:both; overflow:hidden; display:block;">
    <td><img src="{{static_asset('mailer/order_cancellation/images/password_reset_01.jpg') }}" width="700" height="91" alt=""></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#bd2a03" style="padding:0 0px; margin:0 0px; height:68px; clear:both; overflow:hidden; display:block;"><table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="328"><img src="{{static_asset('mailer/order_cancellation/images/password_reset_02.jpg') }}" width="302" height="69" alt=""></td>
    <td width="69"><a href="#"><img src="{{static_asset('mailer/order_cancellation/images/offer.jpg') }}" alt="" border="0"></a></td>
    <td width="96"><a href="#"><img src="{{static_asset('mailer/order_cancellation/images/dapp.jpg') }}" alt="" border="0"></a></td>
    <td width="79"><a href="#"><img src="{{static_asset('mailer/order_cancellation/images/visitweb.jpg') }}" alt="" border="0"></a></td>
    <td width="128" align="right"><img src="{{static_asset('mailer/order_cancellation/images/password_reset_04.jpg') }}" width="109" height="69" alt=""></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="padding:0 0px; margin:0 0px; height:206px; clear:both; overflow:hidden; display:block;"><img src="{{static_asset('mailer/order_cancellation/images/order_cancellation_03.jpg') }}" width="700" height="207" alt=""></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#ffe5b9" style="padding:0 0px; margin:0 0px; height:140px; clear:both; overflow:hidden; display:block;"><table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="113"><img src="{{static_asset('mailer/order_cancellation/images/order_cancellation_04.jpg') }}" width="113" height="141" alt=""></td>
    <td align="left" style="color:#321100; font-size:16px; font-family:Gilroy-Medium, Verdana, Geneva, sans-serif, Georgia, 'Times New Roman', Times, serif, Tahoma, Geneva, sans-serif;">Dear {{$order->user->name}}, your cancellation/refund request for your
  #<b>{{ $order->code }}</b> purchase has been received. It's been
duly processed & the refund initiated. Thanks for being a
valuable user here at eBuildBazaar.<br /><br />
You may check the <a href="#" style="color:#321100; font-size:16px; font-family:Gilroy-Medium, Verdana, Geneva, sans-serif, Georgia, 'Times New Roman', Times, serif, Tahoma, Geneva, sans-serif;">status of your order online here.</a></td>
    <td width="99"><img src="{{static_asset('mailer/order_cancellation/images/order_cancellation_06.jpg') }}" width="99" height="141" alt=""></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="padding:0 0px; margin:0 0px; height:182px; clear:both; overflow:hidden; display:block;"><img src="{{static_asset('mailer/order_cancellation/images/order_cancellation_07.jpg') }}" width="700" height="183" alt=""></td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#ffe5b9" style="padding:0 0px; margin:0 0px; height:106px; clear:both; overflow:hidden; display:block;"><table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="113"><img src="{{static_asset('mailer/order_cancellation/images/order_cancellation_08.jpg') }}" width="113" height="107" alt=""></td>
    <td align="left" style="color:#654b38; font-size:18px; font-family:Gilroy-Medium, Verdana, Geneva, sans-serif, Georgia, 'Times New Roman', Times, serif, Tahoma, Geneva, sans-serif;"><strong>You can find your refund details here below.
Click <a href="#" style="color:#654b38;">here</a> to change your billing address.</strong></td>
    <td width="233"><img src="{{static_asset('mailer/order_cancellation/images/order_cancellation_10.jpg') }}" width="233" height="107" alt=""></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#ffffff" style="padding:0 0px; margin:0 0px; height:109px; clear:both; overflow:hidden; display:block;"><table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="113"><img src="{{static_asset('mailer/order_cancellation/images/payment_confirmation_11.jpg') }}" width="113" height="110" alt=""></td>
    <td align="left" style="color:#654b38; font-size:12px; font-family:Gilroy-Medium, Verdana, Geneva, sans-serif, Georgia, 'Times New Roman', Times, serif, Tahoma, Geneva, sans-serif;"><strong style="color:#5a1da2;">Order Number:</strong> {{ $order->code }} <br />
<strong style="color:#5a1da2;">Purchase Date:</strong> {{ date('d-m-Y', $order->date) }}<br /><br />
<a href="#" style="color:#5a1da2;">Click here</a> to access your newly purchased products and services.</td>
    <td width="233"><img src="{{static_asset('mailer/order_cancellation/images/order_cancellation_13.jpg') }}" width="233" height="110" alt=""></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td valign="top" style="padding:0 0px; margin:0 0px; height:99%; clear:both; overflow:hidden; display:block;"><table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="70" valign="top" bgcolor="f2f5fa"><img src="{{static_asset('mailer/order_cancellation/images/payment_confirmation_14.jpg') }}" width="70"  alt=""></td>
    <td align="left" valign="top" style="color:#654b38; font-size:13px; font-family:Gilroy-Medium, Verdana, Geneva, sans-serif, Georgia, 'Times New Roman', Times, serif, Tahoma, Geneva, sans-serif;" bgcolor="#ffe5ba">
    <table width="518" border="0" cellspacing="0" cellpadding="0" align="center" style="padding-left:10px;">
  <tr>
    <td bgcolor="#ffffff"><table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="5%" height="25" align="left" valign="middle" style="border-top:1px solid #5a1da2; border-bottom:1px solid #5a1da2; font-size:13px;"><strong style="color:#5a1da2;">Qty</strong></td>
    <td width="55%" align="left" valign="middle" style="border-top:1px solid #5a1da2; border-bottom:1px solid #5a1da2; font-size:13px;"><strong style="color:#5a1da2;">Item Name</strong></td>
    <td width="10%" align="left" valign="middle" style="border-top:1px solid #5a1da2; border-bottom:1px solid #5a1da2; font-size:13px;"><strong style="color:#5a1da2;">Tax</strong></td>
    <td width="30%" align="left" valign="middle" style="border-top:1px solid #5a1da2; border-bottom:1px solid #5a1da2; font-size:13px;"><strong style="color:#5a1da2;">Price</strong></td>
  </tr>
  @foreach ($order->orderDetails as $key => $orderDetail)
	  @if ($orderDetail->product != null)
      <tr>
        <td style="border-bottom:1px solid #f5f5f5; padding:10px 0px">{{ $orderDetail->quantity }}</td>
        <td style="border-bottom:1px solid #f5f5f5; padding:10px 0px">{{ $orderDetail->product->getTranslation('name') }} @if($orderDetail->variation != null) ({{ $orderDetail->variation }}) @endif</td>
        <td style="border-bottom:1px solid #f5f5f5; padding:10px 0px">{{ single_price($orderDetail->tax/$orderDetail->quantity) }}</td>
        <td style="border-bottom:1px solid #f5f5f5; padding:10px 0px">&#8377; {{ single_price($orderDetail->price/$orderDetail->quantity) }} </td>
      </tr>
    @endif
  @endforeach
  <tr>
    <td height="28">&nbsp;</td>
    <td align="right">Order Sub Total:&nbsp;&nbsp;&nbsp;</td>
    <td>&#8377; {{ single_price($order->orderDetails->sum('price')) }}</td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
    <td align="right">Discount:&nbsp;&nbsp;&nbsp;</td>
    <td>&#8377; {{ single_price($order->coupon_discount) }}</td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
    <td align="right">Taxes:&nbsp;&nbsp;&nbsp;</td>
    <td>&#8377; {{ single_price($order->orderDetails->sum('tax')) }}</td>
  </tr>
  <tr>
    <td width="14%" height="25" align="left" valign="middle"style="border-top:1px solid #5a1da2; border-bottom:1px solid #5a1da2;">&nbsp;</td>
    <td width="55%" align="right" valign="middle" style="border-top:1px solid #5a1da2; border-bottom:1px solid #5a1da2; font-size:13px;"><strong style="color:#5a1da2;">Total:&nbsp;&nbsp;&nbsp;</strong></td>
    <td width="31%" align="left" valign="middle" style="border-top:1px solid #5a1da2; border-bottom:1px solid #5a1da2; font-size:13px;"><strong style="color:#5a1da2;">&#8377; {{ single_price($order->grand_total) }}</strong></td>
  </tr>
  <tr>
    @php
      $shipping_address = json_decode($order->shipping_address);
    @endphp
    <td colspan="3" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" valign="top" style="padding:10px; line-height:22px;"><strong style="color:#5a1da2;">Billing Address:</strong><br />
      {{ $shipping_address->name }}<br />
      {{ $shipping_address->address }}<br />
      {{ $shipping_address->city }} - {{ $shipping_address->postal_code }},<br />
      India
    </td>
    <td valign="top" style="padding:10px;"><strong style="color:#5a1da2;">Payment:</strong><br /><br />
      Type: @if($order->payment_type == "razorpay") Razorpay @else Cash @endif
    </td>
  </tr>
</table>
</td>
  </tr>
</table></td>
  </tr>
</table>

    
</td>
    <td width="70" bgcolor="#f2f5fa">&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#ffe5b9" style="padding:0 0px; margin:0 0px; height:86px; clear:both; overflow:hidden; display:block;"><table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="102"><img src="{{static_asset('mailer/order_cancellation/images/payment_confirmation_17.jpg') }}" width="102" height="87" alt=""></td>
    <td align="center" style="color:#a84a4f; font-size:18px; font-family:Gilroy-Medium, Verdana, Geneva, sans-serif, Georgia, 'Times New Roman', Times, serif, Tahoma, Geneva, sans-serif;"><strong>Got feedback? We'd love to hear it! Let us<br />
know what you think over <a href="#" style="color:#a84a4f;">here</a>.</strong></td>
    <td width="90"><img src="{{static_asset('mailer/order_cancellation/images/order_cancellation_19.jpg') }}" width="150" height="87" alt=""></td>
  </tr>
</table>
</td>
  </tr>
 
  <tr>
    <td valign="top" bgcolor="#8d002a" style="padding:0 0px; margin:0 0px; height:128px; clear:both; overflow:hidden; display:block;"><table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="154"><img src="{{static_asset('mailer/order_cancellation/images/order_cancellation_20.jpg') }}" width="154" height="129" alt=""></td>
    <td align="center" valign="middle" style="color:#ffffff; font-size:14px; font-family:Gilroy-Medium, Verdana, Geneva, sans-serif, Georgia, 'Times New Roman', Times, serif, Tahoma, Geneva, sans-serif;">This is an automated email sent from a notification system.
Please do not reply directly to this message.<br /><br />
For any questions, email us anytime here at:<br /><a href="mailto:info@ebuildbazaar.in" style="color:#ffffff; font-size:14px; font-family:Gilroy-Heavy, Verdana, Geneva, sans-serif, Georgia, 'Times New Roman', Times, serif, Tahoma, Geneva, sans-serif; text-decoration:none;">info@ebuildbazaar.in</a>
</td>
    <td width="153"><img src="{{static_asset('mailer/order_cancellation/images/order_cancellation_22.jpg') }}" width="153" height="129" alt=""></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td bgcolor="#ffe5b9" style="padding:0 0px; margin:0 0px; height:52px; clear:both; overflow:hidden; display:block;">
    <table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="163" align="left"><img src="{{static_asset('mailer/order_cancellation/images/feedback_13.jpg') }}" width="107" height="52" alt=""></td>
    <td width="393" align="center" valign="middle" style="color:#381705; font-size:11px; font-family:Gilroy-Medium, Verdana, Geneva, sans-serif, Georgia, 'Times New Roman', Times, serif, Tahoma, Geneva, sans-serif;">We hope you enjoy emails from eBuildBazaar. If you wish to unsubscribe,
please click <a href="#" style="color:#381705; font-size:12px; font-family:Gilroy-Medium, Verdana, Geneva, sans-serif, Georgia, 'Times New Roman', Times, serif, Tahoma, Geneva, sans-serif;">here</a>.</td>
    <td width="144" align="right"><img src="{{static_asset('mailer/order_cancellation/images/feedback_15.jpg') }}" width="109" height="52" alt=""></td>
  </tr>
</table>
</td>
  </tr>
  <tr>
    <td style="padding:0 0px; margin:0 0px; height:52px; clear:both; overflow:hidden; display:block;"><img src="{{static_asset('mailer/order_cancellation/images/password_reset_19.jpg') }}" width="700" height="53" alt=""></td>
  </tr>
  <tr>
    <td bgcolor="#ffe7cd" style="padding:0 0px; margin:0 0px; height:56px; clear:both; overflow:hidden; display:block;">
    <table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="197" align="left"><img src="{{static_asset('mailer/order_cancellation/images/password_reset_20.jpg') }}" width="197" height="57" alt=""></td>
    <td width="115" align="center"><a href="#"><img src="{{static_asset('mailer/order_cancellation/images/password_reset_21.jpg') }}" width="55" height="57" alt="" border="0"></a></td>
    <td width="70" align="center"><a href="#"><img src="{{static_asset('mailer/order_cancellation/images/password_reset_22.jpg') }}" width="57" height="57" alt="" border="0"></a></td>
    <td width="118" align="center"><a href="#"><img src="{{static_asset('mailer/order_cancellation/images/password_reset_23.jpg') }}" width="54" height="57" alt="" border="0"></a></td>
    <td width="200" align="right"><img src="{{static_asset('mailer/order_cancellation/images/password_reset_24.jpg') }}" width="200" height="57" alt=""></td>
  </tr>
</table>

    </td>
  </tr>
  <tr>
    <td bgcolor="#8a012a" style="padding:0 0px; margin:0 0px; height:84; clear:both; overflow:hidden; display:block;"><table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top"><img src="{{static_asset('mailer/order_cancellation/images/password_reset_25.jpg') }}" width="107" height="230" alt=""></td>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="{{static_asset('mailer/order_cancellation/images/password_reset_26_1.jpg') }}" height="26" alt=""></td>
  </tr>
  <tr>
    <td align="center" style="color:#fee4b8; font-size:12px; font-family:Gilroy-Medium, Verdana, Geneva, sans-serif, Georgia, 'Times New Roman', Times, serif, Tahoma, Geneva, sans-serif;">This e-mail and any files transmitted with it may contain privileged or confidential
information. It is solely for use by the individual for whom it is intended, even if
addressed incorrectly. If you received this e-mail in error, please notify the sender;
do not disclose, copy, distribute, or take any action in reliance on the contents of
this information; and delete it from your system. Any other use of this e-mail is
prohibited.<br /><br />
<strong>Thank you for your compliance.</strong><br /><br />
Copyright © 2022 by Triple Play Infra. All rights reserved. eBuildBazaar, the eBB
logo, eBB App, eBB.au, eBB.uk, eBB.in are all registered trademarks of eBuildBazaar
(eBB) in India & other countries.
</td>
  </tr>
</table>
</td>
    <td align="right" valign="top"><img src="{{static_asset('mailer/order_cancellation/images/password_reset_27.jpg') }}" width="80" height="230" alt=""></td>
  </tr>
</table>
</td>
  </tr>
</table>
</body>
</html>