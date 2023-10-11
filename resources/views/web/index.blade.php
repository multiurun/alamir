@extends('web.layout')
@section('title')
الأمير الاخبارية
@endsection
@section('meta-description')
الأمير الاخبارية
@endsection
@section('key-words')
الأمير الاخبارية
@endsection
@section('main')



<!-- Category News Start-->
<div class="cat-news">
    <div class="container">
        <div class="row">
             @foreach($categories as $category)
             @if(count($category->posts) >0)
            <div class="col-md-6">
                <h2>{{$category->title}}</h2>
                <div class="row cn-sliderr">
                    @foreach($category->posts as $post)
                    <div class="col-md-6">
                        @if($post->image!=null && $post->video!=null)
                        <div class="cn-img">
                            <video controls style=" width:100%; height: 170px;" >
                                <source src='{{asset("$post->video")}}' type="video/ogg" >
                            </video>
                            <div class="cn-title">
                                <a href="{{url("/post/$post->id/$post->title_slug")}}">{{$post->title}}</a>
                            </div>
                        </div>
                        @elseif($post->image!=null && $post->video==null)
                        <div class="cn-img">
                            <img src="{{asset("$post->image")}}" style=" width:100%; height: 170px;"  alt="{{$post->meta_description}}" />
                            <div class="cn-title">
                                <a href="{{url("/post/$post->id/$post->title_slug")}}">{{$post->title}}</a>
                            </div>
                        </div>
                        @elseif($post->image==null && $post->video!=null)

                        <div class="cn-img">
                            <video controls style=" width:100%; height: 170px;">
                                <source src='{{asset("$post->video")}}' type="video/ogg"  >
                            </video>
                            <div class="cn-title">
                                <a href="{{url("/post/$post->id/$post->title_slug")}}">{{$post->title}}</a>
                            </div>
                        </div>
                        @endif

                    </div>
                    @endforeach
                    
                </div>
            </div>
             @endif
             @endforeach
            
        </div>
    </div>
</div>
<!-- Category News End-->




@endsection