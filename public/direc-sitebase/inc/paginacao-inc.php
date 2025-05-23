<div class="wrapper">
  <?php
  // paginacao
  $PerPage = filter_input(INPUT_GET, 'perpage', FILTER_VALIDATE_INT);
  $PerPage = (!empty($PerPage) || isset($PerPage) ? $PerPage : MIN_PER_PAGE);
  $Page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
  $Pager = new Pager(RAIZ . Check::AmmountURL($URL) . "&perpage={$PerPage}&page=");
  $Pager->ExePager($Page, $PerPage);

  // tags
  $Read = new Read();
  $Read->ExeRead(TB_PRODUTO, "prod_keywords WHERE prod_status = :st", "st=2");

  $tags = [];
  if ($Read->getResult()) {
    foreach ($Read->getResult() as $produto) {
      $keywords = explode(",", $produto['prod_keywords']);
      foreach ($keywords as $keyword) {
        $keyword = trim($keyword);
        if (!empty($keyword) && !in_array($keyword, $tags)) {
          $tags[] = $keyword;
        }
      }
    }
  }
  sort($tags);
  ?>
  <div class="row">
    <!-- <div class="col-4">
    <form class="form__pages">
      <select id="tag-filter">
        <option value="">Filtrar por tags</option>
        <?php foreach ($tags as $tag) : ?>
          <option value="<?= htmlspecialchars($tag) ?>"><?= htmlspecialchars($tag) ?></option>
        <?php endforeach; ?>
      </select>
    </form>
  </div> -->
    <div class="col-9">
      <form class="form__pages" method="post">
        <div class="search__pages">
          <input type="search" name="busca" placeholder="Pesquisar..." required>
          <button type="submit" name="pesquisar" value="Pesquisar"><i class="fa fa-search"></i></button>
        </div>
      </form>
    </div>
    <div class="col-3">
      <form class="form__pages">
        <div class="view__pages">
          <label>Exibir</label>

          <select name="PerPage" class="j_change" data-url="<?= RAIZ . Check::AmmountURL($URL); ?>">
            <?php for ($mult = 1; $mult <= MULTIPLO_PAGE; $mult++): ?>
              <option value="<?= $mult * MIN_PER_PAGE; ?>" <?php if (isset($PerPage) && $PerPage == ($mult * MIN_PER_PAGE)): echo 'selected="selected"';
                                                            endif; ?>><?= $mult * MIN_PER_PAGE; ?></option>
            <?php endfor; ?>
          </select>

          <label>Por página</label>
        </div>
      </form>
    </div>
  </div>
  <!-- <script>
  $(document).ready(function() {
    $('#tag-filter').on('change', function() {
      var selectedTag = $(this).val().toLowerCase().replace(/\s+/g, '+');

      $('.card .card__category a').each(function() {
        var tags = $(this).data('tag');
        var $parentElement = $(this).closest('.col-3');
        if (selectedTag === '' || tags.includes(selectedTag)) {
          $parentElement.removeClass('hidden');
        } else {
          $parentElement.addClass('hidden');
        }
      });
    });
  });
</script> -->
</div>