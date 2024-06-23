<html>
    <head>
        <title>Formulir</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
        /* CSS untuk styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #cb4c4c;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #d7a0a0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #cf5a5a1a;
        }
        h1 {
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        </style>
    </head>
    <body background="foto.jpg">
    <div class="container">
    <form method="post">
    <h4><p align="center">TAMBAH DATA BARU</p></h4>
    <hr>
    <table align="center">
        <tr>
            <td>Nama Lengkap :</td>
            <td><input type="text" name="Nama"></td>
        </tr>
        <tr>
            <td>NIM :</td>
            <td><input type="number" name="NIM"></td>
        </tr>
        <tr>
            <td>Tanggal Lahir :</td>
            <td><input type="date"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin :</td>
            <td><input type="radio" name="opsi" value="Laki">Laki-Laki
            <input type="radio" name="opsi" value="Perempuan">Perempuan</td>
        </tr>
        <tr>
            <td>Angkatan :</td>
            <td><select name="angkatan">
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select></td>
        </tr>
        <tr>
        
        </tr>
        <tr>
            <td>Email :</td>
            <td><input type="email" name="Nama"></td>
        </tr>
        <tr>
            <td>Foto :</td>
            <td><input type="file" name="foto"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Tambah" name="t1">
            <input type="reset" value="Reset" name="t2"></td>
        </tr>
    </table>
    <a href="tabelteman.html">kembali</a>
    </form>
    </div>
    </body>
</html>