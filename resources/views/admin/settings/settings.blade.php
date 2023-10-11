@extends('admin.layout')
@section('active4')
active
@endsection
@section('title')
الأمير| الاقسام
@endsection
@section('meta-description')
الاقسام|الأمير
@endsection
@section('key-words')
الأمير|الاعدادات
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

<div class="col-12 text-end" style=" margin:20px auto;" >
    <a class="btn bg-gradient-dark mb-0" style="width:30%; font-size:large; margin:0px auto;"  href="{{url("dashboard/settings/edit/$settings->id")}}">&nbsp;&nbsp; تعديلات... <i class="fas fa-plus"></i> </a>
 </div>

    <div class=" col-10 card-header pb-0 card" style=' margin:0px auto;  background-image:linear-gradient(310deg, #999999 70%, #ffffff 30%)'>
        <div class="card mb-4">
            <div class="card-header pb-0">
              <h5>  الاعدادات</h5>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table id="example" class="table align-items-center mb-0">
                <!-- <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%"> -->

                  <thead>
                  <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">العنوان</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">الرابط</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  
                      <tr>
                        <td>رقم الهاتف</td>
                        <td>{{$settings->phone}}</td>
                        
                      </tr>
                      <tr>
                        <td>الاميل</td>
                        <td>{{$settings->email}}</td>
                        
                      </tr>
                      <tr>
                        <td>الفيسبوك</td>
                        <td>{{$settings->facebook}}</td>
                        
                      </tr>
                      <tr>
                        <td>تويتر</td>
                        <td>{{$settings->twitter}}</td>
                        
                      </tr>
                      <tr>
                        <td>انستجرام</td>
                        <td>{{$settings->instaram}}</td>
                        
                      </tr>
                      <tr>
                        <td>يوتيوب</td>
                        <td>{{$settings->youtube}}</td>
                        
                      </tr>
                      <tr>
                        <td>لينكد ان</td>
                        <td>{{$settings->linkedin}}</td>
                        
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>

    




@endsection