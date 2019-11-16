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
                        <a href="<?php echo BASE_URL; ?>groups/add" class="btn btn-default">Cadastrar Turma</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Responsável</th>
            <th>N° de alunos</th>
            <th>Ações</th>
        </tr>
        </thead>
        <?php
        foreach ($groups as $group):
            ?>
            <tr>
                <td><?php echo $group['name_group']; ?></td>
                <td><?php echo $group['name_teacher']; ?></td>
                <td></td>
                <td>
                        <a href="<?php echo BASE_URL; ?>groups/edit/<?php echo $group['id']; ?>"
                           class="btn btn-default">Editar</a>
                        <a href="groups/delete?group=<?php echo $group['id']; ?>"
                           class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>