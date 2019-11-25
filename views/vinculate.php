<?php
if (empty($_SESSION['logged'])) {
    ?>
    <script type="text/javascript">window.location.href = "<?php echo BASE_URL; ?>login";</script>
    <?php
    exit;
}
?>
<div class="container">
    <h1>Turma - Vincular Trilha</h1>

    <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="txtName">Nome da turma:</label>
            <input type="text" name="name" id="txtName" class="form-control" value="<?php echo $getGroup['name_group'] ?>" disabled/>
        </div>

        <div class="form-group">
            <label for="txtDescription">Descrição da turma:</label>
            <input type="text" name="description" id="txtDescription" class="form-control" value="<?php echo $getGroup['description'] ?>" disabled/>
        </div>

        <div class="form-group">
            <label for="selectResponsibility">Professor Responsável:</label>
            <select name="responsibility" id="selectResponsibility" class="form-control" disabled>
                <?php
                foreach ($teachers as $teacher):
                    ?>
                    <option value="<?php echo $teacher['id']; ?>"
                        <?php echo $teacherGroup['id'] == $teacher['id'] ? 'selected' : ''; ?>><?php echo utf8_encode($teacher['name_teacher']); ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="selectTrail">Trilha:</label>
            <select name="trail" id="selectTrail" class="form-control">
                <?php
                foreach ($trails as $trail):
                    ?>
                    <option value="<?php echo $trail['id']; ?>"><?php echo utf8_encode($trail['name_trail']); ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <br/>

        <input type="submit" value="Salvar" class="btn btn-default"/>
    </form>

</div>