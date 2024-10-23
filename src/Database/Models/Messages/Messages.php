<?php

namespace Pishgaman\Pishgaman\Database\Models\Messages;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pishgaman\Pishgaman\Database\Models\User\User;
use Carbon\Carbon;

class Messages extends Model
{
    use HasFactory;

    public function recipient()
    {
        return $this->belongsTo(User::class,'recipient_id');
    }    

    public function sender()
    {
        return $this->belongsTo(User::class,'sender_id');
    } 

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timezone('Asia/Tehran')->format('Y-m-d H:i:s');
    }    

    public function getUpdatedAtAttribute($value) // تابع مشابه برای updated_at
    {
        return Carbon::parse($value)->timezone('Asia/Tehran')->format('Y-m-d H:i:s');
    }  
    
    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'message_id');
    }
}
