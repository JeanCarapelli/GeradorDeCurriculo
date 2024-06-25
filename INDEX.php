<!-- index.php -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículos</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículos</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: gray;
        color: #333;

    }

    .container {
        background-color: #fff;

        border-radius: 20px;
        padding: 100px;

        box-shadow: 0px 0px 1px 10px rgba(0, 0, 0, 0.5);

    }

    h1 {
        text-transform: uppercase;
        font-size: 2.5rem;
        margin-bottom: 20px;
        font-weight: bold;
        text-align: center;
        font-family: monospace;
    }

    label {
        text-transform: uppercase;
        font-weight: bold;
        font-family: monospace;

    }

    input[type="text"],
    input[type="date"],
    input[type="email"],
    input[type="number"],
    textarea,
    select {
        text-transform: uppercase;
        font-family: Arial, sans-serif;
        border: 2px solid gray;
        border-radius: 5px;
        padding: 5px;
        margin-bottom: 10px;
        width: 100%;
        box-sizing: border-box;

    }

    input[type="file"] {
        margin-top: 10px;

    }

    .form-group {
        margin-bottom: 10px;

    }

    button[type="submit"],
    button[type="button"] {
        text-transform: uppercase;
        font-family: Arial, sans-serif;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"] {
        background-color: red;

        color: #fff;

    }

    button[type="button"]:hover {
        background-color: darkblue;

    }



    button[type="submit"]:hover {
        background-color: darkred;
    }


    <style>.fixed-top {
        position: fixed;

        top: 0;

        width: 100%;

        z-index: 1000;

    }
    </style>
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1>Gerador de Currículos</h1>
        <form id="curriculo-form" action="process.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="cnh">CNH:</label>
                <input type="text" id="cnh" name="cnh" class="form-control">
            </div>
            <div class="form-group">
                <label for="qualidades">Qualidades:</label>
                <textarea id="qualidades" name="qualidades" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="defeitos">Defeitos:</label>
                <textarea id="defeitos" name="defeitos" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" id="foto" name="foto" class="form-control">
            </div>
            <div class="form-group">
                <label for="experiencias">Experiências Profissionais:</label>

                <div id="experiencias-container">
                    <div class="experiencia">
                        <input type="text" name="experiencia_titulo[]" placeholder="Título" class="form-control"
                            required>
                        <input type="text" name="experiencia_empresa[]" placeholder="Empresa" class="form-control"
                            required>
                        <input type="date" name="experiencia_inicio[]" placeholder="Data de Início" class="form-control"
                            required>
                        <input type="date" name="experiencia_fim[]" placeholder="Data de Fim" class="form-control">
                        <textarea name="experiencia_descricao[]" placeholder="Descrição" class="form-control"
                            required></textarea>
                    </div>
                </div>
                <button type="button" id="add-experiencia" class="btn btn-primary">Adicionar Experiências</button>
            </div>
            <div class="form-group">
                <label for="historico_escolar">Histórico Escolar:</label>
                <div id="historico_escolar">
                    <div class="historico">
                        <input type="text" name="historico_instituicao[]" placeholder="Instituição" class="form-control"
                            required>
                        <input type="text" name="historico_curso[]" placeholder="Curso" class="form-control" required>
                        <input type="date" name="historico_inicio[]" placeholder="Data de Início" class="form-control"
                            required>
                        <input type="date" name="historico_fim[]" placeholder="Data de Fim" class="form-control">
                    </div>
                </div>
                <button type="button" id="add-historico" class="btn btn-primary">Adicinar Histórico</button>
            </div>
            <button type="submit" class="btn btn-success">Gerar Currículo</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
    $(document).ready(function() {
        $('#add-experiencia').click(function() {
            $('#experiencias-container').append(`
                    <div class="experiencia">
                        <input type="text" name="experiencia_titulo[]" placeholder="Título" class="form-control" required>
                        <input type="text" name="experiencia_empresa[]" placeholder="Empresa" class="form-control" required>
                        <input type="date" name="experiencia_inicio[]" placeholder="Data de Início" class="form-control" required>
                        <input type="date" name="experiencia_fim[]" placeholder="Data de Fim" class="form-control">
                        <textarea name="experiencia_descricao[]" placeholder="Descrição" class="form-control" required></textarea>
                    </div>
                `);
        });

        $('#add-historico').click(function() {
            $('#historico_escolar').append(`
                    <div class="historico">
                        <input type="text" name="historico_instituicao[]" placeholder="Instituição" class="form-control" required>
                        <input type="text" name="historico_curso[]" placeholder="Curso" class="form-control" required>
                        <input type="date" name="historico_inicio[]" placeholder="Data de Início" class="form-control" required>
                        <input type="date" name="historico_fim[]" placeholder="Data de Fim" class="form-control">
                    </div>
                `);
        });
    });
    </script>
</body>

</html>