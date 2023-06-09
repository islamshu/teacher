@extends('layouts.backend')
@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">المعلمين</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-content collapse show">

                                <div class="card-body card-dashboard">

                                    @include('dashboard.parts._error')
                                    @include('dashboard.parts._success')
                                    <a class="btn btn-success" href="{{ route('teachers.create') }}">اضف معلم جديد</a>
                                    <br>


                                    <table class="table table-striped table-bordered zero-configuration" id="storestable">


                                        <br>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الصورة   </th>
                                                <th>الاسم</th>
                                                <th>البريد الاكتروني</th>
                                                <th>حالة الدفع </th>

                                                <th>الدولة </th>

                                                <th>الاجراءات  </th>

                                            </tr>
                                        </thead>
                                        <tbody id="stores">
                                            @foreach ($teachers as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td><img src="{{ asset('uploads/'.$item->image) }}" width="70" height="50" alt=""> </td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                       <td>
                                                        <input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch allssee"
                                                            {{ $item->is_paid == 1 ? 'checked' : '' }}>
                                                    </td>
                                                    <th>{{ $item->country }}</th>

                                                    {{-- <td>
                                                        <input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch allssee"
                                                            {{ $item->status == 1 ? 'checked' : '' }}>
                                                    </td> --}}
                                                    <td>
                                                        <a href="{{ route('teachers.show',$item->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                        <a href="{{ route('teachers.edit',$item->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                                                        <form style="display: inline"
                                                        action="{{ route('teachers.destroy', $item->id) }}"
                                                        method="post">
                                                        @method('delete') @csrf
                                                        <button type="submit" class="btn btn-danger delete-confirm"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form> 
                                                    </td>



                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    </div>
@endsection
@section('script')
<script>
    $("#storestable").on("change", ".js-switch", function() {
                let is_paid = $(this).prop('checked') === true ? 1 : 0;
                let teacher_id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{ route('update_status_paid') }}',
                    data: {
                        'is_paid': is_paid,
                        'teacher_id': teacher_id
                    },
                    success: function(data) {
                        console.log(data.message);
                    }
                });
            });
</script>
@endsection
