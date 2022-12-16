<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// 追記
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    /**
     * 複数代入可能な属性
     *
     * /fillが実行可能なプロパティを用意しておく
     * @var array
     */
     
    /**
     * $guardedは複数代入不可能な属性
     * 
     */
     
    // titleとbodyだけfillする
    protected $fillable =
    [
    'title',
    'body',
    'category_id',
    ];
    
    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        // Modelクラスで実装したデータ取得部分のコード
        // return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
        // 上記コードのSQLを確認したい場合
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->toSql();
    }
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    // Categoryに対するリレーション

    //「1対多」の関係なので単数系に
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
