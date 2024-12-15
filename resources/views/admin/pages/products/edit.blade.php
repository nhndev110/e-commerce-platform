@extends('admin.layouts.admin')

@section('title', 'Edit Product')

@section('css')
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/ckeditor5/ckeditor5.css') }}">
  <link rel="stylesheet"
    href="{{ asset('assets/admin/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/dropzone/dropzone.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/admin/css/pages/products/create.css') }}">
  <style>
    .ck-editor__editable {
      min-height: 300px;
    }
  </style>
@endsection

@section('js')
  <script src="{{ asset('assets/admin/plugins/overlayScrollbars/js/OverlayScrollbars.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/dropzone/dropzone.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/moment/moment-with-locales.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/sortable/Sortable.min.js') }}"></script>
  <script src="{{ asset('assets/admin/plugins/sortable/jquery-sortable.min.js') }}"></script>
  <script type="module" src="{{ asset('assets/admin/js/pages/products/create.js') }}"></script>
  <script>
    Dropzone.options.productImages = {
      init: function() {
        const productImages = this;

        const productImagesFile = [{!! "'{$product->images->pluck('image')->implode("','")}'" !!}];

        const callback = null; // Optional callback when it's done
        const crossOrigin = null; // Added to the `img` tag for crossOrigin handling
        const resizeThumbnail = false; // Tells Dropzone whether it should resize the image first
        productImagesFile.forEach((el) => {
          const mockFile = {
            name: el,
          };

          productImages.files.push(mockFile);
          productImages.displayExistingFile(
            mockFile,
            `/storage/articles/${el}`,
            callback,
            crossOrigin,
            resizeThumbnail
          );
        });
      }
    };
  </script>
@endsection

@section('main')
  <div class="content">
    <div class="container-fluid">
      <form id="form-create-product" class="needs-validation" action="{{ route('admin.products.store') }}" method="POST"
        enctype="multipart/form-data" novalidate>
        <div class="row">
          <div class="col-12 col-lg-8">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Product Infomation</h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="productName">Name</label>
                  <input type="text" value="{{ $product->name }}" class="form-control" id="productName"
                    name="productName" placeholder="Enter product name">
                </div>

                <div class="form-group">
                  <label for="productSlug">Slug</label>
                  <input type="text" value="{{ $product->slug }}" class="form-control" id="productSlug"
                    name="productSlug" readonly>
                </div>

                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label for="productPrice">Price</label>
                      <input type="number" value="{{ $product->price }}" class="form-control" id="productPrice"
                        name="productPrice" placeholder="Enter price">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="productDiscount">Discount (%)</label>
                      <input type="number" value="{{ $product->discount }}" class="form-control" id="productDiscount"
                        name="productDiscount" placeholder="Enter discount">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="productDiscountPrice">Discount Price</label>
                      <input readonly type="number" class="form-control" name="productDiscountPrice"
                        id="productDiscountPrice">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="productDescription">Description</label>
                  <textarea class="form-control" id="productDescription" name="productDescription" placeholder="Enter product description"
                    rows="6">{{ $product->description }}</textarea>
                </div>
              </div>
            </div>
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Product Images</h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-5">
                    <div class="actions">
                      <div class="dropzone border-0 bg-light fileinput-button" id="productImages">
                        <div class="dz-message" data-dz-message>
                          <i class="mr-2 fas fa-upload"></i>
                          <span>Drop your files here</span>
                        </div>
                        <div class="fallback">
                          <input name="file" type="file" multiple />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-7">
                    <div id="previews">
                      <div id="template">
                        <div class="row align-items-center mb-3">
                          <div class="col-1">
                            <button class="btn btn-default btn-sm handle mb-2" type="button">
                              <i class="fas fa-arrows-alt" aria-hidden="true"></i>
                            </button>
                            <button data-dz-remove class="btn btn-default btn-sm delete" type="button">
                              <i class="fas fa-trash"></i>
                            </button>
                          </div>
                          <div class="col-11">
                            <div class="row ml-2">
                              <div class="col-3">
                                <span class="preview">
                                  <img class="w-100" data-dz-thumbnail />
                                </span>
                              </div>
                              <div class="col-9">
                                <div class="dz-filename">
                                  <span data-dz-name></span>
                                </div>
                                <div class="d-flex align-items-center">
                                  <div class="custom-control custom-switch mr-3">
                                    <input type="checkbox" class="custom-control-input" name="setImageHidden"
                                      id="setImageHidden">
                                    <label class="custom-control-label font-weight-normal" for="setImageHidden">
                                      Set hidden
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="setThumbnail"
                                      id="setThumbnail">
                                    <label class="form-check-label" for="setThumbnail">
                                      Set thumbnail
                                    </label>
                                  </div>
                                </div>
                                <strong class="error text-danger" data-dz-errormessage></strong>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Variants</h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
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
                        <input type="number" id="productAttributeStock" name="productAttributeStock"
                          class="form-control" placeholder="Enter value" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button id="btn-add-attribute" class="btn btn-primary btn-sm" type="button">
                  <i class="fas fa-plus"></i>
                  <span class="ml-2">Add another option</span>
                </button>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-4">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0 card-title">Organize</h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="category">Category</label>
                  <select class="custom-select select2bs4" id="category" name="category">
                    <option value="" selected>---- Select Category ----</option>
                    @foreach ($categories as $category)
                      @if ($category->id === $product->category->id)
                        <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                      @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="supplier">Supplier</label>
                  <select class="custom-select select2bs4" name="supplier" id="supplier">
                    <option value="" selected>---- Select Supplier ----</option>
                    @foreach ($suppliers as $supplier)
                      @if ($supplier->id === $product->supplier->id)
                        <option selected value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                      @else
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="brand">Brand</label>
                  <select class="custom-select select2bs4" name="brand" id="brand">
                    <option value="" selected>---- Select Brand ----</option>
                    @foreach ($brands as $brand)
                      @if ($brand->id === $product->brand->id)
                        <option selected value="{{ $brand->id }}">{{ $brand->name }}</option>
                      @else
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Visibility</label>
                  <div class="form-check">
                    <input checked type="radio" name="productVisibility" id="productVisibilityPushlished"
                      class="form-check-input" value="1">
                    <label for="productVisibilityPushlished" class="form-check-label">Pushlished</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" name="productVisibility" id="productVisibilityScheduled"
                      class="form-check-input" value="0">
                    <label for="productVisibilityScheduled" class="form-check-label">Scheduled</label>
                  </div>
                  <div class="form-check">
                    <input type="radio" name="productVisibility" id="productVisibilityHidden"
                      class="form-check-input" value="-1">
                    <label for="productVisibilityHidden" class="form-check-label">Hidden</label>
                  </div>
                  <div class="scheduled-input form-group mt-3" style="display: none">
                    <div class="input-group datetimepicker date">
                      <input type="text" class="form-control" name="scheduled" />
                      <div class="input-group-addon input-group-append">
                        <div class="input-group-text">
                          <i class="fa fa-calendar"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="text-right py-4">
          <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            <span>Back</span>
          </a>
          <button class="btn btn-primary ml-1" type="submit">
            <i class="fas fa-save"></i>
            <span class="ml-1">Save</span>
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
