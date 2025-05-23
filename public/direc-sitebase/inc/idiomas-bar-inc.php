<?php if (WD_LANG): ?>
  <div class="widget__lang">
    <div id="google_translate_element2"></div>
    <div class="translate-container">
      <a href="#" onclick="doGTranslate('pt|en');return false;" title="English">
        <img src="<?= BASE; ?>/images/us-flag.png" alt="English" title="English">
      </a>
      <a href="#" onclick="doGTranslate('pt|pt');return false;" title="Portuguese">
        <img src="<?= BASE; ?>/images/br-flag.png" alt="Portuguese" title="Portuguese">
      </a>
      <a href="#" onclick="doGTranslate('pt|es');return false;" title="Spanish">
        <img src="<?= BASE; ?>/images/es-flag.png" alt="Spanish" title="Spanish">
      </a>
    </div>
  </div>
<?php
endif;  ?>