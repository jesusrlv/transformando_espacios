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
$sql = "SELECT * FROM estatus WHERE id_ext = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id); // "s" indica que el parámetro es una cadena
$stmt->execute();
$resultadosql = $stmt->get_result();

// VERIFICAR si hay resultados
if ($resultadosql->num_rows > 0) {
    // Hay datos, obtenerlos
    $row = $resultadosql->fetch_assoc();
    $etapa1 = $row['etapa1'];
    $etapa2 = $row['etapa2'];
    $etapa3 = $row['etapa3'];
} else {
    // NO hay datos, asignar ceros
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

$stmt->close();
$conn->close();

?>