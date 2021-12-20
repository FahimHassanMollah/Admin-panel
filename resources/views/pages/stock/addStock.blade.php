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
                                <h4 class="card-title mb-4">Create New Stock</h4>
                                <hr>

                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row mb-4">
                                        <label for="company_name" class="col-sm-2 col-form-label">Stock date</label>
                                        <div class="col-sm-10">
                                            <input type="datetime-local" class="form-control" name="company_name"
                                                id="company_name">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label for="person_name" class="col-sm-2 col-form-label">Chalan Number
                                        </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="person_name" id="person_name">
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

                                <div class="row">
                                    <div class="col-12">
                                        <table id="datatable" class="table table-bordered "
                                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Supplier Name</th>
                                                    <th>Product Name</th>
                                                    <th>Product Size</th>
                                                    <th>Product Color</th>
                                                    <th>Unit Price</th>
                                                    <th>Stock ammount</th>
                                                    <th>Total price</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>

                                            <tbody id="t-body">
                                                {{-- {{ dd($colors) }} --}}
                                                <tr>
                                                    <td>
                                                        <select class="form-control" name="" id="">

                                                            @foreach ($suppliers as $supplier)
                                                                <option value="{{ $supplier->id }}">
                                                                    {{ $supplier->company_name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="" id="">

                                                            @foreach ($products as $product)
                                                                <option value="{{ $product->id }}">{{ $product->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </td>
                                                    <td>
                                                        @foreach ($sizes as $size)
                                                            <div class="custom-control custom-checkbox mb-3">
                                                                <input name="size_id[]" value="{{ $size->id }}"
                                                                    type="checkbox" class="custom-control-input"
                                                                    id="{{ $size->id }}">
                                                                <label class="custom-control-label"
                                                                    for="{{ $size->id }}">
                                                                    {{ $size->name }}</label>
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($colors as $color)
                                                            <div class="custom-control custom-checkbox mb-3">
                                                                <input name="color_id[]" value="{{ $color->id }}"
                                                                    type="checkbox" class="custom-control-input"
                                                                    id="{{ 'color' . $color->id }}">
                                                                <label class="custom-control-label"
                                                                    for="{{ 'color' . $color->id }}">
                                                                    {{ $color->name }}</label>
                                                            </div>
                                                        @endforeach
                                                    </td>

                                                    <td>
                                                        <input type="number">
                                                    </td>
                                                    <td>
                                                        <input type="number">
                                                    </td>
                                                    <td>
                                                        <input type="number">
                                                    </td>

                                                    <td>
                                                        <button id="addStockBtn" class="btn btn-primary">+ Add</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
@section('script')
    <script>
        $number = 0;
         function deleteRow(r) {
                    var i = r.parentNode.parentNode.rowIndex;
                    document.getElementById("datatable").deleteRow(i);
                }
        $('#addStockBtn').on('click', function(e) {
            const categoryId = e.target.value;

            $.get('/get-all-data-for-stock', function(data) {

                let sizes = '';
                data.sizes.map((size) => {
                    sizes = sizes + `
                         <div class="custom-control custom-checkbox mb-3">
                             <input name="size_id[]" value="${size.id}" type="checkbox" class="custom-control-input" id="${size.id+'size'+$number}">
                             <label class="custom-control-label" for="${size.id+'size'+$number}"> ${size.name}</label>
                         </div>
                    `
                });
                let colors = '';
                data.colors.map((color) => {
                    colors = colors + `
                         <div class="custom-control custom-checkbox mb-3">
                             <input name="color_id[]" value="${color.id}" type="checkbox" class="custom-control-input" id="${color.id+'color'+$number}">
                             <label class="custom-control-label" for="${color.id+'color'+$number}"> ${color.name}</label>
                         </div>
                    `
                });
                let suppliers = '';
                data.suppliers.map((supplier) => {
                    suppliers = suppliers +
                        `<option value="${supplier.id}"> ${supplier.company_name}</option> `
                })
                let products = '';
                data.products.map((product) => {
                    products = products + `<option value="${product.id}"> ${product.name}</option>`
                })
                console.log(products[0]);


                const tr = `
                    <tr>
                        <td>
                           <select class="form-control" name="" id="">
                                ${suppliers}
                             </select>
                        </td>

                        <td>
                            <select class="form-control" name="" id="">
                                ${products}
                             </select>
                        </td>

                        <td>
                            ${colors}

                        </td>
                        <td>
                            ${sizes}

                        </td>

                        <td>
                            <input type="number">
                        </td>

                        <td>
                            <input type="number">
                        </td>

                        <td>
                            <input type="number">
                        </td>
                        <td>
                            <button id="addStockBtn" onclick="deleteRow(this)"  class="btn btn-danger">delete</button>
                        </td>
                    </tr>

                `;
                $('#t-body').append(tr);
                // $('#subcategory').empty();
                // $(data).each(function(index, subCat) {
                //     console.log(subCat);
                //     $('#subcategory').append('<option value=' + subCat.id + ' > ' + subCat.name +
                //         ' </option>');
                // });
            });

        });
    </script>
@endsection
