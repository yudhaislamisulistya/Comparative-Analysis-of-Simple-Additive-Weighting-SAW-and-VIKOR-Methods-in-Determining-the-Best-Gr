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
                            <h4 class="card-title">Tabel Normalisasi 1</h4>
                        </div>
                        <div class="card-body p-3">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            @foreach (get_data_kriteria() as $key => $value)
                                            <th>{{$value->code}}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (get_data_alternatif_kriteria_with_group() as $key => $value)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{get_data_alternatif_with_code($value->code_alternatif)->name}}/{{get_data_alternatif_with_code($value->code_alternatif)->code}}</td>
                                            @foreach (get_data_kriteria() as $keyTwo => $valueTwo)
                                                <td>{{pow(get_data_alternatif_kriteria_with_code_marge($value->code_alternatif . '-' . $valueTwo->code)->value, 2)}}</td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>{{++$key}}#</td>
                                            <td>Total</td>
                                            @foreach (get_data_kriteria() as $keyTwo => $valueTwo)
                                                <th>{{get_total_normalisasi_alternatif_kriteria($valueTwo->code)}}</th>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabel Normalisasi 2</h4>
                        </div>
                        <div class="card-body p-3">
                            <div class="table-responsive">
                                <table id="example2" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            @foreach (get_data_kriteria() as $key => $value)
                                            <th>{{$value->code}}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (get_data_alternatif_kriteria_with_group() as $key => $value)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{get_data_alternatif_with_code($value->code_alternatif)->name}}/{{get_data_alternatif_with_code($value->code_alternatif)->code}}</td>
                                            @foreach (get_data_kriteria() as $keyTwo => $valueTwo)
                                                <td>{{round(get_data_alternatif_kriteria_with_code_marge($value->code_alternatif . '-' . $valueTwo->code)->value / (sqrt(get_total_normalisasi_alternatif_kriteria($valueTwo->code))), 2)}}</td>
                                            @endforeach
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td>{{++$key}}#</td>
                                            <td>Maksimum</td>
                                            @foreach (get_data_kriteria() as $keyTwo => $valueTwo)
                                                <th>{{get_maksimum_normalisasi_alternatif_kriteria($valueTwo->code)}}</th>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td>{{++$key}}#</td>
                                            <td>Minimum</td>
                                            @foreach (get_data_kriteria() as $keyTwo => $valueTwo)
                                                <th>{{get_minimum_normalisasi_alternatif_kriteria($valueTwo->code)}}</th>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

