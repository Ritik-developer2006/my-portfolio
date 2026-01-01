<?php
require_once("header.php");
?>
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<style>
    .tox-tinymce {
        height: 312px !important;
    }

    .tox-promotion-button {
        display: none !important;
    }

    .tox-statusbar {
        display: none !important;
    }

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

    .tox-notification {
        display: none !important;
    }
</style>
<!-- main content start -->
<div class="main-content">
    <div class="dashboard-breadcrumb mb-25 border shadow">
        <h2>Blog Section</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <!-- All Educations -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">All Blogs</h5>
                    </div>
                    <div><i class="fa-solid fa-circle-plus" id="add_blog" style="cursor: pointer"></i></div>
                </div>
                <div class="panel-body d-flex flex-column justify-content-center align-items-center" id="education_container">
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
    <script src="https://cdn.tiny.cloud/1/wd87r1fgxzh2szjregh8gh38b074cx3wkj0d7qk6yol0zggp/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
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

            // SINGLE DOCUMENT
            document.querySelectorAll('.singleDocument').forEach(input => {

                if (FilePond.find(input)) return;

                FilePond.create(input, {
                    allowMultiple: false,
                    acceptedFileTypes: [
                        'application/pdf', // PDF
                        'application/msword', // DOC
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // DOCX
                        'application/vnd.ms-excel', // XLS
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // XLSX
                        'text/plain' // TXT
                    ],
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

            // SINGLE VIDEO
            document.querySelectorAll('.singleVideo').forEach(input => {

                if (FilePond.find(input)) return;

                FilePond.create(input, {
                    allowMultiple: false,
                    acceptedFileTypes: [
                        'video/mp4', // MP4
                        'video/ogg', // OGG
                        'video/webm', // WebM
                        'video/avi', // AVI (may need browser support check)
                        'video/mov', // MOV (QuickTime)
                        'video/mpeg' // MPEG
                    ],
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

            // MULTIPLE UPLOAD
            document.querySelectorAll('.multipleUpload').forEach(input => {

                if (FilePond.find(input)) return;

                FilePond.create(input, {
                    allowMultiple: true,
                    maxFiles: 4,
                    acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg', 'image/webp'],
                    allowFileTypeValidation: true,
                    allowFileSizeValidation: true,
                    labelIdle: `
                <i class="fa-solid fa-cloud-arrow-up fa-2x"></i>
                <h4 style="font-size:12px;font-weight:700;">Multiple Upload</h4>
                `,
                    imagePreviewHeight: 70,
                    itemPanelAspectRatio: 1,
                    styleItemPanelAspectRatio: 1,
                    styleItemPanelBorderRadius: '8px'
                });
            });
        }


        function textEditor() {
            tinymce.init({
                selector: '.text-editor',
                plugins: [
                    // Core editing features
                    'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
                    // Your account includes a free trial of TinyMCE premium features
                    // Try the most popular premium features until Jan 4, 2026:
                    'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'advtemplate', 'ai', 'uploadcare', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
                ],
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography uploadcare | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                mergetags_list: [{
                        value: 'First.Name',
                        title: 'First Name'
                    },
                    {
                        value: 'Email',
                        title: 'Email'
                    },
                ],
                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
                uploadcare_public_key: 'b4dcf4234d769594174e',
            });
        }

        getAllblogs();

        function getAllblogs() {
            $.ajax({
                type: 'POST',
                url: '/API/adminApi.php',
                dataType: 'JSON',
                data: JSON.stringify({
                    method: 'getAllBlogs'
                }),
                contentType: "application/json",
                beforeSend: function() {
                    $(".preloader").show();
                },
                complete: function() {
                    $(".preloader").hide();
                },
                success: function(response) {
                    console.log(response);
                    let status = response.status;
                    if (status == 1) {
                        let html = "";
                        if (response.data.length > 0) {
                            $.each(response.data, function(index, item) {
                                html += `<div class="card col-12${item.id != 1 ? ' mt-3' : ''}">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>${item.title}</div>
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
                                                        <label for="blog_title${item.id}" class="form-label">Input with icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly name='blog_title' value="${item.title}" class="form-control ps-2" id="blog_title${item.id}" placeholder="Your title">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-12">
                                                        <label for="description${item.id}" class="form-label">Example textarea</label>
                                                        <textarea class="form-control" rows="5" readonly name="description" id="description${item.id}">${item.description}</textarea>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <label for="full_detail${item.id}" class="form-label">Example textarea</label>
                                                        <textarea class="form-control text-editor" readonly name="full_detail" id="full_detail${item.id}">${item.full_detail}</textarea>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label class="form-label" for="card_image${item.id}">Card Image
                                                        </label>
                                                        <input type="text" id="card_image${item.id}" class="singleUpload">
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label class="form-label" for="document${item.id}">Atttach Document
                                                        </label>
                                                        <input type="text" id="document${item.id}" class="singleDocument">
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <label class="form-label" for="video${item.id}">Blog Video
                                                        </label>
                                                        <input type="text" id="video${item.id}" class="singleVideo">
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <label class="form-label" for="multiple_image${item.id}">Multiple Blog Image
                                                        </label>
                                                        <input type="text" multiple accept="image/*" id="multiple_image${item.id}" class="multipleUpload">
                                                    </div>

                                                    <div class="col-sm-12 d-none">
                                                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>`;
                            });
                            $("#education_container").html(html);
                            textEditor();
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