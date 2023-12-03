<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Card;
use App\Models\Admin\Maintenance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $cards_oils = Card::where('date_of_oil' , NULL)->get();
    return view('admin.dashboard',compact('cards_oils'));
    }
}
