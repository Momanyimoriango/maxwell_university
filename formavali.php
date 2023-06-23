<html>
    <head>
        <title>FORM VALIDATION</title>
        <script>
            function validateForm(){
                var name= document.forms["myForm"]["name"].value;
                var email= document.forms["myForm"]["email"].value;
                var password= document.forms["myForm"]["password"].value;
    
                if(name==""){
                    alert=("Name must be entered");
                    return false;
                }
                if(email==""){
                    alert("Email must be filled out");
                    return false;
                }
                if(password==""){
                    alert("Password must be filled out");
                    return false;
                }
                return true;
            }
            </script>
    </head>
    <body>
        <?php
        $name="";
        $email="";
        $password="";

        if($_SERVER["REQUEST_METHOD"]=="POST"){
        $name=$_POST["name"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        }
        ?>
        <h1>Form Validation</h1>
        <form name="myForm"onsubmit="return validateForm()" method="post" action="reg.php">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" ><br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" ><br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password"><br><br>
            <input type="submit" value="submit">
        </form>
        <hr>
        <?php
        echo "<p>Name:". $name."</p>";
        echo "<p>Email:". $email."</p>";
        echo "<p>Password:". $password."</p>";
        ?>
       
    </body>
</html>