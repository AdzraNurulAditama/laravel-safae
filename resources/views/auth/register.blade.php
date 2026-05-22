<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Akun | Safae</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700;800&display=swap');

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        html, body{
            overflow-x:hidden;
        }

        body{
            min-height:100vh;

            font-family:'Space Grotesk', sans-serif;

            background:
                radial-gradient(circle at top left, #4f8cff 0%, transparent 30%),
                radial-gradient(circle at bottom right, #7c4dff 0%, transparent 25%),
                #e9eef5;

            display:flex;
            align-items:center;
            justify-content:center;

            padding:20px;

            position:relative;
        }

        /* BACKGROUND BLOBS */
        .blob{
            position:absolute;
            border-radius:50%;
            filter:blur(20px);
            opacity:.25;
            z-index:0;
        }

        .blob-1{
            width:300px;
            height:300px;
            background:#0d6efd;
            top:-80px;
            left:-80px;
        }

        .blob-2{
            width:250px;
            height:250px;
            background:#7c4dff;
            bottom:-70px;
            right:-70px;
        }

        /* MAIN CARD */
        .register-wrapper{
            width:100%;
            max-width:1150px;

            display:grid;
            grid-template-columns: 1fr 580px;

            background:#fff;

            border:3px solid #000;

            box-shadow:14px 14px 0px #000;

            overflow:hidden;

            position:relative;
            z-index:2;
        }

        /* LEFT PANEL */
        .left-panel{
            background:
                linear-gradient(135deg, rgba(13,110,253,0.9), rgba(124,77,255,0.95)),
                url('https://images.unsplash.com/photo-1455390582262-044cdead277a?q=80&w=1200&auto=format&fit=crop');

            background-size:cover;
            background-position:center;

            position:relative;

            padding:60px;

            color:#fff;

            display:flex;
            flex-direction:column;
            justify-content:space-between;
        }

        .overlay{
            position:absolute;
            inset:0;
            background:rgba(0,0,0,0.4);
        }

        .left-content,
        .left-bottom{
            position:relative;
            z-index:2;
        }

        .brand-badge{
            display:inline-block;

            background:#fff;
            color:#000;

            border:2px solid #000;

            padding:10px 18px;

            font-weight:800;
            letter-spacing:2px;

            box-shadow:4px 4px 0px #000;

            margin-bottom:30px;
        }

        .left-title{
            font-size:3rem;
            font-weight:800;

            line-height:1.1;

            margin-bottom:20px;
        }

        .left-desc{
            font-size:1rem;
            line-height:1.8;

            max-width:500px;

            color:#f1f1f1;
        }

        .feature-boxes{
            display:flex;
            flex-wrap:wrap;
            gap:15px;

            margin-top:40px;
        }

        .feature{
            background:#fff;
            color:#000;

            border:2px solid #000;

            padding:14px 18px;

            font-weight:700;

            box-shadow:4px 4px 0px #000;
        }

        /* RIGHT PANEL */
        .right-panel{
            background:#fff;

            padding:50px 40px;

            position:relative;
        }

        .dots{
            position:absolute;
            top:25px;
            right:25px;

            letter-spacing:4px;
            font-size:1.2rem;
            font-weight:800;
        }

        .register-title{
            font-size:2.3rem;
            font-weight:800;

            letter-spacing:-2px;

            margin-bottom:10px;
        }

        .register-subtitle{
            color:#666;
            margin-bottom:35px;
        }

        .form-label{
            font-weight:700;
            margin-bottom:8px;

            font-size:0.95rem;
        }

        .form-control{
            border:2px solid #000;
            border-radius:0;

            padding:14px 16px;

            background:#fafafa;

            font-weight:600;
        }

        .form-control:focus{
            background:#fff;

            border-color:#000;

            box-shadow:5px 5px 0px #0d6efd;
        }

        .input-group-custom{
            margin-bottom:22px;
        }

        .btn-register{
            width:100%;

            background:#0d6efd;

            border:2px solid #000;

            color:#fff;

            font-weight:800;

            padding:14px;

            border-radius:0;

            box-shadow:5px 5px 0px #000;

            transition:.2s ease;

            letter-spacing:1px;
        }

        .btn-register:hover{
            background:#000;
            color:#fff;

            transform:translate(2px,2px);

            box-shadow:2px 2px 0px #000;
        }

        .login-link{
            text-align:center;

            margin-top:25px;

            color:#666;
            font-size:0.95rem;
        }

        .login-link a{
            color:#0d6efd;

            text-decoration:none;

            font-weight:700;
        }

        .login-link a:hover{
            text-decoration:underline;
        }

        /* ALERT */
        .custom-alert{
            border:2px solid #ff4d4f;
            background:#fff1f0;

            padding:15px 20px;

            margin-bottom:25px;

            font-weight:600;
        }

        .custom-alert ul{
            margin:0;
            padding-left:20px;
        }

        /* RESPONSIVE */
        @media(max-width: 992px){

            .register-wrapper{
                grid-template-columns:1fr;
            }

            .left-panel{
                display:none;
            }

            .right-panel{
                padding:40px 25px;
            }
        }

        @media(max-width: 576px){

            body{
                padding:15px;
            }

            .register-title{
                font-size:1.9rem;
            }

            .right-panel{
                padding:35px 20px;
            }
        }

    </style>
</head>

<body>

    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    <div class="register-wrapper">

        <!-- LEFT SIDE -->
        <div class="left-panel">

            <div class="overlay"></div>

            <div class="left-content">

                <div class="brand-badge">
                    SAFAE STORIES
                </div>

                <h1 class="left-title">
                    Mulai Cerita<br>
                    Pertamamu<br>
                    Hari Ini.
                </h1>

                <p class="left-desc">
                    Bergabung bersama ribuan penulis lainnya di Safae.
                    Tulis cerita, bagikan imajinasi, dan bangun dunia kreatifmu sendiri.
                </p>

            </div>

            <div class="left-bottom">

                <div class="feature-boxes">

                    <div class="feature">
                        ✍️ Menulis Cerita
                    </div>

                    <div class="feature">
                        📚 Publish Novel
                    </div>

                    <div class="feature">
                        🔥 Komunitas Kreatif
                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="right-panel">

            <div class="dots">•••</div>

            <h2 class="register-title">
                BUAT AKUN
            </h2>

            <p class="register-subtitle">
                Daftar dan mulai perjalanan menulismu di Safae
            </p>

            @if($errors->any())
                <div class="custom-alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.submit') }}">

                @csrf

                <div class="row">

                    <div class="col-md-6">

                        <div class="input-group-custom">

                            <label class="form-label">
                                Nama Depan
                            </label>

                            <input
                                type="text"
                                name="nama_depan"
                                class="form-control"
                                placeholder="John"
                                required
                            >

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="input-group-custom">

                            <label class="form-label">
                                Nama Belakang
                            </label>

                            <input
                                type="text"
                                name="nama_belakang"
                                class="form-control"
                                placeholder="Doe"
                                required
                            >

                        </div>

                    </div>

                </div>

                <div class="input-group-custom">

                    <label class="form-label">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        placeholder="Pilih username unik"
                        required
                    >

                </div>

                <div class="input-group-custom">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="nama@email.com"
                        required
                    >

                </div>

                <div class="input-group-custom">

                    <label class="form-label">
                        Nomor Telepon
                    </label>

                    <input
                        type="text"
                        name="telepon"
                        class="form-control"
                        placeholder="08xxxxxxxxx"
                        required
                    >

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="input-group-custom">

                            <label class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="••••••••"
                                required
                            >

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="input-group-custom">

                            <label class="form-label">
                                Konfirmasi Password
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="••••••••"
                                required
                            >

                        </div>

                    </div>

                </div>

                <button type="submit" class="btn btn-register">
                    DAFTAR SEKARANG
                </button>

            </form>

            <div class="login-link">

                Sudah punya akun?

                <a href="{{ route('login') }}">
                    Masuk di sini
                </a>

            </div>

        </div>

    </div>

</body>
</html>