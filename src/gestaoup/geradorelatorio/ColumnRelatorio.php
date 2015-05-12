<?php
namespace gestaoup\geradorelatorio;

use gestaoup\Util;

class ColumnRelatorio
{
	/*
	 * Nome da coluna
	 */
	public $label = "";
	
	/*
	 * Campo que o sql retorna
	 */
	public $attributes = [];
	
	/*
	 * Função que formata o valor
	 * tem que passar uma closure como parametro
	 */
	public $formatFunction;
	
	/*
	 * Dados dessa coluna
	 */
	public $data = [];
	
	public function __construct()
	{
		$this->label = "asda";
		
		$this->formatFunction = function($value)
		{
			if(is_array($value))
			{
				return implode(' ',$value);
			}
		};
	}
	
	public function setFormatFunction($closure)
	{
		$this->formatFunction = $closure;
	}
	
	public function addAttribute($attr)
	{
		$this->attributes[] = $attr;
	}
	
	public function setAttributes(array $attrs)
	{
		$this->attributes = $attrs;
	}
}