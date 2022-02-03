<?php


/**
 * функция для проверки авторизации
 * @param string $login принимает логин  пользователя
 * @param string $password принимает пароль  пользователя
 * @return bool результат авторизации
 */
function verification($login, $password)
{
//    $rows = getUserByLogin($login);
//
//    if ($rows) {
//        // проверка пароля и авторизация
//        if (password_verify($password, $rows[0]['password'])) {
//            $_SESSION['login'] = $login;
//            return $_SESSION['auth'] = true;
//        } else {
//            return $_SESSION['auth'] = false;
//        }
//    } else {
//        return $_SESSION['auth'] = false;
//    }
}



if (!empty($users)) {
    var_dump($users);
}
if (!empty($errors)) {
    echo '<br>';
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
}
?>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css"/>

<style>
    .form-width {
        max-width: 25rem;
    }

    .has-float-label {
        position: relative;
    }

    .has-float-label label {
        position: absolute;
        left: 0;
        top: 0;
        cursor: text;
        font-size: 75%;
        opacity: 1;
        -webkit-transition: all .2s;
        transition: all .2s;
        top: -.5em;
        left: 0.75rem;
        z-index: 3;
        line-height: 1;
        padding: 0 1px;
    }

    .has-float-label label::after {
        content: " ";
        display: block;
        position: absolute;
        background: white;
        height: 2px;
        top: 50%;
        left: -.2em;
        right: -.2em;
        z-index: -1;
    }

    .has-float-label .form-control::-webkit-input-placeholder {
        opacity: 1;
        -webkit-transition: all .2s;
        transition: all .2s;
    }

    .has-float-label .form-control:placeholder-shown:not(:focus)::-webkit-input-placeholder {
        opacity: 0;
    }

    .has-float-label .form-control:placeholder-shown:not(:focus) + label {
        font-size: 150%;
        opacity: .5;
        top: .3em;
    }

    .input-group .has-float-label {
        display: table-cell;
    }

    .input-group .has-float-label .form-control {
        border-radius: 0.25rem;
    }

    .input-group .has-float-label:not(:last-child) .form-control {
        border-bottom-right-radius: 0;
        border-top-right-radius: 0;
    }

    .input-group .has-float-label:not(:first-child) .form-control {
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
        margin-left: -1px;
    }
</style>

<div class="p-x-1 p-y-3">
    <form class="card card-block m-x-auto bg-faded form-width" method="post">
        <legend class="m-b-1 text-xs-center">Регистрация</legend>

        <?php
        // TODO Вывод ошибок
        ?>


        <div class="form-group has-float-label">
            <span class="has-float-label">
                <input class="form-control" id="FIO" name="FIO" type="text" placeholder="ФИО" value="<?= $users['FIO'] ?? ''?>"/>
                <label for="FIO">ФИО</label>
            </span>
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">@</span>
            <span class="has-float-label">
                <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" value="<?= $users['email'] ?? ''?>"/>
                <label for="email">E-mail</label>
            </span>
        </div>
        <div class="form-group has-float-label">
            <input class="form-control" id="password" name="password" type="password" value="<?= $users['password'] ?? ''?>" placeholder="••••••••"/>
            <label for="password">Пароль</label>
        </div>
        <div class="form-group has-float-label">
            <input class="form-control" id="passwordTwo" name="passwordTwo" type="password" value="<?= $users['passwordTwo'] ?? ''?>" placeholder="••••••••"/>
            <label for="password">Пароль повторно</label>
        </div>
        <div class="form-group">
            <label class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox"/>
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">
                Согласен с правиласми
                <a href="#">пользовательского соглашения</a>
            </span>
            </label>
        </div>
        <div class="text-xs-center">
            <button class="btn btn-block btn-primary" type="submit">Регистрация</button>
        </div>
    </form>
</div>
