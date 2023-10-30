@extends('layouts.admin')
@section('title')
الرسائل النشطة
@endsection
@section('content')
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">الرسائل النشطه</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                                <li class="breadcrumb-item"><a href="{{ route('admin.get.contact') }}">جميع الرسائل </a>
                            <li class="breadcrumb-item active">  الرسائل النشطة
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
                                <h4 class="card-title"><i class="la la-comments"></i> الرسائل النشطة {{ $messages->count() }}</h4>
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
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table style="text-align: center"
                                        class="table display nowrap table-striped table-bordered scroll-horizontal">
                                        <thead>
                                            <div class="row">
                                                <div style="margin-right:240px;">
                                                <div style="margin-left: 50px" class="btn-group" role="group" aria-label="Basic example">
                                                <a href="#"
                                                    class="btn btn-outline-success btn-min-width btn-glow mr-1 mb-1" data-animation="tada">الرسائل النشطة</a>
                                                </div>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('admin.get.contact.wating') }}"
                                                        class="btn btn-outline-warning btn-min-width btn-glow mr-1 mb-1">متابعة</a>
                                                </div>
                                                <div style="margin-right: 50px" class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('admin.get.contact.inactive') }}"
                                                        class="btn btn-outline-danger btn-min-width btn-glow mr-1 mb-1">الرسائل المنتهية</a>
                                                </div>
                                                </div>
                                            </div>
                                            @include('admin.includes.alerts.success')
                                        <tr class="bg-success white">
                                            <th>رقم<br>التذكرة</th>
                                            <th>حالة<br>التذكرة</th>
                                            <th>صاحب<br>الرسالة</th>
                                            <th>الايميل</th>
                                            <th>عنوان الرسالة</th>
                                            <th>الرسالة</th>
                                            <th>الاجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($messages)
                                            @foreach ($messages as $message)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:40px;">{{ $message->id }}</div></td>
                                                    <td>@if( $message->state == '1')نشط @elseif ($message->state == '2')منتظر المتابعة @else منتهي @endif</td>
                                                    <td><div style="word-wrap: break-word;width:60px;">{{ $message->user_name }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $message->user_email }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:90px;">{{ $message->subject }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:150px;">{{ $message->message }}</div></td>
                                                    <td>
                                                        <div class="btn-group row" role="group"
                                                        aria-label="Basic example">
                                                        <a href="{{ route('admin.reply.contact',$message->id) }}"
                                                            class="btn btn-outline-success btn-min-width box-shadow-2 mr-1 mb-1">
                                                            رد
                                                        </a>
                                                        <a href="{{ route('admin.edit.contact',$message->id) }}"
                                                            class="btn btn-outline-info btn-min-width box-shadow-3 mr-1 mb-1">
                                                            تغيير الحاله
                                                        </a>

                                                        <a  href="{{ route('admin.delete.contact',$message->id) }}"
                                                            class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
                                                            حذف
                                                        </a>
                                                    </div>
                                                    </td>
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
