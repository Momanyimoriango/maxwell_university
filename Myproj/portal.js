function togglePasswordVisibility1() {
    var passwordInput = document.getElementById("stifff");
    var showPasswordIcon = document.getElementById("showPassword");
    
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      showPasswordIcon.style.backgroundImage = 'url("hide.png")'; /* Replace with your actual image path */
    } else {
      passwordInput.type = "password";
      showPasswordIcon.style.backgroundImage = 'url("show.jpeg")'; /* Replace with your actual image path */
    }
    
  }
  function togglePasswordVisibility() {
  var password1 = document.getElementById('password1');
var Input2 = document.getElementById('password2');
var showPasswordIcon = document.getElementById("showPassword");
if (password1.type === "password") {
  password1.type = "text";
  showPasswordIcon.style.backgroundImage = 'url("hide.png")'; /* Replace with your actual image path */
} else {
  password1.type = "password";
  showPasswordIcon.style.backgroundImage = 'url("show.jpeg")'; /* Replace with your actual image path */
}
  }


  function validateForm()
  {
      var RegNumber=document.forms["myForm"]["RegNumber"].value;
      var password=document.forms["myForm"]["password"].value;
      var password=document.forms["myForm"]["conpass"].value;
       if(RegNumber==""){
          alert("RegNumber must be entered");
          return false
       }
       if(password==""){
          alert("Password must be entered");
          return false
       }
       if(conpass==""){
        alert("Password must be Confirmed");
        return false
     }
  }
  const password1Input = document.getElementById('stifff');
  const password2Input = document.getElementById('stir');
  
  // Add an event listener to the first password input field
  password1Input.addEventListener('input', function() {
    // Set the value of the second password input field
    password2Input.value = password1Input.value;
  });
  
  // Add an event listener to the second password input field
  password2Input.addEventListener('input', function() {
    // Set the value of the first password input field
    password1Input.value = password2Input.value;
  });
  