@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <h1>tes</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row gx-4 gx-lg-5">
        <div class="col-md-6 mb-5">
            <a href="" >
                <button class="btn btn-success">
                    <h1><i class="bi bi-clipboard-check card-img-top"></i> Cek Barang</h1>
                    
                    {{-- <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title font-weight-bold">Lapor kerusakan</h5>
                            <h5 class="card-title font-weight-bold">{{ $product->type->kode_tipe }}</h5>
                        </div>
                        <h2 class="card-title">Lapor kerusakan</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                    </div> --}}
                    
                </button>
            </a>
        </div>
        {{-- <div class="col-md-4 mb-5">
            <a href="">
                <button class="btn btn-primary">
                    <h1><i class="bi bi-bag-plus"></i> Pinjam barang</h1>
                </button>
            </a>
        </div> --}}
        <div class="col-md-6 mb-5">
            <a href="{{route('laporan.index')}}">
                <button class="btn btn-danger">
                    <h1><i class="bi bi-exclamation-circle"></i> Cek Lapor kerusakan Barang</h1>
                    
                    {{-- <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title font-weight-bold">Lapor kerusakan</h5>
                            <h5 class="card-title font-weight-bold">{{ $product->type->kode_tipe }}</h5>
                        </div>
                        <h2 class="card-title">Lapor kerusakan</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                    </div> --}}
                    
                </button>
            </a>
        </div>
        
    </div>
</div>
@endsection
