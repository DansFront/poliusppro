<!doctype html>
  <html lang="pt-BR">
    <head>
      <!-- metatags -->
      <?php require('head.php') ?>

      <!-- favicon-->
      <?php require('favicon.php') ?>

      <!-- stylesheet -->
      <link rel="preload" href="<?= get_template_directory_uri() ?>/custom/css/minify/taxonomy.css" as="style">
      <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/custom/css/minify/taxonomy.css">

      <!-- function wordpress -->
      <?= wp_head(); ?>
    </head>
  <body>
  
    <?php $term = get_queried_object(); ?>

    <!-- svg -->
    <?php require('svg.php'); ?>

    <!-- header -->
    <?php require('header-blog.php'); ?>

    <?php $result = $_GET['s']; ?>

    <!-- navegação -->
    <section class="nav-search">
      <div class="container">
        <!-- column -->
        <div class="column">
          <!-- title -->
          <h1 class="title">
            <?=  $term->name ?>
          </h1>
        </div>

        <!-- column -->
        <div class="column">
          <!-- form -->
          <form class="search" method="get" action="<?= site_url('blog/') ?>">
            <input type="text" placeholder="Buscar..." name="s">

            <button type="submit">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.7825 13.8337L12.6669 10.718C12.5263 10.5774 12.3357 10.4993 12.1357 10.4993H11.6263C12.4888 9.39613 13.0013 8.00861 13.0013 6.4992C13.0013 2.90851 10.092 -0.000915527 6.50138 -0.000915527C2.9108 -0.000915527 0.00146484 2.90851 0.00146484 6.4992C0.00146484 10.0899 2.9108 12.9993 6.50138 12.9993C8.01073 12.9993 9.39821 12.4868 10.5013 11.6243V12.1337C10.5013 12.3337 10.5794 12.5243 10.7201 12.6649L13.8356 15.7806C14.1294 16.0744 14.6044 16.0744 14.895 15.7806L15.7794 14.8962C16.0731 14.6025 16.0731 14.1275 15.7825 13.8337ZM6.50138 10.4993C4.29203 10.4993 2.50143 8.71174 2.50143 6.4992C2.50143 4.28979 4.28891 2.49913 6.50138 2.49913C8.71072 2.49913 10.5013 4.28666 10.5013 6.4992C10.5013 8.70862 8.71385 10.4993 6.50138 10.4993Z" fill="#5F6164"/>
              </svg>
            </button>
          </form>
        </div>

        <!-- filter -->
        <div class="filter">
          <a href="javascript:history.back()" class="btn-back-button">Voltar</a>
          
          <!-- total posts -->
          <?php global $wp_query; ?>
          <div class="results">Exibindo <?php echo $wp_query->found_posts; ?> resultados</div>
        </div>
      </div>
    </section>

    <?php if(have_posts()): ?>
      <section class="archive">
        <div class="container">
          <?php while(have_posts()): ?>
            <?php the_post(); ?>
            <article class="post" style="cursor: pointer;" onclick="window.open('<?= get_the_permalink(); ?>','_self')">
              <!-- image -->
              <div class="image">
                <!-- image -->
                <?= get_the_post_thumbnail( $post->ID, 'full' ); ?>

                <!-- category -->
                <div class="category">
                  <?php $slugs = get_the_terms($post->ID, 'categoria'); ?>
                  <?php if(!empty($slugs)): ?>
                    <?php foreach($slugs as $slug): ?>
                      <a href="<?= site_url('categoria/'.$slug->slug) ?>" style="color: #ffffff;"><?= $slug->name ?></a>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
              </div>

              <div class="box">
                <!-- usuário -->
                <div class="user">
                  <?= $user ?>
                  Por: <?= get_the_author(); ?>
                </div>

                <!-- calendário -->
                <div class="calendary">
                  <?= $calendary ?>
                  <?= get_the_date(); ?>
                </div>

                <!-- title -->
                <h2 class="title-box"><?= shortener(60, get_the_title()); ?>...</h2>

                <!-- text -->
                <div class="text"><?= shortener(160, get_the_excerpt()); ?>...</div>

                <!-- button -->
                <a href="<?= get_the_permalink(); ?>" class="button">Saiba mais</a>
              </div>
            </article>
          <?php endwhile; ?>
          <?php wpbeginner_numeric_posts_nav(); ?>
        </div>
      </section>
    <?php else: ?>
      <section class="not-found">
        <div class="container">
          <?= $not_found ?>
        </div>
      </section>
    <?php endif; ?>

    <!-- footer -->
    <?php require('footer.php'); ?>

    <!-- javascript -->
    <script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/custom/js/internal.js"></script>
    <script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/custom/js/post-relacionado.js"></script>

    <!-- function wordpress -->
    <?= wp_footer(); ?>
  </body>
</html>  