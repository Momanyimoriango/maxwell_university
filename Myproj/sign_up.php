<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$servername = "localhost";
$username = "root";
$password = "";
$database = "student_portal";

// Connect to the database

$conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
     // Retrieving the portal creation credentials from the form
     $Name = $_POST["name"];
     $Password = $_POST["password1"];
     $Email = $_POST["email"];
     $RegNo = $_POST["RegNumber"];
 
  
 // Function to create a portal page for the user with the default code
 function createPortalPage($Name, $Default_code) {
    $portalContent = str_replace('$Name', $Name, $Default_code);
    $portalFileName = substr($Name, 0, 3) . ".php";

    $file = fopen($portalFileName, "w");
    fwrite($file, $portalContent);
    fclose($file);

    return $portalFileName;
}
 // Retrieve the default code from the database
 function getDefaultCodeFromDatabase($conn) {
    $sql = "SELECT Default_code FROM user_create";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $defaultCodeFile = $row["Default_code"]; // Get the file name from the Default_code column

        // Read the content of the file
        $filePath = __DIR__ . '/' . $defaultCodeFile;
        $defaultCode = file_get_contents($filePath);

        return $defaultCode;
    }

    return null;
}


// Get the default code
$Default_code = getDefaultCodeFromDatabase($conn);

if (!empty($Default_code)) {
    // Create the portal page for the user with the default code
    $portalFileName = createPortalPage($Name, $Default_code);

    // Insert the portal file path into the portal table
    $portalFilePath = mysqli_real_escape_string($conn, $portalFileName);
    $portalSql = "INSERT INTO validation (reg_no, PASSWORD, email,portal) VALUES ('$RegNo','$Password', '$Email','$portalFilePath')";
    if (mysqli_query($conn, $portalSql)) {
        // Data inserted successfully into the portal table
        $portalCreationMessage = "Portal created successfully.";
    } else {
        // Error in SQL execution for the portal table
        $portalCreationMessage = "Error executing SQL query for the portal table: " . mysqli_error($conn);
    }
} else {
    $portalCreationMessage = "Default code not found!";
}

function insertPictureIntoPortal($portalFilePath, $picturePath) {
    // Read the content of the portal file
    $portalContent = file_get_contents($portalFilePath);

    // Define a placeholder in the portal content for the picture
    $picturePlaceholder = '$ProfilePicture';

    // Replace the placeholder with the HTML code for the image
    $portalContentWithPicture = str_replace($picturePlaceholder, $picturePath , $portalContent);

    // Write the modified content back to the portal file
    file_put_contents($portalFilePath, $portalContentWithPicture);
}
if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] === UPLOAD_ERR_OK) {
    // Retrieve the details of the uploaded file
    $fileTmpPath = $_FILES['profilePicture']['tmp_name'];
    $fileName = $_FILES['profilePicture']['name'];
    $fileSize = $_FILES['profilePicture']['size'];
    $fileType = $_FILES['profilePicture']['type'];

    // Extract the first three initials of the username
    $Name = $_POST['name'];
    $initials = strtoupper(substr($Name, 0, 3));

    // Generate the new file name with the initials and file extension
    $newFileName = $initials . '.' . pathinfo($fileName, PATHINFO_EXTENSION);

    // Move the uploaded file to a permanent location with the new file name
    $destinationPath = 'C:\wamp64\www\Myproj/' . $newFileName; // Set your desired destination directory
    
    if (move_uploaded_file($fileTmpPath, $destinationPath)) {
        // Store the file path in the `pictures` column of the `resett` table
        $picturePath = $newFileName; // Escape the path to prevent SQL injection
        
        $sql = "INSERT INTO resett (EMAIL, name,pictures) VALUES ('$Email','$Name','$picturePath')";

        if (mysqli_query($conn, $sql)) {
            // Picture path inserted successfully
            $pictureMessage = "Picture path inserted successfully.";
  // Call the insertPictureIntoPortal function
  $portalFilePath = mysqli_real_escape_string($conn, $portalFileName); // Specify the file path of the created portal file
  insertPictureIntoPortal($portalFilePath, $picturePath);
          
        } else {
            // Error in SQL execution
            $pictureMessage = "Error executing SQL query: " . mysqli_error($conn);
        }
    } else {
        // Error moving the uploaded file
        $pictureMessage = "Error moving the uploaded file.";
    }
}
         // Close the database connection
mysqli_close($conn);
    }
?>

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
          <h3>Create a student portal</h3>
          <form name="myForm"id="form" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
            <label for="terry" >Name</label><br><br>
            <input type="text"name="name" id="name" placeholder="e.g EMMANUEL MORIANGO MOMANYI"><br><br>
            <label for="terry" >Email</label><br><br>
            <input type="text"name="email" id="email" placeholder="e.g EMMOMANYI@KABARAK.AC.KE"><br><br>
            <label for="terry" >Reg.Number</label><br><br>
            <input type="text"name="RegNumber" id="stiff" placeholder="Reg.Number"><br><br>
            <label for="terry" >Password</label><br><br>
            <div class="password-wrapper">
            <input type="password"name="password1" id="password1" placeholder="Password">
            <span id="showPassword" onclick="togglePasswordVisibility()"></span>
                </div><br>
                <label for="terry" >Confirm Password</label><br><br>
            <div class="password-wrapper">
            <input type="password"name="password2" id="password2" placeholder=" Confirm Password">
            <span id="showPassword" onclick="togglePasswordVisibility()"></span>
                </div><br>
            <label for="terry">Profile Picture:</label>
            <input type="file" id="profilePicture" name="profilePicture">
  
          
            <button type="submit" id="stif">Sign Up</button><br>
            <div class="pa">
            <a href="portal.php">
          <i ><p>Login</p></i></a>
          </div><br><br>
          </form>
          </div>
        <div class="end">
            <p>2023 Designed by Maxwell Systems</p>
        </div>
        <script src="portal.js"></script>

    </body>
</html>
