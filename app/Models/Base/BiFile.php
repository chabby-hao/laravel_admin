<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 23 May 2018 17:25:41 +0800.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BiFile
 * 
 * @property int $id
 * @property string $filename
 * @property string $fileurl
 * @property int $filetype
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models\Base
 */
class BiFile extends Eloquent
{
	protected $connection = 'bi';

	protected $casts = [
		'filetype' => 'int'
	];
}