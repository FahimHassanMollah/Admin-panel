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
                                <h4 class="card-title mb-4">Update Product</h4>
                                <hr>
                                @if (session('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <form action="{{ route('product.update',['product'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-group row mb-4">
                                        <label for="horizontal-category-name-input" class="col-sm-2 col-form-label">Select
                                            Category
                                        </label>
                                        <div class="col-sm-10">
                                            <select name="category_id" id="category" class="form-control">
                                                @foreach ($categories as $category)
                                                    <option {{ $product->category_id === $category->id ? 'selected' : '' }}
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
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
                                                @foreach ($subcategories as $subcategory)
                                                    <option
                                                        {{ $product->sub_category_id === $subcategory->id ? 'selected' : '' }}
                                                        value="{{ $subcategory->id }}">{{ $subcategory->name }}
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
                                                    <option {{ $product->brand_id === $brand->id ? 'selected' : '' }}
                                                        value="{{ $brand->id }}">{{ $brand->name }}</option>
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
                                                    <option {{ $product->unit_id === $unit->id ? 'selected' : '' }}
                                                        value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    {{-- {{ @foreach ($product->units as $un) $un->id === $unit->id ? 'c'   @endforeach }} --}}
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
                                                    <input @foreach ($product->colors as $clr) {{ $clr->id === $color->id ? 'checked' : '' }}   @endforeach name="color_id[]"
                                                        value="{{ $color->id }}" type="checkbox"
                                                        class="custom-control-input" id="{{ 'color' . $color->id }}">
                                                    <label class="custom-control-label" for="{{ 'color' . $color->id }}">
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
                                                    <input @foreach ($product->sizes as $sz) {{ $sz->id === $size->id ? 'checked' : '' }}   @endforeach name="size_id[]"
                                                        value="{{ $size->id }}" type="checkbox"
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
                                    <input type="text" value="{{ $product->name }}" name="name" class="form-control"
                                        id="product-name">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="product-name" class="col-sm-2 col-form-label">Product Code
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="code" class="form-control" value="{{ $product->code }}"
                                        id="product-name">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="product_model" class="col-sm-2 col-form-label">Product Model
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="model" value="{{ $product->model }}" class="form-control"
                                        id="product_model">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="regular_price" class="col-sm-2 col-form-label">Regular Price
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="regular_price" class="form-control"
                                        value="{{ $product->regular_price }}" id="regular_price">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="selling_price" class="col-sm-2 col-form-label">Selling Price
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="selling_price" class="form-control"
                                        value="{{ $product->selling_price }}" id="selling_price">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="meta_tag" class="col-sm-2 col-form-label">Meta Tag
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="meta_tag" value="{{ $product->meta_tag }}"
                                        class="form-control" id="meta_tag">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="meta_description" class="col-sm-2 col-form-label">Meta Descrption
                                </label>
                                <div class="col-sm-10">

                                    <textarea name="meta_description" class="form-control" id="" cols="30" rows="2">{{ $product->meta_description }}
                                        </textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="short_description" class="col-sm-2 col-form-label">Product Short
                                    Descrption
                                </label>
                                <div class="col-sm-10">

                                    <textarea name="short_description" class="form-control" id="" cols="30" rows="3">{{ $product->short_description }}
                                        </textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="long_description" class="col-sm-2 col-form-label">Product Long
                                    Descrption
                                </label>
                                <div class="col-sm-10">

                                    <textarea name="long_description" class="form-control summernote" id="">{{ $product->long_description }}
                                        </textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-image-input" class="col-sm-2 col-form-label">Feature
                                    Image</label>
                                <div class="col-sm-10">
                                    <input type="file" accept="image/*" name="image" class="form-control" id="">
                                    <div>
                                        <img src="{{ asset($product->image) }}" style="height: 100px" alt="">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group row mb-4">
                                <label for="horizontal-image-input" class="col-sm-2 col-form-label">Other
                                    Image</label>
                                <div class="col-sm-10">
                                    <input type="file" name="other_images[]" class="form-control" accept="image/*"
                                        multiple >
                                        <div>
                                            @foreach($product->otherImages as $image)
                                                  <img src="{{ asset($image->image) }}" style="height: 100px" alt="">
                                            @endforeach
                                        </div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="horizontal-description-input" class="col-sm-2 col-form-label">
                                    Status</label>
                                <div class="custom-control custom-radio mb-3">
                                    <input type="radio" id="customRadio1" name="status" class="custom-control-input"
                                        value="1" {{ $product->status === 1 ? 'checked' :'' }}>
                                    <label class="custom-control-label" for="customRadio1">Published
                                    </label>
                                </div>
                                <div class="custom-control custom-radio mb-3 ml-3">
                                    <input type="radio" id="customRadio2" name="status" class="custom-control-input"
                                        value="0"  {{ $product->status === 0 ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customRadio2">Unpublished</label>
                                </div>
                            </div>
                            <div class="form-group row justify-content-end">
                                <div class="col-sm-2">

                                </div>
                                <div class="col-10">
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-block ">Update
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
