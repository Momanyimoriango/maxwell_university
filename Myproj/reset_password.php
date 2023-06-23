<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["token"])) {
    // Display the password reset form
    ?>

<html>
    <head>
        <title>PASSWORD RESET</title>
        <link rel="stylesheet" href="portal.css">
        <script src="portal.js"></script>

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
          <form name="myForm" action="update_password.php" method="post">
          <input type="hidden" name="token" value="<?php echo $_GET["token"]; ?>">
          <label for="new_password">New Password:</label>
          <div class="password-wrapper">
          <input type="password" id="new_password" name="new_password" required  placeholder="New Password">
          <span id="show" onclick="togglePasswordVisibility()"></span>
                </div><br>
          <label for="new_password">Confirm Password:</label>
          <div class="password-wrapper">
          <input type="password" id="confirm_password" name="confirm_password" required  placeholder="Confirm Password">
          <span id="showPassword" onclick="togglePasswordVisibility()"></span>
                </div><br>
            <button type="submit" value="Reset Password" id="stif">Submit</button>
          </form>
          <script>
             function togglePasswordVisibility() {
             var passwordInput = document.getElementById("new_password");
             var showPasswordIcon = document.getElementById("show");
    
             if (passwordInput.type === "password") {
            passwordInput.type = "text";
              showPasswordIcon.style.backgroundImage = 'url("hide.png")'; /* Replace with your actual image path */
           } else {
        passwordInput.type = "new_password";
        showPasswordIcon.style.backgroundImage = 'url("show.jpeg")'; /* Replace with your actual image path */
    }
  }
          </script>
    </body>
</html>

    <?php
} else {
    echo "Invalid request.";
}
?>
