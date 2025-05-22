<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Index - Gp Bootstrap Template</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <link rel="shortcut icon" href="assets-dashboard/images/brand-logo.png" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link
      href="assets-homepage/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="assets-homepage/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link href="assets-homepage/vendor/aos/aos.css" rel="stylesheet" />
    <link
      href="assets-homepage/vendor/swiper/swiper-bundle.min.css"
      rel="stylesheet"
    />
    <link
      href="assets-homepage/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />

    <!-- Main CSS File -->
    <link href="assets-homepage/css/main.css" rel="stylesheet" />
  </head>

  <body class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top">
      <div
        class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between"
      >
        <a
          href="index.html"
          class="logo d-flex align-items-center me-auto me-lg-0"
        >
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets-homepage/img/logo.png" alt=""> -->
          <h1 class="sitename">AN</h1>
          <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li>
              <a href="{{ route('home-page') }}" class="active">
                Trang Chủ
                <br />
              </a>
            </li>
            <li><a href="#about">Giới Thiệu</a></li>
            <li><a href="#services">Tính Năng</a></li>
            <li><a href="#testimonials">Đánh Giá</a></li>
            <li><a href="#contact">Liên Hệ</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="{{ route('auth.login') }}">
          Đăng Nhập
        </a>
        

        
      </div>
    </header>

    <main class="main">
      <!-- Hero Section -->
      <section id="hero" class="hero section dark-background">
        <img src="assets-homepage/img/hero-bg.jpg" alt="" data-aos="fade-in" />

        <div class="container">
          <div
            class="row justify-content-center text-center"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <div class="col-xl-6 col-lg-8">
              <h2>
                Hệ thống thi trắc nghiệm online dành cho học sinh Cấp 1
                <span>.</span>
              </h2>
            </div>
          </div>

          <div
            class="row gy-4 mt-5 justify-content-center"
            data-aos="fade-up"
            data-aos-delay="200"
          >
            <div
              class="col-xl-2 col-md-4"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <div class="icon-box">
                <i class="bi bi-binoculars"></i>
                <h3>Lorem Ipsum</h3>
              </div>
            </div>
            <div
              class="col-xl-2 col-md-4"
              data-aos="fade-up"
              data-aos-delay="400"
            >
              <div class="icon-box">
                <i class="bi bi-bullseye"></i>
                <h3>Dolor Sitema</h3>
              </div>
            </div>
            <div
              class="col-xl-2 col-md-4"
              data-aos="fade-up"
              data-aos-delay="500"
            >
              <div class="icon-box">
                <i class="bi bi-fullscreen-exit"></i>
                <h3>Sedare Perspiciatis</h3>
              </div>
            </div>
            <div
              class="col-xl-2 col-md-4"
              data-aos="fade-up"
              data-aos-delay="600"
            >
              <div class="icon-box">
                <i class="bi bi-card-list"></i>
                <h3>Magni Dolores</h3>
              </div>
            </div>
            <div
              class="col-xl-2 col-md-4"
              data-aos="fade-up"
              data-aos-delay="700"
            >
              <div class="icon-box">
                <i class="bi bi-gem"></i>
                <h3>Nemos Enimade</h3>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /Hero Section -->

      <!-- About Section -->
      <section id="about" class="about section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2">
              <img
                src="assets-homepage/img/about.jpg"
                class="img-fluid"
                alt=""
              />
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content">
              <h3>Giới Thiệu Sơ Lược</h3>
              <ul>
                <li>
                  <i class="bi bi-check2-all"></i>
                  <span>
                    Chúng tôi cung cấp giải pháp toàn diện cho việc tạo và quản
                    lý ngân hàng câu hỏi, đề thi trắc nghiệm, bài giảng, hỗ trợ
                    tổ chức các kỳ thi online, giao bài tập về nhà dễ dàng trên
                    mọi nền tảng Web và Mobile.
                  </span>
                </li>
                <li>
                  <i class="bi bi-check2-all"></i>
                  <span>
                    Tận dụng sức mạnh công nghệ, chúng tôi giúp nâng cao trình
                    độ học tập của người dùng thông qua các công cụ hỗ trợ học
                    trực tuyến, tăng cường sự tương tác và trải nghiệm học tập
                    của sinh viên, học viên, và giảng viên.
                  </span>
                </li>
                <li>
                  <i class="bi bi-check2-all"></i>
                  <span>
                    Được cộng đồng sinh viên, trường đại học, và doanh nghiệp
                    trên cả nước tin tưởng và sử dụng, chúng tôi cam kết mang
                    lại các công cụ hữu ích và tiện lợi, đồng thời không ngừng
                    cải tiến và cập nhật để đáp ứng nhu cầu phát triển của ngành
                    giáo dục và đào tạo.
                  </span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <!-- /About Section -->

      <!-- Call To Action Section -->
      <section
        id="call-to-action"
        class="call-to-action section dark-background"
      >
        <img src="assets-homepage/img/cta-bg.jpg" alt="" />

        <div class="container">
          <div
            class="row justify-content-center"
            data-aos="zoom-in"
            data-aos-delay="100"
          >
            <div class="col-xl-10">
              <div class="text-center">
                <h3>Hãy bắt đầu làm bài ngay</h3>
                <p>
                  Hệ thống của chúng tôi giúp bạn học tập và thi trắc nghiệm một
                  cách hiệu quả thông qua những công cụ hiện đại và giao diện
                  thân thiện. Chúng tôi không chỉ giúp bạn chuẩn bị cho kỳ thi
                  mà còn nâng cao kỹ năng học tập qua các bài thi thử, bài tập
                  luyện tập, và ngân hàng câu hỏi phong phú.
                </p>
                <a class="cta-btn" href="{{ route('auth.login') }}">
                  Đăng Nhập Ngay
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /Call To Action Section -->
      <!-- Services Section -->
      <section id="services" class="services section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Tính Năng</h2>
          <p>Các Tính Năng</p>
        </div>
        <!-- End Section Title -->

        <div class="container">
          <div class="row gy-4">
            <div
              class="col-lg-4 col-md-6"
              data-aos="fade-up"
              data-aos-delay="100"
            >
              <div class="service-item position-relative">
                <div class="icon">
                  <i class="bi bi-activity"></i>
                </div>
                <a href="service-details.html" class="stretched-link">
                  <h3>Tạo đề thi nhanh</h3>
                </a>
                <p>
                  Chỉ vài thao tác đơn giản, nhanh chóng, bạn đã có thể biên tập
                  được bộ đề thi trắc nghiệm của mình và chia sẻ đến cộng đồng,
                  nhóm học tập hoặc tự học.
                </p>
              </div>
            </div>
            <!-- End Service Item -->

            <div
              class="col-lg-4 col-md-6"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <div class="service-item position-relative">
                <div class="icon">
                  <i class="bi bi-broadcast"></i>
                </div>
                <a href="service-details.html" class="stretched-link">
                  <h3>Kết quả thi</h3>
                </a>
                <p>
                  Xem kết quả thi và đưa ra đánh giá chính xác, khách quan, hiệu
                  quả.
                </p>
              </div>
            </div>
            <!-- End Service Item -->

            <div
              class="col-lg-4 col-md-6"
              data-aos="fade-up"
              data-aos-delay="300"
            >
              <div class="service-item position-relative">
                <div class="icon">
                  <i class="bi bi-easel"></i>
                </div>
                <a href="service-details.html" class="stretched-link">
                  <h3>Quản lý học sinh, người thi</h3>
                </a>
                <p>
                  Dễ dàng tạo các lớp học của mình để quản lý cũng như ra đề thi
                  , thông báo, trao đổi tài liệu cho các bạn học sinh, người
                  thi.
                </p>
              </div>
            </div>
            <!-- End Service Item -->
          </div>
        </div>
      </section>
      <!-- /Services Section -->

      <!-- Testimonials Section -->
      <section id="testimonials" class="testimonials section dark-background">
        <img
          src="assets-homepage/img/testimonials-bg.jpg"
          class="testimonials-bg"
          alt=""
        />

        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
                },
                "slidesPerView": "auto",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                }
              }
            </script>
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img
                    src="assets-homepage/img/testimonials/testimonials-1.jpg"
                    class="testimonial-img"
                    alt=""
                  />
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>
                      Sau khi áp dụng hệ thống vào trung tâm của chúng tôi. Việc
                      quản lý trở nên dễ dàng. Đặc biệt xây dựng được bộ ngân
                      hàng câu hỏi chung cho cả trung tâm giúp tiết kiệm thời
                      gian trong việc kiểm tra học sinh cũng như thống nhất và
                      kiện toàn chương trình giảng dậy của trung tâm.
                    </span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img
                    src="assets-homepage/img/testimonials/testimonials-2.jpg"
                    class="testimonial-img"
                    alt=""
                  />
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>
                      Em học nhàn hẳn.Em cũng thích tính năng tạo đề linh hoạt,
                      em được sử dụng rất nhiều công thức.
                    </span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img
                    src="assets-homepage/img/testimonials/testimonials-3.jpg"
                    class="testimonial-img"
                    alt=""
                  />
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>
                      Hệ thống thi trắc nghiệm rất hay và tiện ích, giờ đây
                      chúng tôi có thể quản lý và phân lớp cũng như giao bài tập
                      cho từng học sinh trong lớp dễ dàng. Đặc biết với những kỳ
                      thi, khảo sát chúng tôi có thể dễ dàng theo dõi học sinh
                      kể cả những gian lận trong quá trình làm bài.
                    </span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img
                    src="assets-homepage/img/testimonials/testimonials-4.jpg"
                    class="testimonial-img"
                    alt=""
                  />
                  <h3>Matt Brandon</h3>
                  <h4>Freelancer</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>Nhờ vậy tôi đã có một kỳ thi với kết quả như ý.</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img
                    src="assets-homepage/img/testimonials/testimonials-5.jpg"
                    class="testimonial-img"
                    alt=""
                  />
                  <h3>John Larson</h3>
                  <h4>Entrepreneur</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>Great!!!</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
              <!-- End testimonial item -->
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </section>
      <!-- /Testimonials Section -->

      <!-- Contact Section -->
      <section id="contact" class="contact section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Liên Hệ</h2>
          <p>Hãy Liên Hệ Với Chúng Tôi</p>
        </div>
        <!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
            <iframe
              style="border: 0; width: 100%; height: 270px"
              src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
              frameborder="0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
          <!-- End Google Maps -->

          <div class="row gy-4">
            <div class="col-lg-4">
              <div
                class="info-item d-flex"
                data-aos="fade-up"
                data-aos-delay="300"
              >
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Địa Chỉ</h3>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
              </div>
              <!-- End Info Item -->

              <div
                class="info-item d-flex"
                data-aos="fade-up"
                data-aos-delay="400"
              >
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Liên Hệ</h3>
                  <p>+1 5589 55488 55</p>
                </div>
              </div>
              <!-- End Info Item -->

              <div
                class="info-item d-flex"
                data-aos="fade-up"
                data-aos-delay="500"
              >
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email</h3>
                  <p>info@example.com</p>
                </div>
              </div>
              <!-- End Info Item -->
            </div>

            <div class="col-lg-8">
              <form
                action="forms/contact.php"
                method="post"
                class="php-email-form"
                data-aos="fade-up"
                data-aos-delay="200"
              >
                <div class="row gy-4">
                  <div class="col-md-6">
                    <input
                      type="text"
                      name="name"
                      class="form-control"
                      placeholder="Nhập tên của bạn"
                      required=""
                    />
                  </div>

                  <div class="col-md-6">
                    <input
                      type="email"
                      class="form-control"
                      name="email"
                      placeholder="Nhập địa chỉ email"
                      required=""
                    />
                  </div>

                  <div class="col-md-12">
                    <input
                      type="text"
                      class="form-control"
                      name="subject"
                      placeholder="Nhập chủ đề cần tư vấn"
                      required=""
                    />
                  </div>

                  <div class="col-md-12">
                    <textarea
                      class="form-control"
                      name="message"
                      rows="6"
                      placeholder="Các câu hỏi thêm"
                      required=""
                    ></textarea>
                  </div>

                  <div class="col-md-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">
                      Your message has been sent. Thank you!
                    </div>

                    <button type="submit">Gửi</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- End Contact Form -->
          </div>
        </div>
      </section>
      <!-- /Contact Section -->
    </main>

    <footer id="footer" class="footer dark-background">
      <div class="footer-top">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
              <a href="index.html" class="logo d-flex align-items-center">
                <span class="sitename">AN</span>
              </a>
              <div class="footer-contact pt-3">
                <p>A108 Adam Street</p>
                <p>New York, NY 535022</p>
                <p class="mt-3">
                  <strong>Phone:</strong>
                  <span>+1 5589 55488 55</span>
                </p>
                <p>
                  <strong>Email:</strong>
                  <span>info@example.com</span>
                </p>
              </div>
              <div class="social-links d-flex mt-4">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
              <h4>Liên kết hữu ích</h4>
              <ul>
                <li>
                  <i class="bi bi-chevron-right"></i>
                  <a href="{{ route('home-page') }}">Trang Chủ</a>
                </li>
                <li>
                  <i class="bi bi-chevron-right"></i>
                  <a href="#about">Giới Thiệu</a>
                </li>
                <li>
                  <i class="bi bi-chevron-right"></i>
                  <a href="#services">Tính Năng</a>
                </li>
                <li>
                  <i class="bi bi-chevron-right"></i>
                  <a href="#testimonials">Đánh Giá</a>
                </li>
                <li>
                  <i class="bi bi-chevron-right"></i>
                  <a href="#contact">Liên Hệ</a>
                </li>
              </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
              <h4>Dịch vụ của chúng tôi</h4>
              <ul>
                <li>
                  <i class="bi bi-chevron-right"></i>
                  <a href="{{ route('auth.login') }}">
                    Phòng thi ảo trực tuyến
                  </a>
                </li>
                <li>
                  <i class="bi bi-chevron-right"></i>
                  <a href="{{ route('auth.login') }}">
                    Học tập mọi lúc mọi nơi
                  </a>
                </li>
              </ul>
            </div>

            <div class="col-lg-4 col-md-12 footer-newsletter">
              <h4>Bản tin của chúng tôi</h4>
              <p>
                Đăng ký nhận bản tin của chúng tôi và nhận tin tức mới nhất về
                sản phẩm và dịch vụ của chúng tôi!
              </p>
              <form
                action="forms/newsletter.php"
                method="post"
                class="php-email-form"
              >
                <div class="newsletter-form">
                  <input type="email" name="email" />
                  <input type="submit" value="Gửi" />
                </div>
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">
                  Your subscription request has been sent. Thank you!
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Scroll Top -->
    <a
      href="#"
      id="scroll-top"
      class="scroll-top d-flex align-items-center justify-content-center"
    >
      <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets-homepage/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets-homepage/vendor/php-email-form/validate.js"></script>
    <script src="assets-homepage/vendor/aos/aos.js"></script>
    <script src="assets-homepage/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets-homepage/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets-homepage/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets-homepage/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets-homepage/vendor/purecounter/purecounter_vanilla.js"></script>

    <!-- Main JS File -->
    <script src="assets-homepage/js/main.js"></script>
  </body>
</html>
