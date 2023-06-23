
<html>
    <head>
        <title>STUDENT PORTAL</title>
        <link rel="stylesheet" href="portal.css">

    </head>
    <body>
        <div class="container">
          <div class="nav" >
            <i class="logo" href="\">
                <img src="logo.png" 
                width="60" 
             height="60" 
             />
            </i>
                <pre>
            MAXWELL
            UNIVERSITY
            </pre>
          </div> <br>
          <hr><br>
          <form name="myForm" action="reset_process.php" method="post">
            <label for="email" >Email</label><br><br>
            <input type="email"name="email" id="email" required placeholder="Email"><br><br>
            <button type="submit" value="Reset Password" id="stif">Submit</button>
          </form>
          <div class="pa">
            <a href="portal.php">
          <i ><p>Login</p></i></a>
          </div><br><br>
        </div>

    </body>
</html>
