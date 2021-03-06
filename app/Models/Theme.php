<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'themes';
    protected $guarded = false;

//    protected $with = ['randomPath'];

    public function photos()
    {
        return $this->hasMany(Photo::class, 'theme_id', 'id');
    }

    public function randomPath()
    {
        if ($this->photos()->count() > 0) {
            $path = $this->photos()->inRandomOrder()->first()->only('path')['path'];
        } else {
            $path = '';
        }
        return $path;
    }

}
