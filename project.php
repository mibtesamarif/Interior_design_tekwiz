
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
                            <li><a href="index.html">Home</a></li>
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
                            <li><a href="#" data-filter=".residential">Residential</a></li>
                            <li><a href="#" data-filter=".hospitaly">Hospitaly</a></li>
                            <li><a href="#" data-filter=".office">Office</a></li>
                            <li><a href="#" data-filter=".commercial">Commercial</a></li>
                        </ul>

                    </div>
                </div>
                <!-- portfolio filter close -->

                <div id="gallery" class="row gallery full-gallery de-gallery pf_4_cols wow fadeInUp" data-wow-delay=".3s">

                    <!-- gallery item -->
                    <div class="col-md-4 col-sm-6 col-xs-12 item mb30 residential">
                        <div class="picframe">
                            <a class="" href="projectdetail.php">
                                <span class="overlay">
                                    <span class="pf_text">
                                        <span class="project-name">Eco Green Interior</span>
                                    </span>
                                </span>
                            </a>
                            <img src="images/portfolio/pf%20(1).jpg" alt="" />
                        </div>
                    </div>
                    <!-- close gallery item -->

                

                </div>
            </div>
        </div>

    <?php 
    include('footer.php')
    ?>