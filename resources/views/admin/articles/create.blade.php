@extends('admin.layouts.main')

@section('title', 'Tạo Bài Viết')

@section('Styles')
  <link rel="stylesheet" href="{{ asset('admin/plugins/ckeditor5/ckeditor5.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin/css/articles/create.css') }}" />
  <style>
    .editable:empty:not(:focus)::before {
      content: attr(data-ph) !important;
      color: grey !important;
    }
  </style>
@endsection

@section('Scripts')
  <script type="importmap">
		{
			"imports": {
				"ckeditor5": "{{ asset('admin/plugins/ckeditor5/ckeditor5.js') }}",
				"ckeditor5/config": "{{ asset('admin/js/ckeditor.config.js') }}",
				"ckeditor5/": "{{ asset('admin/plugins/ckeditor5') }}/"
			}
		}
  </script>
  {{-- <script type="module" src="{{ asset('admin/js/toast.config.js') }}"></script> --}}
  {{-- <script type="module" src="{{ asset('admin/js/articles/create.js') }}"></script> --}}
  <script type="module">
    import {
      editorConfig,
      ClassicEditor,
    } from 'ckeditor5/config';

    ClassicEditor.create(document.querySelector('#articleContent'), editorConfig)
      .then(editor => editor)
      .catch(error => console.error(error));
  </script>
@endsection

@section('main')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tạo Bài Viết</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <form action="{{ route('admin.articles.store') }}" id="createArticleForm" method="post">
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-lg-8">
              <div class="card">
                <div class="card-header">
                  <h5 class="m-0">Thông Tin Bài Viết</h5>
                </div>
                <div class="card-body">
                  <div class="row justify-content-around align-items-center">
                    <div class="text-center">
                      <label for="articleThumbnail" class="btn btn-secondary">
                        <i class="fas fa-upload"></i>
                        <span class="ml-1">Chọn ảnh bìa</span>
                      </label>
                      <p class="text-muted m-0">
                        Dụng lượng file tối đa 1 MB<br>
                        Định dạng:.JPEG, .PNG
                      </p>
                      <input type="file" id="articleThumbnail" name="articleThumbnail" class="d-none form-control"
                        onchange="document.getElementById('previewArticleThumbnail').src = window.URL.createObjectURL(this.files[0])" />
                    </div>
                    <img src="https://placehold.co/200" id="previewArticleThumbnail" class="border border-dark rounded"
                      style="object-fit: cover; height: 150px; width: 250px;" />
                  </div>

                  <div class="form-group">
                    <label for="articleTitle" class="required-field">Tiêu đề</label>
                    <input id="articleTitle" name="articleTitle" class="form-control form-control-border"
                      placeholder="Nhập tiêu đề..." autocomplete="off" />
                  </div>

                  <div class="form-group">
                    <label for="articleDesc" class="required-field">Mô tả</label>
                    <textarea class="form-control form-control-border" name="articleDesc" id="articleDesc" placeholder="Nhập mô tả..."
                      style="resize: vertical;"></textarea>
                  </div>

                  <div class="form-group">
                    <label class="required-field">Nội dung</label>
                    <textarea id="articleContent" name="articleContent"></textarea>
                  </div>

                </div>
              </div>
              <div class="d-flex justify-content-end mb-4">
                <button type="button" class="btn btn-secondary font-weight-bold mr-2" id="btn-save-draft">
                  Lưu nháp
                </button>
                <button type="submit" class="btn-publish-article btn btn-primary font-weight-bold">
                  Lưu
                </button>
              </div>
            </div>
            <div class="col-12 col-lg-4">
              <div class="card">
                <div class="card-header">
                  <h5 class="m-0">Phân loại</h5>
                </div>
                <div class="card-body">

                  <div class="form-group">
                    <label for="articleCategory" class="required-field">Danh mục</label>
                    <select name="articleCategory" class="form-control border select2" id="articleCategory">
                      <option value="0" selected>----- Chọn danh mục -----</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="articleTags" class="required-field">Tags</label>
                    <select id="articleTags" name="articleTags" multiple="multiple"
                      class="form-control border select2-tags">
                      @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label class="required-field">Trạng thái hiển thị</label>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                      <label class="custom-control-label font-weight-normal d-block" for="customRadio1"
                        style="cursor: pointer">Ẩn</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" checked />
                      <label class="custom-control-label font-weight-normal d-block" for="customRadio2"
                        style="cursor: pointer">Hiển thị</label>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </form>
  </section>
@endsection
