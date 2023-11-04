<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CardsRequest;
use App\Models\Admin\Card;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function index(){
        $cards = Card::all();
        return view('admin.pages.card.index',compact('cards'));
    }
    public function create(){
        return view('admin.pages.card.create');
    }
    public function store(CardsRequest $request){
        Card::create([
            'name' => $request['name'],
            'code' => $request['code'],
            'part' => $request['part'],
            'model' => $request['model'],
            'date_of_start' => $request['date_of_start'],
            'weight' => $request['weight'],
            'maker' => $request['maker'],
            'drg_no' => $request['drg_no'],
            'dimensions' => $request['dimensions'],
            'supplier' => $request['supplier'],
            'inst_bk_no' => $request['inst_bk_no'],
            'power' => $request['power'],
            'mfg_order_no' => $request['mfg_order_no'],
            'maintenance_bk_no' => $request['maintenance_bk_no'],
            'control_voltage' => $request['control_voltage'],
            'purchase_order_no' => $request['purchase_order_no'],
            'capacity' => $request['capacity'],
            'total_amperage' => $request['total_amperage'],
            'serial_no' => $request['serial_no'],
            'material' => $request['material'],
            'additional_data' => $request['additional_data'],
        ]);
        return redirect()->route('admin.index.cards')->with(['success' => 'تم تسجيل المعدة بنجاح']);
    }
}
