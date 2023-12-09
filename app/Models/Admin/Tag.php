<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Admin\Post;

class Tag extends Model
{
    use HasFactory;
		protected $guarded = [];

		public function posts() {
			return $this->belongsToMany(Post::class);
		}
}
