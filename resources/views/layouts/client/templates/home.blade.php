@if (isset($user) && is_object($user))
  <section id="hero" class="hero section dark-background">
    <img src="{{ asset('assets-client/img/bg-image.jpg') }}" alt="Background" data-aos="fade-in" class="">

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h2>{{ $user->hoTen }}</h2>
        <p>
            <span class="typed" data-typed-items="Rất vui được gặp bạn!!!, Chúc bạn một ngày tốt lành :))">Rất vui được gặp bạn</span>
            <span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span>
        </p>
    </div>
  </section>


@endif

