<?php 
include('query.php');
include('header.php');
?>

        <!-- subheader -->
        <section id="subheader" class="style-4">
            <div class="container">
                <div class="row">
				<?php
		if(isset($_GET['pId'])){
			$pId = $_GET['pId'];
			$query = $pdo->prepare("select * from products where id = :productId");
			$query->bindParam('productId',$pId);
			$query->execute();
			$product = $query->fetch(PDO::FETCH_ASSOC);
		}
		?>
		
                    <div class="col-md-12">
                        <h1>Product Details</h1>
                        <ul class="crumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="sep">/</li>
                            <li><a href="shop.php">Shop</a></li>
                            <li class="sep">/</li>
                            <li><a href="shop.php">Sofa</a></li>
                            <li class="sep">/</li>
		
                            <li><?php echo $product['name']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- subheader close -->

        <!-- content begin -->
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                    	<div class="row p-single">
                    		<div class="col-md-6">
                    			<div class="p-carousel owl-carousel owl-theme">
	                    			<img src="dashmin_panel/img/<?php echo $product['image']; ?>" class="img-fluid" alt=""> 
	                    			
	                    		</div>
                    		</div>
                    		<div class="col-md-6">
                    			<div class="p-desc">
                    				<h3><?php echo $product['name'];?></h3>
	                    			<div class="p-rating">
		                            	<i class="fa fa-star checked"></i>
										<i class="fa fa-star checked"></i>
										<i class="fa fa-star checked"></i>
										<i class="fa fa-star checked"></i>
										<i class="fa fa-star"></i>
		                            </div>
		                            <div class="price"><?php echo $product['price']; ?></div>
		                            <p><?php echo $product['des']; ?></p>
		                            
		                            <h6 class="text-light  mb10">Quantity</h6>
									<form action="shopcart.php" method="post">
		                            <span class="f-input-number-decrement">–</span>
									<input name="num-product" class="f-input-number" type="text" value="1" min="0" max="10"><span class="f-input-number-increment">+</span>
		                            <div class="spacer-single"></div>
									
									<input type="hidden" name="pId" value="<?php echo $product['id']?>">
							        <input type="hidden" name="pName" value="<?php echo $product['name']?>">
							        <input type="hidden" name="pPrice" value="<?php echo $product['price']?>">
							        <input type="hidden" name="pImage" value="<?php echo $product['image']?>">
		                            <button class="btn btn-line" name="addToCart">Add To Cart</button>
									</form>
                    			</div>
                    		</div>

                    		<div class="spacer-double"></div>

                    		<div class="col-md-12">
	                    		<div class="tab-default">
									<nav>
	                                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
	                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
	                                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Additional Information</button>
	                                  </div>
	                                </nav>
									
									<div class="tab-content" id="nav-tabContent">
									  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><p><?php echo $product['des']; ?></p></div>
									  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><p>Ad pariatur nostrud pariatur exercitation ipsum ipsum culpa mollit commodo mollit ex. Aute sunt incididunt amet commodo est sint nisi deserunt pariatur do. Aliquip ex eiusmod voluptate exercitation cillum id incididunt elit sunt. Qui minim sit magna Lorem id et dolore velit Lorem amet exercitation duis deserunt. Anim id labore elit adipisicing ut in id occaecat pariatur ut ullamco ea tempor duis.</p></div>
									</div>
									
								</div>
                    		</div>
                    	</div>
                    </div>

                    <div id="sidebar" class="col-md-3">
                        <div class="widget widget_top_rated_product">
                            <h4>Related Product</h4>
                            <ul>
                                <li>
                                    <img src="images/shop/1a.jpg" alt="">
                                    <div class="text">
                                        Triple Seat Sofa
                                        <div class="p-rating">
	                                    	<i class="fa fa-star checked"></i>
											<i class="fa fa-star checked"></i>
											<i class="fa fa-star checked"></i>
											<i class="fa fa-star checked"></i>
											<i class="fa fa-star"></i>
	                                    </div>
                                        <div class="price">$420</div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="widget widget_category">
                            <h4>Product Category</h4>
                            <ul>
                                <li><a href="#">Bed</a></li>
                                <li><a href="#">Cabinet</a></li>
                                <li><a href="#">Chair</a></li>
                                <li><a href="#">Desk</a></li>
                                <li><a href="#">Sofa</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>



        </div>

<?php
include('footer.php')
?>

     