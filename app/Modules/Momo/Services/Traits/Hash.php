<?php

namespace App\Modules\Momo\Services\Traits;

trait Hash
{
    protected function signature(bool $isConfirm = false): string
    {
        if ($isConfirm) {
            $data = implode('&', [
                'accessKey=' . config('momo.access_key'),
                'orderId=' . $this->orderId,
                'partnerCode=' . config('momo.partner_code'),
                'requestId=' . $this->requestId,
            ]);
        } else {
            $data = implode('&', [
                'accessKey=' . config('momo.access_key'),
                'amount=' . $this->amount,
                'extraData=' . $this->extraData,
                'ipnUrl=' . config('momo.notify_url'),
                'orderId=' . $this->orderId,
                'orderInfo=' . self::orderInfo(),
                'partnerCode=' . config('momo.partner_code'),
                'redirectUrl=' . config('momo.return_url'),
                'requestId=' . $this->requestId,
                'requestType=' . self::requestType(),
            ]);
        }

        return hash_hmac(self::algorithm(), $data, config('momo.secret_key'));
    }
}
