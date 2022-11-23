<?php /** Template Name: partners */ ?>
<!doctype html>
  <html lang="pt-BR"> 
    <head>
      <!-- metatags -->
      <?php require('head.php') ?>

      <!-- favicon-->
      <?php require('favicon.php') ?>

      <!-- stylesheet -->
      <link rel="preload" href="<?= get_template_directory_uri() ?>/custom/css/minify/partners.css" as="style">
      <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/custom/css/minify/partners.css">

      <!-- function wordpress -->
      <?= wp_head(); ?>
    </head>
  <body>
  
    <!-- svg -->
    <?php require('svg.php'); ?>

    <!-- header -->
    <?php require('header.php'); ?>

    <!-- partners -->
    <section class="partners">
      <div class="container">
        <!-- title -->
        <h1 class="title">Parcerias</h1>

        <!-- box -->
        <div class="box">
          <!-- text -->
          <p class="text">
            Os colaboradores das empresas parceiras a Fundação Carlos Alberto Vanzolini têm acesso a descontos exclusivos nos cursos de pós-graduação disponíveis, e assim continuar desenvolvendo seus potenciais.
            <br><br>
            Para mais informações, entre em contato pelo e-mail: <a href="mailto:convenios@poliusppro.com">convenios@poliusppro.com</a>
          </p>
        </div>
      </div>
    </section>
    
    <!-- footer -->
    <?php require('footer.php'); ?>

    <!-- javascript -->
    <script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/custom/js/internal.js"></script>

    <!-- function wordpress -->
    <?= wp_footer(); ?>
  </body>
</html>  