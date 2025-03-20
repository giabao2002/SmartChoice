<?php

namespace App\Modules\Momo\Services\Traits;

use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeFacade;

trait QrCode
{
    public function qrCode(?array $data, int $size = 300): string
    {
        if (empty($this->response) || empty($qrCode = $this->response['qrCodeUrl'])) {
            return '';
        }
        return QrCodeFacade::size($size)->generate($qrCode) ?? '';
    }
}