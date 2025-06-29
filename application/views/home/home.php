<!DOCTYPE html>
<html lang="en" class="no-js" >
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FutsalMate</title>
 <!-- CSS
    ==================================================  <script>
        document.documentElement.classList.remove('no-js');
        document.documentElement.classList.add('js');
    </script> -->
   

    <!-- CSS
    ================================================== -->

    <link rel="stylesheet" href="<?php echo base_url('assets/home/css/vendor.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/home/css/styles.css'); ?>">


     <!-- Favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/home/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/home/favicon-32x32.png'); ?>"> <!-- ini icon title --->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/home/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?php echo base_url('assets/home/site.webmanifest'); ?>">

</head>

<body id="top">




    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader">
        </div>
    </div>


    <!-- page wrap
    ================================================== -->
    <div id="page" class="s-pagewrap">


        <!-- # site header 
        ================================================== -->
       <header class="s-header">

    <div class="row s-header__inner">

        <div class="s-header__block">
            <div class="s-header__logo">
                <a class="logo" href="index.html">
                    <img src="<?php echo base_url('assets/home/images/logo.svg'); ?>" alt="Homepage">
                </a>
            </div>

            <a class="s-header__menu-toggle" href="#0"><span>Menu</span></a>
        </div> <!-- end s-header__block -->

        <nav class="s-header__nav">
            <ul>
                <li class="current"><a href="#intro" class="smoothscroll">Intro</a></li>
                <li><a href="#about" class="smoothscroll">About</a></li>
                <li><a href="#pricing" class="smoothscroll">Pricing</a></li>
                <li><a href="#download" class="smoothscroll">Contact</a></li>
            </ul>
        </nav>

        <div class="s-header__cta">
    <?php if (!$this->session->userdata('is_logged_in')): ?>  <!-- Cek apakah pengguna belum login -->
        <a href="<?php echo site_url('login'); ?>" class="btn btn--stroke s-header__cta-btn">Masuk</a>
        <a href="<?php echo site_url('register'); ?>" class="btn btn--stroke s-header__cta-btn" style="margin-left: 10px;">Daftar</a>
    <?php endif; ?>  <!-- Tombol hanya muncul jika pengguna belum login -->
</div>


    </div> <!-- end s-header__inner -->

