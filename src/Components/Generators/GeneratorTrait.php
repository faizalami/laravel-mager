<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 23/12/18
 * Time: 10:15
 */

namespace Faizalami\LaravelMager\Components\Generators;


trait GeneratorTrait
{
    private $type;
    private $config;
    private $outputPath;
    private $outputFile;
    private $outputString = '';

    private function renderBlade($template, $config) {
        // todo: buat try catch
        return html_entity_decode(view($template, $config)->render(), ENT_QUOTES, 'utf-8');
    }

    public function getInfo() {
        return [
            'type' => $this->type,
            'config' => $this->config,
            'dir' => $this->outputPath,
            'file' => $this->outputFile,
            'rendered' => $this->outputString
        ];
    }

    public function generate() {
        $pathString = '/';

        foreach(explode('/', $this->outputPath) as $key => $directory) {
            $pathString .= $directory . '/';

            if (!is_dir($pathString)) {
                mkdir($pathString);
            }
        }

        file_put_contents($pathString . $this->outputFile, $this->outputString);
    }
}
