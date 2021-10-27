<?php
include_once 'layout/header.php';
include_once 'layout/navegacion.php';
?>

<section class= "paralax">
    <h1>Pagina de Eventos</h1>
    <p>Ven y disfruta de los mejores eventos  </p>
</section>
    

<!-- hola -->

<!-- hola -->
<!-- Contenedor card -->
<div class="container-fluid py-5 bg-dark">
    <div class="container">
        <div class="row g-3 d-flex justify-content-center" id="container-cards">
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card m-auto border-0">
                    <img src="https://roman-company.com/TrailerMovilApiRest/images/245921356_876617609714123_6068865882472407514_n.jpg" class="card-img-top" style="max-height:300px; object-fit: cover;" alt="Mago de Oz">
                    <div class="card-body text-center">
                        <h3 class="card-title">Mago de Oz</h3>
                        <p><i class="bi bi-currency-dollar"></i><strong>10</strong></p=>
                        <p><i class="bi bi-calendargi-date"></i><strong> 26/10/2021</strong></p>
                        <p><i class="bi bi-geo-alt-fill"></i><strong> Riobamba - Estadio</strong></p>
                        <a href="#" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contenedor card />-->
<?php
include_once 'layout/footer.php';
?>