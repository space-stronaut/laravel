<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Agenda;
use \App\Models\Worker;
use App\Exports\AgendaExport;
use Maatwebsite\Excel\Facades\Excel;
use Alert;
use PDF;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendas = Agenda::orderBy('id', 'desc')->get();
        $workers = Worker::all();
        return view('agendas.data', compact('agendas', 'workers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workers = Worker::all();
        return view('agendas.create', compact('workers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'workers' => 'required',
            'agenda' => 'required',
            'lokasi'=> 'required',
            'waktu' => 'required'
        ],[
            'workers.required'          => 'Nama wajib diisi.',
            'agenda.required'      => 'Agenda Wajib diisi.',
            'lokasi.required'           => 'Lokasi Wajib Diisi.',
            'waktu.required'         => 'Waktu Wajib diisi.'    
        ]);
    
        $agendas = Agenda::create([
            'agenda' => $request->agenda,
            'lokasi' => $request->lokasi,
            'waktu' => $request->waktu,
            'selesai' => $request->selesai,
            'mulai' => $request->mulai
        ]);


        $agendas->workers()->sync(request('workers'));

        Alert::success('Agenda Berhasil Dibuat');

        return redirect('/agenda');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agendas = Agenda::find($id);
        $workers = Worker::all();
        return view('agendas.edit', compact('workers', 'agendas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $agendas = Agenda::find($id);

        $agendas->update([
            'workers' => $request->workers,
            'agenda' => $request->agenda,
            'lokasi' => $request->lokasi,
            'waktu' => $request->waktu,
            'selesai' => $request->selesai,
            'mulai' => $request->mulai
        ]);

        $agendas->workers()->sync(request('workers'));

        Alert::success('Agenda Berhasil Diubah');

        return redirect('/agenda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agendas = Agenda::find($id);
        $agendas->delete();

        Alert::success('Data Agenda Berhasil Dihapus');
        return redirect('/agenda');
    }
    public function cetak_pdf()
	{
		$agendas = Agenda::all();

    	$pdf = PDF::loadview('data_pdf', compact('agendas'));
    	return $pdf->download('laporan-agenda.pdf');
	}
}
