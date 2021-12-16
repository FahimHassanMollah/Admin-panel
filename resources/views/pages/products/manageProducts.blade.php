@extends('layouts.master')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->

                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                  @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <h1 class="card-title pb-1">All products informations</h1>


                                <table id="datatable" class="table table-bordered  "
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>SL No</th>
                                            <th>Product Name</th>
                                            <th>Product Category</th>
                                            <th>Product Brand</th>
                                            <th>Product Code</th>
                                            <th>Product Descrption</th>

                                            <th>Product Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $loop->index }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->category->name }}</td>
                                                <td>{{ $product->brand->name }}</td>
                                                <td>{{ $product->code }}</td>
                                                <td>{{ $product->short_description }}</td>

                                                <td>{{ $product->status === 1 ? 'Active' : 'Inactive' }}</td>


                                                <td>
                                                    {{-- <a href="{{ route('color.status.update', ['color' => $color->id]) }}"
                                                        class="btn btn-primary btn-sm {{ $color->status === 1 ? 'bg-success' : 'bg-danger' }}">
                                                        <i class="fas fa-check "></i>
                                                    </a> --}}
                                                    <a href="{{ route('product.details', $product->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        View
                                                    </a>
                                                    <a href="{{ route('product.edit', $product->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        Edit
                                                    </a>
                                                    {{-- <a href="{{ route('color.edit', $color->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit "></i>
                                                    </a> --}}

                                                    <form class="d-inline-block" action="{{ route('product.destroy', $product->id) }}"
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
