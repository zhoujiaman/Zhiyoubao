<?php
namespace ZhiyoubaoSDK\ServiceProviders;

/**
 * 发码图片查询
 * Class SendCodeImgServiceProvider
 * @package ZhiyoubaoSDK\ServiceProviders
 */
class SendCodeImgServiceProvider extends AbstractServiceProvider
{
    protected $transactionName = 'SEND_CODE_IMG_REQ';

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