<?php
include('php/query.php');
include('components/sidebar.php');
include('components/navbar.php');
?>

<!-- start page content wrapper-->
<div class="page-content-wrapper">
<!-- start page content-->
<div class="page-content">
     <!--start breadcrumb-->
     <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Portfolio</div>
            <div class="ps-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                  <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">View Designs</li>
                </ol>
              </nav>
            </div>
            <div class="ms-auto">
              <div class="btn-group">
                <button type="button" class="btn btn-outline-primary">Settings</button>
                <button type="button" class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                  <a class="dropdown-item" href="javascript:;">Another action</a>
                  <a class="dropdown-item" href="javascript:;">Something else here</a>
                  <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
              </div>
            </div>
          </div>
          <!--end breadcrumb-->

<?php





if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $pdo->prepare("SELECT * FROM blogs WHERE id = :id");
    $query->bindparam('id',$id);
    $query->execute();
    $blog = $query->fetch(PDO::FETCH_ASSOC);
    //print_r($cat);
}
?>

<!-- content begin -->
<div class="container m-5">
    <div id="content" class="no-top no-bottom">
                <section aria-label="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="blog-read">

                                    <img src="../assets/images/blog_images/<?php echo $blog['blog_img']?>" class="img-responsive p-5" alt="">

                                    <div class="post-text">
                                        <h3 class="pb-3"><?php echo $blog['heading']?></h3>
                                        <p><?php echo $blog['intro_1'];?> <?php echo $blog['intro_2'];?> <?php echo $blog['intro_3']?></p>


                                        <p><?php echo $blog['main_1']?></p>


                                        <p><?php echo $blog['conclusion']?></p>

                                        <span class="post-date"><?php echo $blog['date']?></span>

                                    </div>

                                </div>

                                <div class="spacer-single"></div>

                                

                            </div>


                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- content close -->
        </div>
        </div>
</div>

<?php
include('components/footer.php');
?>