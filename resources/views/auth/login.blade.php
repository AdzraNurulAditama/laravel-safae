<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Safae</title>

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

            position:relative;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:20px;

            overflow-y:auto;
        }

        /* decorative blobs */
        .blob{
            position:absolute;
            border-radius:50%;
            filter:blur(10px);
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

        .login-wrapper{
            width:100%;
            max-width:1100px;

            display:grid;
            grid-template-columns: 1fr 480px;

            background:#fff;
            border:3px solid #000;

            box-shadow:14px 14px 0px #000;

            overflow:hidden;
            position:relative;
            z-index:2;

            margin:auto;
        }

        /* LEFT SIDE */
        .left-panel{
            background:
                linear-gradient(135deg, rgba(13,110,253,0.9), rgba(124,77,255,0.95)),
                url('https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=1200&auto=format&fit=crop');

            background-size:cover;
            background-position:center;

            color:#fff;
            padding:60px;

            position:relative;

            display:flex;
            flex-direction:column;
            justify-content:space-between;
        }

        .overlay{
            position:absolute;
            inset:0;
            background:rgba(0,0,0,0.35);
        }

        .left-content{
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
            line-height:1;

            margin-bottom:20px;
        }

        .left-desc{
            font-size:1rem;
            max-width:500px;

            color:#f1f1f1;
            line-height:1.7;
        }

        .feature-boxes{
            position:relative;
            z-index:2;

            display:flex;
            gap:15px;

            margin-top:40px;
            flex-wrap:wrap;
        }

        .feature{
            background:#fff;
            color:#000;

            border:2px solid #000;

            padding:14px 18px;

            font-weight:700;

            box-shadow:4px 4px 0px #000;

            font-size:0.9rem;
        }

        /* RIGHT SIDE */
        .right-panel{
            padding:55px 45px;
            position:relative;
            background:#ffffff;
        }

        .dots{
            position:absolute;
            top:25px;
            right:25px;

            font-size:1.2rem;
            letter-spacing:4px;
            font-weight:800;
        }

        .login-title{
            font-size:2.2rem;
            font-weight:800;

            margin-bottom:8px;

            letter-spacing:-2px;
        }

        .login-subtitle{
            color:#666;
            margin-bottom:35px;
        }

        .form-label{
            font-weight:700;
            margin-bottom:8px;
        }

        .form-control{
            border:2px solid #000;
            border-radius:0;

            padding:14px 16px;

            font-weight:600;

            background:#fafafa;
        }

        .form-control:focus{
            border-color:#000;
            box-shadow:5px 5px 0px #0d6efd;
            background:#fff;
        }

        .input-group-custom{
            margin-bottom:25px;
        }

        .btn-login{
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

        .btn-login:hover{
            background:#000;
            color:#fff;

            transform:translate(2px,2px);

            box-shadow:2px 2px 0px #000;
        }

        .extra-links{
            margin-top:25px;

            display:flex;
            justify-content:space-between;

            font-size:0.9rem;
        }

        .extra-links a{
            color:#000;

            font-weight:700;

            text-decoration:none;

            position:relative;
        }

        .extra-links a::after{
            content:'';

            position:absolute;
            left:0;
            bottom:-3px;

            width:0%;
            height:2px;

            background:#0d6efd;

            transition:.3s;
        }

        .extra-links a:hover::after{
            width:100%;
        }

        .divider{
            display:flex;
            align-items:center;

            margin:28px 0;

            color:#777;
            font-size:0.9rem;
            font-weight:600;
        }

        .divider::before,
        .divider::after{
            content:'';

            flex:1;
            height:2px;

            background:#ddd;
        }

        .divider span{
            padding:0 15px;
        }

        .social-login{
            display:flex;
            gap:15px;
        }

        .social-btn{
            flex:1;

            border:2px solid #000;

            padding:12px;

            background:#fff;

            font-weight:700;

            transition:.2s;

            box-shadow:4px 4px 0px #000;
        }

        .social-btn:hover{
            background:#000;
            color:#fff;

            transform:translate(2px,2px);

            box-shadow:2px 2px 0px #000;
        }

        /* TABLET */
        @media(max-width: 992px){

            body{
                padding:15px;
            }

            .login-wrapper{
                grid-template-columns:1fr;
            }

            .left-panel{
                display:none;
            }

            .right-panel{
                padding:45px 30px;
            }
        }

        /* MOBILE */
        @media(max-width: 500px){

            .right-panel{
                padding:35px 20px;
            }

            .login-title{
                font-size:1.8rem;
            }

            .extra-links{
                flex-direction:column;
                gap:10px;
            }

            .social-login{
                flex-direction:column;
            }
        }

    </style>
</head>

<body>

    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>

    <div class="login-wrapper">

        <!-- LEFT -->
        <div class="left-panel">

            <div class="overlay"></div>

            <div class="left-content">

                <div class="brand-badge">
                    SAFAE STORIES
                </div>

                <h1 class="left-title">
                    Tulis.<br>
                    Bagikan.<br>
                    Hidupkan Cerita.
                </h1>

                <p class="left-desc">
                    Platform baca-tulis modern untuk para penulis kreatif.
                    Simpan ide, publikasikan karya, dan bangun dunia cerita Anda sendiri bersama Safae.
                </p>

            </div>

            <div class="feature-boxes">

                <div class="feature">
                    ✍️ Editor Interaktif
                </div>

                <div class="feature">
                    📚 Publish Cerita
                </div>

                <div class="feature">
                    🔥 Trending Story
                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="right-panel">

            <div class="dots">•••</div>

            <h2 class="login-title">
                WELCOME BACK
            </h2>

            <p class="login-subtitle">
                Masuk untuk melanjutkan sesi menulis Anda di Safae
            </p>

            <form method="POST" action="{{ route('login.submit') }}">

                @csrf

                <div class="input-group-custom">

                    <label class="form-label">
                        Username
                    </label>

                    <input
                        type="text"
                        name="username"
                        class="form-control"
                        placeholder="Masukkan username..."
                        required
                    >

                </div>

                <div class="input-group-custom">

                    <label class="form-label">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Masukkan password..."
                        required
                    >

                </div>

                <button type="submit" class="btn btn-login">
                    LOGIN SEKARANG
                </button>

                <div class="extra-links">

                    <a href="#">
                        Lupa Password?
                    </a>

                    <a href="{{ route('register') }}">
                        Buat Akun Baru
                    </a>

                </div>

                <div class="divider">
                    <span>ATAU</span>
                </div>

                <div class="social-login">

                    <button type="button" class="social-btn">
                        Google
                    </button>

                    <button type="button" class="social-btn">
                        GitHub
                    </button>

                </div>

            </form>

        </div>

    </div>

</body>
</html>