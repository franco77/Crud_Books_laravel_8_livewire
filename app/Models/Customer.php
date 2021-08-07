<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'customers';

    protected $fillable = ['ic','first_name','last_name','email','phone','address','gender','profile'];
	
}
