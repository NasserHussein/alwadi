@extends('layouts.admin')
@section('title')
المعدات
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title"> المعدات </h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> المعدات
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
                                <h4 class="card-title"><i class="la la-group"></i> جميع المعدات المسجلة 222 معدة</h4>
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
                                    <table class=" display nowrap table-striped table-bordered scroll-horizontal"  style="width:auto;text-align: center">
                                        <thead>
                                        <tr>
                                            <th>رقم المعدة</th>
                                            <th>إسم المعدة</th>
                                            <th>النوع والموديل</th>
                                            <th>الرقم المسلسل</th>
                                            <th>السعة</th>
                                            <th>تفاصيل</th>
                                            <th>الأجرائات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @isset($cards)
                                            @foreach ($cards as $card)
                                                <tr>
                                                    <td><div style="word-wrap: break-word;width:90px;">{{ $card->code }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:150px;">{{ $card->name }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $card->model }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:150px">{{ $card->serial_no }}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ $card->capacity }}</div></td>
                                                    <td>
                                                        <button data-toggle="modal" data-target="#card-details{{ $card->id }}" class="btn mr-1 mb-1 btn-outline-secondary btn-sm">
                                                            المزيد من التفاصيل
                                                        </button>
                                                        {{-- ----Start Modal---- --}}
                                                            <div class="modal fade text-left" id="card-details{{ $card->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title" id="myModalLabel16">تفاصيل إضافية عن المعدة</h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h5>تفاصيل إضافية عن المعدة</h5>
                                                                            <div class="table-responsive">
                                                                                <table class="table">
                                                                                    <thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <th scope="row">القسم</th>
                                                                                            <td>{{ $card->part }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">تاريخ التشغيل</th>
                                                                                            <td>{{ $card->date_of_start }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">الوزن</th>
                                                                                            <td>{{ $card->weight }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">إسم الصانع</th>
                                                                                            <td>{{ $card->maker }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">رقم الرسم</th>
                                                                                            <td>{{ $card->drg_no }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">الأبعاد</th>
                                                                                            <td>{{ $card->dimensions }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">إسم المورد</th>
                                                                                            <td>{{ $card->supplier }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">بيان كتالوج التشغيل</th>
                                                                                            <td>{{ $card->inst_bk_no }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">القدرة  ك.وات / حصان</th>
                                                                                            <td>{{ $card->power }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">رقم أمر التصنيع</th>
                                                                                            <td>{{ $card->mfg_order_no }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">بيان كتالوجات الصيانة</th>
                                                                                            <td>{{ $card->maintenance_bk_no }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">فولت التحكم </th>
                                                                                            <td>{{ $card->control_voltage }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">رقم أمر الشراء</th>
                                                                                            <td>{{ $card->purchase_order_no }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">الامبير الكلي</th>
                                                                                            <td>{{ $card->total_amperage }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">المعدن</th>
                                                                                            <td>{{ $card->material }}</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <th scope="row">بيانات ومعلومات أضافية </th>
                                                                                            <td>{{ $card->additional_data }}</td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إغلاق</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        {{-- ----End Modal---- --}}
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                        aria-label="Basic example">
                                                        <a href="#" class="btn mr-1 mb-1 btn-outline-primary btn-sm">
                                                            تعديل
                                                        </a>
                                                        <a href="#" class="btn mr-1 mb-1 btn-outline-danger btn-sm">
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
