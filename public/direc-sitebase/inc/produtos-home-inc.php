<section>
	<?php
	if (isset($homeContent)) :
		if ($homeContent['hc_prod_show'] === "1") : ?>
			<div class="prod-home <?= $homeProdLayout ?>">
				<div class="container">
					<div class="wrapper">
						<?php
					// ID do produto
						$homeProdConfig = $homeContent['hc_prod_config'];

						if ($homeProdConfig === "1") :
							$Read->ExeRead(TB_PRODUTO, "WHERE prod_status = :st ORDER BY prod_id DESC LIMIT 0, 8", "st=2");
							$homeProdItems = $Read->getResult();
						elseif ($homeProdConfig === "2") :
							$homeProdIds = $homeContent['hc_prod_ids'];
							if ($homeProdIds !== NULL) :
								$Read->ExeRead(TB_PRODUTO, "WHERE prod_status = :st AND prod_id IN (" . $homeProdIds . ") ORDER BY field(prod_id," . $homeProdIds . ")", "st=2");
								$homeProdItems = $Read->getResult();
							endif;
						endif;

						if (isset($homeProdItems)) : ?>
							<?php
							switch($homeContent['hc_prod_theme']){
								case "1": include('doutor/layout/product-01/product-home-01.php');
								break;
								case "2": include('doutor/layout/product-02/product-home-02.php');
								break;
								case "3": include('doutor/layout/product-03/product-home-03.php');
								break;
								default: include('doutor/layout/product-01/product-home-01.php');
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