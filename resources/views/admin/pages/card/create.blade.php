@extends('layouts.admin')
@section('title')
إضافة معدة
@endsection
@section('content')
<style>
    input[type="date"]::-webkit-datetime-edit, input[type="date"]::-webkit-inner-spin-button, input[type="date"]::-webkit-clear-button {
  color: #fff;
  position: relative;
}

input[type="date"]::-webkit-datetime-edit-year-field{
  position: absolute !important;
  border-left:1px solid #8c8c8c;
  padding: 2px;
  color:#000;
  left: 56px;
}

input[type="date"]::-webkit-datetime-edit-month-field{
  position: absolute !important;
  border-left:1px solid #8c8c8c;
  padding: 2px;
  color:#000;
  left: 26px;
}


input[type="date"]::-webkit-datetime-edit-day-field{
  position: absolute !important;
  color:#000;
  padding: 2px;
  left: 4px;

}
</style>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.index.cards') }}">المعدات</a>
                            </li>
                            <li class="breadcrumb-item active">أضافة معدة
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
                                <h4 class="card-title" id="basic-layout-form">تسجيل معدة جديدة</h4>
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
                                    <form class="form form-prevent-multiple-submits" action="#" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">برجاء أختيار أسم المعدة</label>
                                                    <select name="course_id" id="profession" class="form-control">
                                                        <option value="" disabled selected>إختر نوع المعدة</option>
                                                        <option value="">حفار</option>
                                                        <option value="">لودر</option>
                                                        <option value="">مولد</option>
                                                    </select>
                                                    @error('course_id')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="la la-sort-numeric-asc"></i>أضف بيانات المعدة الجديدة</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">رقم المعدة :Equip. Code</label>
                                                        <input type="text" value="{{ old('lesson_number') }}" id="lesson_number"
                                                               class="form-control"
                                                               placeholder="أدخل رقم المعدة"
                                                               name="lesson_number">
                                                               @error('lesson_number')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">النوع والموديل Type / Model</label>
                                                        <input type="text" value="{{ old('lesson_name') }}" id="lesson_name"
                                                               class="form-control"
                                                               placeholder="أدخل النوع والموديل"
                                                               name="lesson_name">
                                                               @error('lesson_name')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">تاريخ التشغيل Date Of Start</label>
                                                        <input type="date" value="{{ old('lesson_Video') }}" id="lesson_Video"
                                                               class="form-control"
                                                               placeholder="أدخل تاريخ التشغيل"
                                                               name="lesson_Video">
                                                               @error('lesson_Video')
                                                               <span class="text-danger">{{ $message }}<br></span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الوزن  Weight</label>
                                                        <input type="text" value="{{ old('lesson_name') }}" id="lesson_name"
                                                               class="form-control"
                                                               placeholder="أدخل الوزن"
                                                               name="lesson_name">
                                                               @error('lesson_name')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">إسم الصانع Manufacturer</label>
                                                        <input type="text" value="{{ old('lesson_number') }}" id="lesson_number"
                                                               class="form-control"
                                                               placeholder="أدخل إسم الصانع"
                                                               name="lesson_number">
                                                               @error('lesson_number')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">رقم الرسم DRG. No</label>
                                                        <input type="text" value="{{ old('lesson_name') }}" id="lesson_name"
                                                               class="form-control"
                                                               placeholder="أدخل رقم الرسم"
                                                               name="lesson_name">
                                                               @error('lesson_name')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الأبعاد  Dimensions</label>
                                                        <input type="text" value="{{ old('lesson_number') }}" id="lesson_number"
                                                               class="form-control"
                                                               placeholder="أدخل الأبعاد"
                                                               name="lesson_number">
                                                               @error('lesson_number')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">إسم المورد Supplier</label>
                                                        <input type="text" value="{{ old('lesson_name') }}" id="lesson_name"
                                                               class="form-control"
                                                               placeholder="أدخل إسم المورد"
                                                               name="lesson_name">
                                                               @error('lesson_name')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">بيان كتالوج التشغيل Inst. BK. No.</label>
                                                        <input type="text" value="{{ old('lesson_number') }}" id="lesson_number"
                                                               class="form-control"
                                                               placeholder="أدخل بيان كتالوج التشغيل"
                                                               name="lesson_number">
                                                               @error('lesson_number')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">القدرة  ك.وات / حصان HP/KW</label>
                                                        <input type="text" value="{{ old('lesson_name') }}" id="lesson_name"
                                                               class="form-control"
                                                               placeholder="أدخل القدرة ك.وات / حصان"
                                                               name="lesson_name">
                                                               @error('lesson_name')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">رقم أمر التصنيع MFG order No.</label>
                                                        <input type="text" value="{{ old('lesson_number') }}" id="lesson_number"
                                                               class="form-control"
                                                               placeholder="أدخل رقم أمر التصنيع"
                                                               name="lesson_number">
                                                               @error('lesson_number')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">بيان كتالوجات الصيانة Maintenance BK No.</label>
                                                        <input type="text" value="{{ old('lesson_name') }}" id="lesson_name"
                                                               class="form-control"
                                                               placeholder="أدخل بيان كتالوجات الصيانة"
                                                               name="lesson_name">
                                                               @error('lesson_name')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">فولت التحكم Control Voltage</label>
                                                        <input type="text" value="{{ old('lesson_number') }}" id="lesson_number"
                                                               class="form-control"
                                                               placeholder="أدخل فولت التحكم "
                                                               name="lesson_number">
                                                               @error('lesson_number')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">رقم أمر الشراء Purchase Order No.</label>
                                                        <input type="text" value="{{ old('lesson_name') }}" id="lesson_name"
                                                               class="form-control"
                                                               placeholder="أدخل رقم أمر الشراء"
                                                               name="lesson_name">
                                                               @error('lesson_name')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">السعة Capacity / Output</label>
                                                        <input type="text" value="{{ old('lesson_number') }}" id="lesson_number"
                                                               class="form-control"
                                                               placeholder="أدخل السعة"
                                                               name="lesson_number">
                                                               @error('lesson_number')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الامبير الكلي Total Amperage</label>
                                                        <input type="text" value="{{ old('lesson_name') }}" id="lesson_name"
                                                               class="form-control"
                                                               placeholder="أدخل الامبير الكلي"
                                                               name="lesson_name">
                                                               @error('lesson_name')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الرقم المسلسل Serial No.</label>
                                                        <input type="text" value="{{ old('lesson_number') }}" id="lesson_number"
                                                               class="form-control"
                                                               placeholder="أدخل الرقم المسلسل"
                                                               name="lesson_number">
                                                               @error('lesson_number')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">المعدن Material</label>
                                                        <input type="text" value="{{ old('lesson_name') }}" id="lesson_name"
                                                               class="form-control"
                                                               placeholder="أدخل المعدن"
                                                               name="lesson_name">
                                                               @error('lesson_name')
                                                               <span class="text-danger">{{ $message }}</span>
                                                               @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">بيانات ومعلومات أضافية Additional Data</label>
                                                        <input type="text" value="{{ old('lesson_number') }}" id="lesson_number"
                                                               class="form-control"
                                                               placeholder="أدخل بيانات ومعلومات أضافية"
                                                               name="lesson_number">
                                                               @error('lesson_number')
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
