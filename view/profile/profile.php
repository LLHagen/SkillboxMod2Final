<?php
\App\Libs\Session::init();
if (!\App\Libs\RolePolice::isAuth()) {
    header('Location: /login');
}

include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/base/header.php';

//echo "<pre>";
//var_dump($error);
//echo "</pre>";


?>

    <section class="site-section" id="blog-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade">
                    <h2 class="section-title mb-3"><?= $user->name ?></h2>
                </div>
            </div>

            <div class="row">
                <section>
                    <br><br>
                        <div class="col-md-6 col-lg-12 mb-12 mb-lg-12" data-aos="fade-up" data-aos-delay="">
                            <div class="h-entry">
                                <form action="/profile" method="post" enctype="multipart/form-data">
                                    <div class="row">

                                        <?php
                                        $field = 'name';
                                        require $_SERVER['DOCUMENT_ROOT'] . '/view/components/error/form/formFieldError.php';

                                        ?>

                                        <label class="col-md-6 col-lg-12 mb-12 mb-lg-12 primary" for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $_POST['name'] ?? $user->name ?>">
                                    </div>

                                    <div class="row">

                                        <?php
                                        if(isset($errors['about'])) {
                                            ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php
                                                foreach ($errors['about'] as $error) {
                                                    echo $error;
                                                }
                                                ?>
                                            </div>

                                            <?php
                                        }
                                        ?>


                                        <label class="primary" for="about">Name</label>
                                        <textarea class="form-control" id="about"  name="about"><?= $user->about ?></textarea>
                                    </div>

                                    <br>
                                    <div class="row custom-file">
                                        <label class="custom-file-label col-md-4 mb-3" for="image">Avatar</label>
                                        <input type="file" class="custom-file-input col-md-4 mb-3"  name="image" id="image">
                                    </div>

                                    <br>
                                    <br>
                                    <div class="row">
                                        <button type="button" class="btn btn-primary">Подписаться</button>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <button type="submit" class="btn btn-primary">Загрузить</button>
                                    </div>
                                </form>

                                <p>Отображается форма профиля. Помимо полей с регистрацией, пользователь
                                    может загрузить аватар (только изображение, размером не более 2 Мб)
                                    и написать текст “О себе – эти поля не обязательны. При ошибке
                                    сохранения, ошибки должны быть отображены рядом с полем, к которому они
                                    относятся.
                                </p>


                                <h2 class="font-size-regular">
                                    Также здесь отображается блок “Подписаться” или “Отписаться”, если пользователь уже подписан
                                </h2>


                            </div>
                        </div>







                </section>

            </div>
        </div>
    </section>




<?php
include $_SERVER['DOCUMENT_ROOT'] . '/view/layout/base/footer.php';
?>