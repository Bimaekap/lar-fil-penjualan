<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,  initial-scale=1.0" />
    <link rel="stylesheet" href="{{'/assets/css/stye.css'}}" />

    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <script src="https://kit.fontawesome.com/c0e27fec68.js" crossorigin="anonymous"></script>
    <title>Login Automotor</title>
</head>

<body>

    <div class="login-outer-container">
        <div class="login-container">
            <div class="login-area">
                <h3>LOGIN KE AUTOMOTOR</h3>
                <form class="login-items" action="{{ route('post.login') }}" method="POST">
                    @csrf
                    <label htmlFor="username">Email</label>
                    <input type="email" class="login" name="email" placeholder="your-email@gmail.com"
                        value="pembeli2@gmail.com" />
                    <label htmlFor="password">Password</label>
                    <input type="password" class="login" name="password" placeholder="Your Password" value="pembeli" />
                    <input type="submit" class="login-btn" value="Login" />
                </form>
                <p class="p">
                    Belum Punya Akun?
                    <a class="a" href="{{ route('guest.register') }}">Buat Akun Baru</a>
                </p>

                <div class="social-login-container">
                    <!-- <p class='prompt'>or</p> -->
                    <!-- <div class='social-login'>
                        <button class='google-signin'><i class="fa-brands fa-google"></i> Login with Google</button>
                        <button class='github-signin'><i class="fa-brands fa-github"></i>Login with Github</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

</body>

</html>