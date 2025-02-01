@extends('admin.layouts.main')

@section('title', 'Thêm sản phẩm mới')

@section('css')
  <link rel="stylesheet" href="{{ asset('admin/plugins/ckeditor5/ckeditor5.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/products/create.css') }}">
  <style>
    .ck-editor__editable {
      min-height: 300px;
    }
  </style>
@endsection

@section('js')
  <script src="{{ asset('admin/plugins/dropzone/dropzone.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/moment/moment-with-locales.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/sortable/Sortable.min.js') }}"></script>
  <script src="{{ asset('admin/plugins/sortable/jquery-sortable.min.js') }}"></script>
  <script type="module" src="{{ asset('admin/js/products/create.js') }}"></script>
@endsection

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
                    style="object-fit: cover; height: 150px; width: 250px;" />
                </div>

                <div class="form-group row">
                  <label for="productName" class="col-sm-2 col-form-label text-right">Tên sản phẩm</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="productName" name="productName"
                      placeholder="Nhập tên sản phẩm" autocomplete="off" />
                  </div>
                </div>

                <div class="form-group row">
                  <label for="productPrice" class="col-sm-2 col-form-label text-right">Giá</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="productPrice" name="productPrice"
                      placeholder="Nhập giá" autocomplete="off" />
                  </div>
                </div>

                <div class="form-group row">
                  <label for="productDescription" class="col-sm-2 col-form-label text-right">Mô tả</label>
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
                <h2 class="m-0 card-title">Phân loại</h2>
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
                  <label for="supplier">Nhà cung cấp</label>
                  <select class="custom-select select2" name="supplier" id="supplier">
                    <option value="" selected>---- Chọn nhà cung cấp ----</option>
                    @foreach ($suppliers as $supplier)
                      <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
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
          <h2 class="card-title m-0">Hình ảnh sản phẩm</h2>
          <div class="card-tools">
            <button class="btn bg-light btn-tool" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-plus"></i>
              <span class="ml-1">Thêm hình ảnh</span>
            </button>
            @include('admin.products.upload-file')
            <button class="btn btn-tool bg-light" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <p class="m-0 text-muted text-center">Bạn chưa thêm hình ảnh nào</p>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h2 class="card-title m-0">Phân loại sản phẩm</h2>
          <div class="card-tools">
            <button class="btn bg-light btn-tool" data-toggle="modal" data-target="#exampleModal">
              <i class="fas fa-plus"></i>
              <span class="ml-1">Thêm phân loại</span>
            </button>
            <button type="button" class="btn bg-light btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div id="product-attribute-list">
            <div id="product-attribute-template"
              class="product-attribute row align-items-start justify-content-between">
              <div class="col-1">
                <button class="btn btn-default btn-sm handle mb-2" type="button">
                  <i class="fas fa-arrows-alt" aria-hidden="true"></i>
                </button>
                <button class="btn delete-attribute btn-danger btn-sm" type="button">
                  <i class="fas fa-trash" aria-hidden="true"></i>
                </button>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <label for="productAttributeOption">Options</label>
                  <input id="productAttributeOption" name="productAttributeOption" class="form-control"
                    placeholder="Enter options" />
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="productAttributeValue">Value</label>
                  <input id="productAttributeValue" name="productAttributeValue" class="form-control"
                    placeholder="Enter value" />
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="productAttributeStock">Stock Qty</label>
                  <input type="number" id="productAttributeStock" name="productAttributeStock" class="form-control"
                    placeholder="Enter value" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <button id="btn-add-attribute" class="btn btn-primary btn-sm" type="button">
            <i class="fas fa-plus"></i>
            <span class="ml-2 font-weight-bold">Add another option</span>
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection
