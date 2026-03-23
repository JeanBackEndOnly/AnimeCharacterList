<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CharacterInfoModel;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        $characters = CharacterInfoModel::all();
        return view('admin.dashboard', compact('characters'));
    }
}
