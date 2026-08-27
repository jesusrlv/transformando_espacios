function estatus2() {
  var etapa1 = document.getElementById("etapa1");
  var etapa2 = document.getElementById("etapa2");
  var etapa3 = document.getElementById("etapa3");

  $.ajax({
    url: "query/estatus.php",
    type: "POST",
    dataType: "json",
    success: function (data) {
      if (data.etapa1 == 1) {
        if (etapa1) {
          etapa1.removeAttribute("hidden");
        }
      }
      else {
        if (etapa1) {
          etapa1.hidden = true;
        }
      }
      if (data.etapa2 == 1) {
        if (etapa2) {
          etapa2.removeAttribute("hidden");
        }
      }
      else {
        if (etapa2) {
          etapa2.setAttribute("hidden", "hidden");
        }
      }
      if (data.etapa3 == 1) {
        if (etapa3) {
          etapa3.removeAttribute("hidden");
        }
      }
      else {
        if (etapa3) {
          etapa3.setAttribute("hidden", "hidden");
        }
      }
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud AJAX:", error);
    },
  });
  
}

estatus2();