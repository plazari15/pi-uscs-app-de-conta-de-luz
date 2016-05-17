(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    $('.slider').slider();
    //$('#SelecionaAno').material_select();
    $('.datepicker').pickadate({
      selectMonths: true, // Creates a dropdown to control month
      selectYears: 15, // Creates a dropdown of 15 years to control year
      format: 'mm/yyyy'
    });

  }); // end of document ready


  
  $('#SelecionaAno').change(function () {
    var value = $('#SelecionaAno').val();
    $.ajax({
      url: 'ajax/SelecionaAno.php',
      data: {ano: value},
      type: 'post',
      dataType: 'json',
      beforeSend: function () {
        Materialize.toast('Aguarde, Processando...', 4000);
      },
      success: function ( RESPOSTA ) {
        Materialize.toast('Pronto! Selecione o mês!', 4000);
        $('#SelecionaMes').replaceWith(RESPOSTA.select);
        $('#SelectMes').fadeIn();
        $('#Kwh').fadeIn();
      }
    })
  });

  $('#SelecionaMes').change(function () {
    var Ano = $('#SelecionaAno').val();
    var Mes = $('#SelecionaMes').val();
    $.ajax({
      url: 'ajax/SelecionaMes.php',
      data: {ano:Ano, mes:Mes},
      type: 'post',
      dataType: 'json',
      beforeSend: function () {
        Materialize.toast('Aguarde, Processando...', 4000);
      },
      success: function ( RESPOSTA ) {
        Materialize.toast('Pronto! Aqui estão os dados ferentes a este mês. Insira os Kwh.', 4000);
        $('#SelecionaMes').replaceWith(RESPOSTA.select);
        $('#SelectMes').fadeIn();
        $('#Kwh').fadeIn();
      }
    })
  });


    $('#SelecionaAno2').change(function () {
        var value = $('#SelecionaAno2').val();
        $.ajax({
            url: 'ajax/SelecionaAno.php',
            data: {ano: value},
            type: 'post',
            dataType: 'json',
            beforeSend: function () {
                Materialize.toast('Aguarde, Processando...', 4000);
            },
            success: function ( RESPOSTA ) {
                Materialize.toast('Pronto! Selecione o mês!', 4000);
                $('#SelecionaMes2').replaceWith(RESPOSTA.select);
                $('#SelectMes2').fadeIn();
                $('#Kwh2').fadeIn();
            }
        })
    });

    $('#SelecionaMes2').change(function () {
        var Ano = $('#SelecionaAno2').val();
        var Mes = $('#SelecionaMes2').val();
        $.ajax({
            url: 'ajax/SelecionaMes.php',
            data: {ano:Ano, mes:Mes},
            type: 'post',
            dataType: 'json',
            beforeSend: function () {
                Materialize.toast('Aguarde, Processando...', 4000);
            },
            success: function ( RESPOSTA ) {
                Materialize.toast('Pronto! Aqui estão os dados ferentes a este mês. Insira os Kwh.', 4000);
                $('#SelecionaMes2').replaceWith(RESPOSTA.select);
                $('#SelectMes2').fadeIn();
                $('#Kwh2').fadeIn();
            }
        })
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
                //
            }
        })
        return false;
    });

})(jQuery); // end of jQuery name space