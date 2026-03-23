<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CharacterInfoRequest;
use App\Models\CharacterInfoModel;
use Illuminate\Http\Request;

class CharacterManagementController extends Controller
{
    public function index(){
        return view('admin.management');
    }
    public function store(CharacterInfoRequest $request){
        try {
            $data = $request->validated();
            $data['icon'] = $request->hasFile('icon') ? $request->file('icon')->store('characters', 'public') : null;
            CharacterInfoModel::create($data);
            return back()->with('success', 'Character "' . $request->name . '" created successfully!');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }

    }
}
