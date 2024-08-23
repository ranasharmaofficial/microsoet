<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BulkOrder;
use App\Models\Product;
use App\Models\BulkOrderDetail;
use App\Models\Coupon;
use App\Models\User;
use Auth;
use DB;


class AdminBulkOrderController extends Controller
{
    public function allBulkOrderRequest(Request $request)
    {
        $date = $request->date;
        $sort_search = null;
        $orders = BulkOrder::orderBy('id', 'desc')->where('delivery_status', '!=', "deleted");

        if ($request->has('search')) {
            $sort_search = $request->search;
            $orders = $orders->where('code', 'like', '%' . $sort_search . '%');
        }
        
        if ($date != null) {
            $orders = $orders->where('created_at', '>=', date('Y-m-d', strtotime(explode(" to ", $date)[0])))->where('created_at', '<=', date('Y-m-d', strtotime(explode(" to ", $date)[1])));
        }

        $orders = $orders->paginate(15);

        foreach ($orders as $key => $value) {
            $order = BulkOrder::find($value->id);
            $order->viewed = 1;
            $order->save();
        }

        return view('backend.bulk_order.request.index', compact('orders', 'sort_search', 'date'));
    }

    public function all_orders_show($id)
    {
        $order = BulkOrder::findOrFail(decrypt($id));
        return view('backend.bulk_order.request.show', compact('order'));
    }

    public function bulkDelete(Request $request)
    {
        if ($request->id) {
            foreach ($request->id as $order_id) {
                $this->destroy($order_id);
            }
        }

        return 1;
    }

    public function destroy($id)
    {
        $delete_bulk_order = BulkOrder::findOrFail($id);
        $delete_bulk_order->delivery_status = "deleted";
        $delete_bulk_order->save();
                                                                                                                                 
        $delete_order_details = BulkOrderDetail::where('bulk_order_id', $id)
            ->update([
                'delivery_status' => 'deleted',
            ]);
                            
        if($delete_order_details){
			return redirect()->back()->with(session()->flash('alert-danger', 'Order has been deleted successfully!.'));
		}
		return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!.'));
    }


}