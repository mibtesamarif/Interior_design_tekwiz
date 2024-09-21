<?php 
include('header.php');
?>

        <!-- subheader -->
        <section id="subheader" data-speed="8" data-type="background">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Blog Single</h1>
                        <ul class="crumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="sep">/</li>
                            <li>Blog Single</li>
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
                        <div class="blog-read">
                                <div class="post-content">
                                    <div class="post-image">
                                        <img src="images/blog/pic-blog-1.jpg" alt="" />
                                    </div>

                                    <div class="date-box">
                                        <div class="day">26</div>
                                        <div class="month">FEB</div>
                                    </div>

                                    <div class="post-text">
                                        <h3><a href="#">5 Things That Take a Room from Good to Great</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>
											
											<blockquote class="s1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</blockquote>
											
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                            in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>
                                    </div>
                                </div>
								
								<div class="post-meta"><span><i class="fa fa-user id-color"></i>By: <a href="#">Lynda Wu</a></span> <span><i class="fa fa-tag id-color"></i><a href="#">News</a>, <a href="#">Events</a></span> <span><i class="fa fa-comment id-color"></i><a href="#">10 Comments</a></span></div>
								
								<div class="spacer-single"></div>
								
								<div id="blog-comment">
                            <h3>Comments (5)</h3>
							
							<div class="spacer-half"></div>
							
                            <ol>
                                <li>
                                    <div class="avatar">
                                        <img src="images/avatar.jpg" alt="" /></div>
                                    <div class="comment-info">
                                        <span class="c_name">John Smith</span>
                                        <span class="c_date id-color">8 August 2018</span>
                                        <span class="c_reply"><a href="#">Reply</a></span>
                                        <div class="clearfix"></div>
                                    </div>

                                    <div class="comment">Sed ut perspiciatis unde omnis iste natus error sit voluptatem   accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt   explicabo.</div>
                                    <ol>
                                        <li>
                                            <div class="avatar">
                                                <img src="images/avatar.jpg" alt="" /></div>
                                            <div class="comment-info">
                                                <span class="c_name">John Smith</span>
                                                <span class="c_date id-color">8 August 2018</span>
                                                <span class="c_reply"><a href="#">Reply</a></span>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="comment">Sed ut perspiciatis unde omnis iste natus error sit voluptatem   accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt   explicabo.</div>
                                        </li>
                                    </ol>
                                </li>


                            </ol>
							
							<div class="spacer-single"></div>

                            <div id="comment-form-wrapper">
                                <h3>Leave a Comment</h3>
                                <div class="comment_form_holder">
                                    <form id="contact_form" name="form1" method="post" action="#">

                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control" />

                                        <label>Email <span class="req">*</span></label>
                                        <input type="text" name="email" id="email" class="form-control" />
                                        <div id="error_email" class="error">Please check your email</div>

                                        <label>Message <span class="req">*</span></label>
                                        <textarea cols="10" rows="10" name="message" id="message" class="form-control"></textarea>
                                        <div id="error_message" class="error">Please check your message</div>
                                        <div id="mail_success" class="success">Thank you. Your message has been sent.</div>
                                        <div id="mail_failed" class="error">Error, email not sent</div>

                                        <p id="btnsubmit">
                                            <input type="submit" id="send" value="Send" class="btn btn-line" /></p>



                                    </form>
                                </div>
                            </div>
                        </div>
								
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

                        <div class="widget widget_tags">
                            <h4>Tags</h4>
                            <div class="small-border"></div>
                            <ul>
                                <li><a href="#link">Art</a></li>
                                <li><a href="#link">Application</a></li>
                                <li><a href="#link">Design</a></li>
                                <li><a href="#link">Entertainment</a></li>
                                <li><a href="#link">Internet</a></li>
                                <li><a href="#link">Marketing</a></li>
                                <li><a href="#link">Multipurpose</a></li>
                                <li><a href="#link">Music</a></li>
                                <li><a href="#link">Print</a></li>
                                <li><a href="#link">Programming</a></li>
                                <li><a href="#link">Responsive</a></li>
                                <li><a href="#link">Website</a></li>
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