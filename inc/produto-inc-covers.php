<?php if (WD_GALLERY_DEFAULT) : ?>
	<div class="prod-inc-cover">
		<a href="<?= RAIZ . '/doutor/uploads/' . $prod_cover; ?>" title="<?= $prod_title; ?>" data-fancybox="group1" data-caption="<?= $prod_title ?>" class="lightbox fancy-card-overlay">
			<img width="500" height="400" src="<?= RAIZ . '/doutor/uploads/' . $prod_cover; ?>" alt="<?= $prod_title; ?>" title="<?= $prod_title; ?>">
		</a>
	</div>
<?php elseif (WD_GALLERY_CUSTOM) : ?>
	<?php $nImg = $Read->getRowCount() + 1; ?>
	<div class="prod-inc-custom-gallery">
		<div class="gallery__main" data-slick='{"arrows": <?= ($nImg <= "6") ? "false" : "true" ?>}'>
			<a class="lightbox fancy-card-overlay" href="<?= RAIZ . '/doutor/uploads/' . $prod_cover; ?>" title="<?= $prod_title; ?>" data-fancybox="group1" data-caption="<?= $prod_title ?>">
				<img width="500" height="400" src="<?= RAIZ . '/doutor/uploads/' . $prod_cover; ?>" alt="<?= $prod_title; ?>" title="<?= $prod_title; ?>">
			</a>
			<?php foreach ($Read->getResult() as $gallery):
				extract($gallery); ?>
				<a class="lightbox fancy-card-overlay" href="<?= RAIZ . '/doutor/uploads/' . $gallery_file; ?>" title="<?= $prod_title; ?>" data-fancybox="group1" data-caption="<?= $prod_title ?>">
					<img width="148" height="148" src="<?= RAIZ . '/doutor/uploads/' . $gallery_file; ?>" alt="<?= $prod_title; ?>" title="<?= $prod_title; ?>">
				</a>
			<?php
			endforeach; ?>
		</div>
	</div>
<?php endif; ?>