<nav id="main__nav" class=" navbar navbar-expand-md fixed-top navbar-light bg-white py-0">
   <div class="container">
      <a class="navbar-brand" href="<?= site_url(); ?>"> <img class="animate__animated animate__animate__fadeInUp" src="<?= base_url(); ?>/assets/static/img/ama/ama-128x128.png"> </a>
      <button class=" hamburger flat-box hamburger--arrowalt navbar-toggler" type="button" aria-controls="menuContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="hamburger-box">
            <span class="hamburger-inner"></span> </span>
      </button>
      <div class="menuContent collapse navbar-collapse collapse navbar-collapse " id="navbarSupportedContent">
         <ul class="navbar-nav ms-auto">
            <li class="nav-item <?= (site_url() == current_url()) ? "active" : ""; ?>">
               <a class="nav-link" href="<?= site_url(); ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <!--
            <li class="nav-item <?= (site_url("about-us") == current_url()) ? "active" : ""; ?> ">
               <a class="nav-link disabled" href="<?= site_url("about-us"); ?>"> About Us</a>
            </li>
            <li class="nav-item <?= (site_url("contact-us") == current_url()) ? "active" : ""; ?>">
               <a class="nav-link disabled" href="<?= site_url("contact-us"); ?>">Contact Us</a>
            </li>
            <li class="nav-item dropdown ">
               <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Student Portal
               </a>
               <!--
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?= site_url("student/register"); ?>">Registration</a>
                  <a class="dropdown-item" href="<?= site_url("students"); ?>">Students List</a>
                  <a class="dropdown-item" href="<?= site_url("studentctrl/recycleBin"); ?>">Delete Records</a>
                  <a class="dropdown-item" href="#">Admission</a>
                  <a class="dropdown-item" href="https://anshumemorial.in/result">Result</a>
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Payment</a>
               </div>
               
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Admin
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Attendance</a>
                  <a class="dropdown-item" href="#">Login</a>
               </div>
            </li>
            <li class="nav-item">
               <a class="nav-link disabled" href="#">Sitemap</a>
            </li>
            -->
            <li class="nav-item">
            <a class="nav-link" href="https://anshumemorial.in/v2/student/result"> Result</a>
            </li>
            
         </ul>
      </div>
   </div>
</nav>