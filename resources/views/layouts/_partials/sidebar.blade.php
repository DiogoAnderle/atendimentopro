<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('home') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-home text-light"></i>
                </span>
                <span class="menu-title">Home</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('responsavel.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-account-tie"></i>
                </span>
                <span class="menu-title">Responsáveis</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('cliente.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-account-box-multiple text-info"></i>
                </span>
                <span class="menu-title">Clientes</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('versao_sistema.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-alarm-light-outline text-warning"></i>
                </span>
                <span class="menu-title">Versões</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('produto.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-format-list-checkbox"></i>
                </span>
                <span class="menu-title">Produtos</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#knowledge-tree" aria-expanded="false"
                aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-database-plus text-primary"></i>
                </span>
                <span class="menu-title">Conhecimento</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="knowledge-tree">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('grupo.index') }}">
                            <span class="menu-icon">
                                <i class="mdi mdi-group text-danger"></i>
                            </span>
                            <span class="menu-title">Grupos</span>
                        </a></li>

                    <li class="nav-item"> <a class="nav-link" href="{{ route('subgrupo.index') }}">
                            <span class="menu-icon">
                                <i class="mdi mdi-ungroup text-warning"></i>
                            </span>
                            <span class="menu-title">Sub-grupos</span>
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('arvore_conhecimento.index') }}">
                            <span class="menu-icon">
                                <i class="mdi mdi-tree text-success"></i>
                            </span>
                            <span class="menu-title">Arvore de Conhecimento</span>
                        </a></li>



                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('user.index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-account text-danger"></i>
                </span>
                <span class="menu-title">Usuários</span>
            </a>
        </li>
    </ul>
</nav>
