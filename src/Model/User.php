<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $fillable = ['name', 'email', 'password'];
    protected $attributes = [
        'image' => Null,
        'about' => Null,
        'notifications' => 0,
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}
