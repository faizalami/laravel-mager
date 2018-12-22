<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 22/12/18
 * Time: 15:57
 */

namespace Faizalami\LaravelMager\Components;


class Generator
{
    private $config;
    private $type;
    private $outputDir;
    private $outputFile;
    private $outputString;

    public function __construct($type, $config) {
        $this->config = $config;
        $this->type = $type;

        if($type == 'view') {
            foreach ($this->config['pages'] as $key => $page) {
                $this->config['pages'][$key]['dataId'] = $this->config['pages'][$key]['data-id'];
                unset($this->config['pages'][$key]['data-id']);
            }
        }
    }

    public function generate() {
        switch ($this->type) {
            case 'model':
                $this->outputDir = app_path('Models');
                $this->outputFile = $this->config['name'] . '.php';
                break;
            case 'migration':
                $this->outputDir = base_path('database/migrations');
                $this->outputFile = date('Y_m_d_His_') . 'create_' . $this->config['table'] . '_table.php';
                break;
            case 'controller':
                $namespaceDir = array_slice(explode('\\', $this->config['namespace']), 1);
                $this->outputDir = base_path(implode('/', $namespaceDir));
                $this->outputFile = $this->config['name'] . '.php';
                break;
            case 'view':
                $this->outputDir = resource_path('views/'.$this->config['controller']);
                $this->outputFile = $this->config['name'] . '.php';
                break;
        }
    }
}