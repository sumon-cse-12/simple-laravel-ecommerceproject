<?php
use Illuminate\Support\Facades\Log;
use Barryvdh\TranslationManager\Models\Translation;
use App\Models\Page;
function get_settings($name)
{
    $cache_in_seconds = env('CACHE_TIME');
    $value = cache('settings');
    $customer_settings = cache('customer_settings');
    $seller_settings = cache('seller_settings');
    if ($name == 'app_section' || $name == 'app_logo' || $name =='contact_info') {
        $host = \Illuminate\Support\Facades\Request::getHost();
        $cacheDomain = cache('domain_data_'.$host);
    }

    if (!$value) {
        if (\Schema::hasTable('settings')) {
            $settings = \App\Models\Settings::where('admin_id', 1)->get();
            $sortSettings = [];
            foreach ($settings as $setting) {
                $sortSettings[$setting->name] = $setting->value;
            }
            cache()->remember('settings', 10800, function () use ($sortSettings) {
                return $sortSettings;
            });
        }
    } else {
        $sortSettings = $value;
    }

    return isset($sortSettings[$name]) ? $sortSettings[$name] : '';
}
function get_pages($position)
{

    $pages = cache('pages');

    if (!$pages) {
        $pages = Page::where('status', 'published')->orderBy('created_at', 'desc')->get();

        $sortSettings = [];
        foreach ($pages as $page) {
            $sortSettings[$page->position][] = $page;
        }
        cache()->remember('pages', 10800, function () use ($sortSettings) {
            return $sortSettings;
        });
    } else {
        $sortSettings = $pages;
    }

    return isset($sortSettings[$position]) ? $sortSettings[$position] : [];
}