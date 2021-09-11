<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    KPRM 2021
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href={{asset('pemilih/assets/css/material-kit.css?v=2.0.6')}} rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href={{asset('pemilih/assets/demo/demo.css')}} rel="stylesheet" /> -->
  
  <link href="{{asset('pemilih/assets/css/style.css')}}" rel="stylesheet"/>
  
  
</head>

<body class="landing-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="/">
          KPRM 2021 </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/logout/pemilih">
                <i class="material-icons">exit_to_app</i> Keluar
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page-header header-filter" data-parallax="true" style="background-image: url({{asset('pemilih/assets/img/profile_city.jpg')}})">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="title text-center" id="demo">Batas Akhir Pemilihan Gubernur dan Wakil Gubernur BEM FEB UNUD 2021</h1>
            <div class="row">
              <div class="col-md-2">
                
              </div>
              <div style="margin: auto;" class="col-md-9 align-content-center">
                <ul class="list">
                  <li><span id="days"></span><p>Hari</p></li>
                  <li><span id="hours"></span><p>Jam</p></li>
                  <li><span id="minutes"></span><p>Menit</p></li>
                  <li><span id="seconds"></span><p>Detik</p></li>
                </ul>
              </div>
            </div>
            <br>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="container">
      <div class="section text-center p-2">                  
        @if($pemilihan->isEmpty() && $pemilihanProdi->isEmpty())
        <form id="pilihForm" action="{{route('voting')}}" method="POST">
          @csrf
          <div class="tab">
            <h2 class="title">Kandidat <br> Gubernur dan Wakil Gubernur BEM FEB UNUD 2021</h2>
            <h5 class="description">Silahkan lihat dan pilihlah kandidat Gubernur dan Wakil Gubernur BEM FEB UNUD 2021 sesuai hatimu.</h5>
            <div class="team">
              <div class="row justify-content-center">
                @if ($calon->isEmpty())
                <div class="col-md-12">
                  <div class="alert alert-danger">
                    <div>Data kosong</div>
                  </div>
                </div>
                @elseif(!$pemilihan->isEmpty())
                <div class="col-md-12">
                  <h2>
                    Anda sudah melakukan Voting
                  </h2>
                </div> 
                @elseif($inRange == false)
                <div class="col-md-12">
                  <h2>
                    Waktu belum melakukan Voting
                  </h2>
                </div>            
                @else
                @foreach ($calon as $i)
                <div class="col-md-4">
                  <label>
                    <input type="radio" name="item_tab_bem" value="{{$i->id}}" class="card-input"/>
                    <div class="card card-plain">
                      <div class="card__image ml-auto mr-auto">
                        <img src={{asset('data_file/'.$i->foto)}} alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                      </div>
                      <h4 class="card-title">{{$i->nama}}
                        <br>
                        <small class="card-description text-muted">Prodi {{$i->prodi}}</small>
                      </h4>
                      <div class="card-body">
                        <p class="card-description"> {!! $i->deskripsi !!} 
                        </p>
                      </div>
                      <div class="card-footer justify-content-center">
                        <button type="button" class="btn btn-danger btn-round" onclick="location.href='/kandidat/{{$i->id}}'">
                          <i class="material-icons">person</i> Lihat kandidat
                        </button> 
                      </div>
                    </div>
                  </label>
                </div>
                @endforeach
                @endif    
              </div>
            </div>
          </div>
          <div class="tab">
            @foreach ($namaProdi as $i)
            <h2 class="title">Kandidat <br> Ketua Himpunan Mahasiswa {{$i->prodi}} UNUD 2021</h2>
            <h5 class="description">Silahkan lihat dan pilihlah kandidat Ketua Himpunan Mahasiswa {{$i->prodi}} UNUD 2021 sesuai hatimu.</h5>
            @endforeach
            <div class="team">
              <div class="row justify-content-center">
                @if ($calonProdi->isEmpty())
                <div class="col-md-12">
                  <div class="alert alert-danger">
                    <div>Data kosong</div>
                  </div>
                </div>
                @elseif(!$pemilihanProdi->isEmpty())
                <div class="col-md-12">
                  <h2>
                    Anda sudah melakukan Voting
                  </h2>
                </div> 
                @elseif($inRange == false)
                <div class="col-md-12">
                  <h2>
                    Waktu belum melakukan Voting
                  </h2>
                </div>            
                @else
                @foreach ($calonProdi as $i)
                <div class="col-md-4">
                  <label>
                    <input type="radio" name="item_tab_prodi" value="{{$i->id}}" class="card-input">
                    <div class="card card-plain">
                      <div class="card__image ml-auto mr-auto">
                        <img src={{asset('data_file/'.$i->foto)}} alt="Thumbnail Image" class="img-raised rounded-circle img-fluid">
                      </div>
                      <h4 class="card-title">{{$i->nama}}
                        <br>
                        <small class="card-description text-muted">Prodi {{$i->prodi}}</small>
                      </h4>
                      <div class="card-body">
                        <p class="card-description"> {!! $i->deskripsi !!} 
                        </p>
                      </div>
                      <div class="card-footer justify-content-center">
                        <button class="btn btn-danger btn-round" onclick="location.href='/kandidat/{{$i->id}}'">
                          <i class="material-icons">person</i> Lihat kandidat
                        </button> 
                      </div>
                    </div>
                  </label>
                </div>
                @endforeach
                @endif    
              </div>
            </div>
          </div>
          <div style="overflow:auto;">
            <div style="float:right;">
              <button class="btn" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
              <button class="btn btn-success" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
          </div>
          <!-- Circles which indicates the steps of the form: -->
          <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
          </div>
        </form>                                
        @else
        <div class="row">
          <div class="col-md-12 ml-auto mr-auto">
            <div class="alert alert-success" role="alert">
              <h3 class="alert-heading"><strong>Anda Telah Memilih!</strong></h3>
              <h4>Terima kasih telah menggunakan hak suara anda dalam Pemilihan Gubernur dan Wakil Gubernur BEM FISIP UNUD 2020</h4>
              <hr>
            </div>  
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
  <footer class="footer footer-default">
    <div class="container">
      <div class="copyright float-center">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>
      </div>
    </div>
  </footer>
  
  <script src="{{asset('pemilih/assets/js/style.js')}}" type="text/javascript"></script>
  
  <!--   Core JS Files   -->
  <script src={{asset('pemilih/assets/js/core/jquery.min.js')}} type="text/javascript"></script>
  <script src={{asset('pemilih/assets/js/core/popper.min.js')}} type="text/javascript"></script>
  <script src={{asset('pemilih/assets/js/core/bootstrap-material-design.min.js')}} type="text/javascript"></script>
  <script src={{asset('pemilih/assets/js/plugins/moment.min.js')}}></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src={{asset('pemilih/assets/js/plugins/bootstrap-datetimepicker.js')}} type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src={{asset('pemilih/assets/js/plugins/nouislider.min.js')}} type="text/javascript"></script>
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src={{asset('pemilih/assets/js/material-kit.js?v=2.0.6')}} type="text/javascript"></script>
  
  <script> 
    const second = 1000,
    minute = second * 60,
    hour = minute * 60,
    day = hour * 24;
    
    let countDown = new Date({!! $new !!}).getTime(),
    x = setInterval(function() {
      
      let now = new Date().getTime(),
      distance = countDown - now;
      
      document.getElementById('days').innerText = Math.floor(distance / (day)),
      document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
      document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
      document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
      
      //do something later when date is reached
      if (distance < 0) {
        clearInterval(x);
        document.getElementById('days').innerText = 0;
        document.getElementById('hours').innerText = 0;
        document.getElementById('minutes').innerText = 0;
        document.getElementById('seconds').innerText = 0;
        document.getElementById("demo").innerHTML = "SUDAH SELESAI"; 
      }
      
    }, second)
    
  </script> 
</body>

</html>
