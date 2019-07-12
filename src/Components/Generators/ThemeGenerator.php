<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 24/02/19
 * Time: 9:32
 */

namespace Faizalami\LaravelMager\Components\Generators;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class ThemeGenerator implements GeneratorInterface
{
    use GeneratorTrait;

    public function __construct($config)
    {
        $this->type = 'theme';
        $this->config = $config;
        $this->outputPath = config_path('global');
        $this->outputFile = 'main.php';
    }

    public function render()
    {
        $template = 'mager::template.config.theme';

        $theme = json_decode($this->config, true);

        $appName = $theme['name'];
        unset($theme['name']);

        $theme = json_encode($theme, JSON_PRETTY_PRINT);
        $theme = str_replace('{', '[', $theme);
        $theme = str_replace('"', '\'', $theme);
        $theme = str_replace(':', '=>', $theme);
        $theme = str_replace('}', ']', $theme);

        $envPath = base_path('.env');

        Artisan::call('optimize:clear');
        if (File::exists($envPath)) {
            $envFile = File::get($envPath);
            $appNameConfig = 'APP_NAME=\''.config('app.name').'\'';
            if (strpos($envFile, $appNameConfig) === false) {
                $appNameConfig = 'APP_NAME='.config('app.name');
            }

            File::put($envPath, str_replace(
                $appNameConfig,
                'APP_NAME=\''.$appName.'\'',
                $envFile
            ));
        }
        putenv('APP_NAME='.$appName);
        Artisan::call('config:cache');

        $this->outputString = $this->renderBlade($template, compact('theme'));

        return $this;
    }
}
