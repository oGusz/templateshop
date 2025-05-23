$(function () {
  // URL Relativa
  var base = '<?=BASE;?>';

  // Active menu aside
  var activeUrl = $('.j_url').val();
  $('aside a[href="' + activeUrl + '"]').addClass("active-menu-aside");
  // Search
  $('.j_searchIcon').on('click', function () {
    $('.j_searchModal').show();
  });
  $('.j_searchClose').click(function () {
    $('.j_searchModal').hide();
  });
  // FBLike responsive control
  if ($('.fb-like').length) {
    $(window).load(function () {
      if ($('.fb-like').width() < 600 && $(window).width() < 600) {
        $('.fb-like').attr('data-width', $('.fb-like').width());
      }
    });
  }
  // Captura eventos GA para o Analytics
  $('.j_event').on('click', function () {
    ga('send', 'event', {
      eventCategory: $(this).attr('data-category'),
      eventAction: $(this).attr('data-event'),
      eventLabel: $(this).attr('data-label')
    }, {
      useBeacon: true
    });
    // console.log($(this).attr('data-category'), $(this).attr('data-event'), $(this).attr('data-label'));
  });
  // Seta número de páginas por consulta
  $('.j_change').on('change', function () {
    var quantidade = $(this).val();
    var url = $(this).attr('data-url');
    if (quantidade > 1) {
      location.href = url + '&perpage=' + quantidade;
    }
  });

  $("[data-application-select]").change(function () {
    let prodItemArray = [];
    let prodItemValue = "";

    $("[data-application-select]").each(function () {
      let selectedValue = $(this).val();

      if (selectedValue !== "") {
        let selectedList = $(this).attr('data-application-select');
        prodItemArray.push(selectedList + ": " + selectedValue);
      }
    });

    prodItemValue = prodItemArray.join(' / ');

    $('input[name="prod_item"]').val(prodItemValue);
  });

  // Ajusta os vídeos no navegador
  function VideoResize() {
    $('.htmlchars iframe').each(function () {
      var url = $(this).attr("src");
      var char = "?";
      if (url.indexOf("?") != -1) {
        var char = "&";
      }
      var iw = $(this).width();
      var width = $('.htmlchars').outerWidth();
      var height = (iw * 9) / 16;
      $(this).attr({ 'width': width, 'height': height + 'px' });
    });
  }
  VideoResize();
  $(window).resize(function () {
    VideoResize();
  });
  // Funções do carrinho em ajax
  $('.j_contCart').ready(function () {
    var dados = { action: 'cartView' };
    $.ajax({
      url: base + "/_cdn/ajax/functions.php",
      type: "POST",
      dataType: 'json',
      data: dados,
      beforeSend: function () {
        $('.j_contCart').html('0');
      },
      success: function (resposta) {
        $('.j_contCart').html(resposta.result);
        $('.j_totalValor').html(resposta.total);
        $('.j_orc_total').val(resposta.total);
      }
    });
  });
  $('.j_solicitar').click(function () {
    $('.j_formulario').slideDown();
  });
  $('.j_removeCart').on('click', function () {
    var id = $(this).attr('tabindex');
    var espec = $(this).attr('data-espec');
    var dados = { action: 'removeProdutoCart', prod_id: id, prod_espec: espec };
    swal({
      title: "Deletar produto?",
      text: "Deseja realmente deletar este produto do orçamento?",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-info",
      confirmButtonText: "Confirmar",
      closeOnConfirm: false
    },
      function () {
        $.ajax({
          url: base + "/_cdn/ajax/functions.php",
          type: "POST",
          dataType: 'json',
          data: dados,
          success: function (resposta) {
            if (resposta.error) {
              swal("Houve um erro!", "Não foi possível remover este produto do carrinho.", "error");
            } else if (resposta.result == 0) {
              $('.j_carrinho').slideUp();
              location.reload();
            } else {
              swal("Tudo certo!", "O produto foi removido do orçamento com sucesso.", "success");
              $('.j_contCart').fadeIn().html(resposta.result);
              $('.j_totalValor').html(resposta.total);
              $('.j_orc_total').val(resposta.total);
              $('#' + id).slideUp(100, function () {
                location.reload();
              });
            }
          }
        });
      });
  });
  $('.j_Cart').submit(function () {
    var dados = $(this).serialize();
    $.ajax({
      url: base + "/_cdn/ajax/functions.php",
      type: "POST",
      dataType: 'json',
      data: dados,
      success: function (resposta) {
        if (resposta.error) {
          swal("Desculpe, mas não foi possível adicionar este produto no carrinho.", "error");
        } else {
          $('.j_cartModal').fadeIn(100);
          $('.j_message').slideDown(100, function () {
            $(this).find('p').html(resposta.produto);
          });
          $('.j_contCart').html(resposta.result);
        }
      }
    });
    return false;
  });
  $('.j_qtdCart').on('keyup', function () {
    var qtd = $(this).val();
    var id = $(this).attr('data-qtd');
    var item = $(this).attr('title');
    var dados = { action: 'updateCart', prod_qtd: qtd, prod_id: id, prod_item: item };
    $.ajax({
      url: base + "/_cdn/ajax/functions.php",
      type: "POST",
      dataType: 'json',
      data: dados,
      success: function (resposta) {
        if (resposta.error) {
          $('.j_message').slideDown(100, function () {
            $(this).find('a').html('<i class="fa fa-shopping-cart"></i> Continuar');
            $(this).find('p').html('Desculpe, mas não foi possível alterar a quantidade no orçamento.');
          });
        } else {
          $('.j_contCart').html(resposta.result);
          $('.j_totalValor').html(resposta.total);
          $('.j_orc_total').val(resposta.total);
        }
      }
    });
  });
  $('.j_removeItemCart').on('click', function () {
    var id = $(this).attr('data-qtd');
    var item = $(this).val();
    var dados = { action: 'removeItemCart', prod_id: id, prod_item: item };
    swal({
      title: "Deletar item?",
      text: "Deseja realmente deletar o item " + item + " do orçamento?",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-info",
      confirmButtonText: "Confirmar",
      closeOnConfirm: false
    },
      function () {
        $.ajax({
          url: base + "/_cdn/ajax/functions.php",
          type: "POST",
          dataType: 'json',
          data: dados,
          success: function (resposta) {
            if (resposta.error) {
              swal("Houve um erro!", "Desculpe, mas não foi possível remover o item no orçamento.", "error");
            } else if (resposta.model == 0) {
              if (resposta.result == 0) {
                $('#' + id).slideUp(100, function () {
                  location.reload();
                });
              }
              $('.j_contCart').html(resposta.result);
              $('.j_totalValor').html(resposta.total);
              $('.j_orc_total').val(resposta.total);
              $('#' + id).slideUp(100);
              swal("Tudo certo!", "O item: " + item + " foi removido com sucesso.", "success");
            } else {
              $('#' + resposta.result_id + resposta.result_item).fadeOut(200, function () {
                $('.j_contCart').html(resposta.result);
                $('.j_totalValor').html(resposta.total);
                $('.j_orc_total').val(resposta.total);
                if (resposta.result == 0) {
                  $('#' + id).slideUp(100, function () {
                    location.reload();
                  });
                }
                swal("Tudo certo!", "O item: " + item + " foi removido com sucesso.", "success");
              });
            }
          }
        });
      });
  });
  $('.j_closeBox').click(function () {
    $('.j_message').fadeOut(300, function () {
      $(this).find('p').html(' ');
      $('.j_cartModal').fadeOut(500);
    });
  });
  // Newsletter
  $('.j_submit').submit(function () {
    var dados = $(this).serialize();
    var form = $(this);
    $.ajax({
      url: base + "/_cdn/ajax/functions.php",
      type: "POST",
      dataType: 'json',
      data: dados,
      beforeSend: function () {
        form.find('.j_load').fadeIn();
      },
      success: function (resposta) {
        form.find('.j_load').fadeOut();
        if (resposta.error) {
          swal(resposta.error[2], resposta.error[0], "warning");
          form.find('input[type="text"]').val('');
        } else if (resposta.result) {
          swal(resposta.result[2], resposta.result[0], "success");
          form.find('input[type="text"]').val('');
        }
      }
    });
    return false;
  });

  //SIG CONTENT INNER LINK
  $(document).ready(function () {
    $('[data-inner-link]').each(function () {
      $(this).attr('href', "<?= RAIZ ?>/" + $(this).attr('data-inner-link'));
      // $(this).removeAttr("rel target data-inner-link");
      $(this).removeAttr("rel data-inner-link");
    });
  });

});
