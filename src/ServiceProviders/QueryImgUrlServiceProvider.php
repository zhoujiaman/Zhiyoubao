<?php
namespace ZhiyoubaoSDK\ServiceProviders;

/**
 * 获取二维码链接
 * Class QueryImgUrlServiceProvider
 * @package ZhiyoubaoSDK\ServiceProviders
 */
class QueryImgUrlServiceProvider extends AbstractServiceProvider
{
    protected $transactionName = 'QUERY_IMG_URL_REQ';

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