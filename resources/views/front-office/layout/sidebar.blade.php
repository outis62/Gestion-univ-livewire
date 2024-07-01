<div class="container-fluid">

    <div id="two-column-menu">
    </div>
    <ul class="navbar-nav" id="navbar-nav">
        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarDashboards" role="button">
                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
            </a>
        </li>
        <li>
            <a href="{{ route('cooperatives.users.index') }}" class="nav-link :active" data-key="t-crm">
                <i class="ri-user-3-line"></i><span>Utilisateurs</span>
            </a>
        </li>

        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Metiers</span></li>
        <li class="nav-item">
            <a class="nav-link menu-link" href="{{ route('collecte.index') }}" role="button">
                <i class="bx bx-collection"></i> <span data-key="t-base-ui">Collectes</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="{{ route('commercialisation.index') }}" role="button">
                <i class="ri-pages-line"></i> <span data-key="t-pages">Offres</span>
            </a>
        </li>

        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Paramètres</span>
        </li>

        <li class="nav-item">
            <a class="nav-link menu-link" href="{{ route('moyen-stockage.index') }}" role="button">
                <i class="ri-store-line "></i> <span data-key="t-base-ui">Moyen de stockage</span>
            </a>
        </li>
    </ul>
</div>
</div>

<div class="sidebar-background"></div>
