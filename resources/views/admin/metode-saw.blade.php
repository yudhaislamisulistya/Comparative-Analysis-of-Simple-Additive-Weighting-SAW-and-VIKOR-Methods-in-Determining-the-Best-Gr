@extends('admin.layouts.master')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="form-head mb-4 d-flex flex-wrap align-items-center">
                <div class="me-auto">
                    <h2 class="font-w600 mb-0">Dashboard</h2>
                    <p class="text-light">Analisis Perbandingan Metode Simple Additive Weighting (SAW) dan VIKOR pada
                        Penetapan Wisudawan Terbaik </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Metode SAW</h4>
                        </div>
                        <div class="card-body p-3">
                            <a href="{{route('getAlternatif')}}" class="btn btn-primary btn-block mt-3">Tabel Data Mahasiswa</a>
                            <a href="{{route('getMetodeSawTabelNormalisasi')}}" class="btn btn-primary btn-block mt-3">Tabel Normalisasi</a>
                            <a href="{{route('getMetodeSawTabelPerangkingan')}}" class="btn btn-primary btn-block mt-3">Tabel Perangkingan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

