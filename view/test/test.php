<?php
include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/base/header.php';
?>

    <section class="site-section" id="blog-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade">
                    <h2 class="section-title mb-3">Кто прав?</h2>
                </div>
            </div>

            <div class="row">
                <section>

                <?php
                    if (\App\Libs\RolePolice::isAdmin()) {
                        $who = 'Ты';
                    } else {

                        $who = 'Админ';
                    }
                ?>


                    <p><?= $who ?> всегда прав</p>
                </section>
            </div>

            <div class="row">
                <section>
                    <form action="/test" method="post">
                        <input type="text" name="text">
                        <input type="submit" name="btn">
                    </form>

                </section>
            </div>





        </div>
    </section>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/base/footer.php';
