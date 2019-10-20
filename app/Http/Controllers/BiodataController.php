<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use App\Biodata;

class BiodataController extends Controller
{
    public function index(){
        return view('app');
    }

    public function getData(){
        $biodata = Biodata::all();

        return Response::json($biodata);
    }

    public function post($nama,$alamat){
        $biodata = new Biodata();

        $biodata->nama = $nama;
        $biodata->alamat = $alamat;

        $biodata->save();

        return Response::json(['status'=>'success']);
    }

    public function delete($id){
        Biodata::find($id)->delete();
    }

    public function edit($id){
        $biodata = Biodata::find($id);

        return Response::json($biodata);
    }

    public function update($id,Request $request){
        $biodata = Biodata::find($id);

        $biodata->nama = $request->nama;
        $biodata->alamat = $request->alamat;

        $biodata->save();

        return Response::json(['status'=>'success']);
    }
}
