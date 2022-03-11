<?php

namespace App\Libs;

class Upload
{
    private static $config = [
      'img_max_size' => 1024 * 1024 * 2,
      'img_path' => DIRECTORY_SEPARATOR  .'images' . DIRECTORY_SEPARATOR  . 'avatars' . DIRECTORY_SEPARATOR,
    ];

    public static function uploadImage()
    {

        if (isset($_FILES['image'])) {
            // Получаем нужные элементы массива "image"
            $fileTmpName = $_FILES['image']['tmp_name'];
            $errorCode = $_FILES['image']['error'];
            // Проверим на ошибки
//            echo "<pre>";
//            var_dump(self::$config['img_path'] .$fileTmpName);
//            echo "</pre>";
            if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($fileTmpName)) {
                // Массив с названиями ошибок
                $errorMessages = [
                    UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
                    UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
                    UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
                    UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
                    UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
                    UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
                    UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
                ];
                // Зададим неизвестную ошибку
                $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';
                // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
                $error = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;
                // Выведем название ошибки
                $result['error'] = 'Можно загружать только изображения.';
                return $result;
            } else {

                // Создадим ресурс FileInfo
                $fi = finfo_open(FILEINFO_MIME_TYPE);

                // Получим MIME-тип
                $mime = (string) finfo_file($fi, $fileTmpName);

                // Проверим ключевое слово image (image/jpeg, image/png и т. д.)
                if (strpos($mime, 'image') === false) {
                    $result['error'] = 'Можно загружать только изображения.';
                    return $result;
                }

                // Проверим нужные параметры
                if (filesize($fileTmpName) > self::$config['img_max_size']){

                    $result['error'] = 'Размер изображения не должен превышать ' . round(self::$config['img_max_size']/1024/1024) . 'Мбайт.';
                    return $result;
                }

                $imageSizeInfo = getimagesize($fileTmpName);

                $name = self::getRandomFileName($fileTmpName);

                // Сгенерируем расширение файла на основе типа картинки
                $extension = image_type_to_extension($imageSizeInfo[2]);

                // Сократим .jpeg до .jpg
                $format = str_replace('jpeg', 'jpg', $extension);

                // Переместим картинку с новым именем и расширением в папку self::$config['img_path']
                if (!move_uploaded_file($fileTmpName, $_SERVER['DOCUMENT_ROOT'] . self::$config['img_path'] . $name . $format)) {
                    return ['error']['При записи изображения на диск произошла ошибка.'];
                }
                $result['error'] = false;
                $result['path'] = self::$config['img_path'] . $name . $format;
                return $result;
            }
        } else {
            return 'Изображение не обнаружено.';
        }
    }

    public static function getRandomFileName($path)
    {
        $path = $path ? $path . '/' : '';
        do {
            $name = md5(microtime() . rand(0, 9999));
            $file = $path . $name;
        } while (file_exists($file));

        return $name;
    }
}