<?php
namespace ZhiyoubaoSDK\ServiceProviders;

/**
 * 下单接口
 * Class SendCodeServiceProvider
 * @package ZhiyoubaoSDK\ServiceProviders
 */
class SendCodeServiceProvider extends AbstractServiceProvider
{
    protected $transactionName = 'SEND_CODE_REQ';

    protected $orderRequest = [
        'order' => [
            'payMethod' => 'vm',
            'ticketOrders' => [
                'ticketOrder' => []
            ]
        ]
    ];

    /**
     * 设置主订单编号
     * @param $value
     * @return $this
     */
    public function setOrderCode($value)
    {
        $this->orderRequest['order']['orderCode'] = $value;
        return $this;
    }

    /**
     * 设置主订单用户名
     * @param $value
     * @return $this
     */
    public function setLinkName($value)
    {
        $this->orderRequest['order']['linkName'] = $value;
        return $this;
    }

    /**
     * 设置主订单用户联系方式
     * @param $value
     * @return $this
     */
    public function setLinkMobile($value)
    {
        $this->orderRequest['order']['linkMobile'] = $value;
        return $this;
    }

    /**
     * 设置住订单用户证件号码
     * @param $value
     * @return $this
     */
    public function setCertificateNo($value)
    {
        $this->orderRequest['order']['certificateNo'] = $value;
        return $this;
    }

    /**
     * 设置支付方式 默认vm
     * @param $value
     * @return $this
     */
    public function setPayMethod($value)
    {
        $this->orderRequest['order']['payMethod'] = $value;
        return $this;
    }

    /**
     * 设置订单
     * @param $order
     * @return $this
     *  [
     *      'orderCode' => 't00000000005001',
     *      'credentials' => [
     *         'credential' => [
     *              [
     *                  'name' => '帅哥',
     *                  'id' => '330182198804273139'
     *              ]
     *          ]
     *      ],  //如果需要实名，则需要用户的身份证，数量与购买的数量一致
     *      'price' => '1.00',
     *      'quantity' => 1,
     *      'totalPrice' => '1.00',
     *      'occDate' => '2017-06-20',
     *      'goodsCode' => 'PST20170606118947',
     *      'goodsName' => 'test',
     *      'remark' => 'test',
     *  ]
     */
    public function setTicketOrder($order)
    {
        $this->orderRequest['order']['ticketOrders']['ticketOrder'][] = $order;
        return $this;
    }
}