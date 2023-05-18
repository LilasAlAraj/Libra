<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Libra</title>
    <meta name="keywords"
        content="law firms management system, law, cases management system, cases, tasks, lawyers, lawyer, court">
    <meta name="description"
        content="ليبرا هو بيتك القانوني.. وأكثر! يقوم بإدارة مكتبك وعملائك.. ويقوم بتنظيم الملفات والمهام.">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>
    <div class="container">
        <form id="login-form" method="POST" action="{{ route('login') }}">
            @csrf

            <h1 style="  text-align: center;    ">تسجيل الدخول</h1>

            <div id="imgcontainer">
                <img src="{{ asset('Img/Logo.jpg') }}" alt="Avatar" id="avatar">
            </div>

            <div class="container">
                <div class="row">
                    <label for="username" style="font-size:medium;"><b>رقم الهاتف/البريد الإلكتروني</b></label>
                    <input type="tel" id="username" placeholder="أدخل رقم الهاتف" name="username"
                        class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}"
                        required autofocus required>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong >{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="row">

                    <div class="col-12">
                        <label for="password" style="font-size:medium;"><b>كلمة المرور</b></label>
                    </div>

                    <div class="col-1" style="padding: 0;">
                        <button type="button" id="show-password-btn">
                            <span data-feather="eye" class="align-text-bottom"></span>
                        </button>
                    </div>
                    <div class="col-11" style="padding: 0;">
                        <input type="password" id="password" placeholder="أدخل كلمة المرور" name="password" required
                            autocomplete="current-password"
                            class="form-control @error('password') is-invalid @enderror">
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-check">
                        <label for="remember" style="font-size:medium; font-weight: bolder; color: rgb(7, 48, 78); ">
                            تذكرني
                        </label>
                        <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <button type="submit" class="btn operations-btn" style="background-color: rgb(87, 126, 155);">
                        تسجيل الدخول
                    </button>
                </div>

            </div>


            @if (Route::has('password.request'))
                <div class="row d-flex justify-content-center">
                    <a href="{{ route('password.request') }}" id="forget_password">هل نسيت كلمة المرور؟</a>
                </div>
            @endif

            <div id="error" class="error">

            </div>
        </form>
    </div>
    <!-- Error messages -->


    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/login.js') }}"></script>
</body>

</html>
