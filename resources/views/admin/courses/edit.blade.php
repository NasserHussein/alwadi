@extends('layouts.admin')
@section('title')
تعديل علي دورة مميزة
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.get.courses') }}"> الدورات المميزة</a>
                            </li>
                            <li class="breadcrumb-item active">تعديل بيانات الدورة
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
                                <h4 class="card-title" id="basic-layout-form">تعديل بيانات الدورة </h4>
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
                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.courses.update',$course->id) }}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-edit"></i>من فضلك ادخل البيانات الجديدة للدورة</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">تحديث أسم الدورة </label>
                                                        <input type="text" value="{{ $course->name }}" id="name"
                                                               class="form-control"
                                                               placeholder="الجديد أدخل أسم الدورة"
                                                               name="name">
                                                               @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> تحديث صورة الدورة الدورة </label>
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


                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">تحديث وصف تعريفي للدورة </label>
                                                        <input type="text" value="{{ $course->title }}" id="title"
                                                               class="form-control"
                                                               placeholder="أدخل وصف تعريفي للدورة"
                                                               name="title">
                                                               @error('title')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">تحديث كود الفيديو التعريفي للدورة</label>
                                                        <input type="text" value="{{ $course->video }}" id="video"
                                                               class="form-control"
                                                               placeholder="أدخل كود الفيديو الجديد التعريفي للدورة"
                                                               name="video">

                                                               @error('video')
                                                               <span class="text-danger">{{ $message }}<br></span>
                                                               @enderror
                                                               <span style="color: blue">ملحوظة مهمة هنا يتم إدخال كود الفيديو المرفوع علي موقع Vimeo ويجب ان يكون مكون من أرقام واللي هي بتكون في اخر اللينك</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" name="new"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   @if($course->new == 1)
                                                                   checked
                                                                   @endif
                                                                   />
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">أعلان عن الدورة</label>
                                                        </div>
                                                    </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">تحديث سعر الدورة بالدولار</label>
                                                        <input type="text" value="{{ $course->price }}" id="price"
                                                               class="form-control"
                                                               placeholder="أدخل سعر الدورة بالدولار"
                                                               name="price">
                                                               @error('price')
                                                               <span class="text-danger">{{ $message }}<br></span>
                                                               @enderror
                                                               <span style="color: blue">ملحوظة مهمة هنا يتم إدخال سعر الدورة بالدولار الأمريكي</span>
                                                    </div>
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
