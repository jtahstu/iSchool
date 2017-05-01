<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    /**
     * @param $name
     * @return mixed
     * 获取某一个配置的值
     */
    public static function getConfig($name)
    {
        $row = Config::where('name',$name)->first()->toArray();
        return $row['value'];
    }

    /**
     * @param $name
     * @return mixed
     * 获取某一个配置的整行数据
     */
    public static function getConfigRow($name)
    {
        return Config::where('name',$name)->first()->toArray();
    }
}
