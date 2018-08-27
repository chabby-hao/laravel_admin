<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 27 Aug 2018 16:44:42 +0800.
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
