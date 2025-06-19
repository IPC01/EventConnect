<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\EventPackage;

class ShopController extends Controller
{
    public function index(){
        return view('shop.pages.index');
    }
    public function galery(){
        $images=Image::all();
        return view('shop.pages.galery',compact('images'));
    }
    public function package(){
        $packages=EventPackage::all();
        return view('shop.pages.packages',compact('packages'));
    }
    public function packagedetails($id){
        $package=FindOrFail($id);
        return view('shop.pages.packdDtails',compact('package'));
    }
}
