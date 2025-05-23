<?php if (WD_BANNER) : ?>
	<?php
	$Read->ExeRead(TB_BANNER, "WHERE sl_status = :stats ORDER BY sl_order ASC", "stats=2");
	if ($Read->getResult()) : 
		$nImg = $Read->getRowCount(); ?>

		<div class="slick-banner slick-banner--sig hide-mobile" data-slick='{"dots": <?= ($nImg > 1) ? "true" : "false" ?>}'>
			<?php
			foreach ($Read->getResult() as $dados) :
				extract($dados); 
				switch($sl_theme){
					case "1": ?>
						<a class="slick-banner-sig" href="<?= RAIZ . '/' . $sl_url; ?>" title="<?= $sl_title; ?>">
							<img width="1920" height="700" src="<?= RAIZ; ?>/doutor/uploads/<?= $sl_file; ?>" alt="Imagem Ilustrativa de <?= $sl_title; ?>" title="<?= $sl_title; ?>">
						</a>
					<? break;
					case "2": ?>
						<div class="slick-banner-sig" style="--background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= RAIZ; ?>/doutor/uploads/<?= $sl_file; ?>')">
							<div>
								<h2 class="fs-42 white mb-0 fade fade-up"><?= $sl_title; ?></h2>
								<p class="fs-18 white fade fade-default"><?= $sl_description; ?></p>
								<a class="btn fade fade-down" href="<?=$url.$sl_url?>" title="<?= $sl_title; ?>">Saiba mais <i class="ml-2 fa-solid fa-arrow-up-right-from-square"></i></a>
							</div>
						</div>
					<? break;
					case "3": ?>
						<div class="slick-banner-sig" style="--background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= RAIZ; ?>/doutor/uploads/<?= $sl_file; ?>')">
							<div>
								<div class="row">
									<div class="col-8">
										<h2 class="fs-42 white mb-0 fade fade-left"><?= $sl_title; ?></h2>
										<p class="fs-18 white fade fade-left delay-750"><?= $sl_description; ?></p>
										<a class="btn fade fade-left delay-1000" href="<?=$url.$sl_url?>" title="<?= $sl_title; ?>">Saiba mais <i class="ml-2 fa-solid fa-arrow-up-right-from-square"></i></a>
									</div>
									<?php if($sl_thumb): ?>
										<div class="col-4">
											<img width="1920" height="700" class="slick-thumb fade fade-default delay-1250" src="<?= RAIZ; ?>/doutor/uploads/<?= $sl_thumb; ?>" alt="Imagem Ilustrativa de <?= $sl_title; ?>" title="<?= $sl_title; ?>">
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<? break;
					default:
						break;
				}	
			endforeach; ?>
		</div>
	<? endif;
endif; ?>