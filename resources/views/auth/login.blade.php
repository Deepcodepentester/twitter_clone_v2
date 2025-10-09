<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Globmarket Login</title>
  <style>
    /* Global Styles */
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #141414;/* #f8f8f8; */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    /* Login Container */
    .login-container {
      width: 360px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    /* Header with Binance Yellow */
    .login-header {
      background:#58dd68; /* #f0b90b; */
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    /* Form Styling */
    .login-form {
      padding: 20px;
    }
    .login-form label {
      display: block;
      margin-bottom: 5px;
      color: #333;
      font-size: 14px;
    }
    .login-form input[type="email"],
    .login-form input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
    }
    .login-form input[type="submit"] {
      width: 100%;
      padding: 10px;
      background: #58dd68;;
      border: none;
      border-radius: 4px;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
    }
    .login-form input[type="submit"]:hover {
      background: #dca108;
    }

    /* Footer for extra links */
    .login-footer {
      text-align: center;
      padding: 15px;
      background: #f2f2f2;
    }
    .login-footer a {
      color: #58dd68;
      text-decoration: none;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="login-container">
      <div class="login-header">
      <h1> &#x1f44B; Welcome Back!</h>
    </div>
    <div class="login-header">
      <h2>  Login to get Started</h2>
    </div>
    <div class="login-form">
      <form action="{{ route('login') }}" method="post">
        @csrf
        <label for="email">Email </label>
        <input type="email" id="username" name="email" placeholder="Enter your email " required />
        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required />
        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

        <input type="submit" value="Log In" />
      </form>
    </div>
    <!--<div class="login-footer">
      <a href="{{ route('register') }}">Forgot Password6?</a>
    </div>-->
    <div class="login-footer">
      <a href="{{ route('register') }}">Sign up now</a>
    </div>
  </div>
</body>
</html>
