<?php

use model\AgendamentosModel;

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

if (file_exists("../model/Conexao.php")) {
//    if($_SESSION['email']) {
//        if ($_SESSION['email'] != "") {
//            header("Location: ../view/catalog-page.php");
//        }
//    }

    require_once "../model/Conexao.php";
    require_once "../model/AgendamentosModel.php";

    try {
        //creates object of Conexao
        $con = new Conexao();

        //creates object of AgendamentosModel
        $agdM = new AgendamentosModel();

        //establishes connection
        $con->connect();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
//echo $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>AgendaAí - Agendamento de serviços</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/catalog-bootstrap.min.css">
    <link href="../assets/img/logo-agendaai.svg" rel="icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="../assets/css/catalog-search-form.css">
    <link href="../assets/css/nav.css" rel="stylesheet">
    <link href="../assets/css/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendor/bootstrap-icons/bootstrap-icons.css">
</head>

<body style="font-family: Open Sans, sans serif;">
<?php
require_once "nav.php";
?>
<main class="page catalog-page" style="font-family: Open Sans, sans-serif;">
    <section class="clean-block clean-catalog dark">
        <div class="container">
            <form class="search-form">
                <div class="input-group"><span class="input-group-text"><i class="fa fa-search"></i></span><input
                            class="form-control" type="text" placeholder="Procuro por...">
                    <button class="btn btn-light" type="button">Pesquisar</button>
                </div>
            </form>
            <div class="content">
                <div class="row">
                    <div class="col-md-3 col-lg-2">
                        <div class="d-none d-md-block">
                            <div class="text-start filters">
                                <div class="filter-item">
                                    <h3>Categorias</h3>
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                   id="formCheck-1"><label class="form-check-label"
                                                                                           for="formCheck-1">Limpeza</label>
                                    </div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                   id="formCheck-2"><label class="form-check-label"
                                                                                           for="formCheck-2">Montagem</label>
                                    </div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                   id="formCheck-3"><label class="form-check-label"
                                                                                           for="formCheck-3">Assitência
                                            técnica</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                   id="formCheck-4"><label class="form-check-label"
                                                                                           for="formCheck-4">Cuidado</label>
                                    </div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                   id="formCheck-5"><label class="form-check-label"
                                                                                           for="formCheck-5">Reforço
                                            escolar</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                   id="formCheck-6"><label class="form-check-label"
                                                                                           for="formCheck-6">Reforma e
                                            construção</label></div>
                                </div>
                                <div class="filter-item">
                                    <h3>Ordenar</h3>
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                   id="formCheck-7"><label class="form-check-label"
                                                                                           for="formCheck-7">A-Z</label>
                                    </div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                   id="formCheck-8"><label class="form-check-label"
                                                                                           for="formCheck-8">Z-A</label>
                                    </div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                   id="formCheck-9"><label class="form-check-label"
                                                                                           for="formCheck-9">Maior
                                            preço</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                   id="formCheck-10"><label class="form-check-label"
                                                                                            for="formCheck-10">Menor
                                            preço</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-none"><a class="btn btn-link d-md-none filter-collapse"
                                                  data-bs-toggle="collapse" aria-expanded="false"
                                                  aria-controls="filters" href="#filters" role="button">Filtros<i
                                        class="icon-arrow-down filter-caret"></i></a>
                            <div class="collapse" id="filters">
                                <div class="text-start filters">
                                    <div class="filter-item">
                                        <h3>Categorias</h3>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                       id="formCheck-1"><label class="form-check-label"
                                                                                               for="formCheck-1">Limpeza</label>
                                        </div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                       id="formCheck-2"><label class="form-check-label"
                                                                                               for="formCheck-2">Montagem</label>
                                        </div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                       id="formCheck-3"><label class="form-check-label"
                                                                                               for="formCheck-3">Assitência
                                                técnica</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                       id="formCheck-4"><label class="form-check-label"
                                                                                               for="formCheck-4">Cuidado</label>
                                        </div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                       id="formCheck-5"><label class="form-check-label"
                                                                                               for="formCheck-5">Reforço
                                                escolar</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                       id="formCheck-6"><label class="form-check-label"
                                                                                               for="formCheck-6">Reforma
                                                e construção</label></div>
                                    </div>
                                    <div class="filter-item">
                                        <h3>Ordenar</h3>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                       id="formCheck-7"><label class="form-check-label"
                                                                                               for="formCheck-7">A-Z</label>
                                        </div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                       id="formCheck-8"><label class="form-check-label"
                                                                                               for="formCheck-8">Z-A</label>
                                        </div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                       id="formCheck-9"><label class="form-check-label"
                                                                                               for="formCheck-9">Maior
                                                preço</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox"
                                                                       id="formCheck-10"><label class="form-check-label"
                                                                                                for="formCheck-10">Menor
                                                preço</label></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-lg-10">
                        <div class="services">
                            <div class="row g-0">
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="clean-service-item">
                                        <div class="image"><a href="#"><img
                                                        class="img-fluid d-block mx-auto image-photo"
                                                        src="../assets/img/a-importancia-da-limpeza-e-conservação.jpg"></a>
                                        </div>
                                        <div class="service-name"><a href="#">Lorem ipsum dolor sit amet</a></div>
                                        <div class="about">
                                            <p><strong>Responsável:</strong> Fulano de Tal <br></p>
                                            <p class="service-description">Lorem ipsum dolor sit, amet consectetur
                                                adipisicing elit. Fugit libero, totam molestiae vero veniam facere,
                                                obcaecati eius deleniti perspiciatis saepe, sapiente ea veritatis in
                                                nobis. Impedit amet distinctio ea rem.</p>
                                            <div class="rating"></div>
                                            <div class="price">
                                                <h3>R$ 15,00/hora</h3>
                                            </div>
                                            <button class="btn btn-primary">Agendar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="clean-service-item">
                                        <div class="image"><a href="#"><img
                                                        class="img-fluid d-block mx-auto image-photo"
                                                        src="../assets/img/ambiental.jpg"></a></div>
                                        <div class="service-name"><a href="#">Lorem ipsum dolor sit amet</a></div>
                                        <div class="about">
                                            <p><strong>Responsável:</strong> Fulano de Tal <br></p>
                                            <p class="service-description">Lorem ipsum dolor sit, amet consectetur
                                                adipisicing elit. Fugit libero, totam molestiae vero veniam facere,
                                                obcaecati eius deleniti perspiciatis saepe, sapiente ea veritatis in
                                                nobis. Impedit amet distinctio ea rem.</p>
                                            <div class="rating"></div>
                                            <div class="price">
                                                <h3>R$ 15,00/hora</h3>
                                            </div>
                                            <button class="btn btn-primary">Agendar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="clean-service-item">
                                        <div class="image"><a href="#"><img
                                                        class="img-fluid d-block mx-auto image-photo"
                                                        src="../assets/img/analise.jpg"></a></div>
                                        <div class="service-name"><a href="#">Lorem ipsum dolor sit amet</a></div>
                                        <div class="about">
                                            <p><strong>Responsável:</strong> Fulano de Tal <br></p>
                                            <p class="service-description">Lorem ipsum dolor sit, amet consectetur
                                                adipisicing elit. Fugit libero, totam molestiae vero veniam facere,
                                                obcaecati eius deleniti perspiciatis saepe, sapiente ea veritatis in
                                                nobis. Impedit amet distinctio ea rem.</p>
                                            <div class="rating"></div>
                                            <div class="price">
                                                <h3>R$ 15,00/hora</h3>
                                            </div>
                                            <button class="btn btn-primary">Agendar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="clean-service-item">
                                        <div class="image"><a href="#"><img
                                                        class="img-fluid d-block mx-auto image-photo"
                                                        src="../assets/img/assistencia_técnica.jpg"></a></div>
                                        <div class="service-name"><a href="#">Lorem ipsum dolor sit amet</a></div>
                                        <div class="about">
                                            <p><strong>Responsável:</strong> Fulano de Tal <br></p>
                                            <p class="service-description">Lorem ipsum dolor sit, amet consectetur
                                                adipisicing elit. Fugit libero, totam molestiae vero veniam facere,
                                                obcaecati eius deleniti perspiciatis saepe, sapiente ea veritatis in
                                                nobis. Impedit amet distinctio ea rem.</p>
                                            <div class="rating"></div>
                                            <div class="price">
                                                <h3>R$ 15,00/hora</h3>
                                            </div>
                                            <button class="btn btn-primary">Agendar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="clean-service-item">
                                        <div class="image"><a href="#"><img
                                                        class="img-fluid d-block mx-auto image-photo"
                                                        src="../assets/img/CONSTRUÇÕES E REFORMAS-1537993848.jpg"></a>
                                        </div>
                                        <div class="service-name"><a href="#">Lorem ipsum dolor sit amet</a></div>
                                        <div class="about">
                                            <p><strong>Responsável:</strong> Fulano de Tal <br></p>
                                            <p class="service-description">Lorem ipsum dolor sit, amet consectetur
                                                adipisicing elit. Fugit libero, totam molestiae vero veniam facere,
                                                obcaecati eius deleniti perspiciatis saepe, sapiente ea veritatis in
                                                nobis. Impedit amet distinctio ea rem.</p>
                                            <div class="rating"></div>
                                            <div class="price">
                                                <h3>R$ 15,00/hora</h3>
                                            </div>
                                            <button class="btn btn-primary">Agendar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6">
                                    <div class="clean-service-item">
                                        <div class="image"><a href="#"><img
                                                        class="img-fluid d-block mx-auto image-photo"
                                                        src="../assets/img/consultor.jpeg"></a><a href="#"></a></div>
                                        <div class="service-name"><a href="#">Lorem ipsum dolor sit amet</a></div>
                                        <div class="about">
                                            <p><strong>Responsável:</strong> Fulano de Tal <br></p>
                                            <p class="service-description">Lorem ipsum dolor sit, amet consectetur
                                                adipisicing elit. Fugit libero, totam molestiae vero veniam facere,
                                                obcaecati eius deleniti perspiciatis saepe, sapiente ea veritatis in
                                                nobis. Impedit amet distinctio ea rem.</p>
                                            <div class="rating"></div>
                                            <div class="price">
                                                <h3>R$ 15,00/hora</h3>
                                            </div>
                                            <button class="btn btn-primary">Agendar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" href="#"
                                                                      aria-label="Previous"><span
                                                    aria-hidden="true">«</span></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                                    aria-hidden="true">»</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
require_once "footer.php";
?>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script src="../assets/js/vanilla-zoom.js"></script>
<script src="../assets/js/theme.js"></script>
</body>

</html>