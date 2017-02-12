<?php
/**
 * Created by PhpStorm.
 * User: akram
 * Date: 11/5/2016
 * Time: 11:14 PM
 */

namespace Social\Facebook;


class Mapper
{
    public function deserialize($model, Array $array)
    {
        return new $model(array_merge($this->replace_keys($array, $model, true), ['rawData' => ($array),'network'=>'facebook']));
    }

    public function deserializeEdge($model, Array $array)
    {
        $collection = collect($array);
        return ($collection->map(function ($arr) use ($model) {
            return $this->deserialize($model, $arr);
        })->all());

    }

    public function serialize($model, $obj)
    {
        return ($this->replace_keys($obj->toArray(), $model, false));
    }

    private function replace_keys(Array $array, $model, $flip)
    {
        $model_class_name = explode('\\', $model);
        foreach ($array as $key => $val) {
            $temp_array[call_user_func(array(Indexer::class, end($model_class_name)), $key, $flip)] = $array[$key];
        }
        return $temp_array;
    }
}