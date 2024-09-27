<?php
include('php/query.php');
include('components/designer_sidebar.php');
include('components/designer_navbar.php');
?>
<!-- Include Quill stylesheet -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<!-- Include Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>


  <!-- start page content wrapper-->
  <div class="page-content-wrapper">
          <!-- start page content-->
         <div class="page-content">

          <!--start breadcrumb-->
          <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Forms</div>
            <div class="ps-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                  <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Form Layouts</li>
                </ol>
              </nav>
            </div>
          </div>
          <!--end breadcrumb-->


          <div class="row">
            <div class="col-xl-8 mx-auto">
              <div class="card">
                <div class="card-body">
                  <div class="border p-3 rounded">
                  <h6 class="mb-0 text-uppercase">Portfolio Design Form</h6>
                  <hr>
                  <form action="php\query.php" method="POST" enctype="multipart/form-data">

                    <div class="col-12">
                      <label class="form-label">Design Name</label>
                      <input type="text" name="design_name" placeholder="Enter design name" value="" class="form-control" Required>

                    </div>
                    

                    <div class="col-12 mt-3">
                        <label class="form-label">Select Design Categoryy</label>
                        <select class="form-control" name="cId" value="<?php echo $pCid?>"  id="">
                        <option>select category</option>
                        <?php
                                $query = $pdo->query("SELECT * FROM design_category");
                                $alldesigns = $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($alldesigns as $designs) {
                            ?>  
                                <option value="<?php echo $designs['c_id'] ?>"><?php echo $designs['category_name'] ?></option>
                                <?php
                                }
                                ?>
                                </option>

                                </select>
                    </div>
                    <div class="col-12 mt-3">
                      <label class="form-label">Design Card Image</label>
                    <input type="file" name="design_card_image" class="form-control" Required>

                    </div>
                    <div class="col-12 mt-3">
                      <label class="form-label">Design Detail Imagese</label>
                    <input type="file" name="design_detail_images[]" class="form-control" multiple Required>

                    </div>
                    <div class="col-12 mt-3">
                        <label for="cont_1">Main Content</label>
                        <div id="editor-cont_1" style="height: 300px;"></div>
                        <textarea name="cont_1" id="cont_1" class="form-control" style="display:none;" aria-describedby="helpId" Required></textarea>
                    </div>
                    <div class="col-12 mt-3">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="addPortfolioDesign">Add Design</button>
                      </div>
                    </div>

                  </form>
                </div>
                </div>
              </div>
  
              
  
            </div>
          </div>
             

          </div>
          <!-- end page content-->
         </div>

<script>

    // Initialize Quill editor
    var quill1 = new Quill('#editor-cont_1', {
        theme: 'snow'
    });

    // Sync Quill content to the textarea whenever it changes
    quill1.on('text-change', function() {
        document.querySelector('textarea[name=cont_1]').value = quill1.root.innerHTML;
    });
</script>

<?php
include('components/footer.php');
?>
