<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable =
    [
    'title',
    'body',
    ];
    
    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        // Modelクラスで実装したデータ取得部分のコード
        // return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
        // 上記コードのSQLを確認したい場合
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->toSql();
    }
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

}
