<html>
    <head>
        <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Hermes</title>
	    <link href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div id="navbar">
					<ul class="nav navbar-nav navbar-left">
						<li><a href="<?php echo BASE_URL; ?>">Hermes</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?php echo BASE_URL; ?>login/enter">Login</a></li>
						<li><a href="<?php echo BASE_URL; ?>login/add">Cadastrar</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
	        <h1>Cadastrar</h1>
            <br/>
	        <?php if(!empty($erro)): ?>
	        <div class="alert alert-danger"><?php echo $erro; ?></div>
		    <?php endif; ?>

	        <form method="POST">

	        	<div class="form-group">
	        		<label for="name">Nome Completo:</label>
	        		<input type="text" class="form-control" name="name" id="txtName" required/>
	        	</div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="txtEmail" required/>
                </div>

                <div class="form-group">
                    <label for="subject">Disciplina:</label>
                    <input type="text" class="form-control" name="subject" id="txtSubject" required/>
                </div>

                <div class="form-group">
                    <label for="registration">Registro:</label>
                    <input type="number" class="form-control" name="registration" id="txtRegistration" required/>
                </div>

	        	<div class="form-group">
	        		<label for="password">Senha:</label>
	        		<input type="password" class="form-control" name="password" id="txtPassword" required/>
	        	</div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="checkAdmin" value="sim" name="admin">
                    <label class="form-check-label" for="admin">Administrador</label>
                </div>
                <br/>
	        	<button type="submit" class="btn btn-default">Cadastrar</button>

	        </form>






















	    </div>
    </body>
</html>
