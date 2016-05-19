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


  
  $('.SelecionaAnoAjax').change(function () {
    var value = $('.SelecionaAnoAjax').val();
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
      }, error: function (xhr, ajaxOptions, thrownError) {
            Materialize.toast('Desculpe. Um problema foi encontrado.', 4000);
        }
    })
  });
    
    $('.SelectMesAjax').change(function () {
        var valor = $('.SelectMesAjax').val();
        alert(valor);
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
                alert('Sucesso');
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
                    $('#result').append("<p>O Resultado do cálculo referente ao mês "+value.mes+" é de R$"+value.valor+". A Bandeira vigente neste mês é "+bandeira+'</p>');
                    //$('#result').html("O Resultado do cálculo referente ao mês "+RESPOSTA.mes+" é de "+RESPOSTA.valor+". A Bandeira vigente neste mês é "+bandeira);
                })
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        })
        return false;
    });

})(jQuery); // end of jQuery name space