<!-- home -->
<?= $this->extend('template/_layouts/base_layout'); ?>
<!-- page-css -->
<?= $this->section('page-css'); ?>
<link rel="stylesheet" href="<?= base_url(); ?>/assets/static/vendor/slick/1.8.1/slick.min2.css" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/static/css/form/bs5a2-floating-label.css?v0" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/static/css/site/home-page.css?<?= time(); ?>" />
<link rel="stylesheet" href="<?= base_url(); ?>/assets/static/css/shadow.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" />

<?= $this->endSection(); ?>
<?= $this->section('page-js-lib'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous"></script>
<?= script_tag(base_url('assets/static/vendor/slick/1.8.1/slick.min.js')); ?>
<?= $this->endSection(); ?>
<!-- content -->
<?= $this->section('main-content'); ?>
<!--
<section>
   <div class="m-0 rounded-0 p-3 alert bg-darkblue text-center text-light alert-dismissible fade show" role="alert">
      <p class="h2">:: Notice ::</p>
      <marquee onmouseover="this.stop()" onmouseout="this.start()">
      <h3>Session 2021-22 Result has released. Click on below "View Result" button for result.</h3>
      </marquee>
      <a class="btn btn-primary"  href="https://anshumemorial.in/v2/student/result" >View Result</a>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
</section>
-->
<section class="bg-light school-hdr">
   <div class="row py-3">
      <div style="overflow:hidden;" class="header col-md-10 p-4 offset-md-1">
         <div class="header__content d-md-flex justify-content-center">
            <div class="d-none d-md-block justify-content-center"> <img class="header__side-img" src="<?= base_url(); ?>/assets/static/img/ama/ama-128x128.png" alt="Anshu Memorial Academy Logo"></div>
            <div class="ml-md-4">
               <h1 class="h1 school-name text-indigo text-center mb-0 panton-b">Anshu Memorial Academy</h1>
               <p class="text-center small m-0 mb-2 text-purple">CBSE Pattern Based, An English Medium School.</p>
               <hr class="m-0 my-2 my-md-0 mx-auto">
               <p class="text-center school-hdr-contact m-0">
                  <a href="tel:9128289100"><i class="fa fa-mobile"></i> 9128289100,</a>
                  <a class="mx-2" href="https://api.whatsapp.com/send?phone=919973757920"><i class="fa fa-whatsapp"></i> 9973757920,</a>
                  <a class="d-inline-block mt-1" href="mailto:info@anshumemorial.in"><i class="fa fa-envelope"></i> info@anshumemorial.in</a>
               </p>
               <hr class="my-2 mx-auto">
               <p class="h6 text-center ">
                  <a href="https://www.google.com/maps/place/Anshu+Memorial+Academy/@25.7501674,85.3579377,17z/data=!3m1!4b1!4m5!3m4!1s0x39ed65dea0882835:0xf138a62b245e3bcb!8m2!3d25.7501537!4d85.3601233">
                     <i class="fa fa-map-marker"></i> Bhatha Dasi, Rajapakar, Vaishali, Bihar-844124
                  </a>
               </p>
            </div>
         </div>
      </div>
   </div>
</section>
<?php
$news = [
   
   'https://anshumemorial.in/result/admin/all_stu'=>'Result session 2020-21',
   '/#'=>'Admission start for 2022-2023.',
   
];

$txtCls = array(
   'muted',
   'primary',
   'success',
   'danger',
   'purple',
   'secondary',
   'indigo'
);
?>
<!-- Latest News Section -->
<section class="d-flex bg-white latest-news">
   <div style="background:#084298;" class="px-3 h5 py-2 mb-0 panton-sb text-light news-title shadow-5-r">Latest</div>
   <marquee scrollamount="5" class="py-2">
      <?php $i = 0;
      foreach ($news as $link => $text) : ?>
         <a target="_blank" class="text-<?= $txtCls[$i]; ?>" href="<?= $link ?>"><?= $text; ?> <u>View details</u></a>
      <?php $i++;
         if (count($txtCls) == $i) {
            $i = 0;
         };
      endforeach; ?>
      <!--<span>&#9733; सभी माता-पिता को सूचित किया जाता है कि स्कूल 4 नवंबर 2020 से चालू है। इसलिए, माता-पिता से अनुरोध है कि वे अपने बच्चे को नियमित रूप से समय पर स्कूल भेजें। &nbsp;&#9733;</span>
   -->
   </marquee>
</section>
<!--
<section class="slide__menu-wrapper py-2 bg-light d-none">
   <div class="d-flex justify-content-between px-2">
      <p class="text-darkblue mb-2">Important Links</p>
      <p class="header__time mb-2 text-indigo"></p>
   </div>
   <div class="slide__menu p-2 bg-dark text-center"> <a href="#" class="slide__menu-item">Events</a> <a href="#" class="slide__menu-item">Registration</a> <a href="#" class="slide__menu-item">Addmission</a> <a href="#" class="slide__menu-item">Result</a> <a href="#" class="slide__menu-item">login</a> <a href="#" class="slide__menu-item">News</a> <a href="#" class="slide__menu-item">Notice</a> </div>
</section>
-->
<style type="text/css">
   .slider__1 {
      ackground-image: linear-gradient(hsla(0, 0%, 0%, 0.5), hsla(0, 0%, 0%, 0.5)), url("assets/static/img/web/nat-landscape2.jpg");
   }
</style>
<section class="slider__1-wrapper bg-primary">
   <div class="slider__1">
      <div class="slider__1-slide">
         <div class="slider__1-layer">
            <h1 class="sl__1">Welcome to</h1>
            <h3 class="sl__2">Anshu Memorial Academy</h3>
            <p class="d-none sl__3">Bhatha Chowk, Bhatha Dasi, Rajapakar, Vaishali, Bihar</p>
         </div>
      </div>
      <div class="slider__1-slide">
         <div class="slider__1-layer">
            <h3 class="sl__1">An English Medium School</h3>
            <p class="sl__2">Run &amp; managed by AnitaBindeshwar Foundation</p>
         </div>
      </div>
      <div class="slider__1-slide">
         <div class="slider__1-layer">
            <h1 class="sl__1">Based on</h1>
            <h3 class="sl__2">New CBSE Pattern</h3>
            <p class="d-none sl__3">We understand your children needs.</p>
         </div>
      </div>
      <div class="slider__1-slide">
         <div class="slider__1-layer">
            <h1 class="sl__1">From Std. Play</h1>
            <h1 class="sl__2">To Standard 8th</h1>
            <p class="d-none sl__3">Bhatha Chowk, Bhatha Dasi, Rajapakar, Vaishali, Bihar</p>
         </div>
      </div>
   </div>
   <div class="slider__1-progress">
      <div class="slider__1-progressbar"></div>
   </div>
</section>
<section class="dir-msg bg-white text-justify mb-5">
   <div class="container text-justif">
      <h1>Director Message:</h1>
      <div class="dir-img-bx float-end ms-3">
         <img src="<?= base_url(); ?>/assets/static/img/director-image.jpg">
      </div>
      Anshu Memorial Academy is a co-educational institution which nurtures academic and cultural development of children. The haven of education instills in its students the ideals of courage, truth, perseverance, fortitude and virtuosity. Our priorities in education are not only academic excellence, but also the formation of youth in discipline, hard work and moral values. These priorities are meant to prepare the youth for life by promoting intellectual excellence, uprightness of character, emotional maturity, and scientific temper, spirit of healthy competition, co-operation and sportsmanship through co-curricular activities, moral sensitivity, tolerance and national integration. Our aim is to shape your ward into a successful, responsible and benign personality. A secular environment fosters in our children a sense of unity and integrity and encourages them to take pride in their cultural heritage. We are one of English medium schools in Rajapkar. The ranking combines the school’s academic reputation with data on its students, faculty, financial resources and alumni satisfaction. Anshu Memorial Academy welcomes all those who seek the promise of new beginning and challenges and the powers of infinite opportunities. We believe in deeds, not words, offering a quality education that is both affordable and accessible. Opportunity and experience are the true essence of a Anshu Memorial education.
      <br>
      <br> Manish Kr. Sharma (Director of AMA).
   </div>
</section>
<!--
<section class="bg-white py-5">
   <div class="container text-justify">
      <div class="row ama__features ">
         <div class="col-md-6 col-lg-3 ">
            <h1>Div 1</h1>
            <p> What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
         </div>
         <div class="col-md-6 col-lg-3">
            <h1>Div 2</h1>
            <p> What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
         </div>
         <div class="col-md-6 col-lg-3">
            <h1>Div 3</h1>
            <p> What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
         </div>
         <div class="col-md-6 col-lg-3">
            <h1>Div 4</h1>
            <p> What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
         </div>
      </div>
   </div>
</section>
-->
<section class="">
   <div class="py-4 px-2 bg-light">
      <div class="container border border-primar rounded">
         <p class="h4 pt-2 text-primary">Find us on map</p>
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3593.6503934157327!2d85.35990715211484!3d25.74907256391992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed65dea0882835%3A0xf138a62b245e3bcb!2sAnshu+Memorial+Academy!5e0!3m2!1sen!2sin!4v1539857272951" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
   </div>
   <!-- <div class="py-5">
      <div class="container">
         <div class="row col-lg-8 mx-auto">
            <div class="card mx-auto process" id="cFormCard">

            </div>
         </div>

      </div>
   </div> -->
   <div class="container-fluid mb-5">
      <div class="row">
         <div class="col-md-8 col-lg-8 mx-auto">
            <div class="card-body mx-lg-5">
               <h1 class="text-center pb-4 pt-3 text-primary">Get in touch!</h1>
               <?php
               $session = \Config\Services::session();
               if ($session->getFlashdata('success')) {
                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert" >' . $session->getFlashdata("success") . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
               } else if ($session->getFlashdata('error')) {
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" >' . $session->getFlashdata("error") . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
               }
               ?>
               <form id="contact-form" action="<?= site_url("site/submitContacForm"); ?>" class=" form-float form-float-box" method="post">
                  <h3 class="card-title"></h3>
                  <div id="name-group" class="form-group mb-3">
                     <input name="name" id="name" class="form-control fields" type="text" placeholder=" " required oninput="isValid(this)" pattern="^[a-zA-Z][a-zA-Z\s]{2,30}$">
                     <div class="invalid-feedback">
                        <ul>
                           <li>Only alphanumeric characters and space allowed.</li>
                           <li>Minimum 3 letters required and maximum 30 characters allowed</li>.
                        </ul>
                     </div>
                     <label>Name</label>
                  </div>
                  <div id="mob-group" class="form-group mb-3">
                     <input name="mob" id="mob" class="form-control fields" maxlength="10" type="tel" placeholder=" " required oninput="isValid(this)" pattern="^[6-9]\d{9}$">
                     <div class="invalid-feedback">
                        <ul>
                           <li>Mobile No. must be start with 9,8,7 or, 6.</li>
                           <li>Mobile No. must be in 10 digits.</li>
                        </ul>
                     </div>
                     <label>Mobile No.</label>
                  </div>
                  <div id="email-group" class="form-group mb-3">
                     <input name="email" id="email" class="form-control fields" type="email" placeholder=" " required oninput="isValid(this)">
                     <div class="invalid-feedback">
                        <ul>
                           <li>Please enter valid email.</li>
                        </ul>
                     </div>
                     <label>Email</label>
                  </div>
                  <div id="sub-group" class="form-group mb-3">
                     <input name="sub" id="sub" class="form-control fields" type="text" placeholder=" " required oninput="isValid(this)" pattern="^[A-Za-z0-9][0-9A-Za-z\s.,]{2,50}$">
                     <div class="invalid-feedback">
                        <ul>
                           <li>Only alphanumeric characters are allowed.</li>
                           <li>Minimum 3 characters required. Maximum 50 characters allowed.</li>
                        </ul>
                     </div>
                     <label>Subject</label>
                  </div>
                  <div id="msg-group" class="form-group mb-3" placeholder="You message to be here.">
                     <textarea class="form-control fields" name="msg" id="msg" placeholder=" " required oninput="isValid(this)" pattern="^[a-zA-Z0-9][a-zA-Z0-9\s,.]{15,500}$"></textarea>
                     <label>Message</label>
                  </div>
                  <div>
                     <input class="pull-right btn btn-success text-right py-2 px-4" type="submit" name="submit" id="submit-cForm" value="Send Message">
                     <input class="pull-right btn btn-secondary py-2 px-4 me-4" type="reset" value="Reset">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>



<!-- welcome Modal --
<div class="modal fade" id="welcome-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header py-2">
            <h5 class="modal-title text-muted" id="staticBackdropLabel">
               Important Message!
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body ">
            <h5 class="text-primary"><strong>All guardian/parents attention please!</strong></h5>
            <ul>
               <li class="text-success">Admissions Open for the Academic Year 2021-2022.</li>
               <li class="text-danger">Admission is free for January 2021 <strong>only</strong>.</li>
            </ul>
            <a href="#" target="_blank">Read more &rArr;</a>
            <img class="d-none" src="https://v1.anshumemorial.in/ci/assets/static/img/manish.jpg">
         </div>
      </div>
   </div>
</div>
-->
<?= $this->endSection(); ?>
<?= $this->section('page-js'); ?>
<?= script_tag(base_url('assets/static/js/site/home-page.min.js')); ?>
<?= script_tag(base_url('assets/static/js/site/home-page-contact-form.mi.js')); ?>
<!--
<script src="assets/static/vendor/slick/1.8.1/slick.min.js"></script>
<script defer src="assets/js/home-page.min.js?13jan1309"></script>
<script defer src="assets/js/home-page-contact-form.mi.js?13jv"></script>
-->
<script type="text/javascript">
   "use strict";

   function isValid(formElem) {
      if (formElem.checkValidity() === true) {
         formElem.classList.remove("is-invalid");
         formElem.classList.add("is-valid");
         return true;
      } else {
         formElem.classList.remove("is-valid");
         formElem.classList.add("is-invalid");
         //formElem.insertAdjacentHTML('afterend', '<div class="invalid-feedback" >'+formElem.validationMessage+'</div>');
         return false;
      }
   }
</script>
<?= $this->endSection(); ?>