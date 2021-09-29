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
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <div class="d-flex align-items-center">
                                    <h2 class="chart-num font-w600 mb-0">{{get_total_data_kriteria()}}</h2>
                                    <svg class="ms-2 primary-icon" width="19" height="12" viewBox="0 0 19 12"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.00401 11.1924C0.222201 11.1924 -0.670134 9.0381 0.589795 7.77817L7.78218 0.585786C8.56323 -0.195262 9.82956 -0.195262 10.6106 0.585786L17.803 7.77817C19.0629 9.0381 18.1706 11.1924 16.3888 11.1924H2.00401Z"
                                            fill="#0E8A74" />
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="text-black font-w500 mb-0">Kriteria</h5>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div id="widgetChart1" class="chart-primary"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <div class="d-flex align-items-center">
                                    <h2 class="chart-num font-w600 mb-0">{{get_total_data_sub_kriteria()}}</h2>
                                    <svg class="ms-2 primary-icon" width="19" height="12" viewBox="0 0 19 12"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.00401 11.1924C0.222201 11.1924 -0.670134 9.0381 0.589795 7.77817L7.78218 0.585786C8.56323 -0.195262 9.82956 -0.195262 10.6106 0.585786L17.803 7.77817C19.0629 9.0381 18.1706 11.1924 16.3888 11.1924H2.00401Z"
                                            fill="#0E8A74" />
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="text-black font-w500 mb-0">Sub Kriteria</h5>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div id="widgetChart2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <div class="d-flex align-items-center">
                                    <h2 class="chart-num font-w600 mb-0">{{get_total_data_alternatif()}}</h2>
                                    <svg class="ms-2 primary-icon" width="19" height="12" viewBox="0 0 19 12"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.00401 11.1924C0.222201 11.1924 -0.670134 9.0381 0.589795 7.77817L7.78218 0.585786C8.56323 -0.195262 9.82956 -0.195262 10.6106 0.585786L17.803 7.77817C19.0629 9.0381 18.1706 11.1924 16.3888 11.1924H2.00401Z"
                                            fill="#0E8A74" />
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="text-black font-w500 mb-0">Data Mahasiswa</h5>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <canvas id="widgetChart3" height="60"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
