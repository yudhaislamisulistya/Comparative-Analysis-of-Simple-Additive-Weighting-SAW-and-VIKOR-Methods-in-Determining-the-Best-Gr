<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Awal Manajemen Data Kriteria

    public function kriteria()
    {
        $data = DB::table('tbl_kriteria')
            ->get();
        return view('admin.kriteria', compact('data'));
    }

    public function kriteria_store(Request $request)
    {
        try {
            DB::table('tbl_kriteria')
                ->updateOrInsert(
                [
                    "code" => $request->code
                ],
                [
                    "code" => $request->code,
                    "name" => $request->name,
                    "value" => $request->value,
                ]
            );
            return redirect()->back()->with('status', 'berhasil');
        } catch (\Exception $e) {
            return redirect()->back()->with('status', 'gagal');
            return $e;
        }
    }

    public function kriteria_delete($code)
    {
        try {
            DB::table('tbl_kriteria')
                ->where('code', $code)
                ->delete();
            return redirect()->back()->with('status_hapus', 'berhasil');
        } catch (\Exception $e) {
            return redirect()->back()->with('status_hapus', 'gagal');
            return $e;
        }
    }

    // Akhir Manajemen Data Kriteria


    // Awal Manajemen Data Sub Kriteria
    public function sub_kriteria()
    {
        $data = DB::table('tbl_sub_kriteria')
            ->get();
        return view('admin.sub-kriteria', compact('data'));
    }

    public function sub_kriteria_store(Request $request)
    {
        try {
            DB::table('tbl_sub_kriteria')
                ->updateOrInsert(
                [
                    "code_marge" => $request->code . '-' . $request->code_criteria
                ],
                [
                    "code_sub_kriteria" => $request->code,
                    "code_kriteria" => $request->code_criteria,
                    "code_marge" => $request->code . '-' . $request->code_criteria,
                    "name" => $request->name,
                    "value" => $request->value,
                ]
            );
            return redirect()->back()->with('status', 'berhasil');
        } catch (\Exception $e) {
            // return redirect()->back()->with('status', 'gagal');
            return $e;
        }
    }

    public function sub_kriteria_delete($id)
    {
        try {
            DB::table('tbl_sub_kriteria')
                ->where('id_tbl_sub_kriteria', $id)
                ->delete();
            return redirect()->back()->with('status_hapus', 'berhasil');
        } catch (\Exception $e) {
            return redirect()->back()->with('status_hapus', 'gagal');
            return $e;
        }
    }
    // Akhir Manajemen Data Sub Kriteria

    // Awal Manajemen Data Alternatif

    public function alternatif()
    {
        $data = DB::table('tbl_alternatif')
            ->get();
        return view('admin.alternatif', compact('data'));
    }

    public function alternatif_store(Request $request)
    {
        try {
            DB::table('tbl_alternatif')
                ->updateOrInsert(
                [
                    "code" => $request->code
                ],
                [
                    "code" => $request->code,
                    "name" => $request->name,
                    "nim" => $request->nim,
                    "department" => $request->department,
                ]
            );
            return redirect()->back()->with('status', 'berhasil');
        } catch (\Exception $e) {
            return redirect()->back()->with('status', 'gagal');
            return $e;
        }
    }

    public function alternatif_delete($code)
    {
        try {
            DB::table('tbl_alternatif')
                ->where('code', $code)
                ->delete();
            return redirect()->back()->with('status_hapus', 'berhasil');
        } catch (\Exception $e) {
            return redirect()->back()->with('status_hapus', 'gagal');
            return $e;
        }
    }

    // Akhir Manajemen Data Alternatif

    // Awal Manajemen Data Alternatif Kriteria

    public function alternatif_kriteria_store(Request $request)
    {
        try {
            for ($i=0; $i < count(get_data_kriteria()); $i++) {
                DB::table('tbl_alternatif_kriteria')
                    ->updateOrInsert(
                    [
                        "code_marge" => $request->code_alternative . '-' . get_data_sub_kriteria_with_code_marge($request->code_marge[$i])->code_kriteria,
                    ],
                    [
                        "code_alternatif" => $request->code_alternative,
                        "code_kriteria" => get_data_sub_kriteria_with_code_marge($request->code_marge[$i])->code_kriteria,
                        "code_marge" => $request->code_alternative . '-' . get_data_sub_kriteria_with_code_marge($request->code_marge[$i])->code_kriteria,
                        "name" => get_data_sub_kriteria_with_code_marge($request->code_marge[$i])->name,
                        "value" => get_data_sub_kriteria_with_code_marge($request->code_marge[$i])->value,
                    ]
                );
            }
            return redirect()->back()->with('status_ak', 'berhasil');
        } catch (\Exception $e) {
            return redirect()->back()->with('status_ak', 'gagal');
            return $e;
        }
    }

    public function alternatif_kriteria_delete($code)
    {
        try {
            DB::table('tbl_alternatif_kriteria')
                ->where('code_alternatif', $code)
                ->delete();
            return redirect()->back()->with('status_hapus_ak', 'berhasil');
        } catch (\Exception $e) {
            return redirect()->back()->with('status_hapus_ak', 'gagal');
            return $e;
        }
    }

    // Akhir Manajemen Data Alternatif Kriteria

    // Awal Metode SAW
    public function metode_saw()
    {
        return view('admin.metode-saw');
    }

    public function metode_saw_tabel_normalisasi()
    {
        return view('admin.metode-saw-tabel-normalisasi');
    }

    public function metode_saw_tabel_perangkingan()
    {
        return view('admin.metode-saw-tabel-perangkingan');
    }
    // AKhir Metode SAW

    // Awal Metode VIKOR
    public function metode_vikor()
    {
        return view('admin.metode-vikor');
    }

    public function metode_vikor_tabel_normalisasi()
    {
        return view('admin.metode-vikor-tabel-normalisasi');
    }

    public function metode_vikor_tabel_ummiv_rangking()
    {
        return view('admin.metode-vikor-tabel-ummiv-rangking');
    }

    // AKhir Metode VIKOR

    // Awal Hasil
    public function hasil()
    {
        return view('admin.hasil');
    }
    // Akhir Hasil

}
