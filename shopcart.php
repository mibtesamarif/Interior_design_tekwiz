<?php 
include('header.php')
?>
        <!-- subheader -->
        <section id="subheader" data-bgimage="url(images/background/bg-19.jpg)" data-stellar-background-ratio=".2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Items in my cart</h1>
                        <ul class="crumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="sep">/</li>
                            <li>Our Products</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- subheader close -->


		<?php

$subtotal = 0;
foreach ($_SESSION['cart'] as $item) {
    $subtotal += $item['p_price'] * $item['p_qty'];
}

		if(isset($_POST['addToCart'])){

			if(isset($_SESSION['cart'])){

				$productId = array_column($_SESSION['cart'],'p_id');
				if(in_array($_POST['pId'],$productId)){
							echo "<script>alert('product is already added to the cart')</script>";
				}
				else{
						
					$count = count($_SESSION['cart']);
					$_SESSION['cart'][$count] =  array("p_id"=>$_POST['pId'],"p_name"=>$_POST['pName'],"p_price"=>$_POST['pPrice'],"p_image"=>$_POST['pImage'],"p_qty"=>$_POST['num-product']);

				}

			}
			else{
						$_SESSION['cart'][0] = array("p_id"=>$_POST['pId'],"p_name"=>$_POST['pName'],"p_price"=>$_POST['pPrice'],"p_image"=>$_POST['pImage'],"p_qty"=>$_POST['num-product']);
			}
		}
		

		// remove Product from session
		if(isset($_GET['remove'])){
			$id = $_GET['remove'];
			foreach($_SESSION['cart'] as $key => $value){
						if($value['p_id'] == $id){
								unset($_SESSION['cart'][$key]);
								echo "<script>alert('cart remove successfully')</script>";
							$_SESSION['cart']	 = array_values($_SESSION['cart']);
							echo "<script>alert('remove')</script>";

						}
			}

		}

			if(isset($_POST['qtyIncDec'])){
				$productId = $_POST['productId'];
				$productQty = $_POST['productQty'];
				echo "<script>alert('Display')</script>";
				foreach($_SESSION['cart'] as $key => $value){
					if($value['p_id'] == $productId){
					  $_SESSION['cart'][$key]['p_qty'] = $productQty;
					}
				}
			}




			// checkout working 
			if(isset($_GET['checkout'])){
				$uId = $_SESSION['userId'];
				$uName = $_SESSION['userName'];
				$uEmail = $_SESSION['userEmail'];
				foreach($_SESSION['cart'] as $key =>$value){
						$pId = $value['p_id'];
						$pName = $value['p_name'];
						$pPrice = $value['p_price'];
						$pQty = $value['p_qty'];

						$query = $pdo->prepare("insert into orders (u_id , u_name , u_email, p_id ,p_name , p_price ,p_qty ) values (:u_id, :u_name , :u_email ,:p_id , :p_name , :p_price , :p_qty)");
						$query->bindParam('u_id',$uId);
						$query->bindParam('u_name',$uName);
						$query->bindParam('u_email',$uEmail);
						$query->bindParam('p_id',$pId);
						$query->bindParam('p_name',$pName);
						$query->bindParam('p_price',$pPrice);
						$query->bindParam('p_qty',$pQty);
						$query->execute();
						echo "<script>alert('Order placed successfully');location.assign('index.php')</script>";

						// unset($_SESSION['cart']);

						
				}
				// invoice query
				



			}
		?>

        <!-- content begin -->
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                    	<table class="table table-dark table-cart">
                    	  <thead>
                    	    <tr>
                    	      <th scope="col">Items</th>
                    	      <th scope="col">Quantity</th>
                    	      <th scope="col">Final Price</th>
							  <!-- <th>Action</th> -->
                    	    </tr>
                    	  </thead>
						  <?php
								if(isset($_SESSION['cart'])){
										// print_r($_SESSION['cart']);
										foreach($_SESSION['cart'] as $key => $value){
								?>
                    	  <tbody>
                    	    <tr class="table_row">
                    	      <td>
                    	      	<div class="d-cart-item">
                    	      		<img src="dashmin_panel/img/<?php echo $value['p_image']?>" alt="">
	                                <div class="text">
									<?php echo $value['p_name']?>
	                                    <div class="price column-3"><?php echo $value['p_price']?></div>
	                                </div>
                    	      	</div>
                    	      </td>
                    	      <td>
								<div class="qtyBox">
								<input type="hidden" class="productId" value="<?php echo $value['p_id']?>">
									<span class="f-input-number-decrement dec">–</span><input class="f-input-number num-product" type="text" value="<?php echo $value['p_qty']?>" min="0" max="10"><span class="f-input-number-increment inc">+</span>
								</div>
                    	      </td>
                    	      <td class="column-5"><?php echo $value['p_qty']*$value['p_price']?></td>
									<!-- <td class="column-6"><a href="?remove=<?php echo $value['p_id']?>" class="">Remove</a></td> -->
                    	    </tr>
                    	  </tbody>
						  <?php
						  }
						  }
						  ?>
                    	</table>
                    </div>

					<div id="sidebar" class="col-md-3">
    <div class="d-summary">
        <h3>Summary</h3>
        <div class="de-flex">
            <div>Subtotal</div>
            <div class="strong">$<?php echo number_format($subtotal, 2); ?></div>
        </div>

        <div class="spacer-line"></div>

        <div class="spacer-line"></div>

        <div class="de-flex">
            <div>Total Price </div>
            <div class="strong">$<?php echo number_format($subtotal, 2); ?></div>
        </div>

        <div class="spacer-line"></div>

        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="checkout.php?user_id=<?php echo $_SESSION['user_id']; ?>" class="btn-custom btn-fullwidth text-center">Checkout</a>
        <?php else: ?>
            <a href="login.php" class="btn-custom btn-fullwidth text-center">Checkout</a>
        <?php endif; ?>
    </div>
</div>



                </div>
            </div>
        </div>


<?php 
include('footer.php');
?>