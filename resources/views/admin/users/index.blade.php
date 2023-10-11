@extends('admin.layout')
@section('active3')
active
@endsection
@section('title')
ألامير|المستخدمين
@endsection
@section('meta-description')
الأمير|المستخدمين
@endsection
@section('key-words')
الأمير|المستخدمين
@endsection
@section('main')
    <div class=" col-lg-9 card-header pb-0 card" style=' margin:0px auto;  background-image:linear-gradient(310deg, #999999 70%, #ffffff 30%)'>
        <div class="card mb-4">
            <div class="card-header pb-0">
              <h5> جميع المستخدمين </h5>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                  <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">الإسم </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">الإيميل </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">الحالة</th>
                      <th>العمليات</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                      <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->status}}</td>
                        <td>
                        @if($user->role==0  )
                          <!-- Button trigger modal update -->
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$user->id}}">
                            Edit
                          </button>
                          <!-- Button trigger modal delete -->
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$user->id}}">
                            Delete
                          </button>
                          
                          @elseif( $user->usertype==0)
                             <!-- Button trigger modal update -->
                             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{$user->id}}">
                            Edit
                          </button>
                          <!-- Button trigger modal delete -->
                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$user->id}}">
                            Delete
                          </button>
                          @else
                          <span  class=" alert-lm alert-info" style='font-size:25px ; color:white '>غير مسموح </span>
                          @endif    
                        </td>
                      </tr>
                     
                      <!-- delete Modal -->
                      <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">هل انت متأكد من الحذف</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url('dashboard/user/delete')}}" method="post">
                                                                          
                              @csrf
                                                                        
                                <input id="id" type="hidden" name="id" class="form-control"
                                  value="{{$user->id }}">
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
                       <div class="modal fade" id="edit{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"> تغيير حالة المستحدم  </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{url("dashboard/user/update")}}" method="post">                                          
                              @csrf                                
                                <input id="id" type="hidden" name="id" class="form-control" value="{{$user->id }}">
                              
                                <div class="col">
                                  <label for="tile" class="mr-sm-2">ترقية</label>
                                    <select class="fancyselect form-control" name="role">
                                    
                                    <option value="{{$user->role}}" selected >تحديث</option>
                                          <option value="1">أدمن </option>
                                          <option value="0">مستخدم </option>
                                    </select>
                                    <label for="tile" class="mr-sm-2">الدور</label>
                                    <select class="fancyselect form-control" name="usertype">
                                    <option value="{{$user->usertype}}" selected >تحديث</option>
                                          <option value="1">كاتب  </option>
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

    




@endsection