<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/jquery.overlayScrollbars.min.js"></script>
<script src="assets/js/apexcharts.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/daterangepicker.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/dashboard.js"></script>
<script src="assets/js/main.js"></script>
<!-- for demo purpose -->
<script>
    var rtlReady = $('html').attr('dir', 'ltr');
    if (rtlReady !== undefined) {
        localStorage.setItem('layoutDirection', 'ltr');
    }
    setTimeout(() => {
        $(".preloader").hide();
    }, 500);

    $("#logOut").on("click", function (e) {
        $.ajax({
            type: 'POST',
            url: '/Ritik Portfolio/API/adminApi.php',
            dataType: 'JSON',
            data: JSON.stringify({
                method: 'logOut'
            }),
            contentType: "application/json",
            beforeSend: function () {
                $(".preloader").show();
            },
            complete: function () {
                $(".preloader").hide();
            },
            success: function (response) {
                console.log(response);
                let status = response.status;
                if (status == 1) {
                    alert("LogOut successfully!");
                    window.location.href = "login.php";
                } else {
                    alert("Something went wrong!");
                }
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    });
</script>
<!-- for demo purpose -->
</body>

<!-- Mirrored from digiboard-html.codebasket.xyz/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Dec 2025 15:46:47 GMT -->

</html>