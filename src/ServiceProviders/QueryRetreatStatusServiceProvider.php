<?php
namespace ZhiyoubaoSDK\ServiceProviders;

/**
 * 退票情况查询
 * Class QueryRetreatStatusServiceProvider
 * @package ZhiyoubaoSDK\ServiceProviders
 */
class QueryRetreatStatusServiceProvider extends AbstractServiceProvider
{
    protected $transactionName = 'QUERY_RETREAT_STATUS_REQ';

    protected $orderRequest = [
        'order' => []
    ];

    /**
     * @param string $value 退货号
     * @return $this
     */
    public function setRetreatBatchNo($value)
    {
        $this->orderRequest['order']['retreatBatchNo'] = $value;
        return $this;
    }
}