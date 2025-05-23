<div class="mpi-topo">
    <div class="wrapper">
        <div class="row align-items-center">
            <div class="col-6">
                <span>Entre em contato com um de nossos especialistas!</span>
            </div>
            <div class="col-6">
                <div class="row align-items-center">
                    <div class="<?= (isset($whatsapp) ? 'col-6 col-md-12 col-sm-6 col-xs-12' : 'col-12'); ?>">
                        <a href="javascript:;" title="Faça seu orçamento agora mesmo" class="btn btn--white lightbox" data-src="#modal-form-contato">Faça seu orçamento agora mesmo</a>
                    </div>
                    <? if (isset($whatsapp)): ?>
                        <div class="col-6 col-md-12 col-sm-6 col-xs-12">
                            <a href="<?= wppLink($whatsapp) ?>" target="_blank" rel="nofollow" title="Faça seu orçamento por Whatsapp" class="btn btn--green">Faça seu orçamento por Whatsapp</a>
                        </div>
                    <? endif ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>

<? include('inc/topo.php'); ?>
<? include_once('inc/formPost.php'); ?>

<div style="display: none;" id="modal-form-contato">
    <h2 class="text-center">Entre em contato</h2>
    <hr>
    <form enctype="multipart/form-data" method="post" class="mpi-form mpi-form--topo">
        <label>Nome: <span>*</span> </label>
        <input onKeyUp="UcWords(this)" type="text" name="nome" value="<?= RecoverForm('nome') ?>" required>
        <label>E-mail: <span>*</span> </label>
        <input onKeyUp="minusculas(this)" type="text" name="email" value="<?= RecoverForm('email') ?>" required>
        <label>Telefone: <span>*</span> </label>
        <input type="text" name="telefone" maxlength="15" value="<?= RecoverForm('telefone') ?>" required>
        <label>Mensagem: <span>*</span> </label>
        <textarea name="mensagem" rows="5" required><?= isset($post['mensagem']) ? $post['mensagem'] : 'Gostaria de saber mais sobre ' . $title ?></textarea>
        <div class="g-recaptcha" data-size="<?= (!$isMobile) ? 'normal' : 'compact' ?>" data-sitekey="<?= $siteKey; ?>"></div>
        <input type="submit" name="EnviaContato" value="Enviar" class="ir">
    </form>
</div>