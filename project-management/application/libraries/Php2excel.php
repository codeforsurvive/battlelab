<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Php2excel {
	public function __construct()
    {
		
    }

	public function getColLetter ($i) {
		$COLS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$ct = ($i > 25) ? floor($i / 26) : 0;
		$ret = $COLS[$i % 26];
			while ($ct--)
				$ret .= $ret;
		return $ret;
    }
	
    public function generateMaster($data){
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
		date_default_timezone_set('Asia/Jakarta');

		if (PHP_SAPI == 'cli')
			die('This example should only be run from a Web Browser');

		/** Include PHPExcel */
		require_once ('/assets/php2excel/PHPExcel.php');

		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();
		$sharedStyleHeader = new PHPExcel_Style();
		$sharedStyleRowOdd = new PHPExcel_Style();
		$sharedStyleRowEven = new PHPExcel_Style();
		$sharedStyleHeader->applyFromArray(
			array('fill' 	=> array(
										'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
										'color'		=> array('rgb' => '5BC0DE')
									),
				  'borders' => array(
										'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
										'right'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
										'left'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
										'top'		=> array('style' => PHPExcel_Style_Border::BORDER_MEDIUM)
									)
				 ));
		$sharedStyleRowOdd->applyFromArray(
			array('fill' 	=> array(
										'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
										'color'		=> array('rgb' => 'E2E4FF')
									),
				'borders' => array(
										'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
										'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
										'left'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
										'top'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
									)
				 ));
		$sharedStyleRowEven->applyFromArray(
			array('borders' => array(
										'bottom'	=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
										'right'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
										'left'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN),
										'top'		=> array('style' => PHPExcel_Style_Border::BORDER_THIN)
									)
				 ));


		// Set document properties
		$objPHPExcel->getProperties()->setCreator("Artcak Media Digital")
									 ->setLastModifiedBy("Ardhiansyah Baskara")
									 ->setTitle("Master Barang")
									 ->setSubject("Master Barang")
									 ->setDescription("Data tabel master barang")
									 ->setKeywords("data tabel master barang")
									 ->setCategory("master");

		$objPHPExcel->setActiveSheetIndex(0);
		$activeSheet = $objPHPExcel->getActiveSheet();
		
		// Add some data
		$row = 1;
		
		for($j = 0; $j<count($data["head"]); $j++){
			$activeSheet->setCellValue($this->getColLetter($j) . ($row), $data["head"][$j]);
			$activeSheet->getColumnDimension($this->getColLetter($j))->setAutoSize(true);
			$activeSheet->setSharedStyle($sharedStyleHeader, $this->getColLetter($j) . ($row));
		}
		
		$row++;
		
		for($i = 0; $i<count($data["content"]); $i++){
			$cell = $data["content"][$i];
			for($j = 0; $j<count($data["head"]); $j++){
				$activeSheet->setCellValue($this->getColLetter($j) . ($row), $cell[$j]);
				if($i%2!=0){
					$activeSheet->setSharedStyle($sharedStyleRowOdd, $this->getColLetter($j) . ($row));
				} else {
					$activeSheet->setSharedStyle($sharedStyleRowEven, $this->getColLetter($j) . ($row));
				}
			}
			$row++;
		}
		// Rename worksheet
		$objPHPExcel->getActiveSheet()->setTitle('Barang');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);


		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="barang.xls"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		exit;
    }
	
	
}