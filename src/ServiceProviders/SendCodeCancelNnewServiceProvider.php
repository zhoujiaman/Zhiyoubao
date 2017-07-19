<?php
namespace ZhiyoubaoSDK\ServiceProviders;

/**
 * 取消订单
 * Class SendCodeCancelNnewServiceProvider
 * @package ZhiyoubaoSDK\ServiceProviders
 */
class SendCodeCancelNnewServiceProvider extends AbstractServiceProvider
{
    protected $transactionName = 'SEND_CODE_CANCEL_NEW_REQ';

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