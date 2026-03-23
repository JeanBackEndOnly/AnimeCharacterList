<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\CharacterInfoModel;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;

class CharacterProfileController extends Controller
{
    public function show($id){
        $char = CharacterInfoModel::find($id);
        return view('admin.updateProfile', compact('char'));
    }
    public function update(UpdateProfileRequest $request, $id){
        try{
            $validatedData = $request->validated();
            $characterData = CharacterInfoModel::findOrFail($id);
            $validatedData['icon'] = $characterData->icon;

            if($request->hasFile('icon')){
                if($characterData->icon && Storage::disk('public')->exists($characterData->icon)){
                    Storage::disk('public')->delete($characterData->icon);
                }
                $validatedData['icon'] = $request->file('icon')->store('characters', 'public');
            }

            $characterData->update($validatedData);
            $characterData->update($validatedData);
            return back()->with('success', 'Character "' . $request->name . '" Profile updated successfully!');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }

    }
}
