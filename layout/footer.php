    <!-- MODAL VALÓRANOS -->
    <div class="contenedor-modal-valoranos" id="contenedor-modal-valoranos">
        <div class="contenedor-valoranos">
            <p class="text">
                Te gustaría ayudarnos con tu opinión, <b>Valóranos </b>
            </p>
            <div class="stars" id="container-star">
                <i class="bi bi-star-fill " data-value="5"></i>
                <i class="bi bi-star-fill " data-value="4"></i>
                <i class="bi bi-star-fill " data-value="3"></i>
                <i class="bi bi-star-fill " data-value="2"></i>
                <i class="bi bi-star-fill " data-value="1"></i>
            </div>
            <div class="buttons-valoranos">
                <button class="btn btn-outline-danger" id="btn-cancell-value">Quiza más tarde</button>
                <button class="btn btn-purple" id="btn-send-value">Enviar valoración</button>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="bg-dark text-center text-white" id="footer">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#!" role="button"><i class="bi bi-facebook"></i></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#!" role="button"><i class="bi bi-twitter"></i></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#!" role="button"><i class="bi bi-instagram"></i></a>

                <!-- Tiktok -->
                <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="#!" role="button"><i class="bi bi-tiktok"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright:
            <a class="text-white" target="_blank" href="https://virtualcode7.web.app/">VIRTUALCODE7 SAS</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- Scrip Propios -->
    <script>
        const user_credencials = {
            email: "<?php echo $_SESSION["email"] ?>",
            nombre: "<?php echo $_SESSION["name"] ?>",
        }
    </script>
    <script src="js/main.script.js"></script>
    <script src="js/paralax.js"></script>
    </body>

    </html>