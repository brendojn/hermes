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
                    <a href="<?php echo BASE_URL; ?>trails/add" class="btn btn-default">Cadastrar Trilha</a>
                </div>
            </form>
        </div>
    </div>
</div>
<table class="table table-striped">
    <thead>
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
    </tr>
    </thead>
    <?php
    foreach ($trails as $trail):
        ?>
        <tr>
            <td><?php echo $trail['name_trail']; ?></td>
            <td><?php echo $trail['description']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>