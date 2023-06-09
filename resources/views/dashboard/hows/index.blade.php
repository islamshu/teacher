@extends('layouts.backend')
@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">كيفية عمل الموقع</h4>
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
                                    <br>
                                



                                    <table class="table table-striped table-bordered zero-configuration" id="storestable">


                                        <br>
                                        <thead>
                                            <tr>
                                                <th>{{ __('سحب') }}</th>
                                                
                                                <th>الصورة   </th>
                                                <th>العنوان</th>
                                                <th>الاجراءات  </th>

                                            </tr>
                                        </thead>
                                        <tbody class="sort_menu">
                                            @foreach ($hows as $key => $item)
                                            <tr data-id="{{ $item->id }}">


                                                <td> <i class="fa fa-bars handle" aria-hidden="true"></i></td>
                                                    <td><img src="{{ asset('uploads/'.$item->image) }}" width="70" height="50" alt=""> </td>
                                                    <td>{{ $item->title }}</td>                                        
                                                    <td>
                                                        <a href="{{ route('how_it_works.edit',$item->id) }}" class="btn btn-info" ><i class="fa fa-edit"></i></a>                                                  
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
                        let status = $(this).prop('checked') === true ? 1 : 0;
                        let userId = $(this).data('id');
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: '{{ route('sliders.update.status') }}',
                            data: {
                                'status': status,
                                'sliders_id': userId
                            },
                            success: function(data) {
                                console.log(data.message);
                            }
                        });
                    });
                    
            function updateToDatabase(idString) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                $.ajax({
                    url: '{{ route('menu_update') }}',
                    method: 'POST',
                    data: {
                        ids: idString
                    },
                    success: function() {
                        alert('Successfully updated')
                        //do whatever after success
                    }
                })
            }
            var target = $('.sort_menu');
            target.sortable({
                handle: '.handle',
                placeholder: 'highlight',
                axis: "y",
                update: function(e, ui) {
                    var sortData = target.sortable('toArray', {
                        attribute: 'data-id'
                    })
                    updateToDatabase(sortData.join(','))
                }
            });
    </script>
  
@endsection
