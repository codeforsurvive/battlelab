<?php if (!defined('BASEPATH'))     exit('No direct script access allowed');

class Invoice extends Implementation_Controller {
    
    //1. seluruh fungsi yang tidak public, menggunakan awalan '_' , contoh: _getProperty()
    //2. di atas fungsi diberikan penjelasan proses apa yang dilakukan. dari mana ambil data, 
    //inputnya apa dan outputnya apa. contoh di fungsi index()
    //3. Penamaan fungsi harus PUNUK ONTA dengan awalan huruf kecil $ Menggunakan Bahasa Inggris
    //4. Penamaan nama fungsi maksimal 3 kata

    public function __construct() {
        parent::__construct();
        $this->load->model('projects/mProject');
		$this->load->model('projects/mMainProject');
        $this->load->model('rab/mRab');
        $this->load->model('master/mSupplier');
		$this->load->model('master/mTop');
		$this->load->model('mInvoice');
		$this->load->model('mDetailInvoice');
		$this->title = "Invoice";
    }
    
    public function index()
    {
        $this->display('acInvoice', $this->data);
    }
	
	public function add(){
		$this->data['listMainProject'] = $this->mMainProject->_select();
        $this->display('acInvoiceAdd', $this->data);
    }
	
	public function edit(){
		$idInvoice = $this->input->post('id_to_edit');
		if($idInvoice == null) redirect (base_url ().'p-material/invoice');
		$detailInvoice = $this->mInvoice->getDetailInvoice($idInvoice);
        $this->data['Invoice'] = $detailInvoice[0];
		$this->data['detailInvoice'] = json_encode($this->mInvoice->getViewDetailInvoice($idInvoice));
		$this->data['listMainProject'] = $this->mMainProject->_select();
		$this->data['listProject'] = $this->mProject->_select(array(mProject::ID => $detailInvoice[0]["PROJECT_ID"]));
		$this->data['listRAB'] = $this->mRab->_select(array(mRab::ID => $detailInvoice[0]["RAB_ID"]));
		$this->data['listSupplier'] = $this->mSupplier->_select();
		$this->data['listTop'] = $this->mTop->_select();
        $this->display('acInvoiceEdit', $this->data);
    }
	
	public function getCurrentLPB(){
        $RAB_ID= $this->input->post('RAB_ID');
		$SUPPLIER_ID= $this->input->post('SUPPLIER_ID');
        $query = $this->mInvoice->getAllLPB($RAB_ID,$SUPPLIER_ID);
        echo json_encode($query);
    }
	
	public function getListTop(){
        $RAB_ID= $this->input->post('RAB_ID');
        $query = $this->mTop->getListTopPOByRabId($RAB_ID);
        echo json_encode($query);
    }
	
	public function getListSupplier(){
        $RAB_ID= $this->input->post('RAB_ID');
        $query = $this->mSupplier->getListSupplierByRabId($RAB_ID);
        echo json_encode($query);
    }
	
	public function getViewInvoice(){
		echo $this->mInvoice->getListInvoice();
	}
	
	public function getViewBarang(){
		$LPB_ID= $this->input->get('lpb_id');
		echo $this->mInvoice->getViewBarangLPB($LPB_ID);
	}
	
	public function viewDetail($INVOICE_ID){
        $detailInvoice = $this->mInvoice->getDetailInvoice($INVOICE_ID);
        $this->data['Invoice'] = $detailInvoice[0];
		$this->data['detailInvoice'] = json_encode($this->mInvoice->getViewDetailInvoice($INVOICE_ID));
        $this->display('acInvoiceDetail', $this->data);
    }
	
	public function validate(){
		$idInvoice = $this->input->post("tobe_validated_id");
		$value = $this->input->post("tobe_validated_val");
		$_updatedInvoice = array(
			mInvoice::STATUS => $value,
			mInvoice::VALIDATOR_ID => $this->data['iduseractive']
		);
		$this->mInvoice->_update($_updatedInvoice, array(mInvoice::ID => $idInvoice));
		redirect(base_url()."p-material/invoice");
	}
	
