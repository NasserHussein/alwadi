@extends('layouts.admin')
@section('title')
الأعضاء المشتركين
@endsection
@section('content')
 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">جميع الأعضاء المشتركين</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item active"> جميع الأعضاء المشتركين
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
                                <h4 class="card-title"><i class="la la-mortar-board"></i> جميع الأعضاء المشتركين</h4>
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
                                            <th>اسم المستخدم</th>
                                            <th>بريد المستخدم</th>
                                            <th>التليفون</th>
                                            <th>جميع الدورات المشترك فيها</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                                   @foreach ($clients as $client )
                                                <tr>
                                                    <td>{{ $client->client_id }}</td>
                                                    <td><div style="word-wrap: break-word;width:60px;">{{ App\Models\Client::find($client->client_id)->frist_name}} {{ App\Models\Client::find($client->client_id)->last_name}}</div></td>
                                                    <td><div style="word-wrap: break-word;width:180px;">{{ App\Models\Client::find($client->client_id)->email}}</div></td>
                                                    <td><div style="word-wrap: break-word;width:100px;">{{ App\Models\Client::find($client->client_id)->phone}}</div></td>
                                                    <td>
                                                        <button class="btn btn-info round btn-min-width mr-1 mb-1" data-toggle="modal" data-target="#lightSpeedIn{{ $client->id }}">عدد الدورات المفتوحة<br>لهذا المستخدم {{ App\Models\Admin\Auth::where('client_id' , $client->client_id)->count() }} دورة</button>
                                                        <div class="modal animated lightSpeedIn text-left" id="lightSpeedIn{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabe" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="text-align: center">
                                                                        <h2 id="myModalLabel66">{{ App\Models\Client::find($client->client_id)->frist_name}} {{ App\Models\Client::find($client->client_id)->last_name}}</h2>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">


                                                                        @isset(App\Models\Client::find($client->client_id)->courses)
                                                                          @foreach (App\Models\Client::find($client->client_id)->courses as  $course)
                                                                          <h3 >دورة </h3>


                                                                        <p style="color: blue;font-size:25px">{{ $course->name }}</p>



                                                                        @foreach (App\Models\admin\Auth::where(['Client_id'=>$client->client_id,'course_id'=> $course->id])->get('id') as $auth_id)


                                                                        <a href="{{ route('admin.delete.Auths.courses',$auth_id->id) }}" type="button" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">إلغاء الأشتراك في الدورة</a>

                                                                        @endforeach

                                                                        <hr>
                                                                        @endforeach
                                                                        @endisset

                                                                        اذا ألغيت أشتراك الدورة لن يتمكن المستخدم من فتح الدورة إلي اذا تم أعطائة الصلاحيه مره أخري
                                                                    </div>
                                                                    <div class="modal-footer">

                                                                        <button type="button" class="btn mr-1 mb-1 btn-danger btn-lg" data-dismiss="modal">ألغاء</button>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>

                                                @endforeach

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
