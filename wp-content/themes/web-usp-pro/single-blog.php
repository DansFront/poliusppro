<!doctype html>
  <html lang="pt-BR">
    <head>
      <!-- metatags -->
      <?php require('head.php') ?>

      <!-- favicon-->
      <?php require('favicon.php') ?>

      <!-- stylesheet -->
      <link rel="preload" href="<?= get_template_directory_uri() ?>/custom/css/minify/single-blog.css" as="style">
      <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/custom/css/minify/single-blog.css">

      <!-- function wordpress -->
      <?= wp_head(); ?>
    </head>
  <body>
  
    <!-- svg -->
    <?php require('svg.php'); ?>

    <!-- header -->
    <?php require('header-blog.php'); ?>

    <?php if(have_posts()): while(have_posts()): the_post(); ?>

      <!-- banner -->
      <section class="banner">
        <?= get_the_post_thumbnail( $post_id, 'full' ); ?>
      </section>

      <!-- row -->
      <div class="back-button">
        <div class="container">
          <a href="javascript:history.back()" class="btn-back-button">Voltar</a>
        </div>
      </div>

      <!-- single -->
      <section class="single">
        <div class="container">
          <div class="column">
            <!-- principal -->
            <main>
              <!-- titulo -->
              <h1 class="title"><?= get_the_title(); ?></h1>

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

              <!-- texto -->
              <div class="text">
                <?= the_content(); ?>
              </div>
            </main>

            <div class="row">
              <a href="javascript:history.back()" class="btn-back-button">Voltar</a>

              <!-- compartilhe -->
              <div class="share">
                <!-- titulo -->
                <span class="title">Compartilhe</span>

                <!-- whatsapp -->
                <a href="https://api.whatsapp.com/send?text=<?= get_the_permalink(); ?>" aria-label="whatsapp" target="_blank" class="social" style="background-color: #00A884;"><?= $whatsapp ?></a>

                <!-- twitter -->
                <a href="https://twitter.com/intent/tweet?url=<?= get_the_permalink(); ?>&text=<?= get_the_title(); ?>=&hashtags=" aria-label="Twitter" target="_blank" class="social" style="background-color: #1da1f2;"><?= $twitter ?></a>

                <!-- linkedin -->
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= get_the_permalink(); ?>&title=<?= get_the_title(); ?>&summary=&source=" aria-label="Linkedin" target="_blank" class="social" style="background-color: #0077b5;"><?= $linkedin ?></a>

                <!-- facebook -->
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= get_the_permalink(); ?>" aria-label="Facebook" target="_blank" class="social" style="background-color: #3b5998;"><?= $facebook ?></a>
              </div>
            </div>

            <!-- trending -->
            <!-- <div class="trending"> -->
              <!-- titulo -->
              <!-- <h2 class="title">Trending</h2> -->

              <!-- list -->
              <!-- <ul class="list">
                <li><span class="link">Escrita</span></li>
                <li><span class="link">Auto-aperfeiçoamento</span></li>
                <li><span class="link">Jornal</span></li>
                <li><span class="link">Saúde Mental</span></li>
                <li><span class="link">Produtividade</span></li>
                <li><span class="link">Lições de Vida</span></li>
                <li><span class="link">Vida</span></li>
                <li><span class="link">Desenvolvimento Pessoal</span></li>
                <li><span class="link">Autoconsciência</span></li>
              </ul>
            </div>-->
          </div> 

          <div class="column">
            <!-- search -->
            <div class="search">
              <!-- title -->
              <h2 class="title">Buscar</h2>

              <!-- form -->
              <form class="input" method="get" action="<?= site_url('blog/') ?>">
                <input type="text" placeholder="Buscar..." name="s">

                <button type="submit">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.7825 13.8337L12.6669 10.718C12.5263 10.5774 12.3357 10.4993 12.1357 10.4993H11.6263C12.4888 9.39613 13.0013 8.00861 13.0013 6.4992C13.0013 2.90851 10.092 -0.000915527 6.50138 -0.000915527C2.9108 -0.000915527 0.00146484 2.90851 0.00146484 6.4992C0.00146484 10.0899 2.9108 12.9993 6.50138 12.9993C8.01073 12.9993 9.39821 12.4868 10.5013 11.6243V12.1337C10.5013 12.3337 10.5794 12.5243 10.7201 12.6649L13.8356 15.7806C14.1294 16.0744 14.6044 16.0744 14.895 15.7806L15.7794 14.8962C16.0731 14.6025 16.0731 14.1275 15.7825 13.8337ZM6.50138 10.4993C4.29203 10.4993 2.50143 8.71174 2.50143 6.4992C2.50143 4.28979 4.28891 2.49913 6.50138 2.49913C8.71072 2.49913 10.5013 4.28666 10.5013 6.4992C10.5013 8.70862 8.71385 10.4993 6.50138 10.4993Z" fill="#5F6164"/>
                  </svg>
                </button>
              </form>
            </div>
          
            <!-- mais lidas -->
            <?php
              $parameters = [
                'post_type' => 'blog',
                'posts_per_page'      => 6,                 // Máximo de 5 artigos
                'orderby'             => 'meta_value_num',  // Ordena pelo valor da post meta
                'meta_key'            => 'post_views_count', // A nossa post meta
                'order'               => 'DESC'             // Ordem decrescente
              ];
              $query = new WP_Query($parameters);
            ?>
            <?php if( $query->have_posts() ): ?>
              <!-- mais lidas -->
              <aside class="most-read">
                <!-- title -->
                <h2 class="title">Mais lidas</h2>

                <!-- post -->
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                  <article class="post" style="cursor: pointer;" onclick="window.open('<?= get_the_permalink(); ?>','_self')">
                    <!-- imagem -->
                    <div class="image">
                      <?= get_the_post_thumbnail( $post_id, 'full' ); ?>
                    </div>

                    <!-- caixa -->
                    <div class="content-box">
                      <!-- categoria -->
                      <div class="category">
                        <?php $slugs = get_the_terms($post->ID, 'categoria'); ?>
                        <?php if(!empty($slugs)): ?>
                          <?php foreach($slugs as $slug): ?>
                            <a href="<?= site_url('categoria/'.$slug->slug) ?>" style="color: #ffffff;"><?= $slug->name ?></a>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </div>

                      <!-- titulo -->
                      <h3 class="title-post">
                        <?= get_the_title(); ?>
                      </h3>
                    </div>
                  </article>
                <?php endwhile; ?>
              </aside>
            <?php wp_reset_query(); ?>
            <?php endif; ?>
          </div>
        </div>
      </section>


      <!-- POLI USP -->
      <?php
        $terms = get_the_terms( $post->ID, 'categoria' );

        $parameters = [
          'post_type' => 'blog',
          'posts_per_page' => '3',
          'post__not_in' => [get_the_ID()],
          'tax_query'     => array(
            array(
              'taxonomy' => 'categoria',
              'field'    => 'slug',
              'terms'    =>  array($terms[0]->slug),
              'orderby'  => 'term_order',
            ),
          ),
        ];
        $query = new WP_Query($parameters);
      ?>
      <?php if( $query->have_posts() ): ?>
        <section class="poliusp">
          <div class="container">
            <!-- titulo -->
            <h2 class="title">Posts relacionados</h2>

            <!-- row -->
            <div class="row">
              <?php while ($query->have_posts()) : $query->the_post(); ?>
                <article class="post" style="cursor: pointer;" onclick="window.open('<?= get_the_permalink(); ?>','_self')">
                  <!-- image -->
                  <div class="image">
                    <!-- image -->
                    <?= get_the_post_thumbnail( $post_id, 'full' ); ?>

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
            </div>
          </div>
        </section>
        <?php wp_reset_query(); ?>
      <?php endif; ?>

    <?php endwhile; endif; ?>

    <!-- footer -->
    <?php require('footer.php'); ?>

    <!-- javascript -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/custom/js/internal.js"></script>

    <!-- function wordpress -->
    <?= wp_footer(); ?>
  </body>
</html>  