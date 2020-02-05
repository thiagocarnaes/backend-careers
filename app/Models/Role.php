<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes, Filterable;

    protected $fillable = ['name', 'code'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function rules()
    {
        return $this->belongsToMany('App\Models\Rule')->withTrashed()->withTimestamps();
    }

    public function users()
    {
        return $this->hasMany('App\Models\User')->withTrashed();
    }
}
