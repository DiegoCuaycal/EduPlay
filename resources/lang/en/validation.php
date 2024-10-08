<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El atributo : debe ser aceptado.',
    'accepted_if' => 'El atributo : debe aceptarse cuando :other es :value',
    'active_url' => 'El atributo : no es una URL válida.',
    'after' => 'El atributo : debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El atributo : debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El atributo : sólo debe contener letras.',
    'alpha_dash' => 'El atributo :solo debe contener letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El atributo : sólo debe contener letras y números.',
    'array' => 'El atributo : debe ser una matriz',
    'before' => 'El atributo : debe ser una fecha anterior a :date.',
    'before_or_equal' => 'El atributo : debe ser una fecha anterior o igual a :date.',
    'between' => [
        'numeric' => 'El atributo : debe estar entre :min y :max.',
        'file' => 'El atributo : debe estar entre :min y :max kilobytes.',
        'string' => 'El atributo : debe estar entre :min y :max caracteres.',
        'array' => 'El atributo : debe tener entre :min y :max elementos.',
    ],
    'boolean' => 'El campo :attribute debe ser verdadero o falso.',
    'confirmed' => 'TLa confirmación del atributo :no coincide.',
    'current_password' => 'La contraseña es incorrecta.',
    'date' => 'El atributo : no es una fecha válida.',
    'date_equals' => 'El atributo : debe ser una fecha igual a :date.',
    'date_format' => 'El :attribute no coincide con el formato :format.',
    'declined' => 'El atributo : debe ser rechazado.',
    'declined_if' => 'El atributo : debe rechazarse cuando :other es :value.',
    'different' => 'El :attribute y :other deben ser diferentes.',
    'digits' => 'El atributo : debe ser :digits dígitos.',
    'digits_between' => 'El atributo : debe estar entre los dígitos :min y :max.',
    'dimensions' => 'El atributo : tiene dimensiones de imagen no válidas.',
    'distinct' => 'El campo :attribute tiene un valor duplicado',
    'email' => 'El atributo : debe ser una dirección de correo electrónico válida.',
    'ends_with' => 'El atributo : debe terminar con uno de los siguientes: :valores.',
    'exists' => 'El atributo : debe terminar con uno de los siguientes: :valores.',
    'file' => 'El atributo : debe ser un archivo',
    'filled' => 'El campo :attribute debe tener un valor.',
    'gt' => [
        'numeric' => 'El :atributo debe ser mayor que :valor.',
        'file' => 'El :attribute debe ser mayor que :value kilobytes.',
        'string' => 'El atributo : debe ser mayor que :value caracteres.',
        'array' => 'El atributo : debe tener más de :value elementos.',
    ],
    'gte' => [
        'numeric' => 'El :atributo debe ser mayor o igual que :valor.',
        'file' => 'El :attribute debe ser mayor o igual a :value kilobytes.',
        'string' => 'El atributo : debe ser mayor o igual que los caracteres :value.',
        'array' => 'El atributo : debe tener :value elementos o más.',
    ],
    'image' => 'El atributo : debe ser una imagen.',
    'in' => 'El atributo seleccionado no es válido.',
    'in_array' => 'El campo :attribute no existe en :other.',
    'integer' => 'El atributo : debe ser un número entero.',
    'ip' => 'El atributo : debe ser una dirección IP válida.',
    'ipv4' => 'El atributo : debe ser una dirección IPv4 válida.',
    'ipv6' => 'El atributo : debe ser una dirección IPv6 válida.',
    'json' => 'El atributo : debe ser una cadena JSON válida.',
    'lt' => [
        'numeric' => 'El atributo : debe ser menor que el valor.',
        'file' => 'El atributo : debe ser menor que :value kilobytes.',
        'string' => 'El atributo : debe tener menos de :valor caracteres.',
        'array' => 'El atributo : debe tener menos de :value elementos.',
    ],
    'lte' => [
        'numeric' => 'El :atributo debe ser menor o igual que :valor.',
        'file' => 'El :attribute debe ser menor o igual a :value kilobytes.',
        'string' => 'El atributo : debe ser menor o igual que los caracteres :value.',
        'array' => 'El atributo : no debe tener más de :value elementos.',
    ],
    'max' => [
        'numeric' => 'El :attribute no debe ser mayor que :max.',
        'file' => 'El atributo :no debe ser mayor que :max kilobytes.',
        'string' => 'El atributo : no debe tener más de :max caracteres.',
        'array' => 'El atributo :no debe tener más de :max elementos.',
    ],
    'mimes' => 'El atributo : debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El atributo : debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => 'El atributo : debe ser al menos :min.',
        'file' => 'El atributo : debe tener al menos :min kilobytes.',
        'string' => 'El atributo : debe tener al menos :min caracteres.',
        'array' => 'El atributo : debe tener al menos :min elementos.',
    ],
    'multiple_of' => 'El :atributo debe ser un múltiplo de :valor.',
    'not_in' => 'El atributo seleccionado no es válido.',
    'not_regex' => 'El formato :attribute no es válido.',
    'numeric' => 'El atributo : debe ser un número.',
    'password' => 'La contraseña es incorrecta.',
    'present' => 'El campo :attribute debe estar presente.',
    'regex' => 'El formato :attribute no es válido.',
    'required' => 'El campo :attribute es obligatorio.',
    'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless' => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with' => 'El campo :attribute es obligatorio cuando :values ​​está presente.',
    'required_with_all' => 'El campo :attribute es obligatorio cuando hay :values ​​presentes.',
    'required_without' => 'El campo :attribute es obligatorio cuando :values ​​no está presente.',
    'required_without_all' => 'El campo :attribute es obligatorio cuando ninguno de los :values ​​está presente.',
    'prohibited' => 'El campo :attribute está prohibido.',
    'prohibited_if' => 'El campo :attribute está prohibido cuando :other es :value.',
    'prohibited_unless' => 'El campo :attribute está prohibido a menos que :other esté en :values.',
    'prohibits' => 'El campo :attribute prohíbe que :other esté presente.',
    'same' => 'El atributo: y: otro debe coincidir',
    'size' => [
        'numeric' => 'El atributo : debe ser :size.',
        'file' => 'El :atributo debe ser :size kilobytes.',
        'string' => 'El atributo : debe ser :size caracteres.',
        'array' => 'El atributo : debe contener elementos :size.',
    ],
    'starts_with' => 'El atributo : debe comenzar con uno de los siguientes: :valores.',
    'string' => 'El atributo : debe ser una cadena.',
    'timezone' => 'El atributo : debe ser una zona horaria válida.',
    'unique' => 'El atributo :ya ha sido tomado.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'El atributo :no se pudo cargar.',
    'uuid' => 'The :attribute must be a valid UUID..',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
