<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
  <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

          <li class="nav-item active"><a href="{{ route('admin.dashboard') }}"><i class="la la-home"></i><span
              class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
          </li>
          <li class="nav-item active"><a href=""><i class="la la-truck"></i>
              <span class="menu-title" data-i18n="nav.dash.main">المعدات</span>
              <span
                  class="badge badge badge-success badge-pill float-right mr-2">2</span>
            </a>
              <ul class="menu-content">
                  <li class=""><a class="menu-item" href="{{ route('admin.index.cards') }}" data-i18n="nav.dash.ecommerce"> عرض كل المعدات </a>
                  </li>
                  <li class=""><a class="menu-item" href="{{ route('admin.create.cards') }}" data-i18n="nav.dash.ecommerce">إضافة معدة</a>
                  </li>
              </ul>
          </li>
      </ul>
  </div>
</div>
