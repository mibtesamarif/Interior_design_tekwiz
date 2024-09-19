<!doctype html>
<html lang="en">
  
<!-- Mirrored from codervent.com/fobia/demo/ltr/form-validations.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2024 10:31:42 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- loader-->
	  <link href="dashmin_panel/assets/css/pace.min.css" rel="stylesheet" />
	  <script src="dashmin_panel/assets/js/pace.min.js"></script>

    <!--plugins-->
    <link href="dashmin_panel/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="dashmin_panel/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="dashmin_panel/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="dashmin_panel/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="dashmin_panel/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="dashmin_panel/assets/css/style.css" rel="stylesheet">
    <link href="dashmin_panel/assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">

    <!--Theme Styles-->
    <link href="dashmin_panel/assets/css/dark-theme.css" rel="stylesheet" />
    <link href="dashmin_panel/assets/css/semi-dark.css" rel="stylesheet" />
    <link href="dashmin_panel/assets/css/header-colors.css" rel="stylesheet" />

    <title>Fobia - Bootstrap5 Admin Template</title>
  </head>
  <body>
    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
          <!-- start page content-->
         <div class="page-content">
        <div class="row mt-5 pt-5">
            <div class="col-lg-6 mx-auto">
                <div class="card">
                  <div class="card-header px-4 py-3">
                    <h5 class="mb-0">jQuery Validation</h5>
                  </div>
                  <div class="card-body p-4">
                    <form id="jQueryValidationForm" method="post3" action="#">
                      <div class="row mb-3">
                        <label for="input35" class="col-sm-3 col-form-label">Enter Your Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="input35" name="yourname" placeholder="Enter Your Name">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="input36" class="col-sm-3 col-form-label">Phone No</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="input36" name="phone" placeholder="Phone No">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="input37" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="input37" name="username" placeholder="Email Address">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="input37" class="col-sm-3 col-form-label">Email Address</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="input37" name="email" placeholder="Email Address">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="input38" class="col-sm-3 col-form-label">Choose Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="input38" name="password" placeholder="Choose Password">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="input38" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="input38" name="confirm_password" placeholder="Confirm Password">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="input39" class="col-sm-3 col-form-label">Select Country</label>
                        <div class="col-sm-9">
                          <select class="form-select" id="input39" name="country">
                            <option selected disabled value>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="input40" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" id="input40" name="address" rows="3" placeholder="Address"></textarea>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="input41" name="agree">
                            <label class="form-check-label" for="input41">Check me out</label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                          <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary px-4" name="submit2">Submit</button>
                            <button type="reset" class="btn btn-light px-4">Reset</button>
                          </div>
                        </div>
                      </div>
                    </form>
    
                  </div>
                </div>
              </div>
        </div>
            <!--end row-->


            </div>
          <!-- end page content-->
         </div>

<!-- JS Files-->
<script src="dashmin_panel/assets/js/jquery.min.js"></script>
    <script src="dashmin_panel/assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="dashmin_panel/assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="dashmin_panel/assets/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="dashmin_panel/../../../../unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--plugins-->
    <script src="dashmin_panel/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="dashmin_panel/assets/plugins/validation/jquery.validate.min.js"></script>
    <script src="dashmin_panel/assets/plugins/validation/validation-script.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
          'use strict'
    
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.querySelectorAll('.needs-validation')
    
          // Loop over them and prevent submission
          Array.prototype.slice.call(forms)
          .forEach(function (form) {
            form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }
    
            form.classList.add('was-validated')
            }, false)
          })
        })()
    </script>

    <!-- Main JS-->
    <script src="dashmin_panel/assets/js/main.js"></script>


  </body>

<!-- Mirrored from codervent.com/fobia/demo/ltr/form-validations.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Sep 2024 10:31:43 GMT -->
</html>