<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnBM0vHqonmXb6e6VhWTeVOTAQ0AMRylQ&callback=initialize">
        </script>

    <script>
        function initialize() {
            var propertiPeta = {
                center: new google.maps.LatLng(-6.2182434,106.8597117), zoom: 15, mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(-6.2182434,106.8597117),
                map: peta,
                content: '<h3>Ini Rumahku!</h3>',
                animation: google.maps.Animation.BOUNCE
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>
<body>
     
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg shadow-sm fixed-top" id="btnNavbar">
        <img src="img/logo.png" alt="logo AquaZone" width="150" class="ms-5">
        <div class="container-fluid" >
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav gap-5 m-2">
                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                <a class="nav-link" href="shop.php">Shop</a>
                <div class="vr"></div>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="mr-auto"></div>
                    <div class="navbar-nav">
                        <a href="index.php" class="nav-item">
                            <!-- <a class="btn me-5" id="loginBtn" href="login.php" role="button">Login</a> -->
                            <ion-icon name="log-out-outline"class="logout me-5 pb-0 pt-1 fw-5" onclick="return confirm('Apakah anda yakin ingin keluar dari halaman ini?');"></ion-icon>
                        </a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </nav>

    <section id="home">
        <div class="jumbotron d-flex justify-content-center">
            <img src="img/judul.jpg" alt="" width="100%">
            <div class="cta" >
                <!-- cta : call to action -->
                <p>Temukan berbagai macam ikan berkualitas premium untuk mempercantik akuarium Anda. Dan Konsultasikan dengan tim spesialis akuakultur kami - mereka ada di sini untuk memandu Anda di setiap langkah.</p>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="slide2 d-flex justify-content-center">
            <img src="img/about.jpg" alt="" width="100%"></img>
            <div class="about">
                <p style="color:#bbbbbb">Welcome to the world of AquaZone! - where your dream aquarium comes to life.</p>
                <div class="desc container overflow-hidden mt-5">
                    <div class="row gx-5">
                        <div class="col-6 object-fit-cover">
                            <img src="img/logo2.png" alt="logo AquaZone" width="100%">
                        </div>
                        <div class="col-6 mt-5">
                            <h1 class="my-3">About Us</h1>
                            <p>Aquazone telah menyediakan perlengkapan ikan hias dan akuarium berkualitas tinggi selama lebih dari 15 tahun. Tim ahli akuakultur kami mengumpulkan beragam pilihan spesies ikan yang sehat dan dinamis dari varietas tropis klasik hingga yang paling unik dan menawan.<br><br> Baik Anda seorang penghobi berpengalaman atau baru memulai, spesialis kami yang ramah siap menawarkan panduan dan dukungan pribadi untuk membantu Anda membangun akuarium impian Anda.<br><br> Selain toko online kami yang luas, kami berkomitmen terhadap pengadaan ikan yang berkelanjutan dan praktik akuarium yang bertanggung jawab.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="favorite">
        <div class="slide3">
            <img src="img/favorite.jpg" alt="" width="100%"></img>
            <div class="featuredFish">
                <div class="title mb-5 pb-5">
                    <h3 class="ps-5 mb-2 pb-2">Featured Fish Favorites</h3>
                    <p class="ps-5">Temukan 5 ikan hias paling menawan kami, yang dipilih langsung oleh pakar akuakultur kami:</p>
                </div>

                <div id="carouselExampleInterval" class="carousel slide position-relative" data-bs-ride="carousel">
                <div class="carousel-inner">
                <div class="row">
                    <div class="col-12">
                        <div class="carousel-item active fav-fish" data-bs-interval="2000">
                            <div class="card-fish">
                                <div class="fish">
                                    <div class="row justify-content-md-center">
                                        <div class="col-7 text-center">
                                            <img src="img/betta.png" alt="betta fish" width="350px">
                                        </div>
                                        <div class="col-5">
                                            <h5 class="pb-3 mb-3">Betta (Siamese Fighting Fish)</h5>
                                            <p class="pe-5 me-5">Ikan yang dinamis dan karismatik yang terkenal dengan siripnya yang mengalir dan warnanya yang berani. Cupang menjadi hiasan tengah yang menawan di akuarium kecil atau mangkuk cupang.</p>
                                            <div class="btn-view d-flex justify-content-end me-5 pe-5">
                                                <button class="btn view-detail mt-3 " data-bs-toggle="modal" data-bs-target="#betta">View Detail</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item fav-fish" data-bs-interval="2000">
                            <div class="card-fish">
                                <div class="fish">
                                    <div class="row justify-content-md-center">
                                        <div class="col-7 text-center">
                                            <img src="img/goldFish.png" alt="gold fish" width="350px">
                                        </div>
                                        <div class="col-5">
                                            <h5 class="pb-3 mb-3"> Goldfish</h5>
                                            <p class="pe-5 me-5">Ikan hias klasik yang dihargai karena warnanya yang cerah, ceria, dan bentuk tubuh yang unik seperti ekor tunggal dan varietas yang mewah. Ikan mas tumbuh subur di akuarium atau kolam yang lebih besar.</p>
                                            <div class="btn-view d-flex justify-content-end me-5 pe-5">
                                                <button class="btn view-detail mt-3 " data-bs-toggle="modal" data-bs-target="#goldfish">View Detail</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item fav-fish" data-bs-interval="2000">
                            <div class="card-fish">
                                <div class="fish">
                                    <div class="row justify-content-md-center">
                                        <div class="col-7 text-center">
                                            <img src="img/clownFish.png" alt="clown fish" width="350px">
                                        </div>
                                        <div class="col-5">
                                            <h5 class="pb-3 mb-3"> Clownfish (Anemonefish)</h5>
                                            <p class="pe-5 me-5">Dikenali secara instan karena pola garis-garis oranye dan putihnya yang tebal, ikan badut adalah favorit abadi untuk akuarium air asin. Mereka membentuk hubungan simbiosis dengan anemon laut.</p>
                                            <div class="btn-view d-flex justify-content-end me-5 pe-5">
                                                <button class="btn view-detail mt-3 " data-bs-toggle="modal" data-bs-target="#clownfish">View Detail</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item fav-fish" data-bs-interval="2000">
                            <div class="card-fish">
                                <div class="fish">
                                    <div class="row justify-content-md-center">
                                        <div class="col-7 text-center">
                                            <img src="img/guppyFish.png" alt="guppy fish" width="350px">
                                        </div>
                                        <div class="col-5">
                                            <h5 class="pb-3 mb-3"> Guppy</h5>
                                            <p class="pe-5 me-5">Livebearer yang kuat dan berwarna cerah serta mudah dirawat. Ikan guppy hadir dalam berbagai macam pola warna yang menakjubkan dan sempurna untuk akuarium komunitas.</p>
                                            <div class="btn-view d-flex justify-content-end me-5 pe-5">
                                                <button class="btn view-detail mt-3 " data-bs-toggle="modal" data-bs-target="#guppyfish">View Detail</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item fav-fish" data-bs-interval="2000">
                            <div class="card-fish">
                                <div class="fish">
                                    <div class="row justify-content-md-center">
                                        <div class="col-7 text-center">
                                            <img src="img/koi.png" alt="gold fish" width="350px">
                                        </div>
                                        <div class="col-5">
                                            <h5 class="pb-3 mb-3"> Koi</h5>
                                            <p class="pe-5 me-5">Ikan mas hias berukuran besar dihargai karena warna dan polanya yang cerah. Koi adalah pilihan utama untuk kolam luar ruangan dan taman air, menambah sentuhan elegan.</p>
                                            <div class="btn-view d-flex justify-content-end me-5 pe-5">
                                                <button class="btn view-detail mt-3 " data-bs-toggle="modal" data-bs-target="#koi">View Detail</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <button class="carousel-control-prev position-absolute ms-5 start-0 top-50 translate-middle-y" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                            <img src="img/prev.png" alt="" width="45px">
                        </button>
                        <button class="carousel-control-next position-absolute ms-5 ps-5 end-50 top-50 translate-middle-y" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                            <img src="img/next.png" alt="" width="45px">
                        </button>
                    </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <section id="review">
        <div class="slide4">
            <img src="img/review.jpg" alt="" width="100%"></img>
            <div class="review">
                <div class="title mb-5 pb-5">
                    <h3 class="ps-5 mb-2 pb-2">Customer Review</h3>
                </div>
    
                <div class="row position-relative">
                    <div class="col-8 d-flex justify-content-evenly">
                        <div id="carouselExampleInterval" class="carousel carousel-dark slide position-absolute top-50 translate-middle-y" style="width:800px; height:300px;" data-bs-ride="carousel">
                            <div class="carousel-indicators top-100">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active mb-5" data-bs-interval="2000">
                                    <div class="cus-review">
                                            <div class="row">
                                            <div class="col-4">
                                                <div class="card p-3" style="width: 14rem; height: 17rem;">
                                                <div class="card-body">
                                                    <h7 class="card-title"><b>Rana Viera</b></h7>
                                                    <div class="rev row mt-1">
                                                    <div class="col-8">
                                                        <div class="rev-star">
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star-outline"></ion-icon>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <p>4.5/5</p>
                                                    </div>
                                                    </div>
                                                    <p class="card-text pt-2">Saya telah menjadi pelanggan AquaZone selama bertahun-tahun dan mereka tidak pernah mengecewakan. Pilihan dan variasi produk yang luar biasa</p>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="card p-3" style="width: 14rem; height: 17rem;">
                                                <div class="card-body">
                                                    <h7 class="card-title"><b>Laraya Nada</b></h7>
                                                    <div class="rev row mt-1">
                                                    <div class="col-8">
                                                        <div class="rev-star">
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <p>4.9/5</p>
                                                    </div>
                                                    </div>
                                                    <p class="card-text pt-2">Perhatian mereka terhadap detail memastikan setiap ikan tiba dalam kondisi murni, siap berkembang biak di akuarium rumah saya.
                                                    </p>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="card p-3" style="width: 14rem; height: 17rem;">
                                                <div class="card-body">
                                                    <h7 class="card-title"><b>Angkasa</b></h7>
                                                    <div class="rev row mt-1">
                                                    <div class="col-8">
                                                        <div class="rev-star">
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star-outline"></ion-icon>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <p>4/5</p>
                                                    </div>
                                                    </div>
                                                    <p class="card-text pt-2">Saya baru saja mendapatkan pengalaman terbaik memesan dari AquaZone! </p>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item mb-5" data-bs-interval="2000">
                                    <div class="cus-review">
                                            <div class="row">
                                            <div class="col-4">
                                                <div class="card p-3" style="width: 14rem; height: 17rem;">
                                                <div class="card-body">
                                                    <h7 class="card-title"><b>Sasha</b></h7>
                                                    <div class="rev row mt-1">
                                                    <div class="col-8">
                                                        <div class="rev-star">
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star-outline"></ion-icon>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <p>4.2/5</p>
                                                    </div>
                                                    </div>
                                                    <p class="card-text pt-2">Tim AquaZone bahkan menyertakan beberapa tip bagus untuk merawat anggota baru saya.</p>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="card p-3" style="width: 14rem; height: 17rem;">
                                                <div class="card-body">
                                                    <h7 class="card-title"><b>Alana Rima</b></h7>
                                                    <div class="rev row mt-1">
                                                    <div class="col-8">
                                                        <div class="rev-star">
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star-outline"></ion-icon>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <p>4/5</p>
                                                    </div>
                                                    </div>
                                                    <p class="card-text pt-2">Jika Anda ingin membangun akuarium yang indah dan sehat, saya sangat merekomendasikan AquaZone.
                                                    </p>
                                                </div>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="card p-3" style="width: 14rem; height: 17rem;">
                                                <div class="card-body">
                                                    <h7 class="card-title"><b>Vadi Yusuf</b></h7>
                                                    <div class="rev row mt-1">
                                                    <div class="col-8">
                                                        <div class="rev-star">
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star"></ion-icon>
                                                        <ion-icon name="star-outline"></ion-icon>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <p>4.7/5</p>
                                                    </div>
                                                    </div>
                                                    <p class="card-text pt-2">Perhatian mereka terhadap detail memastikan setiap ikan tiba dalam kondisi murni, siap berkembang biak di akuarium rumah saya."</p>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box-review col-4 p-5" style="width: 22rem;">
                        <div class="row">
                            <h4 class="text-center mb-3" style="font-weight:bolder">Type Your Review</h4>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label" >Name</label>
                                <input type="name" class="form-control" id="exampleFormControlInput1" placeholder="Type your name" style="font-size:12px">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" style="font-size:12px">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Type your review" rows="3" style="font-size:12px"></textarea>
                            </div>
                            <div class="star text-center">
                                <button class="btn-star" onclick="rateStar(1)"><ion-icon name="star-outline"></ion-icon></button>
                                <button class="btn-star" onclick="rateStar(2)"><ion-icon name="star-outline"></ion-icon></button>
                                <button class="btn-star" onclick="rateStar(3)"><ion-icon name="star-outline"></ion-icon></button>
                                <button class="btn-star" onclick="rateStar(4)"><ion-icon name="star-outline"></ion-icon></button>
                                <button class="btn-star" onclick="rateStar(5)"><ion-icon name="star-outline"></ion-icon></button>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn view-detail mt-3" href="home.php" onclick="return confirm('Apakah anda yakin ingin mengirim pesan ini?');">Send</button>
                                
                            </div>
                            <script>
                                function rateStar(star) {
                                const stars = document.querySelectorAll('.btn-star ion-icon');
                                stars.forEach((icon, index) => {
                                    if (index < star) {
                                        icon.setAttribute('name', 'star');
                                    } else {
                                        icon.setAttribute('name', 'star-outline');
                                    }
                                });
                            }
                            </script>
                        </div>
                        
                    </div>
                </div>
            </div>  
        </div>
    </section>

    <section id="contact">
        <div class="slide4">
            <img src="img/contact.jpg" alt="" width="100%"></img>
            <div class="review">
                <div class="title mb-5 pb-5">
                    <h3 class="ps-5 mb-2 pb-2">Contact Us</h3>
                </div>

                <div class="container contact-us" style="width:100%; height:100%;">
                    <div class="row d-flex align-items-center justify-content-evenly ">
                        <div class="col-3">
                            <div class="contact">
                                <div class="row mb-3">
                                    <div class="icon-contact col-2 text-end">
                                        <a href="aquazone@gmail.com"><ion-icon name="mail"></ion-icon></a>
                                    </div>
                                    <div class="col-10">
                                        <p>aquazone@gmail.com</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="icon-contact col-2">
                                        <a href="wa.me/624324545535"><ion-icon name="call"></ion-icon></a>
                                    </div>
                                    <div class="col-10">
                                        <p>+88 113 4433</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="icon-contact col-2">
                                        <a href="instagram.com/aquzone.id"><ion-icon name="logo-instagram"></ion-icon></a>
                                    </div>
                                    <div class="col-10 ">
                                        <p>@aquzone.id</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="icon-contact col-2">
                                        <a href="https://www.google.com/maps/place/Jakarta+State+Polytechnic/@-6.3707762,106.8236706,15z/data=!4m2!3m1!1s0x0:0x28b4f84e4677f329?sa=X&ved=1t:2428&ictx=111"><ion-icon name="location"></ion-icon></a>
                                    </div>
                                    <div class="col-10">
                                        <p>Pasar Ikan Jatinegara, Jakarta</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 location">
                            <div id="googleMap" style="width: 100%; height: 20rem;"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer>
        <p class="text-center m-0 p-3">© 2024 AquaZone. All rights reserved.</p>
    </footer>

    
    <!-- MODAL -->

    <div class="modal fade" id="betta">
        <div class="modal-dialog">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <p class="modal-title m-2"><b>Betta (Siamese Fighting Fish)</b></p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="gambar d-flex justify-content-center align-items-center">
                <img src="img/betta.png" width="250px" alt="betta" >
            </div>
            <div class="modal-body m-2">
                <p>Ikan yang dinamis dan karismatik yang terkenal dengan siripnya yang mengalir dan warnanya yang berani. Cupang menjadi hiasan tengah yang menawan di akuarium kecil atau mangkuk cupang.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
    
        </div>
        </div>
    </div>

    <div class="modal fade" id="goldfish">
        <div class="modal-dialog">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <p class="modal-title m-2"><b>Gold Fish</b></p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="gambar d-flex justify-content-center align-items-center">
                <img src="img/goldFish.png" width="250px" alt="betta" >
            </div>
            <div class="modal-body m-2">
                <p>Ikan hias klasik yang dihargai karena warnanya yang cerah, ceria, dan bentuk tubuh yang unik seperti ekor tunggal dan varietas yang mewah. Ikan mas tumbuh subur di akuarium atau kolam yang lebih besar.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
    
        </div>
        </div>
    </div>

    <div class="modal fade" id="clownfish">
        <div class="modal-dialog">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <p class="modal-title m-2"><b>Clown Fish (Anemonefish)</b></p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="gambar d-flex justify-content-center align-items-center">
                <img src="img/clownFish.png" width="250px" alt="clown" >
            </div>
            <div class="modal-body m-2">
                <p>Dikenali secara instan karena pola garis-garis oranye dan putihnya yang tebal, ikan badut adalah favorit abadi untuk akuarium air asin. Mereka membentuk hubungan simbiosis dengan anemon laut.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
    
        </div>
        </div>
    </div>

    <div class="modal fade" id="guppyfish">
        <div class="modal-dialog">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <p class="modal-title m-2"><b>Guppy Fish </b></p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="gambar d-flex justify-content-center align-items-center">
                <img src="img/guppyFish.png" width="250px" alt="guppy" >
            </div>
            <div class="modal-body m-2">
                <p>Livebearer yang kuat dan berwarna cerah serta mudah dirawat. Ikan guppy hadir dalam berbagai macam pola warna yang menakjubkan dan sempurna untuk akuarium komunitas.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
    
        </div>
        </div>
    </div>

    <div class="modal fade" id="koi">
        <div class="modal-dialog">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <p class="modal-title m-2"><b>Koi </b></p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="gambar d-flex justify-content-center align-items-center">
                <img src="img/koi.png" width="250px" alt="guppy" >
            </div>
            <div class="modal-body m-2">
                <p>Ikan mas hias berukuran besar dihargai karena warna dan polanya yang cerah. Koi adalah pilihan utama untuk kolam luar ruangan dan taman air, menambah sentuhan elegan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
    
        </div>
        </div>
    </div>


    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/script.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>