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
                            <li><a href="index.html">Home</a></li>
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
                    <div class="col-md-8">
                        <ul class="blog-list">
                            <li>
                                <div class="post-content">
                                    <div class="post-image">
                                        <img src="images/blog/pic-blog-1.jpg" alt="" />
                                    </div>


                                    <div class="date-box">
                                        <div class="day">26</div>
                                        <div class="month">FEB</div>
                                    </div>

                                    <div class="post-text">
                                        <h3><a href="blogdetail.php">5 Things That Take a Room from Good to Great</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>
                                    </div>

                                    <a href="blog-single.html" class="btn-more">Read More</a>
                                </div>
                            </li>


                        </ul>

                        <div class="text-center">
                            <ul class="pagination">
                                <li><a href="#">Prev</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>

                    <div id="sidebar" class="col-md-4">
                        <div class="widget widget-post">
                            <h4>Recent Posts</h4>
                            <div class="small-border"></div>

                            <ul class="de-bloglist-type-1">
                                <li>
                                    <div class="d-image">
                                        <img src="images/news-thumbnail/pic-blog-1.jpg" alt="">
                                    </div>
                                    <div class="d-content">
                                        <a href="#">5 Things That Take a Room from Good to Great</a>
                                        <div class="d-date">June 15, 2022</div>
                                    </div>
                                </li>
                            </ul>                            
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

      <?php 
      include('footer.php');
      ?>