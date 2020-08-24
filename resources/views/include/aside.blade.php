<div class="app-sidebar__inner">
    <ul class="vertical-nav-menu">
        <li class="app-sidebar__heading">Homepage</li>
        <li>
            <a href="index.html" class="mm-active">
                <i class="metismenu-icon pe-7s-rocket"></i>
                Dashboard Example 1
            </a>
        </li>
        <li class="app-sidebar__heading">Master</li>
        <li>
            <a href="#">
                <i class="metismenu-icon pe-7s-diamond"></i>
                Produk
                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
            </a>
            <ul>
                <li>
                    <a href="{{ route('Product.all') }}">
                        <i class="metismenu-icon"></i>
                        Semua Produk
                    </a>
                </li>
                <li>
                    <a href="{{ route('Product.list') }}">
                        <i class="metismenu-icon">
                        </i>Produk Saya
                    </a>
                </li>                
            </ul>
        </li>        
        <li>
            <a href="charts-chartjs.html">
                <i class="metismenu-icon pe-7s-graph2">
                </i>ChartJS
            </a>
        </li>        
    </ul>
</div>