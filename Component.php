<?php
namespace mkui\kdtapi;


use Yii;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/10/10 0010
 * Time: 11:27
 */
class Component extends \yii\base\Component
{
    /**
     * 配置信息
     * @var array
     */
    public $config = [];

    /**
     * @var KdtApiClient
     */
    private $_kdtclient;

    /**
     * 初始化
     */
    public function init()
    {
        parent::init();
        $this->classMap();
    }

    /**
     * 映射类库
     */
    public function classMap()
    {
        Yii::$classMap['KdtApiClient'] = '@vendor/mkui/yii2-youzan/lib/KdtApiClient.php';
        Yii::$classMap['KdtApiProtocol'] = '@vendor/mkui/yii2-youzan/lib/KdtApiProtocol.php';
        Yii::$classMap['SimpleHttpClient'] = '@vendor/mkui/yii2-youzan/lib/SimpleHttpClient.php';
    }

    /**
     * 获取对象
     */
    public function getKdtClient()
    {
        if ($this->_kdtclient === null) {
            $this->_kdtclient = new KdtClient($this->config);
        }
        return $this->_kdtclient;
    }
}