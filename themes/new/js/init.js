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
        //$('#SelecionaMes').remove();
      }, 
      success: function ( RESPOSTA ) {
        Materialize.toast('Pronto! Selecione o mês!', 4000);
        $('#SelecionaMes').replaceWith(RESPOSTA.select);
        $('#SelectMes').fadeIn();

        
      }
    })
  })
})(jQuery); // end of jQuery name space