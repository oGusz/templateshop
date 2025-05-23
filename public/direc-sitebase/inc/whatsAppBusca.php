<div class="whatsapp">
    <div class="whatsapp__button" onclick="openModal()">
        <img width="60" height="60" src="<?= $url ?>imagens/icones/whatsapp.svg" alt="WhatsApp" title="WhatsApp">
        <span style="display:none;">1</span>
    </div>
    <div class="whatsapp__modal">
        <div class="whatsapp__modal-header">
            <img width="52" height="52" src="<?= $url ?>imagens/favicon.png" alt="<?= $nomeSite ?>" title="<?= $nomeSite ?>">
            <h3>Olá! Fale agora pelo WhatsApp </h3>
            <div class="close_modal_Whats" onclick="closeWhatsapp()">
                <svg width="20px" height="20px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="#000000">
                    <path fill="#ffffff" d="M195.2 195.2a64 64 0 0 1 90.496 0L512 421.504 738.304 195.2a64 64 0 0 1 90.496 90.496L602.496 512 828.8 738.304a64 64 0 0 1-90.496 90.496L512 602.496 285.696 828.8a64 64 0 0 1-90.496-90.496L421.504 512 195.2 285.696a64 64 0 0 1 0-90.496z"></path>
                </svg>
            </div>
        </div>
        <div class="whatsapp__modal-body">
            <form action="javascript:void(0);" id="j_cotacaoWpp" class="whatsapp__form" method="post">

                <input type="hidden" name="formulario" value="whatsapp">
                <input type="hidden" name="email" value="form-whats@whatsapp.com.br">
                <input type="hidden" name="nome" value="WhatsApp">

                <textarea name="mensagem" hidden>Url da página: <?= str_replace('www.', '', $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?> </textarea>

                <label class="fs-12"> Insira seu telefone </label>
                <div class="row">
                    <div class="col-12">
                        <input type="text" name="telefone" id="j_telefone" placeholder="( __ ) _____ - ____" required>
                        <span></span>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="whatsapp__form-btn" onclick="sendWhatsapp()">Iniciar conversa</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
    //BuscaZap
    setTimeout(function() {
        $(".whatsapp__button span").show()
    }, 4000);
    if (!sessionStorage.getItem("openWhatsapp")) {
        setTimeout(function() {
            $(".whatsapp__modal").show();
            sessionStorage.setItem("openWhatsapp", true);
        }, 4000);
    }

    function openModal() {
        $('.whatsapp__modal').toggle();
    }

    function sendWhatsapp() {
        const telWhats = $('#j_telefone').val();
        const numberWhats = telWhats.toString()
        $("#j_cotacaoWpp").on("submit", function() {
            $.ajax({
                url: "<?= $url ?>inc/contato/emailBusca.php",
                dataType: "json",
                type: "POST",
                data: $("#j_cotacaoWpp").serialize(),
                beforeSend: function() {
                    $("#j_telefone").val('');
                    $(".whatsapp__modal").hide();
                    window.open('<?= wppLink($whatsapp) ?>', '_blank');
                },
                complete: function() {}
            });
        });
    }

    function closeWhatsapp() {
        $('.whatsapp__modal').hide()
    };

    //Fim Buscazap
</script>