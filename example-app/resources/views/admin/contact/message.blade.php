@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container">
                    <div class="row">

                        <h2>Admin Message</h2>
                        <br>

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
                                <div class="card-header">All Message Data</div>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <!-- Обновляем название колонок для показа данных из базы -->
                                            <th scope="col" width="5%">SL</th>
                                            <th scope="col" width="15%">Name</th>
                                            <th scope="col" width="25%">Email</th>
                                            <th scope="col" width="25%">Subject</th>
                                            <th scope="col" width="15%">Message</th>
                                            <th scope="col" width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                        @foreach($messages as $mess)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $mess->name }}</td>
                                            <td>{{ $mess->email }}</td>
                                            <td>{{ $mess->subject }}</td>
                                            <td>{{ $mess->message }}</td>
                                            <td>
                                                <a href="{{ url('message/delete/'.$mess->id) }}" onclick="return confirm('Are you sure to delete')"class="btn btn-danger">Delete</a>
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
