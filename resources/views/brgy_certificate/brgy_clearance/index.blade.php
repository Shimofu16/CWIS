@extends('layouts.app')
@section('title')
    Certificates / Brgy Clearance
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Certificates / Brgy Clearance</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>Residence List</h4>
                    </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table">
                                    <thead>
                                        <tr>
                                            <th>View</th>
                                            <th>Image</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Middle Name</th>
                                            <th>Gender</th>
                                            <th>Birthday</th>
                                            <th>Age</th>
                                            {{-- <th>Address</th>
                                            <th>Civil Status</th>
                                            <th>Occupation</th>
                                            <th>Type of House</th> --}}



                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($residence_list as $residence)
                                            <tr>
                                                <td>

                                                    <a href="{{ route('brgy_clearance.create', $residence->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="fas fa-file-alt"></i>
                                                        Give Clearance</a>

                                                </td>
                                                <td>
                                                    <figure class="avatar avatar-md">
                                                        <img src="{{ $residence->path }}">
                                                    </figure>
                                                </td>
                                                <td>{{ $residence->last_name }}</td>
                                                <td>{{ $residence->first_name }}</td>
                                                <td>{{ $residence->middle_name }}</td>
                                                <td>{{ $residence->gender }}</td>
                                                <td>{{ \Carbon\Carbon::parse($residence->birthday)->format('F d, Y') }}
                                                </td>
                                                {{-- age --}}
                                                <td>{{ \Carbon\Carbon::parse($residence->birthday)->diff(\Carbon\Carbon::now())->format('%y') }}
                                                </td>
                                                {{-- age --}}

                                                {{-- <td>{{$residence->house_number }} purok {{$residence->purok}}  {{$residence->street }}</td>
                                                          <td>{{$residence->civil_status}}</td>
                                                          <td>{{$residence->occupation}}</td>
                                                          <td>{{$residence->type_of_house}}</td> --}}
                                                {{-- <td>
                                                            <div class = "row" >
                                                              <a class="btn btn-primary btn-sm"  data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i> Edit </a>
                                                    
                                                            </div>
                                                          </td>
                                                          <td>
                                                            <div class = "row" >
                                                            
                                                              <a class="btn btn-danger btn-sm"  data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i > Delete </a>
                                                            </div>
                                                          </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span
                                                class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endsection