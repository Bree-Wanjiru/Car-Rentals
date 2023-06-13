<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

//fillable properties 
//protected $fillable = ['title', 'company', 'location', 'website','email','description','tags'];

    // create function for filtering our tags and search
    public function scopeFilter($query, array $filters)
    {
        // tags
       if($filters['tag'] ?? false){
        $query->where('tags','like','%' . request('tag') . '%');
       }
       //search
       if($filters['search'] ?? false){
        $query->where('title','like','%' . request('search') . '%')
        ->orWhere('description','like','%' . request('search') . '%')
        ->orWhere('tags','like','%' . request('search') . '%');
       }
    }

    //define a relationship to user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
