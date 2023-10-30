@extends('layouts.admin')
@section('title')
إضافة ملف PDF
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.get.free.courses') }}">الدورات المجانية</a>
                            </li>
                            <li class="breadcrumb-item active">إضافة محتوي في قسم البرنامج العملي
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> إضافة محتوي في قسم البرنامج العملي </h4>
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
                                <div class="card-body">
                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.store.pdfs.free.courses') }}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">برجاء اختيار الدورة التي تريد اضافة محتوي فيها</label>
                                                    <select name="course_id" id="profession" class="form-control">
                                                        <option value="" disabled selected>إختر الدورة</option>
                                                        @isset($courses)
                                                        @foreach ($courses as $course )
                                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                        @endforeach
                                                        @endisset
                                                    </select>
                                                    @error('course_id')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                </div>
                                            </div>


                                        </div>
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-file-pdf-o"></i>أضف محتوي في قسم البرنامج العملي</h4>



                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">أسم البرنامج العملي</label>
                                                        <input type="text" value="{{ old('pdf_name') }}" id="pdf_name"
                                                               class="form-control"
                                                               placeholder="أدخل أسم البرنامج العملي"
                                                               name="pdf_name">
                                                               @error('pdf_name')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">أدخل ملف PDF الخاص بالبرنامج العملي هنا</label>
                                                        <input type="file" value="{{ old('pdf') }}" id="pdf"
                                                               class="form-control"
                                                               name="pdf">
                                                               @error('pdf')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>



                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary button-prevent-multiple-submits">
                                                <i class="la la-check-square-o"></i> حفظ
                                                <i style="display: none" class="spinner-button fa fa-spinner fa-spin"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>
@endsection
