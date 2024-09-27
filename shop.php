<?php 

include("header.php");
?>

        <!-- subheader -->
        <section id="subheader" data-bgimage="url(images/background/bg-19.jpg)" data-stellar-background-ratio=".2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Our Products</h1>
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

        <!-- content begin -->
        <div id="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                            <ul class="products row">
							<?php
					$query = $pdo->query("select * from products");
					$allProducts = $query->fetchAll(PDO::FETCH_ASSOC);
					foreach($allProducts as $product){
					?>	
                                <li class="col-xl-4 col-lg-4 col-md-6 product <?php echo $product['c_id']?>">
                                	<div class="p-inner">
                                		<div class="p-images">
	                                    	<img src="dashmin_panel/img/<?php echo $product['image']?>" class="pi-1 img-responsive" alt="">
	                                    	</a>
	                                    </div>
	                                    <a href="productdetail.php?pId=<?php echo $product['id']; ?>">
	                                    	<h4><?php echo $product['name']?></h4>
	                                    </a>
	                                    <div class="p-rating">
	                                    	<i class="fa fa-star checked"></i>
											<i class="fa fa-star checked"></i>
											<i class="fa fa-star checked"></i>
											<i class="fa fa-star checked"></i>
											<i class="fa fa-star"></i>
	                                    </div>
	                                    <div class="price">$<?php echo $product['price']?></div>
                                	</div>
                                </li>

                               <?php 
					}  
							   ?>

                    </div>

                    <div id="sidebar" class="col-md-3">
                        <div class="widget widget_search">
                            <input type='text' name='search' id='search' class="form-control" placeholder="search product">
                            <button id="btn-search" type='submit'></button>
                            <div class="clearfix"></div>
                        </div>

                        <div class="widget widget_top_rated_product">
                            <h4>Top Rated Product</h4>
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
							<?php
					$query = $pdo->query("select * from category");
					$allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
					foreach($allCategories as $category){
					?>
                            <ul>
                                <li><a href="#" data-filter="."><?php echo $category['name']?></a></li>

                            </ul>
							<?php
					}
					?>
                        </div>
                    </div>

                </div>
            </div>



        </div>

	<?php 
	include("footer.php");
	?>

