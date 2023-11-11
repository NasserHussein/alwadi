<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Card;
use Illuminate\Http\Request;

class HoursController extends Controller
{
     //////////////////// Start Hours Cards Types /////////////////
    public function index_hour_digger(){
        $cards = Card::where('name' , 'حفار')->get();
        return view('admin.pages.hour.types.digger',compact('cards'));
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
     //////////////////// End Hours Cards Types /////////////////
    }
}
