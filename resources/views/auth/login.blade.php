<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Artikel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #FF9A9E 0%, #FECFEF 99%, #FECFEF 100%); 
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-custom {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.95);
            transition: transform 0.3s ease;
        }

        .card-custom:hover {
            transform: translateY(-5px);
        }

        .card-header-custom {
            background: linear-gradient(90deg, #ff758c 0%, #ff7eb3 100%);
            padding: 30px;
            text-align: center;
            color: white;
            border-bottom: none;
        }

        .card-header-custom h3 {
            margin: 0;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .card-header-custom p {
            margin-top: 5px;
            margin-bottom: 0;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #e1e1e1;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #ff758c;
            background-color: #fff;
        }

        .input-group-text {
            border-radius: 10px 0 0 10px;
            border: 1px solid #e1e1e1;
            background-color: #fff;
            border-right: none;
            color: #ff758c;
        }
        
        .form-control {
            border-radius: 0 10px 10px 0;
            border-left: none;
        }

        .btn-gradient {
            background: linear-gradient(90deg, #ff758c 0%, #ff7eb3 100%);
            border: none;
            color: white;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            width: 100%;
            transition: opacity 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 117, 140, 0.4);
        }

        .btn-gradient:hover {
            opacity: 0.9;
            color: white;
        }

        .footer-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
        }

        .footer-link a {
            color: #ff758c;
            text-decoration: none;
            font-weight: 600;
        }

        .footer-link a:hover {
            text-decoration: underline;
        }

        .alert-custom {
            border-radius: 10px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="card-custom">
    <div class="card-header-custom">
        <i class="bi bi-person-circle" style="font-size: 3rem;"></i>
        <h3>Selamat Datang</h3>
        <p>Silakan login untuk melanjutkan</p>
    </div>
    
    <div class="card-body p-4">
        
        @if($errors->any())
            <div class="alert alert-danger alert-custom mb-4 fade show" role="alert">
                <i class="bi bi-exclamation-circle-fill me-2"></i> {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf
            
            <div class="mb-4">
                <label class="form-label text-muted small fw-bold ms-1">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label text-muted small fw-bold ms-1">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>
            </div>

            <button type="submit" class="btn btn-gradient mt-2 mb-3">
                MASUK
            </button>
        </form>

        <div class="footer-link">
            Belum punya akun? <a href="/register">Daftar</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
