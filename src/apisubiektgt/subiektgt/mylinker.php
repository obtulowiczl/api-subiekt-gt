<?php
namespace APISubiektGT\SubiektGT;
use apisubiektgt\Contracts\IMylinkerAdapter;
use COM;

class Mylinker extends SubiektObj implements IMylinkerAdapter {

    public function __construct($subiektGt, $subiektPrinter, $requestDetail = array())
    {
        parent::__construct($subiektGt, $subiektPrinter, $requestDetail);
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

    public function createZk(array $data)
    {
        // TODO: Implement createZk() method.
    }

    public function createFs(array $data)
    {
        // TODO: Implement createFs() method.
    }

    public function createPa(array $data)
    {
        // TODO: Implement createPa() method.
    }
}