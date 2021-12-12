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

                                <h1 class="card-title pb-1"> Product informations</h1>
                                {{-- {{ dd($product) }} --}}

                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    <tr>
                                        <th style="width: 20%">Product Id</th>
                                        <td style="width: 80%">{{ $product->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Name</th>
                                        <td>{{ $product->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product code</th>
                                        <td>{{ $product->code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product model</th>
                                        <td>{{ $product->model }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product category</th>
                                        <td>{{ $product->category->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product subcategory</th>
                                        <td>{{ $product->subcategory->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product brand</th>
                                        <td>{{ $product->brand->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product unit</th>
                                        <td>{{ $product->unit->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product regular price</th>
                                        <td>{{ $product->regular_price }} </td>
                                    </tr>
                                    <tr>
                                        <th>Product selling price</th>
                                        <td>{{ $product->selling_price }}</td>
                                    </tr>

                                    <tr>
                                        <th>Product meta tag</th>
                                        <td>{{ $product->meta_tag }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product meta description</th>
                                        <td>{{ $product->meta_description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product short description</th>
                                        <td>{{ $product->short_description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product long description</th>
                                        <td>{!! $product->long_description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Product feature image</th>
                                        <td><img class="img-fluid" src="{{ asset($product->image) }}"  style="height: 400px;width:400px" alt=""> </td>
                                    </tr>
                                    <tr>
                                        <th>Product other images</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Product status</th>
                                        <td>{{ $product->status === 1 ? 'Active' : 'inactive' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Minimum stock amount</th>
                                        <td></td>
                                    </tr>

                                </table>
                                <table class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <tr>
                                        <th style="width: 20%">Product avilable color </th>
                                        <td style="width: 80%">
                                            @foreach ($product->colors as $color)
                                                <div>{{ $color->name }}</div>
                                            @endforeach
                                        </td>

                                    </tr>
                                    <tr>
                                        <th style="width: 20%">Product other images </th>
                                        <td style="width: 80%">
                                            @foreach ($product->otherImages as $image)
                                                <div><img class="img-fluid my-1" src="{{ asset($image->image) }}" alt=""
                                                        style="height: 200px;width:200px"> </div>
                                            @endforeach
                                        </td>

                                    </tr>
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
