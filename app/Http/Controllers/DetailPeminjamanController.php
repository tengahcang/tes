<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Detail_paket;
use App\Models\Detail_peminjaman;
use App\Models\Detail_peminjamans;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DetailPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $latestId = DB::table('peminjamans')->max('id');
        // $data = DB::table('detail_peminjamans')
        //             ->where('peminjaman_id','=',$latestId)
        //             ->get();

        // return view('detailpeminjaman.index',[
        //     // 'datas'=>$data,
        //     'id'=>$id
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $latestId=$_GET['id'];
        // $paket = DB::table('pakets')
        //             ->select('*')
        //             ->get();
        $paket = Paket::all();
        // $detailpakets = DB::table('detail_pakets')
                            // ->select('*')
                            // ->get();
        $detailpakets = Detail_paket::all();
        // dd($detailpakets->barangs);
        // $barangsWithoutDetailPakets = DB::table('barangs')
        //                                 ->whereNotExists(function ($query) {
        //                                     $query->select(DB::raw(1))
        //                                         ->from('detail_pakets')
        //                                         ->whereRaw('detail_pakets.barang_id = barangs.id');
        //                                 })
        //                                 ->get();
        $barangsWithoutDetailPakets = Barang::whereDoesntHave('detailpaket')->get();
        // var_dump($detailpakets);die;
        return view('detailpeminjaman.create',[
            'id'=>$latestId,
            'pakets'=>$paket,
            'detailpakets'=>$detailpakets,
            'barangs'=>$barangsWithoutDetailPakets
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->paket == 'satuan'){
            $barang = New Detail_peminjamans();
            $barang->barang_id = $request->barang;
            $barang->peminjaman_id = $request->dataid;
            $barang->jumlah = $request->qty;
            $barang->status = 'waiting';
            $barang->save();
            Alert::success('Added Successfully', 'Laporan Data Added Successfully.');
            return redirect()->route('detailpeminjaman.show',['detailpeminjaman'=>$request->dataid]);
        }else{
            $detailpakets = DB::table('detail_pakets')
                            ->select('*')
                            ->get();
            foreach ($detailpakets as $detailpaket){
                if ($detailpaket->paket_id == $request->paket){
                    $barang = New Detail_peminjamans();
                    $barang->barang_id = $detailpaket->barang_id;
                    $barang->peminjaman_id = $request->dataid;
                    $barang->jumlah = $detailpaket->qty;
                    $barang->status = 'waiting';
                    $barang->save();
                }
            }
            Alert::success('Added Successfully', 'Laporan Data Added Successfully.');
            return redirect()->route('detailpeminjaman.show',['detailpeminjaman'=>$request->dataid]);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        // $data = DB::table('detail_peminjamans')
        //             ->where('peminjaman_id','=',$id)
        //             ->get();
        $data = Detail_peminjamans::where('peminjaman_id',$id)->get();
        // var_dump($data);die;
        return view('detailpeminjaman.show',[
            'datas'=>$data,
            'id'=>$id
        ]);
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
}
