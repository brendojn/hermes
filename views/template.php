<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hermes</title>
    <link href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/template.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="<?php echo BASE_URL; ?>" class="navbar-brand">Sistema Contábil - Hermes</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <?php if (isset($_SESSION['logged']) && !empty($_SESSION['logged'])): ?>
                <li><a href="<?php echo BASE_URL; ?>groups">Turmas</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo $viewData['teacher_name']; ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo BASE_URL; ?>students">Alunos</a></li>
                        <li><a href="<?php echo BASE_URL; ?>login/sair">Sair</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li><a href="<?php echo BASE_URL; ?>login/enter">Login</a></li>
                <li><a href="<?php echo BASE_URL; ?>login/add">Cadastre-se</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<div class="container">
    <?php
    $this->loadViewInTemplate($viewName, $viewData);
    ?>
</div>
</body>
</html>
