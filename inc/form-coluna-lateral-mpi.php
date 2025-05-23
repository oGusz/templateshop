<form enctype="multipart/form-data" method="post" class="mpi-form mpi-form--aside">
        <label>Digite seu nome</label>
        <input placeholder="Ex: JOÃO SILVA" type="text" name="nome" onKeyUp="maiusculas(this)" value="<?php if (isset($post['nome'])): echo $post['nome']; endif; ?>" required>

        <label>Digite seu email</label>
        <input type="text" placeholder="email@exemplo.com.br" onKeyUp="minusculas(this)" name="email" value="<?php if (isset($post['email'])): echo $post['email']; endif; ?>" required>

        <label>Digite seu telefone</label>
        <input type="text" placeholder="(11) 1234-5678" maxlength="15" name="telefone" value="<?php if (isset($post['telefone'])): echo $post['telefone']; endif; ?>" required>

        <label>Mensagem</label>
        <textarea rows="5" name="mensagem" placeholder="Gostaria de saber mais sobre <?= $title ?>" required><?php if (isset($post['mensagem'])): echo $post['mensagem']; endif; ?></textarea>
        
        <div class="g-recaptcha" data-size="<?= (!$isMobile) ? 'normal' : 'compact' ?>" data-sitekey="<?= $siteKey; ?>"></div>

        <input type="submit" name="EnviaContato" value="Enviar" class="ir">
</form>