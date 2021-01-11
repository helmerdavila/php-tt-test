<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\ElectronicItem
 *
 * @property int $id
 * @property int $electronic_type_id
 * @property string $name
 * @property string $price
 * @property int $is_wired
 * @property int $is_single_purchasable
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElectronicItem[] $contained_in_extras
 * @property-read int|null $contained_in_extras_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ElectronicItem[] $extras
 * @property-read int|null $extras_count
 * @property-read \App\Models\ElectronicType $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicItem forSale()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicItem whereElectronicTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicItem whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicItem whereIsSinglePurchasable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicItem whereIsWired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicItem whereUpdatedAt($value)
 */
	class ElectronicItem extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ElectronicType
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $maximum_extras
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicType whereMaximumExtras($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ElectronicType whereUpdatedAt($value)
 */
	class ElectronicType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $user_id
 * @property string $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderDetail[] $order_details
 * @property-read int|null $order_details_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUserId($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderDetail
 *
 * @property int $id
 * @property int $order_id
 * @property int $electronic_item_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderDetail whereElectronicItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderDetail whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderDetail whereUpdatedAt($value)
 */
	class OrderDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

