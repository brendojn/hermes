<html>
    <head>
        <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Hermes</title>
	    <link href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
		<div class="container">
	        <h1>Login</h1>

	        <?php if(!empty($erro)): ?>
	        <div class="alert alert-danger"><?php echo $erro; ?></div>
		    <?php endif; ?>

	        <form method="POST">

	        	<div class="form-group">
	        		<label for="email">Email:</label>
	        		<input type="email" class="form-control" name="email" id="txtEmail" required />
	        	</div>

	        	<div class="form-group">
	        		<label for="password">Senha:</label>
	        		<input type="password" class="form-control" name="password" id="password" required/>
	        	</div>

	        	<button type="submit" class="btn btn-default">Entrar</button>

	        </form>

	    </div>
    </body>
</html>
