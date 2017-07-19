<?php
namespace ZhiyoubaoSDK\ServiceProviders;

/**
 * 查询检票情况
 * Class CheckStatusQueryServiceProvider
 * @package ZhiyoubaoSDK\ServiceProviders
 */
class CheckStatusQueryServiceProvider extends AbstractServiceProvider
{
    protected $transactionName = 'CHECK_STATUS_QUERY_REQ';

    /**
     * @param string $value 订单号
     * @return $this
     */
    public function setOrderCode($value)
    {
        $this->orderRequest['order'] = [
            'orderCode' => $value
        ];
        return $this;
    }
}