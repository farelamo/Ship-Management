<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">SSMS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SSMS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link"
                            href="{{ url('dashboard-general-dashboard') }}">General Dashboard</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fa-solid fa-ship ml-1"></i><span>Deck Ops</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link"
                            href="{{ url('dokumen-kapal') }}">Dokumen Kapal</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ url('daftar-crew') }}">Daftar Crew</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ url('noon-posision') }}">Noon Posision</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ url('pms-deck') }}">PMS Deck</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ url('docking-deck-dept') }}">Docking Deck Dept</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-tools"></i><span>Enginee Ops</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link"
                            href="{{ url('pms-engine') }}">PMS Engine</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ url('rob-engine') }}">ROB Engine</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ url('docking') }}">Rencana Docking</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fa-brands fa-docker ml-1"></i><span>Cargo Ops</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link"
                            href="{{ url('manivest-kapal') }}">Manivest Kapal</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ url('stowage-plan') }}">Stowage Plan</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ url('report-cargo-handling') }}">Report Cargo Handling</a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
