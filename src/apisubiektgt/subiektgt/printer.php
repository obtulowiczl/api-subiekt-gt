<?php
namespace apisubiektgt\subiektgt;
use apisubiektgt\Contracts\IPrinter;
use APISubiektGT\Dtos\CustomerDto;
use APISubiektGT\Logger;
use COM;

class Printer extends SubiektObj implements IPrinter {

    protected $warehouseId;
    protected $printPattern = null;
    protected $doc_ref;
    public function __construct($subiektGt, $subiektPrinter, $requestDetail = array())
    {
        parent::__construct($subiektGt, $subiektPrinter, $requestDetail);
        $this->excludeAttr(array('productGt','off_prefix','is_exists','objDetail', 'printDetails'));

        $subiektPrinter->MagazynId = (int) $this->warehouseId;
        if($this->doc_ref!='' && $subiektPrinter->SuDokumentyManager->Istnieje($this->doc_ref)){
            $this->documentGt = $subiektPrinter->SuDokumentyManager->Wczytaj($this->doc_ref);
            $this->is_exists = true;
        }
    }


    public function print()
    {
        if (!$this->isExists())
            return false;

        // TODO: implementation of print() method.

    }
    protected function setGtObject()
    {
        // TODO: Implement setGtObject() method.
    }

    protected function getGtObject()
    {
        // TODO: Implement getGtObject() method.
    }

    public function add()
    {
        // TODO: Implement add() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function getGt()
    {
        // TODO: Implement getGt() method.
    }

    private function getPdf()
    {
        $temp_dir = sys_get_temp_dir();
        if($this->is_exists){
            $file_name = $temp_dir.'/'.$this->gt_id.'.pdf';
            $this->documentGt->DrukujDoPliku($file_name,0);
            $pdf_file = file_get_contents($file_name);
            unlink($file_name);
            Logger::getInstance()->log('api','Wygenerowano pdf dokumentu: '.$this->doc_ref ,__CLASS__.'->'.__FUNCTION__,__LINE__);
            return array('encoding'=>'base64',
                'doc_ref'=>$this->doc_ref,
                'is_exists' => $this->is_exists,
                'file_name' => mb_ereg_replace("[ /]","_",$this->doc_ref.'.pdf'),
                'state' => $this->state,
                'accounting_state' => $this->accounting_state,
                'fiscal_state' => $this->fiscal_state,
                'doc_type' => $this->doc_type,
                'pdf_file'=>base64_encode($pdf_file));
        }
        return false;
    }
}