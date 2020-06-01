<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

            @if(Auth::user()->hasAnyRole(['Super Admin']))
            <!-- Main -->
            <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
            <li><a href="{{route('dashboard.index')}}"><i class="icon-home8"></i><span>Pesebaran Pemudik</span></a></li>
            <li><a href="{{route('monitoring.index')}}"><i class="icon-magazine"></i><span>Monitoring Covid 19</span></a></li>
            <li><a href="{{route('skala-kesehatan.index')}}"><i class="icon-nbsp"></i><span>Skala Kesehatan</span></a></li>
            <li>
                <a href="#"><i class="icon-images2"></i><span>Galeri</span></a>
                <ul>
                    <li><a href="{{route('gambar.index')}}">Gambar</a></li>
                    <li><a href="{{route('video.index')}}">Video</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-air"></i><span>Screening Covid</span></a>
                <ul>
                    <li><a href="{{route('covid-pertanyaan.index')}}">Pertanyaan</a></li>
                    <li><a href="{{route('covid-skor.index')}}">Skor</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-brain"></i><span>Screening Psikis</span></a>
                <ul>
                    <li><a href="{{route('psikis-pertanyaan.index')}}">Pertanyaan</a></li>
                </ul>
            </li>
            <li><a href="{{route('user.index')}}"><i class="icon-users2"></i><span>User</span></a></li>
            <!-- /main -->
            @endif
            @if(Auth::user()->hasAnyRole(['Perangkat Desa']))
            <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
            <li><a href="{{route('dashboard.index')}}"><i class="icon-home8"></i><span>Pesebaran Pemudik</span></a></li>
            <li><a href="{{route('monitoring.index')}}"><i class="icon-magazine"></i><span>Monitoring Covid 19</span></a></li>
            <li><a href="{{route('skala-kesehatan.index')}}"><i class="icon-nbsp"></i><span>Skala Kesehatan</span></a></li>
            <li><a href="{{route('user.index')}}"><i class="icon-users2"></i><span>User</span></a></li>
            @endif
        </ul>
    </div>
</div>
