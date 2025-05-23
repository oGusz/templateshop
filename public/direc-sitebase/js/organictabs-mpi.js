$(document).ready(function() {
    // Verifica se há um tab ativo e esconde os outros conteúdos
    const activeTab = $('.regioes__menu .active-tab').attr('data-tab');
    if (activeTab) {
        $(".regioes__content [data-tab]:not([data-tab='" + activeTab + "'])").hide();
    } else {
        $(".regioes__content [data-tab]:not(:first-child)").hide();
    }

    // Manipulador de clique para os tabs
    $(".regioes__menu [data-tab]").on("click", function() {
        let a = $(this).attr("data-tab");
        if (!$(this).hasClass("active-tab")) {
            let t = $(".regioes__menu .active-tab").attr("data-tab");
            $(".regioes__menu .active-tab").removeClass("active-tab");
            $(this).addClass("active-tab");

            // Controla a exibição do conteúdo
            $(".regioes__content [data-tab='" + t + "']").fadeOut("fast", function() {
                $(".regioes__content [data-tab='" + a + "']").fadeIn("fast");
            });
        }
    });
});
