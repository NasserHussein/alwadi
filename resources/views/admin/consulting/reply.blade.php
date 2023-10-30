@extends('layouts.admin')
@section('title')
الرد علي الأستشارة
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
                            <li class="breadcrumb-item"><a href="{{ route('admin.get.consulting.paid') }}">الأستشارات المدفوعة</a>
                            </li>
                            <li class="breadcrumb-item active">الرد علي الأستشارة
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
                                <h4 class="card-title" id="basic-layout-form">الرد علي الأستشارة</h4>
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
                                    <form class="form form-prevent-multiple-submits" action="{{ route('admin.get.consulting.reply.store',$consul->id) }}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf

                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-send-o"></i>الرد علي الأستشارة</h4>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="projectinput1">رقم الأستشارة</label>
                                                        <input name="messageID" type="text" value="{{ $consul->id }}" id="question"
                                                               class="form-control"

                                                                readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="projectinput1">نوع الأستشارة</label>
                                                        <input name="messageID" type="text" value="@if($consul->consultation_type == 0)عامة@elseif ($consul->consultation_type == 1)خاصة @else VIP @endif" id="question"
                                                               class="form-control"

                                                                readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="projectinput1">أسم الراسل</label>
                                                        <input name="userName" type="text" value="{{ $name_f }} {{ $name_l }}" id="question"
                                                               class="form-control"

                                                                readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="projectinput1">البريد الألكتروني الراسل</label>
                                                        <input name="mail" type="text" value="{{ $consul->user_email }}" id="question"
                                                               class="form-control"

                                                                readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="projectinput1">حالة الدفع</label>
                                                        <input name="mail" type="text" value="@if($consul->pay_state == '0') لم يتم الدفع @else تم الدفع @endif" id="question"
                                                               class="form-control"

                                                                readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الأستشارة</label>
                                                        <textarea name="message" type="text" id="answer"
                                                               class="form-control"

                                                                readonly>{{ $consul->title }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الأستشارة</label>
                                                        <textarea name="message" type="text" id="answer"
                                                               class="form-control"

                                                                readonly>{{ $consul->message }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الرد علي الأستشارة</label>
                                                        <textarea name="consultation_state" type="text" id="reply"
                                                               class="form-control">{{ $consul->consultation_state }}</textarea>
                                                               @error('consultation_state')
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
                                                <i class="la la-check-square-o"></i> @if($consul->consultation_state == null) أرسال الرد @else تعديل الرد @endif
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
