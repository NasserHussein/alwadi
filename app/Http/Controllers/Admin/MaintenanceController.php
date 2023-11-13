<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index_maintenance_compressor(){
        return view('admin.pages.maintenance.types.compressor');
    }
}
