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
                  <h4 class="card-title "> Tambah Pemilih</h4>
                </div>
                <div class="card-body">
                    <form action="/admin/pemilih" method="POST">
                      @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"> NIM</label>
                                    <input type="text" name="nim" class="form-control" id="">
                                    @if($errors->has('nim'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('nim') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"> E-mail</label>
                                    <input type="text" name="email" class="form-control" id="">
                                    @if($errors->has('email'))
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span> 
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"> Password</label>
                                    <input type="text" name="password" class="form-control" id="">
                                    @if($errors->has('password'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> 
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group bmd-form-group">
                                    <label class="bmd-label-floating"> Nama</label>
                                    <input type="text" name="nama" class="form-control" id="">
                                    @if($errors->has('nama'))
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span> 
                                @endif
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
                        <input type="submit" value="Tambah" class="btn btn-success pull-right">
                    </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      
@endsection