function estatus2() {
  var etapa1 = document.getElementById("etapa1");
  var etapa2 = document.getElementById("etapa2");
  var etapa3 = document.getElementById("etapa3");

  $.ajax({
    url: "query/estatus.php",
    type: "POST",
    dataType: "json",
    success: function(data) {
      if (data.etapa1 == 0 || data.etapa1 == null) {
       
          etapa1.hidden = true;
       
      }
      else if (data.etapa1 == 1) {
       
          etapa1.hidden = false;
    
      }

      if (data.etapa2 == 0 || data.etapa2 == null) {
        
          etapa2.hidden = true;
        
      }
      else if (data.etapa2 == 1) {
        
          etapa2.hidden = false;
        
      }

      if (data.etapa3 == 0 || data.etapa3 == null) {
        
          etapa3.hidden = true;
        
      }
      else if (data.etapa3 == 1) {

          etapa3.hidden = false;
        
      }

    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud AJAX:", error);
    },
  });
  
}

estatus2();