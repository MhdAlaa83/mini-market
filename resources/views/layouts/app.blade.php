<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mini Market</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --soft-bg: #f7f9fb;
      --soft-primary: #7aa5d2;
      --soft-accent: #a6c5eb;
      --soft-dark: #2f3b52;
    }
    body { background: var(--soft-bg); color: var(--soft-dark); }
    .navbar { background: linear-gradient(90deg, var(--soft-primary), var(--soft-accent)); }
    .navbar-brand, .nav-link { color: #fff !important; }
    .card { border: none; box-shadow: 0 10px 24px rgba(0,0,0,.06); border-radius: 16px; }
    .btn-soft { background: var(--soft-primary); color:#fff; border:none; }
    .btn-soft:hover { filter: brightness(.95); }
    .badge-soft { background: var(--soft-accent); color:#fff; }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('products.index') }}">Mini Market</a>
    <div class="collapse navbar-collapse show">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link">Products</a></li>
        <li class="nav-item"><a href="{{ route('products.create') }}" class="nav-link">Add Product</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mb-5">
  @if (session('success'))
    <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
  @endif
  @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
