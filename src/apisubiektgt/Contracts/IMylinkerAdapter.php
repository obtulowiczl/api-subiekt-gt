<?php

namespace apisubiektgt\Contracts;

interface IMylinkerAdapter
{
    public function createZk(array $data);
    public function createFs(array $data);
    public function createPa(array $data);

}