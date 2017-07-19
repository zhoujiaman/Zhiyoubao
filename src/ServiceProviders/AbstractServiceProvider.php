<?php
namespace ZhiyoubaoSDK\ServiceProviders;

abstract class AbstractServiceProvider
{
    protected $transactionName = '';

    protected $header = [
        'application' => 'SendCode',
        'requestTime' => ''
    ];

    protected $identityInfo = [
        'corpCode' => '',
        'userName' => ''
    ];

    protected $orderRequest = [];

    /**
     * 设置接口名
     * @param $value
     * @return $this
     */
    public function setTransactionName($value)
    {
        $this->transactionName = $value;
        return $this;
    }

    /**
     * 设置SendCode
     * @param $value
     * @return $this
     */
    public function setHeaderApplication($value = 'SendCode')
    {
        $this->header['application'] = $value;
        return $this;
    }

    /**
     * 设置请求时间
     * @param null $value
     * @return $this
     */
    public function setHeaderRequestTime($value = null)
    {
        if (empty($value)) {
            $value = date('Y-m-d H:i:s');
        }
        $this->header['requestTime'] = $value;
        return $this;
    }

    /**
     * 设置企业码
     * @param $value
     * @return $this
     */
    public function setIdentityInfoCorpCode($value)
    {
        $this->identityInfo['corpCode'] = $value;
        return $this;
    }

    /**
     * 设置用户名
     * @param $value
     * @return $this
     */
    public function setIdentityInfoUserName($value)
    {
        $this->identityInfo['userName'] = $value;
        return $this;
    }

    /**
     * 获取已组装的数组
     * @return array
     */
    public function toArray()
    {
        return [
            'transactionName' => $this->transactionName,
            'header' => $this->header,
            'identityInfo' => $this->identityInfo,
            'orderRequest' => $this->orderRequest,
        ];
    }
}