	public function savetovalidate(){
		$idInvoice = $this->input->post("tobe_simpan_validasi_id");
		$_updatedInvoice = array(
			mInvoice::STATUS => 2
		);
		$this->mInvoice->_update($_updatedInvoice, array(mInvoice::ID => $idInvoice));
		redirect(base_url()."p-material/invoice");
	}
	
	public function simpanInvoice()
	{
		$lpb = json_decode($this->input->post('LPB'));
		$_insertedInvoice = array(
			'RAB_ID' => $this->input->post('RAB_ID'), 
			'TOP_ID' => $this->input->post('TOP_ID'), 
			'SUPPLIER_ID' => $this->input->post('SUPPLIER_ID'), 
			'PETUGAS_ID' => $this->data['iduseractive'], 
			'VALIDATION_ID' => $this->input->post('STATUS_INVOICE_ID'), 
			'INVOICE_TIPE' => 'material', 
			'TOTAL_HARGA_INVOICE' => $this->input->post('INVOICE_TOTAL')
		);
		$idInvoice = $this->mInvoice->insertAndGetLast($_insertedInvoice);
		
		foreach($lpb as $item){			
			$_insertedDetailInvoice = array(
				'INVOICE_ID' => $idInvoice,
				'LPB_ID' => $item->LPB_ID, 
				'SUB_TOTAL_HARGA' => $item->SUB_TOTAL_HARGA
			);
			$this->mDetailInvoice->_insert($_insertedDetailInvoice);
		}
		echo "success";
	}
	
	public function updateInvoice()
	{
		$idInvoice = $this->input->post('INVOICE_ID'); 
		$lpb = json_decode($this->input->post('LPB'));
		$_updatedInvoice = array(
			'TOP_ID' => $this->input->post('TOP_ID'), 
			'PETUGAS_ID' => $this->data['iduseractive'], 
			'VALIDATION_ID' => $this->input->post('STATUS_INVOICE_ID'), 
			'INVOICE_TIPE' => 'material', 
			'TOTAL_HARGA_INVOICE' => $this->input->post('INVOICE_TOTAL')
		);
		$this->mInvoice->_update($_updatedInvoice, array(mInvoice::ID => $idInvoice));
		
		$this->mDetailInvoice->_delete(array(mInvoice::ID => $idInvoice));
		foreach($lpb as $item){			
			$_insertedDetailInvoice = array(
				'INVOICE_ID' => $idInvoice,
				'LPB_ID' => $item->LPB_ID, 
				'SUB_TOTAL_HARGA' => $item->SUB_TOTAL_HARGA
			);
			$this->mDetailInvoice->_insert($_insertedDetailInvoice);
		}
		echo "success";
	}
	
	public function printPDF($INVOICE_ID){
		$detailInvoice = $this->mInvoice->getDetailInvoice($INVOICE_ID);
        $this->data['Invoice'] = $detailInvoice[0];
		$this->data['detailInvoice'] = $this->mInvoice->getViewDetailInvoice($INVOICE_ID);
        
		$this->theme_layout = 'html2fpdf';
		$this->header = 'blank';
		$this->footer = 'blank';
		$this->left_sidebar = 'blank';
		$this->right_sidebar = 'blank';
		$this->script_header = 'lay-scripts/header-report';
		$this->script_footer = 'lay-scripts/footer-report';
		$this->display('acInvoiceDetailPDF', $this->data);
		
		$html = $this->output->get_output();
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('legal', 'landscape');
		$this->dompdf->render();
		//$this->dompdf->stream("welcome.pdf",array('Attachment'=>0));
		// direct download
		$filename = $this->data['Invoice']['INVOICE_KODE'];
		$this->dompdf->stream($filename.".pdf");
		
	}

}