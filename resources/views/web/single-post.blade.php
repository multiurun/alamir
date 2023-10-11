@extends('web.layout')
@section('title')
{{$post->title}}|الأمير الاخبارية
@endsection
@section('meta-description')
{{$post->meta_description}}|الأمير الاخبارية
@endsection
@section('key-words')
{{$post->key_words}}|الأمير الاخبارية 
@endsection
@section('main')


<!-- Breadcrumb Start -->
<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url("/")}}">الصفحة الرئيسية</a></li>
            <li class="breadcrumb-item"><a href="{{url("/category/$post->category->id/$post->category->title_slug")}}">{{$post->category->title}}</a></li>
            <li class="breadcrumb-item active">{{$post->title}}</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Single News Start-->
<div class="single-news">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="sn-container">


                    @if($post->image!=null && $post->video!=null)
                    <div class="sn-img">
                        <video controls style=" height: 700px;" >
                        <source src='{{asset("$post->video")}}' type="video/ogg" >.
                        </video>
                    </div>
                    @elseif($post->image!=null && $post->video==null)
                    <div class="sn-img">
                        <img src="{{asset("$post->image")}}"  style=" height: 700px;" alt="{{$post->title}}"/>
                    </div>
                    @elseif($post->image==null && $post->video!=null)

                    <div class="sn-img">
                    <video controls style=" height: 700px;" >
                        <source src='{{asset("$post->video")}}' type="video/ogg" >.
                        </video>
                    </div>
                    @endif

                    <div class="sn-content">
                        <h3 class="sn-title">{{$post->title}}</h3>
                        <p>
                           {{$post->content}}
                        </p>
                       
                         
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-widget">
                        <h4 class="sw-title" style=" border-bottom: 2px double #000000; padding-bottom:6px;">مشاركةالخبر</h4>
                        <div class="social ml-auto">
                            <a href="https://twitter.com/share?url={{urlencode(url('/post/'.$post->id.'/'.$post->title_slug))}}&text={{urlencode($post->title)}}" ><i class="fab fa-twitter fa-lg" style="font-size:2rem; padding:5px;"></i></a>
                            <a href="https://www.facebook.com/sharer.php?u={{urlencode(url('/post/'.$post->id.'/'.$post->title_slug))}}" ><i class="fab fa-facebook-f fa-lg" style="font-size:2rem; padding:5px;" ></i></a>
                            <a href="https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}" ><i class="fab fa-linkedin-in fa-lg "  style="font-size:2rem; padding:5px;"></i></a>
                            <a href="https://t.me/share?url={{urlencode(url('/post/'.$post->id.'/'.$post->title_slug))}}&text={{urlencode($post->title)}}" ><i class="fab fa-telegram fa-lg" style="font-size:2rem; padding:5px;"></i></a>
                            <a href="https://wa.me/?text={{urlencode(url('/post/'.$post->id.'/'.$post->title_slug) ."\n\n" . $post->title)}} " ><i class="fab fa-whatsapp fa-lg" style="font-size:2rem; padding:5px;"></i></a>
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h4 class="sw-title" style=" border-bottom: 2px double #000000;">اخبار اخري في هذا القسم</h4>
                        <div class="news-list">
                            @foreach($post->category->posts->take(5) as $postCat)
                            <div class="nl-item">
                                
                                <div class="nl-title">
                                    <a href="{{url("/post/$postCat->id/$postCat->title_slug")}}">***{{$postCat->title}}</a>
                                </div>
                            </div>
                            @endforeach
                         
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h4 class="sw-title" style=" border-bottom: 2px double #000000;"> الاخبار الشائعة </h4>
                        <div class="news-list">
                            @foreach($popularPosts as $popularPost)
                            <div class="nl-item">
                                
                                <div class="nl-title">
                                    <a href="{{url("/post/$popularPost->id/$popularPost->title_slug")}}">***{{$popularPost->title}}</a>
                                </div>
                            </div>
                            @endforeach
                         
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Single News End-->
@endsection 
@section('script') 
<script >
const twitterBtn = document.getElementById('twitter-btn');
const facebookBtn = document.getElementById('facebook-btn');
const linkedinBtn = document.getElementById('linkedin-btn');
const instagramBtn = document.getElementById('instagram-btn');
const whatsappBtn = document.getElementById('whatsapp-btn');
let postUrl = encodeURI(document.location.href);
let postTitle = encodeURI('{{$post->title}}');
twitterBtn.setAttribute("href", "https://twitter.com/share?url=${postUrl}&text=${postTitle}");
facebookBtn.setAttribute("href", "https://www.facebook.com/sharer.php?u=${postUrl}");
linkedinBtn.setAttribute("href", "https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}");
instagramBtn.setAttribute("href", "https://mail.google.com/mail/?view=cm&su=${postTitle}&body=${postUrl}");
whatsappBtn.setAttribute("href", "https://wa.me/?text=[postTitle] [postUrl]");


</script>
@endsection
      
