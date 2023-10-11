@extends('web.layout')
@section('title')
{{$category->title}}|الأمير الاخبارية
@endsection
@section('meta-description')
{{$category->title}}|الأمير الاخبارية
@endsection
@section('key-words')
 {{$category->title}}|الأمير الاخبارية
@endsection
@section('main')



<!-- News With Sidebar Start -->
<div class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title" style="  margin-bottom: 30px;padding: 15px;
                            border: 1px solid #dee2e6 ; border-left:7px solid #FF6F61; border-right:7px solid #FF6F61; ">
                            <h4 class="m-0 text-uppercase font-weight-bold">{{$category->title}}:</h4>
                        </div>
                    </div>
                    @foreach($posts as $post)
                    <div class="col-lg-6"  >
                        <div class="position-relative mb-3">
                            @if($post->image!=null && $post->video!=null)
                            <video controls class=" w-100"  style="object-fit: cover; height: 300px;" >
                                <source src='{{asset("$post->video")}}' type="video/ogg" >
                            </video>
                            @elseif($post->image!=null && $post->video==null)
                            <img class=" w-100" src="{{asset("$post->image")}}" style="object-fit: cover; height: 300px;">
                            @elseif($post->image==null && $post->video!=null)
                            <video controls class=" w-100"  style="object-fit: cover; height: 300px;" >
                                <source src='{{asset("$post->video")}}' type="video/ogg" >
                            </video>
                            @endif
                            <div class="bg-white border border-top-0 p-4">
                                <div class="mb-2">
                                    <a class="text-body" href="{{url("/post/$post->id/$post->title_slug")}}"><small>{{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('l j F Y ') }}</small></a>
                                </div>
                                <a class="h6 d-block mb-0 text-secondary text-uppercase font-weight-bold" href="{{url("/post/$post->id/$post->title_slug")}}">{{$post->title}}</a>
                            </div>
                           
                        </div>
                    </div>
                    @endforeach
                    
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
                            @foreach($category->posts->take(5) as $postCat)
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

{{$posts->links('web.pagination.paginator')}}
<!-- News With Sidebar End -->


@endsection