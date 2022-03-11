<?php

namespace App\Libs;

class Validator
{
    protected array $errors = [];
    protected array $data;
    protected array $errorMesages = [
        'name1' => ['имя не должно быть пустым или слишком длинным'],
    ];

    public function getErrors():array
    {
        return $this->errors ?? [];
    }

    protected function get_POSTData():array
    {
        if (!empty($_POST)) {
            return $_POST;
        }
        return [];
    }

    protected function setData(array $data)
    {
        $this->data = $data;
    }

    protected function setErrorMessages(array $errorMessages)
    {
        foreach ($errorMessages as $key => $message)
        $this->errorMesages[$key] = $message;
    }

    protected function deleteErrorMessages(array $keys)
    {
        foreach ($keys as $key)
            unset($this->errorMesages[$key]);
    }

    public function validate(array $rules, array $data = [])
    {
        $this->errors = [];
        $data = array_merge($this->get_POSTData(), $data);
        $this->setData($data);

        foreach ($rules as $field => $setOfRules) {
            $params = explode ('|', $setOfRules ?? []);
            foreach ($params as $param) {
                $condition = explode (':', $param);
                if (isset($condition[1])) {
                    $method = $condition[0];
                    $result = $this->$method($field, $condition[1]);
                } else {
                    $result = $this->$param($field);
                }

                if ($result === true) {
                    $resultData[$field] = $this->data[$field];
                } elseif ($result === false) {
                    continue;
                } else {
                    if (isset($this->errorMesages[$field])){
                        $this->errors[$field] = $this->errorMesages[$field];
                    } else {
                        $this->errors[$field][] = $result;
                    }
                }
            }
        }

        if (empty($this->errors)) {
            return $resultData ?? [];
        }
    }

    protected function required($key)
    {
        if (empty($this->data[$key])) {
            return $key . ' обязательное поле';
        } else {
            return true;
        }
    }

    protected function latin($key)
    {
        if (!empty($this->data[$key])) {
            if (preg_match('/[A-z]+/', $this->data[$key]))
                return true;
        }
        return 'для ввода доступны только английские буквы';
    }

    protected function email($key)
    {
        if (!empty($this->data[$key])) {
            if (filter_var($this->data[$key], FILTER_VALIDATE_EMAIL)) {
                return true;
            }
        }
        return 'указанный email не соответствует формату';
    }

    protected function pass($key)
    {
        if (!isset($this->data[$key]) || preg_match('/[A-z0-9]+/', $this->data[$key]))
            return true;
        return 'для ввода доступны английские буквы и цифры';
    }

    protected function pass2($key, $passwordFieldName = 'password')
    {
        if (!isset($this->data[$key]) && !isset($this->data[$passwordFieldName]))
            return false;

        if (
            (isset($this->data[$key]) && isset($this->data[$passwordFieldName]))
            && ($this->data[$key] == $this->data[$passwordFieldName])
        ) {
            return false;
        }
        return 'пароли не совпадают';
    }

    protected function number($key)
    {
        if (!empty($this->data[$key])) {
            if (preg_match('/[0-9]+/', $this->data[$key]))
                return true;
        }
        return 'для ввода доступны только цифры';
    }

    protected function max($key, string $param)
    {
        if (isset($this->data[$key]) && strlen($this->data[$key]) > (int) $param) {
            return 'максимум символов ' . (int) $param;
        } else {
            return true;
        }
    }

    protected function min($key, string $param)
    {
        if (isset($this->data[$key]) && strlen($this->data[$key]) < (int) $param) {
            return 'минимум символов ' . (int) $param;
        } else {
            return true;
        }
    }

    public function __call($method, $args)
    {
    }
}