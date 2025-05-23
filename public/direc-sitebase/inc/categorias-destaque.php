<?php include_once('inc/vetKey.php') ?>
<section>
  <div class="container">
    <div class="wrapper">
      <h2>Categorias em destaque</h2>
      <?php if ($hibrido): ?>
        <div class="row">
          <?php
          // Itera apenas sobre as categorias pai de $vetProjetoBusca
          $key = 0;
          foreach ($vetProjetoBusca as $categoria):
            $key++
          ?>
            <div class="col-3 col-md-6 col-sm-6">
              <div class="card card--categorias card--home">
                <a class="card__link" href="<?= $url . $categoria['url'] ?>" title="<?= $categoria['key'] ?>">
                  <img width="300" height="300" class="card__cover" src="<?= $url ?>imagens/categorias/<?= $categoria['url'] ?>.webp" alt="<?= $categoria['key'] ?>" title="<?= $categoria['key'] ?>">
                  <h2 class="card__title"><?= $categoria['key'] ?></h2>
                </a>
              </div>
            </div>
            <?php if ($key >= 4):
              break;
            endif; ?>
          <?php endforeach; ?>
        </div>
      <?php elseif ($buscaone): ?>
        <div class="row">
          <?php
          $destaquesMPI = [
            array('mpiNum' => '0', 'image' => '01'),
            array('mpiNum' => '1', 'image' => '01'),
            array('mpiNum' => '2', 'image' => '01'),
            array('mpiNum' => '3', 'image' => '01'),
          ];
          $wrongIDs = array();
          foreach ($destaquesMPI as $key => $item) :
            $mpi = $vetKey[$item['mpiNum']];
            if ($mpi !== null) :
              $mpiTitle = $mpi['key'];
              $mpiUrl = $mpi['url'];
              $mpiImage = $item['image']; ?>
              <div class="col-3 col-md-6 col-sm-6">
                <div class="card card--categorias card--home">
                  <a class="card__link" href="<?= $url . $mpiUrl ?>" title="<?= $mpiTitle ?>">
                    <img width="300" height="300" class="card__cover" src="<?= $url ?>imagens/categorias/<?= $mpiUrl . "-" . $mpiImage ?>.webp" alt="Imagem ilustrativa de <?= $mpiTitle ?>" title="<?= $mpiTitle ?>" loading="lazy">
                    <h2 class="card__title"><?= $mpiTitle ?></h2>
                  </a>
                </div>
              </div>
          <?php else :
              array_push($wrongIDs, $item['mpiNum']);
            endif;
          endforeach; ?>
        </div>
        <?php
        if ($isLocalhost && count($vetKey) > 4):
          if (count($wrongIDs) > 0) :
            echo "<script> alert('Os seguintes IDs definidos para os destaques não foram encontrados:\\n\\n" . implode(", ", $wrongIDs) . "');</script>";
          endif;
          $mpiNums = array_column($destaquesMPI, 'mpiNum');
          $mpiNums = array_map('intval', $mpiNums);
          sort($mpiNums);
          if ($mpiNums == [0, 1, 2, 3]):
            echo "<script> alert('Verifique os produtos/serviços em destaque:\\n\\nContexto: Produtos/Serviços\\nImagens: Todas diferentes\\nVariedade: Palavras de produtos/serviços variados\\nSEO: Duas caldas longas e duas curtas');</script>";
          endif;
        endif;
        ?>
      <?php endif; ?>
    </div>
  </div>
</section>