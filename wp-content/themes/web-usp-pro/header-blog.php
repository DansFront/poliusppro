<header class="header">
  <div class="container">
    <!-- logo -->
    <a href="<?= site_url('blog') ?>" class="logo" aria-label="POLI USP PRO Logo"></a>

    <!-- nav -->
    <nav class="nav">
      <ul class="list">
        <li class="item">
          <a href="<?= site_url() ?>" class="link">Home</a>
        </li>

        <li class="item">
          <a href="<?= site_url('sobre') ?>" class="link">Sobre</a>
        </li>

        <li class="item">
          <a href="/#cursos" class="link js-scroll">Cursos</a>
        </li>

        <li class="item">
          <a href="<?= site_url('parcerias') ?>" class="link">Parcerias</a>
        </li>

        <li class="item">
          <a href="<?= site_url('faq') ?>" class="link">FAQ</a>
        </li>

        <li class="item">
          <a href="<?= site_url('blog') ?>" class="link">Blog</a>
        </li>

        <li class="item">
          <a href="https://academico.poliusppro.com/Account/Login?ReturnUrl=%2f" target="_blank" class="button">
            <?= $userBlog ?>
            Login
          </a>
        </li> 
      </ul>
    </nav>

    <!-- hamburguer -->
    <button class="hamburguer" aria-label="botão para abrir e fechar menu mobile"></button>
  </div>
</header>