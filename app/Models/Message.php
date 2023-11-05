<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Message
 *
 * @property int $id
 * @property int $chat_id
 * @property int $chat_user_id
 * @property string $message
 * @property string $created_at
 * @property string $updated_at
 * @property-read Chat $chat
 * @property-read ChatUser $user
 */
class Message extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'messages';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['chat_id', 'chat_user_id', 'message'];

    /**
     * @return  BelongsTo
     */
    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }

    /**
     * @return  BelongsTo
     */
    public function chatUser(): BelongsTo
    {
        return $this->belongsTo(ChatUser::class);
    }
}
