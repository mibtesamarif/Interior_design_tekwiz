<?php 
include('header.php')
?>
        <!-- subheader -->
        <section id="subheader" data-speed="8" data-type="background">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Project Detail</h1>
                        <ul class="crumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="sep">/</li>
                            <li>Project Detail</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- subheader close -->


<div class="container project-view">

    <div class="row">
        <div class="col-md-8 project-images">
            <img src="images/portfolio/view/p1_a.jpg" alt="" class="img-responsive" />
            <img src="images/portfolio/view/p1_b.jpg" alt="" class="img-responsive" />
            <img src="images/portfolio/view/p1_c.jpg" alt="" class="img-responsive" />
        </div>
        <div class="col-md-4">
            <div class="project-info">
                <h2>Your Title Goes Here</h2>

                <div class="details">
                    <div class="info-text">
                        <span class="title">Date</span>
                        <span class="val">March 2014</span>
                    </div>

                    <div class="info-text">
                        <span class="title">Location</span>
                        <span class="val">Paris, France</span>
                    </div>

                    <div class="info-text">
                        <span class="title">Value</span>
                        <span class="val">$10,000</span>
                    </div>

                    <div class="info-text">
                        <span class="title">Client</span>
                        <span class="val">Century 21</span>
                    </div>

                    <div class="info-text">
                        <span class="title">Category</span>
                        <span class="val">Residential</span>
                    </div>
                </div>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo consequat.</p>

                <p>
                    <h4>Our Solutions</h4>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                    laborum.
                </p>
                </p>

                <div class="col-md-12>
                        <form name="contactForm" id='contact_form' method="post">
                            <div class="row">
                            	<div class="col-md-12 mb10">
                            		<h3>Send Us Message</h3>
                            	</div>
                                <div class="col-md-10">
                                    <div id='name_error' class='error'>Please enter your name.</div>
                                    <div>
                                        <input type='text' name='Name' id='name' class="form-control" placeholder="Your Name" required>
                                    </div>

                                    <div id='email_error' class='error'>Please enter your valid E-mail ID.</div>
                                    <div>
                                        <input type='email' name='Email' id='email' class="form-control" placeholder="Your Email" required>
                                    </div>

                                    <div id='phone_error' class='error'>Please enter your phone number.</div>
                                    <div>
                                        <input type='text' name='phone' id='phone' class="form-control" placeholder="Your Phone" required>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div id='message_error' class='error'>Please enter your message.</div>
                                    <div>
                                        <textarea name='message' id='message' class="form-control" placeholder="Your Message" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="g-recaptcha" data-sitekey="6LdW03QgAAAAAJko8aINFd1eJUdHlpvT4vNKakj6"></div>
                                    <p id='submit' class="mt20">
                                        <input type='submit' id='send_message' value='Submit Form' class="btn btn-line">
                                    </p>
                                </div>
                            </div>
                        </form>

                        <div id="success_message" class='success'>
                            Your message has been sent successfully. Refresh this page if you want to send more messages.
                        </div>
                        <div id="error_message" class='error'>
                        	Sorry there was an error sending your form.
                        </div>

                    </div>


            </div>
        </div>
    </div>
</div>

<?php 
include('footer.php');
?>