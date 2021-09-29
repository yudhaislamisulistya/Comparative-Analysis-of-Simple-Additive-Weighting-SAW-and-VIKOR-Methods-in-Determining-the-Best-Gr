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
                            <h4 class="card-title">Tabel Utility Measure dan Menghitung Index VIKOR</h4>
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
                                            <th>Si</th>
                                            <th>Ri</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $SiNew = array();
                                            $RiNew = array();
                                        @endphp
                                        @foreach (get_data_alternatif_kriteria_with_group() as $key => $value)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{get_data_alternatif_with_code($value->code_alternatif)->name}}/{{get_data_alternatif_with_code($value->code_alternatif)->code}}</td>
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
                                                <td>{{$hasil}}</td>

                                            @endforeach
                                            <th>{{array_sum($Si)}}</th>
                                            @php
                                                array_push($SiNew, array_sum($Si));
                                            @endphp
                                            <th>{{max($Ri)}}</th>
                                            @php
                                                array_push($RiNew, max($Ri));
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
                            <h4 class="card-title">Tabel Perangkingan (Qi)</h4>
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
                                        @endphp
                                        @foreach (get_data_alternatif_kriteria_with_group() as $key => $value)
                                        <tr>
                                            <td>{{get_data_alternatif_with_code($value->code_alternatif)->name}}/{{get_data_alternatif_with_code($value->code_alternatif)->code}}</td>
                                            <td><?= (0.5*($SiNew[$i]-min($SiNew))/(max($SiNew)-min($SiNew)))+(0.5*($RiNew[$i]-min($RiNew)) / (max($RiNew)-min($RiNew))) ?></td>
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
</script>
@endsection
