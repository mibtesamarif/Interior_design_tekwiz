
<?php 
include('header.php')
?>
        <!-- subheader -->
        <section id="subheader" data-speed="8" data-type="background">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Projects</h1>
                        <ul class="crumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="sep">/</li>
                            <li>Projects</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- subheader close -->

        <!-- content begin -->
        <div id="content">
            <div class="container">

                <div class="spacer-single"></div>

                <!-- portfolio filter begin -->
                <div class="row">
                    <div class="col-md-12">
                        <ul id="filters" class="wow fadeInUp" data-wow-delay="0s">
                            <li class="pull-right"><a href="#" data-filter="*" class="selected">All Projects</a></li>
                            <?php
					$query = $pdo->query("select * from design_category");
					$allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
					foreach($allCategories as $category){
					?>
                            <li><a href="#" data-filter=".<?php echo $category['c_id']?>"><?php echo $category['category_name']?></a></li>
                            <?php
                    }
                            ?>
                        </ul>

                    </div>
                </div>
                <div id="gallery" class="row gallery full-gallery de-gallery pf_4_cols wow fadeInUp" data-wow-delay=".3s">
                <!-- portfolio filter close -->
                <?php
                $query = $pdo->query("select * from saveddesigns");
                $allProducts = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach($allProducts as $product){
                ?>	

              


                    <!-- gallery item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 item mb30 <?php echo $product['c_id']?>">
                        <div class="picframe">
                            <a class="" href="projectdetail.php?dId=<?php echo $product['id']; ?>">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name"><?php echo $product['design_name']?></span>
                                    </span>
                                </span>
                            </a>
                            <img src="dashmin_panel/assets/images/addportfoliodesign/<?php echo $product['design_card_image']?>" alt=""/>
                        </div>
                    </div>
                    <!-- close gallery item -->
                    
                    <?php
                   }
                    ?>
                    
                    
                    </div>
                    </div>
                    </div>
                   

    <?php 
    include('footer.php')
    ?>