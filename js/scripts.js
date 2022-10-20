$(document).ready(function(){
  $('select').change(function(){
    if($("select").val()=="N_Edicion"|$("select").val()=="N_Pag"|
    $("select").val()=="N_Estanteria"|$("select").val()=="N_Ejemplares"|
    $("select").val()=="Id_Editorial"|$("select").val()=="Id_Autor"|
    $("select").val()=="Precio"){
      $('#Update_A_input_chang').prop("type", "number");
    }else if($("select").val()=="Copyright"){
      $('#Update_A_input_chang').prop("type", "date");
    }else if($("select").val()=="Telefono"){
      $('#Update_A_input_chang').prop("type", "tel");
      $('#Update_A_input_chang').prop("placeholder", "###-####");
      $('#Update_A_input_chang').prop("pattern", "[0-9]{3}-[0-9]{4}");
    }else{
      $('#Update_A_input_chang').prop("type", "text");
      $('#Update_A_input_chang').prop("placeholder", "Ingrese Valor...");
    }
  });
});
