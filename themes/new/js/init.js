(function($){
  function URL(url){
      return 'http://pi-uscs.app/ajax/'+url;
  }

  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    $('.slider').slider();
    //$('#SelecionaAno').material_select();
      $('.tooltipped').tooltip({delay: 50});
    $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15, // Creates a dropdown of 15 years to control year
      format: 'mm/yyyy'
    });

  }); // end of document ready


  
  $('.SelecionaAnoAjax').change(function () {
    var value = $('.SelecionaAnoAjax').val();
    $.ajax({
      url: 'ajax/SelecionaAno.php',
      data: {ano: value},
      type: 'post',
      dataType: 'json',
      beforeSend: function () {
        Materialize.toast('Aguarde, Processando...', 4000);
          $('.SelectMesAjax').find('option').remove().end();
      },
      success: function ( RESPOSTA ) {
        Materialize.toast('Pronto! Selecione o mês!', 4000);
          $.each(RESPOSTA, function(key, value){
              $('.SelectMesAjax').append($('<option></option>').attr("value", value.value).text(value.nome));
          });
         // console.log(RESPOSTA);
      }, error: function (xhr, ajaxOptions, thrownError) {
            Materialize.toast('Desculpe. Um problema foi encontrado.', 4000);
        }
    })
  });

    $('.SelectMesAjax').change(function () {
        var Data = $('.SelectMesAjax').val().length;
        if(Data === 0){
            Materialize.toast('Selecione um mês antes.', 4000);
        }else{
            $('.TipoResidencia').removeAttr("disabled");
        }
    });

    $('.TipoResidencia').change(function () {
        var Data = $('.TipoResidencia').val().length;
        if(Data === 0){
            Materialize.toast('Selecione um mês antes.', 4000);
        }else{
            $('.KwhConsumido').removeAttr("disabled");
        }
    });

    $('#calculadora').submit(function () {
        var Data = $('#calculadora').serialize();
        $.ajax({
            url: 'ajax/Calculadora.php',
            data: Data,
            type: 'post',
            dataType: 'json',
            beforeSend: function () {
                Materialize.toast('Hora de Calcular...', 4000);
            },
            success: function ( RESPOSTA ) {
                $('#primeiro').fadeOut();
                $('#segundo').fadeIn();
                $.each(RESPOSTA, function (key, value) {
                    if(value.bandeira == 1){
                        var bandeira = "Verde";
                    }else if(value.bandeira == 2){
                        var bandeira = "Amarela";
                    }else if(value.bandeira == 3){
                        var bandeira = "Vermelha";
                    }else if(value.bandeira == 4){
                        var bandeira = "Vermelha 2";
                    }
                    console.log("<p>O Resultado do cálculo referente ao mês "+value.mes+" é de R$"+value.valor+". A Bandeira vigente neste mês é "+bandeira+'</p>');
                    console.log("Valor com ICMS"+value.valor_icms);
                    $('#result').append("<p>O Resultado do cálculo referente ao mês "+value.mes+" é de R$"+value.valor+". A Bandeira vigente neste mês é "+bandeira+'</p>');
                    //$('#result').html("O Resultado do cálculo referente ao mês "+RESPOSTA.mes+" é de "+RESPOSTA.valor+". A Bandeira vigente neste mês é "+bandeira);
                })
            },
            error: function (xhr, ajaxOptions, thrownError) {
                if(xhr.status == 301){
                    Materialize.toast(thrownError, 4000);
                }

            }
        })
        return false;
    });
    
    $('.CalculaNovamente').click(function () {
        $("#segundo").fadeOut();
        $("#primeiro").fadeIn();
        $('.SelecionaAnoAjax').val('');
        $('.SelectMesAjax').val('');
        $('.TipoResidencia').val('');
        $('.KwhConsumido').val('');

    });

    $('.FormCadastro').submit(function () {
        var cadastro = $(this).serialize();
        $.ajax({
           url: 'ajax/Cadastro.php',
            data: cadastro,
            dataType: 'json',
            type: 'post',
            beforeSend: function () {
                Materialize.toast('Aguarde, cadastro iniciado', 2000);
            },
            success: function (RESPOSTA) {
                Materialize.toast(RESPOSTA.text, 2000, RESPOSTA.class);
            }
        });
       return false;
    });


    $('.FormLogin').submit(function () {
        var login = $(this).serialize();
        $.ajax({
            url: URL('Login.php'),
            data: login,
            dataType: 'json',
            type: 'post',
            beforeSend: function () {
                Materialize.toast('Aguarde, processando...', 1000);
            },
            success: function (RESPOSTA) {
                Materialize.toast(RESPOSTA.text, 2000, RESPOSTA.class);
                if(RESPOSTA.code){
                    window.setTimeout(function () {
                        window.location.replace("/dashboard");
                    }, 2000)
                }
            }
        });
        return false;
    });

    $('.acao').click(function () {
        var ident = $(this).data('id');
        var action = $(this).data('action');
        if(confirm('Você tem certeza que deseja mover o calculo?')){
            $.ajax({
                url: URL('ExcluirCalculo.php'),
                data: {action : action, id : ident},
                dataType: 'json',
                type: 'post',
                beforeSend: function () {
                    Materialize.toast('Aguarde, processando...', 1000);
                },
                success: function (RESPOSTA) {
                    Materialize.toast(RESPOSTA.text, 2000, RESPOSTA.class);
                    if(RESPOSTA.code){
                        if(RESPOSTA.action == 'delete'){
                            $("#"+ident).addClass('table_deleted');
                            $('#Excluir'+ident).fadeOut();
                            $('#Undo'+ident).fadeIn();
                        }else{
                            $("#"+ident).removeClass('table_deleted');
                            $('#Excluir'+ident).fadeIn();
                            $('#Undo'+ident).fadeOut();
                        }

                    }
                }
            });
        }
        return false;
    });

})(jQuery); // end of jQuery name space