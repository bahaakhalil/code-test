@extends('layout')
@section('title', 'product')
@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <h3 class="aside-title">One Filter Products</h3>

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Price</h3>
                        <div class="price-filter">
                            <div id="price-slider"></div>
                            <form action="productPrice" method="get">
                                <div class="input-number">
                                    <input id="price-min" name="price_lte" type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                                <span>-</span>
                                <div class="input-number">
                                    <input id="price-max" name="price_gte" type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                                <button class="btn btn-block"type="submit"> send </button>
                            </form>
                        </div>

                        <h3 class="aside-title">Manufacturer</h3>
                        <form action="productbrandManufacturer" method="get">

                            <div class="input-select">
                                <input id="brandManufacturer_id" name="brandManufacturer_id" type="number">

                            </div>
                            <br>
                            <button class="btn btn-block"type="submit"> send </button>
                        </form>

                        <br>
                        <h3 class="aside-title">Brand</h3>
                        <div class="price-filter">
                            <select name="name_like" class="input-select" id="brand_select">
                                <option disabled selected>Choose Brand</option>
                            </select>
                            <input type="text" class="input-select" name="name_like" id="brand" />
                        </div>
                        <br>

                        <!-- /aside Widget -->
                    </div>
                    <br>
                    <h3 class="aside-title">All Filter Products</h3>
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Price</h3>
                        <form action="products-filter" method="get">
                            <div class="price-filter">
                                <div id="price-slider"></div>

                                <div class="input-number">
                                    <input id="price-min" name="price_lte" type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                                <span>-</span>
                                <div class="input-number">
                                    <input id="price-max" name="price_gte" type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>

                            </div>
                            <br>
                            <h3 class="aside-title">Manufacturer</h3>
                            <div class="price-filter">
                                <input id="brandManufacturer_id" name="brandManufacturer_id" type="number">
                            </div>
                            <br>
                            <h3 class="aside-title">Sale_ne</h3>
                            <div class="checkbox-filter">
                                <div class="input-checkbox">
                                    <input type="checkbox" value="1" name="sale_ne" id="sale_ne-4">
                                    <label for="sale_ne-4">
                                        <span></span>
                                        <a href="productSale?sale_ne=true">sale_ne</a>
                                    </label>
                                </div>
                            </div>
                            <br>

                            <button class="btn btn-block"type="submit"> send </button>
                        </form>
                        <br>

                        <h3 class="aside-title">Gender</h3>
                        <div class="radio-filter">
                            <div class="input-radio">
                                <input type="radio" value="girls" name="gender" id="girls-4">
                                <label for="girls-4">
                                    <span></span>
                                    <a href="productGender?gender=girls">Girls</a>
                                </label>
                            </div>

                            <div class="input-radio">
                                <input type="radio"value="boys" name="gender" id="boys-5">
                                <label for="boys-5">
                                    <span></span>
                                    <a href="productGender?gender=boys">Boys</a>
                                </label>
                            </div>

                            <div class="input-radio">
                                <input type="radio" value="both" name="gender" id="both-6">
                                <label for="both-6">
                                    <span></span>
                                    <a href="productGender?gender=both">Both</a>
                                </label>
                            </div>

                            <br>


                        </div>
                        <!-- /aside Widget -->
                    </div>
                </div>
                <!-- /ASIDE -->
                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <form action="productSort" method="get">
                            <div class="store-sort">
                                <label>
                                    Sort By:
                                    <select class="input-select" name="_sort">
                                        <option value="views">views</option>
                                        <option value="Popular">Position</option>
                                    </select>
                                </label>

                                <label>
                                    Order By:
                                    <select class="input-select" name="_order">
                                        <option value="asc">Ascending</option>
                                        <option value="desc">Descending</option>
                                    </select>
                                </label>

                                <button class="btn btn-block"type="submit"> send </button>
                            </div>
                            <ul class="store-grid">
                                <label>
                                    Show:</label>
                                <li value="10"><a href="products?_page=10">10</a></li>
                                <li value="50"><a href="products?_page=50">50</a></li>
                                <li value="100"><a href="products?_page=100">100</a></li>
                                <li value="200"><a href="products?_page=200">200</a></li>
                                <li value="500"><a href="products?_page=500">500</a></li>
                            </ul>
                        </form>
                    </div>

                    <!-- /store top filter -->
                    <!-- store products -->
                    <div class="row">
                        <!-- product -->
                        @forelse ($products as $product)
                            <div class="col-md-4 col-xs-6">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{ $product->image }}" alt="">
                                        <div class="product-label">
                                            <span class="sale">{{ $product->sale ?: 'in Stock' }}</span>
                                            <span class="new">{{ $product->gender }}</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name">
                                            <a href="{{ $product->href }}">{{ $product->name }}</a>

                                        </h3>
                                        <h4 class="product-price"> {{ $product->price }} {{ $product->currency }}
                                        </h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star">{{ $product->rating }}</i>
                                        </div>
                                        Manufacturer:{{ $product->brand->manufacturer_id }}
                                        brand:{{ $product->brand->name }}
                                        <div class="product-btns">

                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                    class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                    class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span
                                                    class="tooltipp">quick
                                                    view</span></button>
                                            Views {{ $product->views }}
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                            cart</button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h3 class="aside-title text-center">NO Data</h3>
                        @endforelse
                        <!-- /product -->
                    </div>
                    <!-- /store products -->
                
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

@endsection
@section('js')
    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#brand').keyup(function(e) {
                var name = $(this).val();
                if (name) {
                    $.ajax({
                        url: " https://staging.dumyah.com/coding-test/brands?name_like=" + name,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#brand').keydown(function(e) {
                                    $('#brand_select').empty();
                                });
                                $('#brand_select').append('<option value="' +
                                    key.name + '">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    $('#brand_select').empty();
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
