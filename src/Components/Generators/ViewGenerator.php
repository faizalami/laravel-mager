<?php
/**
 * Created by PhpStorm.
 * User: faizalami
 * Date: 23/12/18
 * Time: 10:15
 */

namespace Faizalami\LaravelMager\Components\Generators;


class ViewGenerator implements GeneratorInterface
{
    use GeneratorTrait;

    private $renderQueue = [];
    private $renderedComponent;

    public function __construct($config)
    {
        $this->type = 'view';
        $this->config = $config;

        foreach ($this->config['components'] as $key => $page) {
            $this->config['components']->{$key}->id = $this->config['components']->{$key}->{'data-id'};
            unset($this->config['components']->{$key}->{'data-id'});
        }

        $this->outputPath = resource_path('views/'.$this->config['controller']);
        $this->outputFile = $this->config['name'] . '.blade.php';
    }

    public function render()
    {
        if(in_array($this->config['type'], ['index', 'show'])) {
            $template = 'mager::template.view.'.$this->config['type'].'-demo';
            $this->outputString = $this->renderBlade($template, $this->config);
        } else {
            $this->queueComponent();
            $this->generateComponent();

            $template = 'mager::template.view.page';

            if(count($this->renderQueue) > 0) {
                $pageIndex = count($this->renderQueue) - 1;
                $this->config['content'] = $this->renderQueue[$pageIndex]['page'];
            } else {
                $this->config['content'] = '';
            }

            $this->outputString = $this->renderBlade($template, $this->config);
        }

        return $this;
    }

    private function queueComponent() {
        $maxLevel = 0;
        foreach ($this->config['components'] as $id => $component) {
            $component = (array) $component;
            if($component['level'] > $maxLevel) {
                $maxLevel = $component['level'];
            }
        }

        $index = 0;
        for($i = $maxLevel; $i > 0; $i--) {
            foreach ($this->config['components'] as $id => $component) {
                $component = (array) $component;
                $component['id_component'] = $id;
                if($component['level'] == $i) {
                    if(isset($this->renderQueue[$index])) {
                        if(isset($this->renderQueue[$index][$component['parent']])) {
                            $this->renderQueue[$index][$component['parent']][$component['index']] = $component;
                        } else {
                            $this->renderQueue[$index][$component['parent']] = [
                                $component['index'] => $component
                            ];
                        }
                    } else {
                        $this->renderQueue[$index] = [
                            $component['parent'] => [
                                $component['index'] => $component
                            ]
                        ];
                    }
                }
            }
            $index++;
        }
    }

    private function generateComponent() {
        ksort($this->renderQueue);
        foreach ($this->renderQueue as $index => $groups) {
            foreach ($groups as $group => $components) {
                ksort($components);
                $groupContent = '';
                foreach ($components as $component) {
                    if($index > 0 && in_array($component['type'], ['page', 'row', 'col'])) {
                        $component['content'] = $this->renderQueue[$index-1][$component['id_component']];
                    }
                    $component['model'] = lcfirst($this->config['model']);
                    $template = 'mager::template.view.' . $component['type'];
                    $groupContent .= $this->renderBlade($template, $component);
                }
                $this->renderQueue[$index][$group] = $groupContent;
            }
        }
    }
}
