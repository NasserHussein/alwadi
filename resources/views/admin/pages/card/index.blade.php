@extends('layouts.admin')
@section('title')
المعدات
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> المعدات </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> المعدات
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
                                <h4 class="card-title"><i class="la la-group"></i> جميع المعدات المسجلة 222 معدة</h4>
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
                                            <th>إسم المعدة</th>
                                            <th>رقم المعدة</th>
                                            <th>النوع والموديل</th>
                                            <th>الرقم المسلسل</th>
                                            <th>السعة</th>
                                            <th>تفاصيل</th>
                                            <th>الأجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:150px;"></div></td>
                                                    <td><div style="word-wrap: break-word;width:90px;"></div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;"></div></td>
                                                    <td><div style="word-wrap: break-word;width:150px"></div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;"></div></td>
                                                    <td>
                                                        <a href="#" class="btn mr-1 mb-1 btn-outline-secondary btn-sm">
                                                            المزيد من التفاصيل
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                        aria-label="Basic example">
                                                        <a href="#" class="btn mr-1 mb-1 btn-outline-primary btn-sm">
                                                            تعديل
                                                        </a>
                                                        <a href="#" class="btn mr-1 mb-1 btn-outline-danger btn-sm">
                                                            حذف
                                                        </a>
                                                        </div>
                                                    </td>
                                                </tr>
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
