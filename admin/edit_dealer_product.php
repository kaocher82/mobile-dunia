<?php include_once('dealer_sidebar.php'); ?>
		<div class="content">
			<div class="form_title cen">
				<h2 style="margin-top: 12px;">Edit Product</h2>
			</div>
			<div class="product_form" style="margin-top: 15px; padding-bottom: 10px;">
				<div id="suc" class="submsg" style="display: none; text-align: center; color: green;">
					
				</div>
				<div id="wng" class="submsg" style="display: none; text-align: center; color: red;">
					
				</div>
				<form action="" method="post">
					<?php
						$id = $_GET['e'];
						$query = "SELECT * FROM md_product WHERE p_id='$id'";
						$result = selectData($query);
					?>
					<input type="hidden" name="action" value="edit_dealer_product">
					<input type="hidden" name="id" value="<?php echo $_GET['e'];?>">
					<table>
						<tr>
							<td>Model:</td>
							<td><input type="text" name="model" value="<?= $result['p_model']; ?>"></td>
						</tr>
						<tr>
							<td>Category:</td>
							<td>
							<?php
								$uid = $_SESSION['id'];;
								$uquery = "SELECT * from md_category WHERE user_id = '$uid'";
								$ures = selectAll($uquery);
							?>
								<select style="width: 345px;" name="cat">
									<option value="0">--Select a Category--</option>
									<?php while ($uresult = mysqli_fetch_assoc($ures)) { ?>
									<option value="<?= $uresult['cat_name']; ?>"><?= $uresult['cat_name']; ?></option> <?php } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Market Price:</td>
							<td><input type="text" name="m_price" value="<?= $result['p_price']; ?>"></td>
						</tr>
						<tr>
							<td>Warranty:</td>
							<td><input type="text" name="warranty" value="<?= $result['p_warranty']; ?>"></td>
						</tr>
						<tr>
							<td>Selling Area:</td>
							<td><input type="text" name="area" value="<?= $result['p_area']; ?>"></td>
						</tr>
						<tr>
							<td>Quantity:</td>
							<td><input type="text" name="quan" value="<?= $result['p_quantity']; ?>"></td>
						</tr>
						<tr>
							<td>Mobile Description:</td>
							<td><textarea name="desc" style="resize: none;"><?= $result['p_desc']; ?></textarea></td>
						</tr>
						<tr>
							<td>Mobile Image:</td>
							<td><img src="<?= $result['p_image']; ?>" style="width: 120px; height: 100px;"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="file" name="photo" title="Change"></td>
						</tr>
						<tr>
							<td></td>
							<td class="btn"><input type="submit" value="SAVE" onclick="submitForm(this)"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
	<?php include_once('footer.php'); ?>
</body>
</html>