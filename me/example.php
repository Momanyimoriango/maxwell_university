<html>
    <head>
        <title>MYOWN</title>
        <link rel="stylesheet" href="C:\wamp64\www\ex.css">

</head>
<body>
    <?php
    $name="";
    $age="";
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST["name"];
        $age=$_POST["age"];  
    }
     ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
        <label>Name</label>
        <input type="text" name="name" id="name">
        <label>Age</label>
        <input type="number" name="age" id="age">
         <input type="submit" name="submit">
</form>

<hr>
<?php
echo "<p>Name: " . $name . "</p>";
echo "<p>Age: " . $age . "</p>";
?>
<body>
    </html>