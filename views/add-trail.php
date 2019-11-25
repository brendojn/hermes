<?php
if (empty($_SESSION['logged'])) {
    ?>
    <script type="text/javascript">window.location.href = "<?php echo BASE_URL; ?>login";</script>
    <?php
    exit;
}
?>
<div class="container">
    <h1>Trilha - Adicionar Trilha</h1>

    <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="name">Nome da trilha:</label>
            <input type="text" name="name" id="txtName" class="form-control" required/>
        </div>

        <div class="form-group">
            <label for="description">Descrição da trilha:</label>
            <input type="text" name="description" id="txtDescription" class="form-control" required/>
        </div>

        <br/>

        <input type="submit" value="Adicionar" class="btn btn-default"/>
    </form>

</div>