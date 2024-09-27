<?php 
include('header.php');
// $_SESSION['designer_id'] = 2;

?>

<style>
    .des{
        color: #fff !important;
    }
</style>
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
        <?php
        if(isset($_GET['dId'])){
			$dId = $_GET['dId'];
			$query = $pdo->prepare("select * from saveddesigns where id = :productId");
			$query->bindParam('productId',$dId);
			$query->execute();
			$product = $query->fetch(PDO::FETCH_ASSOC);
		}
		?>
        <div class="col-md-4">
            <div class="project-info">
                <h2><?php echo $product['design_name']; ?></h2>

                <div class="details">
                    <div class="info-text">
                        <span class="title">Date</span>
                        <span class="val"> 16 March 2014</span>
                    </div>

                    <div class="info-text">
                        <span class="title">Location</span>
                        <span class="val">Paris, France</span>
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

    <p class="" >
        <h4>Our Solutions</h4>
        <?php echo $product['design_description']?>
                </p>

               



                <form name="consultationForm" id="consultation_form" method="post">
    <div class="row">
        <div class="col-md-12 mb10">
            <h3>Book Consultation</h3>
        </div>

        <div class="col-md-10">
            <div>
                <label for="consultation_date">Consultation Date</label>
                <input type="datetime-local" name="consultation_date" id="consultation_date" class="form-control" required>
            </div>
        </div>

        <div class="col-md-12">
            <p id="submit" class="mt20">
                <input type="submit" id="book_consultation" name="consultationBookweb" value="Book Consultation" class="btn btn-line">
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