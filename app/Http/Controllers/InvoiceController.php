<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Language;
use App\Models\Order;
use App\Models\CombinedOrder;
use App\Models\OrderDetail;
use Session;
use PDF;
use Config;

class InvoiceController extends Controller
{
    // convert from number to text format
    public function numberToWord($num = '')
    {
        $num    = ( string ) ( ( int ) $num );
        if( ( int ) ( $num ) && ctype_digit( $num ) )
        {
            $words  = array( );
            $num    = str_replace( array( ',' , ' ' ) , '' , trim( $num ) );
            $list1  = array('','one','two','three','four','five','six','seven',
                'eight','nine','ten','eleven','twelve','thirteen','fourteen',
                'fifteen','sixteen','seventeen','eighteen','nineteen');

            $list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
                'seventy','eighty','ninety','hundred');

            $list3  = array('','thousand','million','billion','trillion',
                'quadrillion','quintillion','sextillion','septillion',
                'octillion','nonillion','decillion','undecillion',
                'duodecillion','tredecillion','quattuordecillion',
                'quindecillion','sexdecillion','septendecillion',
                'octodecillion','novemdecillion','vigintillion');

            $num_length = strlen( $num );
            $levels = ( int ) ( ( $num_length + 2 ) / 3 );
            $max_length = $levels * 3;
            $num    = substr( '00'.$num , -$max_length );
            $num_levels = str_split( $num , 3 );

            foreach( $num_levels as $num_part ) {
                $levels--;
                $hundreds   = ( int ) ( $num_part / 100 );
                $hundreds   = ( $hundreds ? ' ' . $list1[$hundreds] . ' Hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '' );
                $tens       = ( int ) ( $num_part % 100 );
                $singles    = '';
                if( $tens < 20 ) {
                    $tens = ( $tens ? ' ' . $list1[$tens] . ' ' : '' );
                } else {
                    $tens = ( int ) ( $tens / 10 );
                    $tens = ' ' . $list2[$tens] . ' ';
                    $singles = ( int ) ( $num_part % 10 );
                    $singles = ' ' . $list1[$singles] . ' ';
                }
                $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_part ) ) ? ' ' . $list3[$levels] . ' ' : '' );
            }

            $commas = count( $words );
            if( $commas > 1 ){
                $commas = $commas - 1;
            }
            $words  = implode( ', ' , $words );
            $words  = trim( str_replace( ' ,' , ',' , ucwords( $words ) )  , ', ' );
            if( $commas ){
                $words  = str_replace( ',' , ' and' , $words );
            }
            return $words;

        }else if( ! ( ( int ) $num ) ){
            return 'Zero';
        }
        return '';
    }


    //download invoice
    public function invoice_download($id)
    {
        if(Session::has('currency_code')){
            $currency_code = Session::get('currency_code');
        }else{
            $currency_code = Currency::findOrFail(get_setting('system_default_currency'))->code;
        }
        $language_code = Session::get('locale', Config::get('app.locale'));

        if(Language::where('code', $language_code)->first()->rtl == 1){
            $direction = 'rtl';
            $text_align = 'right';
            $not_text_align = 'left';
        }else{
            $direction = 'ltr';
            $text_align = 'left';
            $not_text_align = 'right';
        }

        if($currency_code == 'AED' || $currency_code == 'EGP' || $language_code == 'sa' || $currency_code == 'IQD' || $language_code == 'ir' || $language_code == 'om' || $currency_code == 'ROM'){
            // middle east/arabic font
            $font_family = "'XBRiyaz','sans-serif'";
        }else{
            // general for all
            $font_family = "'Roboto','sans-serif'";
        }

        // $order = Order::select('orders.*', 'shops.name AS shop_name', 'shops.address', 'shops.phone', 'shops.state', 'shops.city', 'shops.pincode', 'shops.business_pan', 'shops.gst_no')
        //     ->leftJoin('shops', 'shops.user_id', '=', 'orders.seller_id')
        //     ->where('orders.id', $id)
        //     ->first();
        $order = CombinedOrder::findOrFail($id);
        $order->amount_in_words = $this->numberToWord($order->grand_total+$order->delivery_charge);

        $counter = 1;
        $order_table = Order::where('combined_order_id', $order->id)->first();
        $order__details_table = OrderDetail::where('combined_order_id', $order->id)->get();
        return PDF::loadView('backend.invoices.invoice',[
            'order' => $order,
            'order_table' => $order_table,
            'order__details_table' => $order__details_table,
            'counter' => $counter,
            'font_family' => $font_family,
            'direction' => $direction,
            'text_align' => $text_align,
            'not_text_align' => $not_text_align
        ], [], [])->download('order-'.$order->order_number.'.pdf');
    }

    //download service invoice
    public function download_service_invoice($id)
    {
        if(Session::has('currency_code')){
            $currency_code = Session::get('currency_code');
        }
        else{
            $currency_code = Currency::findOrFail(get_setting('system_default_currency'))->code;
        }
        $language_code = Session::get('locale', Config::get('app.locale'));

        if(Language::where('code', $language_code)->first()->rtl == 1){
            $direction = 'rtl';
            $text_align = 'right';
            $not_text_align = 'left';
        }else{
            $direction = 'ltr';
            $text_align = 'left';
            $not_text_align = 'right';
        }

        if($currency_code == 'AED' || $currency_code == 'EGP' || $language_code == 'sa' || $currency_code == 'IQD' || $language_code == 'ir' || $language_code == 'om' || $currency_code == 'ROM'){
            // middle east/arabic font
            $font_family = "'XBRiyaz','sans-serif'";
        }else{
            // general for all
            $font_family = "'Roboto','sans-serif'";
        }

        $order = ServiceOrder::findOrFail($id);
        return PDF::loadView('backend.invoices.service_invoice',[
            'order' => $order,
            'font_family' => $font_family,
            'direction' => $direction,
            'text_align' => $text_align,
            'not_text_align' => $not_text_align
        ], [], [])->download('order-'.$order->code.'.pdf');
    }
}
