<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Safae</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-glow: rgba(13, 110, 253, 0.15);
        }
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 420px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: transform 0.3s ease;
        }
        .login-card:hover { transform: translateY(-5px); }
        
        .form-label { font-weight: 600; color: #495057; font-size: 0.9rem; }
        
        .form-control {
            background: #f8f9fa;
            border: 2px solid transparent;
            padding: 0.8rem 1rem;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .form-control:focus {
            background: #fff;
            border-color: #0d6efd;
            box-shadow: 0 0 0 4px var(--primary-glow);
        }
        
        .btn-primary {
            background: #0d6efd;
            border: none;
            padding: 0.8rem;
            border-radius: 12px;
            font-weight: 700;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: #0b5ed7;
            transform: scale(1.02);
        }
        .alert { border-radius: 12px; font-size: 0.85rem; }
    </style>
</head>
<body>

<div class="login-card">
    <div class="text-center mb-4">
        <h3 class="fw-bold">Safae</h3>
        <p class="text-muted small">Kembali menulis cerita hari ini</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <div class="mb-4">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukan username anda" required>
        </div>
        <div class="mb-4">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>
        
        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-lg">Masuk ke Safae</button>
        </div>
    </form>

    <div class="text-center mt-4">
        <p class="text-muted small">Belum memiliki akses? <a href="{{ route('register') }}" class="text-decoration-none fw-bold">Daftar sekarang</a></p>
    </div>
</div>

</body>
</html>