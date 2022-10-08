<?php

namespace App\Http\Controllers\Order;

use App\DataTables\SaipanOrderDataTable;
use App\Http\Controllers\Controller;
use App\Jobs\OrderSaipanJob;
use App\Models\Order\SaipanOrder;
use Illuminate\Http\Request;

class SaipanOrderController extends Controller
{
    public function orderSaipan(Request $request)
    {
        
        $request->validate([
            'saipan_id' => 'required|numeric',
            's_name' => 'required|max:255',
            's_email' => 'required|email',
            's_phone' => 'required|max:255',
            's_date_and_time' => 'required|max:255',
        ], [
            'saipan_id.required' => 'The select saipan field is required.',
            's_name.required' => 'The name field is required.',
            's_email.required' => 'The email field is required.',
            's_phone.required' => 'The phone field is required.',
            's_date_and_time.required' => 'The date and time field is required.'
        ]);

        $order = new SaipanOrder();
        $order->saipan_id = $request->saipan_id;
        $order->name = $request->s_name;
        $order->email = $request->s_email;
        $order->phone = $request->s_phone;
        $order->amount = $request->s_amount;
       
        $order->date_and_time = $request->s_date_and_time;
        $order->status = 'Open';

        $order->save();
        dispatch(new OrderSaipanJob($order));
        return redirect()->back()->with('success', 'Your request has been sent successfully. We will contact you soon.');
    }

    public function index(SaipanOrderDataTable $dataTable)
    {
        return $dataTable->render('back.order.saipan');
    }

    public function update(Request $request)
    {
        $taxi = SaipanOrder::where('id', $request->data_id)->firstOrFail();
        $taxi->status = $request->status;
        $taxi->save();
        return redirect()->route('admin.order.saipan')->with('success', 'Status updated successfully');
    }


    public function delete(Request $request)
    {
        $taxi = SaipanOrder::where('id', $request->data_id)->firstOrFail();
        $taxi->delete();

        return redirect()->route('admin.order.saipan')->with('success', 'Item removed successfully');
    }
}
