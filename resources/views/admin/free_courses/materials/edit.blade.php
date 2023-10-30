@extends('layouts.admin')
@section('title')
تعديل المادة العلمية
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
                            <li class="breadcrumb-item active">تحديث بيانات المادة العلمية
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
                                <h4 class="card-title" id="basic-layout-form">تحديث بيانات المادة العلمية </h4>
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
                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.get.material.free.courses.update',$material->id) }}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-folder-open"></i>تعديل محتوي في قسم المادة العلمية</h4>



                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">تحديث رقم الدرس</label>
                                                        <input type="text" value="{{ $material->material_number }}" id="material_number"
                                                               class="form-control"
                                                               placeholder="أدخل رقم الدرس مثال* الدرس الأول *الدرس الثاني"
                                                               name="material_number">
                                                               @error('material_number')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">تحديث أسم درس المادة العلمية</label>
                                                        <input type="text" value="{{ $material->material_name }}" id="material_name"
                                                               class="form-control"
                                                               placeholder="أدخل أسم درس المادة العلمية"
                                                               name="material_name">
                                                               @error('material_name')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"><i class="la la-film"></i>تحديث كود الفيديو لهذا الدرس للمادة العلمية</label>
                                                        <input type="text" value="{{ $material->material_Video }}" id="material_Video"
                                                               class="form-control"
                                                               placeholder="أدخل كود الفيديو لهذا الدرس للمادة العلمية"
                                                               name="material_Video">
                                                               @error('material_Video')
                                                               <span class="text-danger">{{ $message }}<br></span>
                                                               @enderror
                                                               <span style="color: blue">ملحوظة مهمة هنا يتم إدخال كود الفيديو المرفوع علي موقع Vimeo ويجب ان يكون مكون من أرقام واللي هي بتكون في اخر اللينك</span>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary button-prevent-multiple-submits">
                                                <i class="la la-check-square-o"></i> حفظ التغيرات
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
