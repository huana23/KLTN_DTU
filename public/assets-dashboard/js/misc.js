(function($) {
  'use strict';
  $(function() {
    var body = $('body');
    var contentWrapper = $('.content-wrapper');
    var scroller = $('.container-scroller');
    var footer = $('.footer');
    var sidebar = $('.sidebar');

    //Add active class to nav-link based on url dynamically
    //Active class can be hard coded directly in html file also as required

    function addActiveClass(element) {
      var currentURL = window.location.href;
      const navItems = document.querySelectorAll('.nav-item-li');
      
      // Xóa lớp 'active' khỏi tất cả các nav-item
      navItems.forEach(function(item) {
          item.classList.remove('active');
      });
  
      // Kiểm tra nếu URL trùng khớp với data-template, thêm lớp 'active'
      navItems.forEach(function(item) {
          var menuItems = item.querySelectorAll('.nav-link');  // Đảm bảo chọn đúng các nav-link trong mỗi nav-item
  
          menuItems.forEach(function(link) {
              var template = link.getAttribute('data-template'); // Lấy giá trị của thuộc tính 'data-template'
  
              // Kiểm tra xem URL hiện tại có chứa template này không
              if (currentURL.indexOf(template) !== -1) {
                  // Nếu có, thêm lớp 'active' vào nav-item chứa liên kết này
                  link.closest('.nav-item').classList.add('active');
              }
          });
      });
  
      // Đảm bảo mục đầu tiên luôn có lớp 'active' nếu không có mục nào được chọn
      if (![...navItems].some(item => item.classList.contains('active'))) {
          navItems[0].classList.add('active');
      }
  
      // Thêm sự kiện click vào các nav-item để đổi active khi nhấp
      navItems.forEach(function(item) {
          item.addEventListener('click', function() {
              // Xóa lớp 'active' khỏi tất cả các nav-item
              navItems.forEach(function(item) {
                  item.classList.remove('active');
              });
              // Thêm lớp 'active' vào mục nav-item được nhấp
              item.classList.add('active');
          });
      });
  }
  
  

    var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
    $('.nav li a', sidebar).each(function() {
      var $this = $(this);
      addActiveClass($this);
    })

    $('.horizontal-menu .nav li a').each(function() {
      var $this = $(this);
      addActiveClass($this);
    })

    //Close other submenu in sidebar on opening any

    sidebar.on('show.bs.collapse', '.collapse', function() {
      sidebar.find('.collapse.show').collapse('hide');
    });


    //Change sidebar and content-wrapper height
    applyStyles();

    function applyStyles() {
      //Applying perfect scrollbar
      if (!body.hasClass("rtl")) {
        if ($('.settings-panel .tab-content .tab-pane.scroll-wrapper').length) {
          const settingsPanelScroll = new PerfectScrollbar('.settings-panel .tab-content .tab-pane.scroll-wrapper');
        }
        if ($('.chats').length) {
          const chatsScroll = new PerfectScrollbar('.chats');
        }
        if (body.hasClass("sidebar-fixed")) {
          var fixedSidebarScroll = new PerfectScrollbar('#sidebar .nav');
        }
      }
    }

    $('[data-toggle="minimize"]').on("click", function() {
      if ((body.hasClass('sidebar-toggle-display')) || (body.hasClass('sidebar-absolute'))) {
        body.toggleClass('sidebar-hidden');
      } else {
        body.toggleClass('sidebar-icon-only');
      }
    });

    //checkbox and radios
    $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');

    //fullscreen
    $("#fullscreen-button").on("click", function toggleFullScreen() {
      if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
          document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
          document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
          document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (document.documentElement.msRequestFullscreen) {
          document.documentElement.msRequestFullscreen();
        }
      } else {
        if (document.cancelFullScreen) {
          document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
          document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        }
      }
    })
  });
})(jQuery);



