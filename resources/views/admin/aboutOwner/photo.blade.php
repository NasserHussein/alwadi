@extends('layouts.admin')
@section('title')
تحديث الصورة (عن محمد فرج)
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.get.details.about.academy') }}">بيانات الأكاديمية</a>
                            </li>
                            <li class="breadcrumb-item active">تغيير صورة محمد فرج
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
                                <h4 class="card-title" id="basic-layout-form">تغيير صورة محمد فرج</h4>
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
                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.update.photo.details.owner') }}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-camera"></i>حدث صورة محمد فرج</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الصورة</label><br>
                                                        <img style="width: 400px;height: 300px;" src="{{ asset('assets/images/admin/web_site_photoes/'.$photo->owner) }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">أختر صورة محمد فرج</label>
                                                        <input type="file" id="file"
                                                               class="form-control"
                                                               name="photo">
                                                               @error('photo')
                                                               <span class="text-danger">{{ $message }} <br></span>
                                                               @enderror

                                                               <span style="color: blue">ملحوظة مهمة للأدمن يفضل عند اضافة صورة للدورة ان تكون ذات جودة عالية وخلفية بيضاء ويكون مقاس الصورة 600X600 بكسل</span>
                                                    </div>
                                                </div>
                                            </div>

                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                    onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" class="btn btn-primary button-prevent-multiple-submits">
                                                <i class="la la-check-square-o"></i> تحديث
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
