<?php if (WD_NEWSLETTER) : ?>
	<section class="newslleter">
		<!--
	<b>Cadastro de newslleter</b>
	Sistema somente para captação de lista de e-mails, é possível exportar as listas em CSV
	para outros sistemas.
	Sistema de captação em ajax/real time. É enviado um e-mail para o cliente confirmar o cadastro,
	e autententicar se o e-mail é verídico.
-->
		<div class="container">
			<div class="bg-primary-color">
				<div class="container">
					<div class="wrapper">
						<form method="post" enctype="multipart/form-data" class="newsletter-form j_submit">
							<div class="j_load"></div>
							<input type="hidden" name="action" value="GravaNewsletter">
							<input type="hidden" name="user_empresa" value="<?= EMPRESA_CLIENTE; ?>">
							<div class="row justify-content-center">
								<div class="col-5">
									<h2 class="white mt-0">Cadastre-se e receba nossas novidades!</h2>
									<i class="white fa-solid fa-envelope-open-text fa-3x" aria-hidden='true'></i>
								</div>
								<div class="col-7">
									<div class="row">
										<div class="col-6">
											<input placeholder="Digite o seu nome" type="text" name="news_nome" required>
										</div>
										<div class="col-6">
											<input placeholder="Digite o seu E-mail" type="text" name="news_email" required>
										</div>
										<div class="col-12">
											<label class="label-consentimento">
												<input type="checkbox" name="news_consent" value="Eu aceito o envio de comunicações de acordo com meus interesses" required>
												Eu aceito o envio de comunicações de acordo com meus interesses *
											</label>
										</div>
										<div class="col-12">
											<input type="submit" name="CadastraNews" value="Cadastrar">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>