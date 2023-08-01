<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Laporan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = DB::table('laporans')
        //             ->select('*')
        //             ->get();
        // $data = Laporan::all();
        return view('laporan.index',[
            // 'laporan' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $barangs = DB::table('barangs')
        //             ->select('*')
        //             ->get();
        $barangs = Barang::all();
        return view('laporan.create',[
            'barangs'=>$barangs
        ]);
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
            // 'Nama' => 'required',
            'Alat' => 'required',
            'Deskripsi' => 'required',
            'Foto' => 'required|image'
        ],$messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $file = $request->file('Foto');
        $encryptedFilename = $file->hashName();
        $file->store('public/files');
        $laporan = New Laporan;
        $laporan->user_id = $request->Nama;
        $laporan->barang_id = $request->Alat;
        $laporan->descripsi = $request->Deskripsi;
        $laporan->foto = $encryptedFilename;
        $laporan->save();
        Alert::success('Added Successfully', 'Laporan Data Added Successfully.');
        return redirect()->route('home');
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
        $data = Laporan::with(['barang','user']);

        if ($request->ajax()) {
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($lapor) {
                    return view('laporan.actions', compact('lapor'));
                })
                ->toJson();
            }
    }
}
