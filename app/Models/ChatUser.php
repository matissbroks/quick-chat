<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Chat
 *
 * @property int $id
 * @property string $name
 * @property int $chat_id
 * @property string $created_at
 * @property string $updated_at
 * @property Chat $chat
// * @property Chat[] $timesheetSubmissions
 */
class ChatUser extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'chat_users';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @return  BelongsTo
     */
    public function chat()
    {
        return $this->belongsTo('App\Models\Chat', 'id', 'chat_id');
    }
}
