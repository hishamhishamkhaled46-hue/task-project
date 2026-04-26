  <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
              <div class="nav">
                  <div class="sb-sidenav-menu-heading">Core</div>

                  <a class="nav-link <?php
                  if ($actv === "brand") {
                    echo "active";
                  }
                  ?>" href="brand.php">
                      <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                      brand
                  </a>

                  <a class="nav-link <?php
                  if ($actv === "users") {
                    echo "active";
                  }
                  ?>" href="users.php">
                      <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                      users
                  </a>

                <a class="nav-link <?php
                  if ($actv === "pr") {
                    echo "active";
                  }
                  ?>" href="pr.php">
                      <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                      pr
                  </a>

                <a class="nav-link <?php
                  if ($actv === "cat") {
                    echo "active";
                  }
                  ?>" href="category.php">
                      <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                      catagory
                  </a>                  

                  <a class="nav-link  <?php
                  if ($actv === "products") {
                    echo "active";
                  }
                  ?>" href="products.php">
                      <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                      products
                  </a>                  
                    <a class="nav-link" href="logout.php">
                      <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                      logout
                  </a>
              </div>
          </div>
 
      </nav>
  </div>