@extends('layouts.admin')
@section('title')
التعليقات
@endsection
@section('content')
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">التعليقات علي الدورة</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li><li class="breadcrumb-item"><a href="{{ route('admin.get.courses') }}">الدورات المميزة</a>
                            </li>
                            <li class="breadcrumb-item active">التعليقات علي الدورة
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
                                <h4 class="card-title"><i class="la la-comments"></i> جميع التعليقات علي الدورة وعددهم {{ $comments->count() }} تعليق </h4>
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
                                            <th>أسم الدورة</th>
                                            <th>التعليق</th>
                                            <th>أسم صاحب التعليق</th>
                                            <th>تاريخ التعليق</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                @isset($comments)
                                                @foreach ($comments as $comment)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:40px;">{{ $comment->id }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:60px;">{{ App\Models\Admin\Course::find($comment->course_id)->name }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:150px;">{{ $comment->comment }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;text-align: center">{{ App\Models\Client::find($comment->client_id)->frist_name }} {{ App\Models\Client::find($comment->client_id)->last_name }} <br> <span style="color: red"> {{ App\Models\Client::find($comment->client_id)->id }}</span></div></td>
                                                    <td>{{ $comment->created_at }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{ route('admin.delete.comment.course',$comment->id) }}"
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
