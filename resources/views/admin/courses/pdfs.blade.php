@extends('layouts.admin')
@section('title')
ملفات PDF
@endsection
@section('content')
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم البرنامج العملي</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">الرئيسية</a>
                            </li><li class="breadcrumb-item"><a href="{{ route('admin.get.courses') }}">الدورات المميزة</a>
                            </li>
                            <li class="breadcrumb-item active"> البرنامج العملي
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
                                <h4 class="card-title"><i class="la la-file-pdf-o"></i> جميع ملفات البرنامج العلمي للدورة وعددهم {{ $pdfs->count() }} ملف </h4>
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
                                            <th>أسم البرنامج العملي</th>
                                            <th style="text-align: center">ملف pdf</th>
                                            <th style="text-align: center">الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                                <tr>

                                                    @isset($pdfs)
                                                    @foreach ($pdfs as $pdf )
                                                    <td><div style="word-wrap: break-word;width:40px;">{{ $pdf->id}}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $pdf->pdf_name}}</div></td>
                                                    <td><embed style="width: 200px;height: 150px;" src=" {{ asset('assets/pdfs/admin/courses/').'/'.$pdf->pdf }}"></td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example">
                                                            <a href="{{ route('admin.get.pdf.courses.edit',$pdf->id) }}"
                                                               class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>
                                                            <a href="{{ route('admin.get.pdf.courses.delete',['id'=>$pdf->id,'course_id'=>$pdf->course_id]) }}"
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
