@extends('admin.layout')
@section('active1')
active
@endsection
@section('title')
الأمير| الاقسام
@endsection
@section('meta-description')
الاقسام|الأمير
@endsection
@section('key-words')
الأمير|الاقسام
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
    <a class="btn bg-gradient-dark mb-0" style="width:30%; font-size:large; margin:0px auto;"  href="#myForm">&nbsp;&nbsp;اضافة قسم جديد... <i class="fas fa-plus"></i> </a>
 </div> 

    <div class=" col-10 card-header pb-0 card" style=' margin:0px auto;  background-image:linear-gradient(310deg, #999999 70%, #ffffff 30%)'>
        <div class="card mb-4">
            <div class="card-header pb-0">
              <h5> جميع الاقسام</h5>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table id="example" class="table align-items-center mb-0">
                <!-- <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%"> -->

                  <thead>
                  <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">العنوان</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">القسم</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">أجراءات</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($categories as $categorie)
                      <tr>
                        <td>{{$categorie->title}}</td>
                        <td>
                          
                          @if($categorie->parent > 0)
                          {{$categorie->getParent->title?? Null}}
                          @else
                            قسم رئيسي
                          @endif
                        </td>
                        <td>
                        @if($role->role==1)
                          <!-- Button trigger modal update -->
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$categorie->id}}">
                            Edit
                          </button>
                          <!-- Button trigger modal delete -->
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$categorie->id}}">
                            Delete
                          </button>
                          @else
                          <span  class=" alert-lm alert-info" style='font-size:25px ; color:white '>غير مسموح </span>
                          @endif              

                        </td>
                      </tr>
                     
                      <!-- delete Modal -->
                      <div class="modal fade" id="delete{{$categorie->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">هل انت متأكد من الحذف</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url('dashboard/category/delete')}}" method="post">
                                                                          
                              @csrf
                                                                        
                                <input id="id" type="hidden" name="id" class="form-control"
                                  value="{{$categorie->id }}">
                                  <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                                      <button type="submit" class="btn btn-danger">حذف</button>
                                  </div>
                            </form>
                            </div>
                          
                          </div>
                        </div>
                      </div>

                       <!-- update Modal -->
                       <div class="modal fade" id="edit{{$categorie->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"> تعديل هذا القسم </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url("dashboard/category/update")}}" method="post">                                          
                              @csrf                                
                                <input id="id" type="hidden" name="id" class="form-control" value="{{$categorie->id }}">
                                <label for="Name" class="mr-sm-2"> العنوان</label>
                                <div class="form-group col-sm-9 text-secondary">
                                  <input type="text" name="title"  value="{{$categorie->title}}" class="form-control">
                                </div>
                                <div class="col">
                                  <label for="tile" class="mr-sm-2">القسم</label>
                                    <select class="fancyselect" name="parent">
                                     <option selected >اختر القسم ... </option>
                                      <option value="0" @if($categorie->parent == 0 || $categorie->parent == null ) selected @endif >قسم رئيسي</option>
                                        @foreach($categories as $categorie)
                                        
                                          <option value="{{ $categorie->id}}">{{$categorie->title}}</option>
                                         
                                        @endforeach
                                    </select>
                                </div>
                                <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                                      <button type="submit" class="btn btn-primary">تعديل</button>
                                  </div>
                            </form>
                            </div>
                          
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>

    

<form id="myForm" method="post" action="{{url('dashboard/store/category') }}" enctype="multipart/form-data" >
			@csrf
    <div class="container-fluid my-4  ">
      <div class=" col-lg-8 card-header pb-0 card" style=' margin:0px auto;   background-image:linear-gradient(310deg, #999999 50%, #ffffff 50%)'>
              <h6>اضافة قسم جديد</h6>
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
              <div class="input-group">
                <span class="input-group-text text-body">  <i class="fas fa-pen" aria-hidden="true"> </i></span>
                <input type="text" class="form-control" placeholder="العنوان ..." name='title'>
              </div>
        </div>
        <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:100% ; margin:0px auto; padding:10px'>
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-pen" aria-hidden="true"></i></span>
              <select class="form-select form-control" aria-label=".form-select-lg example" style=' margin:0px auto;' name="parent">
                 <option selected value="0">قسم رئيسي</option>
                  @foreach($primerCategories as $category)
                   <option value="{{ $category->id}}">{{$category->title}}</option>
                  @endforeach
              </select>
            </div>
        </div>
            <div class="col-lg-6 col-md-6 mb-md-0 mb-4 " style='width:30% ; margin:0px auto; padding:10px'>
            <div class="input-group">
            @if($role->role==1)
            <button type="submit" class="form-control"> اضافة القسم</button>

                          @else
                          <span  class=" alert alert-info" style='font-size:25px ; color:white '> غير مسموح لك بالاضافة      </span>
                          @endif              



            </div>

            </div>
          </div>
</form>


@endsection