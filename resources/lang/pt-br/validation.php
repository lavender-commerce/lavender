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

	"accepted"             => "O campo :attribute precisa ser aceito.",
	"active_url"           => "O campo :attribute não é uma URL válida.",
	"after"                => "O campo :attribute precisa ser uma data após :date.",
	"alpha"                => "O campo :attribute Só pode conter letras.",
	"alpha_dash"           => "O campo :attribute Só pode conter letras, números, e traços.",
	"alpha_num"            => "O campo :attribute Só pode conter letras e números.",
	"array"                => "O campo :attribute precisa ser um vetor.",
	"before"               => "O campo :attribute precisa ser uma data anterior a :date.",
	"between"              => [
		"numeric" => "O campo :attribute precisa estar entre :min e :max.",
		"file"    => "O campo :attribute precisa estar entre :min e :max kilobytes.",
		"string"  => "O campo :attribute precisa estar entre :min e :max characters.",
		"array"   => "O campo :attribute precisa ter entre :min e :max itens.",
	],
	"boolean"              => "O campo :attribute precisa ser verdadeiro ou falso.",
	"confirmed"            => "O campo :attribute a confirmação não é compatível.",
	"date"                 => "O campo :attribute não é uma data válida.",
	"date_format"          => "O campo :attribute não é compatível com o formato :format.",
	"different"            => "O campo :attribute e :other precisam ser diferentes.",
	"digits"               => "O campo :attribute precisa ter :digits digits.",
	"digits_between"       => "O campo :attribute precisa estar entre :min e :max digits.",
	"email"                => "O campo :attribute precisa ser um endereço de email válido.",
	"filled"               => "O campo :attribute é obrigatório.",
	"exists"               => "O atributo selecionado :attribute é inválido.",
	"image"                => "O campo :attribute precisa ser uma imagem.",
	"in"                   => "O campo selecionado :attribute é inválido.",
	"integer"              => "O campo :attribute precisa ser um inteiro.",
	"ip"                   => "O campo :attribute precisa ser um endereço de IP válido.",
	"max"                  => [
		"numeric" => "O campo :attribute não pode ser maior que :max.",
		"file"    => "O campo :attribute não pode ter mais que :max kilobytes.",
		"string"  => "O campo :attribute não pode ter mais que :max caractéres.",
		"array"   => "O campo :attribute não pode ter mais que :max items.",
	],
	"mimes"                => "O campo :attribute precisa ser um arquivo do tipo: :values.",
	"min"                  => [
		"numeric" => "O campo :attribute precisa ser, no mínimo, :min.",
		"file"    => "O campo :attribute precisa ter, no mínimo, :min kilobytes.",
		"string"  => "O campo :attribute precisa ter, no mínimo, :min caractéres.",
		"array"   => "O campo :attribute precisa ter no mínimo :min itens.",
	],
	"not_in"               => "O campo selecionado :attribute é inválido.",
	"numeric"              => "O campo :attribute precisa ser um número.",
	"regex"                => "O campo :attribute tem formato inválido.",
	"required"             => "O campo :attribute é obrigatório.",
	"required_if"          => "O campo :attribute é obrigatório quando :other é :value.",
	"required_with"        => "O campo :attribute é obrigatório quando :values existe.",
	"required_with_all"    => "O campo :attribute é obrigatório quando :values existe.",
	"required_without"     => "O campo :attribute é obrigatório quando :values não existe.",
	"required_without_all" => "O campo :attribute é obrigatório quando nenhum dos valores :values está presente.",
	"same"                 => "Os campos :attribute e :other precisam ser compatíveis.",
	"size"                 => [
		"numeric" => "O campo :attribute precisa ter :size.",
		"file"    => "O campo :attribute precisa ter :size kilobytes.",
		"string"  => "O campo :attribute precisa ter :size caractéres.",
		"array"   => "O campo :attribute precisa ter :size itens.",
	],
	"unique"               => "O campo :attribute já foi escolhido",
	"url"                  => "O campo :attribute tem formato inválido.",
	"timezone"             => "O campo :attribute precisa ser uma timezone válida.",

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
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => [],

];
