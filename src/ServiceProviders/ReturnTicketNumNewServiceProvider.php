<?php
namespace ZhiyoubaoSDK\ServiceProviders;

/**
 * 部分退票
 * Class SendCodeImgServiceProvider
 * @package ZhiyoubaoSDK\ServiceProviders
 */
class ReturnTicketNumNewServiceProvider extends AbstractServiceProvider
{
    protected $transactionName = 'RETURN_TICKET_NUM_NEW_REQ';

    protected $orderRequest = [
        'returnTicket' => []
    ];

    /**
     * @param string $value 子订单号
     * @return $this
     */
    public function setOrderCode($value)
    {
        $this->orderRequest['returnTicket']['orderCode'] = $value;
        return $this;
    }

    /**
     * @param string $value 退票数量
     * @return $this
     */
    public function setReturnNum($value)
    {
        $this->orderRequest['returnTicket']['returnNum'] = $value;
        return $this;
    }

    /**
     * @param string $value 退单号
     * @return $this
     */
    public function setThirdReturnCode($value)
    {
        $this->orderRequest['returnTicket']['thirdReturnCode'] = $value;
        return $this;
    }

    /**
     * @param string $value 实名制订单退票，请带上身份证号码多个身份证号中间用  “,”分割
     * @return $this
     */
    public function setIdCards($value)
    {
        $this->orderRequest['returnTicket']['idCards'] = $value;
        return $this;
    }
}