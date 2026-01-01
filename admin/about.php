<?php
require_once("header.php");
?>
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
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
</style>

<!-- main content start -->
<div class="main-content">
    <div class="dashboard-breadcrumb mb-25 border shadow">
        <h2>About Section</h2>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <!-- All Educations -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">Testimonials</h5>
                    </div>
                    <!-- <div><i class="fa-solid fa-circle-plus" id="add_education" style="cursor: pointer"></i></div> -->
                </div>
                <div class="panel-body d-flex flex-column justify-content-center align-items-center" id="testimonial_container">
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
        <div class="col-lg-6">
            <!-- All Experinces -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">Services</h5>
                    </div>
                    <div><i class="fa-solid fa-circle-plus"></i></div>
                </div>
                <div class="panel-body d-flex flex-column justify-content-center align-items-center" id="service_container">
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
            <!-- All Skills -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">Basic Details</h5>
                    </div>
                    <div><i class="fa-solid fa-circle-plus"></i></div>
                </div>
                <div class="panel-body d-flex flex-column justify-content-center align-items-center" id="basic_container">
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

    <?php
        require_once("footer.php");
    ?>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
    <script>
        
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

        getBasicDetails();

        function getBasicDetails() {
            $.ajax({
                type: 'POST',
                url: '/API/adminApi.php',
                dataType: 'JSON',
                data: JSON.stringify({
                    method: 'getAboutUs'
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
                                            <div>Basic Details</div>
                                            <div>
                                            <i class="fa-solid fa-pen-to-square edit_education" style="cursor: pointer;"></i>
                                            </div>
                                            <input type="hidden" value="${item.id}" class="basic_id">
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#">
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label for="heading${item.id}" class="form-label">Input with icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly name='heading' value="${item.heading}" class="form-control ps-2" id="heading${item.id}" placeholder="Your heading">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="twitter_link${item.id}" class="form-label">Input with icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly name='twitter_link' value="${item.twitter_link}" class="form-control ps-2" id="twitter_link${item.id}" placeholder="Your twitter link">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="instagram_link${item.id}" class="form-label">Input with icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly name='instagram_link' value="${item.instagram_link}" class="form-control ps-2" id="instagram_link${item.id}" placeholder="Your instagram link">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="linkdin_link${item.id}" class="form-label">Input with icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly name='linkdin_link' value="${item.linkdin_link}" class="form-control ps-2" id="linkdin_link${item.id}" placeholder="Your linkdin link">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="github_link${item.id}" class="form-label">Input with icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly name='github_link' value="${item.github_link}" class="form-control ps-2" id="github_link${item.id}" placeholder="Your github link">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="facebook_link${item.id}" class="form-label">Input with icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly name='facebook_link' value="${item.facebook_link}" class="form-control ps-2" id="facebook_link${item.id}" placeholder="Your facebook link">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-12 col-lg-6">
                                                        <label for="description${item.id}" class="form-label">Example textarea</label>
                                                        <textarea class="form-control" rows='5' readonly name="description" id="description${item.id}">${item.description}</textarea>
                                                    </div>

                                                    <div class="col-sm-12 col-lg-6 d-flex gap-4">
                                                        <div>
                                                            <label for="icon${item.id}" class="form-label">Prev. Image</label>
                                                            <div class="">
                                                                <img src="../img/${item.image}" width="80">
                                                            </div>
                                                        </div>
                                                        <div class="flex-fill">
                                                            <label class="form-label" for="image${item.id}">New Image
                                                            </label>
                                                            <input type="text" id="image${item.id}" class="singleUpload">
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
                            $("#basic_container").html(html);
                            uploadFile();
                        }
                    }
                },
                error: function() {
                    console.log("Something went wrong, while geting data of educations!");
                }
            });
        };

        getAllServices();

        function getAllServices() {
            $.ajax({
                type: 'POST',
                url: '/API/adminApi.php',
                dataType: 'JSON',
                data: JSON.stringify({
                    method: 'getAllServices'
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
                                html += `<div class="card ${item.id != 1 ? 'mt-3' : ''}">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>${item.heading}</div>
                                            <div>
                                            <i class="fa-solid fa-pen-to-square edit_experince" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-trash delete_experince text-danger" style="cursor: pointer;"></i>
                                            </div>
                                            <input type="hidden" value="${item.id}" class="ser_id">
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#">
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label for="heading${item.id}" class="form-label">Input with icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly name='heading' value="${item.heading}" class="form-control ps-2" id="heading${item.id}" placeholder="Your heading">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="icon${item.id}" class="form-label">Input with icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly name='icon' value='${item.icon}' class="form-control ps-2" id="icon${item.id}" placeholder="Your icon">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-12">
                                                        <label for="ex_description${item.id}" class="form-label">Example textarea</label>
                                                        <textarea class="form-control" rows="5" readonly name="description" id="ex_description${item.id}">${item.description}</textarea>
                                                    </div>

                                                    <div class="col-sm-12 d-none">
                                                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>`;
                            });
                            $("#service_container").html(html);
                        }
                    }
                },
                error: function() {
                    console.log("Something went wrong, while geting data of educations!");
                }
            });
        };

        getAllTestimonials();

        function getAllTestimonials() {
            $.ajax({
                type: 'POST',
                url: '/API/adminApi.php',
                dataType: 'JSON',
                data: JSON.stringify({
                    method: 'getAllTestimonials'
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
                                html += `<div class="card col-12${item.id != 1 ? ' mt-3' : ''}">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>${item.full_name}</div>
                                            <div>
                                            <i class="fa-solid fa-pen-to-square edit_skill" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-trash delete_skill text-danger" style="cursor: pointer;"></i>
                                            </div>
                                            <input type="hidden" value="${item.id}" class="testimonial_id">
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#">
                                                <div class="row g-3">
                                                    <div class="col-sm-6">
                                                        <label for="full_name${item.id}" class="form-label">Input with icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly name='full_name' value="${item.full_name}" class="form-control ps-2" id="full_name${item.id}" placeholder="Your full name">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <label for="email${item.id}" class="form-label">Example range</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="email" readonly class="form-control" value="${item.email}" id="email${item.id}">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <label for="subject${item.id}" class="form-label">Destination</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly class="form-control" value="${item.subject}" id="subject${item.id}">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 d-flex gap-4">
                                                        <div>
                                                            <label for="icon${item.id}" class="form-label">Prev. Image</label>
                                                            <div class="">
                                                                <img src="../assets/user_images/${item.photo}" width="80">
                                                            </div>
                                                        </div>
                                                        <div class="flex-fill">
                                                            <label class="form-label" for="card_image${item.id}">New Image
                                                            </label>
                                                            <input type="text" id="card_image${item.id}" class="singleUpload">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <label for="ex_description${item.id}" class="form-label">Example textarea</label>
                                                        <textarea class="form-control" rows="5" readonly name="description" id="ex_description${item.id}">${item.description}</textarea>
                                                    </div>

                                                    <div class="col-sm-12 d-none">
                                                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>`;
                            });
                            $("#testimonial_container").html(html);
                            uploadFile();
                        }
                    }
                },
                error: function() {
                    console.log("Something went wrong, while geting data of educations!");
                }
            });
        };
    </script>