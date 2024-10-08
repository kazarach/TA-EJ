<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" nonce="{{ $nonce }}"></script>
    <title>Login Page</title>
</head>
<body>
    <div class="container" id="container">
        {{-- <div class="form-container sign-up">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h1>Create Account</h1>
                <div class="social-icons">
                </div>
                <span>or use your email for registration</span>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Sign Up</button>
            </form>
        </div> --}}
        <div class="form-container sign-in">
            <form id="login-form">
                @csrf
                <h1>Sign In</h1>
                {{-- <div class="social-icons">
                </div> --}}
                <span>Use your username and password</span>
                <input type="username" id="username" name="username" placeholder="Username" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                {{-- <a href="#">Forget Your Password?</a> --}}
                <button type="submit">Sign In</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Login with your personal details to use all site features</p>
                    {{-- <button class="hidden" id="register">Sign Up</button> --}}
                </div>
            </div>
        </div>
    </div>

    <script src="/js/login.js" nonce="{{ $nonce }}"></script>
</body>
</html>