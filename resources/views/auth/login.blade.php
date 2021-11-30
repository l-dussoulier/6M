<head>
    <?php include './assets/inc/meta.inc.php' ?>
        <link rel="stylesheet" href="./assets/css/master.min.css">
</head>
<body>
    <header class="onepage">

        <div class="header-brand">
            <h2>Login</h2>
        </div>
        <a href="javascript:history.back()">
            <img class="icon" src="../assets/src/icon/close.svg" alt="close">
        </a>
    </header>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->

                <label for="email">Email</label>
                <input id="email" type="email" name="email" autocomplete="email" required autofocus>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="password">


                @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oubié?') }}
                    </a>
                @endif

               <div class="form-cta">
                   <a href="{{route('register')}}" class="button light">Register</a>

                   <button class="button black" type="submit">Login</button>
               </div>

        </form>

</body>

</html>
