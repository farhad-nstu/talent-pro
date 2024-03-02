<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortenUrl extends Model
{
    use HasFactory;

    protected $table = 'shorten_urls';

    protected $fillable = [
        'user_id', 'title', 'original_url', 'shortener_url'
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function ($model) {
            $model->user_id = auth()->check() ? auth()->id() : 1;
        });
        static::saving(function ($model) {
            $model->user_id = auth()->check() ? auth()->id() : 1;
        });
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function getAllUrls(){
        return self::orderBy('updated_at', 'desc')->get();
    }

    public static function getSingleUrlByParam(string $whereParam, $value){
        return self::where($whereParam, $value)->first();
    }

    public static function createUrl(array $urlInfo){
        return self::create($urlInfo);;
    }

    public static function updateUrlByParam(string $whereParam, int|string $value, array|null $updatedInfo){
        return self::where($whereParam, $value)->update($updatedInfo);
    }

    public static function deleteUrlByParam(string $whereParam, int|string $value){
        return self::where($whereParam, $value)->delete();
    }
}