</header> <!-- end s-header -->


        <!-- # site-content
        ================================================== -->
        <section id="content" class="s-content">


            <!-- intro
            ----------------------------------------------- -->
            <section id="intro" class="s-intro target-section">

                <div class="s-intro__bg"></div>

                <div class="row s-intro__content">

                    <div class="column lg-12 s-intro__content-inner">
                        <div class="s-intro__content-left">
                            <h1 class="s-intro__content-title">
                            Kelola Futsal <br>
                            Dengan Mudah.
                            </h1>
                        </div>
                        <div class="s-intro__content-right">
                            <p class="s-intro__content-desc body-text-2">
                            Kelola lapangan futsal Anda dengan sistem informasi berbasis SaaS. Fitur manajemen jadwal, pembayaran aman, dan laporan kinerja. 
                            Bergabunglah sekarang!
                            </p> 

                            <div class="s-intro__content-buttons">
                                <a href="#download" class="btn btn--primary s-intro__content-btn smoothscroll">Mulai</a>
                    
                            </div>
                        </div>
                    </div> <!-- s-intro__content-inner -->

                </div> <!-- s-intro__content -->

                <ul class="s-intro__social">
                    <li>
                        <a href="">
                            <svg xmlns="https://www.facebook.com/login" width="24" height="24" viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:"><path d="M20,3H4C3.447,3,3,3.448,3,4v16c0,0.552,0.447,1,1,1h8.615v-6.96h-2.338v-2.725h2.338v-2c0-2.325,1.42-3.592,3.5-3.592 c0.699-0.002,1.399,0.034,2.095,0.107v2.42h-1.435c-1.128,0-1.348,0.538-1.348,1.325v1.735h2.697l-0.35,2.725h-2.348V21H20 c0.553,0,1-0.448,1-1V4C21,3.448,20.553,3,20,3z"></path></svg>
                            <span class="u-screen-reader-text">Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <svg xmlns="https://twitter.com/i/flow/login" width="24" height="24" viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:"><path d="M19.633,7.997c0.013,0.175,0.013,0.349,0.013,0.523c0,5.325-4.053,11.461-11.46,11.461c-2.282,0-4.402-0.661-6.186-1.809 c0.324,0.037,0.636,0.05,0.973,0.05c1.883,0,3.616-0.636,5.001-1.721c-1.771-0.037-3.255-1.197-3.767-2.793 c0.249,0.037,0.499,0.062,0.761,0.062c0.361,0,0.724-0.05,1.061-0.137c-1.847-0.374-3.23-1.995-3.23-3.953v-0.05 c0.537,0.299,1.16,0.486,1.82,0.511C3.534,9.419,2.823,8.184,2.823,6.787c0-0.748,0.199-1.434,0.548-2.032 c1.983,2.443,4.964,4.04,8.306,4.215c-0.062-0.3-0.1-0.611-0.1-0.923c0-2.22,1.796-4.028,4.028-4.028 c1.16,0,2.207,0.486,2.943,1.272c0.91-0.175,1.782-0.512,2.556-0.973c-0.299,0.935-0.936,1.721-1.771,2.22 c0.811-0.088,1.597-0.312,2.319-0.624C21.104,6.712,20.419,7.423,19.633,7.997z"></path></svg>
                            <span class="u-screen-reader-text">Twitter</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/accounts/login/">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:"><path d="M11.999,7.377c-2.554,0-4.623,2.07-4.623,4.623c0,2.554,2.069,4.624,4.623,4.624c2.552,0,4.623-2.07,4.623-4.624 C16.622,9.447,14.551,7.377,11.999,7.377L11.999,7.377z M11.999,15.004c-1.659,0-3.004-1.345-3.004-3.003 c0-1.659,1.345-3.003,3.004-3.003s3.002,1.344,3.002,3.003C15.001,13.659,13.658,15.004,11.999,15.004L11.999,15.004z"></path><circle cx="16.806" cy="7.207" r="1.078"></circle><path d="M20.533,6.111c-0.469-1.209-1.424-2.165-2.633-2.632c-0.699-0.263-1.438-0.404-2.186-0.42 c-0.963-0.042-1.268-0.054-3.71-0.054s-2.755,0-3.71,0.054C7.548,3.074,6.809,3.215,6.11,3.479C4.9,3.946,3.945,4.902,3.477,6.111 c-0.263,0.7-0.404,1.438-0.419,2.186c-0.043,0.962-0.056,1.267-0.056,3.71c0,2.442,0,2.753,0.056,3.71 c0.015,0.748,0.156,1.486,0.419,2.187c0.469,1.208,1.424,2.164,2.634,2.632c0.696,0.272,1.435,0.426,2.185,0.45 c0.963,0.042,1.268,0.055,3.71,0.055s2.755,0,3.71-0.055c0.747-0.015,1.486-0.157,2.186-0.419c1.209-0.469,2.164-1.424,2.633-2.633 c0.263-0.7,0.404-1.438,0.419-2.186c0.043-0.962,0.056-1.267,0.056-3.71s0-2.753-0.056-3.71C20.941,7.57,20.801,6.819,20.533,6.111z M19.315,15.643c-0.007,0.576-0.111,1.147-0.311,1.688c-0.305,0.787-0.926,1.409-1.712,1.711c-0.535,0.199-1.099,0.303-1.67,0.311 c-0.95,0.044-1.218,0.055-3.654,0.055c-2.438,0-2.687,0-3.655-0.055c-0.569-0.007-1.135-0.112-1.669-0.311 c-0.789-0.301-1.414-0.923-1.719-1.711c-0.196-0.534-0.302-1.099-0.311-1.669c-0.043-0.95-0.053-1.218-0.053-3.654 c0-2.437,0-2.686,0.053-3.655c0.007-0.576,0.111-1.146,0.311-1.687c0.305-0.789,0.93-1.41,1.719-1.712 c0.534-0.198,1.1-0.303,1.669-0.311c0.951-0.043,1.218-0.055,3.655-0.055c2.437,0,2.687,0,3.654,0.055 c0.571,0.007,1.135,0.112,1.67,0.311c0.786,0.303,1.407,0.925,1.712,1.712c0.196,0.534,0.302,1.099,0.311,1.669 c0.043,0.951,0.054,1.218,0.054,3.655c0,2.436,0,2.698-0.043,3.654H19.315z"></path></svg>
                            <span class="u-screen-reader-text">Instagram</span>
                        </a>
                    </li>
                </ul>  <!-- s-intro__social -->

                <div class="s-intro__scroll">
                    <a href="#about" class="smoothscroll">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: rotate(270deg);msFilter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);"><path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path></svg>
                        <span class="u-screen-reader-text">Scroll</span>
                    </a>
                </div> <!-- s-intro__scroll -->

            </section> <!-- end s-intro -->


     


            <!-- testimonials
            ----------------------------------------------- -->
            <section id="testimonials" class="s-testimonials">

                <div class="row narrow text-center s-testimonials__header">
                    <div class="column lg-12">
                        <h3 class="h2">What Our Users Have To Say.</h3>
                    </div>
                </div>

                <div class="row s-testimonials__content">
                    <div class="column lg-12">
        
                        <div class="swiper-container s-testimonials__slider">
        
                            <div class="swiper-wrapper">
    
                                <div class="s-testimonials__slide swiper-slide">
                                    <div class="s-testimonials__author">
                                        <img src="images/avatars/user-02.jpg" alt="Author image" class="s-testimonials__avatar">
                                        <cite class="s-testimonials__cite">
                                            <strong>Tim Cook</strong>
                                            <span>CEO, Apple</span>
                                        </cite>
                                    </div>
                                    <p>
                                    Molestiae incidunt consequatur quis ipsa autem nam sit enim magni. Voluptas tempore rem. 
                                    Explicabo a quaerat sint autem dolore ducimus ut consequatur neque. Nisi dolores quaerat fuga rem nihil nostrum.
                                    Laudantium quia consequatur molestias.
                                    </p>
                                </div> <!-- end s-testimonials__slide -->
                
                                <div class="s-testimonials__slide swiper-slide">
                                    <div class="s-testimonials__author">
                                        <img src="images/avatars/user-03.jpg" alt="Author image" class="s-testimonials__avatar">
                                        <cite class="s-testimonials__cite">
                                            <strong>Sundar Pichai</strong>
                                            <span>CEO, Google</span>
                                        </cite>
                                    </div>
                                    <p>
                                    Excepturi nam cupiditate culpa doloremque deleniti repellat. Veniam quos repellat voluptas animi adipisci.
                                    Nisi eaque consequatur. Voluptatem dignissimos ut ducimus accusantium perspiciatis.
                                    Quasi voluptas eius distinctio. Atque eos maxime.
                                    </p>
                                </div> <!-- end s-testimonials__slide -->
                
                                <div class="s-testimonials__slide swiper-slide">
                                    <div class="s-testimonials__author">
                                        <img src="<?php echo base_url('assets/home/images/avatars/user-01.jpg'); ?>" alt="Author image" class="s-testimonials__avatar">
                                        <cite class="s-testimonials__cite">
                                            <strong>Satya Nadella</strong>
                                            <span>CEO, Microsoft</span>
                                        </cite>
                                    </div>
                                    <p>
                                    Repellat dignissimos libero. Qui sed at corrupti expedita voluptas odit. Nihil ea quia nesciunt. Ducimus aut sed ipsam.  
                                    Autem eaque officia cum exercitationem sunt voluptatum accusamus. Quasi voluptas eius distinctio.
                                    Voluptatem dignissimos ut.
                                    </p>
                                </div> <!-- end s-testimonials__slide -->
        
                                <div class="s-testimonials__slide swiper-slide">
                                    <div class="s-testimonials__author">
                                        <img src="images/avatars/user-06.jpg" alt="Author image" class="s-testimonials__avatar">
                                        <cite class="s-testimonials__cite">
                                            <strong>Jeff Bezos</strong>
                                            <span>CEO, Amazon</span>
                                        </cite>
                                    </div>
                                    <p>
                                    Nunc interdum lacus sit amet orci. Vestibulum dapibus nunc ac augue. Fusce vel dui. In ac felis 
                                    quis tortor malesuada pretium. Curabitur vestibulum aliquam leo. Qui sed at corrupti expedita voluptas odit. 
                                    Nihil ea quia nesciunt. Ducimus aut sed ipsam.
                                    </p>
                                </div> <!-- end s-testimonials__slide -->
            
                            </div> <!-- end swiper-wrapper -->
        
                            <div class="swiper-pagination"></div>
        
                        </div> <!-- end swiper-container -->
        
                    </div> <!-- end column -->
                </div> <!-- end s-testimonials__content -->

            </section> <!-- end testimonials -->


            <!-- pricing
            ----------------------------------------------- -->
            <section id="pricing" class="s-pricing target-section">
                <div class="row s-pricing__content">

                    <div class="column lg-4 md-12 s-pricing__header">
                        <h3 class="h2">Our Easy Pricing Plans for Everyone.</h3>
                        <p>
                        Menawarkan rencana harga yang fleksibel dan 
                        terjangkau untuk memenuhi kebutuhan setiap pengguna. 
                        Apakah Anda pemilik lapangan futsal atau pengelola tim, 
                        kami memiliki paket yang cocok untuk Anda. 
                        </p>
                    </div> <!-- end s-pricing__header -->

                    <div class="column lg-8 md-12 s-pricing__plans">
                        <div class="row plans block-lg-one-half block-tab-whole">

                            <div class="column item-plan item-plan--popular">
                                <div class="item-plan__block"> 

                                    <div class="item-plan__top-part">
                                        <h3 class="item-plan__title">Elite Plan</h3>
                                        <p class="item-plan__price"><sup>Rp</sup>200<sup class="item-plan__per">K</p>
                                        <p class="item-plan__per">Per Bulan</p>
                                    </div>
                
                                    <div class="item-plan__bottom-part">
                                        <ul class="item-plan__features">
                                            <li><span>All</span> Features In Pro Plan</li>
                                            <li><span>Event</span> Organizer</li>
                                            <li><span>Reporting</span> Analytics</li>
                                            <li><span>Transaction</span> Management</li>
                                            <li>Backup & Restore</li>
                                        </ul>
                
                                        <a class="btn btn--primary u-fullwidth" href="<?= base_url('plans/detail/elite') ?>">Get Started</a>
                                    </div>
                                
                                </div>
                            </div> <!-- end item-plan -->
                            <div class="column item-plan">
                                <div class="item-plan__block"> 

                                    <div class="item-plan__top-part">
                                        <h3 class="item-plan__title">Pro Plan</h3>
                                        <p class="item-plan__price"><sup>Rp</sup>100<sup class="item-plan__per">K</p>
                                        <p class="item-plan__per">Per Bulan</p>
                                    </div>
                
                                    <div class="item-plan__bottom-part">
                                        <ul class="item-plan__features">
                                            <li><span>Scedule </span> Management</li>
                                            <li><span>Booking </span> Management</li>
                                            <li><span>Futsal Court </span>  Management</li>
                                            <li>Backup & Restore</li>
                                        </ul>
                                        <a class="btn btn--primary u-fullwidth" href="<?= base_url('plans/detail/pro') ?>">Get Started</a>
                              
                                    </div>  
                                
                                </div>
                            </div> <!-- end item-plan -->
                        </div>
                    </div> <!-- end s-pricing__plans -->

                </div> <!-- end s-pricing__content -->
            </section> <!-- end pricing -->


            <!-- download
            ----------------------------------------------- -->
            <section id="download" class="s-download target-section">
                <div class="row s-download__header">
                    <div class="column lg-12">
                        <h2 class="text-display-1">Orang-orang sekarang lagi pakai FutsalMate lohh. Yuk, gabung bersama kami!</h2>
                        <p class="lead">
                        Bergabunglah dengan menggunakan sistem kami yang berkembang pesat! Dengan fitur yang inovatif dan mudah digunakan, 
                        FutsalMate memberikan solusi terbaik untuk pengelolaan lapangan futsal. 
                        Banyak pengguna telah merasakan manfaatnya, mulai dari kemudahan pengelolaan hingga analisis kinerja.
                        </p>
                    </div>
                </div>
                <div class="row s-download__badges-block">
                    <div class="column lg-12 s-download__badges">
                        <a href="<?php echo site_url('login'); ?>" class="btn">Masuk</a>
                    </div>
                </div>
            </section>


        </section> <!-- end s-content -->

 <!-- # site-footer


        ================================================== -->
        <footer id="colophon" class="s-footer footer">

            <div class="row s-footer__top">
                <div class="column lg-12 text-center">
                    <h2 class="text-display-1">
                    Start using FutsalMate for free
                    </h2>
                    <p class="lead">
                    Akses semua fitur sistem pengelolaan lapangan futsal selama 30 hari, kemudian tentukan rencana mana yang paling cocok untuk kebutuhan bisnis Anda.
                    </p>
                </div>
                <div class="column lg-12 s-footer__subscribe">
                    <div class="subscribe-form">
                        <form id="mc-form" class="mc-form">
                            <input type="email" name="EMAIL" id="mce-EMAIL" class="u-fullwidth text-center" placeholder="Your Email Address" title="The domain portion of the email address is invalid (the portion after the @)." pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$" required>
                            <input type="submit" name="subscribe" value="Subscribe" class="btn btn--primary u-fullwidth">
                            <!-- <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_cdb7b577e41181934ed6a6a44_9a91cfe7b3" tabindex="-1" value=""></div> -->
                            <div class="mc-status"></div>
                        </form>
                    </div>
                </div>
            </div>
    
            <div class="row s-footer__bottom">
                <div class="column lg-5 md-6 stack-on-900">
                    <div class="footer__logo">
                        <a href="#">
                            <img src="<?php echo base_url('assets/home/images/logo.svg'); ?>" alt="Homepage">
                        </a>
                    </div>
    
                    <p>
                    Kami berkomitmen untuk memberikan solusi terbaik dalam pengelolaan lapangan futsal. 
                    Untuk pertanyaan atau dukungan, jangan ragu untuk menghubungi kami.
                    </p>
    
                    <ul class="s-footer__social">
                        <li>
                            <a href="https://www.facebook.com/login">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:"><path d="M20,3H4C3.447,3,3,3.448,3,4v16c0,0.552,0.447,1,1,1h8.615v-6.96h-2.338v-2.725h2.338v-2c0-2.325,1.42-3.592,3.5-3.592 c0.699-0.002,1.399,0.034,2.095,0.107v2.42h-1.435c-1.128,0-1.348,0.538-1.348,1.325v1.735h2.697l-0.35,2.725h-2.348V21H20 c0.553,0,1-0.448,1-1V4C21,3.448,20.553,3,20,3z"></path></svg>
                                <span class="u-screen-reader-text">Facebook</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/i/flow/login/">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:"><path d="M19.633,7.997c0.013,0.175,0.013,0.349,0.013,0.523c0,5.325-4.053,11.461-11.46,11.461c-2.282,0-4.402-0.661-6.186-1.809 c0.324,0.037,0.636,0.05,0.973,0.05c1.883,0,3.616-0.636,5.001-1.721c-1.771-0.037-3.255-1.197-3.767-2.793 c0.249,0.037,0.499,0.062,0.761,0.062c0.361,0,0.724-0.05,1.061-0.137c-1.847-0.374-3.23-1.995-3.23-3.953v-0.05 c0.537,0.299,1.16,0.486,1.82,0.511C3.534,9.419,2.823,8.184,2.823,6.787c0-0.748,0.199-1.434,0.548-2.032 c1.983,2.443,4.964,4.04,8.306,4.215c-0.062-0.3-0.1-0.611-0.1-0.923c0-2.22,1.796-4.028,4.028-4.028 c1.16,0,2.207,0.486,2.943,1.272c0.91-0.175,1.782-0.512,2.556-0.973c-0.299,0.935-0.936,1.721-1.771,2.22 c0.811-0.088,1.597-0.312,2.319-0.624C21.104,6.712,20.419,7.423,19.633,7.997z"></path></svg>
                                <span class="u-screen-reader-text">Twitter</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/accounts/login/">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:"><path d="M11.999,7.377c-2.554,0-4.623,2.07-4.623,4.623c0,2.554,2.069,4.624,4.623,4.624c2.552,0,4.623-2.07,4.623-4.624 C16.622,9.447,14.551,7.377,11.999,7.377L11.999,7.377z M11.999,15.004c-1.659,0-3.004-1.345-3.004-3.003 c0-1.659,1.345-3.003,3.004-3.003s3.002,1.344,3.002,3.003C15.001,13.659,13.658,15.004,11.999,15.004L11.999,15.004z"></path><circle cx="16.806" cy="7.207" r="1.078"></circle><path d="M20.533,6.111c-0.469-1.209-1.424-2.165-2.633-2.632c-0.699-0.263-1.438-0.404-2.186-0.42 c-0.963-0.042-1.268-0.054-3.71-0.054s-2.755,0-3.71,0.054C7.548,3.074,6.809,3.215,6.11,3.479C4.9,3.946,3.945,4.902,3.477,6.111 c-0.263,0.7-0.404,1.438-0.419,2.186c-0.043,0.962-0.056,1.267-0.056,3.71c0,2.442,0,2.753,0.056,3.71 c0.015,0.748,0.156,1.486,0.419,2.187c0.469,1.208,1.424,2.164,2.634,2.632c0.696,0.272,1.435,0.426,2.185,0.45 c0.963,0.042,1.268,0.055,3.71,0.055s2.755,0,3.71-0.055c0.747-0.015,1.486-0.157,2.186-0.419c1.209-0.469,2.164-1.424,2.633-2.633 c0.263-0.7,0.404-1.438,0.419-2.186c0.043-0.962,0.056-1.267,0.056-3.71s0-2.753-0.056-3.71C20.941,7.57,20.801,6.819,20.533,6.111z M19.315,15.643c-0.007,0.576-0.111,1.147-0.311,1.688c-0.305,0.787-0.926,1.409-1.712,1.711c-0.535,0.199-1.099,0.303-1.67,0.311 c-0.95,0.044-1.218,0.055-3.654,0.055c-2.438,0-2.687,0-3.655-0.055c-0.569-0.007-1.135-0.112-1.669-0.311 c-0.789-0.301-1.414-0.923-1.719-1.711c-0.196-0.534-0.302-1.099-0.311-1.669c-0.043-0.95-0.053-1.218-0.053-3.654 c0-2.437,0-2.686,0.053-3.655c0.007-0.576,0.111-1.146,0.311-1.687c0.305-0.789,0.93-1.41,1.719-1.712 c0.534-0.198,1.1-0.303,1.669-0.311c0.951-0.043,1.218-0.055,3.655-0.055c2.437,0,2.687,0,3.654,0.055 c0.571,0.007,1.135,0.112,1.67,0.311c0.786,0.303,1.407,0.925,1.712,1.712c0.196,0.534,0.302,1.099,0.311,1.669 c0.043,0.951,0.054,1.218,0.054,3.655c0,2.436,0,2.698-0.043,3.654H19.315z"></path></svg>
                                <span class="u-screen-reader-text">Instagram</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=1234567890">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:"><path id="path4" inkscape:connector-curvature="0" d="M16.6,14c-0.2-0.1-1.5-0.7-1.7-0.8c-0.2-0.1-0.4-0.1-0.6,0.1c-0.2,0.2-0.6,0.8-0.8,1c-0.1,0.2-0.3,0.2-0.5,0.1c-0.7-0.3-1.4-0.7-2-1.2c-0.5-0.5-1-1.1-1.4-1.7c-0.1-0.2,0-0.4,0.1-0.5c0.1-0.1,0.2-0.3,0.4-0.4c0.1-0.1,0.2-0.3,0.2-0.4c0.1-0.1,0.1-0.3,0-0.4c-0.1-0.1-0.6-1.3-0.8-1.8C9.4,7.3,9.2,7.3,9,7.3c-0.1,0-0.3,0-0.5,0C8.3,7.3,8,7.5,7.9,7.6C7.3,8.2,7,8.9,7,9.7c0.1,0.9,0.4,1.8,1,2.6c1.1,1.6,2.5,2.9,4.2,3.7c0.5,0.2,0.9,0.4,1.4,0.5c0.5,0.2,1,0.2,1.6,0.1c0.7-0.1,1.3-0.6,1.7-1.2c0.2-0.4,0.2-0.8,0.1-1.2C17,14.2,16.8,14.1,16.6,14 M19.1,4.9C15.2,1,8.9,1,5,4.9c-3.2,3.2-3.8,8.1-1.6,12L2,22l5.3-1.4c1.5,0.8,3.1,1.2,4.7,1.2h0c5.5,0,9.9-4.4,9.9-9.9C22,9.3,20.9,6.8,19.1,4.9 M16.4,18.9c-1.3,0.8-2.8,1.3-4.4,1.3h0c-1.5,0-2.9-0.4-4.2-1.1l-0.3-0.2l-3.1,0.8l0.8-3l-0.2-0.3C2.6,12.4,3.8,7.4,7.7,4.9S16.6,3.7,19,7.5C21.4,11.4,20.3,16.5,16.4,18.9"/></svg>
                                <span class="u-screen-reader-text">Instagram</span>
                            </a>
                        </li>
                    </ul>
                </div>
    
                <div class="column lg-6 stack-on-900 end">
                    <ul class="s-footer__site-links">
                        <li><a class="smoothscroll" href="#home" title="intro">Intro</a></li>
                        <li><a class="smoothscroll" href="#about" title="about">About</a></li>
                        <li><a class="smoothscroll" href="#testimonials" title="reviews">Reviews</a></li>
                        <li><a class="smoothscroll" href="#pricing" title="pricing">Pricing</a></li>
                    </ul>
    
                    <p class="s-footer__contact">
                        Punya pertanyaan? Hubungi kami : <br>
                        <a href="mailto:#0" class="s-footer__mail-link">futsalmate@gmail.com</a>
                    </p>
    
                    <div class="ss-copyright">
                        <span>© FutsalMate. 2024</span> 
                    </div>
                </div>
    
            </div>
    
            <div class="ss-go-top">
                <a class="smoothscroll" title="Back to Top" href="#top">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M6 4h12v2H6zm5 10v6h2v-6h5l-6-6-6 6z"></path></svg>
                </a>
            </div> <!-- end ss-go-top -->
            
    
        </footer> <!-- end footer -->


    <!-- Java Script
    ================================================== -->
    <script src="<?php echo base_url('assets/home/js/plugins.js'); ?>"></script>
    <script src="<?php echo base_url('assets/home/js/main.js'); ?>"></script>

    



</body>
</html>
       