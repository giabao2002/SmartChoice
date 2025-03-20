<?php

namespace App\Modules\Momo\Services;

use App\Modules\Momo\Contracts\MomoInterface;
use App\Modules\Momo\Services\Traits\Constants;
use App\Modules\Momo\Services\Traits\CurlPost;
use App\Modules\Momo\Services\Traits\EndPoint;
use App\Modules\Momo\Services\Traits\Hash;
use App\Modules\Momo\Services\Traits\PayloadBuilder;
use App\Modules\Momo\Services\Traits\QrCode;

class MomoService implements MomoInterface
{
    use EndPoint;
    use Constants;
    use CurlPost;
    use Hash;
    use PayloadBuilder;
    use QrCode;

    protected int $amount;
    protected string $orderId;
    protected string $requestId;
    protected string $extraData;
    protected ?array $response;

    public function __construct(int $amount, string $orderId, string $requestId, string $extraData = '')
    {
        $this->amount = $amount;
        $this->orderId = $orderId;
        $this->requestId = $requestId;
        $this->extraData = $extraData;
    }

    public function payment(): ?array
    {
        $payload = $this->payload();
        $endPoint = $this->endPoint();
        $response = $this->curlPost($endPoint, json_encode($payload));
        if (empty($response)) {
            return null;
        }

        return $this->response = json_decode($response, true);
    }

    public function confirm(): ?array
    {
        $payload = $this->payload(true);
        $endPoint = $this->endPoint(true);

        $response = $this->curlPost($endPoint, json_encode($payload));
        if (empty($response)) {
            return null;
        }

        return $this->response = json_decode($response, true);
    }
}