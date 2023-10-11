@extends('./admin.layout')
@section('active2')
active
@endsection
@section('title')
ألامير|{{$post->meta_title}}
@endsection
@section('meta-description')
{{$post->meta_description}}
@endsection
@section('key-words')
{{$post->key_words}}
@endsection
@section('main')

 
<div class="card h-100 p-3">
   <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" >
      <span class="mask bg-gradient-dark"></span>
      <div class="card-body position-relative z-index-1 p-3 h-100">
      <div class="d-flex flex-column h-100">
         <h5 class="text-white font-weight-bolder mb-4 pt-2" style="font-size:45px; margin:0px auto "> {{$post->title}}  </h5>
         <h5 class="text-white mb-5"  style="font-size:25px; margin:0px auto "> {!!$post->content!!}</h5>
         @if($post->image!=null && $post->video!=null)
         <div style="padding:30px 100px 30px 100px; margin:0px auto "  >
         <img src='{{asset("$post->image")}}'  class="img-fluid" alt="{{$post->title_slug}}" >
         </div>
         <div style="padding:30px 100px 70px 100px; margin:0px auto " alt="{{$post->title_slug}}" >
         <video controls >
            <source src='{{asset("$post->video")}}' type="video/ogg" >.
         </video>  
         </div>
         @elseif($post->image==null && $post->video!=null)
         <div style="padding:30px 100px 70px 100px; margin:0px auto " alt="{{$post->title_slug}}" >
         <video controls>
            <source src='{{asset("$post->video")}}' type="video/ogg" >.
         </video>  
         </div>
         @elseif($post->image!=null && $post->video==null)
         <div style="padding:30px 100px 30px 100px; margin:0px auto "  >
         <img src='{{asset("$post->image")}}'  class="img-fluid" alt="{{$post->title_slug}}" >
         </div>
         @endif

       <h4 class="text-white font-weight-bold ps-1 mb-0 icon-move-left mt-auto" > الكاتب : {{$user->name}}</h4>
      </div>
      </div>
   </div>
</div>

 


    @endsection