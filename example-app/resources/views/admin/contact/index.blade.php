@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container">
                    <div class="row">

                        <h2>Contact Page</h2>
                        <br>
                        <a href="{{ route('add.contact') }}"><button class="btn btn-info">Add Contact</button></a>

                        <div class="col-md-12">
                            <div class="card">
                                <!-- Добавление алерта при редиректе обратно на All Brands -->
                                @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <div class="card-header">All Contact Data</div>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <!-- Обновляем название колонок для показа данных из базы -->
                                            <th scope="col" width="5%">SL</th>
                                            <th scope="col" width="15%">Contact address</th>
                                            <th scope="col" width="25%">Contact email</th>
                                            <th scope="col" width="25%">Contact phone</th>
                                            <th scope="col" width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                        @foreach($contacts as $con)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $con->address }}</td>
                                            <td>{{ $con->email }}</td>
                                            <td>{{ $con->phone }}</td>
                                            <td>
                                                <a href="{{ url('contact/edit/'.$con->id) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ url('contact/delete/'.$con->id) }}" onclick="return confirm('Are you sure to delete')"class="btn btn-danger">Delete</a>
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

@endsection
