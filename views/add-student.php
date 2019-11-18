<?php
if (empty($_SESSION['logged'])) {
    ?>
    <script type="text/javascript">window.location.href = "<?php echo BASE_URL; ?>login";</script>
    <?php
    exit;
}
?>
<div class="container">
    <h1>Aluno - Adicionar Aluno</h1>

    <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="name">Nome do aluno:</label>
            <input type="text" name="name" id="txtName" class="form-control" required/>
        </div>

        <div class="form-group">
            <label for="email">Email do aluno:</label>
            <input type="email" name="email" id="txtEmail" class="form-control" required/>
        </div>

        <div class="form-group">
            <label for="period">Período:</label>
            <select name="period" id="selectPeriod" class="form-control">
                <?php
                for ($i = 1; $i <= 8; $i++):
                    ?>
                    <option value="<?php echo $i; ?>"><?php echo utf8_encode("Periodo " . $i); ?></option>
                <?php
                endfor;
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="registration">Registro:</label>
            <input type="number" class="form-control" name="registration" id="txtRegistration" required/>
        </div>

        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" class="form-control" name="password" id="txtPassword" required/>
        </div>

        <div class="form-group">
            <label for="group">Turma:</label>
            <select name="group" id="selectGroup" class="form-control">
                <?php
                foreach ($groups as $group):
                    ?>
                    <option value="<?php echo $group['id']; ?>"><?php echo utf8_encode($group['name_group']); ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        <br/>

        <input type="submit" value="Adicionar" class="btn btn-default"/>
    </form>

</div>