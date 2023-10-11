@extends('./admin.layout')
@section('active2')
active
@endsection
@section('title')
الامير الاخبارية
@endsection
@section('meta-description')
الامير الاخبارية
@endsection
@section('key-words')
الامير الاخبارية
@endsection
@section('main')


<div class="col-12 text-end" style=" margin:20px auto;" >
    <a class="btn bg-gradient-dark mb-0" style="width:30%; font-size:large; margin:0px auto;"  href="{{url('dashboard/add/post')}}">&nbsp;&nbsp;اضافة خبر جديد... <i class="fas fa-plus"></i> </a>
 </div> 

    <div class=" col-10 card-header pb-0 card" style=' margin:0px auto;  background-image:linear-gradient(310deg, #999999 70%, #ffffff 30%)'>
        <div class="card mb-4">
            <div class="card-header pb-0">
              <h5> جميع الاخبار</h5>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table id="example" class="table align-items-center mb-0" >
                <!-- <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%"> -->

                  <thead>
                  <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">العنوان</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 "> القسم</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 "> الحالة</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">أجراءات</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($posts as $post)
                      <tr>
                        <td>{{$post->title}}</td>
                        <td> {{$post->category->title}}</td>
                        
                        <td>
                          @if($post->status == 1)
                          <span class="btn btn-dark"  >مفعل</span></td>
                          @elseif($post->status == 0)
                          <span class="btn btn-dark" >غير مفعل</span>
                          @endif
                          
                         
                        </td>
                        
                        <td  >
                        @if($role->role==1 || auth()->user()->id==$post->user_id)
                          <!-- Button trigger modal update -->
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" >
                          <a href="{{url("dashboard/post/show/$post->id/$post->title_slug")}}">عرض</a>
                          </button>
                          <button type="button" class="btn btn-success" data-bs-toggle="modal" >
                          <a href="{{url("dashboard/post/edit/$post->id/$post->title_slug")}}">تعديل</a>
                          </button>
                          <button type="button" class="btn btn-warning" data-bs-toggle="modal" >
                          <a href="{{url("dashboard/post/toggle/$post->id")}}">تفعيل</a>
                          </button>
                          <button type="button" class="btn btn-info" data-bs-toggle="modal" >
                          <a href="{{url("dashboard/post/popular/$post->id")}}">الشائع</a>
                          </button>
                           <!-- Button trigger modal delete -->
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$post->id}}">
                            حذف
                          </button>
                          @else
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" >
                          <a href="{{url("dashboard/post/show/$post->id")}}">عرض</a>
                          </button>
                          @endif              

                        </td>
                      </tr>
                     
                      <!-- delete Modal -->
                      <div class="modal fade" id="delete{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">هل انت متأكد من الحذف</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url('dashboard/post/delete')}}" method="post">
                                                                          
                              @csrf
                                                                        
                                <input id="id" type="hidden" name="id" class="form-control"
                                  value="{{$post->id }}">
                                  <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                                      <button type="submit" class="btn btn-danger">حذف</button>
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

    


@endsection