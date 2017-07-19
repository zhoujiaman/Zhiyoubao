<?php
namespace ZhiyoubaoSDK\ServiceProviders;

/**
 * 分销商改签
 * Class OrderEndorseServiceProvider
 * @package ZhiyoubaoSDK\ServiceProviders
 */
class OrderEndorseServiceProvider extends AbstractServiceProvider
{
    protected $transactionName = 'ORDER_ENDORSE_REQ';

    protected $orderRequest = [
        'endorse' => []
    ];

    /**
     * @param string $value 子订单号
     * @return $this
     */
    public function setSubOrderCode($value)
    {
        $this->orderRequest['endorse']['subOrderCode'] = $value;
        return $this;
    }

    /**
     * @param string $value 改签日期
     * @return $this
     */
    public function setNewOccDate($value)
    {
        $this->orderRequest['endorse']['newOccDate'] = $value;
        return $this;
    }
}