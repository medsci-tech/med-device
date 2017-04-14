<?php

namespace App\Models;
use App\Common;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Product
 * @package App\Models
 * @mixin \Eloquent
 */
class Product extends Common
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'enterprise',
        'standard',
        'registration',
        'office',
        'scope',
        'attention',
        'stock',
        'weight',
        'category_id',
        'is_show',
        'description',
        'price',
        'tags',
        'logo',
        'detail',
        'default_spec',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }


    public function type()
    {
        return $this->belongsTo('App\Models\ProductType', 'type_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot(['quantity', 'specification_id']);
    }

    public function banners()
    {
        return $this->hasMany(ProductBanner::class);
    }

    public function specifications()
    {
        return $this->hasMany(ProductSpecification::class);
    }

    public function videos()
    {
        return $this->hasMany(ProductVideo::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var $query
     */
    public function scopeSearch($query, $seed)
    {
        return $query->where('name', 'like', '%' . $seed . '%')
            ->orWhere('description', 'like', '%' . $seed . '%')
            ->orWhere('tags', 'like', '%' . $seed . '%');
    }

    public function addSpec($data)
    {
        $this->specifications()->save(ProductSpecification::create($data));
        return $this;
    }
    public function addVideo($data)
    {
        $this->videos()->save(ProductVideo::create($data));
        return $this;
    }

    public function addSpecs($items)
    {
        foreach ($items as $item) {
            $this->addSpec($item);
        }
        return $this;
    }
    public function addVideos($items)
    {
        foreach ($items as $item) {
            $this->addVideo($item);
        }
        return $this;
    }

    public function addBanner($data)
    {
        $this->banners()->save(ProductBanner::create($data));
        return $this;
    }

    /**
     * @param array $items
     * @return $this
     */
    public  function addBanners($items)
    {
        foreach ($items as $item) {
            $this->addBanner($item);
        }
        return $this;
    }

    public static function create(array $options = [])
    {
        $product = parent::create($options);
        if (array_key_exists('specDetails', $options)) {
            $spec = $options['specDetails'];
            $product = $product->addSpecs($spec);
        }
        if (array_key_exists('videoDetails', $options)) {
            $spec = $options['videoDetails'];
            $product = $product->addVideos($spec);
        }

        if (array_key_exists('banners', $options)) {
            $banners = $options['banners'];
            $product->addBanners($banners);
        }

        return $product;
    }

}