<?php
include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/base/header.php';
?>



    <section class="site-section" id="blog-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade">
                    <h2 class="section-title mb-3">Our Blog</h2>
                </div>
            </div>

            <div class="row">
                <section>
                    <?php
                        echo $post['text'];
                    ?>
                </section>

            </div>
        </div>
    </section>




<?php
include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/base/footer.php';
?>