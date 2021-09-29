<?php

use Illuminate\Support\Facades\DB;

function get_data_alternatif()
{
    $data = DB::table('tbl_alternatif')
        ->get();
    return $data;
}

function get_data_kriteria()
{
    $data = DB::table('tbl_kriteria')
        ->get();
    return $data;
}

function get_data_alternatif_with_code($code)
{
    $data = DB::table('tbl_alternatif')
        ->where('code', $code)
        ->first();
    return $data;
}

function get_data_alternatif_kriteria_with_code_marge($code_marge)
{
    $data = DB::table('tbl_alternatif_kriteria')
        ->where('code_marge', $code_marge)
        ->first();
    return $data;
}

function get_total_normalisasi_alternatif_kriteria($code_kriteria)
{
    $data = DB::table('tbl_alternatif_kriteria')
        ->where('code_kriteria', $code_kriteria)
        ->get();
    $totalNormalisasiSatu = 0;
    foreach ($data as $key => $value) {
        $totalNormalisasiSatu = $totalNormalisasiSatu + pow(get_data_alternatif_kriteria_with_code_marge($value->code_alternatif . '-' . $code_kriteria)->value, 2);
    }
    return $totalNormalisasiSatu;

}

function get_maksimum_normalisasi_alternatif_kriteria($code_kriteria)
{
    $data = DB::table('tbl_alternatif_kriteria')
        ->where('code_kriteria', $code_kriteria)
        ->get();
    $maksimumNormalisasi = array();
    $result = 0;
    foreach ($data as $key => $value) {
        $result = round(get_data_alternatif_kriteria_with_code_marge($value->code_alternatif . '-' . $code_kriteria)->value / (sqrt(get_total_normalisasi_alternatif_kriteria($code_kriteria))), 2);
        array_push($maksimumNormalisasi, $result);
    }
    return max($maksimumNormalisasi);
}

function get_minimum_normalisasi_alternatif_kriteria($code_kriteria)
{
    $data = DB::table('tbl_alternatif_kriteria')
        ->where('code_kriteria', $code_kriteria)
        ->get();
    $minimumNormalisasi = array();
    $result = 0;
    foreach ($data as $key => $value) {
        $result = round(get_data_alternatif_kriteria_with_code_marge($value->code_alternatif . '-' . $code_kriteria)->value / (sqrt(get_total_normalisasi_alternatif_kriteria($code_kriteria))), 2);
        array_push($minimumNormalisasi, $result);
    }
    return min($minimumNormalisasi);
}

function get_alternatif_kriteria_with_code_kriteria($code_kriteria)
{
    $data = DB::table('tbl_alternatif_kriteria')
        ->where('code_kriteria', $code_kriteria)
        ->max('value');
    return $data;

}

function get_data_alternatif_kriteria_with_group()
{
    $data = DB::table('tbl_alternatif_kriteria')
        ->select('code_alternatif')
        ->groupBy('code_alternatif')
        ->get();
    return $data;
}

function get_data_kriteria_with_code($code)
{
    $data = DB::table('tbl_kriteria')
        ->where('code', $code)
        ->first();
    return $data;
}

function get_data_sub_kriteria_with_code_kriteria($code_kriteria)
{
    $data = DB::table('tbl_sub_kriteria')
        ->where('code_kriteria', $code_kriteria)
        ->get();
    return $data;
}

function get_data_sub_kriteria_with_code_marge($code_marge)
{
    $data = DB::table('tbl_sub_kriteria')
        ->where('code_marge', $code_marge)
        ->first();
    return $data;
}

function get_total_data_kriteria()
{
    $data = DB::table('tbl_kriteria')
        ->count();
    return $data;
}

function get_total_data_sub_kriteria()
{
    $data = DB::table('tbl_sub_kriteria')
        ->count();
    return $data;
}

function get_total_data_alternatif()
{
    $data = DB::table('tbl_alternatif')
        ->count();
    return $data;
}

?>
