<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIM-Surat</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #8b0000 0%, #dc2626 50%, #991b1b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 400px;
            padding: 40px 30px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header h1 {
            color: #991b1b;
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .login-header p {
            color: #666666;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333333;
            font-size: 14px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-group input:focus {
            border-color: #dc2626;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.15);
        }

        .error-message {
            color: #dc2626;
            font-size: 12px;
            margin-top: 6px;
            font-weight: 500;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #dc2626;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s ease;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #b91c1c;
        }

        .btn-submit:active {
            transform: scale(0.99);
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <h1>SIM-Surat</h1>
            <p>Silakan masuk ke akun Anda</p>
        </div>

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            
            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    placeholder="nama@email.com"
                    required
                >
                @error('email') 
                    <p class="error-message">{{ $message }}</p> 
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="••••••••"
                    required
                >
                @error('password') 
                    <p class="error-message">{{ $message }}</p> 
                @enderror
            </div>

            <button type="submit" class="btn-submit">Masuk</button>
        </form>
    </div>

</body>
</html>