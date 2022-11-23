<?php /** Template Name: about */ ?>
<!doctype html>
  <html lang="pt-BR">
    <head>
      <!-- metatags -->
      <?php require('head.php') ?>

      <!-- favicon-->
      <?php require('favicon.php') ?>

      <!-- stylesheet -->
      <link rel="preload" href="<?= get_template_directory_uri() ?>/custom/css/minify/about.css" as="style">
      <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/custom/css/minify/about.css">

      <!-- function wordpress -->
      <?= wp_head(); ?>
    </head>
  <body>
  
    <!-- svg -->
    <?php require('svg.php'); ?>

    <!-- header -->
    <?php require('header.php'); ?>

    <!-- banner -->
    <section class="banner">
      <div class="container">
        <!-- title -->
        <h1 class="title">Sobre nós</h1>
      </div>
    </section>

    <!-- about me -->
    <section class="aboutUs">
      <div class="container">
        <div class="poli">
          <!-- title -->
          <h2 class="title">A POLI USP PRO <span></span></h2>

          <!-- text -->
          <div class="text"><p>A POLI USP PRO é a pós-graduação lato sensu a distância (EAD) do <a href="https://pro.poli.usp.br/ " target="_blank">Departamento de Engenharia de Produção (PRO)</a> da Escola Politécnica da Universidade de São Paulo. Coordenada pelos professores do PRO, a POLI USP PRO oferece cursos de MBA e Especialização, proporcionando aos alunos uma experiência completa de ensino online, com possibilidade de networking, flexibilidade de horário e interação com professores e colegas em aulas ao vivo. <br>
          O corpo docente da POLI USP PRO é composto por professores da USP e profissionais renomados do mercado, possibilitando a troca de conhecimento entre profissionais da academia e do mundo corporativo com os alunos.</p></div>
        </div>

        <div class="pro">
          <div class="column">
            <div class="image">
              <img src="<?= site_url() ?>/wp-content/uploads/2022/11/sobre-o-pro.png" alt="Sobre o pro">
            </div>
          </div>

          <div class="column">
            <!-- title -->
            <h2 class="title">Sobre o PRO <span></span></h2>

            <!-- text -->
            <div class="text"><p>O <a href="https://pro.poli.usp.br/ " target="_blank">Departamento de Engenharia de Produção (PRO)</a> da Escola Politécnica (Poli) da USP foi criado no ano de 1963 e teve como primeiro chefe de departamento o professor Ruy Leme. Pioneiro desde a sua criação, o PRO teve como base temas relativos à Gestão Econômica da Produção, porém, ao longo do tempo agregou temas como Gestão de Operações e Logística, Projeto e Análise Organizacional, Gestão da Tecnologia, Planejamento e Projeto de Sistemas de Informações, Qualidade e Engenharia do Produto, além da própria sofisticação da área original de Economia da Produção. <br> Conheça também o <a href="https://ppgep.poli.usp.br/">PPGP - Pós Stricto Sensu Poli USP.</a></p></div>
            
            <span class="phrase">129 <span>anos de tradição</span></span>
          </div>
        </div>

        <div class="usp">
          <div class="column">
            <!-- title -->
            <h2 class="title">Sobre a Poli USP <span></span></h2>

            <!-- text -->
            <div class="text"><p>A Escola Politécnica da Universidade de São Paulo (Poli USP) é uma das escolas de engenharia mais antigas do país, sendo também uma das mais tradicionais instituições de ensino brasileiras, reunindo o prestígio de ter formado engenheiros que participaram de diversos momentos importantes da história do Brasil. Fundada em 1893, a então denominada Escola Politécnica de São Paulo foi incorporada à USP em 1934, hoje ela é referência nacional e considerada a mais completa faculdade de engenharia da América Latina.</p></div>
          </div>

          <div class="column">
            <div class="image">
              <img src="<?= site_url() ?>/wp-content/uploads/2022/11/sobre-a-poli-usp.png" alt="Sobre a Poli USP">
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- school -->
    <section class="school">
      <div class="container">
        <div class="column">
          <!-- text -->
          <div class="text first">
            <p>A Escola Politécnica tem se mantido, ao longo dos anos, na <strong>liderança acadêmica da engenharia nacional</strong>, com sua reputação certificada pelos principais organismos avaliadores independentes, nacionais e internacionais.</p>
          </div>
        </div>

        <!-- column -->
        <div class="column">
          <div class="text">
            <p>É a maior e mais importante Escola de Engenharia da América Latina, de acordo com o QS World University Rankings 2022</p>
          </div>

          <!-- image -->
          <div class="image">
            <img src="<?= site_url() ?>/wp-content/uploads/2022/11/selo-1.png" alt="selo 1">
          </div>
        </div>

        <!-- column -->
        <div class="column">
          <div class="text">
            <p>Detém a liderança regional na América Latina na área de Engenharia e Tecnologia (QS World University Rankings by Subject 2022) na grande maioria das especialidades da Engenharia</p>
          </div>

          <!-- image -->
          <div class="image">
            <img src="<?= site_url() ?>/wp-content/uploads/2022/11/selo-2.png" alt="selo 2">
          </div>
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