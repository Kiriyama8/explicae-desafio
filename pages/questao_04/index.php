<?php require_once '../../_partials/header.php'; ?>
<div class="container pt-5">
	<div class="row">
		<div class="col-8 offset-2">
			<form action="FileReader.php" method="post" enctype="multipart/form-data">
				<label for="file">Selecione o arquivo de texto:</label>
				<div class="form-group">
					<input type="file" name="file" required>
				</div>
				<button class="btn btn-dark btn-block" type="submit">Enviar</button>
			</form>
		</div>
	</div>
</div>
<?php require_once '../../_partials/footer.php'; ?>
