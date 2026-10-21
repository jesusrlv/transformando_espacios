<?php    
    session_start();
    include('../query/qc.php');

    date_default_timezone_set('America/Mexico_City');
                  setlocale(LC_TIME, 'es_MX.UTF-8');
    
    $idUsr = $_POST['idUsuario'];
    $doc = $_POST['documento'];
    $fecha_sistema = strftime("%Y-%m-%d,%H:%M:%S");
    $link= 'archivo_foto_antes_'.$doc;

    $sql = "SELECT * FROM documentos WHERE id_ext = '$idUsr' AND documento = '$doc'";
    $resultado = $conn -> query($sql);
    $fila = $resultado -> num_rows;
    if($fila>0){
        $numero = $fila + 1;
        $link= 'archivo_foto_antes_'.$doc.'_'.$numero;
    } 
    else if($fila == 5){
        echo "Ya se han subido 5 archivos de este tipo, no es posible subir más.";
        exit();
    }
    else if($fila ==0){
        $numero = 1;
        $link= 'archivo_foto_antes_'.$doc.'_'.$numero;
    }

    $fileName = $_FILES["file"]["name"]; // The file name
    $fileTmpLoc = $_FILES["file"]["tmp_name"]; // File in the PHP tmp folder
    $fileType = $_FILES["file"]["type"]; // The type of file it is
    $fileSize = $_FILES["file"]["size"]; // File size in bytes
    $fileErrorMsg = $_FILES["file"]["error"]; // 0 for false... and 1 for true
    if (!$fileTmpLoc) { // if file not chosen
        echo "ERROR: Please browse for a file before clicking the upload button.";
        exit();
    }

    $archivo_ext=$_FILES['file']['name'];
    $extension = pathinfo($archivo_ext, PATHINFO_EXTENSION);

    if(move_uploaded_file($_FILES["file"]["tmp_name"],"../../docs/". $link .'_'. $idUsr .'.'.$extension)){
    echo "$fileName carga completa";
    
    $ruta = "docs/". $link .'_'. $idUsr .'.'.$extension;
    $sqlInsert= "INSERT INTO documentos (documento,id_ext,link,fecha) 
    VALUES('$doc','$idUsr','$ruta','$fecha_sistema')";
    $resultado= $conn->query($sqlInsert);
    
} else {
    echo "move_uploaded_file function failed";
}
    
?>