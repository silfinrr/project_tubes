<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Artikel</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-color: #ff69b4;
            --primary-dark: #e7549c;
            --bg-light: #fff0f6;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-light);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Styling */
        .navbar-custom {
            background: linear-gradient(90deg, #ff69b4 0%, #ff8cc6 100%);
            box-shadow: 0 4px 12px rgba(255, 105, 180, 0.2);
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            letter-spacing: 0.5px;
        }

        .navbar-text-user {
            color: rgba(255,255,255,0.9);
            font-size: 0.9rem;
            margin-right: 15px;
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: transform 0.2s;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-2px);
        }

        .card-header {
            background-color: white;
            border-bottom: 2px solid var(--bg-light);
            font-weight: 600;
            color: #333;
            padding: 15px 20px;
        }

        /* Button Styling */
        .btn-pink {
            background: linear-gradient(45deg, var(--primary-color), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(255, 105, 180, 0.3);
        }

        .btn-pink:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 15px rgba(255, 105, 180, 0.4);
            color: white;
        }

        .btn-outline-custom {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            border-radius: 8px;
            font-weight: 600;
        }

        .btn-outline-custom:hover {
            background-color: var(--primary-color);
            color: white;
        }

        /* Table Styling */
        .table-custom th {
            background-color: #fff;
            color: #555;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            border-bottom: 2px solid var(--bg-light);
        }

        .table-custom td {
            vertical-align: middle;
            color: #444;
        }

        /* Footer */
        footer {
            margin-top: auto;
            background-color: white;
            padding: 20px 0;
            border-top: 1px solid #eee;
            color: #777;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-custom sticky-top">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="/">
            <i class="bi bi-journal-richtext me-2"></i> Sistem Artikel
        </a>

        <div class="d-flex align-items-center">
            @auth
                <span class="navbar-text-user d-none d-md-block">
                    Halo, <strong>{{ Auth::user()->name }}</strong>
                </span>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="btn btn-light text-pink fw-bold btn-sm px-3 rounded-pill shadow-sm">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>

<div class="container my-5">
    @yield('content')
</div>

<footer class="text-center">
    <div class="container">
        <small class="fw-medium">
            &copy; 2025 Sistem Artikel Digital. Dibuat dengan <i class="bi bi-heart-fill text-danger"></i> oleh Tim Proyek.
        </small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
