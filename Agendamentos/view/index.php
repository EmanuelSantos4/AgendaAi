<?php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_SESSION['email'])) {
    if ($_SESSION['email'] != "") {
        header("Location: ../view/catalog-page.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>AgendaAí - Início</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/logo-agendaai.svg" rel="icon">

    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/indexStyle.css" rel="stylesheet">
</head>
<body>
<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <h1 class="logo"><a href="index.php"><img src="../assets/img/logo-agendaai.svg"
                                                  alt="">AgendaAí<span>.</span></a></h1>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="index.php">Início</a></li>
                <li><a href="catalog-page.php">Serviços</a></li>
                <li><a class="nav-link scrollto" href="signup.php">Cadastrar-se</a></li>
                <li><a class="nav-link scrollto " href="login.php" id="login">Entrar</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
<!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1> Nós te ajudamos a <span>facilitar</span> a sua vida</h1>
        <h2>Aqui você pode contratar pessoas ou ser contratado para realizar algum serviço.</h2>
        <div class="d-flex">
            <a href="signup.php" class="btn-get-started scrollto">Iniciar</a>
        </div>
    </div>
</section>
<!-- End Hero -->

<main id="main">
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4 class="title"><a href="">É seguro</a></h4>
                        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                            excepturi</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4 class="title"><a href="">Economize tempo</a></h4>
                        <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4 class="title"><a href="">É prático</a></h4>
                        <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                            blanditiis</p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End Featured Services Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
        <div class="container" data-aos="fade-up">

            <!-- ======= Counts Section ======= -->
            <section id="counts" class="counts">
                <div class="section-title">
                    <h2>Nossos números</h2>
                    <h3>Dê uma olhada em nossos <span>números</span></h3>
                </div>
                <div class="container" data-aos="fade-up">

                    <div class="row">

                        <div class="col-lg-3 col-md-6">
                            <div class="count-box">
                                <i class="bi bi-emoji-smile"></i>
                                <span data-purecounter-start="0" data-purecounter-end="232"
                                      data-purecounter-duration="1" class="purecounter"></span>
                                <p>Clientes atendidos</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                            <div class="count-box">
                                <i class="bi bi-journal-richtext"></i>
                                <span data-purecounter-start="0" data-purecounter-end="521"
                                      data-purecounter-duration="1" class="purecounter"></span>
                                <p>Agendamentos realizados</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                            <div class="count-box">
                                <i class="bi bi-headset"></i>
                                <span data-purecounter-start="0" data-purecounter-end="1463"
                                      data-purecounter-duration="1" class="purecounter"></span>
                                <p>Empregadores</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                            <div class="count-box">
                                <i class="bi bi-people"></i>
                                <span data-purecounter-start="0" data-purecounter-end="15"
                                      data-purecounter-duration="1" class="purecounter"></span>
                                <p>Prestadores de serviço</p>
                            </div>
                        </div>

                    </div>

                </div>
            </section>
            <!-- End Counts Section -->

            <!-- ======= Services Section ======= -->
            <section id="services" class="services">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Serviços</h2>
                        <h3>Confira os nossos <span>serviços</span> por categoria</h3>
                        <p>Abaixo estão listadas as principais categorias de serviços que temoservices .icon-box ps
                            cadastrados em nossa plataforma.</p>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in"
                             data-aos-delay="100">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bxl-dribbble"></i></div>
                                <h4><a href="">Limpeza</a></h4>
                                <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                                <input type="button" value="Conferir" class="btn-get-started">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                             data-aos-delay="200">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-file"></i></div>
                                <h4><a href="">Montagem</a></h4>
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                                <input type="button" value="Conferir" class="btn-get-started">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
                             data-aos-delay="300">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-tachometer"></i></div>
                                <h4><a href="">Cuidado</a></h4>
                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                                <input type="button" value="Conferir" class="btn-get-started">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in"
                             data-aos-delay="100">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-world"></i></div>
                                <h4><a href="">Assitência técnica</a></h4>
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                                <input type="button" value="Conferir" class="btn-get-started">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in"
                             data-aos-delay="200">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-slideshow"></i></div>
                                <h4><a href="">Reforço escolar</a></h4>
                                <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
                                <input type="button" value="Conferir" class="btn-get-started">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in"
                             data-aos-delay="300">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-arch"></i></div>
                                <h4><a href="">Reforma e construção</a></h4>
                                <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
                                <input type="button" value="Conferir" class="btn-get-started">
                            </div>
                        </div>

                    </div>

                </div>
            </section>
            <!-- End Services Section -->

            <!-- ======= Frequently Asked Questions Section ======= -->
            <section id="faq" class="faq section-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>F.A.Q</h2>
                        <h3>Frequently Asked <span>Questions</span></h3>
                        <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at
                            voluptas atque vitae autem.</p>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <ul class="faq-list">

                                <li>
                                    <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Non
                                        consectetur a erat nam at lectus urna duis? <i
                                                class="bi bi-chevron-down icon-show"></i><i
                                                class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                                        <p>
                                            Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat
                                            lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla
                                            urna porttitor rhoncus dolor purus non.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Feugiat
                                        scelerisque varius morbi enim nunc faucibus a pellentesque? <i
                                                class="bi bi-chevron-down icon-show"></i><i
                                                class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                                        <p>
                                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi.
                                            Id interdum velit laoreet id donec ultrices. Fringilla phasellus
                                            faucibus scelerisque eleifend donec pretium. Est pellentesque elit
                                            ullamcorper dignissim. Mauris ultrices eros in
                                            cursus turpis massa tincidunt dui.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Dolor sit
                                        amet consectetur adipiscing elit pellentesque habitant morbi? <i
                                                class="bi bi-chevron-down icon-show"></i><i
                                                class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                                        <p>
                                            Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis
                                            orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam
                                            sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus
                                            urna duis convallis convallis tellus. Urna
                                            molestie at elementum eu facilisis sed odio morbi quis
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ac odio
                                        tempor orci dapibus. Aliquam eleifend mi in nulla? <i
                                                class="bi bi-chevron-down icon-show"></i><i
                                                class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                                        <p>
                                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi.
                                            Id interdum velit laoreet id donec ultrices. Fringilla phasellus
                                            faucibus scelerisque eleifend donec pretium. Est pellentesque elit
                                            ullamcorper dignissim. Mauris ultrices eros in
                                            cursus turpis massa tincidunt dui.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Tempus
                                        quam pellentesque nec nam aliquam sem et tortor consequat? <i
                                                class="bi bi-chevron-down icon-show"></i><i
                                                class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                                        <p>
                                            Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim
                                            suspendisse in est ante in. Nunc vel risus commodo viverra maecenas
                                            accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida
                                            quis blandit turpis cursus in
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Tortor
                                        vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem
                                        dolor? <i class="bi bi-chevron-down icon-show"></i><i
                                                class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                                        <p>
                                            Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae
                                            ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi
                                            est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in
                                            metus vulputate eu scelerisque. Pellentesque
                                            diam volutpat commodo sed egestas egestas fringilla phasellus faucibus.
                                            Nibh tellus molestie nunc non blandit massa enim nec.
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
            </section>
            <!-- End Frequently Asked Questions Section -->

            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Contact</h2>
                        <h3><span>Contact Us</span></h3>
                        <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at
                            voluptas atque vitae autem.</p>
                    </div>
                    <div class="contact-item">
                        <div class="info-box  mb-2">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p>contact@example.com</p>
                        </div>
                        <div class="info-box  mb-2">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div>

                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="Your Name" required>
                                </div>
                                <div class="col form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject"
                                       placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                              required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center">
                                <button type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>

                </div>

        </div>
    </section>
    <!-- End Contact Section -->

</main>
<!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h4>Join Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>AgendaAí<span>.</span></h3>
                    <p>
                        <strong>Phone:</strong> +1 5589 55488 55<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i><a href="#">Início</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Serviços</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Termos de uso</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Política de privacidade</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i><a href="#">Limpeza</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Montagem</a></li>
                        <li><i class="bx bx-chevron-right"></i><a href="#">Cuidado</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Assitência técnica</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Reforço escolar</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Reforma e construção</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Social Networks</h4>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="copyright">
            &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
</footer>
<!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="../assets/vendor/purecounter/purecounter.js"></script>
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>

</body>

</html>