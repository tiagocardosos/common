<?php
/**
 * @author Ulisses Vaquero
 */

namespace gestaoup\geradorelatorio;

use gestaoup\Util;

class RelatorioBuilder {
	public $columns;
	public $sql;
	public $result;
	
	public function setSql($sql) {
		$this->sql = $sql;
	}
	
	public function setColumns($columns) {
		$this->columns = $columns;
	}
	
	public function getColumns() {
		return $this->columns;
	}
	
	public function getResult() {
		$this->result = \Yii::$app->db->createCommand ( $this->sql )->queryAll ();
	}
	
	public function setDataResult($data)
	{
		$this->result = $data;
	}
	
	public function populateDataColumns() {
		if(!$this->result){
			$this->getResult();
		}
		if ($this->result) {
			foreach ( $this->result as $r ) {
				for($i = 0; $i < count ( $this->columns ); $i ++) {
					$arrValues = [ ];
					foreach ( $this->columns [$i]->attributes as $attribute ) {
						$arrValues [$attribute] = '';
						if (isset ( $r [$attribute] )) {
							$arrValues [$attribute] = $r [$attribute];
						}
					}
					$this->columns [$i]->data [] = $this->columns [$i]->formatFunction->__invoke ( $arrValues );
				}
			}
		}
	}
	
	public function build() {
		$this->populateDataColumns();
		
		$qtdLinhas = 0;
		$html = '<table border=1>';
		//Cabeçalho
		$html .= "<tr>";
		foreach($this->columns as $col)
		{
			$html.= '<td>'.$col->label.'</td>';
			$qtdLinhas = count($col->data);
		}
		
		for($i=0;$i<$qtdLinhas;$i++)
		{
			$html .= '<tr>';
			foreach($this->columns as $col)
			{
				$html .= '<td>'.$col->data[$i].'</td>';
			}
			$html .= '</tr>';
		}
		
		//Corpo
		$html .= "</tr>";
		
		$html .= '</table>';
		
		return $html;		
		
	}
}