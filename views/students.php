<?php
if (empty($_SESSION['logged'])) {
    ?>
    <script type="text/javascript">window.location.href = "<?php echo BASE_URL; ?>login";</script>
    <?php
    exit;
}
?>
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <form method="GET">
                <div class="form-group">
                    <a href="<?php echo BASE_URL; ?>students/add" class="btn btn-default">Cadastrar Aluno</a>
                </div>
            </form>
        </div>
    </div>
</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Turma</th>
        <th>Ações</th>
    </tr>
    </thead>
    <?php
    foreach ($students as $student):
        ?>
        <tr>
            <td><?php echo $student['name_student']; ?></td>
            <td><?php echo $student['email']; ?></td>
            <td><?php echo $student['name_group']; ?></td>
            <td>
                <a href="<?php echo BASE_URL; ?>students/edit/<?php echo $student['id']; ?>"
                   class="btn btn-default">Editar</a>
                <a href="students/delete/<?php echo $student['id']; ?>"
                   class="btn btn-danger">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>