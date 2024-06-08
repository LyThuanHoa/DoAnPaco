<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
        }
        .background {
            background-size: cover;
            background-position: center;
            width: 100vw;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-form {
            background: rgba(255, 255, 255, 0.9); /* Nền trắng mờ */
            padding: 20px 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }
        .login-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        .login-form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: brown;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .login-form button:hover {
            background-color: #f0f2f5;
            color: brown;
        }
    </style>
</head>
<body>
    <div class="background">
    <img src="{{asset('frontend\asset\images\login.jpg')}}" alt="" style="width:100%; position: absolute">
        <div class="login-form" style="width: 100vh; position: relative">
        <img src="{{asset('backend\asset\images\logoPaco.png')}}" alt="" style="display: block; margin: 0 auto 20px; width: 100px;">
            <form action="/check_login" method="POST">
                @csrf
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Email">
                
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password">
                
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
