@extends('admin.kprm.app')
@section('title')
    Data Pemilih
@endsection
@section('nav-pemilih')
    active
@endsection
@section('content')
 <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose">
                    <i class="material-icons">people_alt</i>
                  <h4 class="card-title "> Edit Pemilih</h4>
                </div>
                 <div class="card-body">
                 <form action="/admin/pemilih/{{$pemilih->id}}" method="POST">
                      @csrf
                      @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <input type="text" name="id" hidden value="{{$pemilih->id}}" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"> NIM</label>
                                    <input type="text" name="nim" value="{{$pemilih->nim}}" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group bmd-form-group">
                                  <label class="bmd-label-floating"> E-mail</label>
                                  <input type="text" name="email" value="{{$pemilih->email}}" class="form-control" id="">
                              </div>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"> Nama</label>
                                    <input type="text" name="nama" value="{{$pemilih->nama}}" class="form-control" id="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                            <select name="prodi" class="custom-select">
                                <option selected>Pilih Prodi</option>
                                @foreach($prodis as $prodi)
                                <option value="{{ $prodi->id }}">{{ $prodi->prodi }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                            <select name="angkatan" class="custom-select">
                                <option selected>Pilih Angkatan</option>
                                @foreach($angkatans as $ak)
                                <option value="{{ $ak->id }}">{{ $ak->angkatan }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>
                        </div>
                        <input type="submit" value="Edit" class="btn btn-success pull-right">
                    </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
@endsection