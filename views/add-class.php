<?php
if (empty($_SESSION['logged'])) {
    ?>
    <script type="text/javascript">window.location.href = "<?php echo BASE_URL; ?>login";</script>
    <?php
    exit;
}
?>
<div class="container">
    <h1>Turma - Adicionar Turma</h1>

    <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="name">Nome da turma:</label>
            <input type="text" name="name" id="txtName" class="form-control" required/>
        </div>

        <div class="form-group">
            <label for="description">Descrição da turma:</label>
            <input type="text" name="description" id="txtDescription" class="form-control" required/>
        </div>

        <div class="form-group">
            <label for="employee">Professor Responsável:</label>
            <select name="responsibility" id="selectResponsibility" class="form-control">
                <?php
                foreach ($teachers as $teacher):
                    ?>
                    <option value="<?php echo $teacher['id']; ?>"><?php echo utf8_encode($teacher['name_teacher']); ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <br/>

        <input type="submit" value="Adicionar" class="btn btn-default"/>
    </form>

</div>