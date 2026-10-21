<?php

include('qc.php');

$id = $_POST['idU'];
$doc = $_POST['idD'];

$sql = "SELECT * FROM documentos WHERE id_ext = '$id' AND documento = '$doc' AND link LIKE '%archivo_foto_despues%'";
$resultado = $conn -> query($sql);
$fila = $resultado -> num_rows;
if ($fila == 0){
    echo '<div class="alert alert-danger text-center" role="alert">
            
          </div>';
           echo '<div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <img src="../'.$row['link'].'" class="img-fluid rounded-1" alt="Foto Antes">
                    </div>
                </div>
            </div>';
}
else{
    while ($row = $resultado -> fetch_assoc()){
        echo '<div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <i class="bi bi-file-earmark-excel-fill text-danger h1"></i> 
                        <p>No se han subido fotos de este tipo</p>
                    </div>
                </div>
            </div>';
    }
}

?>