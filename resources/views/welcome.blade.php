<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sertifikasi Profesi - BNSP</title>
    <style>
        /* color Emerald */
        :root {
            --emerald-50: #ecfdf5;
            --emerald-100: #d1fae5;
            --emerald-500: #10b981;
            --emerald-600: #059669;
            --emerald-700: #047857;
            --emerald-900: #064e3b;
            --text-gray: #4b5563;
            --bg-light: #f3f4f6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--bg-light);
            color: #333;
            line-height: 1.6;
        }

        /* --- NAVBAR --- */
        .navbar {
            background-color: var(--emerald-700);
            color: white;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar .logo {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .navbar .logo span {
            color: var(--emerald-100);
        }

        .navbar .admin-link {
            color: var(--emerald-100);
            text-decoration: none;
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 4px;
            transition: 0.3s;
        }

        .navbar .admin-link:hover {
            background-color: var(--emerald-600);
            color: white;
        }

        /* --- HERO SECTION --- */
        .hero {
            background-color: #ffffff;
            padding: 60px 40px;
            text-align: center;
            border-bottom: 1px solid #e5e7eb;
        }

        .hero h1 {
            font-size: 32px;
            color: var(--emerald-900);
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 16px;
            color: var(--text-gray);
            max-width: 650px;
            margin: 0 auto 30px auto;
        }

        /* button utama */
        .btn-group {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .btn {
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 15px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-login {
            background-color: var(--emerald-600);
            color: #ffffff;
            border: 2px solid var(--emerald-600);
            box-shadow: 0 4px 6px rgba(5, 150, 105, 0.2);
        }

        .btn-login:hover {
            background-color: var(--emerald-700);
            border-color: var(--emerald-700);
            transform: translateY(-2px);
        }

        .btn-register {
            background-color: transparent;
            color: var(--emerald-700);
            border: 2px solid var(--emerald-600);
        }

        .btn-register:hover {
            background-color: var(--emerald-50);
            transform: translateY(-2px);
        }

        /* --- INFORMASI SECTION --- */
        .info-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .grid-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .card {
            background: #ffffff;
            border-radius: 8px;
            padding: 30px 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border-top: 4px solid var(--emerald-500);
        }

        .card h3 {
            font-size: 18px;
            color: var(--emerald-900);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /*icon */
        .card h3::before {
            content: '';
            display: inline-block;
            width: 12px;
            height: 12px;
            background-color: var(--emerald-500);
            border-radius: 50%;
        }

        .card p {
            font-size: 14px;
            color: var(--text-gray);
            line-height: 1.6;
        }

        /* Responsif HP */
        @media (max-width: 600px) {
            .btn-group {
                flex-direction: column;
            }
            .navbar {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="logo">LSP <span>BNSP</span></div>
    </header>
    <section class="hero">
        <h1>Portal Uji Sertifikasi Kompetensi</h1>
        <p>
            Selamat datang di sistem informasi pendaftaran sertifikasi profesi. 
            Tingkatkan nilai profesional dan daya saing Anda di dunia industri melalui pengakuan kompetensi yang sah.
        </p>
        
        <div class="btn-group">
            <a href="/bnsp/login" class="btn btn-login">Login</a>
            <a href="/bnsp/register" class="btn btn-register">Daftar Akun</a>
        </div>
    </section>

    <section class="info-container">
        <div class="grid-info">
            
            <div class="card">
                <h3>Standar Industri</h3>
                <p>Materi dan instrumen ujian disusun berdasarkan Standar Kompetensi Kerja Nasional Indonesia (SKKNI) yang relevan dengan kebutuhan industri saat ini.</p>
            </div>

            <div class="card">
                <h3>Pengakuan Nasional</h3>
                <p>Peserta yang dinyatakan "Kompeten" akan mendapatkan sertifikat berlogo Garuda Emas yang diakui secara sah oleh negara dan perusahaan di seluruh Indonesia.</p>
            </div>

            <div class="card">
                <h3>Alur Pendaftaran</h3>
                <p>Silakan buat akun terlebih dahulu, lengkapi biodata dan dokumen pendukung serta pilih skema ujian</p>
            </div>

        </div>
    </section>

</body>
</html>