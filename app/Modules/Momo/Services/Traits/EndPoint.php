<?php

namespace App\Modules\Momo\Services\Traits;

trait EndPoint
{
    protected function domain(): string
    {
        return config('momo.mode') !== 'development' ?
            'https://payment.momo.vn' :
            'https://test-payment.momo.vn';
    }

    protected function endPoint(bool $isConfirm = false): string
    {
        return $this->domain().'/v2/gateway/api/'.($isConfirm ? 'query' : 'create');
    }
}