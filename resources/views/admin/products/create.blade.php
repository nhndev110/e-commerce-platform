@extends('admin.layouts.main')

@section('title', 'Thêm sản phẩm mới')

@push('styles')
  {{-- <link rel="stylesheet" href="{{ asset('admin/css/products/create.css') }}"> --}}
@endpush

@push('scripts')
  {{-- <script type="module" src="{{ asset('admin/js/products/create.js') }}"></script> --}}
@endpush

@section('main')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Thêm sản phẩm mới</h1>
        </div>
        <div class="col-sm-6">
          <div class="float-sm-right"></div>
        </div>
      </div>
    </div>
  </section>
  <div class="content">
    <div class="container-fluid">
      <form id="form-create-product" class="needs-validation" action="{{ route('admin.products.store') }}" method="POST"
        enctype="multipart/form-data" novalidate>
        <div class="row">
          <div class="col-12 col-lg-8">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title m-0">Thông tin sản phẩm</h2>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool bg-light" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group row justify-content-around align-items-center">
                  <div class="text-center">
                    <label for="productThumbnail" class="btn btn-secondary">
                      <i class="fas fa-upload"></i>
                      <span class="ml-1">Chọn ảnh bìa</span>
                    </label>
                    <p class="text-muted m-0">Dụng lượng file tối đa 1 MB</p>
                    <p class="text-muted m-0">Định dạng:.JPEG, .PNG</p>
                    <input type="file" id="productThumbnail" name="productThumbnail" class="d-none form-control"
                      onchange="document.getElementById('previewProductThumbnail').src = window.URL.createObjectURL(this.files[0])" />
                  </div>
                  <img src="https://placehold.co/200" id="previewProductThumbnail" class="border border-dark rounded"
                    style="object-fit: cover; height: 150px; width: 150px;" />
                </div>

                <div class="form-group row align-items-start">
                  <label for="productName" class="col-2 col-form-label text-right required-field text-nowrap">Tên sản
                    phẩm</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="productName" name="productName"
                      placeholder="Nhập tên sản phẩm" autocomplete="off" />
                  </div>
                </div>

                <div class="form-group row align-items-start">
                  <label for="productPrice" class="col-2 col-form-label text-right required-field">Giá</label>
                  <div class="col-10">
                    <input type="text" class="form-control number-separator text-left" id="productPrice"
                      name="productPrice" placeholder="Nhập giá" autocomplete="off" />
                  </div>
                </div>

                <div class="form-group row align-items-start">
                  <label for="productDescription" class="col-sm-2 col-form-label text-right required-field">Mô tả</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="productDescription" name="productDescription" placeholder="Nhập mô tả sản phẩm"
                      rows="6"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-lg-4">
            <div class="card">
              <div class="card-header">
                <h2 class="m-0 card-title">Thiết lập sản phẩm</h2>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool bg-light" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="category">Danh mục</label>
                  <select class="custom-select select2" id="category" name="category">
                    <option value="" selected>---- Chọn danh mục ----</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="brand">Nhãn hàng</label>
                  <select class="custom-select select2" name="brand" id="brand">
                    <option value="" selected>---- Chọn nhãn hàng ----</option>
                    @foreach ($brands as $brand)
                      <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Trạng thái hiển thị</label>
                  <div class="btn-group-toggle" data-toggle="buttons">
                    <label class="d-block btn btn-outline-secondary mb-2 text-left active">
                      <input type="radio" name="productVisibility" id="option_a1" value="1" autocomplete="off"
                        checked />
                      <i class="far fa-eye"></i>
                      <span class="ml-2">Công khai</span>
                    </label>
                    <label class="d-block btn btn-outline-secondary mb-2 text-left">
                      <input type="radio" name="productVisibility" id="option_a3" value="-1"
                        autocomplete="off" />
                      <i class="far fa-eye-slash"></i>
                      <span class="ml-2">Ẩn</span>
                    </label>
                    <label class="d-block btn btn-outline-secondary mb-2 text-left">
                      <input type="radio" name="productVisibility" id="option_a3" value="-1"
                        autocomplete="off" />
                      <i class="far fa-clock"></i>
                      <span class="ml-2">Đặt trước</span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-8 pb-3">
            <div class="text-right">
              <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>
                <span class="ml-1">Trở về</span>
              </a>
              <button class="btn btn-primary ml-1" type="submit">
                <i class="fas fa-save"></i>
                <span class="ml-1">Lưu</span>
              </button>
            </div>
          </div>
        </div>
      </form>

      <div class="card">
        <div class="card-header">
          <h2 class="card-title m-0">Phương tiện</h2>
          <div class="card-tools">
            <button class="btn bg-light btn-tool" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-plus"></i>
              <span class="ml-1">Thêm hình ảnh</span>
            </button>
            <button class="btn bg-light btn-tool" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-plus"></i>
              <span class="ml-1">Thêm video</span>
            </button>
            @include('admin.products.upload-file')
            <button class="btn btn-tool bg-light" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          {{-- <p class="m-0 text-muted text-center">Bạn chưa thêm hình ảnh nào</p> --}}
          <h3 class="mb-4 h5">Danh sách ảnh</h3>
          <div class="d-flex flex-wrap">
            @for ($i = 1; $i <= 9; $i++)
              <div class="card rounded overflow-hidden" style="margin-right: 12px;">
                <div class="card-body p-0">
                  <img src="https://placehold.co/600x400" class="card-img-top" alt="Hình ảnh"
                    style="object-fit: cover; height: 100px; width: 100px;" />
                </div>
                <div class="card-footer bg-white p-0 d-flex justify-content-center">
                  <button class="btn btn-sm preview-btn">
                    <i class="fas fa-expand"></i>
                  </button>
                  <button class="btn btn-sm delete-btn">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </div>
            @endfor
          </div>

          <h3 class="mb-4 h5">Video</h3>
          <div class="d-flex">
            <div class="card rounded overflow-hidden">
              <div class="card-body p-0">
                <video controls style="object-fit: cover; height: 100px; width: 100px;">
                  <source src="movie.mp4" type="video/mp4" />
                </video>
              </div>
              <div class="card-footer bg-white p-0 d-flex justify-content-center">
                <button class="btn btn-sm preview-btn">
                  <i class="fas fa-expand"></i>
                </button>
                <button class="btn btn-sm delete-btn">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h2 class="card-title m-0">Thông tin bán hàng</h2>
          <div class="card-tools">
            <button class="btn bg-light btn-tool" data-toggle="modal" data-target="#addCategoryGroupModal">
              <i class="fas fa-plus"></i>
              <span class="ml-1">Thêm nhóm phân loại</span>
            </button>
            <button type="button" class="btn bg-light btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="category-group mb-3 bg-light rounded p-4">
            <div class="row">
              <div class="col-md-4">
                <p class="h5 mb-2">Màu sắc</p>
                <button class="btn btn-primary btn-sm d-block mb-2">
                  <i class="fas fa-plus"></i>
                  <span class="ml-1">Thêm thuộc tính</span>
                </button>
                <button class="btn btn-danger btn-sm d-block mb-2">
                  <i class="fas fa-trash"></i>
                  <span class="ml-1">Xóa nhóm</span>
                </button>
              </div>
              <div class="col-md-8">
                <div class="d-flex flex-wrap">
                  <span class="badge badge-info position-relative mr-4 mb-4 px-4 py-2" style="font-size: 0.9rem;">
                    Đỏ
                    <a href=""
                      class="badge badge-pill badge-danger p-2 position-absolute top-0 start-100 translate-middle"
                      aria-label="Close">
                      <i class="fas fa-times"></i>
                    </a>
                  </span>
                  <span class="badge badge-info position-relative mr-4 mb-4 px-4 py-2" style="font-size: 0.9rem;">
                    Xanh
                    <a href=""
                      class="badge badge-pill badge-danger p-2 position-absolute top-0 start-100 translate-middle"
                      aria-label="Close">
                      <i class="fas fa-times"></i>
                    </a>
                  </span>
                  <span class="badge badge-info position-relative mr-4 mb-4 px-4 py-2" style="font-size: 0.9rem;">
                    Vàng
                    <a href=""
                      class="badge badge-pill badge-danger p-2 position-absolute top-0 start-100 translate-middle"
                      aria-label="Close">
                      <i class="fas fa-times"></i>
                    </a>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <a href="" class="btn btn-secondary btn-sm">
            Danh sách nhóm phân loại
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
