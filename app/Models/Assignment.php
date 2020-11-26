<?php

namespace App\Models;

use Carbon\Carbon;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Assignment
 *
 * @property int $id
 * @property string $body
 * @property string|null $completed_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $due_date
 * @method static Builder|Assignment newModelQuery()
 * @method static Builder|Assignment newQuery()
 * @method static Builder|Assignment query()
 * @method static Builder|Assignment whereBody($value)
 * @method static Builder|Assignment whereCompletedAt($value)
 * @method static Builder|Assignment whereCreatedAt($value)
 * @method static Builder|Assignment whereDueDate($value)
 * @method static Builder|Assignment whereId($value)
 * @method static Builder|Assignment whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Assignment extends Model
{
    use HasFactory;

    public function complete(){

        $this->completed_at = Carbon::now();
        $this->save();

    }

}
