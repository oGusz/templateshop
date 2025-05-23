<?php if (WD_CART): ?>
  <div class="widget__cart">
    <a href="<?= RAIZ; ?>/carrinho" rel="nofollow" title="Carrinho de orçamento">
      <div class="widget__cart--btn">
        <i class="fa fa-shopping-cart"></i>
        <span class="j_contCart"></span> iten(s)
      </div>
    </a>
  </div>
  <div class="j_cartModal">
    <div class="alertCart j_message">
      <h2>ITEM ADICIONADO AO ORÇAMENTO</h2>
      <div class="row justify-content-center">
        <div class="col-4">
          <button class="btn j_closeBox" title="Continuar orçamento"><i class="fas fa-cart-arrow-down"></i> Continuar</button>
        </div>
        <div class="col-4">
          <a class="btn" rel="nofollow" href="<?= RAIZ; ?>/carrinho" title="Carrinho de orçamento"><i class="fas fa-shopping-cart"></i> Finalizar orçamento</a>
        </div>
      </div>
    </div>
  </div>
<? endif; ?>