  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('/')?>" class="brand-link">
      <img src="<?=base_url('assets/dist/img/union.png')?>" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light"><img src="<?=base_url('assets/dist/img/union-2.png')?>" style="opacity: .8"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Propostas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?=base_url('propostas')?>" class="nav-link">
                    <p>Todas Propostas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=base_url('propostas/nova')?>" class="nav-link">
                    <p>Nova Proposta</p>
                    </a>
                </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>