<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" value="{{isset($product)?$product->name:(old('name'))}}" name="name" id="name" class="form-control" placeholder="Product Name">	
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="status">Category</label>
            <select class="form-control" name="category_id" id="">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ isset($product) && $product->category_id == $category->id ? 'selected' : (old('category_id') == $category->id ? 'selected' : '') }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="email">Regular price</label>
            <input type="text" value="{{isset($product)?$product->regular_price:(old('regular_price'))}}" name="regular_price" id="regular_price" class="form-control" placeholder="regular price">	
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="email">Discount price</label>
            <input type="number" value="{{isset($product)?$product->discount_price:(old('discount_price'))}}" name="discount_price" id="discount_price" class="form-control" placeholder="Discount price">	
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="email">Weight</label>
            <input type="text" value="{{isset($product)?$product->weight:(old('weight'))}}" name="weight" id="weight" class="form-control" placeholder="weight">	
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="status">@lang('Status')</label>
            <select class="form-control" name="status" id="status">
                <option
                    {{ isset($product) && $product->status == 'in_stock' ? 'selected' : (old('status') == 'in_stock' ? 'selected' : '') }}
                    value="in_stock">In stock</option>
                <option
                    {{ isset($product) && $product->status == 'stock_out' ? 'selected' : (old('status') == 'stock_out' ? 'selected' : '') }}
                    value="stock_out">Stock out</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="email">Description</label>
            <textarea name="description" id="" cols="4" rows="4"class="form-control summernote" placeholder="Description">{{isset($product)?$product->description:(old('description'))}}</textarea>
        </div>
    </div>									
    <div class="col-md-6">
        <div class="mb-3">
            <label for="email">Short Description</label>
            <textarea name="short_description" id="" cols="4" rows="4"class="form-control summernote" placeholder="Short Description">{{isset($product)?$product->short_description:(old('short_description'))}}</textarea>
        </div>
    </div>									

    <div class="col-md-12">
        <div>SEO Optimized Section</div>
    </div>
    <div class="col-md-12 mt-3">
        <div class="mb-3">
            <label for="name">Meta Title</label>
            <input type="text" value="{{isset($product)?$product->meta_title:(old('meta_title'))}}" name="meta_title" id="name" class="form-control" placeholder="Enter Meta Title">	
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name">Meta Description</label>
            <textarea name="meta_description" id="" cols="4" rows="4"class="form-control" placeholder="Enter Meta Description">{{isset($product)?$product->meta_description:(old('meta_description'))}}</textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name">Meta Keywords</label>
            <textarea name="meta_keywords" id="" cols="4" rows="4"class="form-control" placeholder="Enter Meta Keywords">{{isset($product)?$product->meta_keywords:(old('meta_keywords'))}}</textarea>
        </div>
    </div>	
    <div class="col-md-6">
        @if(isset($product) && isset($product->image))
        @php $counter=7678;
        $product_images = json_decode($product->image, true);
        // dd($product_images);
        @endphp
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary float-right btn-sm add-more-product-img-btn">Add More Image</button>
            </div>
        </div>
        @foreach ($product_images as $key => $img)
       
        @php $counter++; $key++; @endphp
        <div class="row align-items-center" id="form_column_{{$counter}}">
            <div class="col-md-8">
    
                <div class="form-group">
                    <label for="image">@lang('Image') {{$key}} </label>
                    <input type="file" name="product_image[]" class="form-control" id="image">
                </div>
                {{-- <input type="hidden" value="{{isset($img)?$img:''}}"
                name="pre_product_img[]" class="form-control"> --}}
            </div>
            <div class="col-md-4">
            <button type="button" class="btn btn-danger btn-sm mt-4 remove_product_btn"
            data-id="{{$counter}}">X</button>
        </div>
        </div>
        @endforeach
    @else
        <div class="row align-items-center">
            <div class="col-md-8">
    
                <div class="form-group">
                    <label for="image">@lang('Image')</label>
                    <input type="file" name="product_image[]" class="form-control" id="image">
                </div>
                {{-- <input type="hidden" value="{{isset($product->image)?$product->image:''}}"
                name="pre_product_img[]" class="form-control"> --}}
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-primary btn-sm add-more-product-img-btn">Add More Image</button>
            </div>
        </div>
        <div id="more-product-image">
    
        </div>
        @endif
     </div>							
</div>