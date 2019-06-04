<?php

namespace App\Http\Controllers;

use App\Coment;
use App\Companie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
   public function index()
   {
       return view('pages.index');
   }

   public function indexWithId($id)
   {
       $check = Companie::findOrFail($id);
       $coments = Coment::where('company_id','=',$id)->get();
       $count = Coment::all()->where('company_id','=',$id)->count();
       return view('pages.profile',compact('id'),compact('count'))->with('coments',$coments);
   }

   public function delete_company()
   {
    Storage::disk('public')->delete(Auth::user()->img_path);
    Auth::user()->delete();
    return  redirect('http://localhost/Company/Test/public/logout');
   }
}
