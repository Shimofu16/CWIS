@extends('layouts.app')
@section('title')
    Permit / Brgy Business Clearance
@endsection

@section('data_tables_css')
    <link href="{{ asset('assets/datatable_css/datatable.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Permit / Brgy Building Permit Records</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-header d-flex justify-content-between mb-4">
                        <div>
                        <h4>List of Registered Building</h4>
                        </div>
                        <div class="mr-5" >
                            <a type="button" class="btn btn-outline-primary mr-3" href  = "{{route('building_permit.create')}}"> Register Building</a>
                        </div>
                      </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>
                                                Building Owner
                                            </th>
                                            <th>
                                                Building Address
                                            </th>
                                            <th>
                                                Registration Date
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($buildings as $building)
                                        <tr>
                                            <td>

                                                <a href="{{route('building_permit.show', $building->id)}}"
                                                    class="btn btn-primary btn-sm"><i class="fas fa-file-alt"></i>
                                                    View</a>

                                            </td>
                                            <td>
                                                {{$building->building_owner}}    
                                            </td>
                                            <td>
                                                {{$building->building_address}}    
                                            </td>
                                            <td>
                                                {{ \Carbon\Carbon::parse($building->regs_date)->format('F d, Y') }}
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
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endsection

@section('data_tables_script')
    <script type="text/javascript" charset="utf8" src="{{ asset('assets/datatable_js/datatable.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endsection