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
                </div>
            </div>
        </div>
    </div>
    <div class="row gx-4 gx-lg-5">
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="card-title">Card One</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                </div>
                <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="card-title">Card Two</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod tenetur ex natus at dolorem enim! Nesciunt pariatur voluptatem sunt quam eaque, vel, non in id dolore voluptates quos eligendi labore.</p>
                </div>
                <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <div class="card-body">
                    <h2 class="card-title">Card Three</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem magni quas ex numquam, maxime minus quam molestias corporis quod, ea minima accusamus.</p>
                </div>
                <div class="card-footer"><a class="btn btn-primary btn-sm" href="#!">More Info</a></div>
            </div>
        </div>
    </div>
</div>
    <div class="row gx-4 gx-lg-5">
        <div class="col-md-4 mb-5">
            <a href="{{route('pinjam.index')}}" >
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
        <div class="col-md-4 mb-5">
            <a href="{{route('pinjam.create')}}">
                <button class="btn btn-primary">
                    <h1><i class="bi bi-bag-plus"></i> Pinjam barang</h1>

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
        <div class="col-md-4 mb-5">
            <a href="{{route('laporan.create')}}">
                <button class="btn btn-danger">
                    <h1><i class="bi bi-exclamation-circle"></i> Lapor kerusakan Barang</h1>

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


@endsection
