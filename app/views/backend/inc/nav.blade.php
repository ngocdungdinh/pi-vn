<div class="panel-group nav-menu" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a href="/admin" class="accordion-toggle">
                    <span class="glyphicon glyphicon-dashboard"></span> Dashboard
                </a>
            </h4>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a href="{{ URL::to('admin/slider') }}" class="accordion-toggle">
                    <span class="glyphicon glyphicon glyphicon-picture"></span> Home slider
                </a>
            </h4>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    <span class="glyphicon glyphicon-pencil"></span> Bài viết
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse  {{ ((Request::is('admin/news*') || Request::is('admin/categories*') || Request::is('admin/tags*') || Request::is('admin/comments*') || Request::is('admin/royalties*')) ? ' show' : 'collapse') }}">
            <div class="panel-body">
                @if ( Sentry::getUser()->hasAnyAccess(['news','news.create']) )
                    <a href="{{ route('create/news') }}" class="{{ (Request::is('admin/news/create') ? ' active' : '') }}"><i class="icon-chevron-right"></i> Đăng bài mới</a>
                @endif
                <a href="{{ URL::to('admin/news') }}" class="{{ (Request::is('admin/news') ? ' active"' : '') }}"><i class="icon-chevron-right"></i> Danh sách bài</a></a>
                <a href="{{ URL::to('admin/categories') }}" class="{{ (Request::is('admin/categories*') ? ' active' : '') }}"><i class="icon-chevron-right"></i> Chuyên mục</a>
                <hr style="margin: 5px 0" />
                <a href="{{ URL::to('admin/news/statistics') }}" class="{{ (Request::is('admin/news/statistics*') ? ' active' : '') }}"><i class="icon-chevron-right"></i> Thống kê</a>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseHb">
                    <span class="fa fa-shopping-cart"></span> Sản phẩm
                </a>
            </h4>
        </div>
        <div id="collapseHb" class="panel-collapse  {{ (Request::is('admin/cart*') ? ' show' : 'collapse') }}">
            <div class="panel-body">
                <a href="{{ URL::to('admin/cart/products/create') }}" class="{{ (Request::is('admin/cart/products/create') ? ' active"' : '') }}"><i class="icon-chevron-right"></i> Thêm sản phẩm</a></a>
                <a href="{{ URL::to('admin/cart') }}" class="{{ (Request::is('admin/cart') ? ' active"' : '') }}"><i class="icon-chevron-right"></i> Sản phẩm</a></a>
                <a href="{{ URL::to('admin/cart/categories') }}" class="{{ (Request::is('admin/cart/categories*') ? ' active' : '') }}"><i class="icon-chevron-right"></i> Chuyên mục</a>
                <a href="{{ URL::to('admin/cart/attributes') }}" class="{{ (Request::is('admin/cart/attributes*') ? ' active' : '') }}"><i class="icon-chevron-right"></i> Thuộc tính</a>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
                    <span class="glyphicon glyphicon-book"></span> Trang giới thiệu
                </a>
            </h4>
        </div>
        <div id="collapseSix" class="panel-collapse {{ (Request::is('admin/intro*') ? ' show' : 'collapse') }}">
            <div class="panel-body">
                @if ( Sentry::getUser()->hasAnyAccess(['pages','pages.create']) )
                    <a href="{{ route('create/intro') }}" class="{{ (Request::is('admin/intro/create') ? ' active' : '') }}"><i class="icon-chevron-right"></i> Tạo mới</a>
                @endif
                <a href="{{ URL::to('admin/intro') }}" class="{{ (Request::is('admin/intro') ? ' active"' : '') }}"><i class="icon-chevron-right"></i> Danh sách trang</a></a>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
                    <span class="glyphicon glyphicon-book"></span> Trang dịch vụ
                </a>
            </h4>
        </div>
        <div id="collapseSeven" class="panel-collapse {{ (Request::is('admin/service*') ? ' show' : 'collapse') }}">
            <div class="panel-body">
                @if ( Sentry::getUser()->hasAnyAccess(['pages','pages.create']) )
                    <a href="{{ route('create/service') }}" class="{{ (Request::is('admin/service/create') ? ' active' : '') }}"><i class="icon-chevron-right"></i> Tạo mới</a>
                @endif
                <a href="{{ URL::to('admin/service') }}" class="{{ (Request::is('admin/service') ? ' active"' : '') }}"><i class="icon-chevron-right"></i> Danh sách trang</a></a>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                    <span class="glyphicon glyphicon-book"></span> Trang thông tin
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse {{ (Request::is('admin/pages*') ? ' show' : 'collapse') }}">
            <div class="panel-body">
                @if ( Sentry::getUser()->hasAnyAccess(['pages','pages.create']) )
                    <a href="{{ route('create/page') }}" class="{{ (Request::is('admin/pages/create') ? ' active' : '') }}"><i class="icon-chevron-right"></i> Tạo mới</a>
                @endif
                <a href="{{ URL::to('admin/pages') }}" class="{{ (Request::is('admin/pages') ? ' active"' : '') }}"><i class="icon-chevron-right"></i> Danh sách trang</a></a>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                    <span class="glyphicon glyphicon-user"></span> Người dùng
                </a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse {{ (Request::is('admin/users*') || Request::is('admin/groups*') ? ' show' : 'collapse') }}">
            <div class="panel-body">
                <a href="{{ URL::to('admin/users') }}" class="{{ (Request::is('admin/users*') ? ' active' : '') }}"><i class="icon-user"></i> Người dùng</a>
                <a href="{{ URL::to('admin/groups') }}" class="{{ (Request::is('admin/groups*') ? ' active' : '') }}"><i class="icon-user"></i> Nhóm người dùng</a>
            </div>
        </div>
    </div>
    @if ( Permission::has_access('settings', 'config'))
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
                        <span class="glyphicon glyphicon-cog"></span> Thiết lập
                    </a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collaps {{ (Request::is('admin/menus*') || Request::is('admin/widgets*') || Request::is('admin/settings*') ? ' show' : 'collapse') }}">
                <div class="panel-body">
                    <a href="{{ URL::to('admin/settings') }}" class="{{ (Request::is('admin/settings*') ? ' active' : '') }}"><i class="icon-user"></i> Thông tin chung</a>
                </div>
            </div>
        </div>
    @endif
</div>