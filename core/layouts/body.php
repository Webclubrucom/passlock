<!--All Vertical Pages-->
<?php
include DIR . '/core/models/settingsModel.php';
include DIR . '/core/models/constSettings.php';





?>
<?php 

	if (isset($_SESSION["id"])) { 

	$sql = "SELECT secretkey FROM users WHERE id = ?";

	if ($stmt = mysqli_prepare($link, $sql)) {
		// Bind variables to the prepared statement as parameters
		mysqli_stmt_bind_param($stmt, "s", $id);

		// Set parameters
		$id = $_SESSION['id'];

		// Attempt to execute the prepared statement
		if (mysqli_stmt_execute($stmt)) {
			// Store result
			mysqli_stmt_store_result($stmt);

			// Check if username exists, if yes then verify secretkey
			if (mysqli_stmt_num_rows($stmt) == 1) {
				// Bind result variables
				mysqli_stmt_bind_result($stmt, $current_secretkey);
				mysqli_stmt_fetch($stmt);
			} else {
			}
		} else {
			echo $language["Oops"];
		}
	}

?>

    <script>
        var id = <?php echo $_SESSION["id"]; ?>
    </script>
<?php } ?>


<body data-layout-mode="<?= $_SESSION["mode"]; ?>" data-topbar="<?= $_SESSION["mode"]; ?>" data-sidebar="<?= $_SESSION["mode"]; ?>">