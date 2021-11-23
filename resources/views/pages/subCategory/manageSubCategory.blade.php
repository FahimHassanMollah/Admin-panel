@extends('layouts.master')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->

                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Create New Sub Category</h4>
                                <hr>
                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <form action="{{ route('sub-category.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label for="horizontal-category-name-input" class="col-sm-2 col-form-label">Category
                                            name</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="category_id" id="">
                                                <option value="" disabled selected>Select category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="horizontal-category-name-input"
                                            class="col-sm-2 col-form-label">Subcategory
                                            name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name"
                                                id="horizontal-category-name-input">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="horizontal-description-input"
                                            class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea name="description" id="horizontal-description-input" cols="30"
                                                class="form-control" name="description" rows="5"></textarea>

                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="horizontal-description-input"
                                            class="col-sm-2 col-form-label">Publication status</label>
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio1" name="status" class="custom-control-input"
                                                value="1">
                                            <label class="custom-control-label" for="customRadio1">Published
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3 ml-3">
                                            <input type="radio" id="customRadio2" name="status" class="custom-control-input"
                                                value="0">
                                            <label class="custom-control-label" for="customRadio2">Unpublished</label>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="horizontal-image-input" class="col-sm-2 col-form-label">Sub Category
                                            Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="image" class="form-control"
                                                id="horizontal-image-input">
                                        </div>
                                    </div>


                                    <div class="form-group row justify-content-end">
                                        <div class="col-sm-2">

                                        </div>
                                        <div class="col-sm-10">
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md">Create Sub
                                                    Category</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h1 class="card-title pb-1">All Sub Category informations</h1>


                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>SL No</th>
                                            <th>Sub Category Name</th>
                                            <th>Category Name</th>
                                            <th>Descrption</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($sub_categories as $sub_category)
                                            <tr>
                                                <td>{{ $loop->index }}</td>
                                                <td>{{ $sub_category->name }}</td>
                                                <td>{{ $sub_category->category->name }}</td>
                                                <td>{{ $sub_category->description }}</td>
                                                <td>
                                                    <img style="height: 80px;witdh:'100px'"
                                                        src="{{ asset('/') . $sub_category->image }}"
                                                        class="img-fluid" alt="" srcset="">
                                                </td>
                                                <td>{{ $sub_category->status === 1 ? 'Active' : 'Inactive' }}</td>


                                                <td>
                                                    <a href="{{ route('sub-category.status.update', ['subcategory' => $sub_category->id]) }}"
                                                        class="btn btn-primary btn-sm {{ $sub_category->status === 1 ? 'bg-success' : 'bg-danger' }}">
                                                        <i class="fas fa-check "></i>
                                                    </a>
                                                    <a href="{{ route('sub-category.edit', $sub_category->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit "></i>
                                                    </a>

                                                    <form class="d-inline-block"
                                                        action="{{ route('sub-category.destroy', $sub_category->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm d-inline-block">
                                                            <i class="fas fa-trash-alt "></i>

                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <!-- Modal -->

        <!-- end modal -->

        @include('includes.footer')
    </div>
    <!-- end main content-->
@endsection
