<?php 
session_start();

if (isset($_SESSION['cart'])):?>
	<?php $tong=0;
if (isset($_POST['sub1'])) {.
	header("location:product.php");
}

	 


	<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Img</th>
				<th>Price</th>	
				<th>Items</th>
			</tr>
		</thead>
		<tbody>
			<form method="POST">
			<?php foreach ($_SESSION['cart'] as $key => $val):?>
				
			<tr>
				<td><?= $key ?></td>
				<td><?=$val['ProductName']?></td>
			    <td><img src="<?=$val['Image']?>"></td>
				<td><?=$val['Price']?>VNĐ</td>
				<td><input type="text" name="" value="<?= $val['ProductDescipition']?>"></td>
				<td><input type="submit" name="sub1" value="Thêm"></td>
			</tr>
<?php  if (isset($_POST['sub'])) {
					$pay=$val['Price']*$val['ProductDescipition'];
					$tong=$tong+$pay;
					
		session_destroy();
			}
			?>
		<?php endforeach; ?>
		<tr><td><input type="submit" name="sub" value="Thanh toán"></td>
			<td><?php echo $tong; ?></td>
				

			</tr>
</form>
			
		</tbody>
	</table>
	<?php else : ?>
<?php header("location:product.php") ?>
	<?php endif; ?>