<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    protected $table = 'leads';
    protected $fillable = ['name', 'phone', 'email', 'status', 'page_url'];

    // Marca o lead como lido
    public function markAsRead()
    {
        $this->status = 'read';
        $this->save();
    }
}
