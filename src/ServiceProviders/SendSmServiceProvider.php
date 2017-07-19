<?php
namespace ZhiyoubaoSDK\ServiceProviders;

/**
 * 发短信
 * Class SendCodeImgServiceProvider
 * @package ZhiyoubaoSDK\ServiceProviders
 */
class SendSmServiceProvider extends AbstractServiceProvider
{
    protected $transactionName = 'SEND_SM_REQ';

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

    /**
     * 设置短信模板
     * @param $value
     * @return $this
     */
    public function setTplCode($value)
    {
        $this->orderRequest['order']['tplCode'] = $value;
        return $this;
    }
}