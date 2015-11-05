<?php

App::import('Vendor', 'PHPExcel', array('file' => 'excel/PHPExcel.php'));
//App::import('Vendor', 'PHPExcelWriter', array('file' => 'excel/PHPExcel/Writer/Excel5.php'));
App::import('Vendor', 'PHPExcelWriter', array('file' => 'excel/PHPExcel/Writer/Excel2007.php'));

class ExcelHelper extends AppHelper {

    var $xls;
    var $sheet;
    var $data;
    var $blacklist = array();

    function excelHelper() {
        $this->xls = new PHPExcel();
        $this->sheet = $this->xls->getActiveSheet();
        $this->sheet->getDefaultStyle()->getFont()->setName('Verdana');
    }

    function generate(&$data, $title = 'Report') {
        $this->data = & $data;
        $this->_title($title);
        $this->_headers();
        $this->_rows();
        $this->_output($title);
        return true;
    }

    function _title($title) {
        $this->sheet->setCellValue('A2', $title);
        $this->sheet->getStyle('A2')->getFont()->setSize(14);
        $this->sheet->getRowDimension('2')->setRowHeight(23);
    }

    function _headers() {
        $i = 0;
        foreach ($this->data[0] as $field => $value) {
            if (!in_array($field, $this->blacklist)) {
                $columnName = Inflector::humanize($field);
                $this->sheet->setCellValueByColumnAndRow($i++, 4, $columnName);
            }
        }
        $this->sheet->getStyle('A4')->getFont()->setBold(true);
        $this->sheet->getStyle('A4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $this->sheet->getStyle('A4')->getFill()->getStartColor()->setRGB('969696');
        $this->sheet->duplicateStyle($this->sheet->getStyle('A4'), 'B4:' . $this->sheet->getHighestColumn() . '4');
        for ($j = 1; $j < $i; $j++) {
            $this->sheet->getColumnDimension(PHPExcel_Cell::stringFromColumnIndex($j))->setAutoSize(true);
        }
    }

    function _rows() {
	/**
	 * Font color assignment for 4pm xls generation
	 */
	$Consumed = array(
	    'font' => array(		
		'color' => array('rgb'=>'009900'),
	    )
	);
	$Required = array(
	    'font' => array(
		'color' => array('rgb'=>'FF0000'),
	    )
	);
	/** End of setting color var */
        $i = 5;
        foreach ($this->data as $row) {
            $j = 0;
            foreach ($row as $field => $value) {
                if (!in_array($field, $this->blacklist)) {
                    $this->sheet->setCellValueByColumnAndRow($j++, $i, $value);
                }
            }
	    /**
	     * Check for value & set font color accordingly
	     */
	    if (!empty($row) && isset($row['Status']) && ($row['Status'] == 'Consumed' || $row['Status'] == 'Required'))
	    {
		$this->sheet->getStyle("A{$i}:" . $this->sheet->getHighestColumn() . $i)->applyFromArray( $$row['Status'] );
	    }	    
	    /**
	     * End
	     */
            $i++;
        }
    }

//    function _output($title) {
//        header("Content-type: application/vnd.ms-excel");
//        header('Content-Disposition: attachment;filename="' . $title . '.xls"');
//        header('Cache-Control: max-age=0');
//        $objWriter = new PHPExcel_Writer_Excel5($this->xls);
//        $objWriter->setTempDir(TMP);
//        $objWriter->save('php://output');
//    }

    function _output($title) {
//        header('Content-Type: application/vnd.openXMLformats-officedocument.spreadsheetml.sheet');
//        header('Content-Disposition: attachment;filename="' . $title . '.xlsx"');
//        header('Cache-Control: max-age=0');
//        $objWriter = new PHPExcel_Writer_Excel2007($this->xls);
//        $objWriter->save('php://output');
           $objWriter = new PHPExcel_Writer_Excel2007($this->xls);

        ob_end_clean();
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$title.'.xlsx"');

        $objWriter->save('php://output');
    }
    
     function saveFileToPath(&$data, $title = 'Report', $path = '') {
        $this->data = & $data;
        $this->_title($title);
        $this->_headers();
        $this->_rows();
        $this->_saveFileToPath($path);
        return true;
    }
    
    function _saveFileToPath($path) {
        $objWriter = new PHPExcel_Writer_Excel2007($this->xls);
        ob_end_clean();
        
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        $objWriter->save($path);
    }
}

?>