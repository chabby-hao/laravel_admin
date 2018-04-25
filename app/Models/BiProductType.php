<?php

namespace App\Models;

/**
 * App\Models\BiProductType
 *
 * @property int $id
 * @property string|null $product_name 产品名称
 * @property string|null $product_remark
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiProductType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiProductType whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BiProductType whereProductRemark($value)
 * @mixin \Eloquent
 */
class BiProductType extends \App\Models\Base\BiProductType
{
	protected $fillable = [
		'product_name',
		'product_remark',
        'id'
	];


	const PRODUCT_TYPE_EB001 = 1;
	const PRODUCT_TYPE_EB001B = 2;
	const PRODUCT_TYPE_EB001C = 3;
	const PRODUCT_TYPE_EB001A = 4;//测试用的，可以废弃
	const PRODUCT_TYPE_EB001D = 5;
	const PRODUCT_TYPE_EB001W = 6;
	const PRODUCT_TYPE_B640 = 7;
	const PRODUCT_TYPE_EB003A = 8;
	const PRODUCT_TYPE_EB485 = 9;



}
