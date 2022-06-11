<?php if($_GET && $_GET["r"]==="ua"){exit($_SERVER['HTTP_USER_AGENT']);}?>

<!DOCTYPE html>
<html lang="en-IN">

<head prefix="og: https://ogp.me/ns# ">
   <!-- meta_tags -->
   <?= $this->include('template/_partials/meta_tags'); ?>
   <!-- base_layout css static/vendor file-->
   <link rel="stylesheet" href="<?= base_url(); ?>/assets/static/vendor/fonts/panton/panton.min.css" />
   <link rel="stylesheet" href="<?= base_url(); ?>/assets/static/vendor/font-awesome/4.7.0/css/font-awesome.min.css" />
   <link rel="stylesheet" href="<?= base_url(); ?>/assets/static/vendor/bootstrap/5.0.0-beta2/bootstrap.min.css" />
   <link rel="stylesheet" href="<?= base_url(); ?>/assets/static/vendor/bootstrap/bs5-reset/bs5a2-btn-reset-form-remove.css" />
   <link rel="stylesheet" href="<?= base_url(); ?>/assets/static/vendor/animate-css/4.1.0/animate.min.css" />
   <link rel="stylesheet" href="<?= base_url(); ?>/assets/static/vendor/waves/0.7.6/waves.min.css" />
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.css"  crossorigin="anonymous" />
   !--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
   !-- base_layout css file for all page -->
   <link rel="stylesheet" href="<?= base_url(); ?>/assets/static/css/template/base-layout.css?<?= time() ?>" />
   <?= $this->renderSection('page-css'); ?>

   <?= script_tag(base_url('assets/static/vendor/jquery/3.5.1/jquery.min.js')); ?>
   <?//=script_tag(base_url('assets/static/vendor/jquery-ui/1.12.1/jquery-ui.min.js'));
   ?>
   <!--
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"  crossorigin="anonymous"></script>
   -->
   <?= script_tag(base_url('assets/static/vendor/jquery-sticky/jquery.sticky.min.js')); ?>
   <?= script_tag(base_url('assets/static/vendor/bootstrap/5.0.0-beta2/bootstrap.bundle.min.js')); ?>
   <?= script_tag(base_url('assets/static/vendor/waves/0.7.6/waves.min.js')); ?>
   <!-- for page specific css file -->
   <?= $this->renderSection('page-js-lib'); ?>
   <script type="text/javascript">
      var baseUrl = '<?= base_url(); ?>';
   </script>
</head>

<body>
   <?= $this->include('template/_partials/header'); ?>
   <main>
      <?= $this->renderSection('main-content'); ?>
   </main>
   <?= $this->include('template/_partials/footer.php'); ?>

   <!-- js for all page -->
   <?= script_tag(base_url('assets/static/js/template/base-layout.min.js')); ?>

   <!-- all static/vendor js file--
   <script src="assets/static/vendor/jquery/3.5.1/jquery.min.js"></script>
   <script src="assets/static/vendor/jquery-ui/1.12.1/jquery-ui.min.js"></script>
   <script src="assets/static/vendor/jquery-sticky/jquery.sticky.min.js"></script>
   <script src="assets/static/vendor/bootstrap/5.0.0-beta1/bootstrap.bundle.min.js"></script>
   <script src="assets/static/vendor/waves/0.7.6/waves.min.js"></script>
   <!-- js for all page --
   <script defer src="assets/js/base-layout.min.js?13jan1306"></script>
   <!-- page specific js -->
   <?= $this->renderSection('page-js'); ?>
</body>

</html>