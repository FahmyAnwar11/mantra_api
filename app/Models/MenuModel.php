<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    use HasFactory;
    protected $table = 'menu';
    protected $primaryKey = 'id';

    public function sub_menu()
    {
        return $this->hasMany(SubMenuModel::class, 'menu_id', 'id');
    }
}
