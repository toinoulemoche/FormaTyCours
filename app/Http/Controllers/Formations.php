<?php

namespace App\Http\Controllers;

use App\Models\Forms;
use App\Models\User;

class Formations extends Controller
{


    public function index(){

        $forms = Forms::all();
        return view('welcome', compact(['forms']));
    }

    public function detail($id){

        $details = Forms::where('id_formation', $id)->first();
        return view('details', compact('details'));
    }
}
