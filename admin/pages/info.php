<?php
	
	$result = mysqli_query($connection, "SELECT * FROM `pages` WHERE `page` = 'info'");
	$record = mysqli_fetch_assoc($result);
	
?>

<!-- Info -->
<div id="info" class="container-fluid bg-wjite pt-5 pb-5">
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col">
				<form method="post" action="">
					<p><textarea id="infoContent" class="form-control" name="infoContent" placeholder="Введите описание услуги"><?php echo $record['content']; ?></textarea></p>
					<script>
						$('#infoContent').summernote({
							tabsize: 2,
							height: 300,
							toolbar: [
								['bold'],
								['italic'],
								['underline'],
								['clear'],
								['ul'],
								['ol'],
								['paragraph'],
								['codeview']
							]
						});
					</script>
					<p class="text-center"><button name="saveInfoContent" type="submit" class="btn btn-danger">Сохранить</button></p>
				</form>
			</div>
		</div>
	</div>
</div>