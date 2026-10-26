<?php
include('qc.php');

$sqlQuery = "SELECT * FROM catalogo_documentos ORDER BY id ASC";
$resultadoQuery = $conn -> query($sqlQuery);
$noCatalogoquery = $resultadoQuery->num_rows;

    // query docs usr
    $sqlDocs = "SELECT * FROM documentos WHERE id_ext = '$id'";
    $resultadoDocs = $conn -> query($sqlDocs);
    $no_resultadosX = $resultadoDocs->num_rows;

    // links 4
    $sqlLinks4 = "SELECT * FROM documentos WHERE id_ext = '$id' AND documento = 4";
    $resultadoLinks4 = $conn -> query($sqlLinks4);
    $no_links4 = mysqli_num_rows($resultadoLinks4);
    if($no_links4 > 0){
        $sumaLinks4 = 1;
    }else{
        $sumaLinks4 = 0;
    }

    // links 20
    $sqlLinks20 = "SELECT * FROM documentos WHERE id_ext = '$id' AND documento = 20";
    $resultadoLinks20 = $conn -> query($sqlLinks20);
    $no_links20 = mysqli_num_rows($resultadoLinks20);
    if($no_links20 > 0){
        $sumaLinks20 = 1;
    }else{
        $sumaLinks20 = 0;
    }

    $no_resultados = $no_resultadosX + $sumaLinks4 + $sumaLinks20;

    $resultadoSuma = ($no_resultados * 100)/($noCatalogoquery);
    $porcentajeDocs = round($resultadoSuma);
        if($no_resultados == 0){
            echo '
            <div class="col">
                <div class="card border-danger" style="height:300px;background-color:rgba(250, 6, 22, 0.1);">
                    <div class="card-body">
                        <p><h5 class="card-title">Estatus del perfil</h5></p>
                        <p><h6 class="card-subtitle mb-2 text-muted">Documentos cargados en el sistema</h6></p>
                        <p class="card-text text-center display-1"><span id="">0</span></p>
                        <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: '.$porcentajeDocs.'%">'.$porcentajeDocs.'%</div>
                        </div>
                        <input id="contarDocs" hidden value="0">
                    </div>
                </div>
            </div>
        ';
        }
        else if($no_resultados == 1 || $no_resultados == 2 || $no_resultados == 3 || $no_resultados == 4 || $no_resultados == 5 || $no_resultados == 6 || $no_resultados == 7 || $no_resultados == 8|| $no_resultados == 9 || $no_resultados == 10 || $no_resultados == 11 || $no_resultados == 12 || $no_resultados == 13 || $no_resultados == 14 || $no_resultados == 15 || $no_resultados == 16 || $no_resultados == 17 || $no_resultados == 18 || $no_resultados == 19 || $no_resultados == 20 || $no_resultados == 21){
            echo '
            <div class="col">
                <div class="card border-primary text-light" style="height:300px;background-color: rgba(228, 3, 125, 0.9);">
                    <div class="card-body">
                        <p><h5 class="card-title">Estatus del perfil</h5></p>
                        <p><h6 class="card-subtitle mb-2 text-light">Documentos cargados en el sistema</h6></p>
                        <p class="card-text text-center display-1"><span id="">'.$no_resultados.'</span></p>
                        <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: '.$porcentajeDocs.'%">'.$porcentajeDocs.'%</div>
                        </div>
                        <input id="contarDocs" hidden value="'.$no_resultados.'">
                    </div>
                </div>
            </div>
            ';
        }
        else if($no_resultados >= 22){
            echo '
            <div class="col">
                <div class="card border-success" style="height:300px; background-color: rgba(25, 155, 216, 0.9);">
                    <div class="card-body text-light text-center">
                        <p><h5 class="card-title">Estatus del perfil</h5></p>
                        <p><h6 class="card-subtitle mb-2 text-light">Documentos cargados en el sistema</h6></p>
                        <p class="card-text text-center display-1"><span id="">'.$no_resultados.'</span></p>
                        <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: '.$porcentajeDocs.'%">'.$porcentajeDocs.'%</div>
                        </div>
                        <input id="contarDocs" hidden value="'.$no_resultados.'">
                    </div>
                </div>
            </div>
            ';
        }
          
// }

?>