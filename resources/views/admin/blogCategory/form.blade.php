<div class="form-group">
    <label for="name">Name</label>
    <input value="{{isset($blog_category)?$blog_category->name:old('name')}}" type="text" name="name" class="form-control" id="name"
           placeholder="Enter blog category name">
</div>
<div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" name="status" id="status">
        <option {{isset($blog_category) && $blog_category->status=='active'?'selected':(old('status')=='active'?'selected':'')}} value="active">Active</option>
        <option {{isset($blog_category) && $blog_category->status=='inactive'?'selected':(old('status')=='inactive'?'selected':'')}} value="inactive">Inactive</option>
    </select>
</div>