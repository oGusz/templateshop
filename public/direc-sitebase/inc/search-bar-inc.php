<?php if (WD_SEARCH): ?>
  <button class="searchIcon j_searchIcon">
    <span>Pesquisar</span>
    <i class="fa fa-search" aria-hidden="true"></i>
  </button>
  <div class="searchModal j_searchModal">
    <div class="widget__search">
      <form method="post" enctype="multipart/form-data" class="search">
        <input type="search" name="busca" placeholder="Digite aqui o que procura..." required>
        <div class="search__buttons">
          <button><i class="j_searchClose fas fa-search" aria-hidden="true"></i></button>
          <span class="j_searchClose"><i class="fas fa-close" aria-hidden="true"></i></span>
        </div>
      </form>
    </div>
  </div>
<?php endif; ?>