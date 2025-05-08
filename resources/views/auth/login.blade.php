<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Perpustakaan</title>
    <style>
        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: #f5f7fa;
            display: grid;
            place-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 1rem;
        }
        
        .login-form {
            width: 100%;
            max-width: 360px;
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        
        .logo {
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 600;
            font-size: 1.5rem;
            color: #2d3748;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        input {
            width: 100%;
            padding: 0.875rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 0.9375rem;
            transition: border-color 0.2s;
        }
        
        input:focus {
            outline: none;
            border-color: #4c51bf;
        }
        
        button {
            width: 100%;
            padding: 0.875rem;
            background: #4c51bf;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
        }
        
        button:hover {
            background: #434190;
        }
        
        .footer {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.875rem;
            color: #718096;
        }
        
        a {
            color: #4c51bf;
            text-decoration: none;
        }
        
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <div class="logo">PERPUSTAKAAN</div>
        
        <form action="{{route('postlogin')}}" method="post">
            @csrf
            <div class="form-group">
                <input type="email" 
                       name="email" 
                       placeholder="Email address" 
                       required 
                       autofocus>
            </div>
            
            <div class="form-group">
                <input type="password" 
                       name="password" 
                       placeholder="Password" 
                       required>
            </div>
            
            <button type="submit">
                Sign In
            </button>
        </form>
        
        <div class="footer">
            Don't have an account? <a href="/register">Register</a>
        </div>
    </div>
</body>
</html>