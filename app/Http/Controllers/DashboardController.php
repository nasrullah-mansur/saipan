<?php

namespace App\Http\Controllers;

use App\Models\Admin\DropOff;
use App\Models\Admin\PickUp;
use App\Models\Admin\Saipan;
use App\Models\Admin\Taxi;
use App\Models\Order\SaipanOrder;
use App\Models\Order\TaxiOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $taxi = Taxi::count();
        $saipan = Saipan::count();
        $totalTaxiOrder = TaxiOrder::count();
        $totalSaipanOrder = SaipanOrder::count();
        $pickUp = PickUp::count();
        $dropOff = DropOff::count();
        $todayTaxiOrder = TaxiOrder::where('created_at', '>=', Carbon::today())->count();
        $todaySaipanOrder = SaipanOrder::where('created_at', '>=', Carbon::today())->count();
        return view('dashboard', compact(
            'users',
            'taxi',
            'saipan',
            'totalTaxiOrder',
            'totalSaipanOrder',
            'pickUp',
            'dropOff',
            'todayTaxiOrder',
            'todaySaipanOrder'
        ));
    }
}
