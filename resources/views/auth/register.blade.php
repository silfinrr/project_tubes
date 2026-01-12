<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fff7fb; }
        .card-header {
            background-color: #ff69b4;
            color: white;
            font-weight: bold;
        }
        .btn-pink {
            background-color: #ff69b4;
            color: white;
            border: none;
        }
        .btn-pink:hover { background-color: #b20257ff; }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    Daftar Akun Baru
                </div>
                <div class="card-body">
                    <form method="POST" action="/register">
                        @csrf
                        
                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                             @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-pink w-100 mb-2">
                            Daftar Sekarang
                        </button>
                        
                        <div class="text-center">
                            <small>Sudah punya akun? <a href="/login">Login disini</a></small>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
