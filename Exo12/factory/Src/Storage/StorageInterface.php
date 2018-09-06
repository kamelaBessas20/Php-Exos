<?php
namespace App\Storage;

use App\Logger\Log;

interface StorageInterface
{
    public function storeLog(Log $log);
}