<section>
	<?php
if (isset($homeContent)) :
	if ($homeContent['hc_cat_show'] === "1") : ?>
		<div class="prod-home <?= $homeCatLayout ?>">
			<div class="container">
				<div class="wrapper">
					<?php
					// ID das Categorias
					$homeCatConfig = $homeContent['hc_cat_config'];

					if ($homeCatConfig === "1") :
                        $Read->ExeRead(TB_CATEGORIA, "WHERE cat_status = :st AND cat_parent IS NOT NULL ORDER BY cat_title ASC LIMIT 0, 8", "st=2");
						$homeCatItems = $Read->getResult();
					elseif ($homeCatConfig === "2") :
						$homeCatIds = $homeContent['hc_cat_ids'];
						if ($homeCatIds !== NULL) :
                            $Read->ExeRead(TB_CATEGORIA, "WHERE cat_status = :st AND cat_parent IS NOT NULL AND cat_id IN (" . $homeCatIds . ") ORDER BY field(cat_id," . $homeCatIds . ")", "st=2");
							$homeCatItems = $Read->getResult();
						endif;
					endif;

					if (isset($homeCatItems)) : ?>
						<?php
							switch($homeContent['hc_cat_theme']){
								case "1": include_once('doutor/layout/product-01/cat-home-01.php');
									break;
								case "2": include_once('doutor/layout/product-02/cat-home-02.php');
									break;
								case "3": include_once('doutor/layout/product-03/cat-home-03.php');
									break;
								default: include_once('doutor/layout/product-01/cat-home-01.php');
									break;
							}
					endif; ?>
				</div>
				<div class="clear"></div>
			</div>
		</div>
<?php endif;
endif;
?>
</section>