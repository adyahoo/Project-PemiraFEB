<?php

namespace App\Http\Controllers;

use App\pemilih;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\prodi;
use App\angkatan;

class PemilihController extends Controller
{
    public function index(Request $request)
    {   
        if(!$request->session()->has('user')){
            return redirect('/admin/login');
        }else{
            $pemilih = DB::table('pemilihs')
            ->leftjoin('angkatans', 'pemilihs.angkatan', '=', 'angkatans.id')
            ->leftjoin('prodis', 'pemilihs.prodi', '=', 'prodis.id')
            ->select('pemilihs.*', 'prodis.prodi as prodi','angkatans.angkatan as angkatan')
            ->orderBy('flag', 'asc')->paginate(15);
            return view('admin.kprm.pemilih.index',compact('pemilih'));
        }
    }

    public function create(Request $request)
    {
        if(!$request->session()->has('user')){
            return redirect('/admin/login');
        }else{
            $prodis=prodi::get();
            $angkatans=angkatan::get();
            return view('admin.kprm.pemilih.add',compact('prodis','angkatans'));
        }
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute Wajib Diisi!',
            'unique' => 'Kolom :attribute Tidak Boleh Sama!',
            'min' => 'Kolom :attribute wajib diisi minimal 8 karakter!',
		];
        $this->validate($request, [
            'nim' => 'required|unique:pemilihs',
            'email' => 'required|email|unique:pemilihs',
            'nama' => 'required',
            'prodi' => 'required',
            'password' => 'required|min:8',
        ],$messages);

        $password = Hash::make($request->password);

        $pemilih = new pemilih();
        $pemilih->nim = $request->nim;
        $pemilih->email = $request->email;
        $pemilih->nama = $request->nama;
        $pemilih->prodi = $request->prodi;
        $pemilih->angkatan = $request->angkatan;
        $pemilih->password = $password;
        $pemilih->flag = 2;    
        $pemilih->save();
        
        return redirect('admin/pemilih/');
    }

    public function edit(Request $request, pemilih $pemilih)
    {
        if(!$request->session()->has('user')){
            return redirect('/admin/login');
        }else{
            $prodis=prodi::get();
            $angkatans=angkatan::get();
            return view('admin.kprm.pemilih.edit',compact('pemilih','prodis','angkatans'));
        }
    }

    public function update(Request $request, pemilih $pemilih)
    {   
        $pemilih->id = $request->id;
        $pemilih->nim = $request->nim;
        $pemilih->email = $request->email;
        $pemilih->nama = $request->nama;
        $pemilih->prodi = $request->prodi;  
        $pemilih->angkatan = $request->angkatan;  
        $pemilih->save();
        
        return redirect('admin/pemilih/');
    }

    public function verify($id, pemilih $pemilih)
    {   
        $pemilih = pemilih::find($id);
        if(isset($pemilih)){
            $pemilih->update([
                'flag' => 2
            ]);
        }
        return redirect('admin/pemilih/');
    }

    public function destroy(pemilih $pemilih)
    {
        $pemilih->delete();
        return redirect('admin/pemilih/');
    }
}
