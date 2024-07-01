@extends('layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
@endsection
@section('ptrainer_id-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">اعدادات الكورس</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')


    @if(session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
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
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale"
                            data-toggle="modal" href="#exampleModal">اضافة مادة</a>
                    </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <table id="example1" class="table key-buttons text-md-nowrap" data-ptrainer_id-length="50">
                                <table id="example1" class="table key-buttons text-md-nowrap" data-ptrainer_id-length='50'>
                                        <thead>
                                        <tr>
                                            <th class="border-bottom-0">#</th>
                                            <th class="border-bottom-0"> المادة</th>
                                            <th class="border-bottom-0">الطالب</th>
                                            <th class="border-bottom-0">قيمة الاشتراك</th>
                                            <th class="border-bottom-0">العمليات</th>

                                        </tr> 
                                        </thead>
                                        <tbody>
                                        <?php $i =0?>
                                        @foreach($fasels as $x)
                                            <?php $i++?>
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$x->ClassCourses->name}}</td>
                                            <td>{{$x->Student->firestname.' '.$x->Student->fullname }}</td>
                                            <td>{{$x->price}}</td>
                                            <td>

                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                   
                                                       data-id="{{ $x->id }}" 
                                                       data-classcourses_id="{{ $x->classcourses_id }}" 
                                                       data-student_id="{{ $x->student_id }}" 
                                                       data-price="{{ $x->price }}"
                                                       data-toggle="modal" href="#exampleModal2"
                                                       title="تعديل"><i class="las la-pen"></i>
                                                    </a>

                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                       data-id="{{ $x->id }}" data-name="{{ $x->name }}" data-toggle="modal"
                                                       href="#modaldemo9" title="حذف"><i class="las la-trash"></i>
                                                    </a>

                                            </td>
                                        </tr>
                                       @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- add -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">اضافة مادة</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                    <form action="{{route('fasel.store')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="modal-body">

                                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">المادة</label>
                                        <select name="classcourses_id" id="classcourses_id" class="form-control" required>
                                            <option value="" selected disabled> --حدد المادة--</option>
                                            @foreach ($ClassCourses as $ClassCourse)
                                                <option value="{{ $ClassCourse->id }}">{{ $ClassCourse->name }}</option>
                                            @endforeach
                                        </select>

                                    
                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">الطالب</label>
                                        <select name="student_id" id="student_id" class="form-control" required>
                                            <option value="" selected disabled> --حدد الطالب--</option>
                                            @foreach ($Student as $Students)
                                                <option value="{{ $Students->id }}">{{ $Students->firestname }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">قيمة الاشتراك</label>
                                            <input class="form-control" id="price" name="price" rows="3"></input>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">تاكيد</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
<!-- edit -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">تعديل المواد</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="ClassCourses/update" method="post" autocomplete="off">
                                            {{method_field('patch')}}
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <input type="hidden" name="id" id="id" value="">
                                             
                                            </div>
                                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">المادة</label>
                                        <select name="classcourses_id" id="classcourses_id" class="form-control" required>
                                            <option value="" selected disabled> --حدد المادة--</option>
                                            @foreach ($ClassCourses as $ClassCourse)
                                                <option value="{{ $ClassCourse->id }}">{{ $ClassCourse->name }}</option>
                                            @endforeach
                                        </select>

                                    
                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">الطالب</label>
                                        <select name="student_id" id="student_id" class="form-control" required>
                                            <option value="" selected disabled> --حدد الطالب--</option>
                                            @foreach ($Student as $Students)
                                                <option value="{{ $Students->id }}">{{ $Students->firestname }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">قيمة الاشتراك</label>
                                            <input class="form-control" id="price" name="price" rows="3"></input>
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
                                    <h6 class="modal-title">حذف الكورس</h6><button aria-label="Close" class="close" data-dismiss="modal"
                                                                        9+6           type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form action="ClassCourses/destroy" method="post">
                                    {{method_field('delete')}}
                                    {{csrf_field()}}
                                    <div class="modal-body">
                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                        <input type="hidden" name="id" id="id" value="">
                                        <input class="form-control" name="name" id="name" type="text" readonly>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                                        <button type="submit" class="btn btn-danger">تاكيد</button>
                                    </div>
                            </div>
                            
                            </form>
                        </div>
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
    <!-- Internal Prism js-->
    <script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>
    
    <script>
        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var price = button.data('price')
			var classcourses_id = button.data('classcourses_id')
            var student_id = button.data('student_id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #price').val(price);
			modal.find('.modal-body #classcourses_id').val(classcourses_id);
            modal.find('.modal-body #student_id').val(student_id);
        })
    </script>

    <script>
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var price = button.data('price')
			var classcourses_id = button.data('classcourses_id')
            var student_id = button.data('student_id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #price').val(price);
			modal.find('.modal-body #classcourses_id').val(classcourses_id);
            modal.find('.modal-body #student_id').val(student_id);
	
        })
    </script>
@endsection
