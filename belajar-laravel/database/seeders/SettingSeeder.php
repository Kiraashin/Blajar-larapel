<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // general
            ['key' => 'site_name', 'value' => 'PPKD Sticker', 'label' => 'Nama Lembaga / Website', 'group' => 'general', 'type' => 'text'],
            ['key' => 'site_tagline', 'value' => null, 'label' => 'Tagline Website', 'group' => 'general', 'type' => 'text'],
            ['key' => 'site_description', 'value' => null, 'label' => 'Deskripsi Singkat Website', 'group' => 'general', 'type' => 'text'],
            ['key' => 'site_logo', 'value' => null, 'label' => 'Logo Utama Website', 'group' => 'general', 'type' => 'image'],

            // kontak
            ['key' => 'phone', 'value' => null, 'label' => 'Nomor Telepon Utama', 'group' => 'general', 'type' => 'text'],
            ['key' => 'email_upload', 'value' => null, 'label' => 'Email Upload', 'group' => 'general', 'type' => 'text'],
            ['key' => 'email_order', 'value' => null, 'label' => 'Email Order', 'group' => 'general', 'type' => 'text'],
            ['key' => 'address', 'value' => null, 'label' => 'Alamat', 'group' => 'general', 'type' => 'text'],

            // media sosial
            ['key' => 'url_shopee', 'value' => null, 'label' => 'Url Shopee', 'group' => 'general', 'type' => 'text'],
            ['key' => 'url_facebook', 'value' => null, 'label' => 'Url Facebook', 'group' => 'general', 'type' => 'text'],
            ['key' => 'url_instagram', 'value' => null, 'label' => 'Url Instagram', 'group' => 'general', 'type' => 'text'],
            ['key' => 'url_youtube', 'value' => null, 'label' => 'Url Youtube', 'group' => 'general', 'type' => 'text'],
            ['key' => 'url_tiktok', 'value' => null, 'label' => 'Url Tiktok', 'group' => 'general', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            // firstOrCreate: baris yang sudah ada (dan sudah diisi lewat halaman Pengaturan) tidak ditimpa
            Setting::firstOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
