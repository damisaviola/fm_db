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
                <li><a href="#download" class="smoothscroll">Download</a></li>
            </ul>
        </nav>

        <div class="s-header__cta">
            <a href="#download" class="btn btn--stroke s-header__cta-btn smoothscroll">Get The App</a>
            <a href="#download" class="btn btn--stroke s-header__cta-btn smoothscroll" style="margin-left: 10px;">Get The App</a> <!-- Tombol tambahan -->
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
                            An Amazing App <br>
                            That Does It All.
                            </h1>
                        </div>
                        <div class="s-intro__content-right">
                            <p class="s-intro__content-desc body-text-2">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Mattis lacus interdum dictum dolor sit amet lectus ornare nunc non.
                            </p> 

                            <div class="s-intro__content-buttons">
                                <a href="#download" class="btn btn--primary s-intro__content-btn smoothscroll">Get Started</a>
                                <a href="https://player.vimeo.com/video/14592941?color=00a650&title=0&byline=0&portrait=0" class="s-intro__content-video-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M7 6v12l10-6z"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div> <!-- s-intro__content-inner -->

                </div> <!-- s-intro__content -->

                <ul class="s-intro__social">
                    <li>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:"><path d="M20,3H4C3.447,3,3,3.448,3,4v16c0,0.552,0.447,1,1,1h8.615v-6.96h-2.338v-2.725h2.338v-2c0-2.325,1.42-3.592,3.5-3.592 c0.699-0.002,1.399,0.034,2.095,0.107v2.42h-1.435c-1.128,0-1.348,0.538-1.348,1.325v1.735h2.697l-0.35,2.725h-2.348V21H20 c0.553,0,1-0.448,1-1V4C21,3.448,20.553,3,20,3z"></path></svg>
                            <span class="u-screen-reader-text">Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:"><path d="M19.633,7.997c0.013,0.175,0.013,0.349,0.013,0.523c0,5.325-4.053,11.461-11.46,11.461c-2.282,0-4.402-0.661-6.186-1.809 c0.324,0.037,0.636,0.05,0.973,0.05c1.883,0,3.616-0.636,5.001-1.721c-1.771-0.037-3.255-1.197-3.767-2.793 c0.249,0.037,0.499,0.062,0.761,0.062c0.361,0,0.724-0.05,1.061-0.137c-1.847-0.374-3.23-1.995-3.23-3.953v-0.05 c0.537,0.299,1.16,0.486,1.82,0.511C3.534,9.419,2.823,8.184,2.823,6.787c0-0.748,0.199-1.434,0.548-2.032 c1.983,2.443,4.964,4.04,8.306,4.215c-0.062-0.3-0.1-0.611-0.1-0.923c0-2.22,1.796-4.028,4.028-4.028 c1.16,0,2.207,0.486,2.943,1.272c0.91-0.175,1.782-0.512,2.556-0.973c-0.299,0.935-0.936,1.721-1.771,2.22 c0.811-0.088,1.597-0.312,2.319-0.624C21.104,6.712,20.419,7.423,19.633,7.997z"></path></svg>
                            <span class="u-screen-reader-text">Twitter</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
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


            <!-- about
            ----------------------------------------------- -->
            <section id="about" class="s-about target-section">


                <!-- stats -->
                <div class="row block-lg-one-fourth block-tab-one-half block-stack s-about__stats">

                    <div class="column s-about__stats-item">
                        <div class="s-about__stats-count">554<span>k</span></div>
                        <h5>Total Downloads</h5>
                    </div>
                    <div class="column s-about__stats-item">
                        <div class="s-about__stats-count">22<span>k</span></div>
                        <h5>Daily Visitors</h5>
                    </div>
                    <div class="column s-about__stats-item">
                        <div class="s-about__stats-count">99<span>%</span></div>
                        <h5>Positive Rating</h5>
                    </div>
                    <div class="column s-about__stats-item">
                        <div class="s-about__stats-count">526<span>k</span></div>
                        <h5>Happy Users</h5>
                    </div>

                </div> <!-- end stats -->


                <!-- intro info -->
                <div class="s-about__info">

                    <div class="row section-header" data-num="01">
                        <div class="column lg-6 stack-on-1000 title-block">
                            <h2 class="title text-display-1">Getting Started With Booth.</h2>
                        </div>
                        <div class="column lg-6 stack-on-1000 desc-block">
                            <p class="desc lead">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Urna, sit pretium, 
                            proin sed massa maecenas tempus, nibh. Ultrices pellentesque amet tristique 
                            feugiat condimentum integer fames.
                            </p>
                        </div>
                    </div>

                    <div class="row s-about__info-slider-block">
                        <div class="column lg-12">

                            <div class="swiper-container s-about__info-slider">
                                <div class="swiper-wrapper">

                                    <div class="s-about__info-slide swiper-slide">
                                        <h4 class="h5">Smart.</h4>
                    
                                        <p>
                                        Et nihil atque ex. Reiciendis et rerum ut voluptate. Omnis molestiae nemo est. 
                                        Ut quis enim rerum quia assumenda repudiandae non cumque qui. Amet repellat 
                                        omnis ea aut cumque eos.
                                        </p>
                                    </div>  <!-- end s-about__info-slide  -->
                    
                                    <div class="s-about__info-slide swiper-slide">
                                        <h4 class="h5">User-Friendly.</h4>
                    
                                        <p>
                                        Nulla harum facere. In mollitia aperiam id sapiente. Sed sint atque deserunt 
                                        voluptatem quisquam quis maxime earum. Adipisci et ratione rerum beatae optio 
                                        excepturi molestiae aut.
                                        </p>
                                    </div>  <!-- end s-about__info-slide  -->
                    
                                    <div class="s-about__info-slide swiper-slide">
                                        <h4 class="h5">Powerful.</h4>
                    
                                        <p>
                                        Qui dolores perspiciatis aut sint amet illum. Sint quisquam quod laborum 
                                        blanditiis. Inventore tenetur mollitia dolorum dolores quia. Et quia sed. 
                                        Deserunt facere quidem sed.
                                        </p>
                                    </div>  <!-- end s-about__info-slide  -->
                    
                                    <div class="s-about__info-slide swiper-slide">
                                        <h4 class="h5">Secure.</h4>
                    
                                        <p>
                                        Exercitationem minima sed similique. Ducimus quis omnis voluptas et nulla. 
                                        Ad mollitia quibusdam autem quod omnis. Ipsa aspernatur voluptatem illum 
                                        possimus quasi magni.
                                        </p>
                                    </div>  <!-- end s-about__info-slide  -->

                                </div> <!-- swiper-wrapper -->

                                <div class="swiper-pagination"></div>

                            </div> <!-- end swiper-container -->

                        </div>
                    </div> <!-- end s-about__info-slider-block -->

                </div> <!-- end s-about__info -->


                <!-- screens -->
                <div class="row s-about__screens-block">
                    <div class="column lg-12">

                    <div class="s-about__screens">
                        <div class="s-about__screen">
                            <img src="<?php echo base_url('assets/home/images/screens/screen-03.png'); ?>"
                                srcset="<?php echo base_url('assets/home/images/screens/screen-03.png'); ?> 1x, <?php echo base_url('assets/home/images/screens/screen-03@2x.png'); ?> 2x" alt="">
                        </div>
                        <div class="s-about__screen">
                            <img src="<?php echo base_url('assets/home/images/screens/screen-02.png'); ?>"
                                srcset="<?php echo base_url('assets/home/images/screens/screen-02.png'); ?> 1x, <?php echo base_url('assets/home/images/screens/screen-02@2x.png'); ?> 2x" alt="">
                        </div>
                        <div class="s-about__screen">
                            <img src="<?php echo base_url('assets/home/images/screens/screen-01.png'); ?>"
                                srcset="<?php echo base_url('assets/home/images/screens/screen-01.png'); ?> 1x, <?php echo base_url('assets/home/images/screens/screen-01@2x.png'); ?> 2x" alt="">
                        </div>
                    </div>


                    </div>
                </div> <!-- end screens -->


                <!-- how-to -->
                <div class="s-about__howto">

                    <div class="row section-header" data-num="02">
                        <div class="column lg-12 title-block">
                            <h2 class="title text-display-1">How the App Works.</h2>
                        </div>
                    </div>

                    <div class="row s-about__howto-content">

                        <div class="column s-about__howto-process-block">

                            <div class="s-about__howto-process">
                                <div class="s-about__howto-process-step">
                                    <h3 class="h5">Sign Up</h3>
                                    <p>
                                    Quos dolores saepe mollitia deserunt accusamus autem reprehenderit. Voluptas facere animi explicabo non quis magni recusandae. 
                                    Numquam debitis non quis pariatur omnis facere unde. 
                                    </p>
                                </div>
                                <div class="s-about__howto-process-step">
                                    <h3 class="h5">Create</h3>
                                    <p>
                                    Commodi vero praesentium ex eum sunt. Deserunt animi velit. Eum explicabo omnis at aut perferendis veniam. Corporis expedita 
                                    voluptas culpa dicta qui tempora non explicabo omnis at sint tempora.
                                    </p>
                                </div>
                                <div class="s-about__howto-process-step">
                                    <h3 class="h5">Compose</h3>
                                    <p>
                                    Est quam molestias eius. Voluptatibus eveniet debitis natus porro dignissimos quia. Molestias sint ab velit. Perspiciatis porro 
                                    hic possimus exercitationem sint ab velit architecto fugiat. 
                                    </p>
                                </div>
                                <div class="s-about__howto-process-step">
                                    <h3 class="h5">Send</h3>
                                    <p>
                                    Qui aspernatur soluta sapiente voluptas ut a. Non repellat dolores dolorum vel et aut et perferendis. Hic voluptatem odit ab qui. 
                                    Officia blanditiis molestiae voluptatem odit ab. 
                                    </p>
                                </div>
                            </div> <!-- end how-to process -->

                        </div>

                        <div class="column s-about__howto-screens-block">

                            <div class="s-about__howto-screens">
                                <img src="images/screens/screen-01.png"
                                     srcset="images/screens/screen-01.png 1x, images/screens/screen-01@2x.png 2x" alt="">
                                <img src="images/screens/screen-04.png"
                                     srcset="images/screens/screen-04.png 1x, images/screens/screen-04@2x.png 2x" alt="">
                            </div>

                        </div>

                    </div>
        
                </div> <!-- end how-to -->


                <!-- features -->
                <div class="s-about__features">

                    <div class="row section-header" data-num="03">
                        <div class="column lg-6 stack-on-1000 title-block">
                            <h2 class="title text-display-1">The Best Features of The App.</h2>
                        </div>
                        <div class="column lg-6 stack-on-1000 desc-block">
                            <p class="desc lead">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Urna, sit pretium, 
                            proin sed massa maecenas tempus, nibh. Ultrices pellentesque amet tristique 
                            feugiat condimentum integer fames.
                            </p>
                        </div>
                    </div>

                    <div class="row s-about__feature-list block-lg-one-third">
    
                        <div class="column s-about__feature-item">
                            <div class="s-about__feature-icon-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M18.944 11.112C18.507 7.67 15.56 5 12 5 9.244 5 6.85 6.611 5.757 9.15 3.609 9.792 2 11.82 2 14c0 2.757 2.243 5 5 5h11c2.206 0 4-1.794 4-4a4.01 4.01 0 0 0-3.056-3.888zM18 17H7c-1.654 0-3-1.346-3-3 0-1.404 1.199-2.756 2.673-3.015l.581-.102.192-.558C8.149 8.274 9.895 7 12 7c2.757 0 5 2.243 5 5v1h1c1.103 0 2 .897 2 2s-.897 2-2 2z"></path></svg>
                            </div>
                            <div class="s-about__feature-text">
                                <h3 class="h5">Cloud Based</h3>
                                <p>Nemo cupiditate ab quibusdam quaerat impedit magni. Earum suscipit ipsum laudantium. 
                                Quo delectus est. Maiores voluptas ab sit natus veritatis ut. Debitis nulla cumque veritatis.
                                Sunt suscipit voluptas ipsa in tempora esse soluta sint aliquam rhoncus elit.
                                </p>
                            </div>
                        </div>
            
                        <div class="column s-about__feature-item">
                            <div class="s-about__feature-icon-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M18 7c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v10c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-3.333L22 17V7l-4 3.333V7zm-1.998 10H4V7h12l.001 4.999L16 12l.001.001.001 4.999z"></path></svg>
                            </div>
                            <div class="s-about__feature-text">
                                <h3 class="h5">Voice & Video</h3>
                                <p>Nulla pharetra diam sit amet nisl suscipit adipiscing bibendum est. Quis risus sed vulputate 
                                odio ut. Lectus arcu bibendum at varius vel. Lorem ipsum dolor sit amet consectetur adipiscing 
                                elit pellentesque. In nulla posuere sollicitudin aliquam ultrices.
                                </p>
                            </div>
                        </div>
            
                        <div class="column s-about__feature-item">
                            <div class="s-about__feature-icon-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M20.995 6.9a.998.998 0 0 0-.548-.795l-8-4a1 1 0 0 0-.895 0l-8 4a1.002 1.002 0 0 0-.547.795c-.011.107-.961 10.767 8.589 15.014a.987.987 0 0 0 .812 0c9.55-4.247 8.6-14.906 8.589-15.014zM12 19.897C5.231 16.625 4.911 9.642 4.966 7.635L12 4.118l7.029 3.515c.037 1.989-.328 9.018-7.029 12.264z"></path><path d="m11 12.586-2.293-2.293-1.414 1.414L11 15.414l5.707-5.707-1.414-1.414z"></path></svg>
                            </div>
                            <div class="s-about__feature-text">
                                <h3 class="h5">Always Secure</h3>
                                <p>Eleifend donec pretium vulputate sapien nec sagittis aliquam malesuada. Eu scelerisque felis 
                                imperdiet proin fermentum leo. Cursus turpis massa tincidunt dui. Quis commodo odio aenean sed 
                                adipiscing diam donec adipiscing. Congue mauris rhoncus elit.
                                </p>
                            </div>
                        </div>
            
                        <div class="column s-about__feature-item">
                            <div class="s-about__feature-icon-block">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M22 8.65A5 5 0 0 0 17 4H7a5 5 0 0 0-5 4.74A2 2 0 0 0 2 9v7.5A3.48 3.48 0 0 0 5.5 20c1.43 0 2.32-1.06 3.19-2.09.32-.37.65-.76 1-1.1a4.81 4.81 0 0 1 1.54-.75 6.61 6.61 0 0 1 1.54 0 4.81 4.81 0 0 1 1.54.75c.35.34.68.73 1 1.1.87 1 1.76 2.09 3.19 2.09a3.48 3.48 0 0 0 3.5-3.5V9a2.09 2.09 0 0 0 0-.26zm-2 7.85a1.5 1.5 0 0 1-1.5 1.5c-.5 0-1-.64-1.66-1.38-.34-.39-.72-.85-1.15-1.26a6.68 6.68 0 0 0-2.46-1.25 6.93 6.93 0 0 0-2.46 0 6.68 6.68 0 0 0-2.46 1.25c-.43.41-.81.87-1.15 1.26C6.54 17.36 6 18 5.5 18A1.5 1.5 0 0 1 4 16.5V9a.77.77 0 0 0 0-.15A3 3 0 0 1 7 6h10a3 3 0 0 1 3 2.72v.12A.86.86 0 0 0 20 9z"></path><circle cx="16" cy="12" r="1"></circle><circle cx="18" cy="10" r="1"></circle><circle cx="16" cy="8" r="1"></circle><circle cx="14" cy="10" r="1"></circle><circle cx="8" cy="10" r="2"></circle></svg>
                            </div>
                            <div class="s-about__feature-text">
                                <h3 class="h5">Play Games</h3>
                                <p>Nemo cupiditate ab quibusdam quaerat impedit magni. Earum suscipit ipsum laudantium. 
                                Quo delectus est. Maiores voluptas ab sit natus veritatis ut. Debitis nulla cumque veritatis.
                                Sunt suscipit voluptas ipsa in tempora esse soluta sint donec adipiscing.
                                </p>
                            </div>
                        </div>
            
                        <div class="column s-about__feature-item">
                            <div class="s-about__feature-icon-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M16 2H8C4.691 2 2 4.691 2 8v12a1 1 0 0 0 1 1h13c3.309 0 6-2.691 6-6V8c0-3.309-2.691-6-6-6zm4 13c0 2.206-1.794 4-4 4H4V8c0-2.206 1.794-4 4-4h8c2.206 0 4 1.794 4 4v7z"></path><circle cx="9.5" cy="11.5" r="1.5"></circle><circle cx="14.5" cy="11.5" r="1.5"></circle></svg>
                            </div>
                            <div class="s-about__feature-text">
                                <h3 class="h5">Group Chat</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt 
                                ut labore et dolore magna aliqua. Venenatis lectus magna fringilla urna. Lectus vestibulum 
                                mattis ullamcorper velit sed ullamcorper morbi. Sit amet aliquam.
                                </p>
                            </div>
                        </div>
                
                        <div class="column s-about__feature-item">
                            <div class="s-about__feature-icon-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                    <path d="M16 12h2v4h-2z"></path><path d="M20 7V5c0-1.103-.897-2-2-2H5C3.346 3 2 4.346 2 6v12c0 2.201 1.794 3 3 3h15c1.103 0 2-.897 2-2V9c0-1.103-.897-2-2-2zM5 5h13v2H5a1.001 1.001 0 0 1 0-2zm15 14H5.012C4.55 18.988 4 18.805 4 18V8.815c.314.113.647.185 1 .185h15v10z"></path></svg>
                            </div>
                            <div class="s-about__feature-text">
                                <h3 class="h5">Payments</h3>
                                <p>Nullam eget felis eget nunc. Adipiscing commodo elit at imperdiet dui accumsan. Condimentum 
                                mattis pellentesque id nibh tortor id aliquet lectus proin. Orci eu lobortis elementum nibh 
                                tellus. Tortor vitae purus faucibus ornare suspendisse.
                                </p>
                            </div>
                        </div>
            
                    </div> <!-- end features-list -->

                </div> <!-- end features -->

            </section> <!-- end s-about -->


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
                                        <img src="images/avatars/user-01.jpg" alt="Author image" class="s-testimonials__avatar">
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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Urna, sit pretium, proin sed massa maecenas tempus, nibh. 
                        Ultrices pellentesque amet tristique feugiat condimentum integer fames. 
                        </p>
                    </div> <!-- end s-pricing__header -->

                    <div class="column lg-8 md-12 s-pricing__plans">
                        <div class="row plans block-lg-one-half block-tab-whole">

                            <div class="column item-plan item-plan--popular">
                                <div class="item-plan__block"> 

                                    <div class="item-plan__top-part">
                                        <h3 class="item-plan__title">Pro Plan</h3>
                                        <p class="item-plan__price"><sup>Rp</sup>100K</p>
                                        <p class="item-plan__per">Per Bulan</p>
                                    </div>
                
                                    <div class="item-plan__bottom-part">
                                        <ul class="item-plan__features">
                                            <li><span>5000GB</span> Storage</li>
                                            <li><span>Unlimited</span> Bandwidth</li>
                                            <li><span>100</span> Email Accounts</li>
                                            <li>Backup & Restore</li>
                                        </ul>
                
                                        <a class="btn btn--primary u-fullwidth" href="#0">Get Started</a>
                                    </div>
                                
                                </div>
                            </div> <!-- end item-plan -->
                            <div class="column item-plan">
                                <div class="item-plan__block"> 

                                    <div class="item-plan__top-part">
                                        <h3 class="item-plan__title">Free</h3>
                                        <p class="item-plan__price"><sup>$</sup>0</p>
                                        <p class="item-plan__per">Forever</p>
                                    </div>
                
                                    <div class="item-plan__bottom-part">
                                        <ul class="item-plan__features">
                                            <li><span>50GB</span> Storage</li>
                                            <li><span>50GB</span> Bandwidth</li>
                                            <li><span>30</span> Email Accounts</li>
                                            <li>Backup & Restore</li>
                                        </ul>
                
                                        <a class="btn btn--primary u-fullwidth" href="#0">Get Started</a>
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
                        <h2 class="text-display-1">Thousands of People Are Now Using Booth. Join Our Community!</h2>
                        <p class="lead">
                        Et nihil atque ex. Reiciendis et rerum ut voluptate. Omnis molestiae nemo est. 
                        Ut quis enim rerum quia assumenda repudiandae non cumque qui. Amet repellat 
                        omnis ea. Ultrices pellentesque amet tristique feugiat condimentum integer fames. 
                        </p>
                    </div>
                </div>
                <div class="row s-download__badges-block">
                    <div class="column lg-12 s-download__badges">
                        <a href="#0" title="" class="badge-appstore">
                            <img src="images/appstore.png" alt="">
                        </a>
                        <a href="#0" title="" class="badge-googleplay">
                            <img src="images/google-play.png" alt="">
                        </a>
                    </div>
                </div>
            </section>


        </section> <!-- end s-content -->


       