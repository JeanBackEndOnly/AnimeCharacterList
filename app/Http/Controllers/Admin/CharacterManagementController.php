<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CharacterInfoRequest;
use App\Models\CharacterInfoModel;
use Illuminate\Http\Request;

class CharacterManagementController extends Controller
{
    public function index(){
        $characters = CharacterInfoModel::all();
        return view('admin.management', compact('characters'));
    }
    public function show($id){
        $char = CharacterInfoModel::find($id);
        return view('admin.profile', compact('char'));
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
