<?php

namespace App\Http\Controllers;

use App\Models\Detail_peminjamans;
use App\Models\Peminjamans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Detail_peminjamans::all();

        return view('peminjaman.index',[
            // 'datas1'=>$data,
            // 'datas2'=>$data2
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peminjaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':colom harus diisi',
            'image' => ':isi dengan format foto'
        ];
        $validator = Validator::make($request->all(),[
            'tanggal_kembali' => 'required',
            'Event' => 'required',
            'Keterangan' => 'required',
            'tanggal_pinjam' => 'required'
        ],$messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $laporan = New Peminjamans();
        $laporan->user_id = $request->Nama;
        $laporan->event = $request->Event;
        $laporan->keterangan = $request->Keterangan;
        $laporan->tanggal_pinjam = $request->tanggal_pinjam;
        $laporan->tanggal_kembali = $request->tanggal_kembali;
        $laporan->status = "waiting";
        $laporan->save();
        $id= $laporan->id;
        Alert::success('Added Successfully', 'Laporan Data Added Successfully.');
        return redirect()->route('detailpeminjaman.show',[
            'detailpeminjaman'=>$id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getData(Request $request)
    {
        $data = Detail_peminjamans::with(['barang','peminjaman', 'peminjaman.user' ]);

    if ($request->ajax()) {
        return datatables()->of($data)
            ->addIndexColumn()
            // ->addColumn('actions', function($employee) {
            //     return view('employee.actions', compact('employee'));
            // })
            ->toJson();
        }
    }
}
