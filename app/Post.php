<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $fillable = [
        'body',
        'category_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function likes(){
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function isLikedBy(?User $user){
        if($user){
            return (bool)$this->likes->where('id', $user->id)->count();
        }else{
            return false;
        }
    }

    public function scopeCategoryAt($query, $category_id){
        if(empty($category_id)){
            return;
        }
        
        return $query->where('category_id', $category_id);
    }
    
    public function scopeKeywordAt($query, $keyword){
        if(empty($keyword)){
            return;
        }
        
        
        return $query->where('body', 'LIKE', "%$keyword%");
    } 
    
    public function getPostRanking(Array $results){
        $posts_ids = array_keys($results);
        $ids_order = implode(',', $posts_ids);
        $post_ranking = $this->whereIn('id', $posts_ids)
                            ->orderByRaw(DB::raw("FIELD(id, $ids_order)"))
                            ->get();
        return $post_ranking;
    }

}
