<?php

namespace App\Http\Controllers;

use \App\Models\Agenda;
use \App\Models\Worker;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    public function index()
    {
        $agendas = Agenda::where('waktu', Carbon::today())
                            ->where('selesai', '>=' , Carbon::now())
                            ->where('mulai', '<=', Carbon::now())
                            ->paginate(4);

        $workers = Worker::paginate(8);
        return view('welcome', compact('agendas', 'workers'));
    }
    public function tampil()
    {
        $agendas = Agenda::where('waktu', Carbon::today())
                            ->where('selesai', '>=' , Carbon::now())
                            ->where('mulai', '<=', Carbon::now())
                            ->get();

        return view('data-agenda', compact('agendas'));
        
    }
    public function show()
    {
        $workers = Worker::all();
        return view('data-pegawai', compact('workers'));
    }
}
