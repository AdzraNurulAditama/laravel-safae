<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun | Safae</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .register-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 600px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .form-label { font-weight: 600; color: #495057; font-size: 0.85rem; }
        .form-control {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            background: #fff;
            border-color: #0d6efd;
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.1);
        }
        .btn-primary {
            background: #0d6efd;
            border: none;
            padding: 0.8rem;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.3s ease;
        }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(13,110,253,0.3); }
    </style>
</head>
<body>

<div class="register-card">
    <div class="text-center mb-4">
        <h3 class="fw-bold">Buat Akun Safae</h3>
        <p class="text-muted small">Mulai perjalanan menulis Anda hari ini</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger border-0 mb-4 shadow-sm">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nama Depan</label>
                <input type="text" name="nama_depan" class="form-control" placeholder="John" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Nama Belakang</label>
                <input type="text" name="nama_belakang" class="form-control" placeholder="Doe" required>
            </div>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Pilih username unik" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Nomor Telepon</label>
            <input type="text" name="telepon" class="form-control" placeholder="08xxxxxxxxx" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••" required>
            </div>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-lg">Daftar Sekarang</button>
        </div>
    </form>

    <p class="text-center mt-4 text-muted small">
        Sudah memiliki akun? <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-bold">Masuk di sini</a>
    </p>
</div>

</body>
</html>