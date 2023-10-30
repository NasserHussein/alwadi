@extends('layouts.admin')
@section('title')
المستخدمين
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> المستخدمين </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> المستخدمين
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><i class="la la-group"></i> جميع مستخدمين الموقع وعددهم {{ App\Models\Client::count() }} مستخدم</h4>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors')

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table class=" display nowrap table-striped table-bordered scroll-horizontal"  style="width:auto;text-align: center">
                                        <thead>
                                        <tr>
                                            <th style="width: 10px">id</th>
                                            <th style="width: 10%">أسم المستخدم</th>
                                            <th>الأيميل</th>
                                            <th>حالة الأيميل</th>
                                            <th>حالة الحساب</th>
                                            <th>نوع الحساب</th>
                                            <th>تاريخ الميلاد</th>
                                            <th>البلد</th>
                                            <th>التليفون</th>
                                            <th>الجنس</th>
                                            <th>الاجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @isset($clients)
                                            @foreach ($clients as $client )
                                                <tr @if($client->auth == '1')style="background-color: rgba(0, 0, 255, 0.329)"@endif>
                                                    <td><div style="word-wrap: break-word;width:50px;">{{$client->id}}</div></td>
                                                    <td><div style="word-wrap: break-word;width:90px;">{{$client->frist_name}} {{ $client->last_name }}
                                                    </div><br>
                                                    <button type="button" class="btn btn-icon btn-outline-danger" data-toggle="modal" data-target="#rotateIn{{ $client->id }}">
										                <i class="la la-user"></i>
								 	                </button>
                                                    <div class="modal animated rotateIn text-left" id="rotateIn{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" style="display: none;" aria-hidden="true">
										                <div class="modal-dialog" role="document">
											                <div class="modal-content">
												                <div class="modal-header">
													                <h4 class="modal-title" id="myModalLabel64">أعطاء صلاحية للمستخدم</h4>
													                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
														                <span aria-hidden="true">×</span>
													                </button>
												                </div>
												                <div class="modal-body">
													                <h5>أعطاء صلاحية للمستخدم</h5>
                                                                    <form action="{{ route('admin.update.auth.for.usesrs',$client->id) }}" method="POST">
                                                                        @csrf
                                                                        <select name="auth" class="selectBox" style="width: 200px">
								                                        <option disabled selected value="Bank">ترقية مستخدم</option>
								                                        <option @if($client->auth == '1')  disabled @endif value="1">مدرس</option>
								                                        <option @if($client->auth == '0')  disabled @endif value="0">طالب</option>
							                                        </select>
                                                                </div>
												                <div class="modal-footer">
													                <button type="button" class="btn grey btn-outline-danger" data-dismiss="modal">أغلاق</button>
													                <button type="submit" class="btn btn-outline-primary">حفظ التغييرات</button>
												                </div>
                                                                    </form>
											                </div>
										                </div>
									                </div>
                                                    </td>
                                                    <td><div style="word-wrap: break-word;width:90px;">{{ $client->email }}</div></td>
                                                    <td>@if($client->email_verified_at == '') غير مفعل @else مفعل @endif</td>
                                                    <td><div style="background:@if($client->state == '0') green @else red @endif;color: white">@if($client->state == '0') نشط @else غير نشط @endif</div>
                                                        <br>
                                                    <button  type="button" class="btn btn-icon btn-outline-danger" data-toggle="modal" data-target="#rotateInState{{ $client->id }}">
										                <i class="icon-user-unfollow"></i>
								 	                </button>
                                                    <div class="modal animated tada text-left" id="rotateInState{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel64" style="display: none;" aria-hidden="true">
										                <div class="modal-dialog" role="document">
											                <div class="modal-content">
												                <div class="modal-header">
													                <h4 class="modal-title" id="myModalLabel64">حالة الحساب المستخدم</h4>
													                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
														                <span aria-hidden="true">×</span>
													                </button>
												                </div>
												                <div class="modal-body">
													                <h5>حالة الحساب المستخدم</h5>
                                                                    <form action="{{ route('admin.update.state.for.usesrs',$client->id) }}" method="POST">
                                                                        @csrf
                                                                        <select name="state" class="selectBox" style="width: 200px">
								                                        <option disabled selected value="Bank">حالة الحساب</option>
								                                        <option @if($client->state == '0')  disabled @endif value="0">تنشيط الحساب</option>
								                                        <option @if($client->state == '1')  disabled @endif value="1">تعطيل الحساب</option>
							                                        </select>
                                                                </div>
												                <div class="modal-footer">
													                <button type="button" class="btn grey btn-outline-danger" data-dismiss="modal">أغلاق</button>
													                <button type="submit" class="btn btn-outline-primary">حفظ التغييرات</button>
												                </div>
                                                                    </form>
											                </div>
										                </div>
									                </div>
                                                    </td>
                                                    <td @if($client->auth == '1')style="background-color: rgba(0, 128, 0, 0.24)"@endif>@if($client->auth == '0')طالب@else مدرس @endif</td>
                                                    <td><div style="word-wrap: break-word;width:50px;text-align: center">{{ $client->date_of_birth }}</div></td>
                                                    <td>{{ $client->country }}</td>
                                                    <td><div style="word-wrap: break-word;width:90px;">{{ $client->phone }}</div></td>
                                                    <td>{{ $client->gender }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">

                                                            <a type="button"
                                                                    href="{{ route('admin.delete.users',$client->id) }}"
                                                                    class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1"
                                                                   >
                                                                حذف
                                                            </a>

                                                        </div>
                                                        {{-- <button class="btn btn-info round btn-min-width mr-1 mb-1" data-toggle="modal" data-target="#lightSpeedIn{{ $client->id }}">الأجهزة المستخدمة</button> --}}
                                                        {{-- <div class="modal animated lightSpeedIn text-left" id="lightSpeedIn{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="text-align: center">
                                                                        <h2 id="myModalLabel66">الأجهزة المسموح لها بالدخول</h2>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        @if($client->mac1 !== Null || $client->dev1 !== Null)
                                                                        <h3>عنوان الIP للجهاز الأول:-({{ $client->mac1 }})</h3>
                                                                        <h2>معلومات عن الجهاز</h2>
                                                                        <p style="color: blue;font-size:25px">{{ $client->dev1 }}</p>
                                                                        <a href="{{ route('admin.delete.device.users',['dev' => '1' , 'id' => $client->id]) }}" type="button" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف الجهاز</a>
                                                                        <hr>
                                                                        @endif
                                                                        @if($client->mac2 !== Null || $client->dev2 !== Null)
                                                                        <h3>عنوان الIP للجهاز الثاني:-({{ $client->mac2 }})</h3>
                                                                        <h2>معلومات عن الجهاز</h2>
                                                                        <p style="color: blue;font-size:25px">{{ $client->dev2 }}</p>
                                                                        <a href="{{ route('admin.delete.device.users',['dev' => '2' , 'id' => $client->id]) }}" type="button" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف الجهاز</a>
                                                                        <hr>
                                                                        @endif
                                                                        @if($client->mac3 !== Null || $client->dev3 !== Null)
                                                                        <h3>عنوان الIP للجهاز الثالث:-({{ $client->mac3 }})</h3>
                                                                        <h2>معلومات عن الجهاز</h2>
                                                                        <p style="color: blue;font-size:25px">{{ $client->dev3 }}</p>
                                                                        <a href="{{ route('admin.delete.device.users',['dev' => '3' , 'id' => $client->id]) }}" type="button" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف الجهاز</a>
                                                                        <hr>
                                                                        @endif
                                                                        @if($client->mac4 !== Null || $client->dev4 !== Null)
                                                                        <h3>عنوان الIP للجهاز الرابع:-({{ $client->mac4 }})</h3>
                                                                        <h2>معلومات عن الجهاز</h2>
                                                                        <p style="color: blue;font-size:25px">{{ $client->dev4 }}</p>
                                                                        <a href="{{ route('admin.delete.device.users',['dev' => '4' , 'id' => $client->id]) }}" type="button" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف الجهاز</a>
                                                                        <hr>
                                                                        @endif
                                                                        @if($client->mac5 !== Null || $client->dev5 !== Null)
                                                                        <h3>عنوان الIP للجهاز الخامس:-({{ $client->mac5 }})</h3>
                                                                        <h2>معلومات عن الجهاز</h2>
                                                                        <p style="color: blue;font-size:25px">{{ $client->dev5 }}</p>
                                                                        <a href="{{ route('admin.delete.device.users',['dev' => '5' , 'id' => $client->id]) }}" type="button" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف الجهاز</a>
                                                                        <hr>
                                                                        @endif
                                                                        لتغيير جهاز المستخدم برجاء حذف الجهاز حتي يتمكن الموقع من تسجيل الجهاز الجديد
                                                                    </div>
                                                                    <div class="modal-footer">

                                                                        <button type="button" class="btn mr-1 mb-1 btn-danger btn-lg" data-dismiss="modal">ألغاء</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset

                                        </tbody>
                                    </table>
                                    <div class="justify-content-center d-flex">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
