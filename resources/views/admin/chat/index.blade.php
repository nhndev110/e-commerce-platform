@extends('admin.layouts.main')

@section('title', 'Chat')

@push('styles')
  <style>
    .contacts-list-img {
      border-radius: 50%;
      width: 40px;
      height: 40px;
    }

    .contacts-list-info {
      color: #495057;
    }

    .contacts-list-name {
      font-weight: 600;
    }

    .contacts-list-msg {
      color: #6c757d;
    }

    .contact-item {
      cursor: pointer;
      transition: background-color 0.2s;
    }

    .contact-item:hover,
    .contact-item.active {
      background-color: #f4f6f9;
    }

    .chat-panel {
      height: 600px;
    }

    .direct-chat-messages {
      height: 100%;
      min-height: 400px;
    }
  </style>
@endpush

@section('main')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tin nhắn</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active">Tin nhắn</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- Chat List (Left Column) -->
        <div class="col-md-4">
          <div class="card card-outline card-primary chat-panel">
            <div class="card-header">
              <h3 class="card-title">Hộp thư</h3>
              <div class="card-tools">
                <span title="3 New Messages" class="badge badge-primary">3</span>
              </div>
            </div>
            <div class="card-body p-0" style="overflow-y: auto;">
              <ul class="contacts-list">
                <li class="p-2 contact-item active border-bottom">
                  <a href="#">
                    <img class="contacts-list-img" src="{{ asset('admin/images/user1-128x128.jpg') }}" alt="User Avatar"
                      onerror="this.src='https://ui-avatars.com/api/?name=User+1'">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Nguyễn Văn A
                        <small class="contacts-list-date float-right">2/28/2026</small>
                      </span>
                      <span class="contacts-list-msg">Sản phẩm này còn hàng không shop?</span>
                    </div>
                  </a>
                </li>
                <li class="p-2 contact-item border-bottom">
                  <a href="#">
                    <img class="contacts-list-img" src="{{ asset('admin/images/user8-128x128.jpg') }}" alt="User Avatar"
                      onerror="this.src='https://ui-avatars.com/api/?name=User+2'">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Trần Thị B
                        <small class="contacts-list-date float-right">2/23/2026</small>
                      </span>
                      <span class="contacts-list-msg">Cho mình hỏi về chính sách bảo hành...</span>
                    </div>
                  </a>
                </li>
                <li class="p-2 contact-item border-bottom">
                  <a href="#">
                    <img class="contacts-list-img" src="{{ asset('admin/images/user3-128x128.jpg') }}" alt="User Avatar"
                      onerror="this.src='https://ui-avatars.com/api/?name=User+3'">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Lê Văn C
                        <small class="contacts-list-date float-right">2/20/2026</small>
                      </span>
                      <span class="contacts-list-msg">Đã nhận được hàng, rất đẹp!</span>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Direct Chat (Right Column) -->
        <div class="col-md-8">
          <div class="card direct-chat direct-chat-primary chat-panel d-flex flex-column">
            <div class="card-header">
              <h3 class="card-title">Nguyễn Văn A</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                  <i class="fas fa-comments"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body flex-grow-1">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-left">Nguyễn Văn A</span>
                    <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="{{ asset('admin/images/user1-128x128.jpg') }}"
                    alt="message user image" onerror="this.src='https://ui-avatars.com/api/?name=User+1'">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    Dạ shop cho em hỏi, sản phẩm này còn màu đen không ạ? Em tìm mà không thấy trên web.
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->

                <!-- Message to the right -->
                <div class="direct-chat-msg right">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-right">Quản trị viên (Bạn)</span>
                    <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="{{ asset('admin/images/user2-160x160.jpg') }}"
                    alt="message user image" onerror="this.src='https://ui-avatars.com/api/?name=Admin'">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    Chào bạn, mẫu này bên mình vừa về thêm màu đen nhé. Bạn có thể tiến hành đặt hàng nha.
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->

                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-left">Nguyễn Văn A</span>
                    <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                  </div>
                  <!-- /.direct-chat-infos -->
                  <img class="direct-chat-img" src="{{ asset('admin/images/user1-128x128.jpg') }}"
                    alt="message user image" onerror="this.src='https://ui-avatars.com/api/?name=User+1'">
                  <!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    Dạ vâng, để em đặt ngay ạ.
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <!-- /.direct-chat-msg -->

              </div>
              <!--/.direct-chat-messages-->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <form action="#" method="post">
                <div class="input-group">
                  <input type="text" name="message" placeholder="Nhập tin nhắn..." class="form-control">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-primary">Gửi</button>
                  </span>
                </div>
              </form>
            </div>
            <!-- /.card-footer-->
          </div>
          <!--/.direct-chat -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@push('scripts')
  <script>
    $(function() {
      // Cuộn xuống cuối khung chat tự động
      var chatMessages = $('.direct-chat-messages');
      if (chatMessages.length > 0) {
        chatMessages.scrollTop(chatMessages[0].scrollHeight);
      }
    });
  </script>
@endpush
