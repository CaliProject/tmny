<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model {

    /**
     * Mass assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'data'
    ];

    /**
     * $conf->data accessor.
     *
     * @return mixed
     */
    public function getDataAttribute()
    {
        return json_decode($this->attributes['data']);
    }

    /**
     * Get configuration value by the given key
     * 根据制定键获取值
     *
     * @param $key
     * @return string
     *
     * @author Cali
     */
    public static function getConfigurationByKey($key)
    {
        try {
            $conf = static::where('key', $key)->first();
        } catch (\Exception $e) {
            return false;
        }

        return $conf ? $conf->data : null;
    }

    /**
     * Call dynamic method by string.
     *
     * @param $expression
     * @return mixed
     *
     * @author Cali
     */
    public static function callByExpression($expression)
    {
        return static::__callStatic($expression, []);
    }

    /**
     * Handle dynamic method calls into the model.
     *
     * @param string $method
     * @param array  $parameters
     * @return mixed
     *
     * @author Cali
     */
    public function __call($method, $parameters)
    {
        if (in_array($method, ['increment', 'decrement'])) {
            return call_user_func_array([$this, $method], $parameters);
        }

        $query = $this->newQuery();

        if (in_array($method, get_class_methods($query))) {
            // Call its query builder
            return call_user_func_array([$query, $method], $parameters);
        }

        $method = snake_case($method);

        return ! ! count($parameters) ?
            $this->updateOrCreate($method, $parameters) :
            $this->getConfiguration($method);
    }

    /**
     * Get configuration according to the method.
     *
     * @param $key
     * @return string
     *
     * @author Cali
     */
    public function getConfiguration($key)
    {
        return static::getConfigurationByKey($key);
    }

    /**
     * Update or create a new config by the key.
     *
     * @param $key
     * @param $values
     * @return bool|int|static
     *
     * @author Cali
     */
    public function updateOrCreate($key, $values)
    {
        $attributes = [
            'key'  => $key,
            'data' => is_object($values[0]) || is_array($values[0]) ? json_encode($values[0]) : $values[0]
        ];

        return is_null(static::where('key', $key)->first()) ?
            static::create($attributes) :
            static::where('key', $key)
                ->update($attributes);
    }

    /**
     * Setup the data.
     */
    public static function setupData()
    {
        self::about([
            'title'   => '关于天美',
            'caption' => 'I just love photography, it is my true passion. To me photography is an art of observation.',
            'content' => ''
        ]);

        self::services([
            'title'   => '产业链条',
            'caption' => 'I believe in quality design, attention to detail, creative identity and beautiful content look.',
            'content' => ''
        ]);

        self::portfolio([
            'title'    => '时令产品',
            'caption'  => 'Explore this diverse selection of my works. Find the interest in this beautiful collection.',
            'products' => [
                [
                    'name'    => '产品名',
                    'caption' => '产品简短介绍',
                    'image'   => '图片地址',
                    'qrcode'  => '二维码地址',
                    'link'    => '淘宝链接地址'
                ]
            ]
        ]);

        self::basement([
            'title'   => '时令基地',
            'caption' => '',
            'content' => ''
        ]);

        self::blog([
            'title'   => '新鲜生活',
            'caption' => '新鲜生活',
            'posts'   => [
                [
                    'title'   => '标题',
                    'time'    => '2016-04-25 00:00:00',
                    'content' => ''
                ]
            ]
        ]);

        self::contact([
            'title'   => '联系天美',
            'caption' => 'If you just want to say hello or ask a question, please send me a short message.',
            'details' => [
                'slogan'  => '天美，让你生活天天美好！',
                'tel'     => '400-820-0628',
                'url'     => 'http://www.tmny.cc',
                'address' => '中国 深圳 宝安 留仙二路 美生创谷科技创新园B1栋306号',
                'company' => '深圳市天美农业服务有限公司'
            ]
        ]);

        self::site([
            'about'     => [
                'keywords'   => '天美农业,天美荔枝',
                'background' => '/images/1.jpg',
            ],
            'services'  => [
                'keywords'   => '天美农业,天美荔枝',
                'background' => '/images/2.jpg',
            ],
            'portfolio' => [
                'keywords'   => '天美农业,天美荔枝',
                'background' => '/images/3.jpg',
            ],
            'basement'  => [
                'keywords'   => '天美农业,天美荔枝',
                'background' => '/images/4.jpg',
            ],
            'blog'      => [
                'keywords'   => '天美农业,天美荔枝',
                'background' => '/images/5.jpg',
            ],
            'contact'   => [
                'keywords'   => '天美农业,天美荔枝',
                'background' => '/images/6.jpg',
            ],
        ]);

    }
}
