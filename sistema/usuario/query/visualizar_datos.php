<?php
    include('qc.php');

    $sqlVisualizar = "SELECT * FROM usr WHERE id = '$id'";
    $resultadoVisualizar = $conn -> query($sqlVisualizar);
    $rowVisualizar = $resultadoVisualizar -> fetch_assoc();
    $municipio = $rowVisualizar['municipio'];

    $sqlMunicipio ="SELECT * FROM municipio WHERE id = '$municipio'";
    $resultadoMunicipio = $conn -> query($sqlMunicipio);
    $rowMunicipio = $resultadoMunicipio -> fetch_assoc();

    $categoria = $rowVisualizar['categoria'];

    $sqlCategoria ="SELECT * FROM categorias WHERE id = '$categoria'";
    $resultadoCategoria = $conn -> query($sqlCategoria);
    $rowCategoria = $resultadoCategoria -> fetch_assoc();

    echo'
    <!-- Modal visualizar-->
    <div class="modal fade" id="modalVisualizar"  data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header bg-secondary text-light">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-person-circle"></i> Datos personales</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body align-items-center">
                <div class="input-group mb-1">
                    <div class="alert alert-secondary w-25 border text-center" role="alert">
                        <i class="bi bi-person-circle h5"></i>
                    </div>
                    <div class="alert alert-light w-75 border" role="alert">
                            <strong>Nombre: </strong>'.$rowVisualizar['nombre'].'
                    </div>
                </div>
                <div class="input-group mb-1">
                    <div class="alert alert-secondary w-25 border text-center" role="alert">
                    <i class="bi bi-bookmarks"></i>
                    </div>
                    <div class="alert alert-light w-75 border" role="alert">
                            <strong>Categoría: </strong>'.$rowCategoria['nombre'].'
                    </div>
                </div>
                <div class="input-group mb-1">
                    <div class="alert alert-secondary w-25 border text-center" role="alert">
                    <i class="bi bi-person-bounding-box"></i>
                    </div>
                    <div class="alert alert-light w-75 border" role="alert">
                            <strong>Usuario: </strong>'.$rowVisualizar['usr'].'
                    </div>
                </div>
                <div class="input-group mb-1">
                    <div class="alert alert-secondary w-25 border text-center" role="alert">
                    <i class="bi bi-upc-scan"></i>
                    </div>
                    <div class="alert alert-light border w-75" role="alert">
                            <strong>CURP: </strong>'.$rowVisualizar['rfc'].'
                    </div>
                </div>
                <div class="input-group mb-1">
                    <div class="alert alert-secondary w-25 border text-center" role="alert">
                    <i class="bi bi-123"></i>
                    </div>
                    <div class="alert alert-light border w-75" role="alert">
                            <strong>Institución: </strong>'.$rowVisualizar['institucion'].'
                    </div>
                </div>
                <div class="input-group mb-1">
                    <div class="alert alert-secondary w-25 border text-center" role="alert">
                    <i class="bi bi-123"></i>
                    </div>
                    <div class="alert alert-light border w-75" role="alert">
                            <strong>Cargo: </strong>'.$rowVisualizar['cargo'].'
                    </div>
                </div>
                <div class="input-group mb-1">
                    <div class="alert alert-secondary w-25 border text-center" role="alert">
                    <i class="bi bi-123"></i>
                    </div>
                    <div class="alert alert-light border w-75" role="alert">
                            <strong>Ubicación: </strong>'.$rowVisualizar['ubicacion'].'
                    </div>
                </div>
                <div class="input-group mb-1">
                    <div class="alert alert-secondary w-25 border text-center" role="alert">
                    <i class="bi bi-123"></i>
                    </div>
                    <div class="alert alert-light border w-75" role="alert">
                            <strong>Calle: </strong>'.$rowVisualizar['calle'].'
                    </div>
                </div>
                <div class="input-group mb-1">
                    <div class="alert alert-secondary w-25 border text-center" role="alert">
                    <i class="bi bi-123"></i>
                    </div>
                    <div class="alert alert-light border w-75" role="alert">
                            <strong>Número: </strong>'.$rowVisualizar['numero'].'
                    </div>
                </div>
                <div class="input-group mb-1">
                    <div class="alert alert-secondary w-25 border text-center" role="alert">
                    <i class="bi bi-123"></i>
                    </div>
                    <div class="alert alert-light border w-75" role="alert">
                            <strong>Colonia: </strong>'.$rowVisualizar['colonia'].'
                    </div>
                </div>
                <div class="input-group mb-1">
                    <div class="alert alert-secondary w-25 border text-center" role="alert">
                    <i class="bi bi-123"></i>
                    </div>
                    <div class="alert alert-light border w-75" role="alert">
                            <strong>Comunidad: </strong>'.$rowVisualizar['comunidad'].'
                    </div>
                </div>
                <div class="input-group mb-1">
                    <div class="alert alert-secondary w-25 border text-center" role="alert">
                    <i class="bi bi-123"></i>
                    </div>
                    <div class="alert alert-light border w-75" role="alert">
                            <strong>Código postal: </strong>'.$rowVisualizar['cp'].'
                    </div>
                </div>
                <div class="input-group mb-1">
                    <div class="alert alert-secondary w-25 border text-center" role="alert">
                        <i class="bi bi-globe-americas"></i>
                    </div>
                    <div class="alert alert-light border w-75" role="alert">
                            <strong>Municipio: </strong>'.$rowMunicipio['municipio'].'
                    </div>
                </div>
                <div class="input-group mb-1">
                    <div class="alert alert-secondary w-25 border text-center" role="alert">
                        <i class="bi bi-globe-americas"></i>
                    </div>
                    <div class="alert alert-light border w-75" role="alert">
                            <strong>Télefono: </strong>'.$rowMunicipio['telefono'].'
                    </div>
                </div>
                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>';
