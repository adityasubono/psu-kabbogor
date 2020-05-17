<?php

namespace App\Http\Controllers;

use App\ProductStock;
use Illuminate\Http\Request;

class ProductAddMoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addMore()
    {
        return view('products.addMore');
    }

    public function addMorePost(Request $request)
    {
//        $request->validate([
//            'addmore.*.name' => 'required',
//            'addmore.*.qty' => 'required',
//            'addmore.*.price' => 'required',
//        ]);


        foreach ($request->addmore as $key => $value){
            ProductStock::create($value);
        }

        return back()->with('success','Record Created Successfully.');
    }
}
