<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./index.php">Hak Akses</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../barang/index.php">Barang</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../pengguna/index.php">pengguna</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#">
                    <?php echo $_SESSION['nama'] ?? "" ?>
                </a>
            </li>
            <li>
                <a href="./logout.php">Log out</a>
            </li>
        </ul>
    </div>
  </div>
</nav>
<br>