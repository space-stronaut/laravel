<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Agenda;
use \App\Models\Worker;

class WelcomeController extends Controller
{
    public function index()
    {
        $agendas = Agenda::whereDate('waktu', date('Y-m-d'))->paginate(4);
        $workers = Worker::paginate(8);
        return view('welcome', compact('agendas', 'workers'));
    }
    public function tampil()
    {
        $agendas = Agenda::whereDate('waktu', date('Y-m-d'))->get();
        return view('data-agenda', compact('agendas'));
    }
    public function show()
    {
        $workers = Worker::all();
        return view('data-pegawai', compact('workers'));
    }
}
