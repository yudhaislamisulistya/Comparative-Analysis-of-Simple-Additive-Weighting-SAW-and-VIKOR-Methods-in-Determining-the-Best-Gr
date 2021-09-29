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
                        <h4 class="card-title">Tabel Data Alternatif</h4>
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
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Jurusan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$value->code}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->nim}}</td>
                                            <td>{{$value->department}}</td>
                                            <td>
                                                <a id="editAlternatif" data-code="{{$value->code}}"  data-name="{{$value->name}}" data-nim="{{$value->nim}}" data-department="{{$value->department}}" class="btn btn-sm btn-info">Edit</a>
                                                <a href="<?= url('') ?>/admin/alternatif/ <?= $value->code ?>" class="btn btn-sm btn-danger">Hapus</a>
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
                        <h4 class="card-title">Data Alternatif</h4>
                    </div>
                    <div class="card-body">
                        @if (Session::has('status'))
                            @if (Session::get('status') == "berhasil")
                                <div class="alert alert-success alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                    <strong>Success!</strong> Data Berhasil Ditambahkan
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @else
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                    <strong>Error!</strong> Data Gagal Ditambahkan.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @endif
                        @endif
                        <div class="basic-form">
                            <form action="{{route('postAlternatif')}}" method="POST">
                            @csrf
                                <div class="mb-3">
                                    <input type="text" id="code" name="code" class="form-control input-default " placeholder="Kode Alternatif">
                                </div>
                                <div class="mb-3">
                                    <input type="text" id="name" name="name" class="form-control input-default " placeholder="Nama Mahasiswa">
                                </div>
                                <div class="mb-3">
                                    <input type="text" id="nim" name="nim" class="form-control input-rounded" placeholder="NIM">
                                </div>
                                <div class="mb-3">
                                    <input type="text" id="department" name="department" class="form-control input-rounded" placeholder="Jurusan">
                                </div>
                                <button class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Data Pelengkap Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        @if (Session::has('status_hapus_ak'))
                            @if (Session::get('status_hapus_ak') == "berhasil")
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
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Jurusan</th>
                                        @foreach (get_data_kriteria() as $key => $value)
                                        <th>{{$value->name}}</th>
                                        @endforeach
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (get_data_alternatif_kriteria_with_group() as $key => $value)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{get_data_alternatif_with_code($value->code_alternatif)->name}}</td>
                                        <td>{{get_data_alternatif_with_code($value->code_alternatif)->nim}}</td>
                                        <td>{{get_data_alternatif_with_code($value->code_alternatif)->department}}</td>
                                        @foreach (get_data_kriteria() as $keyTwo => $valueTwo)
                                            <th>{{get_data_alternatif_kriteria_with_code_marge($value->code_alternatif . '-' . $valueTwo->code)->name}} / {{get_data_alternatif_kriteria_with_code_marge($value->code_alternatif . '-' . $valueTwo->code)->value}}</th>
                                        @endforeach
                                        <td>
                                            <a href="<?= url('') ?>/admin/alternatif-kriteria/ <?= $value->code_alternatif ?>" class="btn btn-sm btn-danger">Hapus</a>
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
                        <h4 class="card-title">Data Pelengkap Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        @if (Session::has('status_ak'))
                            @if (Session::get('status_ak') == "berhasil")
                                <div class="alert alert-success alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                    <strong>Success!</strong> Data Berhasil Ditambahkan
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @else
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                    <strong>Error!</strong> Data Gagal Ditambahkan.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                                </div>
                            @endif
                        @endif
                        <div class="basic-form">
                            <form action="{{route('postAlternatifKriteria')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <select name="code_alternative" id="code_alternative" class="form-control input-rounded">
                                        @foreach (get_data_alternatif() as $key => $value)
                                            <option value="{{$value->code}}">{{$value->name}} - {{$value->nim}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @foreach (get_data_kriteria() as $key => $value)
                                <div class="mb-3">
                                    <select name="code_marge[{{$key++}}]" class="form-control input-rounded">
                                        <option value="">Pilih {{$value->name}}</option>
                                        @foreach (get_data_sub_kriteria_with_code_kriteria($value->code) as $keyTwo => $valuTwo)
                                        <option value="{{$valuTwo->code_marge}}">{{$valuTwo->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endforeach
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
        var code = table.row(this).data()[1];
        var name = table.row(this).data()[2];
        var nim = table.row(this).data()[3];
        var department = table.row(this).data()[4];
        $('#code').val(code);
        $('#name').val(name);
        $('#nim').val(nim);
        $('#department').val(department);
    } );
</script>
@endsection
