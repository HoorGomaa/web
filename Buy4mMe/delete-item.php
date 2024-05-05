<?php $title="Delete Item"; ?>
<?php $section="delete"; ?>
<?php include('header.php'); ?>
<?php


?>
<div class="content">
	<div class="page section">
		<h1>Delete Item</h1>
		<?php 
			$id = $_GET['id'];
			include('connection.php');
			$query = "DELETE FROM stuff WHERE id = $id";
			$result = mysqli_query($conn, $query);
			if ($result) {
				echo "<p>Item deleted successfully in the Database</p>";
			} else {
				echo "<p>Sorry Item was not deleted</p>";
			}

		?>

	</div>


	<?php include('footer.php'); ?>