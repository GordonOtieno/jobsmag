<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
 //you can as well allow mass assignment on appServiceProvider file
  protected $fillable =['title','company','logo','location','website','email','description','tags'];

    //scope filters work with controller
    public function scopeFilter($query, array $filters){
        //dd($query);
        if($filters['tag'] ?? false){
            $query -> where('tags','like','%'.request('tag').'%');

        }

        if($filters['search'] ?? false){
            $query -> where('title','like','%'.request('search').'%')
            ->orWhere('description','like','%'.request('search').'%')
            ->orWhere('tags','like','%'.request('search').'%');

        }
    }
}
