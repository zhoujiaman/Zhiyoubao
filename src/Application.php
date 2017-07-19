<?php
namespace ZhiyoubaoSDK;

use ZhiyoubaoSDK\ServiceProviders\AbstractServiceProvider;

class Application
{
    const URL = 'http://boss.zhiyoubao.com/boss/service/code.htm';

    private $corpCode;

    private $userName;

    private $privateKey;

    public function __construct($config = [])
    {
        $this->setConfig($config);
    }

    /**
     * 设置配置参数
     * @param $config
     * @return $this
     */
    public function setConfig($config)
    {
        foreach ($config as $key => $value) {
            $methodName = 'setConfig' . ucfirst($key);
            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            }
        }
        return $this;
    }

    /**
     * 设置企业码
     * @param $value
     * @return $this
     */
    public function setConfigCorpCode($value)
    {
        $this->corpCode = $value;
        return $this;
    }

    /**
     * 设置用户名
     * @param $value
     * @return $this
     */
    public function setConfigUserName($value)
    {
        $this->userName = $value;
        return $this;
    }

    /**
     * 设置私钥
     * @param $value
     * @return $this
     */
    public function setConfigPrivateKey($value)
    {
        $this->privateKey = $value;
        return $this;
    }

    /**
     * 调用接口
     * @param AbstractServiceProvider $serverProvider
     * @return mixed
     * @throws \Exception
     */
    public function run(AbstractServiceProvider $serverProvider)
    {
        $serverProvider->setHeaderRequestTime()
            ->setIdentityInfoCorpCode($this->corpCode)
            ->setIdentityInfoUserName($this->userName);

        $data = $serverProvider->toArray();
        $xml = $this->toXml('PWBRequest', $data);
        $sign = md5('xmlMsg=' . $xml . $this->privateKey);

        $requestData = [
            'xmlMsg' => $xml,
            'sign' => $sign
        ];

        $responseXml = $this->request($requestData);

        if (!$responseXml) {
            throw new \Exception('curl error');
        }

        $response = new \SimpleXMLElement($responseXml);

        return $response;
    }

    /**
     * 数组转xml
     * @param string $keyname
     * @param string | array $data
     * @return string
     * @throws \Exception
     */
    public function toXml($keyname, $data)
    {
        $rst = '';
        $isNumeric = -1;
        foreach ($data as $key => $value) {
            $is = is_numeric($key) ? 1 : 0;
            if ($isNumeric != -1 && $isNumeric != $is) {
                throw new \Exception('array to xml error');
            }
            $isNumeric = $is;
            if (is_array($value)) {
                $rst .= $this->toXml($is ? $keyname : $key, $value);
            } else {
                $rst .= "<{$key}>" . $value . "</{$key}>";
            }
        }

        if ($isNumeric != 1) {
            $rst = "<{$keyname}>" . $rst . "</{$keyname}>";
        }
        return $rst;
    }

    /**
     * 请求接口
     * @param $data
     * @return mixed
     */
    protected function request($data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    /**
     * 回调验证
     * @param string $code 参与签名的值
     * @param string $sign 签名值
     * @return bool
     */
    public function valid($code, $sign)
    {
        return $sign == md5($code . $this->privateKey);
    }
}