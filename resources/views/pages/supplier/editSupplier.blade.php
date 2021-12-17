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
                                <h4 class="card-title mb-4">Edit Supplier</h4>
                                <hr>

                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                <form action="{{ route('supplier.update',$supplier->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="form-group row mb-4">
                                        <label for="company_name" class="col-sm-2 col-form-label">Company
                                            name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="company_name" id="company_name" value="{{ $supplier->company_name }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="person_name" class="col-sm-2 col-form-label">Person
                                            name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="person_name" id="person_name" value="{{ $supplier->person_name }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="code" class="col-sm-2 col-form-label">Code
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="code" id="code" value="{{ $supplier->code }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="mobile" class="col-sm-2 col-form-label">Mobile Number
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="mobile" id="mobile" value="{{ $supplier->mobile }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="email" class="col-sm-2 col-form-label">Email
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="email" value="{{ $supplier->email }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="logo" class="col-sm-2 col-form-label">Supplier
                                            logo</label>
                                            <div>
                                                <img style="height: 150px" src="{{ asset($supplier->logo) }}" alt="">
                                            </div>
                                        <div class="col-sm-10">
                                            <input type="file" name="logo" class="form-control" id="logo">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <textarea  id="address" cols="30" class="form-control"
                                                name="address" rows="5">{{ $supplier->address }}</textarea>

                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="account_number" class="col-sm-2 col-form-label">Account Number
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="account_number"
                                                id="account_number" value="{{ $supplier->account_number }}">
                                        </div>
                                    </div>


                                    <div class="form-group row mb-4">
                                        <label for="horizontal-description-input"
                                            class="col-sm-2 col-form-label">Publication status</label>
                                        <div class="custom-control custom-radio mb-3">
                                            <input type="radio" id="customRadio1" name="status" class="custom-control-input"
                                                value="1" {{ $supplier->status === 1 ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customRadio1">Published
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3 ml-3">
                                            <input type="radio" id="customRadio2" name="status" class="custom-control-input"
                                                value="0" {{ $supplier->status === 0 ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customRadio2">Unpublished</label>
                                        </div>
                                    </div>



                                    <div class="form-group row justify-content-end">
                                        <div class="col-sm-2">

                                        </div>
                                        <div class="col-sm-10">
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md">Update Supplier</button>
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
