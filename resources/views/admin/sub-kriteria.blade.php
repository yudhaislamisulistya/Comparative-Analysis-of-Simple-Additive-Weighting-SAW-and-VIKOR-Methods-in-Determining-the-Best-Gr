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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Data Sub Kriteria</h4>
                    </div>
                    <div class="card-body">
                        @if (Session::has('status_hapus'))
                            @if (Session::get('status_hapus') == "berhasil")
                                <div class="alert alert-success alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                    <strong>Success!</strong> Data Berhasil Dihapus
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @else
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                    <strong>Error!</strong> Data Gagal Dihapus.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @endif
                        @endif
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kritria</th>
                                        <th>Sub Kriteria</th>
                                        <th>Bobot Kriteria</th>
                                        <th>Nilai Sub Kriteria</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{get_data_kriteria_with_code($value->code_kriteria)->name}}/{{$value->code_kriteria}}</td>
                                            <td>{{$value->name}}/{{$value->code_sub_kriteria}}</td>
                                            <td>{{get_data_kriteria_with_code($value->code_kriteria)->value}}</td>
                                            <td>{{$value->value}}</td>
                                            <td>
                                                <a id="editSubKriteria" data-code-criteria="{{$value->code_kriteria}}" data-code="{{$value->code_sub_kriteria}}"  data-name="{{$value->name}}" data-value="{{$value->value}}" class="btn btn-sm btn-info">Edit</a>
                                                <a href="{{route('deleteSubKriteria', ["id" => $value->id_tbl_sub_kriteria])}}" class="btn btn-sm btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Sub Kriteria</h4>
                    </div>
                    <div class="card-body">
                        @if (Session::has('status'))
                            @if (Session::get('status') == "berhasil")
                                <div style="margin-left: 50px; margin-right: 50px; margin-top: 50px" class="alert alert-success alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                    <strong>Success!</strong> Data Berhasil Ditambahkan
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @else
                                <div style="margin-left: 50px; margin-right: 50px; margin-top: 50px" class="alert alert-danger alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                    <strong>Error!</strong> Data Gagal Ditambahkan.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @endif
                        @endif
                        <div class="basic-form">
                            <form action="{{route('postSubKriteria')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <select name="code_criteria" id="code_criteria" class="form-control input-rounded">
                                        @foreach (get_data_kriteria() as $key => $value)
                                            <option value="{{$value->code}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="text" id="code" name="code" class="form-control input-rounded" placeholder="Kode Sub Kriteria">
                                </div>
                                <div class="mb-3">
                                    <input type="text" id="name" name="name" class="form-control input-rounded" placeholder="Nama Sub Kriteria">
                                </div>
                                <div class="mb-3">
                                    <input type="text" id="value" name="value" class="form-control input-rounded" placeholder="Nilai Sub Kriteria">
                                </div>
                                <button class="btn btn-primary">Submit</button>
                            </form>
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

    var table = $('#example').DataTable();

    $('#example tbody').on( 'click', 'tr', function () {
        var kriteria = table.row(this).data()[1];
        var sub_kriteria = table.row(this).data()[2];
        var value = table.row(this).data()[4];

        var kriteria = kriteria.split('/');
        var sub_kriteria = sub_kriteria.split('/');
        var kode_kriteria = kriteria[1];
        var kode_sub_kriteria = sub_kriteria[1];
        var nama_sub_kriteria = sub_kriteria[0];
        $('#code_criteria').val(kode_kriteria);
        $('#code').val(kode_sub_kriteria);
        $('#name').val(htmlDecode(nama_sub_kriteria));
        $('#value').val(value);
    } );

    function htmlDecode(input){
        var e = document.createElement('div');
        e.innerHTML = input;
        return e.childNodes.length === 0 ? "" : e.childNodes[0].nodeValue;
    }

</script>
@endsection
