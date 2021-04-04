<nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white shadow">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">
          <i class="fas fa-feather-alt fa-2x"></i>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse row" id="navbarSupportedContent">
          <?php
          if(isset($_SESSION['username'])) {
            ?>
            <ul class="navbar-nav mb-2 mb-lg-0 col-8">
              <li class="nav-item col-2 text-center">
                <a class="nav-link" aria-current="page" href="/user">
                  <!-- <i class="fas fa-home ml-1"></i> -->
                  <span>الصفحة الرئيسية</span>
                </a>
              </li>
              <li class="nav-item col-2 text-center">
                <div class="dropdown">
                  <a style="cursor: pointer" class="nav-link" type="button" aria-current="page" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span>الاعدادات</span>
                  </a>
                  <div class="dropdown-menu rounded-0" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/user/profile">
                      <i class="fas fa-cog mr-2"></i>
                      <span class="mr-2">حسابي</span>
                    </a>
                    <a class="dropdown-item" href="/user/out">
                      <i class="fas fa-door-open mr-2"></i>
                      <span class="mr-2">الخروج</span>
                    </a>
                  </div>
                </div>
              </li>
              <li class="nav-item col-2 text-center">
                <a class="nav-link" aria-current="page" href="/offer">
                  <!-- <i class="fas fa-home ml-1"></i> -->
                  <span>العروض</span>
                </a>
              </li>
              <li class="nav-item col-2 text-center">
                <a class="nav-link" aria-current="page" href="/command">
                  <!-- <i class="fas fa-home ml-1"></i> -->
                  <span>الطلبات</span>
                </a>
              </li>
            </ul>
            <?php
          } else {
            ?>
            <ul class="navbar-nav mb-2 mb-lg-0 col-8">
              <li class="nav-item col-2 text-center">
                <a class="nav-link" aria-current="page" href="/">
                  <!-- <i class="fas fa-home ml-1"></i> -->
                  <span>الصفحة الرئيسية</span>
                </a>
              </li>
              <li class="nav-item col-2 text-center">
                <div class="dropdown">
                  <a style="cursor: pointer" class="nav-link" type="button" aria-current="page" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span>التسجيل</span>
                  </a>
                  <div class="dropdown-menu rounded-0" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/user/add">
                      <i class="fas fa-user-plus mr-2"></i>
                      <span class="mr-2">مستخدم جديد</span>
                    </a>
                    <a class="dropdown-item" href="/user/login">
                      <i class="fas fa-sign-in-alt mr-2"></i>
                      <span class="mr-2">تسجيل الدخول</span>
                    </a>
                  </div>
                </div>
              </li>
            </ul>
            <?php
          }
          ?>
          <ul class="navbar-nav mb-2 mb-lg-0 col justify-content-end mr-0">
            <li class="nav-item">
              <a id="animation-stat" style="cursor: pointer" class="nav-link" aria-current="page">
                <i class="far fa-snowflake ml-1"></i>
              </a>
            </li>
            <li class="nav-item">
              <a id="side-bar-control" style="cursor: pointer" class="nav-link" aria-current="page">
                <i class="far fa-heart ml-1"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
