<form enctype="multipart/form-data" method="post" class="form">
  <div class="row">
    <div class="col-4 col-sm-6 pr-4">
      <label for="nome">Nome: *</label>
      <input placeholder="Digite seu nome" type="text" name="nome" id="nome" value="<?= RecoverForm('nome') ?>" required>
    </div>
    <div class="col-4 col-sm-6 pr-4">
      <label for="email">E-mail *</label>
      <input placeholder="exemplo@exemplo.com" type="email" name="email" id="email" value="<?= RecoverForm('email') ?>" required>
    </div>
    <div class="col-4 col-sm-6">
      <label for="telefone">Telefone *</label>
      <input placeholder="(00) 000000-0000" type="tel" name="telefone" id="telefone" value="<?= RecoverForm('telefone') ?>" required>
    </div>
    <!-- <label for="cpf">CPF *</label>
      <input placeholder="000.000.000-00" type="text" name="cpf" id="cpf" value="<?= RecoverForm('cpf') ?>" required> -->
    <!-- <label for="cnpj">CNPJ *</label>
      <input placeholder="00.000.000/0000-00" type="text" name="cnpj" id="cnpj" value="<?= RecoverForm('cnpj') ?>" required> -->
    <!-- <label for="endereco">Endereço *</label>
      <input placeholder="Ex: Av. São João, 123" type="text" name="endereco" id="endereco" value="<?= RecoverForm('endereco') ?>" required> -->
    <!-- <label for="cidade">Cidade *</label>
      <input placeholder="Ex: São Paulo" type="text" name="cidade" id="cidade" value="<?= RecoverForm('cidade') ?>" required> -->
    <!-- <label for="uf">Estado *</label>
      <input placeholder="Ex: SP" type="text" name="estado" id="uf" value="<?= RecoverForm('estado') ?>" required> -->
    <!-- <label for="cep">CEP *</label>
      <input placeholder="Ex: 00000-000" type="text" name="cep" id="cep" value="<?= RecoverForm('cep') ?>" required> -->
    <!-- <label for="anexo">Anexo: *</label>
      <input type="file" name="anexo" id="anexo" required> -->
    <input type="text" class="hidden" name="como_nos_conheceu" value="Não Informado">
    <div class="col-12 col-sm-6">
      <label for="mensagem">Sua Mensagem *</label>
      <textarea placeholder="Deixe sua mensagem" name="mensagem" id="mensagem" rows="5" required><?= RecoverForm('mensagem') ?></textarea>
    </div>
    <div class="col-12">
      <span class="form__obrigatory">Os campos com * são obrigatórios</span>
      <div class="g-recaptcha" data-size="<?= (!$isMobile) ? 'normal' : 'compact' ?>" data-sitekey="<?= $siteKey; ?>"></div>
      <input type="submit" name="EnviaContato" value="Enviar" class="ir btn btn--outline-white">
    </div>
  </div>
</form>