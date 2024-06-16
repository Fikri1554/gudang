<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gudang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mgudang');
		$this->load->helper(array('form', 'url'));
		$this->load->library('../controllers/DataContext');
	}

	function index()
	{
		$this->load->view('gudang/login');
		// $this->getData();
	}

	function getData()
	{
		$dataContext = new DataContext();
		$dataOut = array();
		$trNya = "";
		$no = 1;
		$search = "";


		$sql = "SELECT * FROM data_gudang WHERE st_delete = '0' ";
		$rsl = $this->mgudang->getDataQuery($sql);

		if($search == "search") 

		foreach ($rsl as $key => $val)
		{
			$btnAct = "<button class=\"btn btn-success btn-sm btn-block\" onclick=\"editData('".$val->id."');\" title=\"Edit Data\">Edit</button>";
			$btnAct .= "<button class=\"btn btn-danger btn-sm btn-block\" onclick=\"delData('".$val->id."');\" title=\"Delete Data\">Delete</button>";

			$trNya .= "<tr>";
				$trNya .= "<td align=\"center\" style=\"font-size:12px;vertical-align:top;\">".$no."</td>";
				$trNya .= "<td align=\"center\" style=\"font-size:12px;vertical-align:top;\">".$val->floor."/".$val->rack."/".$val->level."</td>";
				$trNya .= "<td align=\"left\" style=\"font-size:12px;vertical-align:top;\">".$val->title."</td>";
				$trNya .= "<td align=\"left\" style=\"font-size:12px;vertical-align:top;\">".$val->remark."</td>";
				$trNya .= "<td align=\"left\" style=\"font-size:12px;vertical-align:top;\">".$val->company."</td>";
				$trNya .= "<td align=\"center\" style=\"font-size:12px;vertical-align:top;\">".$val->divisi."</td>";
				$trNya .= "<td align=\"center\" style=\"font-size:12px;vertical-align:top;\">".$val->year." / ".$val->document_no."</td>";
				$trNya .= "<td align=\"center\" style=\"font-size:12px;vertical-align:top;\">".$btnAct."</td>";
			$trNya .= "</tr>";

			$no++;
		}

		$dataOut['trNya'] = $trNya;
		$dataOut['slcFloor'] = $dataContext->getOptMstFloor();
		$dataOut['slcRack'] = $dataContext->getOptMstRack();
		$dataOut['slcCompany'] = $dataContext->getOptMstCompany();
		$dataOut['slcDivisi'] = $dataContext->getOptMstDivisi();

		$this->load->view('gudang/viewGudang',$dataOut);
	}

	function saveData()
	{
		$data = $_POST;
		$dataIns = array();
		$stData = "";
		$idEdit = $data['txtIdEdit'];
		$dataNow = date("Y-m-d");

		try {

			$dataIns['floor'] = $data['slcFloor'];			
			$dataIns['rack'] = $data['slcRack'];
			$dataIns['level'] = $data['slcLevel'];			
			$dataIns['company'] = $data['slcCompany'];
			$dataIns['divisi'] = $data['slcDivisi'];
			$dataIns['title'] = $data['txtTitle'];
			$dataIns['remark'] = $data['txtRemark'];			
			$dataIns['document_no'] = $data['txtDocNo'];
			$dataIns['year'] = $data['txtYear'];

			if($idEdit == "")
			{
				$dataIns['add_date'] = $dataNow;

				$idEdit = $this->mgudang->insData("data_gudang",$dataIns,"");
			}else{
				$dataIns['edit_date'] = $dataNow;

				$whereNya = "id = '".$idEdit."'";
				$this->mgudang->updateData($whereNya,$dataIns,"data_gudang");
			}
			$stData = "Save Success..!!";			
		} catch (Exception $ex) {
			$stData = "Failed => ".$ex->getMessage();
		}

		print $stData;
	}

	function getDataEdit()
	{
		$dataOut = array();
		$id = $_POST['id'];

		$sql = "SELECT * FROM data_gudang WHERE st_delete = '0' AND id = '".$id."'";
		$rsl = $this->mgudang->getDataQuery($sql);

		$dataOut['rsl'] = $rsl;
		print json_encode($dataOut);
	}

	function deleteData()
	{
		$stData = "";
		$idDel = $_POST['id'];
		$dataUpd = array();

		try {
			$dataUpd['st_delete'] = "1";

			$whereNya = "id = '".$idDel."'";
			$this->mgudang->updateData($whereNya,$dataUpd,"data_gudang");

			$stData = "Delete Success..!!";
		} catch (Exception $ex) {
			$stData = "Failed => ".$ex->getMessages();
		}		

		print json_encode($stData);
	}

	function login()
	{
		$dataOut = array();
		$data = $_POST;
		$user = $data['user'];
		$pass = md5($data['pass']);
		$status = "0";
		$txtStatus = '';

		$whereNya = "username = '".$user."' AND deletests = '0' ";
		$sql = "SELECt * FROM login WHERE ".$whereNya;

		$cekLoginUser = $this->mgudang->getDataQueryDb2($sql);

		if(count($cekLoginUser) > 0)
		{
			$whereNya = "username = '".$user."' AND userpass = '".$pass."' AND deletests = '0' ";
			$sql = "SELECt * FROM login WHERE ".$whereNya;

			$cekLogin = $this->mgudang->getDataQueryDb2($sql);

			if(count($cekLogin) > 0)
			{
				$this->session->set_userdata('idUserGudang',$cekLogin[0]->userid);
				$this->session->set_userdata('fullNameGudang',$cekLogin[0]->userfullnm);
				$this->session->set_userdata('userTypeGudang',$cekLogin[0]->userjenis);
				$this->session->set_userdata('userDivisiGudang',$cekLogin[0]->nmdiv);
				$status = "1";
			}else{
				$txtStatus = "Password Failed..!!";
			}
		}else{
			$txtStatus = "Username Failed..!!";
		}

		$dataOut['textSt'] = $txtStatus;
		$dataOut['status'] = $status;

		print json_encode($dataOut);
	}

	function logout()
	{
		$this->session->unset_userdata('idUserGudang');
		$this->session->unset_userdata('fullNameGudang');
		$this->session->unset_userdata('userTypeGudang');
		$this->session->unset_userdata('userDivisiGudang');
		// $this->session->sess_destroy();
		redirect(base_url());
	}


}
