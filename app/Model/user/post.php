<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    // criando relacionamentos entre post e tags
    public function tags()
    {
    	//relacionando a TAG com POST usando muito para muitos e usar a tabela post_tag
    	return $this->belongsToMany('App\Model\user\tag','post_tags')->withTimestamps();
    } 
    public function categories()
    {
    	//relacionando a TAG com POST usando muito para muitos e usar a tabela post_tag
    	return $this->belongsToMany('App\Model\user\category','category_posts')->withTimestamps();
    }
    //mostra o post pelo slug
    public function getRouteKeyName(){
        return 'slug';
    }
}
