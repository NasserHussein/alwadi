<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HourCardRequest;
use App\Models\Admin\Card;
use App\Models\Admin\Hour;
use Illuminate\Http\Request;

class HoursController extends Controller
{
     //////////////////// Start Hours Cards Types /////////////////
    public function index_hour_digger(){
        $cards = Card::where('name' , 'حفار')->get();
        return view('admin.hour.pages.hour.types.digger',compact('cards'));
    }
    public function index_hour_loader(){
        $cards = Card::where('name' , 'لودر')->get();
        return view('admin.pages.hour.types.loader',compact('cards'));
    }
    public function index_hour_generator(){
        $cards = Card::where('name' , 'مولد')->get();
        return view('admin.pages.hour.types.generator',compact('cards'));
    }
    public function index_hour_crusher(){
        $cards = Card::where('name' , 'كسارة')->get();
        return view('admin.pages.hour.types.crusher',compact('cards'));
    }
    public function index_hour_compressor(){
        $cards = Card::where('name' , 'كمبريسور')->get();
        return view('admin.pages.hour.types.compressor',compact('cards'));
    }
    public function index_hour_research_machine(){
        $cards = Card::where('name' , 'ماكينة ابحاث')->get();
        return view('admin.pages.hour.types.research_machine',compact('cards'));
    }
     //////////////////// End Hours Cards Types /////////////////
    public function store(HourCardRequest $request , $id){
        $card = Card::find($id);
        if(!$card){
            return abort(403);
        }
        if(Hour::all()->count() == 0){
            $last_hour = 0;
        }else{
            $last_hour = Hour::latest()->first()->card_hours;
        }

        if(!$last_hour){
            $count =0;
        }else{
        $count = $request['card_hours'] - $last_hour;
        }
        $duration_of_oil =200;
        $hours_used = $request['card_hours'] - $card->oil_hours;
        $remaining_hours = $duration_of_oil - $hours_used;
        $card->update([
            'card_hours' => $request['card_hours'],
            'hours_used' => $hours_used,
            'remaining_hours' => $remaining_hours
        ]);
        Hour::create([
            'card_hours' => $request['card_hours'],
            'date' => $request['date'],
            'card_id' => $id,
            'count' => $count
        ]);
        if($card->name == 'حفار'){
            return redirect()->route('admin.hour.digger.cards')->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }else if($card->name == 'لودر'){
            return redirect()->route('admin.hour.loader.cards')->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
        else if($card->name == 'مولد'){
            return redirect()->route('admin.hour.generator.cards')->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
        else if($card->name == 'كسارة'){
            return redirect()->route('admin.hour.crusher.cards')->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
        else if($card->name == 'كمبريسور'){
            return redirect()->route('admin.hour.compressor.cards')->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
        else if($card->name == 'ماكينة ابحاث'){
            return redirect()->route('admin.hour.research.machine.cards')->with(['success' => 'تم تحديث عداد المعدة بنجاح']);
        }
    }
}
