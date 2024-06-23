<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        
        function getQueryParam(param) {
            let params = new URLSearchParams(window.location.search);
            return params.get(param);
        }

       
        window.onload = function() {
            let pesan = getQueryParam('pesan');
            if (pesan) {
                document.getElementById('message').textContent = pesan;
            } else {
                document.getElementById('message').textContent = "Tidak ada pesan untuk ditampilkan.";
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2 id="message"></h2>
        <a href="mahasiswa.php" class="btn">Kembali ke Home</a>
    </div>
</body>
</html>
