<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Xiaoler\Blade\Compilers\BladeCompiler;
use Xiaoler\Blade\Engines\CompilerEngine;
use Xiaoler\Blade\Engines\EngineResolver;
use Xiaoler\Blade\Factory;
use Xiaoler\Blade\Filesystem;
use Xiaoler\Blade\FileViewFinder;

class Blade
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $path = [];

        if ($this->CI->router->fetch_module() != "") {
            foreach ($this->CI->config->item("modules_locations") as  $location_modules) {
                $path[] = $location_modules . $this->CI->router->fetch_module() . "/views";
            }
        }

        $path[] =  APPPATH . 'views/';

        $cachePath = APPPATH . 'cache/views'; // 编译文件缓存目录

        $file  = new Filesystem;
        $compiler = new BladeCompiler($file, $cachePath);

        $compiler->directive('datetime', function ($timestamp) {
            return preg_replace('/(\(\d+\))/', '<?php echo date("Y-m-d H:i:s", $1); ?>', $timestamp);
        });

        $resolver = new EngineResolver;
        $resolver->register('blade', function () use ($compiler) {
            return new CompilerEngine($compiler);
        });

        $this->factory = new Factory($resolver, new FileViewFinder($file, $path));
    }

    public function view($path, $vars = [])
    {
        echo $this->factory->make($path, $vars);
    }
    public function exists($path)
    {
        return $this->factory->exists($path);
    }
    public function share($key, $value)
    {
        return $this->factory->share($key, $value);
    }
    public function render($path, $vars = [])
    {
        return $this->factory->make($path, $vars)->render();
    }
}
