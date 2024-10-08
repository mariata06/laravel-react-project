@extends('admin.admin_master')

@section('admin')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <x-welcome /> -->

                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
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
                                <div class="card-header">All Brand</div>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <!-- Обновляем название колонок для показа данных из базы -->
                                            <th scope="col">SL No</th>
                                            <th scope="col">Brand Name</th>
                                            <th scope="col">Brand Image</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- @php($i = 1) -->
                                        @foreach($brands as $brand)
                                        <tr>
                                            <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                                            <td>{{ $brand -> brand_name }}</td>
                                            <td><img src="{{ asset($brand->brand_image) }}" style="height:40px; width:70px;"></td>
                                            <td>
                                                @if($brand->created_at == NULL)
                                                <span class="text-danger">No Date Set</span>
                                                @else
                                            {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ url('barnd/delete/'.$brand->id) }}" onclick="return confirm('Are you sure to delete')"class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- for the pagination -->
                                {{ $brands->links() }}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Add Brand</div>
                                <div class="card-body">
                                    <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Brand name</label>
                                            <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                            @error('brand_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Brand image</label>
                                            <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                            @error('brand_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <button type="submit" class="btn btn-primary">Add brand</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

@endsection
