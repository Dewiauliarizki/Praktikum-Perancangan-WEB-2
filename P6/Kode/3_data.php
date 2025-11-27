<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Identitas</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f0f4ff; /* soft pastel blue */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 450px;
            background: #ffffff;
            margin: 60px auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #4a69bd;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #34495e;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px 0;
            border: 1px solid #dcdde1;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            background: #f7f9ff;
        }

        input[type="text"]:focus {
            border-color: #4a69bd;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #4a69bd;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
        }

        input[type="submit"]:hover {
            background: #3b55a1;
        }
    </style>

</head>
<body>

    <div class="container">
        <h1>Selamat Datang di Situs Kami</h1>
        <p style="text-align:center;">Silakan isi identitas Anda</p>

        <form method="post" action="4_proses.php">
            
            <label>Nama:</label>
            <input type="text" name="nama">

            <label>Umur:</label>
            <input type="text" name="umur">

            <label>Email:</label>
            <input type="text" name="email">

            <input type="submit" value="Submit">
        </form>
    </div>

</body>
</html>
