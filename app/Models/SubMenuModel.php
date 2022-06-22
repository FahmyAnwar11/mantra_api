<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenuModel extends Model
{
    use HasFactory;
    protected $table = 'sub_menu';
    protected $primaryKey = 'id';

    public function menu()
    {
        return $this->belongsTo(MenuModel::class, 'menu_id', 'id');
    }
}
