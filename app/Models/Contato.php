<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $table = 'contato';
    protected $fillable = ['name', 'last_name', 'phone', 'email', 'message', 'status'];
    

    // Marca o contato como lido
    public function markAsRead()
    {
        $this->status = 'read';
        $this->save();
    }
}
