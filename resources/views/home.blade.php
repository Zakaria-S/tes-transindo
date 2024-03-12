<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    @php
    use Carbon\Carbon;
    @endphp
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <!-- Container wrapper -->
        <div class="container-fluid">
          <!-- Toggle button -->
          <button
            data-mdb-collapse-init
            class="navbar-toggler"
            type="button"
            data-mdb-target="#navbarRightAlignExample"
            aria-controls="navbarRightAlignExample"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-bars"></i>
          </button>
      
          <!-- Collapsible wrapper -->
          <div class="collapse navbar-collapse" id="navbarRightAlignExample">
            <!-- Left links -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{url('/')}}">Home</a>
                </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{url('/peminjaman')}}">Peminjaman</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pengembalian</a>
              </li>
              <li class="nav-item">
                <form method="POST" action="/logout">
                    @csrf
                    <button class="btn" type="submit">Logout</button>
                </form>
              </li>
            </ul>
            <!-- Left links -->
          </div>
          <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>

    <div class="container my-5">
        <div class="mb-4">
            <h4>Temukan mobil untuk dirental</h4>
        </div>
        <div class="d-flex align-items-center justify-content-right">
            <input type="text" class="form-control mr-2" name="merk" id="merk" placeholder="Merk">
            <input type="text" class="form-control mr-2" name="model" id="model" placeholder="Model">
            <input type="checkbox" id="tersedia" name="tersedia">
            <label for="tersedia">Tersedia</label>
        </div>
        <div class="row">
            @foreach($mobils as $mobil)
            @php
            $tersedia = $mobil->ketersediaan === 'Tersedia';
            $status_color = $tersedia ? 'text-success' : 'text-danger';
            $status = '';
            if (!$tersedia) {
                $peminjaman = $mobil->peminjaman()->latest()->first();
                $tanggal_selesai = Carbon::parse($peminjaman->tanggal_selesai);
                $status = "Dirental sampai tanggal " . $tanggal_selesai->isoFormat('D MMMM Y');
            } else {
                $status = "Tersedia";
            }
            @endphp
            <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
                <div class="card w-100 my-2 shadow-2-strong">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">
                            {{$mobil->model}}
                        </h5>
                        <h6>{{$mobil->merk}}</h6>
                        <p class="card-text">{{$mobil->nomor_plat}}</p>
                        <p class="card-text" id="price"><b>Tarif: </b>Rp{{number_format($mobil->tarif, 2, ",", ".")}}</p>
                        <p class="card-text"><b>Status: </b><span class="{{$status_color}}">{{ $status }}</span></p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center justify-content-center pt-1 px-0 pb-0 mt-auto w-100">
                            <a href="{{url('/' . $mobil->id . '/pinjam')}}" class="btn btn-primary w-100 shadow-0 mb-1">Pinjam</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>