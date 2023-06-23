
<html>
    <head>
        <title>NAVIGATION-BAR</title>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link href='stu_portal.css' rel='stylesheet'>
    </head>
    <body>
      <div class="nav-content">
        <div class="nav" >
            <i class="logo" href="\">
                <img src="logo.png" 
                width="55" 
             height="55" 
             />
            </i>
                <pre>
            MAXWELL
            UNIVERSITY
            </pre>
          </div> <br><br><br><br>
          <ul >
            <li>
                <p>DASHBOARD</p><br>
                <a href="/">
                    <span><i class="bx bx-user"></i>Personal profile</span>
                    </a>
            </li><br>
            <li>
              <p>
                ACADEMICS
              </p><br>
              <a href="/">
                    <span> <i class="bx bx-book"></i>Course Registration</span><br>
                    <span><i class="bx bx-file"></i>Academic Requisition</span><br>
                    <span><i class="bx bx-check-square"></i>Course Evaluation</span>
                    </a>
            </li><br>
            <li>
              <p>
                FINANCIALS
              </p><br>
              <a href="/">
              <span><i class="bx bx-money"></i>Fee Statement</span><br>
             <span><i class="bx bx-receipt"></i>Receipts</span><br>
            <span><i class="bx bx-file"></i>Legacy Statement</span>
            </a>
            </li><br>

            <li>
                <p>
                    ACCOMODATION
                </p><br>
                <a href="/">
                <span><i class="bx bx-bed"></i>Hostel Booking</span>
                </a>

                </li><br>
            <li>
                <p>
                    EXAMINATIONS
                </p><br>
                <a href="/">
                <span> <i class="bx bx-id-card"></i>Exam  Card</span><br>
                <span><i class="bx bx-file-blank"></i>Transcript</span>
                </a>

                </li><br>
            <li>
                <p>
                    SETTINGS
                </p><br>
                <a href="/">
                <span class="sad"> <i class="bx bx-cog"></i>Change Password</span>
                </a>

                </li><br>
          </ul>
      </div>
        <div class="containerr">
              <div class="hamburger" onclick="toggleNav()">
                <span></span>
                <span></span>
                <span></span>
              </div>
            <div class="right-container">
              <form class="search" role="search">
                <input type="search" name="search" placeholder="Search" />
                <i class="bx bx-search" aria-hidden="true"></i>
              </form>
              <a href="#profile">
                <img src="EMM.jpg" width="35" height="35"/>
              </a>
              <ul class="menu-bar">
                <li>
              <button class="nav-link dropdown-btn" data-dropdown="dropdown2" aria-haspopup="true" aria-expanded="false" aria-label="discover">
              EMMANUEL MORIANGO MOMANYI
              <i class="bx bx-chevron-down" aria-hidden="true"></i>
            </button>
            </li>
            <div id="dropdown2" class="dropdown">
              <div class="dropdown-content hidden">
              <ul>
                <li>
                  <a class="dropdown-link hidden" href="#branding" id="profileLink"><i class="bx bx-user"></i><span id="prof">Profile</span></a>
                </li>
                <li>
                  <a class="dropdown-link hidden" href="portal.php"id="logoutLink" ><i class="bx bx-log-out"></i><span id="log">Logout</span></a>
                </li>
              </ul>
              </div>
               </div>
             </ul>
             </div>
        </div>
    <div class="page-wrapper">
      <div class="page-content">
      </div>
    </div>
<script>
var isActive = false;

function toggleNav() {
var pageWrapper = document.querySelector('.page-wrapper');
var pageContent = document.querySelector('.page-content');
var navContent = document.querySelector('.nav-content');
var containerr = document.querySelector('.containerr');

if (!isActive) {
pageWrapper.classList.add('active');
pageContent.classList.add('active');
navContent.classList.add('active');
containerr.classList.add('compressed');
containerr.style.transform = 'translateX(20.9%) scale(01)';
containerr.style.transformOrigin = 'right';
   
   
} else {
pageWrapper.classList.remove('active');
pageContent.classList.remove('active');
navContent.classList.remove('active');
containerr.classList.remove('compressed');
containerr.style.transform = 'none';
containerr.style.transformOrigin = 'initial';


}

isActive = !isActive;
}
 // Get the button, profile link, logout link, and dropdown content elements
  const button = document.querySelector('.dropdown-btn');
  const profileLink = document.getElementById('profileLink');
  const logoutLink = document.getElementById('logoutLink');
  const dropdownContent = document.querySelector('.dropdown-content');

  // Add a click event listener to the button
  button.addEventListener('click', function() {
    // Toggle the visibility of the profile and logout links
    profileLink.classList.toggle('hidden');
    logoutLink.classList.toggle('hidden');
    dropdownContent.classList.toggle('visible');
  });

  // Close the dropdown when clicking outside
  document.addEventListener('click', function(event) {
    if (!dropdownContent.contains(event.target) && !button.contains(event.target)) {
      dropdownContent.classList.add('hidden');
    }
  });
</script>

</body>
</html>

