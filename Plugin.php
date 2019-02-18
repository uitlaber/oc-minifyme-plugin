<?php namespace Uit\MinifyMe;


use Cms\Classes\Theme;
use Illuminate\Support\Facades\Storage;
use MatthiasMullie\Minify;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function registerMarkupTags()
    {
        return [
            'filters' => [
                // A global function, i.e str_plural()
                'minifyCss' => [$this, 'minifyCss'],
                'minifyJs' => [$this, 'minifyJs'],

            ],
            'functions' => [
                // A static method call, i.e Form::open()
//                'form_open' => ['October\Rain\Html\Form', 'open'],
            ]
        ];
    }

    public function minifyCss($styles, $name = null)
    {
        if (is_null($name))
            $name = 'minifed';
        $minifier = new Minify\CSS();
        if (is_array($styles)) {
            foreach ($styles as $style) {
                $path = $this->getAssetPath($style);
                $minifier->add($path);
            }
        } else {
            $path = $this->getAssetPath($styles);
            $minifier->add($path);
        }

        $css = $minifier->minify();
        $exists = Storage::exists('minifyme/' . $name . '.css');
        if (!$exists)
            Storage::put('minifyme/' . $name . '.css', $css);
        return url('storage/app/minifyme/' . $name . '.css');
    }

    public function minifyJs($scripts, $name = null)
    {
        if (is_null($name))
            $name = 'minifed';
        $minifier = new Minify\JS();
        if (is_array($scripts)) {
            foreach ($scripts as $script) {
                $path = $this->getAssetPath($script);
                $minifier->add($path);
            }
        } else {
            $path = $this->getAssetPath($scripts);
            $minifier->add($path);
        }

        $js = $minifier->minify();
        $exists = Storage::exists('minifyme/' . $name . '.js');
        if (!$exists)
            Storage::put('minifyme/' . $name . '.js', $js);
        return url('storage/app/minifyme/' . $name . '.js');
    }

    public function getThemePath()
    {
        $theme = Theme::getActiveTheme();
        return $theme->getPath();
    }

    public function getAssetPath($pathname)
    {
        $themePath = $this->getThemePath();
        if ($pathname == '@jquery') {
            $path = public_path('modules/backend/assets/js/vendor/jquery.min.js');

        } else if ($pathname == '@framework') {
            $path = public_path('modules/system/assets/js/framework.js');

        } else if ($pathname == '@framework.extras.js') {
            $path = public_path('modules/system/assets/js/framework.extras.js');

        } else if ($pathname == '@framework.extras.css') {
                $path = public_path('modules/system/assets/css/framework.extras.css');

        } else {
            $path = $themePath . '/' . $pathname;
        }
        return $path;
    }


}
