<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
/*  HEADER */
.site-header {
  background: #1b4cbb;
  color: #fff;
  padding: 10px 2.5%; /* Memberi jarak 2.5% dari tepi layar */
  width: 100%;
}

.header-inner {
  display: flex;
  justify-content: space-between; /* Logo kiri, Nav kanan */
  align-items: center;
  width: 100%;
}

.branding {
  display: flex;
  align-items: center;
  gap: 10px;
}

.logo {
  height: 70px;
  object-fit: contain;
}

.main-nav {
  display: flex;
  gap: 15px;
}

.material-icons {
  font-size: 20px;
  vertical-align: middle;
}
.nav-button {
  padding: 8px 16px;
  background: #fff;
  color: #1b4cbb;
  text-decoration: none;
  border-radius: 4px;
  font-weight: bold;
  font-size: 0.9rem;
  transition: 0.3s;
}

.nav-button:hover {
  background: #e8eefa;
}


</style>
<header class="site-header">
    <div class="header-inner">
        <div class="branding">
            <img src="assets/img/gresik.png" alt="Logo Gresik" class="logo">
            <img src="assets/img/kominfo.png" alt="Logo Kominfo" class="logo">
        </div>

        <nav class="main-nav">
            <a href="index.php" class="nav-button">Buku Tamu <i class="material-icons">book</i></a>
            <a href="pulang.php" class="nav-button">Pulang <i class="material-icons">logout</i></a>
            <a href="https://sukma.jatimprov.go.id/home/survei?idUser=1186" class="nav-button">SKM <i class="material-icons">chat</i></a>
            <a href="login.php" class="nav-button">Login <i class="material-icons">login</i></a>
        </nav>
    </div>
</header>

</html>