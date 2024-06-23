@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
                <div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">معلم</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
				<!-- row -->
				<div class="row">


                        <div class="col-xl-12">
                        <div class="card mg-b-20">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">
                                    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة </a>

                                </div>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table key-buttons text-md-nowrap">
                                        <thead>
                                        <tr>
                                            <th class="border-bottom-0">#</th>
                                            <th class="border-bottom-0">اسم المعلم</th>
                                            <th class="border-bottom-0">اللقب</th>
                                            <th class="border-bottom-0">رقم الهاتف </th>
											<th class="border-bottom-0">الايميل</th>
											<th class="border-bottom-0">العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i =0?>
                                        @foreach($Trainers as $x)
                                            <?php $i++?>
                                        <tr>
                                            <td>{{$i}}</td>
											<td>{{$x->namefirst}}</td>
											<td>{{$x->lastname}}</td>
                                            <td>{{$x->phone}}</td>
                                            <td>{{$x->email}}</td>
                                            <td>

                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                       data-id="{{ $x->id }}" 
                                                       data-namefirst="{{$x->namefirst}}"
                                                       data-lastname="{{$x->lastname}}"
                                                       data-phone="{{$x->phone}}" 
													   data-password="{{$x->password}}" 
													   data-email="{{$x->email}}"
                                                       data-toggle="modal" href="#exampleModal2"
                                                       title="تعديل"><i class="las la-pen"></i></a>

                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                       data-id="{{$x->id}}"
													    data-namefirst="{{$x->namefirst}}"
														  data-lastname="{{$x->lastname}}"
														 data-phone="{{$x->phone}}"
														 data-toggle="modal"
                                                       href="#modaldemo9" title="حذف"><i class="las la-trash"></i></a>

                                            </td>
                                        </tr>
                                       @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal" id="modaldemo8">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">اضافة المعلم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('trainer.store')}}" method="post">
                                        {{csrf_field()}}

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">اسم المعلم</label>
                                        <input type="text" class="form-control" id="namefirst" name="namefirst"  >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">اللقب</label>
                                        <input class="form-control" id="lastname" name="lastname" rows="3"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">رقم الهاتف </label>
                                        <input class="form-control" id="phone" name="phone" rows="3"></input>
                                    </div>
									<div class="form-group">
                                        <label for="exampleFormControlTextarea1">الايميل</label>
                                        <input class="form-control" id="email" name="email" rows="3"></input>
                                    </div>
									<div class="form-group">
                                        <label for="exampleFormControlTextarea1">الرمز السري</label>
                                        <input class="form-control" id="password" name="password" rows="3"></input>
                                    </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">تاكيد</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Basic modal -->


				</div>
                        <!-- edit -->
                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">تعديل المعلم</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="trainer/update" method="post" autocomplete="off">
                                            {{method_field('patch')}}
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <input type="hidden" name="id" id="id" value="">
												<label for="exampleInputEmail1">اسم المعلم</label>
                                                <input type="text" class="form-control" id="namefirst" name="namefirst"  >
                                           </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">اللقب</label>
                                        <input class="form-control" id="lastname" name="lastname" rows="3"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">رقم الهاتف</label>
                                        <input class="form-control" id="phone" name="phone" rows="3"></input>
                                    </div>
									<div class="form-group">
                                        <label for="exampleFormControlTextarea1">الايميل</label>
                                        <input class="form-control" id="email" name="email" rows="3"></input>
                                    </div>
									<div class="form-group">
                                        <label for="exampleFormControlTextarea1">الرمز السري</label>
                                        <input class="form-control" id="password" name="password" rows="3"></input>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">تاكيد</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <!-- delete -->
                    <div class="modal" id="modaldemo9">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">حذف المعلم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                        9+6           type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="trainer/destroy" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <input type="hidden" name="id" id="id" value="">
                                        <input class="form-control" name="namefirst" id="namefirst" type="text" readonly>
										
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                        <button type="submit" class="btn btn-danger">تاكيد</button>
                                    </div>
                            </div>
                            
                            </form>
                        </div>
                    </div>




				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>

    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var phone = button.data('phone')
            var namefirst = button.data('namefirst')
            var lastname = button.data('lastname')
			var password = button.data('password')
			var email = button.data('email')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #phone').val(phone);
            modal.find('.modal-body #namefirst').val(namefirst);
            modal.find('.modal-body #lastname').val(lastname);
			modal.find('.modal-body #password').val(password);
			modal.find('.modal-body #email').val(email);
        })
    </script>

    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var namefirst = button.data('namefirst')
			var lastname = button.data('lastname')
			var phone = button.data('phone')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #namefirst').val(namefirst);
			modal.find('.modal-body #lastname').val(lastname);
			modal.find('.modal-body #phone').val(phone);
        })
    </script>

@endsection