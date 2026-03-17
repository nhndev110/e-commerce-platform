<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="/admin" class="brand-link">
    <img src="{{ asset('admin/images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <div class="sidebar">
    <div class="dropdown user-menu">
      <a href="#" class="nav-link user-panel dropdown-toggle py-2" data-toggle="dropdown">
        <img src="{{ asset('admin/images/user2-160x160.jpg') }}" class="mr-2 img-circle elevation-2" alt="User Image"
          style="object-fit: cover; width: 36px; height: 36px;" />
        <p class="d-none d-md-inline">Alexander Pierce</p>
      </a>
      <div class="dropdown-menu shadow" style="min-width: 240px;">
        <a href="" class="dropdown-item text-dark">
          <i class="fas fa-user mr-2"></i>
          Xem hồ sơ
        </a>
        <div class="dropdown-divider"></div>
        <form method="POST" action="">
          @csrf
          <button type="submit" class="dropdown-item text-danger">
            <i class="fas fa-sign-out-alt mr-2"></i>
            Đăng xuất
          </button>
        </form>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview"
        role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('admin.dashboard.index') }}"
            class="nav-link {{ !request()->is('admin/dashboard') ?: 'active' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>Trang chủ</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#!" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Đơn hàng
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="" class="nav-link">
                <p>Tất Cả</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <p>Giao Hàng Loạt</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <p>Đơn Huỷ</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <p>Trả Hàng/Hoàn Tiền</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <p>Cài Đặt Vận Chuyển</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{ request()->routeIs('admin.products.*') ? 'menu-open' : '' }}">
          <a href="#!" class="nav-link">
            <i class="nav-icon fas fa-shopping-bag"></i>
            <p>
              Sản phẩm
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.products.index') }}"
                class="nav-link {{ request()->routeIs('admin.products.index') ? 'active' : '' }}">
                <p>Quản lý sản phẩm</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.products.create') }}"
                class="nav-link {{ request()->routeIs('admin.products.create') ? 'active' : '' }}">
                <p>Thêm sản phẩm mới</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <p>Quản lý danh mục</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#!" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Chăm sóc khách hàng
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="" class="nav-link">
                <p>Quản lý Chat</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <p>Quản lý Đánh Giá</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#!" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Tài chính
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="" class="nav-link">
                <p>Doanh Thu</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">
                <p>Tài Khoản Ngân Hàng</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>
