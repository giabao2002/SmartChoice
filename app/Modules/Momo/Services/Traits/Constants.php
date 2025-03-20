<?php

namespace  App\Modules\Momo\Services\Traits;

trait Constants
{
    protected function algorithm(): string
    {
        return 'sha256';
    }

    protected function orderInfo(): string
    {
        return 'Thanh toán qua MoMo';
    }

    protected function requestType(bool $isConfirm = false): string
    {
        return $isConfirm ? 'capture' : 'captureWallet';
    }
}
