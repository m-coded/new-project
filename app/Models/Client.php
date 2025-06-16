<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
        protected $table = 'user_record';
         // Specify the table name if it's not the plural form of the model name

    protected $fillable = [
        "name",
        "company_name",
        "due_date",
        "amount",
        "account_status",
        "description",
        "phone_number",
        "email",
        "user_id"
    ];
}
