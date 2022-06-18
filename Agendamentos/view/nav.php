<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <h1 class="logo"><img src="assets/img/logo-agendaai.svg" alt=""><a href="index.php">AgendaAí<span>.</span></a>
        </h1>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="catalog-page.php">Agendar</a></li>
                <li><a href="#">Serviços</a></li>
                <li><a href="#">
                        <?php
                        //gets username
                        //                        $agdM->getUserName($_SESSION['email']);
                        //                        echo $_SESSION['user'];
                        ?>
                        <i class="bi bi-person-circle"
                           style="font-size: 2rem; color: #106eea; margin-left:10px;"></i></a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
    <script src="assets/js/nav.js"></script>
</header>