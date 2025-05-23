<script>
  // EVENTO WINDOW LOAD
  $(window).on('load', function() {

    // GOOGLE ANALYTICS
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }

    (function() {
      var s = document.createElement('script');
      s.type = "text/javascript";
      s.async = true;
      s.src = "https://www.googletagmanager.com/gtag/js?id=<?= $idAnalytics ?>";
      document.head.appendChild(s);
      s.onload = function() {
        gtag('js', new Date());
        gtag('config', '<?= $idAnalytics ?>');
      };
      <?php include('public/direc-sitebase/inc/metricas-site.js'); ?>
    })();

    // GOOGLE TAG MANAGER
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });

      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', '<?= $tagmanager; ?>');



    // REMOÇÃO DA PÁGINA DE CARREGAMENTO
    <?php if ($pageLoadingAnimation) : ?>
      setTimeout(removePageLoading, <?= $pageLoadingTimeout; ?>);
    <?php endif; ?>

    function removePageLoading() {
      <?php if ($pageLoadingLogo) : ?>
        $('.page-loading__logo').addClass('page-loading__logo--fade');
      <?php endif; ?>
      $('.page-loading').fadeOut('slow');
    }

    // ATIVAR ITENS DE MENU
    const url = window.location.href;
    $('header nav ul li a[href="' + url + '"]').first().addClass("active-menu-topo");
    $('aside li a[href="' + url + '"]').first().addClass("active-menu-aside");

    // MENU COM AUTO SCROLL
    $('header [id*="menu"] ul ul').each(function() {
      if ($(this).children().length > 15) $(this).addClass('sub-menu-scroll');
    });


    // MEDIÇÃO DE PERFORMANCE
    var myTime = window.performance.now();
    var items = window.performance.getEntriesByType('mark');
    items = window.performance.getEntriesByType('measure');
    items = window.performance.getEntriesByName('mark_fully_loaded');
    window.performance.mark('mark_fully_loaded');
    window.performance.measure('measure_load_from_dom', 'mark_fully_loaded');
    window.performance.clearMarks();
    window.performance.clearMeasures('measure_load_from_dom');
  });

  // ADICIONAR BOTÃO DE SCROLL UP
  $('footer').after('<span id="scrollUp"></span>');

  // Variável de offsetTop para ativar o botão no momento correto
  var offsetTop = 100; // Valor para quando o botão aparecer

  // Função para mostrar ou esconder o botão com base na rolagem
  $(window).scroll(function() {
    if ($(window).scrollTop() >= offsetTop) {
      $('#scrollUp').addClass('is-active');
    } else {
      $('#scrollUp').removeClass('is-active');
    }
  });

  // Função de clique para o botão de subir para o topo
  $('#scrollUp').on('click', function() {
    $('html, body').animate({
      scrollTop: 0
    }, 800); // Aumentei o tempo de animação para 800ms
  });

  // Codigo para verificar se o wrapper excede o tamanho da tela, caso sim, troca para o tamanho padrão.
  document.addEventListener("DOMContentLoaded", function() {
    var tamanhoWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    var rootStyles = getComputedStyle(document.documentElement);
    var wrapperWidth = parseInt(rootStyles.getPropertyValue('--wrapper-width'));
    if (wrapperWidth > tamanhoWidth) {
      document.documentElement.style.setProperty('--wrapper-width', '1180px');
    }
  });
</script>

<!-- BREADCRUMB -->
<?php if (isset($breadJsonEncoded)) :
  echo "<script type='application/ld+json'>" . $breadJsonEncoded . "</script>";
endif; ?>



<!-- GOOGLE TRADUTOR SIG -->
<?php if (isset($WD_LANG) && $WD_LANG) : ?>

  <script>
    <?php include('public/direc-sitebase/js/gtranslate.js'); ?>
    $('address').addClass('notranslate');
  </script>
  <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
<?php endif; ?>

