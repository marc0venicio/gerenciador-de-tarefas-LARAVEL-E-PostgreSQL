<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTask extends Model
{
    use HasFactory;
    protected $fillable=['title','description','id_user', 'priori', 'date'];
    protected $table = 'task';

  
    public function relUsers()
    {
        return $this->hasOne('App\Models\User','id','id_user');
    }

    public function search(array $data){
        return $this->where(function($query) use ($data){
            if(isset($data['id_user']))
                $query->where('id_user', $data['id_user']);
            if(isset($data['title']))
                $query->where('title', ['title']);

        })
        //->toSql(); dd($historics);
        ->get();
    }
}
