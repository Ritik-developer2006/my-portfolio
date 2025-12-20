$(document).ready(function () {
    // alert("dasdasd");
    // console.log("Custom JS is running!");

    // Download CV
    $('#download_cv').click(function () {
        var pdfUrl = "/Ritik Portfolio/Resume/cv.pdf";
        $.ajax({
            url: pdfUrl,
            type: 'HEAD',
            success: function () {
                var link = document.createElement('a');
                link.href = pdfUrl;
                link.download = 'cv.pdf';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            },
            error: function () {
                alert("File not found. Please check the file path.");
            }
        });
    });

    // File input validation
    $("#contact-file").on("change", function () {
        var file = $(this).val();
        if (!file) return;

        var allowedExtensions = /(\.pdf|\.doc|\.docx|\.xls|\.xlsx|\.jpg|\.jpeg|\.png|\.gif)$/i;
        if (!allowedExtensions.exec(file)) {
            alert("Invalid file type. Please upload PDF, DOCX, Excel, or an image file.");
            $(this).val("");
            return false;
        }
    });

    // Contact form submit
    $("#contact-form").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("method", "send_mail");
        $.ajax({
            type: 'POST',
            url: '/Ritik Portfolio/API/userApi.php',
            dataType: 'JSON',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(".preloader, .preloader-icon").show();
            },
            complete: function () {
                $(".preloader, .preloader-icon").hide();
            },
            success: function (response) {
                let status = response.status;
                if (status == 1) {
                    alert("Message sent successfully!");
                    location.reload();
                } else {
                    alert("Something went wrong, Try again!");
                }
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    });

    // Feedback form Submit
    $("#feedback-form").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("method", "send_feedback");
        $.ajax({
            type: 'POST',
            url: '/Ritik Portfolio/API/userApi.php',
            dataType: 'JSON',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(".preloader, .preloader-icon").show();
            },
            complete: function () {
                $(".preloader, .preloader-icon").hide();
            },
            success: function (response) {
                let status = response.status;
                if (status == 1) {
                    alert("Thankyou for your Feedback!");
                    location.reload();
                } else {
                    alert("Something went wrong, Try again!");
                }
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    });

    $("#your_feeedback").on("click", function () {
        $("#myModal").modal("show");
    });
});
