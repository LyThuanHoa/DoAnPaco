<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.parts.head')
</head>
<body>
    <section class="admin">
        <div class="row-grid">
            <div class="admin-sidebar">
            @include('admin.parts.sidebar')
            </div>
            <div class="admin-content">
                <div class="admin-content-top">
                    <div class="admin-content-top-left">
                        <ul class="flex-box">
                            <li><i class="ri-search-line"></i></li>
                            <li> <i class="ri-drag-move-line"></i></li>
                        </ul>
                    </div>
                    <div class="admin-content-top-center">
                        <p class="hiAdmin">Hi Admin chúc bạn một ngày làm việc vui vẻ!</p>
                    </div>
                    
                    <div class="admin-content-top-right">
                        <ul class="flex-box">
                            <li><i class="ri-notification-line" number="2"></i></li>
                            <li><i class="ri-chat-3-line" number="4"></i></li>
                            <li class="flex-box" style="margin-left: 10px;">
                                <img style="width: 45px;" src="{{asset('backend\asset\images\logoPaco.png')}}" alt="">
                                <p>PACO<i class="ri-arrow-drop-down-fill"></i></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="admin-content-main">
                    <div class="admin-content-main-title">
                        <h2>{{isset($title)? $title : 'Dashboard'}}</h2>
                    </div>
                    <div class="admin-content-main-content">
                        @yield('content')
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</body>
<footer>
    @include('admin.parts.footer')
</footer>
</html>