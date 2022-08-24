<?php
require_once('Classes/Product.php');

use Classes\Product;
 
if (isset($_POST) & !empty($_POST)) {
    $ids = $_POST['ids'];
    $obj = Product::deleteData($ids);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css" />
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Junior Test | Home</title>
</head>

<body>
	<div class="container-fluid">
		<nav class="navbar navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="/">Scandiweb</a>
			</div>
		</nav>
		<div class="container mt-5">
			<form class="form" method="POST">
				<div class="row border-bottom">
					<div class="col-lg-6 margin-tb">
						<div class="float-left">
							<h2>Product List</h2>
						</div>
					</div>
					<div class="col-lg-6 margin-tb text-right buttons">
						<a href="add-product">ADD</a>
						<button type="submit" id="delete-product-btn">MASS DELETE</button>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table">
						<tr>
							<th>
								<div class="row custom">
									<?php
                                    $obj = Product::getData();
                                
foreach ($obj as $product) {
    ?>
									<div class="column">
										<div class="card">
											<div class="card-header">
												<input name='ids[]' type="checkbox" class="delete-checkbox"
													value="<?php echo $product["id"] ?>">
											</div>
											<div class="card-body text-center">
												<h4 class="card-title"><?php echo $product["sku"] ?>
												</h4>
												<p class="card-text"><?php echo $product["name"] ?>
												</p>
												<p class="card-text"><?php echo $product["price"] ?>
													$</p>
												<p class="card-text"><?php echo $product["dimension"] ?>
												</p>
											</div>
										</div>
									</div>
									<?php
}
?>
								</div>
							</th>
						</tr>
					</table>
				</div>
			</form>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
		integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
		integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$("#delete-product-btn").click(function(event) {
			if ($('.delete-checkbox').is(':checked') != "1") {
				event.preventDefault();
			}
		});
	</script>
</body>

</html>