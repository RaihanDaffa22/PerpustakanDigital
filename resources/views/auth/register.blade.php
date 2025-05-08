<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan - Register</title>
    
    <!-- Font Awesome -->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    
    <!-- IziToast -->
    <link rel="stylesheet" href="{{asset('assets/vendor/izitoast/css/iziToast.min.css')}}">
    
    <style>
        :root {
            --primary: #4c51bf;
            --primary-light: #667eea;
            --light: #f8fafc;
            --gray: #e2e8f0;
        }
        
        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: #f5f7fa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 1rem;
        }
        
        .register-card {
            width: 100%;
            max-width: 450px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
        
        .register-header {
            background: var(--primary);
            padding: 1.5rem;
            text-align: center;
        }
        
        .register-header h1 {
            color: white;
            font-size: 1.5rem;
            margin: 0;
            font-weight: 600;
        }
        
        .register-body {
            padding: 2rem;
        }
        
        .form-group {
            margin-bottom: 1.25rem;
        }
        
        .form-control {
            width: 100%;
            padding: 0.875rem;
            border: 1px solid var(--gray);
            border-radius: 6px;
            font-size: 0.9375rem;
            transition: border-color 0.2s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary-light);
        }
        
        .btn-register {
            width: 100%;
            padding: 0.875rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }
        
        .btn-register:hover {
            background: var(--primary-light);
        }
        
        .login-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: var(--primary);
            text-decoration: none;
            font-size: 0.875rem;
        }
        
        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="register-card">
        <div class="register-header">
            <h1>Daftar Akun Baru</h1>
        </div>
        
        <div class="register-body">
            <form action="/register/store" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" 
                           placeholder="Nama Lengkap" 
                           name="name" 
                           required 
                           autofocus>
                </div>
                
                <div class="form-group">
                    <input type="email" class="form-control" 
                           placeholder="Alamat Email" 
                           name="email" 
                           required>
                </div>
                
                <div class="form-group">
                    <input type="password" class="form-control" 
                           placeholder="Password" 
                           name="password" 
                           required>
                </div>
                
                <div class="form-group">
                    <input type="password" class="form-control" 
                           placeholder="Ulangi Password" 
                           name="password_confirm" 
                           required>
                </div>
                
                <button type="submit" class="btn-register">
                    Daftar Sekarang
                </button>
                
                <a href="/login" class="login-link">
                    Sudah punya akun? Masuk disini
                </a>
            </form>
        </div>
    </div>

    <!-- jQuery -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <!-- IziToast -->
    <script src="{{asset('assets/vendor/izitoast/js/iziToast.min.js')}}"></script>

    @if(session('sukses'))
    <script>
      iziToast.success({
        title: 'Berhasil',
        message: '{{session('sukses')}}',
        position: 'topRight'
      });
    </script>
    @elseif(session('gagal'))
    <script>
      iziToast.error({
        title: 'Gagal',
        message: '{{session('gagal')}}',
        position: 'topRight'
      });
    </script>
    @endif
</body>

</html>