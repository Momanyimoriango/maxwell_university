<html>
    <head>
        <title> EXAMPLE</title>

    </head>
    <body>
        <?php
        // Define variables
        $name = "";
        $age = "";
        $email = "";

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the form data
            $name = $_POST["name"];
            $age = $_POST["age"];
            $email = $_POST["email"];
        }
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo $name; ?>">

            <label for="age">Age:</label>
            <input type="number" name="age" id="age" value="<?php echo $age; ?>">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $email; ?>">

            <input type="submit" value="Submit">
        </form>

        <hr>

        <?php
        // Display the entered values
        
            echo "<p>Name: " . $name . "</p>";
            echo "<p>Age: " . $age . "</p>";
            echo "<p>Email: " . $email . "</p>";
        ?>
    </body>
</html>
