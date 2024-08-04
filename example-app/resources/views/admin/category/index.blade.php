<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Dashboard') }} -->

            All Category<b> </b>
            <b style="float:right;">

                <span class="badge badge-danger"></span>
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <x-welcome /> -->

                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <!-- Добавление алерта при редиректе обратно на All categories -->
                                @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <div class="card-header">All category</div>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <!-- Обновляем название колонок для показа данных из базы -->
                                            <th scope="col">SL No</th>
                                            <!-- <th scope="col">Name</th> -->
                                            <th scope="col">Category Name</th>
                                            <!-- <th scope="col">Email</th> -->
                                            <th scope="col">User</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <!-- @php($i = 1) -->
                                        @foreach($categories as $category)
                                        <tr>
                                            <!-- <th scope="row">{{ $i++ }}</th> -->
                                            <!-- when using pagination -->
                                            <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                            <td>{{ $category -> category_name }}</td>
                                            <!-- ORM method -->
                                            <td>{{ $category->user->name }}</td>
                                             <!-- queryBuilder method -->
                                            <!-- <td>{{ $category->name }}</td> -->
                                            <td>
                                                @if($category->created_at == NULL)
                                                <span class="text-danger">No Date Set</span>
                                                @else
                                                <!-- diffForHumans() doesn't working in query Builder (need to use carbon & braces) -->
                                                <!-- without query Builder -->
                                                <!-- комментарий в синтаксисе Blade  -->
                                            {{-- {{ $category->created_at ->diffForHumans()}} --}}
                                                <!-- with query Builder -->
                                            {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}

                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ url('softdelete/category/'.$category->id) }}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- for the pagination -->
                                {{ $categories->links() }}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">Add category</div>
                                <div class="card-body">
                                    <form action="{{ route('store.category') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category name</label>
                                            <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                            @error('category_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <button type="submit" class="btn btn-primary">Add category</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- TRASH PART -->

                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">

                                <div class="card-header">Trash List</div>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <!-- Обновляем название колонок для показа данных из базы -->
                                            <th scope="col">SL No</th>
                                            <!-- <th scope="col">Name</th> -->
                                            <th scope="col">Category Name</th>
                                            <!-- <th scope="col">Email</th> -->
                                            <th scope="col">User</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <!-- @php($i = 1) -->
                                        @foreach($trashCat as $category)
                                        <tr>
                                            <!-- <th scope="row">{{ $i++ }}</th> -->
                                            <!-- when using pagination -->
                                            <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                            <td>{{ $category -> category_name }}</td>
                                            <!-- ORM method -->
                                            <td>{{ $category->user->name }}</td>
                                             <!-- queryBuilder method -->
                                            <!-- <td>{{ $category->name }}</td> -->
                                            <td>
                                                @if($category->created_at == NULL)
                                                <span class="text-danger">No Date Set</span>
                                                @else
                                                <!-- diffForHumans() doesn't working in query Builder (need to use carbon & braces) -->
                                                <!-- without query Builder -->
                                                <!-- комментарий в синтаксисе Blade  -->
                                            {{-- {{ $category->created_at ->diffForHumans()}} --}}
                                                <!-- with query Builder -->
                                            {{ Carbon\Carbon::parse($category->created_at)->diffForHumans() }}

                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Edit</a>
                                                <a href="" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- for the pagination -->
                                {{ $trashCat->links() }}
                            </div>
                        </div>

                        <div class="col-md-4">

                        </div>

                        <!-- END TRASH -->
                    </div>
                </div>
            </div>
</x-app-layout>
