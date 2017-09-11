<?php

Form::macro('buttonSubmit', function($txt = 'Salvar ',$icon = 'glyphicon-plus')
{
    return "<button type='submit' class='btn btn-success'>$txt <span class='glyphicon $icon'></span> </button>";
});

Form::macro('buttonReturn', function($return,$text = 'Voltar ',$icon = 'glyphicon-chevron-left')
{
	$return = "onclick=location.href='" . $return . "'";
    return "<button type='button' $return class='btn btn-warning btn-padding'>" . $text . "<span class='glyphicon $icon'></span> </button>";
});

Form::macro('buttonTrash', function($return)
{
	$return = "onclick=location.href='" . $return . "'";
    return "<button type='button' $return class='btn btn-warning btn-padding'>Lixeira <span class='glyphicon glyphicon-trash'></span> </button>";
});

Form::macro('buttonSearch', function()
{
    return "<button type='button' class='btn btn-primary btn-padding'>Pesquisar <span class='glyphicon glyphicon-search'></span> </button>";
});

Form::macro('buttonNew', function($return)
{
	$return = "onclick=location.href='" . $return . "'";
    return "<button type='button' $return class='btn btn-success'>Novo <span class='glyphicon glyphicon-plus'></span> </button>";
});

Form::macro('buttonDelete', function()
{
    return "<button type='submit' class='btn btn-danger' data-dismiss='modal'>Sim </button>";
});