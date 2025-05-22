    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Giới thiệu</h2>
          <p>Xin chào! Đây là Profile của tôi. Tôi luôn tin vào việc không ngừng học hỏi và phát triển bản thân để trở thành phiên bản tốt hơn mỗi ngày. Mỗi trải nghiệm và cơ hội trong cuộc sống đều giúp tôi trưởng thành và mở rộng tầm nhìn. Tôi yêu thích việc kết nối với những người có cùng sở thích, chia sẻ ý tưởng và cùng nhau tạo ra những giá trị tích cực cho cộng đồng.</p>
        </div><!-- End Section Title -->
  
        <div class="container" data-aos="fade-up" data-aos-delay="100">
  
          <div class="row gy-4 justify-content-center">
            @if (isset($user) && is_object($user))
            <div class="col-lg-4">
              <img src="{{ asset($user->img) }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 content">
              <h2 class="py-3">Họ và tên : {{ $user->hoTen }}</h2>
              <div class="row">
                <div class="col-lg-6">
                  <ul>
                    <li><i class="bi bi-chevron-right"></i> <strong>Ngày sinh:</strong> <span>{{ \Carbon\Carbon::parse($user->ngaySinh)->format('d-m-Y') }}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{ $user->email }}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{ $user->dienThoai }}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Địa chỉ:</strong> <span>{{ $user->diaChi }}</span></li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul>
                    <li><i class="bi bi-chevron-right"></i> <strong>Mã thành viên:</strong> <span>{{ $user->maThanhVien }}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Giới tính: </strong> <span>{{ $user->gioiTinh == 1 ? 'Nữ' : 'Nam' }}</span></li>
                  </ul>
                </div>
              </div>
              
            </div>
            @endif
          </div>
  
        </div>

      </section><!-- /About Section -->