<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DataContext extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		$this->load->model('mgudang');
		$this->load->helper(array('form', 'url'));
	}

	function getOptMstFloor()
	{
		$opt = "<option value=\"\">- Select -</option>";

		$sql = " SELECT * FROM master_floor WHERE st_delete = '0' ORDER BY nama ASC ";
		$rsl = $this->mgudang->getDataQuery($sql);

		foreach ($rsl as $key => $val)
		{
			$opt .= "<option value=\"".$val->nama."\">".$val->nama."</option>";
		}

		return $opt;
	}

	function getOptMstRack()
	{
		$opt = "<option value=\"\">- Select -</option>";

		$sql = " SELECT * FROM master_rack WHERE st_delete = '0' ORDER BY nama ASC ";
		$rsl = $this->mgudang->getDataQuery($sql);

		foreach ($rsl as $key => $val)
		{
			$opt .= "<option value=\"".$val->nama."\">".$val->nama."</option>";
		}

		return $opt;
	}

	function getOptMstCompany()
	{
		$opt = "<option value=\"\">- Select -</option>";

		$sql = " SELECT * FROM mst_company WHERE st_delete = '0' ORDER BY name_company ASC ";
		$rsl = $this->mgudang->getDataQuery($sql);

		foreach ($rsl as $key => $val)
		{
			$opt .= "<option value=\"".$val->name_company."\">".$val->name_company."</option>";
		}

		return $opt;
	}

	function getOptMstDivisi()
	{
		$opt = "<option value=\"\">- Select -</option>";

		$sql = " SELECT * FROM tblmstdiv WHERE deletests = '0' ORDER BY nmdiv ASC ";
		$rsl = $this->mgudang->getDataQueryDb2($sql);

		foreach ($rsl as $key => $val)
		{
			$opt .= "<option value=\"".$val->nmdiv."\">".$val->nmdiv."</option>";
		}

		return $opt;
	}

	function uploadFile($tmpFile = "",$dir = "",$fileName = "",$newFileName = "")
	{
		$dt = explode(".", $fileName);
		$newFileName = str_replace(array(' ','/','.',',','-'), '', $newFileName).".".trim($dt[count($dt)-1]);
		move_uploaded_file($tmpFile, $dir."/".$fileName);
		rename($dir."/".$fileName, $dir."/".$newFileName);
		return $newFileName;
	}

	function getMonthName($dateNya = "")
	{
		$tempData = array('Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des');
		
		return $tempData;
	}

	function convertReturnName($dateNya = "")
	{
		if($dateNya == "0000-00-00")
		{
			return "";
		}else{
			$dt = explode("-", $dateNya);
			$tgl = $dt[2];
			$bln = $dt[1];
			$thn = $dt[0];
			if($bln == "01" || $bln == "1"){ $bln = "Jan"; }
			else if($bln == "02" || $bln == "2"){ $bln = "Feb"; }
			else if($bln == "03" || $bln == "3"){ $bln = "Mar"; }
			else if($bln == "04" || $bln == "4"){ $bln = "Apr"; }
			else if($bln == "05" || $bln == "5"){ $bln = "Mei"; }
			else if($bln == "06" || $bln == "6"){ $bln = "Jun"; }
			else if($bln == "07" || $bln == "7"){ $bln = "Jul"; }
			else if($bln == "08" || $bln == "8"){ $bln = "Agu"; }
			else if($bln == "09" || $bln == "9"){ $bln = "Sep"; }
			else if($bln == "10"){ $bln = "Okt"; }
			else if($bln == "11"){ $bln = "Nov"; }
			else if($bln == "12"){ $bln = "Des"; }

			return $tgl." ".$bln." ".$thn;
		}
	}

	function convertReturnNameWithTime($dateNya = "")
	{
		$dataNya = explode(" ", $dateNya);
		$dt = explode("-", $dataNya[0]);
		$dtm = explode(":", $dataNya[1]);

		$tgl = $dt[2];
		$bln = $dt[1];
		$thn = $dt[0];

		if($bln == "01" || $bln == "1"){ $bln = "Jan"; }
		else if($bln == "02" || $bln == "2"){ $bln = "Feb"; }
		else if($bln == "03" || $bln == "3"){ $bln = "Mar"; }
		else if($bln == "04" || $bln == "4"){ $bln = "Apr"; }
		else if($bln == "05" || $bln == "5"){ $bln = "Mei"; }
		else if($bln == "06" || $bln == "6"){ $bln = "Jun"; }
		else if($bln == "07" || $bln == "7"){ $bln = "Jul"; }
		else if($bln == "08" || $bln == "8"){ $bln = "Agu"; }
		else if($bln == "09" || $bln == "9"){ $bln = "Sep"; }
		else if($bln == "10"){ $bln = "Okt"; }
		else if($bln == "11"){ $bln = "Nov"; }
		else if($bln == "12"){ $bln = "Des"; }

		return $tgl." ".$bln." ".$thn." ".$dtm[0].":".$dtm[1];
	}

	function convertReturnNameWithTimeUnder($dateNya = "")
	{
		$dataNya = explode(" ", $dateNya);
		$dt = explode("-", $dataNya[0]);
		$dtm = explode(":", $dataNya[1]);

		$tgl = $dt[2];
		$bln = $dt[1];
		$thn = $dt[0];

		if($bln == "01" || $bln == "1"){ $bln = "Jan"; }
		else if($bln == "02" || $bln == "2"){ $bln = "Feb"; }
		else if($bln == "03" || $bln == "3"){ $bln = "Mar"; }
		else if($bln == "04" || $bln == "4"){ $bln = "Apr"; }
		else if($bln == "05" || $bln == "5"){ $bln = "Mei"; }
		else if($bln == "06" || $bln == "6"){ $bln = "Jun"; }
		else if($bln == "07" || $bln == "7"){ $bln = "Jul"; }
		else if($bln == "08" || $bln == "8"){ $bln = "Agu"; }
		else if($bln == "09" || $bln == "9"){ $bln = "Sep"; }
		else if($bln == "10"){ $bln = "Okt"; }
		else if($bln == "11"){ $bln = "Nov"; }
		else if($bln == "12"){ $bln = "Des"; }

		return $tgl." ".$bln." ".$thn."<br>".$dtm[0].":".$dtm[1];
	}

	function convertReturnBulanTglTahun($dateNya = "")
	{
		if($dateNya == "0000-00-00")
		{
			return "";
		}else{
			$dt = explode("-", $dateNya);
			$tgl = $dt[2];
			$bln = $dt[1];
			$thn = $dt[0];
			if($bln == "01" || $bln == "1"){ $bln = "Jan"; }
			else if($bln == "02" || $bln == "2"){ $bln = "Feb"; }
			else if($bln == "03" || $bln == "3"){ $bln = "Mar"; }
			else if($bln == "04" || $bln == "4"){ $bln = "Apr"; }
			else if($bln == "05" || $bln == "5"){ $bln = "Mei"; }
			else if($bln == "06" || $bln == "6"){ $bln = "Jun"; }
			else if($bln == "07" || $bln == "7"){ $bln = "Jul"; }
			else if($bln == "08" || $bln == "8"){ $bln = "Agu"; }
			else if($bln == "09" || $bln == "9"){ $bln = "Sep"; }
			else if($bln == "10"){ $bln = "Okt"; }
			else if($bln == "11"){ $bln = "Nov"; }
			else if($bln == "12"){ $bln = "Des"; }

			return $bln." ".$tgl." ".$thn;
		}
	}




















}