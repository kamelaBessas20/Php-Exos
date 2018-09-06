<?php
namespace App;

interface StorageInterface
{
    public function storeLog(Log $log);
}