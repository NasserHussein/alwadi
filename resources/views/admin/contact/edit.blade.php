@extends('layouts.admin')
@section('title')
تحديث حالة الرسائل
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.get.contact') }}"> جميع الرسائل </a>
                            </li>
                            <li class="breadcrumb-item active">تحديث حالة الرسائل
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
                                <h4 class="card-title" id="basic-layout-form">تحديث حالة الرسائل</h4>
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
                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.update.contact',$message->id) }}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-filter"></i>حدث حالة الرسائل</h4>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="projectinput1">رقم التذكرة</label>
                                                        <input type="text" value="{{ $message->id }}" id="question"
                                                               class="form-control"

                                                                readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">أسم الراسل</label>
                                                        <input type="text" value="{{ $message->user_name }}" id="question"
                                                               class="form-control"

                                                                readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">البريد الألكتروني الراسل</label>
                                                        <input type="text" value="{{ $message->user_email }}" id="question"
                                                               class="form-control"

                                                                readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">عنوان الرسالة</label>
                                                        <input type="text" value="{{ $message->subject }}" id="question"
                                                               class="form-control"

                                                                readonly>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الرسالة</label>
                                                        <textarea type="text" id="answer"
                                                               class="form-control"

                                                                readonly>{{ $message->message }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">حالة الرسالة</label>
                                                        <select name="state" id="profession" class="form-control">
                                                            <option value="1"  @if($message->state == 1) disabled selected @endif>نشط</option>
                                                            <option value="2"  @if($message->state == 2) disabled selected @endif>منتظر المتابعة</option>
                                                            <option value="3"  @if($message->state == 3) disabled selected @endif>منتهي</option>
                                                        </select>
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
