<?php

namespace App\Http\Controllers;

use App\Calon;
use File;
use Illuminate\Http\Request;

class CalonController extends Controller
{
    public function index()
    {
        $calon = Calon::all();
        return view('admin.kprm.calon.index',compact('calon'));
    }

    public function create()
    {
        return view ('admin.kprm.calon.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'deskripsi' => 'required',
            'visi' => 'required',
            'misi' => 'required',
			'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        //simpan file
        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        
        //isi dengan nama folder
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);
        
        $calon = new Calon();
        $calon->nim = $request->nim;
        $calon->nama = $request->nama;
        $calon->angkatan = $request->angkatan;
        $calon->prodi = $request->prodi;
        $calon->deskripsi = $request->deskripsi;
        $calon->visi = $request->visi;
        $calon->misi = $request->misi;
        $calon->foto = $nama_file;

        if(file_exists('data_file/'.$nama_file)){
            $calon->save();
            return redirect('admin/calon');
        } else{
            return redirect('admin/calon/create')->with('alert','gambar gagal upload');
        } 
    }

    public function edit(Calon $calon)
    {
        $file = $calon->foto;
        return view('admin.kprm.calon.edit',compact('calon','file'));
    }

    public function update(Request $request, Calon $calon)
    {  
        $nama_file = null;
        $this->validate($request, [
            'nim' => 'required',
            'nama' => 'required',
            'prodi' => 'required',
            'deskripsi' => 'required',
            'visi' => 'required',
            'misi' => 'required'
        ]);
        if($request->file('foto')){
               //simpan file
            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            $calon->foto = $nama_file;
            
        }
        $calon->id = $request->id;
        $calon->nim = $request->nim;
        $calon->nama = $request->nama;
        $calon->angkatan = $request->angkatan;
        $calon->prodi = $request->prodi;
        $calon->deskripsi = $request->deskripsi;
        $calon->visi = $request->visi;
        $calon->misi = $request->misi;
        if($calon->save()){
            if(is_null($nama_file)){
                return redirect('admin/calon');
            }
            //isi dengan nama folder
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload,$nama_file); 
            if(file_exists('data_file/'.$nama_file)){
                return redirect('admin/calon');
            } else{
                return redirect('admin/calon/create')->with('alert','gambar gagal upload');
            } 
        }else{
            return redirect('admin/calon/create')->with('alert','gagal nambah data');
        }
    }

    public function destroy(Calon $calon)
    {
        File::delete('data_file/'.$calon->foto);
        $calon->delete();
        return redirect('admin/calon');
    }
}
