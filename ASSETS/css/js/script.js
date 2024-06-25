// assets/js/script.js
$(document).ready(function() {
    // Calcula a idade automaticamente
    $('#data_nascimento').on('change', function() {
        const birthDate = new Date($(this).val());
        const today = new Date();
        let age = today.getFullYear() - birthDate.getFullYear();
        const m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        $('#idade').val(age);
    });

    // Adiciona nova experiência profissional
    $('#add-experiencia').on('click', function() {
        const experienciaHTML = `
            <div class="experiencia">
                <input type="text" name="experiencia_titulo[]" placeholder="Título" class="form-control" required>
                <input type="text" name="experiencia_empresa[]" placeholder="Empresa" class="form-control" required>
                <input type="date" name="experiencia_inicio[]" placeholder="Data de Início" class="form-control" required>
                <input type="date" name="experiencia_fim[]" placeholder="Data de Fim" class="form-control">
                <textarea name="experiencia_descricao[]" placeholder="Descrição" class="form-control" required></textarea>
            </div>`;
        $('#experiencias').append(experienciaHTML);
    });

    // Adiciona novo histórico educacional
    $('#add-historico').on('click', function() {
        const historicoHTML = `
            <div class="historico">
                <input type="text" name="historico_instituicao[]" placeholder="Instituição" class="form-control" required>
                <input type="text" name="historico_curso[]" placeholder="Curso" class="form-control" required>
                <input type="date" name="historico_inicio[]" placeholder="Data de Início" class="form-control" required>
                <input type="date" name="historico_fim[]" placeholder="Data de Fim" class="form-control">
            </div>`;
        $('#historico_educacional').append(historicoHTML);
    });
});
