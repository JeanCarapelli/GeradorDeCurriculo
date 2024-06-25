<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];    
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $cnh = $_POST['cnh'];
    $qualidades = $_POST['qualidades'];
    $defeitos = $_POST['defeitos'];

    // Upload da foto
    $foto = null;
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $ext = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
        $foto = 'uploads/' . uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['foto']['tmp_name'], $foto);
    }

    $experiencias = $_POST['experiencia_titulo'];
    $historicos = $_POST['historico_instituicao'];

    include 'templates/curriculum-template.php';
}
?>