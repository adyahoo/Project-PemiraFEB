<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\pemilih;
use App\prodi;
use File;
use App\angkatan;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('pemilih.welcome');
    }

    public function create()
    {
        $prodis=prodi::get();
        $angkatans=angkatan::get();
        return view('pemilih.register',compact('prodis','angkatans'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute Wajib Diisi!',
            'unique' => 'Kolom :attribute Tidak Boleh Sama!',
            'min' => 'Kolom :attribute wajib diisi minimal 8 karakter!',
		];
        $this->validate($request, [
            'screenshot' => 'required|file|image|mimes:jpeg,png,jpg',
            'nim' => 'required|unique:pemilihs',
            'email' => 'required|email|unique:pemilihs',
            'nama' => 'required',
            'prodi' => 'required',
            'angkatan' => 'required',
            'password' => 'required|min:8',
        ],$messages);
        $file = $request->file('screenshot');
        $nama_file = $request->nim."_".$file->getClientOriginalName();
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);

        if($request->password==$request->confirm){
            $password = Hash::make($request->password);
            $pemilih = new pemilih();
            $pemilih->nim = $request->nim;
            $pemilih->email = $request->email;
            $pemilih->nama = $request->nama;
            $pemilih->prodi = $request->prodi;
            $pemilih->angkatan = $request->angkatan;
            $pemilih->screenshot = $nama_file;
            $pemilih->password = $password;
            $pemilih->flag = 1;
            if(file_exists('data_file/'.$nama_file)){
                $pemilih->save();
                return redirect('/pemilih/welcome/')->with('success', 'Registrasi Berhasil, Silahkan Login');
            }else{
                return redirect('/pemilih/register/create')->with('error', 'Gagal Upload Screenshot!');
            }
        }else{
            return redirect('/pemilih/register/create')->with('error', 'Konfirmasi Password salah!');
        }
        return redirect('/pemilih/welcome/')->with('success', 'Registrasi Berhasil, Silahkan Login');
    }
}
