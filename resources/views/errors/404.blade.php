<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <style>
        body {
            background-color: #000000;
            color: #ffffff;
            font-family: Roboto, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        h1 {
            font-size: 100px;
            margin: 0;
        }
        p {
            font-size: 24px;
            margin: 10px 0;
        }

        img{
            height: 200px;
            width: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ url('assets/clone/img/logo.png') }}" alt="Icon">
        <p>Maaf, Anda tidak memiliki akses ke halaman ini.</p>
        <p>Halaman yang Anda coba akses hanya tersedia untuk tamu undangan.</p>
    </div>
</body>
</html>
