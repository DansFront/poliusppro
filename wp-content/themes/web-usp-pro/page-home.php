<?php /** Template Name: home */ ?>
<!doctype html>
  <html lang="pt-BR">
    <head>
      <!-- metatags -->
      <?php require('head.php') ?>

      <!-- favicon-->
      <?php require('favicon.php') ?>

      <!-- stylesheet -->
      <link rel="preload" href="<?= get_template_directory_uri() ?>/custom/css/minify/home.css" as="style">
      <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/custom/css/minify/home.css">

      <!-- function wordpress -->
      <?= wp_head(); ?>
    </head>
  <body>
  
    <!-- svg -->
    <?php require('svg.php'); ?>

    <!-- header -->
    <?php require('header.php'); ?>

    <section class="banner">
      <div class="container">
        <!-- subtitle -->
        <h2 class="subtitle">Cursos de pós-graduação Lato Sensu</h2>

        <!-- title -->
        <h1 class="title">A qualidade <br> POLI USP 100% digital</h1>

        <!-- text -->
        <p class="text">A tradição e credibilidade da <br> Escola Politécnicada USP, <br> agora com aulas online e ao vivo.</p>

        <!-- button -->
        <a href="#cursos" class="button">Confira nossos cursos</a>
      </div>
    </section>

    <!-- course -->
    <section class="course">
      <div class="container">
        <!-- title -->
        <h2 class="title-s"><span>Pós-graduação Lato Sensu</span></h2>

        <!-- text -->
        <h3 class="text-s">Especialização e MBA</h3>
        
        <div class="row">
          <!-- card -->
          <div class="card">
            <!-- icon -->
            <div class="icon"><img src="<?= get_template_directory_uri() ?>/assets/images/icone-ceqp.png" alt=""></div>
            
            <!-- subtitle -->
            <h4 class="subtitle">Especialização</h4>
            
            <!-- title -->
            <h5 class="title">Qualidade e Produtividade <br> (CEQP)</h5>
            
            <!-- data -->
            <span class="data">
              <?= $calendary ?>
              Início das aulas: 26/10/2022
            </span>

            <!-- price -->
            <p class="price">
              <span>R$ 890</span>
              18x &nbsp<strong>R$ 690</strong>
            </p>

            <!-- button -->
            <a href="#" class="button">Saiba mais</a>

            <!-- usp -->
            <?= $certUspCard ?>
          </div>

          <!-- box -->
          <div class="box">
            <span>
              <!-- title -->
              <h4 class="title">“ Melhor escola de <br> engenharia da <br> América Latina ”</h4>

              <!-- text -->
              <p class="text">segundo o Times Higher Education</p>
            </span>
          </div>
        </div>
      </div>
    </section>

    <!-- about-us -->
    <section class="aboutUs">
      <div class="container">
        <div class="column">
          <!-- title -->
          <h2 class="title">Conheça a <br> POLI USP PRO</h2>

          <!-- text -->
          <p class="text">Cursos de pós-graduação Lato sensu a distância, <br> coordenados por professores do Departamento <br> de Engenharia de Produção (PRO) da Escola <br> Politécnica (POLI) da USP.</p>
        </div>

        <div class="column iframe">
          <!-- iframe -->
          <iframe src="https://www.youtube.com/embed/pSkB2XhhLTc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </section>

    <!-- data -->
    <section class="data-s">
      <div class="container">
        <div class="column">
          <!-- image -->
          <div class="image">
            <img src="<?= site_url() ?>/wp-content/uploads/2022/11/imagens-poli.png" alt="Poli Usp">
          </div>
        </div>

        <div class="column">
          <!-- list -->
          <ul class="list">
            <li class="item">
              <span>1º</span>
              <h2>curso de <br> Engenharia de <br> Produção do país</h2>
              <p>fundado em 1958.</p>
            </li>

            <li class="item">
              <span>832</span>
              <h2>Produções científica <br> nacionais</h2>
            </li>

            <li class="item">
              <span>112</span>
              <h2>convênios <br> internacionais <br> vigentes</h2>
            </li>

            <li class="item">
              <span>1º</span>
              <h2>programa de <br> mestrado e <br> doutorado no país.</h2>
            </li>
          </ul>

          <a href="#" class="button">Saiba mais sobre a POLI USP</a>
        </div>
      </div>
    </section>

    <!-- contact -->
    <?php // require('contact.php'); ?>

    <!-- footer -->
    <?php require('footer.php'); ?>

    <!-- javascript -->
    <script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/custom/js/main.js"></script>

	  
    <!-- function wordpress -->
    <?= wp_footer(); ?>
    
  </body>
</html>
