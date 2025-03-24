@extends('layouts.index')
@section('title', 'DashBoard')

@section('content')
  <div class="container-scroller">
    @if (isset($users) && is_object($users))
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div
          class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top"
        >
          <div class="sidebar-brand brand-logo">ADMIN</div>
          <div class="sidebar-brand brand-logo-mini">ADMIN</div>
        </div>
        <ul class="nav">
          <div class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img
                    class="img-xs rounded-circle"
                    src="{{ $users->img }}"
                    alt="avt"
                  />
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">{{ $users->hoTen }}</h5>
                  <span>{{ $users->email }}</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown">
                <i class="mdi mdi-dots-vertical"></i>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                aria-labelledby="profile-dropdown"
              >
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">
                      Cài Đặt Tài Khoản
                    </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">
                      Thay Đổi Mật Khẩu
                    </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
              </div>
            </div>
          </div>
          <div class="nav-item nav-category">
            <span class="nav-link">Quản Lí</span>
          </div>
          <li class="nav-item nav-item-li menu-items">
            <a
              class="nav-link"
              href="{{ route('admin.dashboard')}}"
            >
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Tổng Quan</span>
            </a>
          </li>
          <li class="nav-item nav-item-li menu-items">
            <a
              class="nav-link"
              href="{{ route('admin.dashboard', ['template' => 'class']) }}"
              data-template="class"
            >
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Lớp Học</span>
            </a>
          </li>
          <li class="nav-item nav-item-li menu-items">
            <a
              class="nav-link"
              href="{{ route('admin.dashboard', ['template' => 'question']) }}"
              data-template="question"
            >
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Câu hỏi</span>
            </a>
          </li>
          <li class="nav-item nav-item-li menu-items {{ Route::currentRouteName() == 'admin.user' ? 'active' : '' }}">
            <a
              class="nav-link"
              href="{{ route('admin.user') }}"
              data-template="user"
            >
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Người Dùng</span>
            </a>
          </li>
          <li class="nav-item nav-item-li menu-items">
            <a
              class="nav-link"
              href="{{ route('admin.subject') }}"
              data-template="subject"
            >
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Môn Học</span>
            </a>
          </li>
          <li class="nav-item nav-item-li menu-items">
            <a
              class="nav-link"
              href="{{ route('admin.test') }}"
              data-template="test"
            >
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Bài Kiểm Tra</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div
            class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center"
          >
            <a class="navbar-brand brand-logo-mini" href="index.html">
              <img src="{{ asset('assets-dashboard/images/logo-mini.svg ') }}" alt="logo" />
            </a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button
              class="navbar-toggler navbar-toggler align-self-center"
              type="button"
              data-toggle="minimize"
            >
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Tìm Kiếm"
                  />
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <div class="preview-item">
                  <input
                    type="checkbox"
                    class="checkbox-dark-light"
                    id="checkbox"
                  />
                  <label for="checkbox" class="checkbox-label-dark-light">
                    <i class="mdi mdi-moon-last-quarter"></i>
                    <i class="mdi mdi-weather-sunny"></i>
                    <span class="ball-dark-light"></span>
                  </label>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link"
                  id="profileDropdown"
                  href="#"
                  data-toggle="dropdown"
                >
                  <div class="navbar-profile">
                    <img
                      class="img-xs rounded-circle"
                      src="{{ $users->img }}"
                      alt="avt"
                    />
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">
                      {{ $users->hoTen }}
                    </p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div
                  class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                  aria-labelledby="profileDropdown"
                >
                  <h6 class="p-3 mb-0 text-center">Chức Năng</h6>
                  <div class="dropdown-divider"></div>

                  <a
                    class="dropdown-item preview-item"
                    href="{{ route('auth.logout') }}"
                  >
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Đăng Xuất</p>
                    </div>
                  </a>
                </div>
              </li>
            </ul>
            <button
              class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
              type="button"
              data-toggle="offcanvas"
            >
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        
        <!-- partial -->
        <!-- main-panel ends -->
        @include($templateView)
      </div>
      <!-- page-body-wrapper ends -->
    @endif
  </div>
@endsection
