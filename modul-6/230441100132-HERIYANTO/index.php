<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background-color: #f0f8ff; /* AliceBlue */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        img {
            max-width: 70%;
            height: auto;
            margin-top: 20px; /* Tambahkan jarak atas jika diperlukan */
        }

        .container {
            text-align: center;
        }

        h1 {
            color: #4682b4; /* SteelBlue */
        }


    </style>

    <title>Home</title>
</head>

<body>
    <div class="container">
        <h1>SELAMAT DATANG DI WEBSITE HERIYANTO JELEK</h1>
        <img src="g.jpg" alt="Gambar Besar">
    </div>

    <?php include "layout/header.html" ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php include "layout/footer.html" ?>

</body>

</html>
