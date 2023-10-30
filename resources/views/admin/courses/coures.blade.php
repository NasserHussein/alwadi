@extends('layouts.admin')
@section('title')
الدورات المميزة
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> الدورات المميزة </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> الدورات المميزة
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
                                <h4 class="card-title"><i class="la la-certificate"></i> جميع الدورات المميزة للموقع وعددهم {{ App\Models\admin\Course::count() }} دورة </h4>
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
                                    <table
                                        class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead>
                                            <div class="row">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('admin.create.lessons.courses') }}"
                                                    class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">أضافة دروس للدورات</a>
                                                </div>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('admin.create.materials.courses') }}"
                                                        class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">أضافة المادة العلمية للدورات</a>
                                                </div>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('admin.create.pdfs.courses') }}"
                                                        class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">أضافة البرنامج العملي للدورات</a>
                                                </div>
                                            </div>
                                        <tr class="bg-success white">
                                            <th>ID</th>
                                            <th style="text-align: center">أسم الدورة</th>
                                            <th style="text-align: center">صورة الدورة</th>
                                            <th>عنوان وصف للدورة</th>
                                            <th style="text-align: center">الأقسام</th>
                                            <th>الإجراءات</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                       @isset($courses)
                                       @foreach ($courses as $course)

                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:20px;">{{ $course->id }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:60px;">{{ $course->name }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:110px;text-align: center;color: red;font-size: 17px"><img style="width: 130px;height: 130px;" src=" {{ asset('assets/images/admin/courses/').'/'.$course->photo }}"><br>سعر الدورة {{ $course->price }}$</div></td>
                                                    <td><div style="word-wrap: break-word;width:110px;text-align: center;">{{ $course->title }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{ route('admin.get.lessons.courses',$course->id)}}"
                                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">الدروس</a>


                                                        </div>

                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{ route('admin.get.material.courses',$course->id) }}"
                                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">المادة العلمية</a>


                                                        </div>

                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{ route('admin.get.pdf.courses',$course->id) }}"
                                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">البرنامج العملي</a>


                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{ route('admin.courses.edit',$course->id) }}"
                                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


                                                        </div>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                             <!--   رسالة تأكيدحذف   -->
                                                           <!-- Button trigger modal -->
                                                           <button class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1" data-toggle="modal" data-target="#rotateInDownRight{{ $course->id }}">
                                                            حذف
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal animated rotateInDownRight text-left" id="rotateInDownRight{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel66" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="text-align: center">
                                                                        <h2 style="color: red;" id="myModalLabel66">تحذير</h2>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h3 style="color: blue">هل أنت متأكد من حذف هذه الدورة؟</h3>
                                                                        <p style="color: red">اذا حذف هذه الدورة سوف تحذف جميع محتوي الدورة بالكامل</p>

                                                                        <hr>
                                                                        <h2 style="color: blue">لتأكيد حذف الدورة</h2>
                                                                        <p style="color: red">مع العلم أنك سوف تحذف جميع محتوي الدورة بما فيها من دروس و Pdf</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="{{ route('admin.courses.delete',$course->id) }}" type="button" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">أعلم ذالك وأريد حذف الدورة</a>
                                                                        <button type="button" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1" data-dismiss="modal">ألغاء</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                             <!--  انتهاء رسالة تأكيد حذف    -->



                                                        </div>
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
