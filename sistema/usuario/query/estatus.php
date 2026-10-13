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
$row = $resultadosql1->fetch_assoc();
$fila1 = $row['docs1'];

if ($fila1 <= 15) {
    $etapa1 = 1;
    $etapa2 = 0;
    $etapa3 = 0;
} else if ($fila1 > 15 && $fila1 < 19) {   // ✅ && en lugar de ||
    $etapa1 = 1;
    $etapa2 = 1;
    $etapa3 = 0;
} else if ($fila1 >= 19) {
    $etapa1 = 1;
    $etapa2 = 1;
    $etapa3 = 1;
} else {
    $etapa1 = 0;
    $etapa2 = 0;
    $etapa3 = 0;
}

// Devolver JSON siempre con valores
echo json_encode(array(
    'etapa1' => $etapa1,
    'etapa2' => $etapa2,
    'etapa3' => $etapa3,
    'numero' => $fila1
));

$conn->close();

?>