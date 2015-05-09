<?php
namespace gestaoup;

use Yii;

class Util 
{
	public static function removerMascaraCPF($cpf){
		$cpf = str_replace(".", "", $cpf);
        $cpf = str_replace("-", "", $cpf);
        return $cpf;
	}
	
  	public static function mascararCPF ($cpf){
        if (strlen($cpf) > 0) {
            $parte1 = substr($cpf, 0, 3);
            $parte2 = substr($cpf, 3, 3);
            $parte3 = substr($cpf, 6, 3);
            $parte4 = substr($cpf, 9, 2);
            return "$parte1.$parte2.$parte3-$parte4";
        }
        return "";
    }

	public static function removerMascaraMoeda($moeda){
		$moeda = str_replace(".", "", $moeda);
		$moeda = str_replace(",", ".", $moeda);
		if(!empty($moeda))
		$moeda = number_format($moeda, 2, '.', '');
		
        return $moeda;
	}
	
	public static function mascararDecimalBD($moeda){

		$moeda = number_format($moeda, 2, '.', '');
		
        return $moeda;
	}
	
  	public static function mascararMoeda($moeda){
  		$moeda = number_format($moeda, 2, ',', '.');
  		return $moeda;
    }
	
	public static function removerMascaraCEP($cep){
		$cep = str_replace("-", "", $cep);
		return $cep;
	}

	public static function mascararCEP($cep){
		if (strlen($cep) == 8) {
			$parte1 = substr($cep, 0, 2);
			$parte2 = substr($cep, 2, 3);
			$parte3 = substr($cep, 5, 3);
			return "$parte1.$parte2-$parte3";
		}
		return "";
	}
	
	public static function removerMascaraTel($tel){
		$tel = str_replace("-", "", $tel);
		return $tel;
	}
			
	public static function removerMascaraData($data){
		if (isset($data)) {
			$dia = substr($data, 0, 2);
			$mes = substr($data, 3, 2);
			$ano = substr($data, 6, 4);
			return "$ano-$mes-$dia";
		} else
		return null;
	}
	
 	public static function mascararData($data)
    {
    	$date = new DateTime($data);
    	return $date->format('d/m/Y');
    }
    
    public static function removerMascaraCNPJ($cnpj){
    	$cnpj = str_replace(".", "", $cnpj);
    	$cnpj = str_replace("/", "", $cnpj);
    	$cnpj = str_replace("-", "", $cnpj);
    	return $cnpj;
    }
    
    public static function mascararCNPJ($cnpj){
    	if (strlen($cnpj) > 0) {
    		$parte1 = substr($cnpj, 0, 2);
    		$parte2 = substr($cnpj, 2, 3);
    		$parte3 = substr($cnpj, 5, 3);
    		$parte4 = substr($cnpj, 8, 4);
    		$parte5 = substr($cnpj, 12, 2);
    		return "$parte1.$parte2.$parte3/$parte4-$parte5";
    	}
    		return "";
    }
    
    public static function removerMascaraIE($ie){
    	$ie = str_replace(".", "", $ie);
    	$ie = str_replace("-", "", $ie);
    	$ie = str_replace("/", "", $ie);
    	
    	return $ie;
    }
    
    public function removerMascaraHora(){
    	
    }
    
    public function mascararHora(){
    	
    }
    
    
    public static function x()
    {
    	$args = func_get_args();
    
    	$dbt = debug_backtrace();
    	$linha   = $dbt[0]['line'];
    	$arquivo = $dbt[0]['file'];
    	echo "<fieldset style='border:2px solid; border-color:#F00;legend'><b>Arquivo:</b>".$arquivo."<b><br>Linha:</b><legend>Debug On : x ( )</legend> $linha</fieldset>";
    
    	if(count($args))
    	{
    		foreach($args as $idx=>$value)
    		{
    			echo "<pre style='background-color:#ABC; width:100%; heigth:100%;border:2px solid;'>";
    			echo "ARG[$idx]";
    			print_r($value);
    			echo "</pre>";
    		}
    	}
    	else
    	{
    		echo "<pre style='background-color:#ABC; width:100%; heigth:100%;border:2px solid;'>";
    		echo "SEM ARGUMENTOS";
    		echo "</pre>";
    	}
    
    }
    
