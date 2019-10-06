@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @role('admin')
                        <a href="{{ route('client') }}" class="btn btn-success float-right mb-2">+ Create Client</a>
                    @else
                        <a href="#">Edit Client</a>
                    @endrole

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($client as $c)
                                <tr>
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $c->email }}</td>
                                    <td>{{ $c->address }}</td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
