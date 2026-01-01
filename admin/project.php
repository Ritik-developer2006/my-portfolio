<?php
require_once("header.php");
?>
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .filepond--credits {
        display: none !important;
    }

    .filepond--root {
        min-height: 60px;
    }

    .card,
    .card-body,
    .col-lg-4,
    .col-md-5 {
        overflow: visible !important;
    }

    .filepond--item {
        width: calc(25% - 0.5em);
    }

    .filepond--image-preview-overlay {
        display: none !important;
    }

    .select2-container--default .select2-selection--single {
        background: transparent;
        border: 0px solid black !important;
    }

    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 33px;
        user-select: none;
        -webkit-user-select: none;
    }

    .select2-selection__rendered {
        margin-top: 4px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 26px;
        position: absolute;
        top: 5px !important;
        right: 1px;
        width: 20px;
    }
</style>

<!-- main content start -->
<div class="main-content">
    <div class="dashboard-breadcrumb mb-25 border shadow">
        <h2>Projects Section</h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- All Educations -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">Categories</h5>
                    </div>
                    <div><i class="fa-solid fa-circle-plus" id="add_education" style="cursor: pointer"></i></div>
                </div>
                <div class="panel-body d-flex justify-content-center align-items-center gap-3" id="category_container" style="min-height: auto;">
                    <!-- data come through ajax -->
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div>
                            <i class="fa-solid fa-circle-info fs-1"></i>
                        </div>
                        <div>
                            <h5>Data Not Available!</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <!-- All Experinces -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">All Projects</h5>
                    </div>
                    <div><i class="fa-solid fa-circle-plus"></i></div>
                </div>
                <div class="panel-body d-flex flex-column justify-content-center align-items-center" id="project_container">
                    <!-- data come through ajax -->
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div>
                            <i class="fa-solid fa-circle-info fs-1"></i>
                        </div>
                        <div>
                            <h5>Data Not Available!</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main content end -->
    <?php
    require_once("footer.php");
    ?>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        function initSelect2() {
            $('.select2').select2({
                width: '100%',
                placeholder: '--Select Category--',
                allowClear: true
            });
        }

        function uploadFile() {

            FilePond.registerPlugin(FilePondPluginFileValidateType, FilePondPluginImagePreview);

            // SINGLE UPLOAD
            document.querySelectorAll('.singleUpload').forEach(input => {

                if (FilePond.find(input)) return;

                FilePond.create(input, {
                    allowMultiple: false,
                    acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg', 'image/webp'],
                    allowFileTypeValidation: true,
                    allowFileSizeValidation: true,
                    labelIdle: `
                <i class="fa-solid fa-cloud-arrow-up fa-2x"></i>
                <h4 style="font-size:12px;font-weight:700;">Single Upload</h4>
                `,
                    imagePreviewHeight: 70,
                    styleItemPanelAspectRatio: 1
                });
            });
        }

        getCategories();

        function getCategories() {
            $.ajax({
                type: 'POST',
                url: '/API/adminApi.php',
                dataType: 'JSON',
                data: JSON.stringify({
                    method: 'getProjectFilter'
                }),
                contentType: "application/json",
                beforeSend: function() {
                    $(".preloader").show();
                },
                complete: function() {
                    $(".preloader").hide();
                },
                success: function(response) {
                    // console.log(response);
                    let status = response.status;
                    if (status == 1) {
                        let html = "";
                        if (response.data.length > 0) {
                            $.each(response.data, function(index, item) {
                                html += `<div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>${item.name}</div>
                                            <div>
                                            <i class="fa-solid fa-pen-to-square edit_education" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-trash delete_education text-danger" style="cursor: pointer;"></i>
                                            </div>
                                            <input type="hidden" value="${item.id}" class="edu_id">
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#">
                                                <div class="row g-3">
                                                    <div class="col-sm-12">
                                                        <label for="university${item.id}" class="form-label">Category Name</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly name='university' value="${item.name}" class="form-control ps-2" id="university${item.id}" placeholder="Your university">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 d-none">
                                                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>`;
                            });
                            $("#category_container").removeClass("justify-content-center");
                            $("#category_container").html(html);
                        }

                    }
                },
                error: function() {
                    console.log("Something went wrong, while geting data of educations!");
                }
            });
        };

        function getAllCategories() {
            $.ajax({
                type: 'POST',
                url: '/API/adminApi.php',
                dataType: 'JSON',
                data: JSON.stringify({
                    method: 'getProjectFilter'
                }),
                contentType: "application/json",
                beforeSend: function() {
                    $(".preloader").show();
                },
                complete: function() {
                    $(".preloader").hide();
                },
                success: function(response) {
                    // console.log(response);
                    let status = response.status;
                    if (status == 1) {
                        let html = "";
                        if (response.data.length > 0) {
                            html += `<option value="">--Select Category--</option>`;
                            $.each(response.data, function(index, item) {
                                html += `<option value="${item.id}">${item.name}</option>`;
                            });
                            $(".project_category").html(html);
                        }
                    }
                },
                error: function() {
                    console.log("Something went wrong, while geting data of educations!");
                }
            });
        };

        getAllProjects();

        function getAllProjects() {
            $.ajax({
                type: 'POST',
                url: '/API/adminApi.php',
                dataType: 'JSON',
                data: JSON.stringify({
                    method: 'getAllProject'
                }),
                contentType: "application/json",
                beforeSend: function() {
                    $(".preloader").show();
                },
                complete: function() {
                    $(".preloader").hide();
                },
                success: function(response) {
                    // console.log(response);
                    let status = response.status;
                    if (status == 1) {
                        let html = "";
                        if (response.data.length > 0) {
                            $.each(response.data, function(index, item) {
                                html += `<div class="card col-12 ${item.id != 1 ? 'mt-3' : ''}">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>${item.project_name}</div>
                                            <div>
                                            <i class="fa-solid fa-pen-to-square edit_experince" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-trash delete_experince text-danger" style="cursor: pointer;"></i>
                                            </div>
                                            <input type="hidden" value="${item.id}" class="ex_id">
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#">
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label for="job_title${item.id}" class="form-label">Input with icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly name='job_title' value="${item.project_name}" class="form-control ps-2" id="job_title${item.id}" placeholder="Your college">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="company_name${item.id}" class="form-label">Input with icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly name='company_name' value="${item.link}" class="form-control ps-2" id="company_name${item.id}" placeholder="Company Name">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 d-flex gap-4">
                                                        <div>
                                                            <label for="icon${item.id}" class="form-label">Prev. Image</label>
                                                            <div class="">
                                                                <img src="../img/${item.images}" width="150" class="border">
                                                            </div>
                                                        </div>
                                                        <div class="flex-fill">
                                                            <label class="form-label" for="image${item.id}">New Image
                                                            </label>
                                                            <input type="text" id="image${item.id}" class="singleUpload">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="job_title${item.id}" class="form-label">Category</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <select name='project_category' class="form-control ps-2 project_category select2">
                                                                <option>--Select Category--</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-12">
                                                        <label for="ex_description${item.id}" class="form-label">Example textarea</label>
                                                        <textarea class="form-control" readonly rows="5" name="description" id="ex_description${item.id}">${item.description}</textarea>
                                                    </div>

                                                    <div class="col-sm-12 d-none">
                                                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>`;
                            });
                            $("#project_container").html(html);
                            getAllCategories();
                            uploadFile();
                            initSelect2();
                        }
                    }
                },
                error: function() {
                    console.log("Something went wrong, while geting data of educations!");
                }
            });
        };
    </script>