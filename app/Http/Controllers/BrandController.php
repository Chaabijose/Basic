<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function AllBrand() {

        $brands = Brand::paginate(3);
        return view ('Admin.Brand.index' , compact('brands')) ; 
    }
}
