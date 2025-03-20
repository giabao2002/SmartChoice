<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Log;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MomoPayment
{

    public static function payment(int $amount, array $extraData = []): ?array
    {
        try {
            if (! empty($extraData)) {
                $extraData = base64_encode(json_encode($extraData));
            } else {
                $extraData = '';
            }

            $data = self::generateDataPayment($amount, $extraData);
            $result = self::execPostRequest(self::endPointPayment(), json_encode($data));
            return json_decode($result, true);
        } catch (Exception $e) {
            Log::error('Momo payment error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTrace(),
            ]);
            return null;
        }
    }





    protected static function generateDataPayment(int $amount, string $extraData = ''): array
    {
        return array(
            'partnerCode' => config('app.momo.partner_code'),
            'requestId' => self::requestId(),
            'amount' => $amount,
            'orderId' => self::orderId(),
            'orderInfo' => self::orderInfo(),
            'redirectUrl' => self::returnURL(),
            'ipnUrl' => self::notifyURL(),
            'requestType' => self::requestType(),
            'extraData' => $extraData,
            'lang' => 'vi',
            'signature' => self::signature($amount, $extraData),
        );
    }
    protected static function generateDataConfirm(string $requestId, string $orderId, int $amount): array
    {
        return array(
            'partnerCode' => config('app.momo.partner_code'),
            'requestId' => $requestId,
            'orderId' => $orderId,
            'requestType' => self::requestType(true),
            'amount' => $amount,
            'lang' => 'vi',
            'signature' => self::signature($amount, $extraData),
        );
    }

    protected static function requestId(): string
    {
        return (string) time();
    }

    protected static function orderId(): string
    {
        return md5(session_id() . time());
    }

    protected static function signature(int $amount, string $extraData = ''): string
    {
        return hash_hmac(self::algorithm(), self::rawHash($amount, $extraData), config('app.momo.secret_key'));
    }

}