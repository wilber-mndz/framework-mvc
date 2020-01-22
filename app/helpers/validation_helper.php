<?php
// Cargamos la librería respect/validation
use Respect\Validation\Validator as v;
use Respect\Validation\Rules;
use Respect\Validation\Exceptions\NestedValidationException; 


/*
|--------------------------------------------------------------------------
| Valida un campo estándar verificando que cumpla con las reglas establecidas
|--------------------------------------------------------------------------
| Las reglas establecidas para este campo son las siguientes
|
| El campo no puede estar vació
| El campo debe contener solo caracteres alfanuméricos
| La longitud de caracteres del campo deben estar dentro del rango establecido
|
| @access public
| @param string $value cadena de caracteres a validar
| @param string $label nombre con el que se identifica el campo
| @param int $minVal longitud mínima de la cadena
| @param int $maxVal longitud máxima de la cadena
| @return string $errors cadena de texto que contiene la lista de errores, si los hay
| 
*/
function inputValidator($value, $label, $minVal, $maxVal){

    // Establecemos las reglas
    $nameValidator = new Rules\AllOf(
        new Rules\NotEmpty(),
        new Rules\Alnum(),
        new Rules\Length($minVal, $maxVal)
    );

    try {
        // Ejecutamos
        $nameValidator->assert($value);
        return ''; // Si no hay error retornamos una cadena vacía
    } catch(NestedValidationException $exception) {
        // Capturamos los errores
        // Establecemos los mensajes de error
        $exception->findMessages([
            'alnum' => "El campo <b>$label</b> debe contener solo letras (a-z) y dígitos (0-9)",
            'length' => "El campo <b>$label</b> debe tener una longitud entre $minVal y $maxVal",
            'notEmpty' => "El campo <b>$label</b> no debe estar vacío"
        ]);
        $error = '';
        foreach ($exception->getMessages() as $key => $message) {
            $error .= "- $message <br>";
        }
        return $error;
    }
}

/*
|-----------------------------------------------------------------------------
| Valida nombre de usuario verificando que cumpla con las reglas establecidas
|-----------------------------------------------------------------------------
| Esta función verifica que un campo enviado por el usuario cumpla con las
| reglas establecidas para ser guardado como un nombre de usuario.
|
| El campo no puede estar vació
| El campo debe contener solo caracteres alfanuméricos
| El campo no puede tener espacios en blanco.
| La longitud de caracteres del campo deben estar dentro del rango establecido
|
| @access public
| @param string $value cadena de caracteres a validar
| @return string $errors cadena de texto que contiene la lista de errores, si los hay
| 
*/
function usernameValidator($userName){
    // Establecemos los valores mínimos y máximos
    $minVal = 4;
    $maxVal = 15;
    // Establecemos el nombre del campo
    $name = "nombre de usuario";

    // Establecemos las reglas
    $usernameValidator = new Rules\AllOf(
        new Rules\NotEmpty(),
        new Rules\Alnum(),
        new Rules\NoWhitespace(),
        new Rules\Length($minVal, $maxVal)
    );

    try {
        // Ejecutamos
        $usernameValidator->assert($userName);
        return ''; // Si no hay error retornamos una cadena vacía
    } catch(NestedValidationException $exception) {
        // Capturamos los errores
        // Establecemos los mensajes de error
        $exception->findMessages([
            'alnum' => "El <b>$name</b> debe contener solo letras (a-z) y dígitos (0-9)",
            'length' => "El <b>$name</b> debe tener una longitud entre $minVal y $maxVal",
            'noWhitespace' => "El <b>$name</b> no debe contener espacios en blanco",
            'notEmpty' => "El <b>$name</b> no debe estar vacío"
        ]);
        $error = '';
        foreach ($exception->getMessages() as $key => $message) {
            $error .= "- $message <br>";
        }
        return $error;
    }
}



?>