@extends('layouts.admin')
@section('title')
الدروس
@endsection
@section('content')
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم الدروس للدورة</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li><li class="breadcrumb-item"><a href="{{ route('admin.get.courses') }}">الدورات المميزة</a>
                            </li>
                            <li class="breadcrumb-item active"> دروس الدورة
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
                                <h4 class="card-title"><i class="la la-folder-open-o"></i> جميع دروس الدورة وعددهم {{ $lessons->count() }} درس </h4>
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
                                        <tr class="bg-success white">
                                            <th>ID</th>
                                            <th>الدروس</th>
                                            <th>اسم الدرس</th>
                                            <th>الفيديوهات</th>
                                            <th style="text-align: center">الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                                <tr>

                                                    @isset($lessons)
                                                    @foreach ($lessons as $lesson )
                                                    <td><div style="word-wrap: break-word;width:40px;">{{ $lesson->id }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:80px;">{{ $lesson->lesson_number}}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $lesson->lesson_name }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $lesson->lesson_Video }}</div></td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{ route('admin.get.lessons.courses.edit',$lesson->id) }}"
                                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>
                                                            <a href="{{ route('admin.get.lessons.courses.delete',['id'=>$lesson->id,'course_id'=>$lesson->course_id ]) }}"
                                                                    class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1"
                                                                    >
                                                                حذف
                                                            </a>

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
