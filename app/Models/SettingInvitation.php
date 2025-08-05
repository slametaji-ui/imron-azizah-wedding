<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingInvitation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'setting_invitation';

    protected $fillable = [
        'invitation_name',
        'bride_fullname',
        'groom_fullname',
        'bride_nickname',
        'groom_nickname',
        'bride_instagram',
        'groom_instagram',
        'bride_father_name',
        'bride_mother_name',
        'groom_father_name',
        'groom_mother_name',
        'bride_child_number',
        'groom_child_number',
        'quotes_source',
        'quotes_content',
        'akad_day',
        'akad_date',
        'akad_clock',
        'akad_venue',
        'akad_address',
        'akad_maps',
        'resepsi_day',
        'resepsi_date',
        'resepsi_clock',
        'resepsi_venue',
        'resepsi_address',
        'resepsi_maps',
        'maps_iframe',
    ];

    protected $casts = [
        'akad_date' => 'datetime',  // Pastikan tipe data ini benar
        'resepsi_date' => 'datetime',  // Pastikan tipe data ini benar
    ];


}
