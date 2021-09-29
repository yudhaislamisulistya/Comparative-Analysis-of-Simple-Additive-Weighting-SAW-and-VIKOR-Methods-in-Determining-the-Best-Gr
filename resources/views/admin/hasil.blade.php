@extends('admin.layouts.master')

@section('content')

@php
    $SiNew = array();
    $RiNew = array();
    @endphp
    @foreach (get_data_alternatif_kriteria_with_group() as $key => $value)
        @php
            $Si = array();
            $Ri = array();
        @endphp
        @foreach (get_data_kriteria() as $keyTwo => $valueTwo)
            @php
                $hasil =($valueTwo->value*(get_maksimum_normalisasi_alternatif_kriteria($valueTwo->code) - round(get_data_alternatif_kriteria_with_code_marge($value->code_alternatif . '-' . $valueTwo->code)->value / (sqrt(get_total_normalisasi_alternatif_kriteria($valueTwo->code))), 2)) / (get_maksimum_normalisasi_alternatif_kriteria($valueTwo->code) - get_minimum_normalisasi_alternatif_kriteria($valueTwo->code)));
                array_push($Si, $hasil);
                array_push($Ri, $hasil);
            @endphp
        @endforeach
    @php
        array_push($SiNew, array_sum($Si));
    @endphp
    @php
        array_push($RiNew, max($Ri));
    @endphp
    </tr>
@endforeach

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
                        <h4 class="card-title">Hasil</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Tabel Metode SAW</h4>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="table-responsive">
                                            <table id="example998" class="display" style="min-width: 845px">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Hasil Akhir</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $hasilAkhirSaw = array();
                                                    @endphp
                                                    @foreach (get_data_alternatif_kriteria_with_group() as $key => $value)
                                                    <tr>
                                                        <td>{{get_data_alternatif_with_code($value->code_alternatif)->name}}/{{get_data_alternatif_with_code($value->code_alternatif)->code}}</td>
                                                        @php
                                                            $hasilAkhir = array();
                                                        @endphp
                                                        @foreach (get_data_kriteria() as $keyTwo => $valueTwo)
                                                            @php
                                                                array_push($hasilAkhir, ($valueTwo->value * get_data_alternatif_kriteria_with_code_marge($value->code_alternatif . '-' . $valueTwo->code)->value / get_alternatif_kriteria_with_code_kriteria($valueTwo->code)));
                                                            @endphp
                                                        @endforeach
                                                        <td>{{array_sum($hasilAkhir)}}</td>
                                                        @php
                                                            array_push($hasilAkhirSaw, array_sum($hasilAkhir));
                                                        @endphp
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Tabel Metode VIKOR</h4>
                                    </div>
                                    <div class="card-body p-3">
                                        <div class="table-responsive">
                                            <table id="example999" class="display" style="min-width: 845px">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Qi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $i = 0;
                                                        $hasilAkhirVikor = array();
                                                    @endphp
                                                    @foreach (get_data_alternatif_kriteria_with_group() as $key => $value)
                                                    <tr>
                                                        <td>{{get_data_alternatif_with_code($value->code_alternatif)->name}}/{{get_data_alternatif_with_code($value->code_alternatif)->code}}</td>
                                                        @php
                                                            $hasilVikor = (0.5*($SiNew[$i]-min($SiNew))/(max($SiNew)-min($SiNew)))+(0.5*($RiNew[$i]-min($RiNew)) / (max($RiNew)-min($RiNew)));

                                                            @endphp
                                                        <td><?= $hasilVikor ?></td>
                                                        @php
                                                            array_push($hasilAkhirVikor, $hasilVikor);
                                                        @endphp
                                                    </tr>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Grafik Perbandingan Metode</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="flotBar2" class="flot-chart">
                                            </div>
                                    </div>
                                    <small>Hijau : VIKOR ({{(array_sum($hasilAkhirVikor) / (array_sum($hasilAkhirVikor) + array_sum($hasilAkhirSaw)) * 100)}}%)</small>
                                    <small>Merah : SAW ({{(array_sum($hasilAkhirSaw) / (array_sum($hasilAkhirVikor) + array_sum($hasilAkhirSaw)) * 100)}}%)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    $(document).ready(function() {
        $('#example999').DataTable( {
            "processing": true,
            "order": [[ 1, "asc" ]],
        });
    } );
    $(document).ready(function() {
        $('#example998').DataTable( {
            "processing": true,
            "order": [[ 1, "desc" ]],
        });
    } );
</script>
@endsection
