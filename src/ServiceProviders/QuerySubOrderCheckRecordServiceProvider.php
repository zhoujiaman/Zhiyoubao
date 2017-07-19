<?php
namespace ZhiyoubaoSDK\ServiceProviders;

/**
 * 获取订单检票信息
 * Class SendCodeImgServiceProvider
 * @package ZhiyoubaoSDK\ServiceProviders
 */
class QuerySubOrderCheckRecordServiceProvider extends AbstractServiceProvider
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