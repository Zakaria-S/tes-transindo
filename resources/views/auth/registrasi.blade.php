<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
    <!-- Login 12 - Bootstrap Brain Component -->
<section class="py-3 py-md-5 py-xl-8">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="mb-5">
          <h2 class="display-5 fw-bold text-center">Registrasi</h2>
          <p class="text-center m-0">Sudah memiliki akun? <a href="{{url('/login')}}">Login</a></p>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">
        <div class="row gy-5 justify-content-center">
          <div class="col-12 col-lg-5">
            <form method="POST" action="{{url('/register')}}">
              @csrf
              <div class="row gy-3 overflow-hidden">
                <div class="col-12">
                    @error('nama')
                    <div class="alert">{{ $message }}</div>
                    @enderror
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control border-0 border-bottom rounded-0" name="nama" id="nama" placeholder="Nama Lengkap" required>
                    <label for="nama" class="form-label">Nama Lengkap</label>
                  </div>
                </div>
                <div class="col-12">
                    @error('email')
                    <div class="alert">{{ $message }}</div>
                    @enderror
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control border-0 border-bottom rounded-0" name="email" id="email" placeholder="nama@example.com" required>
                      <label for="email" class="form-label">Email</label>
                    </div>
                  </div>
                  <div class="col-12">
                    @error('no_telp')
                    <div class="alert">{{ $message }}</div>
                    @enderror
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control border-0 border-bottom rounded-0" name="no_telp" id="no_telp" placeholder="08xxxxxxx" required>
                      <label for="no_telp" class="form-label">No. Telepon</label>
                    </div>
                  </div>
                  <div class="col-12">
                    @error('no_sim')
                    <div class="alert">{{ $message }}</div>
                    @enderror
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control border-0 border-bottom rounded-0" name="no_sim" id="no_sim" placeholder="123456" required>
                      <label for="no_sim" class="form-label">No. SIM</label>
                    </div>
                  </div>
                <div class="col-12">
                    @error('password')
                    <div class="alert">{{ $message }}</div>
                    @enderror
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control border-0 border-bottom rounded-0" name="password" id="password" value="" placeholder="**********" required>
                    <label for="password" class="form-label">Password</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn btn-lg btn-dark rounded-0 fs-6" type="submit">Daftar</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>