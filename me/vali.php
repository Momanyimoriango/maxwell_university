<?php
// Define variables and set to empty values
$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // Check if name contains only letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate message
    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
    } else {
        $message = test_input($_POST["message"]);
    }

    // If there are no errors, do something with the form data
    if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        // Process the form data (e.g., save to database, send email)
        // ...
        // Redirect or display a success message
        header("Location: success.php");
        exit();
    }
}

// Function to sanitize input values
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!-- HTML form -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name">
    <span class="error"><?php echo $nameErr; ?></span>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email">
    <span class="error"><?php echo $emailErr; ?></span>

    <label for="message">Message:</label>
    <textarea name="message" id="message" rows="5"></textarea>
    <span class="error"><?php echo $messageErr; ?></span>

    <input type="submit" value="Submit">
</form>
