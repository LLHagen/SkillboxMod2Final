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


            <section>
                <?php
                if (!empty($posts)) {
                    foreach ($posts as $post) {
                        var_dump('<p>' . $post . '</p>');
                    }
                }
                ?>
            </section>


            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="">
                    <div class="h-entry">
                        <a href="single.html">
                            <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                        </a>
                        <h2 class="font-size-regular"><a href="#">A Basic Guide to Starting a Franchise in the
                                Philippines</a></h2>
                        <div class="meta mb-4">Ham Brook <span class="mx-2">&bullet;</span> Jan 18, 2019<span
                                    class="mx-2">&bullet;</span> <a href="#">News</a></div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores
                            sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                        <p><a href="#">Continue Reading...</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="h-entry">
                        <a href="single.html">
                            <img src="images/img_4.jpg" alt="Image" class="img-fluid">
                        </a>
                        <h2 class="font-size-regular"><a href="#">A Basic Guide to Starting a Franchise in the
                                Philippines</a></h2>
                        <div class="meta mb-4">James Phelps <span class="mx-2">&bullet;</span> Jan 18, 2019<span
                                    class="mx-2">&bullet;</span> <a href="#">News</a></div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores
                            sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                        <p><a href="#">Continue Reading...</a></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="h-entry">
                        <a href="single.html">
                            <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                        </a>
                        <h2 class="font-size-regular"><a href="#">A Basic Guide to Starting a Franchise in the
                                Philippines</a></h2>
                        <div class="meta mb-4">James Phelps <span class="mx-2">&bullet;</span> Jan 18, 2019<span
                                    class="mx-2">&bullet;</span> <a href="#">News</a></div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores
                            sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
                        <p><a href="#">Continue Reading...</a></p>
                    </div>
                </div>

            </div>
        </div>
    </section>




<?php
include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/base/footer.php';
?>






<?php
//include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/admin_header.php';
//?>
<!---->
<!--<div class="album py-5 bg-light">-->
<!--    <div class="container">-->
<!---->
<!--        <section>-->
<!--            <a href="/about">???? ???????????????? ?? ??????</a>-->
<!--            <a href="/posts">???? ???????????????? Posts</a>-->
<!--            <h1>--><?//= $title ?? 'CMS' ?><!--</h1>-->
<!--        </section>-->
<!---->
<!--    </div>-->
<!--</div>-->
<!---->
<?php
//include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/admin_footer.php';
