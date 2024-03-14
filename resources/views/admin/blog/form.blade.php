<div class="form-group">
    <label for="status">Category</label>
    <select class="form-control" name="blog_category_id" id="">
        @foreach($blog_categories as $category)
            <option value="{{$category->id}}" {{isset($blog) && $blog->blog_category_id==$category->id?'selected':(old('category_id')==$category->id?'selected':'')}}>{{$category->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="name">Title</label>
    <input value="{{isset($blog)?$blog->title:old('title')}}" type="text" name="title" class="form-control" id="title"
           placeholder="Enter Title">
</div>
<div class="form-group">
    <label for="name">Description</label>
    <textarea name="description" class="form-control summernote" id="" cols="4" rows="4">{{isset($blog)?$blog->description:old('description')}}</textarea>
</div>

<div class="form-group">
    <label for="name">Image</label>
    <input type="file" name="blog_image" class="form-control" id="title">
</div>
<div class="form-group">
    <label for="status">status</label>
    <select class="form-control" name="status" id="status">
        <option {{isset($blog) && $blog->status=='published'?'selected':(old('status')=='published'?'selected':'')}} value="published">Published</option>
        <option {{isset($blog) && $blog->status=='unpublished'?'selected':(old('status')=='unpublished'?'selected':'')}} value="unpublished">Unpublished</option>
    </select>
</div>