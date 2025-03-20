<?php

namespace App\Modules\Momo\Services\Traits;

trait PayloadBuilder
{
    protected function payload(bool $isConfirm = false): array
    {
        if ($isConfirm) {
            return [
                'partnerCode' => config('momo.partner_code'),
                'requestId' => $this->requestId,
                'orderId' => $this->orderId,
                'lang' => 'vi',
                'signature' => self::signature(true),
            ];
        } else {
            return [
                'partnerCode' => config('momo.partner_code'),
                'requestId' => $this->requestId,
                'amount' => $this->amount,
                'orderId' => $this->orderId,
                'orderInfo' => self::orderInfo(),
                'redirectUrl' => config('momo.return_url'),
                'ipnUrl' => config('momo.notify_url'),
                'requestType' => self::requestType(),
                'extraData' => $this->extraData,
                'lang' => 'vi',
                'signature' => self::signature(),
            ];
        }
    }
}
