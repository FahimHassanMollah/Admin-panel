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
                                <h4 class="card-title mb-4">Update Sub Category</h4>
                                <hr>
                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <form action="{{ route('sub-category.update',$sub_category->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row mb-4">
                                        <label for="horizontal-category-name-input" class="col-sm-2 col-form-label">Category
                                            name</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="category_id" id="">
                                                {{-- <option value="" disabled selected>Select category</option> --}}
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id === $sub_category->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                                                id="horizontal-category-name-input" value="{{ $sub_category->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="horizontal-description-input"
                                            class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea name="description" id="horizontal-description-input" cols="30"
                                                class="form-control" name="description" rows="5">{{ $sub_category->description }}</textarea>

                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="horizontal-description-input"
                                            class="col-sm-2 col-form-label">Publication status</label>
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio1" name="status" class="custom-control-input"
                                                value="1" {{ $sub_category->status === 1 ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customRadio1">Published
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3 ml-3">
                                            <input type="radio" id="customRadio2" name="status" class="custom-control-input"
                                                value="0" {{ $sub_category->status === 0 ? 'checked' : '' }}>
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
                                                <button type="submit" class="btn btn-primary w-md">Update Sub
                                                    Category</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


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
