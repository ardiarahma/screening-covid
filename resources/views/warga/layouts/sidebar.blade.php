<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

            <!-- Main -->
            <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
            <li><a href="{{route('dashboard.index')}}"><i class="icon-home4"></i><span>Dashboard</span></a></li>
            @if(Auth::user()->hasRole('Super Admin'))
            
            <li><a href="{{route('pertanyaan.index')}}"><i class="icon-help"></i><span>Pertanyaan</span></a></li>

            <li><a href="{{route('user.index')}}"><i class="icon-user"></i><span>User</span></a></li>
            <!-- /main -->
            @endif
        </ul>
    </div>
</div>
