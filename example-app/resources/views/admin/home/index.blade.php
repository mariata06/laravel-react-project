@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="container">
                    <div class="row">

                        <h2>Home About</h2>
                        <br>
                        <a href="{{ route('add.about') }}"><button class="btn btn-info">Add about</button></a>

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
                                <div class="card-header">All About Data</div>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <!-- Обновляем название колонок для показа данных из базы -->
                                            <th scope="col" width="5%">SL</th>
                                            <th scope="col" width="15%">About Title</th>
                                            <th scope="col" width="25%">short description</th>
                                            <th scope="col" width="25%">long description</th>
                                            <th scope="col" width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                        @foreach($homeabout as $about)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $about -> title }}</td>
                                            <td>{{ $about -> short_desc }}</td>
                                            <td>{{ $about -> long_desc }}</td>
                                            <td>
                                                <a href="{{ url('about/edit/'.$about->id) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ url('about/delete/'.$about->id) }}" onclick="return confirm('Are you sure to delete')"class="btn btn-danger">Delete</a>
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
