<?php
include("header.php");
?>



        <!-- subheader -->
        <section id="subheader" data-speed="8" data-type="background">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Blog</h1>
                        <ul class="crumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="sep">/</li>
                            <li>Blog</li>
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
                <?php
                        // Assuming $_GET['page'] contains the current page number, defaulting to page 1 if not set
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $articles_per_page = 4; // Number of articles to display per page

                        // Fetch total count of articles
                        $total_count_query = $pdo->query("SELECT COUNT(*) AS total_count 
                                                        FROM blogs AS x 
                                                        JOIN blogs_status AS y ON y.b_id = x.id 
                                                        WHERE y.b_status = 'post'");
                        $total_count_result = $total_count_query->fetch(PDO::FETCH_ASSOC);
                        $total_articles = $total_count_result['total_count'];

                        // Calculate total number of pages
                        $total_pages = ceil($total_articles / $articles_per_page);

                        // Calculate the offset to fetch articles based on the current page
                        $offset = ($current_page - 1) * $articles_per_page;

                        // Fetch articles from the database
                        $query = $pdo->prepare("SELECT x.*, y.post_date AS post_date 
                                                FROM blogs AS x 
                                                JOIN blogs_status AS y ON y.b_id = x.id 
                                                WHERE y.b_status = 'post'
                                                ORDER BY y.post_date DESC 
                                                LIMIT :offset, :articles_per_page");
                        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
                        $query->bindParam(':articles_per_page', $articles_per_page, PDO::PARAM_INT);
                        $query->execute();
                        $latestBlogs = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                    <div class="col-md-8">
                        <ul class="blog-list">
                    <?php foreach ($latestBlogs as $blog) : ?>

                            <li>
                                <div class="post-content">
                                    <div class="post-image">
                                        <img src="dashmin_panel/assets/blog_images/<?php echo $blog['blogs_page_img']?>" alt="" />
                                    </div>


                                    <?php 
                                    // Assuming the $blog['date'] contains a date in the format 'FEB 16, 2024'
                                    $date = new DateTime($blog['date']); 
                                    ?>
                                    <div class="date-box">
                                    <!-- Print day -->
                                    <div class="day"><?php echo $date->format('d'); ?></div>

                                    <!-- Print month (in uppercase, e.g., FEB) -->
                                    <div class="month"><?php echo strtoupper($date->format('M')); ?></div>
                                    </div>


                                    <div class="post-text">
                                        <h3><a href="blog-single.html?id=<?php echo $blog['id']; ?>"><?php echo htmlspecialchars($blog['heading']); ?></a></h3>
                                        <p><?php echo $blog['intro_1'];?> <?php echo $blog['intro_2'];?></p>

                                    </div>

                                    <a href="blog-single.php?id=<?php echo $blog['id']; ?>" class="btn-more">Read More</a>
                                </div>
                            </li>

                            <?php endforeach; ?>

                           

                            


                        </ul>

                        <div class="text-center">
                            <ul class="pagination">
                                <li><a href="?page=<?php echo ($current_page > 1) ? ($current_page - 1) : 1; ?>">Prev</a></li>
                                <!-- Numbered Page Links -->
                                <?php for ($page = 1; $page <= $total_pages; $page++) : ?>
                                        <?php $active_class = ($page == $current_page) ? 'active' : ''; ?>
                                        <li class="<?php echo $active_class; ?>"><a href="?page=<?php echo $page; ?>"><?php echo $page; ?></a></li>
                                    <?php endfor; ?>

                                    <!-- Next Page Link -->
                                <li><a href="?page=<?php echo ($current_page < $total_pages) ? ($current_page + 1) : $total_pages; ?>">Next</a></li>
                            </ul>
                        </div>
                    </div>

                    <div id="sidebar" class="col-md-4">
                        <div class="widget widget-post">
                            <h4>Recent Posts</h4>
                            <div class="small-border"></div>
                            <?php                       
                                    // Fetch the latest six blog posts based on the date column from blogs_status table
                                    $query = $pdo->query("SELECT x.*, y.post_date AS post_date 
                                                        FROM blogs AS x 
                                                        JOIN blogs_status AS y ON y.b_id = x.id 
                                                        WHERE y.b_status = 'post'
                                                        ORDER BY y.post_date DESC 
                                                        LIMIT 5");
                                    $latestBlogs = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($latestBlogs as $blog) {
                                ?>
                            <ul class="de-bloglist-type-1">
                                <li>
                                    <div class="d-image">
                                        <img src="dashmin_panel/assets/blog_images/<?php echo $blog['blogs_page_img']?>" alt="">
                                    </div>
                                    <div class="d-content">
                                        <a href="?id=<?php echo $blog['id']; ?>"><?php echo htmlspecialchars($blog['heading']); ?></a>
                                        <div class="d-date"> <?php echo $blog['date']; ?></div>
                                       
                                    </div>
                                </li>
                            </ul> 
                            <?php
                                }
                            ?>                           
                        </div>



                        <div class="widget widget-text">
                            <h4>About Us</h4>
                            <div class="small-border"></div>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                            ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
                            magni
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- footer begin -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <img src="images/logo.svg" class="logo-small" alt=""><br>We are passionate about transforming spaces into stunning, functional, and personalized environments. With years of experience in the industry, we specialize in creating exceptional interior designs that reflect our clients unique style and meet their specific needs.
                    </div>

                    <div class="col-lg-3">
                        <div class="widget widget_recent_post">
                            <h3>Latest News</h3>
                            <ul>
                                <li><a href="#">The Essentials Interior Design Tips</a></li>
                                <li><a href="#">Functional Wall-to-Wall Shelves</a></li>
                                <li><a href="#">9 Unique Ways to Display Your TV</a></li>
                                <li><a href="#">The 5 Secrets to Minimal Design</a></li>
                                <li><a href="#">Make a Huge Impact With Multiples</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <h3>Contact Us</h3>
                        <div class="widget widget-address">
                            <address>
                                <span>100 S Main St, Los Angeles, CA</span>
                                <span><strong>Phone:</strong>(208) 333 9296</span>
                                <span><strong>Fax:</strong>(208) 333 9298</span>
                                <span><strong>Email:</strong><a href="mailto:contact@archi-interior.com">contact@archi-interior.com</a></span>
                                <span><strong>Web:</strong><a href="#">http://archi-interior.com</a></span>
                            </address>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="widget widget_recent_post">
                            <h3>Our Services</h3>
                            <ul>
                                <li><a href="#">Interior Design</a></li>
                                <li><a href="#">Architecture</a></li>
                                <li><a href="#">Industry</a></li>
                                <li><a href="#">Consulting</a></li>
                                <li><a href="#">Photography</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            &copy; Copyright 2024 - Archi Interior Design Template by <span class="id-color">Designesia</span>
                        </div>
                        <div class="col-md-6 text-right">
                            <div class="social-icons">
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                <a href="#"><i class="fa-brands fa-skype"></i></a>
                                <a href="#"><i class="fa-brands fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" id="back-to-top"></a>
        </footer>
        <!-- footer close -->

    </div>

    <!-- style switcher
    ================================================== -->


    <div id="switcher">
        <span class="custom-close"></span>
        <span class="custom-show"></span>
        <span class="sw-title">Header Layout</span>
        <select name="switcher" id="de-header-layout">
            <option value="opt-1" selected>Simple</option>
            <option value="opt-2">Extended</option>
        </select>
        <div class="clearfix"></div>
        <span class="sw-title">Color :</span>
        <ul id="de-color">
            <li class="bg1"></li>
            <li class="bg2"></li>
            <li class="bg3"></li>
            <li class="bg4"></li>
            <li class="bg5"></li>
            <li class="bg6"></li>
            <li class="bg7"></li>
            <li class="bg8"></li>
            <li class="bg9"></li>
            <li class="bg10"></li>
        </ul>
    </div>

    <div id="purchase-now">
    	<a href="https://themeforest.net/cart/configure_before_adding/10940889"><span>$</span>25</a>
    	<div class="pn-hover">Buy Now</div>
    </div>

    <!-- Javascript Files
    ================================================== -->
    <script src="js/plugins.js"></script>
    <script src="js/designesia.js"></script>

    <!-- SLIDER REVOLUTION SCRIPTS  -->
    <script src="rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

</body>


<!-- Mirrored from www.madebydesignesia.com/themes/archi/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2024 20:30:16 GMT -->
</html>