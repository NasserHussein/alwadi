<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    public function index(){
        return view('admin.pages.card.index');
    }
    public function create(){
        return view('admin.pages.card.create');
    }
}