<?php
	
	$serviceID = $_GET['serviceID'];
	$result = mysqli_query($connection, "SELECT * FROM `services` WHERE `serviceID` = '$serviceID'");
	$record = mysqli_fetch_assoc($result);
	
?>

<!-- Service content -->
<div class="container-fluid pt-5 pb-5" style="background: url(img/bg.jpg); min-height: 100vh;">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 class="text-center">Изменить услугу</h2>
			</div>
		</div>
		<div class="row justify-content-center" style="padding-top: 15px; padding-bottom: 25px;">
			<div class="col-md-10">
				<form method="post" action=""><!--enctype="multipart/form-data"-->
					<input type="hidden" name="serviceID" value="<?php echo $record['serviceID']; ?>">
					<label for="serviceParentName">Название родительской услуги:</label>
					<?php
						
						$serviceParentID = $record['serviceParentID'];
						if ($serviceParentID == 0) {
							$serviceParentName = 'Нет родительской услуги';
						} else {
							$result2 = mysqli_query($connection, "SELECT * FROM `services` WHERE `serviceID` = '$serviceParentID'");
							$record2 = mysqli_fetch_assoc($result2);
							$serviceParentName = $record2['serviceName'];
						}
						
					?>
					
					<p><input type="text" class="form-control" name="serviceParentName" value="<?php echo $serviceParentName; ?>" disabled></p>
					<label for="serviceName">Название услуги:</label>
					<p><input type="text" class="form-control" name="serviceName" value="<?php echo $record['serviceName']; ?>" required></p>
					<label for="serviceContent">Описание услуги:</label>
					<p><textarea id="summernote" class="form-control" name="serviceContent" placeholder="Введите описание услуги"><?php echo $record['serviceContent']; ?></textarea></p>
					<script>
						$('#summernote').summernote({
							tabsize: 2,
							height: 200,
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
					<!--
					<p><input type="file" name="filename" style="max-width: 250px; margin: auto;" required>
					-->
					<p class="text-center"><button name="saveService" type="submit" class="btn btn-danger">Сохранить</button></p>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Service content -->