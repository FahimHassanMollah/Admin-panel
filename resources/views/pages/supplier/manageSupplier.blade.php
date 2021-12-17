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
                                <h4 class="card-title mb-4">Create New Supplier</h4>
                                <hr>

                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row mb-4">
                                        <label for="company_name" class="col-sm-2 col-form-label">Company
                                            name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="company_name" id="company_name">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="person_name" class="col-sm-2 col-form-label">Person
                                            name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="person_name" id="person_name">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="code" class="col-sm-2 col-form-label">Code
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="code" id="code">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="mobile" class="col-sm-2 col-form-label">Mobile Number
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="mobile" id="mobile">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="email" class="col-sm-2 col-form-label">Email
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="email">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="logo" class="col-sm-2 col-form-label">Supplier
                                            logo</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="logo" class="form-control" id="logo">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <textarea  id="address" cols="30" class="form-control"
                                                name="address" rows="5"></textarea>

                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="account_number" class="col-sm-2 col-form-label">Account Number
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="account_number"
                                                id="account_number">
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



                                    <div class="form-group row justify-content-end">
                                        <div class="col-sm-2">

                                        </div>
                                        <div class="col-sm-10">
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md">Create Supplier</button>
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

                                <h1 class="card-title pb-1">All Supplier informations</h1>


                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>SL No</th>
                                            <th>Company Name</th>
                                            <th>Person Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($suppliers as $supplier)
                                            <tr>
                                                <td>{{ $loop->index }}</td>
                                                <td>{{ $supplier->company_name }}</td>
                                                <td>{{ $supplier->person_name }}</td>
                                                <td>{{ $supplier->mobile }}</td>
                                                <td>{{ $supplier->email }}</td>
                                                <td>
                                                    <img style="height: 80px;witdh:'100px'"
                                                        src="{{ asset('/') . $supplier->logo }}" class="img-fluid"
                                                        alt="" srcset="">
                                                </td>
                                                <td>{{ $supplier->status === 1 ? 'Active' : 'Inactive' }}</td>


                                                <td>
                                                    {{-- <a href="{{ route('supplier.status.update', ['supplier' => $supplier->id]) }}"
                                                        class="btn btn-primary btn-sm {{ $supplier->status === 1 ? 'bg-success' : 'bg-danger' }}">
                                                        <i class="fas fa-check "></i>
                                                    </a> --}}
                                                    <a href="{{ route('supplier.edit', $supplier->id) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-edit "></i>
                                                    </a>

                                                    <form class="d-inline-block" action="{{ route('supplier.destroy', $supplier->id) }}"
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
