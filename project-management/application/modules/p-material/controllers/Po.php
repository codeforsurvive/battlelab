<?php if (!defined('BASEPATH'))     exit('No direct script access allowed');

/*
* @package		Controller - CIMasterArtcak
* @author		Felix - Artcak Media Digital
* @copyright	Copyright (c) 2014
* @link		http://artcak.com
* @since		Version 1.0
 * @description
 * Contoh Tampilan administrator dashbard
 */

//dapat diganti extend dengan *contoh Admin_controller / Aplikan_controller di folder core. 
// Nama kelas harus sama dengan nama file php
class Po extends Implementation_Controller {
    
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
        $this->load->model('mPurchaseOrder');
        $this->load->model('mPermintaan');
        $this->load->model('mDetailTransaksiPP');
        $this->load->model('mDetailPo');
		$this->load->model('mPo');
		$this->load->model('mKategoriPp');
        $this->load->model('master/mSupplier');
		$this->load->model('master/mTop');
		$this->load->model('master/mPajak');
		$this->load->model('master/mGudang');
		$this->load->model('master/mKategoriPajak');
        $this->title = "Purchase Order";
    }
    
    
    /*
     * Digunakan untuk menampilkan dashboard di awal. Setiap tampilan view, harap menggunakan fungsi
     * index(). Pembentukan view terdiri atas:
     * 1. Title
     * 2. Set Partial Header
     * 3. Set Partial Right Top Menu
     * 4. Set Partial Left Menu
     * 5. Body
     * 6. Data-data tambahan yang diperlukan
     * Jika tidak di-set, maka otomatis sesuai dengan default
     */
    public function index()
    {
        //$this->data['listPo'] = $this->mPurchaseOrder->getTotalPo();
        $this->display('acPo', $this->data);
    }
    
	public function add(){
		$this->data['listMainProject'] = $this->mMainProject->_select();
        $this->data['listPengguna'] = $this->mSupplier->_select();
		$this->data['listTop'] = $this->mTop->_select();
		$this->data['listPajak'] = $this->mPajak->_select();
		$this->data['listGudang'] = $this->mGudang->_select();
		$this->data['listKategoriPP'] = $this->mKategoriPp->_select();
		$this->data['listKategoriPajak'] = $this->mKategoriPajak->_select();
        $this->display('acPoAdd', $this->data);
    }
	
	public function edit(){
		$idPO = $this->input->post('id_to_edit');
		if($idPO == null) redirect (base_url ().'p-material/po');
		$tipe = $this->input->post('type_to_edit');
		$detailPo = $this->mPo->getDetailPO($idPO);
        $this->data['PO'] = $detailPo[0];
		$this->data['detailPO'] = json_encode($this->mPo->getDetailPPbyPO($idPO,$tipe));
		$this->data['listMainProject'] = $this->mMainProject->_select();
		$this->data['listProject'] = $this->mProject->_select(array(mProject::ID => $detailPo[0]["PROJECT_ID"]));
		$this->data['listRAB'] = $this->mRab->_select(array(mRab::ID => $detailPo[0]["RAB_ID"]));
        $this->data['listPengguna'] = $this->mSupplier->_select();
		$this->data['listTop'] = $this->mTop->_select();
		$this->data['listPajak'] = $this->mPajak->_select();
		$this->data['listGudang'] = $this->mGudang->_select();
		$this->data['listKategoriPP'] = $this->mKategoriPp->_select();
		$this->data['listKategoriPajak'] = $this->mKategoriPajak->_select();
        $this->display('acPoEdit', $this->data);
    }
	
	public function simpanPo()
	{
		$barang = json_decode($this->input->post('BARANG'));
		$_insertedPo = array(
			'RAB_ID' => $this->input->post('RAB_ID'), 
			'KATEGORI_PP_ID' => $this->input->post('KATEGORI_PP_ID'), 
			'TOP_ID' => $this->input->post('TOP_ID'), 
			'SUPPLIER_ID' => $this->input->post('SUPPLIER_ID'), 
			'STATUS_PO_ID' => $this->input->post('STATUS_PO_ID'), 
			'PAJAK_ID' => $this->input->post('PAJAK_ID'), 
			'KATEGORI_PAJAK_ID' => $this->input->post('KATEGORI_PAJAK_ID'), 
			'PETUGAS_ID' => $this->data['iduseractive'],
			'GUDANG_ID' => $this->input->post('GUDANG_ID'),
			'PURCHASE_ORDER_TOTAL' => $this->input->post('PURCHASE_ORDER_TOTAL'),
			'ALAMAT_PENGIRIMAN' => $this->input->post('ALAMAT'),
			'NAMA_CP' => $this->input->post('NAMA_CP'),
			'TELP_CP' => $this->input->post('TELP_CP')
		);
		$this->mPo->_insert($_insertedPo);
		$idPo = $this->mPo->_getRecentID();
		
		foreach($barang as $item){
			$_insertedDetailPo = array();
			if ($item->KODE_ID == "SUB" || $item->KODE_ID == "LSM" || $item->KODE_ID == "LSU"){
				$_insertedDetailPo = array(
					'PURCHASE_ORDER_ID' => $idPo,
					'SUBCON_ID' => $item->BARANG_ID, 
					'PERMINTAAN_PEMBELIAN_ID' => $item->PERMINTAAN_PEMBELIAN_ID,
					'VOLUME_PO' => $item->VOLUME_PO,
					'HARGA_MATERI_PO' => $item->HARGA_MATERI_PO,
					'HARGA_AWAL' => $item->HARGA_AWAL,
					'DISKON1' => $item->DISKON1,
					'DISKON2' => $item->DISKON2,
					'DISKON3' => $item->DISKON3,
					'HARGA_DISKON' => $item->HARGA_DISKON,
					'HARGA_PAJAK' => $item->HARGA_PAJAK,
					'HARGA_NET' => $item->HARGA_NET,
					'HARGA_FINAL' => $item->HARGA_FINAL
				);
			} else {
				$_insertedDetailPo = array(
					'PURCHASE_ORDER_ID' => $idPo,
					'BARANG_ID' => $item->BARANG_ID, 
					'PERMINTAAN_PEMBELIAN_ID' => $item->PERMINTAAN_PEMBELIAN_ID,
					'VOLUME_PO' => $item->VOLUME_PO,
					'HARGA_MATERI_PO' => $item->HARGA_MATERI_PO,
					'HARGA_AWAL' => $item->HARGA_AWAL,
					'DISKON1' => $item->DISKON1,
					'DISKON2' => $item->DISKON2,
					'DISKON3' => $item->DISKON3,
					'HARGA_DISKON' => $item->HARGA_DISKON,
					'HARGA_PAJAK' => $item->HARGA_PAJAK,
					'HARGA_NET' => $item->HARGA_NET,
					'HARGA_FINAL' => $item->HARGA_FINAL
				);
			}
			$this->mDetailPo->_insert($_insertedDetailPo);
		}
		echo "success";
	}
	
        public function delete(){
		$idPo = $this->input->post("tobe_deleted_id");
		$this->mPo->_delete(array(mPo::ID => $idPo) );
		redirect(base_url()."p-material/po");
	}
        
	public function updatePo()
	{
		$idPo = $this->input->post('PO_ID');
		$barang = json_decode($this->input->post('BARANG'));
		$_updatedPo = array(
			'TOP_ID' => $this->input->post('TOP_ID'), 
			'SUPPLIER_ID' => $this->input->post('SUPPLIER_ID'), 
			'STATUS_PO_ID' => $this->input->post('STATUS_PO_ID'), 
			'PAJAK_ID' => $this->input->post('PAJAK_ID'), 
			'KATEGORI_PAJAK_ID' => $this->input->post('KATEGORI_PAJAK_ID'), 
			'GUDANG_ID' => $this->input->post('GUDANG_ID'),
			'PETUGAS_ID' => $this->data['iduseractive'],
			'PURCHASE_ORDER_TOTAL' => $this->input->post('PURCHASE_ORDER_TOTAL'),
			'ALAMAT_PENGIRIMAN' => $this->input->post('ALAMAT'),
			'NAMA_CP' => $this->input->post('NAMA_CP'),
			'TELP_CP' => $this->input->post('TELP_CP')
		);
		$this->mPo->_update($_updatedPo, array(mPo::ID => $idPo));
		
		$this->mDetailPo->_delete(array(mPo::ID => $idPo));
		foreach($barang as $item){
			$_insertedDetailPo = array();
			if ($item->KODE_ID == "SUB" || $item->KODE_ID == "LSM" || $item->KODE_ID == "LSU"){
				$_insertedDetailPo = array(
					'PURCHASE_ORDER_ID' => $idPo,
					'SUBCON_ID' => $item->BARANG_ID, 
					'PERMINTAAN_PEMBELIAN_ID' => $item->PERMINTAAN_PEMBELIAN_ID,
					'VOLUME_PO' => $item->VOLUME_PO,
					'HARGA_MATERI_PO' => $item->HARGA_MATERI_PO,
					'HARGA_AWAL' => $item->HARGA_AWAL,
					'DISKON1' => $item->DISKON1,
					'DISKON2' => $item->DISKON2,
					'DISKON3' => $item->DISKON3,
					'HARGA_DISKON' => $item->HARGA_DISKON,
					'HARGA_PAJAK' => $item->HARGA_PAJAK,
					'HARGA_FINAL' => $item->HARGA_FINAL
				);
			} else {
				$_insertedDetailPo = array(
					'PURCHASE_ORDER_ID' => $idPo,
					'BARANG_ID' => $item->BARANG_ID, 
					'PERMINTAAN_PEMBELIAN_ID' => $item->PERMINTAAN_PEMBELIAN_ID,
					'VOLUME_PO' => $item->VOLUME_PO,
					'HARGA_MATERI_PO' => $item->HARGA_MATERI_PO,
					'HARGA_AWAL' => $item->HARGA_AWAL,
					'DISKON1' => $item->DISKON1,
					'DISKON2' => $item->DISKON2,
					'DISKON3' => $item->DISKON3,
					'HARGA_DISKON' => $item->HARGA_DISKON,
					'HARGA_PAJAK' => $item->HARGA_PAJAK,
					'HARGA_FINAL' => $item->HARGA_FINAL
				);
			}
			$this->mDetailPo->_insert($_insertedDetailPo);
		}
		echo "success";
	}
    
    public function getCurrentPP(){
        $RAB_ID= $this->input->post('RAB_ID');
		$TIPE= $this->input->post('TIPE');
        $query = $this->mPermintaan->getAllPP($RAB_ID, $TIPE);
        echo json_encode($query);
    }
    
    public function viewDetail($PURCHASE_ORDER_ID, $tipe){
        $detailPo = $this->mPo->getDetailPO($PURCHASE_ORDER_ID);
        
        if (empty($detailPo)) redirect (base_url ().'p-material/po');
        $this->data['PO'] = $detailPo[0];
		$this->data['detailPO'] = json_encode($this->mPo->getViewDetailPPbyPO($PURCHASE_ORDER_ID, $tipe));
        $this->display('acPoDetail', $this->data);
    }
	
	public function validate(){
		$idPO = $this->input->post("tobe_validated_id");
		$value = $this->input->post("tobe_validated_val");
		$_updatedPO = array(
			mPo::STATUS => $value,
			'VALIDATOR_ID' => $this->data['iduseractive']
		);
		$this->mPo->_update($_updatedPO, array(mPo::ID => $idPO));
		redirect(base_url()."p-material/po");
	}
	
	public function savetovalidate(){
		$idPO = $this->input->post("tobe_simpan_validasi_id");
		$_updatedPO = array(
			mPo::STATUS => 2
		);
		$this->mPo->_update($_updatedPO, array(mPo::ID => $idPO));
		redirect(base_url()."p-material/po");
	}
	
	public function getViewBarang(){
		$pp_id = $this->input->get('pp_id');
		$tipe = $this->input->get('pp_tipe');
		echo $this->mPermintaan->getViewBarangPP($pp_id, $tipe);
	}
	
	public function getViewPo(){
		echo $this->mPo->getListPO();
	}
	
	public function printPDF($PURCHASE_ORDER_ID, $tipe){
		$detailPo = $this->mPo->getDetailPO($PURCHASE_ORDER_ID);
        $this->data['PO'] = $detailPo[0];
		$this->data['detailPO'] = $this->mPo->getViewDetailPPbyPO($PURCHASE_ORDER_ID, $tipe);
		$this->data['perusahaan'] = $this->mPo->_joinSelect('purchase_order', 
			array(
				'rab_transaction' => 'rab_transaction.RAB_ID = purchase_order.RAB_ID', 
				'project' => 'project.PROJECT_ID = rab_transaction.PROJECT_ID', 
				'main_project' => 'main_project.MAIN_PROJECT_ID = project.MAIN_PROJECT_ID',
				'perusahaan' => 'main_project.PERUSAHAAN_ID = perusahaan.PERUSAHAAN_ID'
			),
			array(
				mPo::ID => $PURCHASE_ORDER_ID
			),
			array('perusahaan.*')
		)[0];
		$this->theme_layout = 'html2fpdf';
		$this->header = 'blank';
		$this->footer = 'blank';
		$this->left_sidebar = 'blank';
		$this->right_sidebar = 'blank';
		$this->script_header = 'lay-scripts/header-report';
		$this->script_footer = 'lay-scripts/footer-report';
		$this->display('acPoDetailPDF', $this->data);
		$html = $this->output->get_output();
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('legal', 'landscape');
		$this->dompdf->render();
		//$this->dompdf->stream("welcome.pdf",array('Attachment'=>0));
		// direct download
		$filename = $this->data['PO']['PURCHASE_ORDER_KODE'];
		$this->dompdf->stream($filename.".pdf");
		
	}
	
	public function printExcel($PURCHASE_ORDER_ID, $tipe){
		$detailPo = $this->mPo->getDetailPO($PURCHASE_ORDER_ID);
        $this->data['PO'] = $detailPo[0];
		$this->data['detailPO'] = $this->mPo->getViewDetailPPbyPO($PURCHASE_ORDER_ID, $tipe);
		$this->theme_layout = 'html2fpdf';
		$this->header = 'blank';
		$this->footer = 'blank';
		$this->left_sidebar = 'blank';
		$this->right_sidebar = 'blank';
		$this->script_header = 'lay-scripts/header-report';
		$this->script_footer = 'lay-scripts/footer-report';
		$this->display('acPoDetailPDF', $this->data, TRUE);
		$filename = $this->data['PO']['PURCHASE_ORDER_KODE'];
		
		header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
		header("Content-Disposition: attachment; filename=".$filename.".xls");  //File name extension was wrong
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false);
		
		echo $this->display('acPoDetailPDF', $this->data, TRUE);
	}
	
	public function exportPDF(){
		$opts = array('http' => array('header'=> 'Cookie: ' . $_SERVER['HTTP_COOKIE']."\r\n"));
		$context = stream_context_create($opts);
		$htmlFile = "http://localhost/project-management/p-material/po/printPDF/3/1"; 
		$buffer = $this->url_get_contents($htmlFile); 
		print_r($buffer);
		return;
		$pdf = new HTML2FPDF('L', 'mm', 'Legal'); 
		$pdf->AddPage(); 
		$pdf->WriteHTML($buffer); 
		$pdf->Output('my.pdf', 'F'); 
	}

}