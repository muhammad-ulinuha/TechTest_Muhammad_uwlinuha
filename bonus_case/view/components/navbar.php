<nav class="navbar navbar-expand-lg bg-primary text-white"  style="--bs-bg-opacity: .5;">
  <div class="container">
    <div>
      <a class="navbar-brand d-flex align-items-end" href="#">
        <img src="../../../bonus_case/assets/images/Logo-MUW.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
        <h5 class="text-white">Muhammad Uwlinuha</h5>
      </a>
    </div>
      <div class="dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </svg> <?php echo $username ?>
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../../../bonus_case/controller/auth/logout.php">Logout</a></li>
          </ul>
      </div>
  </div>
</nav>