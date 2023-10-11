
<?php

use App\Models\Post;
use App\Models\Setting;
use App\Models\Category;
$categories=Category::with(['childern'])->whereNull('parent')->orWhere('parent',0)->get();
$posts=Post::with('users','category')->orderBy('id','desc')->limit(5)->get();
$settings= Setting::select('*')->first();
//dd($settings);

?>


<!DOCTYPE html>
<html  lang="ar">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        <meta content="@yield('title')" name="viewport">
        <meta content="@yield('key-words')" name="keywords">
        <meta content="@yield('meta-description')" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{asset("web/lib/slick/slick.css")}}" rel="stylesheet">
        <link href="{{asset("web/lib/slick/slick-theme.css")}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset("web/css/style.css")}}" rel="stylesheet">
        <link href="{{asset("web/css/bootstrap-rtl.css")}}" rel="stylesheet">
       
    </head>
    <body>
    
        <!-- Brand Start -->
        <div class="brand">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="b-ads">
                            <p> {{ \Carbon\Carbon::parse(now())->translatedFormat('l j F Y ') }}</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                    <div class="b-logo">
                        <a href="#">
                            <img src="{{asset("web/img/logo.png")}}" alt="Logo">
                        </a>
                    </div> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="{{url("/")}}" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="{{url("/")}}" class="nav-item nav-link active">الصفحة الرئيسة</a>
                            @foreach($categories as $category)
                            <div class="nav-item dropdown">
                                <a  @if(count($category->childern)>0) href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" @else href="{{url("/category/$category->id/$category->title_slug")}}" class="nav-link" @endif  >{{$category->title}}</a>
                                @if(count($category->childern)>0)
                                <div class="dropdown-menu">
                                    @foreach($category->childern as $child)
                                    <a href="{{url("/category/$child->id/$child->title_slug")}}" class="dropdown-item">{{$child->title}}</a>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        <div class="social ml-auto">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->

        <!-- news slider-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center breaking-posts bg-white">
                        <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-danger py-2 text-white px-1 posts"><span class="d-flex align-items-center">&nbsp;عاجل</span></div>
                        <marquee class="posts-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"> 
                        @foreach($posts as $post)
                        <a href="{{url("/post/$post->id/$post->title_slug")}}"> {{$post->title}} ...</a> 
                        <span class="dot"></span> 
                        @endforeach
                        </marquee>
                    </div>
                </div>
            </div>
        </div>

@yield('main')

        <!-- Footer Start -->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">تواصل معنا  </h3>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>123 News Street, NY, USA</p>
                                <p><i class="fa fa-envelope"></i>{{$settings->email}}</p>
                                <p><i class="fa fa-phone"></i>{{$settings->phone}}</p>
                                <div class="social">
                                    <a href="{{$settings->twitter}}"><i class="fab fa-twitter"></i></a>
                                    <a href="{{$settings->facebook}}"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{$settings->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="{{$settings->instaram}}"><i class="fab fa-instagram"></i></a>
                                    <a href="{{$settings->youtube}}"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                
                    
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-widget">
                            <h3 class="title">اشترك معنا</h3>
                            <div class="newsletter">
                                <div>
                                <p>
                                  اشترك معنا ليصلك ايميل بكل الاخبار الجديدة قم بادخال بريدك الالكتروني هنا
                                </p>
                                    
                                    <input pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" class="form-control text-left" type="email" name="newsletter_subscriber" id="newsletter_subscriber" >
                                    <button class="btn subscribe_btn">اشتراك</button>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
 
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset("web/lib/easing/easing.min.js")}}"></script>
        <script src="{{asset("web/lib/slick/slick.min.js")}}"></script>
        

        <!-- Template Javascript -->
        <script src="{{asset("web/js/main.js")}}"></script>
        <script>
         const subscribe = () => {
            console.log("adsf")

            var newsletter_subscriber =$("input#newsletter_subscriber").val();
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if( regex.test(newsletter_subscriber) == false){
                alert("من فضلك ادخل اميل صحيح");
            }
            $.ajax({
                method:'post', url:'/add-subscriber-email',
                data: { 'newsletter_subscriber': newsletter_subscriber },
                success: (data) => {
                    if(resp== "exists"){
                        alert('هذا الاميل موجود سابقا');
                    }else if(resp== "saved"){
                        alert(' شكرا لاشتراكك معنا');
                    }
                },error: () => { alert('فشل'); }
            });
         }
         $(".newsletter .subscribe_btn").on("click", subscribe);
        </script>
        @yield('script')
    </body>
</html>