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
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{url('/peminjaman')}}">Peminjaman</a>
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
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <h3>Tabel peminjaman</h3>
          <table class="table mt-5">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Model</th>
                <th scope="col">Merk</th>
                <th scope="col">Nomor Plat</th>
                <th scope="col">Tarif</th>
                <th scope="col">Tanggal Mulai</th>
                <th scope="col">Tanggal Selesai</th>
                <th scope="col">Biaya</th>
              </tr>
            </thead>
            <tbody>
                @foreach($peminjamans as $peminjaman)
                @php
                $tanggal_mulai = Carbon::parse($peminjaman->tanggal_mulai);
                $tanggal_selesai = Carbon::parse($peminjaman->tanggal_selesai);
                $durasi = $tanggal_selesai->diffInDays($tanggal_mulai);
                @endphp
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$peminjaman->mobil->model}}</td>
                    <td>{{$peminjaman->mobil->merk}}</td>
                    <td>{{$peminjaman->mobil->nomor_plat}}</td>
                    <td>{{$peminjaman->mobil->tarif}}</td>
                    <td>{{$peminjaman->tanggal_mulai}}</td>
                    <td>{{$peminjaman->tanggal_selesai}}</td>
                    <td>{{$durasi * $peminjaman->mobil->tarif}}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</body>
</html>