<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fff7fb;
        }
        .navbar-custom {
            background-color: #ff69b4;
        }
        .navbar-custom .nav-link, .navbar-custom .navbar-brand {
            color: #fff !important;
            font-weight: bold;
        }
        .navbar-custom .nav-link:hover {
            color: #ffeeff !important;
        }
        .card-header {
            background-color: #ff69b4 !important;
            color: #fff !important;
            font-weight: bold;
        }
        footer {
            background-color: #ff69b4;
        }
        footer small {
            color: white;
        }
        table.table-primary {
            background-color: #ffc4e2 !important;
        }
        .btn-pink {
            background-color: #ff69b4;
            color: white;
            border: none;
        }
        .btn-pink:hover {
            background-color: #e7549c;
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="/">Pink Muda App</a>
    <div>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="/profil">Profil</a></li>
        <li class="nav-item"><a class="nav-link" href="/jadwal">Jadwal</a></li>
        <li class="nav-item"><a class="nav-link" href="/organisasi">Organisasi</a></li>
        <li class="nav-item"><a class="nav-link" href="/hobi">Hobi</a></li>
        <li class="nav-item"><a class="nav-link" href="/sertifikat">Sertifikat</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<footer class="text-center mt-5 p-3">
    <small>Student System © 2025 </small>
</footer>

</body>
</html>
