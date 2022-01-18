<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Kelas as Model;

class GuruKelasController extends Controller
{
    public function index()
    {
        $data ['model'] = Model::latest()->get ();
        return view ('guru.kelas_index', $data);
    }

    public function create()
    {
        
        $model ['model'] = new model ();
        $data ['method'] = 'POST';
        $data ['url'] = url('guru/kelas');
        $data ['namaTombol'] = "Simpan";
        return view('guru.kelas_form', $data);
    }

    public function store(Request $request)
    {
        $request->validate(
    [
                'nama' => 'required',
                'deskripsi' => 'nullable',
                'kode' => 'required|unique:kelas',
            ]);
            Model::create($request->all());
            flash('Data Sudah disimpan')->succes();
            return back();
    }
}
