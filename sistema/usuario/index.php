<?php
session_start();

if (!isset($_SESSION['usr'])) {
    echo "<script type=\"text/javascript\">location.href='prcd/sort.php';</script>";
    exit();
}
else{
    $nombre = $_SESSION['nombre'];
    $categoria = $_SESSION['categoria'];
    $perfil = $_SESSION['perfil'];
    $id = $_SESSION['id'];
}
// session_destroy();
// $_SESSION = [];

// echo "<script type=\"text/javascript\">location.href='prcd/sort.php';</script>";

?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="INJUVENTUD" content="Consejo Juvenil">
    <meta name="" content="">
    <link rel="icon" type="image/png" href="../../img/icon.ico" sizes="22x21">
    <title>Perfil Usuario | TRANSFORMANDO ESPACIOS</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script src="../../js/files.js"></script>
    <script src="../../js/estatus.js"></script>
    <!-- <script src="../../js/index.js"></script> -->

     <!-- type font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400&display=swap" rel="stylesheet"> 
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      *{
        font-family: 'Montserrat', sans-serif;
      }
      #colorRounded{
        background-color: rgba(122, 205, 228, 0.7);
      }
      #imgPortrait{
        width:100%; 
      }
      #portada{
        position: relative;
        min-height: calc(100vh - 56px);
        overflow: hidden;
      }
      #portada > img{
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center top;
      }
      #portada > section{
        position: relative;
        z-index: 1;
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      /* buttons hover */

      /* #botonesFiles:hover {
    
        box-shadow: 0 10px 20px rgba(0,0,0,.1), 0 4px 8px rgba(0,0,0,.06);
        transform: scale(1.03);
        transition: width 0.8s, height 0.8s, transform 0.3s;
        
      } */
      .card{
        box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
      }
      .card:hover{
        transform: scale(1.05);
        box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
        transition: width 0.8s, height 0.8s, transform 0.3s;
      }
     
      /* CELULAR */
      @media screen and (max-width: 600px) {
        .card:active{
          transform: scale(1.03);
          transition: width 0.3s, height 0.3s, transform 0.3s;
        }
        #imgPortrait{
          width: 100%;
        }
        #portada{
          min-height: calc(100vh - 56px);
        }
        #colorRounded{
          background-color: rgba(61, 42, 93, 0.4);
          border-radius:0px;
        }
        #textPortada{
          font-size:8px;
        }
      }
    </style>

    
  </head>
  <body onload="contador();categoriaCompleta();">
    
<header>
<span id="inicio"></span>
  <div class="navbar navbar-dark shadow-sm" style="background: rgb(20, 37, 63);">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <img src="../../img/logo_injuventud_0.png" width="20" alt="" class="me-1">
        <strong id="textPortada">POSTULANTE | TRANSFORMANDO ESPACIOS</strong>
      </a>
      <a href="prcd/sort.php" type="button" class="btn btn-sm btn-outline-light"><i class="bi bi-door-open"></i> Salir</a>
    </div>
  </div>
</header>

