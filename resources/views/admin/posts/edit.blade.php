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


@if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

<form id="myForm" method="post" action="{{url('dashboard/post/update') }}" enctype="multipart/form-data" >
			@csrf
            <input type="hidden" name='id' value="{{$post->id}}" >
           <input  type="hidden" name='old_image' value="{{$post->image}}" >
           <input  type="hidden" name='old_video' value="{{$post->video}}" >

    <div class="container-fluid my-4  ">
      <div class=" col-lg-8 card-header pb-0 card" style=' margin:0px auto;   background-image:linear-gradient(310deg, #999999 50%, #ffffff 50%)'>
              <h6> تعديل الخبر  </h6>

        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
        <label> العنوان </label>
              <div class="input-group">
                <span class="input-group-text text-body">  <i class="fas fa-pen" aria-hidden="true"> </i></span>
                <input type="text" class="form-control" placeholder="العنوان ..." name='title' value="{{$post->title}}" >
              </div>
        </div>

        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
        <label> المحتوى </label>
              <div class="input-group">
                <span class="input-group-text text-body">  <i class="fas fa-pen" aria-hidden="true"> </i></span>
                <textarea class="form-control" id="text-content" rows="8" name="content" style="color:#000" value="{{$post->content}}">{!!$post->content!!}</textarea>
              </div>
        </div>

        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
        <label> الاقسام </label>
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-pen" aria-hidden="true"></i></span>
              <select class="form-select form-control" aria-label=".form-select-lg example" style=' margin:0px auto;' name="category_id">
              @foreach ($primerCategories as $primerCategory)
                <option value="{{ $primerCategory->id }}"@if($post->category_id== $primerCategory->id)selected @endif>
                    {{$primerCategory->title}}
                </option>
              @endforeach
                
              </select>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
        <label> الصورة </label>
              <div class="input-group">
                <span class="input-group-text text-body">  <i class="fas fa-pen" aria-hidden="true"> </i></span>
                <input type="file" class="form-control"  name="file_name"  >
              </div>
        </div>
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
        <label> الفيديو  </label>
              <div class="input-group">
                <span class="input-group-text text-body">  <i class="fas fa-pen" aria-hidden="true"> </i></span>
                <input type="file" class="form-control"  name="video"  >
              </div>
        </div>

        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
        <h4> SEO Tags</h4>
             
        </div>

        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
        <label> SEO عنوان </label>
              <div class="input-group">
                <span class="input-group-text text-body">  <i class="fas fa-pen" aria-hidden="true"> </i></span>
                <input type="text" class="form-control" placeholder="SEO ..." name='meta_title' value="{{$post->meta_title}}">
              </div>
        </div>

        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
        <label> SEO وصف </label>
              <div class="input-group">
                <span class="input-group-text text-body">  <i class="fas fa-pen" aria-hidden="true"> </i></span>
                <input type="text" class="form-control" placeholder="SEO ..." name='meta_description' value="{{$post->meta_description}}">
              </div>
        </div>

        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
        <label> الكلمات المفتاحية</label>
              <div class="input-group">
                <span class="input-group-text text-body">  <i class="fas fa-pen" aria-hidden="true"> </i></span>
                <input type="text" class="form-control" placeholder="SEO ..." name='key_words'value="{{$post->key_words}}" >
              </div>
        </div>
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:30% ; margin:0px auto; padding:10px'>
            <div class="input-group">
            <button type="submit" class="form-control"> اضافة الخبر</button>

            </div>

        </div>
          </div>
</form>
      
@endsection

@section('script')

       
<script>
  CKEDITOR.replace('text-content');   
</script>
      
@endsection