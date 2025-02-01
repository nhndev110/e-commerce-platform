@extends('admin.layouts.main')

@section('title', 'Quản lý sản phẩm')

@section('Styles')
@endsection

@section('Scripts')
  <script type="module" src="{{ asset('admin/js/products/index.js') }}"></script>
@endsection

@section('main')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Quản lý sản phẩm</h1>
        </div>
        <div class="col-sm-6">
          <div class="float-sm-right">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
              <i class="fa fa-plus"></i>
              <span class="ml-1">Tạo mới</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="content">
    <div class="container-fluid">
      <div class="card card-primary card-outline mb-0">
        <div class="card-body px-0 py-4">
          <form action="{{ route('admin.products.index') }}" id="filter-form" method="GET" class="px-4">
            <div class="row align-items-end mb-4">
              <div class="col-3">
                <label for="category">Danh mục</label>
                <select name="category_id" id="category" class="custom-select select2">
                  <option value="">---- Chọn danh mục ----</option>
                  @foreach ($product_categories as $category)
                    <option {{ request()->query('category_id') == $category->id ? 'selected' : '' }}
                      value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-3">
                <label for="brand">Nhãn hàng</label>
                <select name="brand_id" id="brand" class="custom-select select2">
                  <option value="">---- Chọn nhãn hàng ----</option>
                  @foreach ($product_brands as $brand)
                    <option {{ request()->query('brand_id') == $brand->id ? 'selected' : '' }}
                      value="{{ $brand->id }}">
                      {{ $brand->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-1">
                <label for="startPrice">Giá từ:</label>
                <input name="start_price" id="startPrice" value="{{ request()->query('start_price') }}"
                  class="form-control" />
              </div>
              <div class="col-1">
                <label for="endPrice">đến:</label>
                <input name="end_price" id="endPrice" value="{{ request()->query('end_price') }}"
                  class="form-control" />
              </div>
              <div class="col-4 d-flex align-items-center">
                <div class="input-group">
                  <input name="s" value="{{ request()->query('s') }}" autofocus type="search" class="form-control"
                    placeholder="Tìm kiếm tên sản phẩm" />
                  <div class="input-group-append">
                    <button type="submit" class="input-group-text">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
                <div class="flex-grow-1">
                </div>

              </div>
            </div>
          </form>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="thead-light shadow-sm">
                <tr>
                  <th>
                    <input type="checkbox" />
                  </th>
                  <th>Product</th>
                  <th>Stock</th>
                  <th>Price</th>
                  <th>Discount</th>
                  <th>Visibility</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <tr>
                    <td class="align-middle">
                      <input type="checkbox" />
                    </td>
                    <td class="align-middle">
                      <div class="row align-items-center">
                        <div class="col-1">
                          <img src="{{ $product->thumbnail }}" class="rounded w-100">
                        </div>
                        <div class="col-11">
                          <h3 class="h6 mb-0">
                            <a href="">
                              {{ $product->name }}
                            </a>
                          </h3>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle">
                      <div class="d-flex align-items-center">
                        <i class="fas fa-box"></i>
                        <span class="ml-2">{{ $product->total_stock_qty }}</span>
                      </div>
                    </td>
                    <td class="align-middle">
                      <div class="d-flex align-items-center">
                        <i class="fas fa-dollar-sign"></i>
                        <span class="ml-2">{{ $product->price }}</span>
                      </div>
                    </td>
                    <td class="align-middle">{{ $product->discount }}%</td>
                    <td class="align-middle">
                      @if ($product->visibility == 1)
                        <span class="badge badge-success badge-pill px-2">Pushlish</span>
                      @elseif ($product->visibility == 0)
                        <span class="badge badge-warning badge-pill px-2">Scheduled</span>
                      @elseif ($product->visibility == -1)
                        <span class="badge badge-dark badge-pill px-2">Hidden</span>
                      @endif
                    </td>
                    <td class="align-middle text-center">
                      <a href="#" type="button" class="dropdown-toggle text-reset px-3 py-2" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-ellipsis-h"></i>
                      </a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.products.edit', $product->id) }}">
                          <i class="fas fa-edit"></i>
                          <span>Edit</span>
                        </a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="dropdown-item">
                            <i class="far fa-trash-alt"></i>
                            <span>Delete</span>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="px-4">
            {!! $products->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
