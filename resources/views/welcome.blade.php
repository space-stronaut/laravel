<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SiAgen | Sistem Informasi Agenda</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Inter:400,600,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    </head>
    <body id="page-top">
        <style>
            @media (max-width: 991.98px) { 
                .navbar-nav{
                    text-align: center
                }
                .navbar-button{
                    width: 100%;
                }
                .masthead-heading{
                    font-size: 20px;
                }
            }
        </style>
        <!-- Navigation-->
        <nav class="px-5 navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img style="width: 100px;height: 50px;" src="{{ asset('img/LogoSiAgen.png') }}" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#page-top">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Fitur</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Agenda</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Pegawai</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Team</a></li>
                        <li class="nav-item"><a class="btn btn-primary navbar-button" href="{{ url('/login') }}">Masuk</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead" style="background-image: url({{ asset('img/jumbotron1.jpg') }})" data-aos="fade-up">
            <div class="container">
                <div class="masthead-subheading" data-aos="fade-up">Selamat Datang Di SiAgen </div>
                <div class="masthead-heading text-uppercase" data-aos="fade-up">Atur Agenda Kegiatan Hari Ini</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Mulai</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center" data-aos="fade-up">
                    <h2 class="section-heading text-uppercase">Fitur</h2>
                    <h3 class="section-subheading text-muted">Fitur Yang Kami Sajikan</h3>
                </div>
                <div class="row text-center justify-content-around" data-aos="fade-up">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Minimalist Design</h4>
                        <p class="text-muted">Website ini dibuat dengan desain seminimalis mungkin agar sang admin mudah mengoperasikan.</p>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-mobile-alt fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Responsive Design</h4>
                        <p class="text-muted">Website Ini Telah mendukung RWD yang dapat diakses disemua perangkat.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center" data-aos="fade-up">
                    <h2 class="section-heading text-uppercase">Agenda Hari Ini</h2>
                    <h3 class="section-subheading text-muted">Agenda Kegiatan Pegawai Badan Keuangan Anggaran Daerah Hari Ini.</h3>
                    <a href="{{ url('/data-agenda') }}" class="nav-link">Lihat Selengkapnya</a>
                </div>
                <div class="row justify-content-between mt-5" data-aos="fade-up">
                    @foreach ($agendas as $agenda)
                    <div class="card col-5 mb-3" data-aos="fade-up" id="card-reload">
                      <div class="card-header">
                        <ul>
                          @foreach ($agenda->workers as $worker)
                              <li><b>{{ $worker->nama }}</b></li>
                          @endforeach
                        </ul>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">{{ $agenda->agenda }}</h5>
                        <i class="fas fa-clock text-grey fa-fw"></i><small class="ml-3">{{ $agenda->mulai }} - {{ $agenda->selesai }}</small><br>
                        <i class="fas fa-map-marker-alt text-grey fa-fw"></i><small class="ml-3">{{ $agenda->lokasi }}</small>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center" data-aos="fade-up">
                    <h2 class="section-heading text-uppercase">Data Pegawai</h2>
                    <h3 class="section-subheading text-muted">Data Pegawai Badan Keuangan Anggaran Daerah.</h3>
                    <a href="{{ url('/data-pegawai') }}" class="nav-link">Lihat Selengkapnya</a>
                </div>
                <div style="overflow-x: auto" data-aos="fade-up">
                    <table class="table table-striped table-border table-hover tab-reload" border="2">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nama</th>
                            <th scope="col" >NIP</th>
                            <th scope="col" >Bidang</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Golongan</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($workers as $worker)
                          <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $worker->nama }}</td>
                            <td>{{ $worker->nip }}</td>
                            <td><b>{{ $worker->bidang }}</b></td>
                            <td>{{ $worker->jabatan }}</td>
                            <td>{{ $worker->golongan }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team" >
            <div class="container">
                <div class="text-center" data-aos="fade-up">
                    <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">Rekayasa Perangkat Lunak SMKN 1 SUBANG</h3>
                </div>
                <div class="row" data-aos="fade-up">
                    <div class="col-lg-4" data-aos-duration="1400">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="" />
                            <h4>Ikmal Dean Anugrah</h4>
                            <p class="text-muted">Frontend</p>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos-duration="1600">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="FotoRaldy.JPG" alt="" />
                            <h4>Raldy Lutfiana</h4>
                            <p class="text-muted">UI Design / Frontend</p>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos-duration="1800">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="" />
                            <h4>Ronald Abel Hermansyah</h4>
                            <p class="text-muted">Backend Developer</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
                </div>
            </div>
        </section>
        <!-- Clients-->
       
        <!-- Contact-->
        
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Hak Cipta Oleh © <br> SiAgen | Sistem Informasi Agenda</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Modal 1-->
        
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 1200,
            });
        </script>
    </body>
</html>