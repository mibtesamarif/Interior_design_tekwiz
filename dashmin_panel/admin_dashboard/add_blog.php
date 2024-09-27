<?php
include('php/query.php');
include('components/sidebar.php');
include('components/navbar.php');
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
        <div class="breadcrumb-title pe-3">Portfolio</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0 align-items-center">
              <li class="breadcrumb-item"><a href="javascript:;"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">View Designs</li>
            </ol>
          </nav>
        </div>
        <div class="ms-auto">
          <div class="btn-group">
            <button type="button" class="btn btn-outline-primary">
              <i class="fas fa-cog"></i> Settings
            </button>
            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
              <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
              <a class="dropdown-item" href="javascript:;">Action</a>
              <a class="dropdown-item" href="javascript:;">Another action</a>
              <a class="dropdown-item" href="javascript:;">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="javascript:;">Separated link</a>
            </div>
          </div>
        </div>
      </div>
    <!--end breadcrumb-->

    <!-- content begin -->
    <div class="container-fluid mt-5">
        <div id="content" class="no-top no-bottom">
            <section aria-label="section">
                <div class="container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row justify-content-around">
                            <h3 class="text-center mb-5">Add Blog</h3>
                            <div class="col-md-10">
                                <!-- Blog Page Image Upload -->
                                <div class="card-body">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img src="../assets/images/addportfoliodesign/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar1" />
                                        <div class="button-wrapper">
                                            <label for="upload1" class="btn btn-primary me-2 mb-4">
                                                <i class="fas fa-upload"></i> Upload Photo For Blogs Page
                                            </label>
                                            <input type="file" id="upload1" name="blogs_page_img" class="account-file-input" hidden accept="image/*" onchange="previewImage(this, 'uploadedAvatar1')" required />
                                            <p class="text-muted mb-0">Image size is 600 x 400 px</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Blog Image Upload -->
                                <div class="card-body mt-5">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img src="../assets/images/addportfoliodesign/1.png" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar2" />
                                        <div class="button-wrapper">
                                            <label for="upload2" class="btn btn-primary me-2 mb-4">
                                                <i class="fas fa-upload"></i> Upload Photo For Blog
                                            </label>
                                            <input type="file" id="upload2" name="blog_img" class="account-file-input" hidden accept="image/*" onchange="previewImage(this, 'uploadedAvatar2')" required />
                                            <p class="text-muted mb-0">Image size is 800 x 533 px</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Blog Meta Information -->
                            <div class="col-md-5 mt-5">
                                <div class="form-group">
                                    <label for="heading">Heading</label>
                                    <input type="text" name="heading" id="heading" class="form-control" required>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="meta_des">Meta Description</label>
                                    <textarea name="meta_des" id="meta_des" class="form-control" required></textarea>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="meta_key">Meta Keywords</label>
                                    <textarea name="meta_key" id="meta_key" class="form-control" required></textarea>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="post_date">Date of Post</label>
                                    <input type="text" name="post_date" id="post_date" class="form-control" placeholder="APRIL 1, 2018" required>
                                </div>
                            </div>

                            <!-- Blog Introduction -->
                            <div class="col-md-5 mt-5">
                                <div class="form-group">
                                    <label for="intro_1">Introduction First Line</label>
                                    <textarea name="intro_1" id="intro_1" class="form-control" required></textarea>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="intro_2">Introduction Second Line</label>
                                    <textarea name="intro_2" id="intro_2" class="form-control" required></textarea>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="intro_3">Introduction Rest of the Line</label>
                                    <textarea name="intro_3" id="intro_3" class="form-control" required></textarea>
                                </div>
                            </div>

                            <!-- Blog Main Content -->
                            <div class="col-md-10 mt-5">
                                <div class="form-group">
                                    <label for="cont_1">Main Content</label>
                                    <div id="editor-cont_1" style="height: 300px;"></div>
                                    <textarea name="cont_1" id="cont_1" class="form-control" style="display:none;"></textarea>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="conclusion">Conclusion</label>
                                    <textarea name="conclusion" id="conclusion" class="form-control" required></textarea>
                                </div>
                                <button class="btn btn-primary mt-5" name="addblog" type="submit">Add Blog</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
</div>

<!-- content close -->
<script>
    function previewImage(input, imgId) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var img = document.getElementById(imgId);
            img.src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }

    // Initialize Quill editor
    var quill1 = new Quill('#editor-cont_1', { theme: 'snow' });

    // Sync Quill content to the textarea whenever it changes
    quill1.on('text-change', function() {
        document.querySelector('textarea[name=cont_1]').value = quill1.root.innerHTML;
    });
</script>

<?php
include('components/footer.php');
?>
