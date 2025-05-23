<section class="cta bg-primary-color">
  <div class="container">
    <div class="wrapper">
      <div class="row align-items-center">
        <div class="col-6">
          <h2 class="white">Dúvidas? Entre em contato conosco!</h2>
          <p class="white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          <div class="d-flex flex-wrap">
            <a class="btn btn--outline-white mr-16" href="<?= $url ?>contato" title="Solicitar contato por e-mail">Solicitar contato por e-mail <i class="fas fa-envelope"></i></a>
            <a class="btn btn--wpp" href="<?= wppLink($whatsapp) ?>" title="Solicitar contato por whatsapp" target="_blank">Solicitar contato por whatsapp <i class="fab fa-whatsapp"></i></a>
          </div>
        </div>
      </div>
      <div class="col-6">
        <?php // include('inc/form-html.php'); 
        ?>
      </div>
    </div>
  </div>
</section>