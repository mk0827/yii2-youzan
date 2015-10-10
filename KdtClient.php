<?php
namespace mkui\kdtapi;

use Yii;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/10/10 0010
 * Time: 13:13
 */
class KdtClient extends \KdtApiClient
{
    private $appid;
    private $appsecret;

    public function __construct($options)
    {
        $this->appid = isset($options['appid'])?$options['appid']:'';
        $this->appsecret = isset($options['appsecret'])?$options['appsecret']:'';
        parent::__construct($this->appid, $this->appsecret);
    }

    // 交易接口

    /**
     * 查询卖家已卖出的交易列表
     */
    public function getTradesSold($fields = '', $status = '')
    {
        $method = 'kdt.trades.sold.get';
        $params = [
            'fields'    => $fields,
            'status'    => $status
        ];
        $result = $this->post($method, $params);
        return $result['response'];
    }

    // 用户接口

    /**
     * 查询微信粉丝用户信息
     */
    public function getUsersWeixinFollower($user, $fields = '', $type = 1)
    {
        $method         = 'kdt.users.weixin.follower.get';
        $user_id        = '';
        $weixin_openid  = '';
        $type == 1 ? $user_id = $user : $weixin_openid = $user;
        $params = [
            'fields'        => $fields,
            'user_id'       => $user_id,
            'weixin_openid' => $weixin_openid
        ];
        $result = $this->post($method, $params);
        return $result['response'];
    }
}