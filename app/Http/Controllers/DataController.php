<?php

namespace App\Http\Controllers;

use App\Companie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public function description(Request $request)
    {
       $companie = Companie::all()->find(Auth::user()->id);
       $companie->description = $request->input('description');
       $companie->save();
        $messenge = "Описание успешно сохраненно";
        return view('pages.response',compact('messenge'));
    }
    public function img(Request $request)
    {
        $this->validate($request, ['img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        if($request->img===null) return back();
        $companie = Companie::all()->find(Auth::user()->id);
        if($companie->img_path)Storage::disk('public')->delete($companie->img_path);
        $img = $request->file('img')->store('uploads','public');
        $companie->img_path = $img;
        $companie->save();
        $messenge = "Картинка успешно сохраненна";
        return view('pages.response',compact('messenge'));
    }
}
