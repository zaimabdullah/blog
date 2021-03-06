<?php  

session_start();

if (!isset($_SESSION["userID"]) && $_SESSION["userID"] == false) {
	echo "<script type='text/javascript'>alert('Please log in first to see this page.');window.location='index.php'</script>";
}
include "config.php";

$query = "SELECT * FROM products";
$sendquery = $conn->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home - Darling Bakery</title>
	<link rel="shortcut icon" type="icon" href="img/bakery.png">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		.container {width: 80%;margin: 10px 180px;}
		.navigation {width: 30%;margin-right: 40px;}
		.menu {margin: 20px 60px;}
		.form {width: 55%;margin-left: 40px;}
		.all-product {margin: 20px 60px;width: 100%;}
		#table2 img {width: 80px;height: 80px;}
	</style>
</head>
<body>
	<div class="wrapper">
		<table id="table1" width="80%">
		 	<tr>
		 		<td><img src="img/BakeryMenu_2bb.jpg" alt="Bakery main banner" id="banner"></td>
		 	</tr>
		</table>
		<div class="container">
			<div class="navigation">
				<div class="menu">
					<center><h3><i>Welcome <?php echo $_SESSION["userName"]; ?></i></h3></center>
					<form action="homecategory.php" method="post">
						<center>
							<font size="3px">SELECT CATEGORIES</font>
							<select name="product-search" size="5">
							<?php  
								require "php/product_categories.php";
								foreach ($sendquerycategory as $row ) {
									echo "<option value='{$row['categoryID']}'>{$row['categoryName']}</option>";
								}
							?>
							</select><br><br>
							<input type="submit" name="search-btn" value="Search">
						</center>
					</form><br>
					<form action="homeprice.php" method="post">
						<center>
							<table>
								<tr>
									<td colspan="2"><center><font size="3px">SORT BY PRICE</font></center></td>
								</tr>
								<tr>
									<td>From</td><td><input type="text" name="from"></td>
								</tr>
								<tr>
									<td>To</td><td><input type="text" name="to"></td>
								</tr>
								<tr>
									<td colspan="2"><input type="submit" name="search-btn" value="Search"></td>
								</tr>
							</table>
						</center>
					</form>
					<br><center><a href="showcart.php" style="margin-right: 20px;">View Cart</a>
						<a href="customerdetails.php">Your Info</a><br><br>
						<a href="logout.php"><input type="submit" name="logout-btn" value="Logout"></a>
					</center>
				</div>
			</div>
			<div class="form">
				<div class="all-product">
					<table id="table2">
						<?php for ($y=0; $y < $sendquery->num_rows; $y++) { ?>
							<tr>
								<?php for ($x=0; $x < 3; $x++) { ?> 
									<td width="150px">
									<?php 
										$row = $sendquery->fetch_assoc();
										if ($row["productCategoryID"] == 1 && $row["productImage"] !== "" && $row["productName"] !== "" && $row["productPrice"] !== "") 
										{
											echo "<center><img src='img/cakes/".$row["productImage"]."' alt='product image'></center>" . "<br>" . "<center><a href='productdetails.php?id={$row["productID"]}'>".$row["productName"]."</a></center>" . "<br>" . "<center>RM" .$row["productPrice"]. "</center>";
										} else if ($row["productCategoryID"] == 2 && $row["productImage"] !== "" && $row["productName"] !== "" && $row["productPrice"] !== "")
										{
											echo "<center><img src='img/cookies/".$row["productImage"]."' alt='product image'></center>" . "<br>" . "<center><a href='productdetails.php?id={$row["productID"]}'>".$row["productName"]."</a></center>" . "<br>" . "<center>RM" .$row["productPrice"]. "</center>";
										} else if ($row["productCategoryID"] == 3 && $row["productImage"] !== "" && $row["productName"] !== "" && $row["productPrice"] !== "")
										{
											echo "<center><img src='img/breads/".$row["productImage"]."' alt='product image'></center>" . "<br>" . "<center><a href='productdetails.php?id={$row["productID"]}'>".$row["productName"]."</a></center>" . "<br>" . "<center>RM" .$row["productPrice"]. "</center>";
										} else if ($row["productCategoryID"] == 4 && $row["productImage"] !== "" && $row["productName"] !== "" && $row["productPrice"] !== "")
										{
											echo "<center><img src='img/cupcakes/".$row["productImage"]."' alt='product image'></center>" . "<br>" . "<center><a href='productdetails.php?id={$row["productID"]}'>".$row["productName"]."</a></center>" . "<br>" . "<center>RM" .$row["productPrice"]. "</center>";
										} else if ($row["productCategoryID"] == 5 && $row["productImage"] !== "" && $row["productName"] !== "" && $row["productPrice"] !== "")
										{
											echo "<center><img src='img/Pizza/".$row["productImage"]."' alt='product image'></center>" . "<br>" . "<center><a href='productdetails.php?id={$row["productID"]}'>".$row["productName"]."</a></center>" . "<br>" . "<center>RM" .$row["productPrice"]. "</center>";
										} else if ($row["productCategoryID"] == 6 && $row["productImage"] !== "" && $row["productName"] !== "" && $row["productPrice"] !== "")
										{
											echo "<center><img src='img/Arabian bread/".$row["productImage"]."' alt='product image'></center>" . "<br>" . "<center><a href='productdetails.php?id={$row["productID"]}'>".$row["productName"]."</a></center>" . "<br>" . "<center>RM" .$row["productPrice"]. "</center>";
										}

									?>	
									</td>
								<?php } ?>		
							</tr>	
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
		<div class="footer">
		 	<div class="info">
		 		<h4><b><i>Darling Bakery</i></b></h4>
		 	</div>
		</div>
	</div>
</body>
</html>