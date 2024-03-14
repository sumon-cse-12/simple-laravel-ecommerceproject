<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" value="{{isset($category)?$category->name:(old('name'))}}" name="name" id="name" class="form-control" placeholder="Category Name">	
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="email">Slug</label>
            <input type="text" value="{{isset($category)?$category->slug:(old('slug'))}}" name="slug" id="slug" class="form-control" placeholder="Slug">	
        </div>
    </div>									
    <div class="col-md-6">
        <div class="mb-3">
            <label for="email">Description</label>
            <textarea name="description" id="" cols="4" rows="4"class="form-control" placeholder="Description">{{isset($category)?$category->description:(old('description'))}}
            </textarea>
        </div>
    </div>									
    <div class="col-md-6">
        <div class="mb-3">
            <label for="email">Image</label>
            <input type="file" name="category_image" id="category_image" class="form-control">	
        </div>
    </div>	
    <div class="col-md-12">
        <div>SEO Optimized Section</div>
    </div>
    <div class="col-md-12 mt-3">
        <div class="mb-3">
            <label for="name">Meta Title</label>
            <input type="text" value="{{isset($category)?$category->meta_title:(old('meta_title'))}}" name="meta_title" id="name" class="form-control" placeholder="Enter Meta Title">	
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name">Meta Description</label>
            <textarea name="meta_description" id="" cols="4" rows="4"class="form-control" placeholder="Enter Meta Description">{{isset($category)?$category->meta_description:(old('meta_description'))}}
            </textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name">Meta Keywords</label>
            <textarea name="meta_keywords" id="" cols="4" rows="4"class="form-control" placeholder="Enter Meta Keywords">{{isset($category)?$category->meta_keywords:(old('meta_keywords'))}}</textarea>
        </div>
    </div>								
</div>