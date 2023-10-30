@extends('layouts.admin')
@section('title')
الأستشارات المدفوعة
@endsection
@section('content')
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">الأستشارات المدفوعة</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            <li class="breadcrumb-item active">  الأستشارات المدفوعة
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
                                <h4 class="card-title"><i class="la la-comments"></i> الأستشارات المدفوعة {{ $consuls->count() }}</h4>
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
                                                <div style="margin-right:200px;">
                                                <div style="margin-left: 50px" class="btn-group" role="group" aria-label="Basic example">
                                                <a href="#"
                                                    class="btn btn-outline-success btn-min-width btn-glow mr-1 mb-1" data-animation="tada">الأستشارات المدفوعة</a>
                                                </div>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('admin.get.consulting.not.paid.yet') }}"
                                                        class="btn btn-outline-warning btn-min-width btn-glow mr-1 mb-1">أستشارات لم تدفع</a>
                                                </div>
                                                <div style="margin-right: 50px" class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('admin.get.consulting.it.has.been.answered') }}"
                                                        class="btn btn-outline-danger btn-min-width btn-glow mr-1 mb-1">أستشارات تم الرد عليها</a>
                                                </div>
                                                </div>
                                            </div>
                                            @include('admin.includes.alerts.success')
                                        <tr class="bg-success white">
                                            <th>رقم<br>الأستشارة</th>
                                            <th>حالة<br>الدفع</th>
                                            <th>الايميل</th>
                                            <th>نوع<br>الأستشارة</th>
                                            <th>عنوان الأستشارة</th>
                                            <th>الأستشارة</th>
                                            <th>الاجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                    @isset($consuls)
                                                        @foreach ($consuls as $consul)

                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:40px;">{{ $consul->id }}</div></td>
                                                    <td>@if($consul->pay_state == '1') تم الدفع @else لم يتم الدفع @endif</td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $consul->user_email }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:35px;">@if($consul->consultation_type == 0)عامة@elseif ($consul->consultation_type == 1)خاصة @else VIP @endif</div></td>
                                                    <td><div style="word-wrap: break-word;width:90px;">{{ $consul->title }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:120px;">{{ $consul->message }}</div></td>
                                                    <td>
                                                        <div class="btn-group row" role="group"
                                                        aria-label="Basic example">
                                                        <a href="{{ route('admin.get.consulting.reply.create',$consul->id) }}"
                                                            class="btn btn-outline-success btn-min-width box-shadow-2 mr-1 mb-1">
                                                            رد
                                                        </a>


                                                        {{-- <a  href=""
                                                            class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">
                                                            حذف
                                                        </a> --}}
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
