<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h2 {
            olor: #333333;
        }

        p {
            color: #555555;
            line-height: 1.6;
        }

        .button {
            display: inline-block;
            padding: 12px 20px;
            margin-top: 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #999999;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Reset Password Anda</h2>
        <p>Halo,</p>
        <p>Kami menerima permintaan untuk mereset password akun Anda. Klik tombol di bawah ini untuk melanjutkan proses reset:</p>
        <a href="{{ route('validasi', ['token' => $token]) }}" class="button">Reset Password</a>
        <p>Jika Anda tidak meminta reset password, abaikan email ini.</p>
        
        <div class="footer">
            &copy; 2025 Sistem Inventory. Semua hak dilindungi.
        </div>
    </div>
</body>
</html>
