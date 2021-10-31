<?php
include_once 'layout/header.php';
include_once 'layout/navegacion.php';
?>

<main>
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum recusandae error quis alias odit natus distinctio accusamus totam. Ullam beatae veniam quis hic autem porro, quisquam minus dolorem sit pariatur nulla sequi maxime accusantium nostrum? Odio amet molestias earum. Explicabo voluptates vero impedit, possimus cumque ducimus? Impedit magni, non illo fugit vel, minima optio eligendi reprehenderit molestias doloremque esse porro enim nostrum accusamus labore error est nisi suscipit dolorum ipsam quo beatae eaque, velit eveniet. Similique id velit quis? Harum debitis maiores in eveniet soluta ratione excepturi? Aliquid iure, harum impedit labore culpa necessitatibus! Blanditiis hic autem dignissimos est pariatur reiciendis nihil nisi fuga unde aspernatur, exercitationem repudiandae facilis. Earum nobis rem nulla tempore assumenda. Amet eius esse quis tenetur minima magnam ipsam atque quod quia saepe, rem facere quam magni autem quaerat consequatur laboriosam fugit suscipit, dolorum voluptates aliquam. Neque non animi libero repudiandae. Sapiente sit eos culpa, nemo a nulla quas doloribus dolores nisi quidem placeat veniam doloremque numquam sint delectus itaque temporibus. Sequi commodi optio, accusamus illo ratione eligendi dolorem quod dolor facilis consectetur voluptates, distinctio, eius eveniet? Reiciendis rerum quaerat perferendis veritatis autem assumenda earum, aperiam minus odit fuga sunt. Quos, voluptates. Deleniti sed temporibus ipsum quae veniam sint quaerat labore aliquid voluptas porro? Similique et error qui, porro totam exercitationem? Reiciendis ipsa eveniet dolorem asperiores voluptate laudantium natus error alias modi, expedita, minus dignissimos? Optio vero culpa amet sunt dolores dolorem at eaque, et laboriosam suscipit consectetur dolorum perferendis voluptate unde ea illum placeat delectus dignissimos nulla fugiat excepturi tempora odit illo! Doloremque fugit porro minima aspernatur nesciunt rerum perspiciatis, impedit iure incidunt mollitia vel, veniam neque at doloribus a consequatur totam tempore? Labore autem odio possimus ipsum iure dignissimos officia molestias porro? Ipsa reiciendis velit, dolorum sunt voluptatem, ad nihil voluptatibus quaerat tempore libero repudiandae adipisci dignissimos consectetur voluptas autem nam cumque reprehenderit! Fugiat veritatis voluptate officia temporibus. Quos hic iste odio debitis esse commodi laboriosam architecto earum ab dolores, doloribus reprehenderit tempora delectus placeat aut eum, accusantium molestiae, voluptas nam autem dolore. Inventore, ipsa. Sapiente id accusamus corrupti itaque delectus quisquam adipisci aperiam minima distinctio libero eaque, ipsam commodi, nobis veniam quas ipsa dicta unde, voluptatibus quasi eum voluptate nam perspiciatis molestiae. Enim, hic? Enim aut eum, harum eaque est minima cupiditate facilis, voluptates ipsam veniam, recusandae velit sunt officiis sit ex numquam temporibus similique nihil ducimus quae? Perferendis dolorum reiciendis porro blanditiis, alias laborum nihil a doloremque similique esse aliquid error animi fugit perspiciatis atque minus? Eos maiores voluptatem, exercitationem libero adipisci pariatur magnam et minima maxime blanditiis numquam eveniet sunt natus aliquam, excepturi cupiditate cumque? Dolor eligendi iusto odio, vero officia totam adipisci deleniti aperiam nam labore, explicabo inventore. Reprehenderit, distinctio voluptas obcaecati amet quia adipisci. Vero, fuga sapiente dolorum perspiciatis error non quam velit eveniet. Inventore, itaque possimus. Cum vel molestiae delectus corrupti soluta placeat porro voluptatum tempora excepturi reiciendis? Nam dolor aspernatur nulla, quia necessitatibus tenetur eum accusamus dicta! Est dignissimos consequatur quas amet voluptate. Totam quasi sequi voluptatum!
</main>

<!-- pushbar -->
<aside class="contenedor-preorden" data-pushbar-id="right" data-pushbar-direction="right">
    <div class="sub-contenedor-preoden">
        <div class="contenedor-header-cart">
            <h2 class="title-header-cart">Resumen del carrito</h2>
            <span data-pushbar-close class="close push_right"><i class="bi bi-x"></i></span>
        </div>
        <div class="contenedor-items-carro" id="contenedor-items-carro">
            <div class="item-carro">
                <div class="image-item">
                    <img src="https://d1uz88p17r663j.cloudfront.net/resized/8689e8d974203563ddcc9bbff91323c2_MG_CHORIZOBURGER_Main-880x660_448_448.png" alt="Hamburguesa">
                </div>
                <div class="body-item">
                    <p class="detail-item">Hamburguesa doble carne con tocino</p>
                    <p class="price-item">100.56</p>
                </div>
                <a href="#" class="delete-item">Eliminar</a>
            </div>
        </div>
        <div class="contenedor-total-items">
            <div class="total-estimado">
                <p>Total estimado</p>
                <p>100.56</p>
            </div>
            <a href="#" class="btn btn-purple">Continuar al pago</a>
        </div>
    </div>
</aside>

<div class="container-button-fixed two-button">
    <button class="btn-float btn-purple" id="btn-cart" data-pushbar-target="right"><i class="bi bi-cart-fill"></i></button>
    <button class="btn-float btn-purple" id="btn-top"><i class="bi bi-caret-up-fill"></i></button>
</div>

<script type="text/javascript">
    const pushbar = new Pushbar({
        blur: true,
        overlay: true,
    });
</script>




<?php
include_once 'layout/footer.php';
?>