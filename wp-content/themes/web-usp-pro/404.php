<!doctype html>
  <html lang="pt-BR">
    <head>
      <!-- metatags -->
      <?php require('head.php') ?>

      <!-- favicon-->
      <?php require('favicon.php') ?>

      <!-- stylesheet -->
      <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/custom/css/minify/404.css">

      <!-- function wordpress -->
      <?= wp_head(); ?>
    </head>
  <body>
    <!-- svg -->
    <?php require('svg.php'); ?>

    <!-- header -->
    <?php require('header.php'); ?>

    <!-- 404 -->
    <section class="s-404">
      <div class="container">
        <!-- image -->
        <img class="image" src="<?= get_template_directory_uri() ?>/assets/images/404/imagem.png" alt="404">

        <!-- title -->
        <h2 class="title">Erro 404</h2>

        <!-- text -->
        <p class="text">
          <strong>Não encontramos a página que procurava...</strong>
          <br><br>
          Tente pesquisar novamente ou volte para a home.
        </p>

        <!-- button -->
        <a href="<?= site_url() ?>" class="button">Voltar para a home</a>
      </div>
    </section>

    <!-- footer -->
    <?php require('footer.php'); ?>

    <!-- javascript -->
    <script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/custom/js/404.js"></script>
    
    <script defer type="text/javascript">
      var header = document.querySelector('.header');
      header.classList.toggle('internal');
    </script>

    <!-- function wordpress -->
    <?= wp_footer(); ?>
  </body>
</html>