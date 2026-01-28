

  
  <body class="login-bg">

	 <!-- Form start -->
    <form action="" class="box login my-5" method="POST" autocomplete="off">
      <div class="auth-box border border-dark">
        <a href="index.html" class="mb-4 d-flex">
          <img src="<?php echo APP_URL; ?>app/views/img/logo.png" class="img-fluid login-logo" alt="AdminPro Admin Dashboard" />
        </a>
        <h4 class="my-4">FIX CARE</h4>
        <div class="mb-3">
          <label class="form-label" for="name">Inngresa tu usuario <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="name" autocomplete="autocomplete" placeholder="Ingresa tu usuario"
            name="login_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required />
        </div>
        <div class="mb-3">
          <label class="form-label" for="pwd">Ingresa tu contraseña <span class="text-danger">*</span></label>
          <input type="password" class="form-control" id="pwd" placeholder="Ingresa tu contraseña" name="login_clave" pattern="[a-zA-Z0-9$@.-]{6,100}" maxlength="100" required/>
        </div>
        <div class="d-flex align-items-center justify-content-between">
          <div class="form-check m-0">
            <input class="form-check-input" type="checkbox" value="" id="rememberPassword" />
            <label class="form-check-label" for="rememberPassword">Remember</label>
          </div>
          <a href="forgot-password.html" class="text-primary text-decoration-underline">Lost password?</a>
        </div>
        <div class="d-grid py-3 mt-3">
          <button type="submit" class="btn btn-lg btn-primary">
            LOGIN
          </button>
        </div>
      
      </div>
    </form>
    <!-- Form end -->
</body>
<?php
	if(isset($_POST['login_usuario']) && isset($_POST['login_clave'])){
		$insLogin->iniciarSesionControlador();
	}
?>