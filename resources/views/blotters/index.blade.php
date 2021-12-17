@extends('layouts.app')
@section('title')
    Blotters
@endsection


@section('data_tables_css')
<link href="{{ asset('vendor/css/datatables/datatable.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            @if (Session::has('swal'))
                <script>
                    window.addEventListener("load", ok, false);
                    function ok() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Blotter Added',
                            showConfirmButton: true,
                        })
                    }
                </script>
            @endif

    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Blotters Record</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between mb-4">
                            <div>
                            <h4>Blotter Records List</h4>
                            </div>
                            <div class="mr-5">
                                <a href="{{ route('blotters.create') }}" class="btn btn-outline-primary mr-3"><i
                                    class="far fa-edit"></i> Write Blotter </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table">
                                    <thead>
                                        <tr>
                                            <th>View</th>
                                            <th>Case Number</th>
                                            <th>Complained Person</th>
                                            <th>Blotter Information</th>
                                            <th>Complainant</th>
                                            <th>Incident Date</th>
                                            <th>Case Type</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($blotters as $blotter)
                                        <tr>
                                            
                                            <td>
                                                <div class="row d-flex justify-content-center">
                                                    <a href="{{route('blotters.show', $blotter->id)}}"
                                                        class="btn btn-primary btn-sm" data-toggle="tooltip"
                                                        title="View"><i class="fas fa-eye"></i></a>

                                                </div>
                                            </td>
                                            <td>{{$blotter->case_number}}</td>
                                            <td>
                                                @foreach ($blotter->residents as $resident)
                                                    <p>{{$resident->last_name}} {{$resident->first_name}} {{$resident->middle_name}}</p>
                                                @endforeach 
                                            </td>
                                            <td>{{$blotter->Blotters_info}}</td>
                                            <td>{{$blotter->complainant_name}}</td>
                                            <td>{{ \Carbon\Carbon::parse($blotter->date_of_incident)->format('F d, Y') }}</td>
                                            <td>{{$blotter->case_type}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    
          
    </section>
    
    
@endsection

@section('data_tables_script')
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>

<script type="text/javascript" charset="utf8" src="{{ asset('vendor/js/datatables/datatable.js') }}"></script>
@endsection
