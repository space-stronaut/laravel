<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\Agenda;

class SearchController extends Controller
{
    public function cari(Request $request){
        $query = $request->cari;


        $workers = Worker::all();
        $agendas = Agenda::where('waktu', 'like', '%'.$query.'%')->get();


        return view('agendas.data', compact('agendas','workers'));
    }
}
