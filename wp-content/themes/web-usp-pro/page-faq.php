<?php /** Template Name: faq */ ?>
<!doctype html>
  <html lang="pt-BR">
    <head>
      <!-- metatags -->
      <?php require('head.php') ?>

      <!-- favicon-->
      <?php require('favicon.php') ?>

      <!-- stylesheet -->
      <link rel="preload" href="<?= get_template_directory_uri() ?>/custom/css/minify/faq.css" as="style">
      <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/custom/css/minify/faq.css">

      <!-- function wordpress -->
      <?= wp_head(); ?>
    </head>
  <body>
  
    <!-- svg -->
    <?php require('svg.php'); ?>

    <!-- header -->
    <?php require('header.php'); ?>

    <!-- footer -->
    <?php require('footer.php'); ?>

    <!-- javascript -->
    <script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/custom/js/internal.js"></script>
    <script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/custom/js/collapse.js"></script>

    <!-- function wordpress -->
    <?= wp_footer(); ?>
  </body>
</html>