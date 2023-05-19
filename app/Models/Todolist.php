<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $table = 'todolists'; //name

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $guarded =['id']; //protect column from being kacau by people

    //fillable is the opposite of guarded

    //THE PART ABOVE IS OPTIONAL

  /**
   * Get the user that owns the Todolist
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user()
  {
      return $this->belongsTo(User::class, 'user_id', 'id');
  }
}
