@extends('layouts.admin')
@section('title')
فتح دورة للمستخدم
@endsection
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
 $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
</script>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.get.Auths.courses') }}">الأعضاء المشتركين</a>
                            </li>
                            <li class="breadcrumb-item active">فتح الدورة للمستخدم
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
                                <h4 class="card-title" id="basic-layout-form">فتح الدورة للمستخدم</h4>
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
                                    <form class="form form-prevent-multiple-submits" action="" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-user-plus"></i>إنشاء صلاحية لفتح دورة للمستخدم</h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="browser">أختر المستخدم</label>
                                                    <select name="client_id" id="profession" class="form-control authes" style="width: 440px">
                                                    @isset($clients)
                                                        <option selected disabled>أختر المستخدم</option>
                                                    @foreach ($clients as $client)
                                                      <option @if( old('client_id') == '{{ $client->id }}') selected @endif value="{{ $client->id }}">{{ $client->email }}</option>
                                                    @endforeach
                                                    @endisset
                                                    </select>
                                                    @error('client_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="browser">أختر الدورة</label>
                                                        <select name="course_id" id="profession" class="form-control authes" style="width: 440px">
                                                        @isset($courses)
                                                        <option selected disabled>أختر الدورة</option>
                                                        @foreach ($courses as $course)
                                                        <option @if( old('course_id') == '{{ $course->id }}') selected @endif value="{{ $course->id }}">{{ $course->name }}</option>
                                                        @endforeach
                                                        @endisset
                                                        </select>
                                                        @error('course_id')
                                                            <span class="text-danger">{{$message}}</span>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.authes').select2({})
})
</script>
@endsection
