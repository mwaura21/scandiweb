<?php
 require_once('Classes/Product.php');
 require_once('Classes/Book.php');
 require_once('Classes/DVD.php');
 require_once('Classes/Furniture.php');

 use Classes\Product;
 use Classes\DVD;
 use Classes\Furniture;
 use Classes\Book;

 if (isset($_POST) & !empty($_POST)) {
     $namespace = "Classes\\";
     $class = "{$namespace}{$_POST['productType']}";
     $obj = new $class;
     foreach ($_POST as $key => $value) {
         $obj->$key = $value;
     }
     $obj->saveData();
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
	<title>Junior Test | Add</title>
</head>

<body>
	<div class="container-fluid">
		<nav class="navbar navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="/">Scandiweb</a>
			</div>
		</nav>
		<div class="container mt-5">
			<form class="form" method="POST" id="product_form">
				<div class="row border-bottom">
					<div class="col-lg-6 margin-tb">
						<div class="float-left">
							<h2>Product Add</h2>
						</div>
					</div>
					<div class="col-lg-6 margin-tb text-right product">
						<input type="submit" name="submit" value="Save" />
						<a href="/">Cancel</a>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label col-form-label">SKU</label>
					<div class="col-sm-10 col-lg-6 col-md-6">
						<input type="text" class="form-control form-control" id="sku" name="sku" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label col-form-label">Name</label>
					<div class="col-sm-10 col-lg-6 col-md-6">
						<input type="text" class="form-control form-control" id="name" name="name" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label col-form-label">Price($)</label>
					<div class="col-sm-10 col-lg-6 col-md-6">
						<input type="number" class="form-control form-control" step="0.01" id="price" name="price"
							min="0" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label col-form-label">Type Switcher</label>
					<div class="col-sm-10 col-lg-6 col-md-6">
						<select class="form-select form-control" id="productType" name="productType" required>
							<option value="">Choose...</option>
							<option value="DVD">DVD-disc</option>
							<option value="Book">Book</option>
							<option value="Furniture">Furniture</option>
						</select>
					</div>
				</div>
				<div class="hide">
					<div id="DVD">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label col-form-label">Size(MB)</label>
							<div class="col-sm-10 col-lg-6 col-md-6">
								<input type="number" class="form-control form-control" step="0.01" id="size" name="size"
									min="0" required>
							</div>
						</div>
						<p><b>*Please Provide disc space in MB</b></p>
					</div>

					<div id="Book">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label col-form-label">Weight(KG)</label>
							<div class="col-sm-10 col-lg-6 col-md-6">
								<input type="number" class="form-control form-control" step="0.01" id="weight"
									name="weight" min="0" required>
							</div>
						</div>
						<p><b>*Please Provide weight in KG</b></p>
					</div>

					<div id="Furniture">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label col-form-label">Height(CM)</label>
							<div class="col-sm-10 col-lg-6 col-md-6">
								<input type="number" class="form-control form-control" step="0.01" id="height"
									name="height" min="0" required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label col-form-label">Width(CM)</label>
							<div class="col-sm-10 col-lg-6 col-md-6">
								<input type="number" class="form-control form-control" step="0.01" id="width"
									name="width" min="0" required>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-2 col-form-label col-form-label">Length(CM)</label>
							<div class="col-sm-10 col-lg-6 col-md-6">
								<input type="number" class="form-control form-control" step="0.01" id="length"
									name="length" min="0" required>
							</div>
						</div>
						<p><b>*Please Provide dimensions in HxWxL format</b></p>
					</div>
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
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
	<script>
		$(function() {
			$('#productType').change(function() {
				$('.hide').children().hide();

				$(".hide :input").attr("disabled", true);
				var x = this.options[this.selectedIndex].value;
				$("#" + x + " :input").attr("disabled", false);
				$('#' + x).show();
			});
		});
	</script>
</body>

</html>