<form id="form-carrinho-orcamento" class="cart j_Cart" method="post" enctype="multipart/form-data">
	<input type="hidden" name="base" value="<?= BASE ?>" class="j_base">
	<input type="hidden" name="prod_id" value="<?= $prod_id; ?>">
	<input type="hidden" name="prod_codigo" value="<?= $prod_codigo; ?>">
	<input type="hidden" name="action" value="addCart">

	<?php if (!empty($prod_atributos) && $prod_atributos != " ") : ?>
		<div class="cart-select">
			<select data-application-select="Atributos" required>
				<option value="">-- Atributos --</option>
				<?php
				$atributos = explode(",", $prod_atributos);
				foreach ($atributos as $key => $item) : ?>
					<option value="<?= $item ?>"><?= $item ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	<? endif; ?>

	<?php if (!empty($prod_cores) && $prod_cores != " ") : ?>
		<div class="cart-select">
			<select data-application-select="Cor" required>
				<option value="">-- Cores --</option>
				<?php
				$atributos = explode(",", $prod_cores);
				foreach ($atributos as $key => $item) : ?>
					<option value="<?= $item ?>"><?= $item ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	<? endif; ?>

	<?php if (!empty($prod_tamanhos) && $prod_tamanhos != " ") : ?>
		<div class="cart-select">
			<select data-application-select="Tamanho" required>
				<option value="">-- Tamanhos --</option>
				<?php
				$atributos = explode(",", $prod_tamanhos);
				foreach ($atributos as $key => $item) : ?>
					<option value="<?= $item ?>"><?= $item ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	<? endif; ?>

	<?php if (!empty($prod_pesos) && $prod_pesos != " ") : ?>
		<div class="cart-select">
			<select data-application-select="Peso" required>
				<option value="">-- Pesos --</option>
				<?php
				$atributos = explode(",", $prod_pesos);
				foreach ($atributos as $key => $item) : ?>
					<option value="<?= $item ?>"><?= $item ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	<? endif; ?>

	<?php if (!empty($prod_modelos) && $prod_modelos != " ") : ?>
		<div class="cart-select">
			<select data-application-select="Modelo" required>
				<option value="">-- Modelos --</option>
				<?php
				$atributos = explode(",", $prod_modelos);
				foreach ($atributos as $key => $item) : ?>
					<option value="<?= $item ?>"><?= $item ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	<? endif; ?>

	<?php if (!empty($prod_marcas) && $prod_marcas != " ") : ?>
		<div class="cart-select">
			<select data-application-select="Marca" required>
				<option value="">-- Marcas --</option>
				<?php
				$atributos = explode(",", $prod_marcas);
				foreach ($atributos as $key => $item) : ?>
					<option value="<?= $item ?>"><?= $item ?></option>
				<?php endforeach; ?>
			</select>
		</div>
	<? endif; ?>

	<?php if (isset($atributos)) : ?>
		<input type="hidden" name="prod_item" value="">
	<?php endif; ?>

	<div class="cart-buttons row gap-10">
		<div class="col-3 col-sm-3">
			<input class="qtd-input" type="number" name="prod_qtd" min="1" step="1" value="1">
		</div>
		<div class="col-9 col-sm-9">
			<button class="addOrc j_Cart" type="submit" name="Adicionar">
				Adicionar <i class="ml-2 fa-solid fa-cart-plus"></i>
			</button>
		</div>
		<div class="col-12">
			<a class="btn-cart" href="<?=$url?>carrinho" title="Ver carrinho">Ver carrinho <i class=" ml-2 fa-solid fa-cart-shopping"></i></a>
		</div>
	</div>
</form>