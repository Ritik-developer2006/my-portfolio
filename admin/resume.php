<?php
require_once("header.php");
?>
<link rel="stylesheet" href="assets/css/jquery.uploader.css">
<link rel="stylesheet" href="assets/css/dropzone.min.css">

<!-- main content start -->
<div class="main-content">
    <div class="dashboard-breadcrumb mb-25">
        <h2>Resume Section</h2>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <!-- All Educations -->
            <div class="panel mb-25">
                <div class="panel-header d-flex justify-content-between">
                    <div><h5 class="fw-bold">Educations</h5></div>
                    <div><i class="fa-solid fa-circle-plus"></i></div>
                </div>
                <div class="panel-body">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div>Diploma</div>
                            <div><i class="fa-solid fa-pen-to-square"></i></div>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="inputWithIcon" class="form-label">Input with icon</label>
                                    <div class="input-group-with-icon">
                                        <span class="input-icon">
                                            <i class="fa-light fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control ps-0" id="inputWithIcon" placeholder="example@info.com">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="inputWithIcon" class="form-label">Input with icon</label>
                                    <div class="input-group-with-icon">
                                        <span class="input-icon">
                                            <i class="fa-light fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control ps-0" id="inputWithIcon" placeholder="example@info.com">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <label for="inputDate" class="form-label">Input date</label>
                                    <input type="date" class="form-control" id="inputDate">
                                </div>

                                <div class="col-sm-6">
                                    <label for="inputDate" class="form-label">Input date</label>
                                    <input type="date" class="form-control" id="inputDate">
                                </div>
                                
                                <div class="col-sm-12">
                                    <label for="exampleTextarea" class="form-label">Example textarea</label>
                                    <textarea class="form-control" id="exampleTextarea"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
             <!-- All Experinces -->
            <div class="panel mb-25">
                <div class="panel-header d-flex justify-content-between">
                    <div><h5 class="fw-bold">Experinces</h5></div>
                    <div><i class="fa-solid fa-circle-plus"></i></div>
                </div>
                <div class="panel-body">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div>Diploma</div>
                            <div><i class="fa-solid fa-pen-to-square"></i></div>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="inputWithIcon" class="form-label">Input with icon</label>
                                    <div class="input-group-with-icon">
                                        <span class="input-icon">
                                            <i class="fa-light fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control ps-0" id="inputWithIcon" placeholder="example@info.com">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="inputWithIcon" class="form-label">Input with icon</label>
                                    <div class="input-group-with-icon">
                                        <span class="input-icon">
                                            <i class="fa-light fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control ps-0" id="inputWithIcon" placeholder="example@info.com">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <label for="inputDate" class="form-label">Input date</label>
                                    <input type="date" class="form-control" id="inputDate">
                                </div>

                                <div class="col-sm-6">
                                    <label for="inputDate" class="form-label">Input date</label>
                                    <input type="date" class="form-control" id="inputDate">
                                </div>
                                
                                <div class="col-sm-12">
                                    <label for="exampleTextarea" class="form-label">Example textarea</label>
                                    <textarea class="form-control" id="exampleTextarea"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
             <!-- All Skills -->
            <div class="panel mb-25">
                <div class="panel-header d-flex justify-content-between">
                    <div><h5 class="fw-bold">Skills</h5></div>
                    <div><i class="fa-solid fa-circle-plus"></i></div>
                </div>
                <div class="panel-body">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div>HTML/CSS</div>
                            <div><i class="fa-solid fa-pen-to-square"></i></div>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="inputWithIcon" class="form-label">Input with icon</label>
                                    <div class="input-group-with-icon">
                                        <span class="input-icon">
                                            <i class="fa-light fa-envelope"></i>
                                        </span>
                                        <input type="email" class="form-control ps-0" id="inputWithIcon" placeholder="example@info.com">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="range4" class="form-label">Example range</label>
                                    <div class="input-group-with-icon">
                                        <span class="input-icon">
                                            <output for="range4" id="rangeValue" aria-hidden="true"></output>%
                                        </span>
                                        <input type="range" class="form-range" min="0" max="100" value="50" id="range4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer start -->
    <div class="footer">
        <p>© <script>
                document.write(new Date().getFullYear())
            </script> RITIK KUMAR | All Rights Reserved | Personal Portfolio Website Design <span class="text-primary">Digiboard</span></p>
    </div>
    <!-- footer end -->
</div>
<!-- main content end -->

<?php
require_once("footer.php");
?>
<script src="assets/js/jquery.uploader.min.js"></script>
<script src="assets/js/dropzone.min.js"></script>
<script src="assets/js/ckeditor.js"></script>
<script src="assets/js/dropzone-init.js"></script>
<script>
    // This is an example script, please modify as needed
  const rangeInput = document.getElementById('range4');
  const rangeOutput = document.getElementById('rangeValue');

  // Set initial value
  rangeOutput.textContent = rangeInput.value;

  rangeInput.addEventListener('input', function() {
    rangeOutput.textContent = this.value;
  });
</script>