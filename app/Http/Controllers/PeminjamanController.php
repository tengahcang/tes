<?php

namespace App\Http\Controllers;

use App\Models\Detail_peminjamans;
use App\Models\Peminjamans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = Peminjamans::all();
        // $data = Peminjamans::select('peminjamans.id as peminjaman_id')
        // ->join('users', 'peminjamans.user_id', '=', 'users.id')
        // ->get();
        // var_dump($data);die();
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
        $data = Peminjamans::find($id);
        // $alat = DB::table('detail_peminjamans')
        //             ->where('peminjaman_id','=',$id)
        //             ->get();
        $alat = Detail_peminjamans::where('peminjaman_id', $id)->get();
        // var_dump($alat);die();
        return view('peminjaman.edit',[
            'datas1'=>$data,
            'datas2'=>$alat
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->statuspeminjam == 'decline'){

        }else{
            $employee = Peminjamans::find($id);
            $employee->status = $request->statuspeminjam;
            $employee->save();
            Alert::success('Changed Successfully', 'status Data Changed Successfully.');
            return redirect()->route('pinjam.edit',['pinjam'=>$id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }


    public function getData(Request $request)
    {
        // $data = DB::table('peminjamans')->select('peminjamans.id as peminjaman_id')->join('users', 'peminjamans.user_id', 'users.id');
        // $data = Peminjamans::select('peminjamans.id as peminjaman_id')
        // ->join('users', 'peminjamans.user_id', '=', 'users.id')
        // ->get();
        $data = Peminjamans::with('user');
        // dd($data);

        if ($request->ajax()) {
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($data1) {
                    return view('peminjaman.actions', compact('data1'));
                })
                ->toJson();
            }
    }

    public function exportPdf(string $id)
    {
        // var_dump($id);die();
        $data = Peminjamans::find($id);
        $alat = Detail_peminjamans::where('peminjaman_id', $id)->get();
        // var_dump($employees->product->name_product);die();

        $pdf = PDF::loadView('export.export_pdf',[
            'datas1'=>$data,
            'datas2'=>$alat
        ]);

        return $pdf->download('F-02.pdf');

    }
}
