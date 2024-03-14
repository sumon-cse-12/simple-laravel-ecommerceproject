<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="{{route('admin.dashboard')}}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
       Dashboard
          <span class="right badge badge-info">New</span>
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.category.index')}}" class="nav-link">
        <i class="nav-icon far fa-calendar-alt"></i>
        <p>
         Category
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.product.index')}}" class="nav-link">
        <i class="nav-icon far fa-image"></i>
        <p>
         Products
        </p>
      </a>
    </li>   
    <li class="nav-item">
      <a href="{{route('admin.blog-category.index')}}" class="nav-link">
        <i class="nav-icon far fa-image"></i>
        <p>
        Blog Category
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.blog.index')}}" class="nav-link">
        <i class="nav-icon far fa-image"></i>
        <p>
        Blogs
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="pages/kanban.html" class="nav-link">
        <i class="nav-icon fas fa-columns"></i>
        <p>
          Orders
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.about.index')}}" class="nav-link">
        <i class="nav-icon fas fa-columns"></i>
        <p>
        About us
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.page.index')}}" class="nav-link">
        <i class="nav-icon fas fa-columns"></i>
        <p>
       Pages
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{route('admin.settings.index')}}" class="nav-link">
        <i class="nav-icon fas fa-columns"></i>
        <p>
        Settings
        </p>
      </a>
    </li>
  </ul>