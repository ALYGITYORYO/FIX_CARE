
  <!-- Page wrapper start -->
    <div class="page-wrapper">

      <!-- Main container start -->
      <div class="main-container">

        <!-- Sidebar wrapper start -->
        <nav id="sidebar" class="sidebar-wrapper">

          <!-- App brand starts -->
          <div class="app-brand p-3 d-flex align-items-center">
            <a href="index.html">
              <img src="<?=APP_URL; ?>app/views/images/logo.svg" class="logo" alt="Glossy Admin Template" />
            </a>
          </div>
          <!-- App brand ends -->

          <!-- Sidebar menu starts -->
          <div class="sidebarMenuScroll">
            <ul class="sidebar-menu">
            <?php
            if(isset($_SESSION['menu']) && !empty($_SESSION['menu'])){
				$menuData = $_SESSION['menu'];
				
				if(is_string($menuData)){
					$menuArray = json_decode($menuData, true);
				} else {
					$menuArray = $menuData;
				}
				
				foreach($menuArray as $item){
					$listaBlanca[] = $item['ruta'];
          if(isset($item['ruta']) && isset($item['icono']) && isset($item['nombre'])){
          echo '<li>
                <a href="'.APP_URL.$item['ruta'].'/">
                  <i class="'.$item['icono'].'"></i>
                  <span class="menu-text">'.$item['nombre'].'</span>
                </a>
              </li>';
				}
			}
      }
      ?>
            
            </ul>
                     </ul>
          </div>
          <!-- Sidebar menu ends -->

        </nav>
        <!-- Sidebar wrapper end -->
