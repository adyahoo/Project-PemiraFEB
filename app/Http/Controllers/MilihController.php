<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calon;
use App\calon_prodi;
use App\pemilihan;
use App\pemilihan_prodi;
use App\pemilih;
use App\prodi;
use DB;

class MilihController extends Controller
{
    public function index(Request $request) {
        if(!$request->session()->has('pemilih')){
            return redirect('/pemilih/welcome');
        }else{
            $pemilih = $request->session()->get('pemilih');
            $calon = Calon::all();
            $calonProdi = calon_prodi::where('prodi', '=', $pemilih->prodi)->get();
            //ambil data nama prodi dari setiap calon
            dd($calonProdi);
            $namaProdi = prodi::where('id', '=', $pemilih->prodi)->get('prodi');
            $validasi = DB::table('pemilihs')->select('pemilihs.flag')->where('pemilihs.nim','=',$pemilih->nim)->get();
            //dd($validasi);
            date_default_timezone_set("Asia/Makassar");
            $pemilihan = pemilihan::where('id_pemilih','=',$pemilih->id)->get();
            $pemilihanProdi = pemilihan_prodi::where('id_pemilih','=',$pemilih->id)->get();
            $waktu_akhir = DB::table('setting_waktus')->pluck('waktu_akhir');
            $waktu_awal = DB::table('setting_waktus')->pluck('waktu_awal');
            $today = date("M d, Y H:i:s");
            $new = date("M d, Y H:i:s",strtotime($waktu_akhir[0]));
            $new_awal = date("M d, Y H:i:s",strtotime($waktu_awal[0]));
            //'Sep 30, 2020 00:00:00'
            //dd($new);
            if($today>=$new_awal && $today<=$new){
                $inRange=true;
            }else{
                $inRange=false;
                 //dd($inRange);
            }
            $new = "'".$new."'";
            
            return view('pemilih.home',compact('calon', 'calonProdi', 'pemilihan', 'pemilihanProdi', 'namaProdi','new','inRange'));
        }
    }   

    public function kandidat(Request $request,$id) {
        if(!$request->session()->has('pemilih')){
            return redirect('/pemilih/login');
        }else{
            $pemilih = $request->session()->get('pemilih');
            $pemilihan = pemilihan::where('id_pemilih','=',$pemilih->id)->get();
            $data = Calon::where('id','=',$id)->get();
            $calon = $data[0];
            return view('pemilih.kandidat',compact('calon','pemilih','pemilihan'));
        }
    }

    public function vote(Request $request) {
        $pemilih = $request->session()->get('pemilih');

        if(!$request->session()->has('pemilih')){
            return redirect('/pemilih/login');
        }else{
            $this->validate($request, [
                'id_pemilih' => 'unique:pemilihans',
                'id_pemilih' => 'unique:pemilihan_prodis',
            ]);
            $pemilihan =  new pemilihan();
            $pemilihan->id_calon = $request->item_tab_bem;
            $pemilihan->id_pemilih = $pemilih->id;
            $pemilihan->save();

            $pilihProdi = new pemilihan_prodi();
            $pilihProdi->id_prodi = $pemilih->prodi;
            $pilihProdi->id_calon = $request->item_tab_prodi;
            $pilihProdi->id_pemilih = $pemilih->id;
            $pilihProdi->save();            

            return redirect('/');
        }
    }

    public function hasil(Request $request) {
        if(!$request->session()->has('pemilih')){
            return redirect('/pemilih/login');
        }else{
            $sqlcalons = db::table('calons')->get();
            foreach($sqlcalons as $index => $sqlcalon){
                $temp = db::table('pemilihans')->select('id_calon', 'id_pemilih')->where('id_calon', $sqlcalon->id)->get();
                $count = count($temp);
                $data[$index] = $count;
                $calon[$index] = $sqlcalon->nama;
            }
            $hasil = json_encode($data);
            $calons = json_encode($calon);
            return view('pemilih.hasil_vote',compact('hasil','calons'));
        }
    }

    public function login() {
        return view('pemilih.login');
    }

}
