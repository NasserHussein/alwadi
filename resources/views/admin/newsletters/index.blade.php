@extends('layouts.admin')
@section('title')
جميع المشتركين في النشرات الأخبارية
@endsection
@section('content')
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">جميع المشتركين في النشرات الأخبارية</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            <li class="breadcrumb-item active">جميع المشتركين في النشرات الأخبارية
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
                                <div style="margin-left: 50px" class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('admin.exporting.text.file.subscribes') }}"
                                        class="btn btn-info btn-min-width box-shadow-3 mr-1 mb-1" data-animation="tada"><i class="la la-cloud-download"></i>    تصدير الي ملف TXT</a>
                                </div>
                                <h4 class="card-title"><i class="ft-thumbs-up"></i> جميع المشتركين في النشرات الأخبارية وعددهم {{ $subscribes->count() }} مشترك </h4>

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
                                            <th style="text-align: center">ID</th>
                                            <th style="text-align: center">الأيميل</th>
                                            <th style="text-align: center">تاريخ الاشتراك</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($subscribes)
                                                @foreach ($subscribes as  $subscribe)

                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:40px;text-align: center">{{ $subscribe->id }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:200px;text-align: center">{{ $subscribe->email }}</div></td>
                                                    <td style="text-align: center">{{ $subscribe->created_at }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{ route('admin.delete.subscribes',$subscribe->id) }}"
                                                                    class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1"
                                                                    >
                                                                إلغاء الاشتراك
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
