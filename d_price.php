<?php include_once('database.php');
	$price = $_GET['price'];
	if ($price < 5000) {
		$query = "SELECT * FROM md_product WHERE p_price < 5000 ORDER BY p_id DESC";
	} elseif ($price == "5000-10000") {
		$query = "SELECT * FROM md_product WHERE p_price BETWEEN 5000 AND 9999";	
	} elseif ($price > 10000) {
		$query = "SELECT * FROM md_product WHERE p_price > 10000 ORDER BY p_id DESC";
	} else {
		$query = "SELECT * FROM md_product ORDER BY p_id DESC";
	}
		
	$res = selectAll($query);
?>
<div class="product_image">
<?php
	$count = mysqli_num_rows($res);
		if ($count < 1) { ?>
		</table>
			<div class="msg">
				<?php echo "No records found"; ?>
			</div>
			</div>
		<?php
			} else {
				while ($result = mysqli_fetch_assoc($res)) { ?>
		<div class="item">
		    <a href="single_dealer.php?v=<?= $result['p_id']; ?>"><img src="assets/img/logo.png"/>
		    <span class="caption"><?= $result['p_model']; ?></span> </a>
		</div>
	<?php } }?>