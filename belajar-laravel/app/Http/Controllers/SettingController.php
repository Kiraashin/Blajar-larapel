<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Support\RichText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index()
    {
        $title = "Manajemen Pengaturan - PPKD Sticker";
        // hasilnya ['site_name' => 'PPKD Sticker', 'phone' => '...', ...]
        $setting = Setting::pluck('value', 'key');
        return view('admin.setting.index', compact('title', 'setting'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'nullable|string|max:255',
            'site_tagline' => 'nullable|string|max:255',
            'site_description' => 'nullable|string|max:5000',
            'site_logo' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',

            'phone' => 'nullable|string|max:100',
            'email_upload' => 'nullable|email|max:255',
            'email_order' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:5000',

            'url_shopee' => 'nullable|url|max:255',
            'url_facebook' => 'nullable|url|max:255',
            'url_instagram' => 'nullable|url|max:255',
            'url_youtube' => 'nullable|url|max:255',
            'url_tiktok' => 'nullable|url|max:255',
        ]);

        if ($request->hasFile('site_logo')) {
            $oldLogo = Setting::where('key', 'site_logo')->value('value');

            if ($oldLogo) {
                // hapus gambar lama
                Storage::disk('public')->delete($oldLogo);
            }

            $path = $request->file('site_logo')->store('setting', 'public');
            $this->saveSetting('site_logo', $path, 'image');
        }

        $ignoreKeys = ['site_logo'];

        foreach ($validated as $key => $value) {
            if (in_array($key, $ignoreKeys)) {
                continue;
            }

            if (in_array($key, ['site_description', 'address'], true)) {
                $value = RichText::sanitize($value);
            }

            $this->saveSetting($key, $value);
        }

        return redirect()->route('admin.settings')->with('success', 'Pengaturan Website PPKD Sticker Berhasil disimpan!');
    }

    /**
     * Simpan satu pengaturan. Label/group/type hanya diisi saat baris baru dibuat,
     * jadi label dari seeder tidak tertimpa setiap kali form disimpan.
     */
    private function saveSetting(string $key, ?string $value, string $type = 'text'): void
    {
        $setting = Setting::firstOrNew(['key' => $key]);

        if (! $setting->exists) {
            $setting->label = Str::headline($key);
            $setting->group = 'general';
            $setting->type = $type;
        }

        $setting->value = $value;
        $setting->save();
    }
}