<main id="imgPortrait">

  <div id="portada">
    <img src="../../img/fondo_transformando_espacios_2.jpg" alt="">
    <section class="text-center container">
    <div class="row py-lg-5"  >
      <div class="col-lg-6 col-md-8 mx-auto rounded p-2" id="colorRounded">
        <h1 class="fw-light"><img src="../../img/logo_transformando.png" alt="" width="100%" style="padding:10px; border-radius: 15px;"></h1>
        <h2 class="fw-bold" style="color:white">Bienvenid@</h2>
        <h2 class="fw-bold" style="color:white"><i class="bi bi-person-circle"></i></h2>
        <h2 class="fw-bold" style="color:white"><?php echo $nombre ?></h2>
        <?php echo '<input type="text" value="'.$categoria.'" id="catCompleto" hidden>' ?>
        <h5 class="fw-bold" style="color:white">Categoría: <label id="categoriaOut"></label></h5>
        <p id="resultSpan"></p>
        <p class="lead text-light mt-2">Sistema de postulación del INJUVENTUD | TRANSFORMANDO ESPACIOS.</p>
        <p>
          <hr class="text-secondary">
          <a href="#seccion_documentos" class="btn btn-primary my-2"><i class="bi bi-filetype-pdf"></i> Sección de documentos</a>
          <a href="#seccion_convocatoria" class="btn btn-secondary my-2"><i class="bi bi-file-earmark-break"></i> Sección convocatoria</a>
        </p>
      </div>
    </div>
    </section>
  </div>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="mb-4">
        <p><span id="seccion_convocatoria"></span>
          <p class="h2">
            <i class="bi bi-file-earmark-break"></i> Sección de convocatoria | 
              <a href="#inicio">
                <i class="bi bi-arrow-bar-up"></i>
              </a>
          </p>
        </p>
        <p><small>Información de<strong> datos personales</strong> y acerca de la convocatoria.</small></p>
      </div>
      
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        <div class="col">
          <div class="card border-light" style="height:300px">
            <div class="card-body">
              <h5 class="card-title">Datos del usuario</h5>
              <h6 class="card-subtitle mb-2 text-muted"><i class="bi bi-exclamation-circle text-danger"></i> Obligatoria</h6>
              <p class="card-text">Nombre, Apellido(s), Domicilio, CURP, Municipio, Escolaridad, etcétera. Para poder llenar los documentos, debes completar de manera inicial esta sección.</p>
            </div>
            <div class="card-footer">
              <a href="#" data-bs-toggle="modal" data-bs-target="#modalVisualizar" class="card-link" style="text-decoration: none"><i class="bi bi-eye"></i> Revisar</a>
              <a href="#" class="card-link" style="text-decoration: none" data-bs-toggle="modal" data-bs-target="#modalEditar"><i class="bi bi-pencil-square"></i> Editar</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card border-light" style="height:300px">
            <div class="card-body">
              <h5 class="card-title">Convocatoria</h5>
              <h6 class="card-subtitle mb-2 text-muted"><i class="bi bi-exclamation-triangle-fill text-warning"></i> Convocatoria vigente</h6>
              <p class="card-text">Convocatoria vigente acerca de la postulación de Transformando Espacios.</p>
              <p><a href="generador_constancia.php" target="_blank" style="text-decoration:none" class="btn btn-primary" id="constanciaP" hidden> <i class="bi bi-file-earmark-richtext"></i> Constancia de participación de Transformando Espacios</a></p>
              
            </div>
            <div class="card-footer">
              <a href="https://juventud.zacatecas.gob.mx/docs/convocatoria_transformando_espacios_2026.pdf" target="_blank" class="card-link" style="text-decoration: none"><i class="bi bi-eye"></i> Revisar</a>
            </div>
          </div>
        </div>
        <?php include('query/docs_contador.php'); ?>
        
      </div><!-- row -->
    </div>
  </div>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="mb-4">
        <p><span id="seccion_documentos"></span>
          <p class="h2" ><i class="bi bi-filetype-pdf"></i> Sección de carga de documentos | <a href="#inicio"><i class="bi bi-arrow-bar-up"></i></a></p></p>
        <p><small>Carga los documentos <strong>(formato PDF)</strong> para poder participar como postulante.</small></p>
      </div>

      <!-- acordeones de carga de documentos -->
       <div class="accordion" id="accordionExample">
        
        <div class="accordion-item etapa1" id="etapa1" hidden>
          <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              <strong class="me-1">Etapa 1: </strong> Carga de documentos | <small class="ms-1"> Revisa los documentos que has cargado</small>
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
             <!-- body acordeon -->
              <!-- inicio row -->
              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
              
                <?php include('query/docs.php'); ?>

              </div>
              <!-- fin row -->
             <!-- body acordeon -->
            </div>
          </div>
        </div>

        <div class="accordion-item" id="etapa2" hidden>
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              <strong class="me-1">Etapa 2: </strong> Pago | <small class="ms-1"> Revisa los documentos que has cargado</small>
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the second item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
        <div class="accordion-item" id="etapa3" hidden>
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              <strong class="me-1">Etapa 3: </strong> Comprobación | <small class="ms-1"> Revisa los documentos que has cargado</small>
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <strong>This is the third item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
          </div>
        </div>
      </div>
      <!-- acordeones de carga de documentos -->

    </div>
  </div>

</main>

<footer class="text-light py-5" style="background:rgba(122, 205, 228, 0.929)">
  <div class="container">
    <div>
      <div class="row">
        <div class="col-sm-3 col-md-6 col-lg-4 mt-2">
          <p class="mb-0 text-center"><img src="../../img/logo_white_02.png"  width="180" alt=""></p>
          <p class="mb-0 mt-1 text-center"><small>&copy; Desarrollo:<br> <strong class="text-light">Tecnologías de la Información | INJUVENTUD</strong></small></p>
          <!-- <p class="mb-0 text-center"><small><a href="/" style="text-decoration: none;" class="text-light">Gobierno del estado de Zacatecas</a>.</small></p> -->
        </div>
        <div class="col-sm-3 col-md-6 col-lg-4 mt-2 text-center">
          <img src="../../img/logo_transformando.png" width="180" alt="">
        </div>
        <div class="col-sm-3 col-md-6 col-lg-4 mt-2">
          <p class="float-end mb-1 text-center">
            <a href="#inicio" style="text-decoration: none;" class="text-light"><i class="bi bi-arrow-bar-up"></i> Arriba</a>
          </p>
        </div>
      </div>
    </div>
    
    
  </div>
</footer>

    <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>

<script>
    $("a[href^='#']").click(function(e) {
    e.preventDefault();
    
    var position = $($(this).attr("href")).offset().top;

    $("body, html").animate({
        scrollTop: position
    } /* speed */ );
});
</script>

<!-- modal datos visualizar -->
<?php 
  include('query/visualizar_datos.php');
  include('prcd/editar_datos.php');
?>
