<script defer src="<?= $url ?>js/maskinput.js"></script>
<script>
	$(document).ready(function() {
		$('input[name="cep"]').mask('00000-000');
		$('input[name="cpf"]').mask('000.000.000-00');
		$('input[name="cnpj"]').mask('00.000.000/0000-00');
		$('[data-phone-mask], input[name="telefone"]').attr('maxlength', 15);

		$('[data-phone-mask], input[name="telefone"]').on('input', function() {
			var input = $(this);
			var value = input.val().replace(/\D/g, ''); // Remove caracteres não numéricos
			var formattedValue = '';
			let inputLength = value.length;
			if (inputLength > 0) {
				formattedValue += '(' + value.substring(0, 2);
				if (inputLength > 2) {
					formattedValue += ') ';
					if (inputLength >= 7) {
						formattedValue += value.substring(2, inputLength - 4) + '-' + value.substring(inputLength - 4);
					} else {
						formattedValue += value.substring(2);
					}
				}
			}
			input.val(formattedValue);
		});

		// LAZY RECAPTCHA
		let recaptcha = false;
		$('form input').on('focus', function() {
			if (!recaptcha) {
				$("head").append("<script src='https://www.google.com/recaptcha/api.js'><\/script>");
				recaptcha = true;
			}
		});

		// ENVIO DADOS EMAIL BUSCA
		const formInputs = {
			urlProject: "<?= $url ?>",
			urlPage: "<?= $urlPagina != '' ? $urlPagina : 'home' ?>",
			titlePage: "<?= $title ?>",
			idProject: "<?= $idProjetoBusca ?>",
			emailProject: "<?= $emailContato ?>"
		};

		document.querySelectorAll("form").forEach((form) => {
			for (const [name, value] of Object.entries(formInputs)) {
				const input = document.createElement("input");
				input.type = "hidden";
				input.name = name;
				input.value = value;
				form.appendChild(input);
			}
		});
	});
</script>