<?php /** Template Name: documentation */ ?>
<!doctype html>
  <html lang="pt-BR">
    <head>
      <!-- metatags -->
      <?php require('head.php') ?>

      <!-- favicon-->
      <?php require('favicon.php') ?>

      <!-- stylesheet -->
      <link rel="preload" href="<?= get_template_directory_uri() ?>/custom/css/minify/documentation.css" as="style">
      <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/custom/css/minify/documentation.css">

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
        <h1 class="title">Documentação</h1>
      </div>
    </section>

    <!-- doc -->
    <section class="doc">
      <div class="container">
        <!-- title -->
        <h2 class="title">Confira a documentação necessária dentro de sua <br> categoria  para completar a inscrição :</h2>

        <!-- card -->
        <div class="card">
          <!-- title -->
          <h3 class="title">Sou brasileiro e conclui o ensino superior no Brasil</h3>

          <ul class="list">
            <li class="item">Registro Geral (RG) - Outros documentos de identidade não o substituem;</li>
            
            <li class="item">Cadastro de pessoa física (CPF) : A CNH, o RG que conste o número de CPF e a Carteira do Conselho Profissional substituem o CPF;</li>
            
            <li class="item">Diploma de curso superior (frente e verso).</li>
            
            <li class="item warning">Para candidatos recém- formados no curso superior, enviar o certificado de conclusão de curso e histórico escolar (ambos documentos com data de colação de grau). É considerado recém- formado o interessado que ainda não tem o diploma de curso superior porque colou grau no máximo dois anos antes do início do curso, </li>
          </ul>
        </div>

        <!-- card -->
        <div class="card">
          <!-- title -->
          <h3 class="title">Sou brasileiro mas conclui o curso superior no exterior</h3>

          <ul class="list">
            <li class="item">Registro Geral (RG) - Outros documentos de identidade não o substituem;</li>
            
            <li class="item">Cadastro de pessoa física (CPF) : A CNH, o RG que conste o número de CPF e a Carteira do Conselho Profissional substituem o CPF;</li>
            
            <li class="item">Diploma de curso superior (frente e verso);</li>
            
            <li class="item">Histórico escolar oficial assinado do curso superior;</li>

            <li class="item">Conteúdo programático do curso superior. </li>
          </ul>
        </div>

        <!-- card -->
        <div class="card">
          <!-- title -->
          <h3 class="title">Não sou brasileiro mas conclui o curso superior no Brasil</h3>

          <ul class="list">
            <li class="item">Passaporte e/ou o Registro Nacional de Estrangeiros. Na falta de um dos documentos, anexar o documento de identidade do seu país. </li>
            
            <li class="item">Diploma de curso superior (frente e verso); </li>
            
            <li class="item warning">Para candidatos recém- formados no curso superior, enviar o certificado de conclusão de curso e histórico escolar (ambos documentos com data de colação de grau). É considerado recém- formado o interessado que ainda não tem o diploma de curso superior porque colou grau no máximo dois anos antes do início do curso, </li>
          </ul>
        </div>

        <!-- card -->
        <div class="card">
          <!-- title -->
          <h3 class="title">Não sou brasileiro e conclui o curso superior fora do Brasil</h3>

          <ul class="list">
            <li class="item">Passaporte e/ou o Registro Nacional de Estrangeiros. Na falta de um dos documentos, anexar o documento de identidade do seu país. </li>
            
            <li class="item">Diploma de curso superior (frente e verso); </li>

            <li class="item">Histórico escolar oficial assinado do curso superior; </li>

            <li class="item">Conteúdo programático do curso superior. </li>
          </ul>
        </div>
      </div>
    </section>

    <!-- footer -->
    <?php require('footer.php'); ?>

    <!-- javascript -->
    <script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/custom/js/main.js"></script>

    <!-- function wordpress -->
    <?= wp_footer(); ?>
  </body>
</html>