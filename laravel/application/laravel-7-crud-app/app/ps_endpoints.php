<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ps_endpoints extends Model
{
 protected $fillable = [
        'id',
	'transport',
        'aors',
        'auth',
        'context',
        'disallow',
        'allow',
	'direct_media',
	'force_rport',
	'rewrite_contact',
	'rtp_symmetric',
	'call_group',
	'pickup_group'
    ];
    public $timestamps = false;
}