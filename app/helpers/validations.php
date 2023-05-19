<?php

function validate(array $validations)
{
    $arrayValidations = [];
    foreach ($validations as $key => $validate) {
        if (!str_contains($validate, "|")) {
            if (str_contains($validate, ":")) {
                list($validate, $param) = explode(":", $validate);
                $arrayValidations[$key] = $validate($key, $param);
            } else {
                $arrayValidations[$key] = $validate($key);
            }
        } else {
            $arrayValidations = multipleValidate($validate, $key);
        }
    }
    if (in_array(false, $arrayValidations)) {
        return false;
    }
    return $arrayValidations;
}

function multipleValidate($validate, $key)
{
    foreach (explode("|", $validate) as $validate) {
        if (str_contains($validate, ":")) {
            list($validate, $param) = explode(":", $validate);
            $arrayValidations[$key] = $validate($key, $param);
        } else {
            $arrayValidations[$key] = $validate($key);
        }
        if ($arrayValidations[$key] == false) {
            return false;
        }
    }
}

function required($field, $param = '')
{

    if (empty($_POST[$field])) {
        setFlash($field, "Preencha o campo");
        return false;
    }
    return strip_tags($_POST[$field]);
}

function maxlen($field, $param)
{
    $value = intval($_POST[$field]);

    if (strlen($value) != 4) {
        setFlash($field, "Ano invalido");
        return false;
    }
    return $value;
}
