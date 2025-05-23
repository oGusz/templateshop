
<?php
$Read->ExeRead(TB_POPUP, "WHERE pop_status = :stats ORDER BY pop_id ASC", "stats=2");
if ($Read->getResult()) :
    $popUpInfo = $Read->getResult()[0];

    if($popUpInfo['pop_location'] === "2" || ($popUpInfo['pop_location'] === "1" && $urlPagina === "")):
        if($popUpInfo['pop_numexib'] === "2" || $_SESSION['popup_exibido_'.$popUpInfo['pop_id']] === null): 
            $_SESSION['popup_exibido_'.$popUpInfo['pop_id']] = true;
            
            $imageOptions = ['1', '2', '3', '5']; //Configurações de pop_content que exibem a imagem 
            $titleOptions = ['1', '2', '4', '6']; //Configurações de pop_content que exibem o título
            $textOptions = ['1', '3', '4', '7']; //Configurações de pop_content que exibem o texto
            ?>
    
            <dialog id="popUpSig" data-modal-dialog>
                <div class="modalcontent">
                    <?php if (in_array($popUpInfo['pop_content'], $imageOptions)): ?>
                            <img class="modalcontent__image" src="<?= RAIZ; ?>/doutor/uploads/<?= $popUpInfo['pop_file']; ?>" title="<?= $popUpInfo['pop_title']; ?>" alt="Imagem ilustrativa de <?= $popUpInfo['pop_title']; ?>">
                    <?php endif;                         
                        if (in_array($popUpInfo['pop_content'], $titleOptions)): ?>
                            <h2 class="modalcontent__title"><?= $popUpInfo['pop_title']; ?></h2>
                    <?php endif;
                        if (in_array($popUpInfo['pop_content'], $textOptions)): ?>
                            <p class="modalcontent__text"><?= $popUpInfo['pop_description']; ?></p>
                    <?php endif; ?>

                    <button data-close-dialog onclick="popUpSig.close();" class="modalclose" type="button" name="Fechar Pop-up">
                        <i class="fa-solid fa-circle-xmark" aria-hidden="true"></i>
                    </button>
                </div>
            </dialog>
            
            <script>
                $(document).ready(function(){	
                    $('[data-open-dialog]').click(function() { $('body').addClass('active-modal'); });
                    $('[data-close-dialog]').click(function() { $('body').removeClass('active-modal'); });
                    $('[data-modal-dialog]').click(function (e) {
                        if (e.target === this) {
                            this.close();
                            $('body').removeClass('active-modal');
                        }
                    });		
                    
                    setTimeout(function() {
                        popUpSig.showModal();
                        $('body').addClass('active-modal'); 
                    }, 3000);
                });

                $(document).on('keydown', function(e) {
                    if(e.keyCode == 27) {
                        $('body').removeClass('active-modal');
                    }
                });
            </script>
        <? endif; 
    endif;
endif;