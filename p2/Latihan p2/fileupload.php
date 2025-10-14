<html>
<head>
    <title>Form untuk Input Nama File</title>
</head>
<body>
    <h1>Input Nama File untuk Upload</h1>
    <p>Klik <b>Browse</b> untuk memilih file!</p>

    <form enctype="multipart/form-data" method="post" action="do_upload.php">
        <!-- Batas maksimum ukuran file (dalam byte) -->
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
        
        Nama File : <input type="file" name="file1" size="30"><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
