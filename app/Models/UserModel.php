<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable; //implement class Authenticatable

// use App\Models\LevelModel;

use Monolog\Level;

// class UserModel extends Model
// {
//     use HasFactory;

//     protected $table = 'm_user'; //Mendefinisikan nama tabel yang digunakan oleh model ini
//     protected $primaryKey = 'user_id';  //Mendefinisikan primary key dati tabel yang digunakan yang digunakan
//     /**
//      * The attributes that are mass asigniable
//      * @var array
//      */
//     // protected $fillable = ['level_id', 'username', 'nama', 'password'];

//     protected $fillable = ['level_id', 'username', 'nama', 'password'];

//     public function level(): BelongsTo
//     {
//         return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
//     } 
// }


class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_user'; //Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id';  //Mendefinisikan primary key dati tabel yang digunakan yang digunakan
    /**
     * The attributes that are mass asigniable
     * @var array
     */

    protected $fillable = [ 'username', 'password', 'nama', 'level_id', 'created_at', 'updated_at'];

    protected $hidden = ['password']; //jangan ditampilkan saat select

    protected $casts = ['password' => 'hashed']; //casting password agar otomatis di hash

    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    } 
}