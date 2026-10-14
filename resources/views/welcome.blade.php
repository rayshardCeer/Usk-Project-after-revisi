<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website Informasi Sertifikasi Profesi - BNSP</title>
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }


        body {
            background-color: #f4f6f9;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            color: #333;
        }

       
        .container {
            background-color: #ffffff;
            width: 100%;
            max-width: 500px;
            padding: 40px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .logo-text {
            font-size: 26px;
            font-weight: bold;
            color: #002b5e; 
            margin-bottom: 5px;
        }

        .logo-text span {
            color: #f39c12; 
        }

        h1 {
            font-size: 20px;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        p {
            font-size: 15px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .btn {
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 15px;
            transition: 0.3s;
        }

        .btn-login {
            background-color: #002b5e;
            color: #ffffff;
            border: 1px solid #002b5e;
        }

        .btn-login:hover {
            background-color: #001a3b;
        }

        .btn-register {
            background-color: #7bb690;
            color: #ffffff;
            border: 1px solid #e8fff0;
        }

        .btn-register:hover {
            background-color: #74a08b;
        }

        .admin-link {
            display: inline-block;
            margin-top: 25px;
            font-size: 13px;
            color: #7f8c8d;
            text-decoration: none;
        }

        .admin-link:hover {
            color: #002b5e;
            text-decoration: underline;
        }

        @media (min-width: 400px) {
            .btn-group {
                flex-direction: row;
            }
            .btn {
                flex: 1;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="logo-text">BN<span>SP</span></div>
        <p>
            Selamat datang di situs resmi pendaftaran Uji Kompetensi Keahlian. 
            Silahkan masuk jika sudah memiliki akun, atau daftar sebagai peserta baru jika belum memiliki akun.
        </p>
        <div class="btn-group">
            <a href="/bnsp/login" class="btn btn-login">Login</a>
            <a href="/bnsp/register" class="btn btn-register">Daftar Akun</a>

</body>
</html>