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
        new Rules\Alnum('á é í ó ú ñ Á É Í Ó Ú Ñ , .'),
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


/*
|-----------------------------------------------------------------------------
| Valida departamento seleccionado
|-----------------------------------------------------------------------------
| Esta función verifica que el departamento seleccionado por el usuario
| corresponda con los almacenados en la base de datos, es decir que debe tener
| un valor que este entre 1 y 14 que son los departamentos del pais 
|
| @access public
| @param int $int id del departamento seleccionado
| @return string $errors cadena de texto que contiene la lista de errores, si los hay
| 
*/
function departmentValidator($int){
    
    // Establecemos las reglas
    $departmentValidator = new Rules\AllOf(
        new Rules\IntVal,
        new Rules\Positive,
        new Rules\Between(1, 14)
    );

    try {
        // Ejecutamos
        $departmentValidator->assert($int);
        return ''; // Si no hay error retornamos una cadena vacía
    } catch(NestedValidationException $exception) {
        
        $error = "- Debe seleccionar un <b>Departamento</b> válido <br>";
        return $error;
    }
}

/*
|-----------------------------------------------------------------------------
| Valida município seleccionado
|-----------------------------------------------------------------------------
| Esta función verifica que el município seleccionado por el usuario
| corresponda con los almacenados en la base de datos, es decir que debe tener
| un valor que este entre 1 y 262 que son los municípios del pais 
|
| @access public
| @param int $int id del município seleccionado
| @return string $errors cadena de texto que contiene la lista de errores, si los hay
| 
*/
function municipalityValidator($int){
    
    // Establecemos las reglas
    $municipalityValidator = new Rules\AllOf(
        new Rules\IntVal,
        new Rules\Positive,
        new Rules\Between(1, 262)
    );

    try {
        // Ejecutamos
        $municipalityValidator->assert($int);
        return ''; // Si no hay error retornamos una cadena vacía
    } catch(NestedValidationException $exception) {
        
        $error = "- Debe seleccionar un <b>Municipio</b> válido <br>";
        return $error;
    }
}

/*
|-----------------------------------------------------------------------------
| Valida mnumero de teléfono
|-----------------------------------------------------------------------------
| Esta función verifica que el numero de teléfono ingresado por el usuario
| solo contenga numeros o el signo - y su longitud sea de 8 a 9 caraácteres
| Ej: 7777-888
|
| @access public
| @param string $phone teléfono pasado como parámetro
| @return string $errors cadena de texto que contiene la lista de errores, si los hay
| 
*/
function phoneValidator($phone){

    $phoneValidator = new Rules\AllOf(
        new Rules\Digit('-'),
        new Rules\Length(8, 9)
    );

    try {
        $phoneValidator->assert($phone);
        return '';
    } catch(NestedValidationException $exception){
        $error = "- Debe ingresar un <b> Teléfono </b> válido <br>";
        return $error;
    }

}

/*
|-----------------------------------------------------------------------------
| Valida que el correo electronico sea válido
|-----------------------------------------------------------------------------
| Esta función verifica que el correo electronico ingresado por el usuario
| cumpla con las siguientes reglas:
| Tenga el formato micorreo@dominio.com 
| Debe tener una longitud entre 10 y 100
|
| @access public
| @param string $email cadena que contiene el correo ingresado por el usuario
| @return string $errors cadena de texto que contiene la lista de errores, si los hay
| 
*/
function emailValidator($email){

    $emailValidator = new Rules\AllOf(
        // 
        // new Rules\Email,
        new Rules\Length(10, 100)
    );

    try{
        $emailValidator->assert($email);
        return ''; // Si no hay error retornamos una cadena vacía
    } catch(NestedValidationException $exception) {
    // Capturamos los errores
    // Establecemos los mensajes de error
    $exception->findMessages([
        // 'email' => "Debe ingresar un correo válido",
        'length' => "El correo debe tener una longitud entre 10 y 100 <br>"
    ]);
    $error = '';
    foreach ($exception->getMessages() as $key => $message) {
        $error .= "- $message <br>";
    }
    return $error;
    }

}

function documentIdValidator($document, $label, $minVal, $maxVal, $format){

    $documentValidator = new Rules\AllOf(
        new Rules\Digit('-'),
        new Rules\Length($minVal, $maxVal)
    );

    try {
        $documentValidator->assert($document);
        return '';
    } catch(NestedValidationException $exception){
        $error = "- El <b> $label </b> debe tener el siguiente formato $format <br>";
        return $error;
    }

}


?>