@extends('./admin.layout')
@section('active4')
active
@endsection
@section('title')
ألامير|الاعدادات
@endsection
@section('meta-description')
الاعدادات|الامير
@endsection
@section('key-words')
الاعدادات|الامير
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

<form id="myForm" method="post" action="{{url('dashboard/settings/update') }}" enctype="multipart/form-data" >
			@csrf
            <input type="hidden" name='id' value="{{$setting->id}}" >
           

    <div class="container-fluid my-4  ">
      <div class=" col-lg-8 card-header pb-0 card" style=' margin:0px auto;   background-image:linear-gradient(310deg, #999999 50%, #ffffff 50%)'>
              <h6> تعديل الاعدادات  </h6>

        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
        <label> الهاتف </label>
              <div class="input-group">
                <span class="input-group-text text-body">  <i class="fas fa-pen" aria-hidden="true"> </i></span>
                <input type="text" class="form-control" placeholder="العنوان ..." name='phone' value="{{$setting->phone}}" >
              </div>
        </div>
        
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
        <label> الاميل </label>
              <div class="input-group">
                <span class="input-group-text text-body">  <i class="fas fa-pen" aria-hidden="true"> </i></span>
                <input type="text" class="form-control" placeholder="العنوان ..." name='email' value="{{$setting->email}}" >
              </div>
        </div>
        
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
        <label> الفيسبوك </label>
              <div class="input-group">
                <span class="input-group-text text-body">  <i class="fas fa-pen" aria-hidden="true"> </i></span>
                <input type="text" class="form-control" placeholder="العنوان ..." name='facebook' value="{{$setting->facebook}}" >
              </div>
        </div>
        
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
        <label> تويتر </label>
              <div class="input-group">
                <span class="input-group-text text-body">  <i class="fas fa-pen" aria-hidden="true"> </i></span>
                <input type="text" class="form-control" placeholder="العنوان ..." name='twitter' value="{{$setting->twitter}}" >
              </div>
        </div>
        
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
        <label> انستجرام </label>
              <div class="input-group">
                <span class="input-group-text text-body">  <i class="fas fa-pen" aria-hidden="true"> </i></span>
                <input type="text" class="form-control" placeholder="العنوان ..." name='instaram' value="{{$setting->instaram}}" >
              </div>
        </div>
        
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
        <label> يوتيوب </label>
              <div class="input-group">
                <span class="input-group-text text-body">  <i class="fas fa-pen" aria-hidden="true"> </i></span>
                <input type="text" class="form-control" placeholder="العنوان ..." name='youtube' value="{{$setting->youtube}}" >
              </div>
        </div>
        
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
        <label> لينكدان </label>
              <div class="input-group">
                <span class="input-group-text text-body">  <i class="fas fa-pen" aria-hidden="true"> </i></span>
                <input type="text" class="form-control" placeholder="العنوان ..." name='linkedin' value="{{$setting->linkedin}}" >
              </div>
        </div>

        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:30% ; margin:0px auto; padding:10px'>
            <div class="input-group">
            <button type="submit" class="form-control"> تعديل </button>

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