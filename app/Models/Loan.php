<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'loans';

    protected $fillable = ['id_customer','id_book','loan_date','notes','status'];
	
}
