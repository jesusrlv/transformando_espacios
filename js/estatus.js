function estatus2() {
  var etapa1 = document.getElementById("etapa1");
  var etapa2 = document.getElementById("etapa2");
  var etapa3 = document.getElementById("etapa3");

  $.ajax({
    url: "query/estatus.php",
    type: "POST",
    dataType: "json",
    success: function (data) {
      if (data.etapa1 == 0 || data.etapa1 == null) {
        if (etapa1) {
          etapa1.hidden = false;
        }
      }
      else {
        if (etapa1) {
          etapa1.hidden = true;
        }
      }
      if (data.etapa2 == 1) {
        if (etapa2) {
          etapa2.hidden = false;
        }
      }
      else {
        if (etapa2) {
          etapa2.hidden = true;
        }
      }
      if (data.etapa3 == 1) {
        if (etapa3) {
          etapa3.hidden = false;
        }
      }
      else {
        if (etapa3) {
          etapa3.hidden = true;
        }
      }
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud AJAX:", error);
    },
  });
  
}

estatus2();