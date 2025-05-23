<!-- DEFAULT GALLERY -->

<?php

if ($Read->getResult()) :
	if (WD_GALLERY_DEFAULT) : ?>
		<div class="prod-inc-default-gallery">
			<div class="row">
				<?php
				foreach ($Read->getResult() as $gallery) :
					extract($gallery); ?>
					<div class="col-2 col-sm-2 col-xs-6">
						<div class="gallery__item">
							<a href="<?= RAIZ . '/doutor/uploads/' . $gallery_file; ?>" title="<?= $prod_title; ?>" data-fancybox="group1" data-caption="<?= $prod_title ?>" class="lightbox fancy-card-overlay fancy-card-overlay--plus">
								<img width="300" height="300" src="<?= RAIZ . '/doutor/uploads/' . $gallery_file; ?>" alt="<?= $prod_title; ?>" title="<?= $prod_title; ?>">
							</a>
						</div>
					</div>
				<?php
				endforeach; ?>
			</div>
		</div>

	<?php elseif (WD_GALLERY_CUSTOM) : ?>
		<div class="prod-inc-custom-gallery">
			<div class="gallery__nav<?= $nImg < 6 ? ' slick-gallery-align' : '' ?>" data-slick='{"slidesToShow": <?= ($nImg >= 6) ? "6" : $nImg ?>, "arrows": <?= ($nImg > 6) ? "true" : "false" ?>}'>
				<div class="gallery__item fancy-card-overlay fancy-card-overlay--plus">
					<img width="148" height="148" src="<?= RAIZ . '/doutor/uploads/' . $prod_cover; ?>" alt="<?= $prod_title; ?>" title="<?= $prod_title; ?>">
				</div>
				<?php foreach ($Read->getResult() as $gallery) :
					extract($gallery); ?>
					<div class="gallery__item fancy-card-overlay fancy-card-overlay--plus">
						<img width="148" height="148" src="<?= RAIZ . '/doutor/uploads/' . $gallery_file; ?>" alt="<?= $prod_title; ?>" title="<?= $prod_title; ?>">
					</div>
				<?php
				endforeach; ?>
			</div>
		</div>
	<?php
	endif; ?>
<? endif; ?>
<!-- END CUSTOM GALLERY -->