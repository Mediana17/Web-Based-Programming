<html>
    <head>
        <title>radio button</title>
    </head>
    <body>
        <h1>Display Radio Button</h1>
        <form action="action1.php" method="post">
            <p>Sudah memiliki KTP?</p>
            <input type="radio" id="ktp1" name="ktp" value="true"> 
            <label for ="ktp1">Sudah</label><br>
            <input type="radio" id="ktp2" name="ktp" value="false">
            <label for ="ktp2">Belum</label><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>