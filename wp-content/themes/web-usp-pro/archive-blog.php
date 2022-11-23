<!doctype html>
  <html lang="pt-BR">
    <head>
      <!-- metatags -->
      <?php require('head.php') ?>

      <!-- favicon-->
      <?php require('favicon.php') ?>

      <!-- stylesheet -->
      <link rel="preload" href="<?= get_template_directory_uri() ?>/custom/css/minify/archive-blog.css" as="style">
      <link rel="stylesheet" href="<?= get_template_directory_uri() ?>/custom/css/minify/archive-blog.css">

      <!-- function wordpress -->
      <?= wp_head(); ?>
    </head>
  <body>
  
    <!-- svg -->
    <?php require('svg.php'); ?>

    <!-- header -->
    <?php require('header-blog.php'); ?>

    <?php $result = $_GET['s']; ?>

    <?php if(empty($_GET['s'])): ?>

      <!-- post em destaque -->
      <?php
        $parameters = [
          'post_type' => 'blog',
          'posts_per_page' => '1',
          'order' => 'DESC',
        ];
        $query = new WP_Query($parameters);
      ?>
      <?php if( $query->have_posts() ): ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
          <main class="related-post">
            <div class="container">
              <!-- imagem -->
              <div class="image">
                <?= get_the_post_thumbnail( $post_id, 'full' ); ?>
              </div>

              <!-- caixa de conteúdo -->
              <div class="content-box">
                <!-- categoria -->
                <div class="category">
                  <?php $slugs = get_the_terms($post->ID, 'categoria'); ?>
                  <?php if(!empty($slugs)): ?>
                    <?php foreach($slugs as $slug): ?>
                      <span><a href="<?= site_url('categoria/'.$slug->slug) ?>" style="color: #ffffff;"><?= $slug->name ?></a></span>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>

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

                <!-- titulo -->
                <h1 class="title">
                  <?= get_the_title(); ?>
                </h1>
                
                <!-- Saiba mais -->
                <a href="<?= get_the_permalink(); ?>" class="button">Saiba mais</a>
              </div>
            </div>
          </main>
        <?php endwhile; ?>
        <?php wp_reset_query(); ?>
      <?php endif; ?>

      <div class="home-blog">
        <div class="container">
          <!-- mais posts -->
          <?php
            $parameters = [
              'post_type' => 'blog',
              'posts_per_page' => '5',
              'order' => 'DESC',
            ];
            $query = new WP_Query($parameters);
          ?>
          <?php if( $query->have_posts() ): ?>
            <?php $key = 0; ?>
              <section class="more-posts">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php if($key != 0): ?>
                  <!-- post -->
                  <article class="post" style="cursor: pointer;" onclick="window.open('<?= get_the_permalink(); ?>','_self')">
                    <!-- imagem -->
                    <div class="image">
                      <?= get_the_post_thumbnail( $post_id, 'full' ); ?>
                      <!-- categoria -->
                      <div class="category">
                        <?php $slugs = get_the_terms($post->ID, 'categoria'); ?>
                        <?php if(!empty($slugs)): ?>
                          <?php foreach($slugs as $slug): ?>
                            <span><a href="<?= site_url('categoria/'.$slug->slug) ?>" style="color: #ffffff;"><?= $slug->name ?></a></span>
                          <?php endforeach; ?>
                        <?php endif; ?>
                      </div>
                    </div>

                    <!-- caixa de conteúdo -->
                    <div class="content-box">
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

                      <!-- titulo -->
                      <h2 class="title">
                        <?= get_the_title(); ?>
                      </h2>
                      
                      <!-- Saiba mais -->
                      <a href="<?= get_the_permalink(); ?>" class="button">Saiba mais</a>
                    </div>
                  </article>
                <?php endif; ?>
                <?php $key = $key + 1; ?>
                <?php endwhile; ?>
              </section>
            <?php wp_reset_query(); ?>
          <?php endif; ?>

          <!-- mais lidas -->
          <?php
           $terms = get_terms(
            array(
              'taxonomy'   => 'categoria',
              'hide_empty' => true,
              'hierarchical' => false,
              'order' => 'DESC'
              /* 'parent' => 0, */
              )
            );
          ?>
          <?php if(!empty($terms)): ?>
            <!-- mais lidas -->
            <aside class="most-read">
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
              
              <!-- title -->
              <h2 class="title">Categorias</h2>

              <!-- list -->
              <ul>
                <?php foreach($terms as $term): ?>
                  <li>
                    <a href="<?= site_url('categoria/' . $term->slug) ?>" class="link">
                      <?= $term->name ?> (<?= $term->count ?>)
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </aside>
          <?php endif; ?>

          <!-- siga nos -->
          <setion class="follow-us">
            <!-- titulo -->
            <h2 class="title">Siga-nos</h2>

            <!-- row -->
            <div class="row">
              <!-- instagram -->
              <a href="https://www.instagram.com/poliusppro/" class="button instagram">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12.0027 5.8467C8.59743 5.8467 5.85075 8.594 5.85075 12C5.85075 15.406 8.59743 18.1533 12.0027 18.1533C15.4079 18.1533 18.1546 15.406 18.1546 12C18.1546 8.594 15.4079 5.8467 12.0027 5.8467ZM12.0027 16.0004C9.80212 16.0004 8.00312 14.2064 8.00312 12C8.00312 9.7936 9.79677 7.99955 12.0027 7.99955C14.2086 7.99955 16.0022 9.7936 16.0022 12C16.0022 14.2064 14.2032 16.0004 12.0027 16.0004ZM19.8412 5.595C19.8412 6.39295 19.1987 7.03024 18.4062 7.03024C17.6085 7.03024 16.9713 6.38759 16.9713 5.595C16.9713 4.80241 17.6138 4.15977 18.4062 4.15977C19.1987 4.15977 19.8412 4.80241 19.8412 5.595ZM23.9157 7.05166C23.8247 5.12909 23.3856 3.42608 21.9775 2.02298C20.5747 0.619882 18.8721 0.180743 16.9499 0.0843468C14.9689 -0.0281156 9.03112 -0.0281156 7.05008 0.0843468C5.1333 0.175388 3.43068 0.614526 2.02253 2.01763C0.614389 3.42073 0.180703 5.12373 0.0843279 7.0463C-0.0281093 9.02778 -0.0281093 14.9669 0.0843279 16.9483C0.175349 18.8709 0.614389 20.5739 2.02253 21.977C3.43068 23.3801 5.12794 23.8193 7.05008 23.9157C9.03112 24.0281 14.9689 24.0281 16.9499 23.9157C18.8721 23.8246 20.5747 23.3855 21.9775 21.977C23.3803 20.5739 23.8193 18.8709 23.9157 16.9483C24.0281 14.9669 24.0281 9.03314 23.9157 7.05166ZM21.3564 19.0744C20.9388 20.1241 20.1303 20.9327 19.0755 21.3558C17.496 21.9824 13.7481 21.8378 12.0027 21.8378C10.2572 21.8378 6.50396 21.977 4.92984 21.3558C3.88042 20.9381 3.07195 20.1294 2.64897 19.0744C2.02253 17.4946 2.16709 13.7458 2.16709 12C2.16709 10.2542 2.02789 6.50006 2.64897 4.92558C3.06659 3.87593 3.87507 3.06728 4.92984 2.6442C6.50931 2.01763 10.2572 2.16222 12.0027 2.16222C13.7481 2.16222 17.5014 2.02298 19.0755 2.6442C20.1249 3.06192 20.9334 3.87058 21.3564 4.92558C21.9828 6.50541 21.8383 10.2542 21.8383 12C21.8383 13.7458 21.9828 17.4999 21.3564 19.0744Z"/>
                </svg>
              </a>

              <!-- twitter -->
              <a href="https://twitter.com/poliusppro" class="button twitter">
                <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M21.533 4.98436C21.5482 5.2031 21.5482 5.42188 21.5482 5.64062C21.5482 12.3125 16.599 20 7.55331 20C4.76649 20 2.17767 19.1718 0 17.7344C0.395954 17.7812 0.776626 17.7969 1.18781 17.7969C3.48727 17.7969 5.60405 17 7.29442 15.6406C5.13198 15.5938 3.31979 14.1406 2.69541 12.1406C3 12.1875 3.30455 12.2187 3.62438 12.2187C4.06599 12.2187 4.50765 12.1562 4.91879 12.0469C2.66499 11.5781 0.974579 9.54687 0.974579 7.09374V7.03126C1.62938 7.40627 2.39086 7.64064 3.19791 7.67185C1.87303 6.76558 1.00505 5.21873 1.00505 3.46871C1.00505 2.53123 1.24866 1.67186 1.67508 0.921852C4.09641 3.98435 7.73603 5.98432 11.8172 6.2031C11.7411 5.8281 11.6954 5.43752 11.6954 5.04688C11.6954 2.2656 13.8883 0 16.6142 0C18.0304 0 19.3096 0.609373 20.2081 1.59375C21.3197 1.37501 22.3857 0.953114 23.3299 0.375003C22.9644 1.5469 22.1877 2.53128 21.1675 3.15624C22.1573 3.04691 23.1167 2.7656 23.9999 2.37502C23.33 3.37498 22.4924 4.26557 21.533 4.98436Z"/>
                </svg>
              </a>

              <!-- youtube -->
              <a href="https://www.youtube.com/channel/UCi9Sqyk0LVHIrRggNb4KKPQ" class="button youtube">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M23.4985 5.81639C23.2225 4.7078 22.4092 3.8347 21.3766 3.53841C19.505 3 12 3 12 3C12 3 4.49503 3 2.62336 3.53841C1.59077 3.83475 0.777523 4.7078 0.501503 5.81639C0 7.82578 0 12.0182 0 12.0182C0 12.0182 0 16.2106 0.501503 18.22C0.777523 19.3286 1.59077 20.1653 2.62336 20.4616C4.49503 21 12 21 12 21C12 21 19.505 21 21.3766 20.4616C22.4092 20.1653 23.2225 19.3286 23.4985 18.22C24 16.2106 24 12.0182 24 12.0182C24 12.0182 24 7.82578 23.4985 5.81639ZM9.54544 15.8246V8.2118L15.8181 12.0183L9.54544 15.8246Z"/>
                </svg>
              </a>

              <!-- linkedin -->
              <a href="https://www.linkedin.com/company/poliusppro" class="button linkedin">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.37214 24H0.396429V7.97643H5.37214V24ZM2.88161 5.79066C1.29054 5.79066 0 4.47278 0 2.88167C1.13882e-08 2.1174 0.303597 1.38444 0.844003 0.844022C1.38441 0.303604 2.11736 0 2.88161 0C3.64586 0 4.3788 0.303604 4.91921 0.844022C5.45962 1.38444 5.76321 2.1174 5.76321 2.88167C5.76321 4.47278 4.47214 5.79066 2.88161 5.79066ZM23.9946 24H19.0296V16.1998C19.0296 14.3409 18.9921 11.9569 16.4427 11.9569C13.8557 11.9569 13.4593 13.9766 13.4593 16.0659V24H8.48893V7.97643H13.2611V10.1622H13.3307C13.995 8.90323 15.6177 7.57463 18.0386 7.57463C23.0743 7.57463 24 10.8908 24 15.198V24H23.9946Z"/>
                </svg>
              </a>

              <!-- facebook -->
              <a href="https://www.facebook.com/poliusppro" class="button facebook">
                <svg width="14" height="24" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.0826 13.5L13.8085 9.15656H9.26935V6.33797C9.26935 5.14969 9.90344 3.99141 11.9364 3.99141H14V0.293438C14 0.293438 12.1273 0 10.3369 0C6.59872 0 4.15528 2.08031 4.15528 5.84625V9.15656H0V13.5H4.15528V24H9.26935V13.5H13.0826Z"/>
                </svg>
              </a>
            </div>
          </setion>

          <!-- Mais populares -->
          <?php
            $parameters = [
              'post_type' => 'blog',
              'posts_per_page'      => 8,                 // Máximo de 5 artigos
              'orderby'             => 'meta_value_num',  // Ordena pelo valor da post meta
              'meta_key'            => 'post_views_count', // A nossa post meta
              'order'               => 'DESC'             // Ordem decrescente
            ];
            $query = new WP_Query($parameters);
          ?>
          <?php if( $query->have_posts() ): ?>
            <section class="more-popular">
              <!-- titulo da sessão -->
              <h2 class="title">Mais lidas</h2>

              <!-- row -->
              <div class="row">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                  <!-- post -->
                  <article class="post" style="cursor: pointer;" onclick="window.open('<?= get_the_permalink(); ?>','_self')">
                    <!-- imagem -->
                    <div class="image">
                      <?= get_the_post_thumbnail( $post_id, 'full' ); ?>
                    </div>

                    <!-- titulo -->
                    <h2 class="title-post">
                      <?= get_the_title(); ?>
                    </h2>
                  </article>
                <?php endwhile; ?>
              </div>
            </section>
          <?php wp_reset_query(); ?>
          <?php endif; ?>

          <!-- trending -->
          <!-- <section class="trending"> -->
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
          </section> -->
          
          <!-- POLI USP -->
          <?php
            $parameters = [
              'post_type' => 'blog',
              'posts_per_page' => '3',
              'tax_query'     => array(
                array(
                  'taxonomy' => 'categoria',
                  'field'    => 'slug',
                  'terms'    => 'poli-usp-pro',
                  'orderby'  => 'term_order',
                  'include_children' => false
                ),
              ),
            ];
            $query = new WP_Query($parameters);
          ?>
          <?php if( $query->have_posts() ): ?>
            <section class="poliusp">
              <!-- titulo -->
              <h2 class="title">Poli USP Pro</h2>

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
                            <span><a href="<?= site_url('categoria/'.$slug->slug) ?>" style="color: #ffffff;"><?= $slug->name ?></a></span>
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
            </section>
            <?php wp_reset_query(); ?>
          <?php endif; ?>
        </div>
      </div>

    <?php else: ?>

      <!-- navegação -->
      <section class="nav-search">
        <div class="container">
          <!-- column -->
          <div class="column">
            <!-- breadcrumb -->
            <div class="breadcrumb">
              <span>Início</span>
                <!-- svg -->
                <span>
                  <svg width="5" height="8" viewBox="0 0 5 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.90755 4.21247L1.05757 7.91189C0.934304 8.02937 0.734986 8.02937 0.611723 7.91189L0.0924469 7.41697C-0.0308156 7.29948 -0.0308156 7.10951 0.0924469 6.99203L3.20024 4L0.0924469 1.00797C-0.0308156 0.890486 -0.0308156 0.700516 0.0924469 0.583034L0.611723 0.0881112C0.734986 -0.0293704 0.934304 -0.0293704 1.05757 0.0881112L4.90755 3.78753C5.03082 3.90501 5.03082 4.09499 4.90755 4.21247Z" fill="#5F6164"/>
                  </svg>
                </span>
              <span>
                Buscar
              </span>
            </div>

            <!-- title -->
            <h2 class="title">
              Buscar
            </h2>
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
            <?php if(!empty($_GET['s'])): ?>
              <!-- title -->
              <h2 class="title-result">
                Resultados para: <span> <?= $result ?></span>
              </h2>

              <!-- total posts -->
              <?php if(have_posts()): ?>
                <?php global $wp_query; ?>
                <span>
                  <div class="results">Exibindo <?php echo $wp_query->found_posts; ?> resultados</div>
                </span>
              <?php else: ?>
                <span style="margin: unset;">
                  <div class="results">Exibindo <?php echo $wp_query->found_posts; ?> resultados</div>
                </span>
              <?php endif; ?>
            <?php else: ?>
            
              <!-- total posts -->
              <?php global $wp_query; ?>
              <div class="results">Exibindo <?php echo $wp_query->found_posts; ?> resultados</div>
            <?php endif; ?>
          </div>
        </div>
      </section>

      <?php if(have_posts()): ?>
        <section class="archive" style="cursor: pointer;" onclick="window.open('<?= get_the_permalink(); ?>','_self')">
          <div class="container">
            <?php while(have_posts()): ?>
              <?php the_post(); ?>
              <article class="post">
                <!-- image -->
                <div class="image">
                  <!-- image -->
                  <?= get_the_post_thumbnail( $post_id, 'full' ); ?>

                  <!-- category -->
                  <div class="category">
                    <?php $slugs = get_the_terms($post->ID, 'categoria'); ?>
                    <?php if(!empty($slugs)): ?>
                      <?php foreach($slugs as $slug): ?>
                        <span><a href="<?= site_url('categoria/'.$slug->slug) ?>" style="color: #ffffff;"><?= $slug->name ?></a></span>
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
    <?php endif; ?>

    <!-- footer -->
    <?php require('footer.php'); ?>

    <!-- javascript -->
    <script defer type="text/javascript" src="<?= get_template_directory_uri() ?>/custom/js/internal.js"></script>

    <!-- function wordpress -->
    <?= wp_footer(); ?>
  </body>
</html>  