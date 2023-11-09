<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CardsOilRequest;
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
    public function edit($id){
        $card = Card::find($id);
        if(!$card){
            return abort(404);
        }
        return view('admin.pages.card.edit',compact('card'));
    }
    public function update(CardsRequest $request , $id){
        $card = Card::find($id);
        if(!$card){
            return abort(403);
        }
        $card->update([
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
        return redirect()->route('admin.index.cards')->with(['success' => 'تم تعديل بيانات المعدة بنجاح']);
    }
    public function delete($id){
        $card = Card::find($id);
        if(!$card){
            return abort(403);
        }
        $card->delete();
        return redirect()->route('admin.index.cards')->with(['success' => 'تم حذف سجل المعدة بنجاح']);
    }
    ////////////////Cards Oil Registration/////////////////
    public function oil_registration(CardsOilRequest $request, $id){
    $card = Card::find($id);
    if(!$card){
        return abort(403);
    }
    $card->update([
        'date_of_oil' => $request['date_of_oil'],
        'oil_hours' => $request['oil_hours'],
        'card_hours' => $request['oil_hours'],
        'hours_used' => 0,
        'remaining_hours' => 200
    ]);
        return redirect()->route('admin.index.cards')->with(['success' => 'تم تسجيل بيانات تغيير الزيت الجديدة']);
    }
}