    public static function xd()
    {
    	$args = func_get_args();
    
    	$dbt = debug_backtrace();
    	$linha   = $dbt[0]['line'];
    	$arquivo = $dbt[0]['file'];
    
    	echo "<fieldset style='border:2px solid; border-color:#F00;legend'><b>Arquivo:</b>".$arquivo."<b><br>Linha:</b><legend>Debug On : xd ( )</legend> $linha</fieldset>";
    
    	if(count($args))
    	{
    	foreach($args as $idx=>$value)
    	{
    	echo "<pre style='background-color:#CBA; width:100%; heigth:100%;border:2px solid;'>";
	        echo "ARG[$idx]<br/>";
    	print_r($value);
    	echo "</pre>";
    	}
    	}
    	else
    	{
    	echo "<pre style='background-color:#CBA; width:100%; heigth:100%;border:2px solid;'>";
        echo "SEM ARGUMENTOS";
        echo "</pre>";
    	}
    
    	die();
    }    
    
    
    public static function arrayMeses($mes = null){
    	$arMeses = array(1=>"Janeiro", 
    			2=>"Fevereiro", 
    			3=>"MarÃ§o", 4=>"Abril", 5=>"Maio", 6=>"Junho", 
    			7=>"Julho", 8=>"Agosto", 9=>"Setembro", 10=>"Outubro", 
    			11=>"Novembro", 12=>"Dezembro");
    	
    	return empty($mes) ? $arMeses : $arMeses[$mes];
    }
    
    public static function dataUltimoDiaMes($mes, $ano){
    	$dataAno = date("Y", mktime(0,0,0,$mes,'01',$ano));
    	$dataMes = date("m", mktime(0,0,0,$mes,'01',$ano));
    	$dataDia = date("t", mktime(0,0,0,$mes,'01',$ano));
    	
    	return $dataDia."/".$dataMes."/".$dataAno;
    }

    public static function dataPrimeiroDiaMes($mes, $ano){
    	$dataAno = date("Y", mktime(0,0,0,$mes,'01',$ano));
    	$dataMes = date("m", mktime(0,0,0,$mes,'01',$ano));
    	$dataDia = "01";
    	
    	return $dataDia."/".$dataMes."/".$dataAno;
    }
    
    /*
     * FormataÃ§Ã£o para NFE protocolo
     * Peenchido com a data e hora do processamento (informado tambeÌ�m no caso de rejeicÌ§aÌƒo).
     * Formato AAAA-MM-DDThh:mm:ssTZD (UTC - Universal Coordinated Time). 
     */    
    public static function formatarDataHoraNfe($data){
    	$data = str_replace("T", " ", $data);    	
    	$datetime = new DateTime($data);
    	$data = $datetime->format('d/m/Y H:i:s');
    	
    	return $data;
    }

    public static function dma2Ymd($data){
    	$data = implode("-",array_reverse(explode("/",$data)));
    	$datetime = new DateTime($data);
    	$data = $datetime->format('Y-m-d');    	
    	return $data;
    }
    
    public static function ymd2Dmy($data){
    	$datetime = new DateTime($data);
    	$data = $datetime->format('d/m/Y');
    	
    	return $data;
    }
    
    
    public static function limpaDocumento($doc) {
		$doc = Util::removerMascaraCPF($doc);
		$doc = Util::removerMascaraCNPJ($doc);
		
    	return $doc;
    }
    
	//SOMA, POR PADRAO, DOIS DIAS NA DATA PASSADA
    public static function somarData($dataVencimento,$qtdDias,$periodo = "D"){
    
    	$data = new DateTime(Util::dma2Ymd(date("d/m/Y")));
    	$data->add(new DateInterval("P".$qtdDias.$periodo));
    	$data = $data->format("d/m/Y");
    
    	return ($data);
    }
    
    public static function dataMaiorQue($data, $data2 = null){
    	
    	$data1 = new DateTime(Util::dma2Ymd($data));
    	$data1 = $data1->format('Ymd');
    	
    	if(!$data2){
    		$data2 = date('Ymd');
    	}    	
    	
    	if($data1 > $data2){
    		return true;
    	} else {
    		return false;
    	}
    }
    
        
}
