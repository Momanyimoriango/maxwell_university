<?php
// Assuming your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "student_portal";



// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Check if the "Remember Me" checkbox is selected
// Function to handle login
function login($regNo, $password, $conn) {
    // Query to fetch the stored values from the validation table
    $query = "SELECT * FROM validation WHERE reg_no = '$regNo' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    if ($result === false) {
        // Query execution failed
        echo "Error executing SQL query: " . mysqli_error($conn);
    } else {
        // Proceed with further processing

    // Check if a row is returned
    if (mysqli_num_rows($result) > 0) {
         // Fetch the portal value from the validation table
         $row = mysqli_fetch_assoc($result);
         $portal = $row['portal'];
         
        // Redirect to the desired page
        header("Location: $portal");
        exit();
    } else {
        // Invalid reg.no or password
        echo '<link rel="stylesheet" href="portal.css">';
    echo '<div id="warning-message" class="warning-message"><span class="warning-icon">&#9888;</span>Invalid reg.no or password.</div>';
    echo '<script>
    // Show the warning message
    var warningMessage = document.getElementById("warning-message");
    warningMessage.style.display = "block";
            // Automatically hide the warning message after 5 seconds
            setTimeout(function() {
                var warningMessage = document.getElementById("warning-message");
                warningMessage.style.display = "none";
            }, 5000);
          </script>';
}
    }
}


// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Check if the cookies for Reg.no and Password exist
if (isset($_COOKIE['regno']) && isset($_COOKIE['password'])) {
    // Retrieve the values from the cookies
    $regNo = $_COOKIE['regno'];
    $password = $_COOKIE['password'];
} else {
    $regNo = '';
    $password = '';
}
if (isset($_POST["remember"])) {
    // Set cookies for Reg.no and Password with the values
    setcookie("regno", $regNo, time() + (30 * 24 * 60 * 60), "/");
    setcookie("password", $password, time() + (30 * 24 * 60 * 60), "/");
} else {
    // If "Remember Me" is not selected, remove the cookies
    setcookie("regno", "", time() - 3600, "/");
    setcookie("password", "", time() - 3600, "/");
}
    // Retrieve the values entered in the form
    $regNo = $_POST["RegNumber"];
    $password = $_POST['password'];

    // Call the login function
    login($regNo, $password, $conn);
}
// Close the database connection
mysqli_close($conn);

include 'portal.html';
?>