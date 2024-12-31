<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Slide</title>
    <style>
    body {
        font-family: "Cairo", sans-serif;
        background-color: #ffffff;

    }

    .carousel-nav-center {
        position: relative;
        color: #ffffff;

    }

    .carousel-nav-center .owl-nav button i {
        font-size: 3rem;
    }

    .carousel-nav-center .owl-nav button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

    .carousel-nav-center .owl-nav .owl-prev {
        position: absolute;
        left: 5px;
    }

    .carousel-nav-center .owl-nav .owl-next {
        position: absolute;
        right: 5px;
    }

    .owl-nav button {
        border: none;
        outline: none;
    }

    .owl-item.active .top-down {
        transform: translateY(0);
        visibility: visible;
        opacity: 1;
    }

    .hero-slide-item {
        padding-top: 34%;
        position: relative;
        overflow: hidden;
        right: 10px;
    }

    .hero-slide-item img {
        width: 100%;
        position: absolute;
        top: 20px;
        left: 20px;
    }

    .hero-slide-item-content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        color: #ffffff;
        display: flex;
    }
    </style>
</head>

<body>
    <div class="hero-section">
        <div class="hero-slide">
            <div class="owl-carousel carousel-nav-center" id="hero-carousel">
                <div class="hero-slide-item">
                    <img src="./gambar/home/f1.jpg" alt="">
                </div>
                <div class="hero-slide-item">
                    <img src="./gambar/home/f3.jpg" alt="">
                </div>
                <div class="hero-slide-item">
                    <img src="./gambar/home/f4.jpg" alt="">
                </div>
                <div class="hero-slide-item">
                    <img src="./gambar/home/f5.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $(document).ready(() => {
        $("#hamburger-menu").click(() => {
            $("#hamburger-menu").toggleClass("active");
            $("#nav-menu").toggleClass("active");
        });

        let navText = [
            "<i class='bx bx-chevron-left'></i>",
            "<i class='bx bx-chevron-right'></i>",
        ];

        $("#hero-carousel").owlCarousel({
            items: 1,
            dots: false,
            loop: true,
            nav: true,
            navText: navText,
            autoplay: true,
            autoplayHoverPause: true,
        });

        $(".movies-slide").owlCarousel({
            items: 2,
            dots: false,
            nav: true,
            navText: navText,
            margin: 45,
            responsive: {
                500: {
                    items: 4,
                },
                1280: {
                    items: 4,
                },
                1600: {
                    items: 6,
                },
            },
        });
    });
    </script>
</body>

</html>