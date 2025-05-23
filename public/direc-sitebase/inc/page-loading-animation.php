<?php if($pageLoadingAllPages || $urlPagina == ""): ?>
	<div class="page-loading">
		<?php if($pageLoadingLogo): ?>
			<img class="page-loading__logo" src="<?=$url?>imagens/logo.webp" alt="<?=$nomeSite?>" title="<?=$nomeSite?>">
		<?php endif; ?>

		<?php if($pageLoadingSpinner): ?>
			<div class="page-loading__spinner"></div>
		<?php endif; ?>
	</div>
<?php endif; ?>

<!-- Configurações estão no arquivo geral.php, script de carregamento está no arquivo LAB.php -->