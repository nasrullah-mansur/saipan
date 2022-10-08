<?php

namespace App\Http\Controllers\Order;

use App\Jobs\OrderMailJob;
use Illuminate\Http\Request;
use App\Models\Order\TaxiOrder;
use App\Http\Controllers\Controller;
use App\DataTables\TaxiOrderDataTable;
use Illuminate\Support\Facades\Session;

class TaxiOrderController extends Controller
{
    public function orderTaxi(Request $request)
    {
        
        $request->validate([
            'taxi_id' => 'required|numeric',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:255',
            'pick_up' => 'required|max:255',
            'drop_off' => 'required|max:255',
            'date_and_time' => 'required|max:255',
        ], [
            'taxi_id.required' => 'The select taxi field is required.'
        ]);

        $order = new TaxiOrder();
        $order->taxi_id = $request->taxi_id;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->pick_up = $request->pick_up;
        $order->drop_off = $request->drop_off;
        $order->date_and_time = $request->date_and_time;
        $order->status = 'Open';

        $taxi_order = $order;
        $order->save();
        dispatch(new OrderMailJob($taxi_order));

        return redirect()->back()->with('success', 'Your request has been sent successfully. We will contact you soon.');
    }

    public function index(TaxiOrderDataTable $dataTable)
    {
        return $dataTable->render('back.order.taxi');
    }

    public function update(Request $request)
    {
        $taxi = TaxiOrder::where('id', $request->data_id)->firstOrFail();
        $taxi->status = $request->status;
        $taxi->save();
        return redirect()->route('admin.order.taxi')->with('success', 'Status updated successfully');
    }


    public function delete(Request $request)
    {
        $taxi = TaxiOrder::where('id', $request->data_id)->firstOrFail();
        $taxi->delete();

        return redirect()->route('admin.order.taxi')->with('success', 'Item removed successfully');
    }
}
