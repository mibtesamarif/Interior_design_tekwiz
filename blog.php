
<?php 
include('header.php')
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
                                        <img src="dashmin_panel/assets/images/blog_images/<?php echo $blog['blogs_page_img']?>" alt="" />
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

                                    <a href="blog-single.php?bid=<?php echo $blog['id']; ?>" class="btn-more">Read More</a>
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
                                        <img src="dashmin_panel/assets/images/blog_images/<?php echo $blog['blogs_page_img']?>" alt="">
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




                        <div class="widget widget-text">
                            <h4>About Us</h4>
                            <div class="small-border"></div>
                            <p>At DecorVista, we believe in turning your interior design dreams into    reality. Our platform connects homeowners and businesses with skilled interior designers who can transform any space into something extraordinary. Whether you're looking for a simple room makeover or a complete renovation, our designers specialize in a variety of styles to match your unique vision.
                            </p>
                            <p>
                                We provide an easy-to-use platform where clients can browse portfolios, book consultations, and track project progress, while designers manage their services and connect with clients seamlessly.
                            </p>
                            <p>
                            Let's create a space you'll love, together.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

      <?php 
      include('footer.php');
      ?>

