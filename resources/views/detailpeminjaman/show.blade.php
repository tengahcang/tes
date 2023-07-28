@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row mb-0">
        <div class="col-lg-9 col-xl-10">
            {{-- <h4 class="mb-3">{{ $pageTitle }}</h4> --}}
        </div>
        <div class="col-lg-3 col-xl-2">
            <div class="d-grid gap-2">
                <a class="btn btn-primary" href="{{ route('detailpeminjaman.create',['id'=>$id]) }}"><i class="bi bi-plus"> Tambah Barang</i></a>
            </div>
        </div>
    </div>
    <hr>
    {{-- <h1>{{$id}}</h1> --}}
    <div class="table-responsive border p-3 rounded-3">
        <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="employeeTable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>barang</th>
                    <th>jumlah</th>
                    <th></th>
                </tr>
            </thead>

            @if ($datas->isNotEmpty())
                <tbody>
                    @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->barang->nama_barang }}</td>
                            <td>{{ $data->jumlah }}</td>
                            <td>@include('detailpeminjaman.action')</td>
                        </tr>
                    @endforeach
                </tbody>
            @else
                <h1>tidak ada barang</h1>
            @endif



        </table>
    </div>
</div>
@endsection
