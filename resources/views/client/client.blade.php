@extends('layouts.app')

@section('content')



                    <div class="container">
                        <div class="row">
                            <h3 class="mt-3 col-md-8 text-left pl-"><b>Client List</b></h3>

                            <div class="float-right col-md-4 mt-2">
                                @role('admin')
                                <a href="{{ route('client') }}" class="btn btn-success float-right mb-2">+ Create Client</a>
                                @else
                                    <a href="#" class="btn btn-success float-right mb-2">Edit Client</a>
                                    @endrole
                            </div>
                        </div>

                    </div>



                    <div class="card-body d-sm-flex justify-content-between">



                        <table class="table table-bordered px-2">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($client as $c)
                                <tr>
                                    <td>{{ $c->companyName }}</td>
                                    <td>{{ $c->email }}</td>
                                    <td>{{ $c->address }}</td>
                                    <td>
                                        <p class="text-center">
                                        <a href=""><i class="fas fa-eye mr-2"></i></a>
                                        <a href=""><i class="fas fa-edit mr-2"></i></a>
                                        <a href=""><i class="fas fa-trash"></i></a>
                                        </p>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>





@endsection