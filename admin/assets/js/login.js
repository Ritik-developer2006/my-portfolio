// 1. Password Visibility Toggle
const toggle = document.getElementById('togglePassword');
const password = document.getElementById('password');

toggle.addEventListener('click', () => {
    const type = password.type === 'password' ? 'text' : 'password';
    password.type = type;
    // Toggle between open eye and slashed eye icons
    toggle.classList.toggle('fa-eye-slash');
    toggle.classList.toggle('fa-eye');
});

$(function () {

    if (typeof $.fn.ripples !== 'function') {
        console.error('Ripples plugin still not available');
        return;
    }

    const $body = $('body');

    $body.ripples({
        resolution: 600,
        dropRadius: 25,
        perturbance: 0.02
    });

    // Auto waves
    // setInterval(() => {
    //     $body.ripples(
    //         'drop',
    //         Math.random() * window.innerWidth,
    //         Math.random() * window.innerHeight,
    //         30,
    //         0.03
    //     );
    // }, 2500);

    // Click waves
    $body.on('click', e => {
        $body.ripples('drop', e.pageX, e.pageY, 40, 0.04);
    });

});

$(document).ready(function () {
    $("#logIn").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("method", "logIn");
        $.ajax({
            type: 'POST',
            url: '/Ritik Portfolio/API/adminApi.php',
            dataType: 'JSON',
            data: formData,
            processData: false,
            contentType: false,
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
                    alert("LogIn successfully!");
                    window.location.href = "dashboard.php";
                } else {
                    alert("Incorrect Username or Password!");
                }
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    });

    setTimeout(() => {
        $(".preloader").hide();
    }, 500);
});