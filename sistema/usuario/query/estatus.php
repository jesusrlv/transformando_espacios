<?php
session_start();
include('qc.php');

$id = $_SESSION['id'];

// VALIDACIÓN: Verificar que el ID no esté vacío
if (empty($id)) {
    echo json_encode(array(
        'etapa1' => 0,
        'etapa2' => 0,
        'etapa3' => 0,
        'error' => 'ID de usuario no proporcionado'
    ));
    exit();
}

// Consulta preparada (más segura)
// $sql = "SELECT * FROM estatus WHERE id_ext = ?";
$sql1 = "SELECT COUNT(*) AS docs1 FROM documentos WHERE id_ext = $id";
$resultadosql1 = $conn->query($sql1);
$fila1 = $resultadosql1->num_rows;

// VERIFICAR si hay resultados
if ($fila1 < 16) {
    // Hay datos, obtenerlos
    $etapa1 = 1;
    $etapa2 = 0;
    $etapa3 = 0;
} else if ($fila1 > 15 && $fila1 < 19) {
    // NO hay datos, asignar ceros
    $etapa1 = 1;
    $etapa2 = 1;
    $etapa3 = 0;
} else if ($fila1 >= 19) {
    // NO hay datos, asignar ceros
    $etapa1 = 1;
    $etapa2 = 1;
    $etapa3 = 1;
} else {
    // Caso por defecto si no se cumplen las condiciones anteriores
    $etapa1 = 0;
    $etapa2 = 0;
    $etapa3 = 0;
}

// Devolver JSON siempre con valores
echo json_encode(array(
    'etapa1' => $etapa1,
    'etapa2' => $etapa2,
    'etapa3' => $etapa3
));

$conn->close();

?>