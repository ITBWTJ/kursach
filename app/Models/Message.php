<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

//    PROPERTIES

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'phone',
        'text',
        'code',
        'send_result'
    ];

    /**
     * @var string
     */
    private static $confirmMessage = 'Не повідомляйте код іншим особам - ';

//    RELATIONHIPS

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

//    FUNCTIONS

    /**
     * @param int|null $length
     * @return int
     */
    public static function getRandomCode(?int $length = 8) : int
    {
        $result = '';

        for($i = 0; $i < $length; $i++) {
            $result .= mt_rand(0, 9);
        }

        return $result;
    }

    /**
     * @return string
     */
    public static function getConfirmMessage()
    {
        return self::$confirmMessage;
    }
}
