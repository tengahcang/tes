@extends('layouts.app')
@section('content')
<div class="container mt-4">
    {{-- <div class="row mb-0">
        <div class="col-lg-9 col-xl-6">
            <h4 class="mb-3">{{ $pageTitle }}</h4>
        </div>
        <div class="col-lg-3 col-xl-6">
            <ul class="list-inline mb-0 float-end">
                <li class="list-inline-item">
                    <a href="{{ route('employees.exportExcel') }}" class="btn btn-outline-success">
                        <i class="bi bi-download me-1"></i> to Excel
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ route('employees.exportPdf') }}" class="btn btn-outline-danger">
                        <i class="bi bi-download me-1"></i> to PDF
                    </a>
                </li>
                <li class="list-inline-item">|</li>
                <li class="list-inline-item">
                    <a href="{{ route('employees.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i> Create Employee
                    </a>
                </li>
            </ul>
        </div>
    </div> --}}
    <hr>
    <div class="table-responsive border p-3 rounded-3">
        <table class="table table-bordered table-hover table-striped mb-0 bg-white datatable" id="employeeTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>user</th>
                    <th>nama</th>
                    <th>prodi/unit</th>
                    <th>event</th>
                    <th>jenis peminjaman</th>
                    <th>item</th>
                    <th>qty</th>
                    <th>notes</th>
                    <th>rental start</th>
                    <th>time start</th>
                    <th>rental end</th>
                    <th>time end</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $barang)
                    <tr>
                        <td>{{ $barang->id }}</td>
                        <td>{{ $barang->user }}</td>
                        <td>{{ $barang->nama }}</td>
                        <td>{{ $barang->pronit }}</td>
                        <td>{{ $barang->event }}</td>
                        <td>{{ $barang->jenis_peminjaman }}</td>
                        <td>{{ $barang->item }}</td>
                        <td>{{ $barang->qty }}</td>
                        <td>{{ $barang->notes }}</td>
                        <td>{{ $barang->rental_start }}</td>
                        <td>{{ $barang->time_start }}</td>
                        <td>{{ $barang->rental_end }}</td>
                        <td>{{ $barang->time_end }}</td>
                        <td>{{ $barang->status_barang }}</td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>
@endsection