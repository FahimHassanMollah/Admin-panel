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
                                <h4 class="card-title mb-4">Create New Product</h4>
                                <hr>
                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <form action="{{ route('product.create') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label for="horizontal-category-name-input" class="col-sm-2 col-form-label">Select
                                            Category
                                        </label>
                                        <div class="col-sm-10">
                                            <select name="category_id" id="category" class="form-control">
                                                @foreach ($categories as $category)
                                                    <option {{ $product->category_id === $category->id ? 'selected' :'' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="horizontal-category-name-input" class="col-sm-2 col-form-label">Select
                                            Subcategory
                                        </label>
                                        <div class="col-sm-10">
                                            <select name="sub_category_id" id="subcategory" class="form-control">
                                                @foreach ($subcategories as $subcategorie)
                                                    <option value="{{ $subcategorie->id }}">{{ $subcategorie->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="horizontal-description-input" class="col-sm-2 col-form-label">Select
                                            Brnad</label>
                                        <div class="col-sm-10">
                                            <select name="brand_id" id="" class="form-control">
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="horizontal-description-input" class="col-sm-2 col-form-label">Select
                                            Unit</label>
                                        <div class="col-sm-10">
                                            <select name="unit_id" id="" class="form-control">
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    {{-- <div class="form-group row mb-4">
                                        <label for="horizontal-description-input" class="col-sm-2 col-form-label">Select
                                            Color</label>
                                        <div class="col-sm-10">
                                            @foreach ($colors as $color)
                                                <div class="custom-control custom-checkbox mb-3">

                                                    <input type="checkbox" name="color[]" value="{{ $color->id }}"
                                                        class="custom-control-input" id=" {{'color'.$color->id }} ">
                                                    <label class="custom-control-label" for="{{'color'.$color->id }} ">
                                                        {{ $color->name }}</label>
                                                </div>
                                            @endforeach



                                        </div>
                                    </div> --}}
                                    <div class="form-group row mb-4">
                                        <label for="horizontal-description-input" class="col-sm-2 col-form-label">Select
                                            Color</label>
                                        <div class="col-sm-10">
                                            @foreach ($colors as $color)
                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input name="color_id[]" value="{{ $color->id }}" type="checkbox"
                                                        class="custom-control-input" id="{{'color'.$color->id }}">
                                                    <label class="custom-control-label" for="{{'color'.$color->id }}">
                                                        {{ $color->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>



                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="horizontal-description-input" class="col-sm-2 col-form-label">Select
                                            Size</label>
                                        <div class="col-sm-10">
                                            @foreach ($sizes as $size)
                                                <div class="custom-control custom-checkbox mb-3">
                                                    <input name="size_id[]" value="{{ $size->id }}" type="checkbox"
                                                        class="custom-control-input" id="{{ $size->id }}">
                                                    <label class="custom-control-label" for="{{ $size->id }}">
                                                        {{ $size->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>



                                    </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="product-name" class="col-sm-2 col-form-label">Product Name
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="product-name">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="product-name" class="col-sm-2 col-form-label">Product Code
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="code" class="form-control" id="product-name">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="product_model" class="col-sm-2 col-form-label">Product Model
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="model" class="form-control" id="product_model">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="regular_price" class="col-sm-2 col-form-label">Regular Price
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="regular_price" class="form-control" id="regular_price">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="selling_price" class="col-sm-2 col-form-label">Selling Price
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="selling_price" class="form-control" id="selling_price">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="meta_tag" class="col-sm-2 col-form-label">Meta Tag
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="meta_tag" class="form-control" id="meta_tag">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="meta_description" class="col-sm-2 col-form-label">Meta Descrption
                                </label>
                                <div class="col-sm-10">

                                    <textarea name="meta_description" class="form-control" id="" cols="30"
                                        rows="2"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="short_description" class="col-sm-2 col-form-label">Product Short
                                    Descrption
                                </label>
                                <div class="col-sm-10">

                                    <textarea name="short_description" class="form-control" id="" cols="30"
                                        rows="3"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="long_description" class="col-sm-2 col-form-label">Product Long
                                    Descrption
                                </label>
                                <div class="col-sm-10">

                                    <textarea name="long_description" class="form-control summernote" id="" ></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-image-input" class="col-sm-2 col-form-label">Feature
                                    Image</label>
                                <div class="col-sm-10">
                                    <input type="file" accept="image/*" name="image" class="form-control" id="">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-image-input" class="col-sm-2 col-form-label">Other
                                    Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="other_images[]" class="form-control" accept="image/*" multiple
                                        i>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-description-input" class="col-sm-2 col-form-label">
                                    Status</label>
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
                                <div class="col-10">
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-block ">Create
                                            product</button>
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

@section('script')
    <script>
        $('#category').on('change', function(e) {
            const categoryId = e.target.value;
            $.get('/sub-categories/' + categoryId, function(data) {
                $('#subcategory').empty();
                $(data).each(function(index, subCat) {
                    console.log(subCat);
                    $('#subcategory').append('<option value=' + subCat.id + ' > ' + subCat.name +
                        ' </option>');
                });
            });

        });
    </script>
@endsection
