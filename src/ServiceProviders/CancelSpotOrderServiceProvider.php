<?php
namespace ZhiyoubaoSDK\ServiceProviders;

/**
 * 到付单取消
 * Class SendCodeImgServiceProvider
 * @package ZhiyoubaoSDK\ServiceProviders
 */
class CancelSpotOrderServiceProvider extends AbstractServiceProvider
{
    protected $transactionName = 'QUERY_ORDER_REQ';

    protected $orderRequest = [
        'order' => []
    ];

    /**
     * @param string $value 订单号
     * @return $this
     */
    public function setOrderCode($value)
    {
        $this->orderRequest['order']['orderCode'] = $value;
        return $this;
    }
}