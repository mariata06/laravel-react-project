@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <x-welcome /> -->

                <div class="container">
                    <div class="row">

                        <h2>Home Slider</h2>
                        <br>
                        <a href="{{ route('add.slider') }}"><button class="btn btn-info">Add slider</button></a>

                        <br>
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
                                <div class="card-header">All Slider</div>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <!-- Обновляем название колонок для показа данных из базы -->
                                            <th scope="col" width="5%">SL</th>
                                            <th scope="col" width="15%">Slider Title</th>
                                            <th scope="col" width="25%">Slider description</th>
                                            <th scope="col" width="15%">Image</th>
                                            <th scope="col" width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                        @foreach($sliders as $slider)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $slider -> title }}</td>
                                            <td>{{ $slider -> description }}</td>
                                            <td><img src="{{ asset($slider->image) }}" style="height:40px; width:70px;"></td>

                                            <td>
                                                <a href="{{ url('slider/edit/'.$slider->id) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ url('slider/delete/'.$slider->id) }}" onclick="return confirm('Are you sure to delete')"class="btn btn-danger">Delete</a>
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
