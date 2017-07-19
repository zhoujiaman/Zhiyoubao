<?php
namespace ZhiyoubaoSDK\ServiceProviders;

/**
 * 获取二维码
 * Class QueryShortImgUrlServiceProvider
 * @package ZhiyoubaoSDK\ServiceProviders
 */
class QueryShortImgUrlServiceProvider extends AbstractServiceProvider
{
    protected $transactionName = 'QUERY_SHORT_IMG_URL_REQ';

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