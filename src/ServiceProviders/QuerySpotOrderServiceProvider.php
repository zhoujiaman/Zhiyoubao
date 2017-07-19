<?php
namespace ZhiyoubaoSDK\ServiceProviders;

/**
 * 到付订单查询
 * Class QuerySpotOrderServiceProvider
 * @package ZhiyoubaoSDK\ServiceProviders
 */
class QuerySpotOrderServiceProvider extends AbstractServiceProvider
{
    protected $transactionName = 'QUERY_SPOT_ORDER_REQ';

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