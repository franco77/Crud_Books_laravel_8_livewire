<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'books';

    protected $fillable = ['code','name','image','author','price','year','description','n_pages','format_b','editorial'];
	
}
