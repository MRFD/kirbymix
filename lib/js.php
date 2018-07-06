<?php

namespace Kirby\Kirbymix;

use C;

/**
 * Kirby Mix JS Component
 *
 * @author  Marijn Roovers <marijn@mrfd.nl>
 * @license  MIT
 */
class JS extends \Kirby\Component\JS
{
    /**
     * Builds the html script tag for the given javascript file
     *
     * @param string $src
     * @param boolean async
     * @return string
     */
    public function tag($src, $async = false)
    {
        if (is_array($src)) {
            $js = [];
            foreach ($src as $s) {
                $js[] = $this->tag($s, $async);
            }
            return implode(PHP_EOL, $js) . PHP_EOL;
        }

        $manifest_file = kirby()->roots()->index() . DS . c::get('kirbymix.manifest', 'assets/mix-manifest.json');
        $manifest = [];
        if (file_exists($manifest_file)) {
            $manifest = json_decode(file_get_contents($manifest_file, true), true);
        }

        $file = kirby()->roots()->index() . DS . $src;
        if (file_exists($file)) {
            $publicPath = c::get('kirbymix.publicpath', 'assets');
            $path = preg_replace("/(\/{$publicPath}|{$publicPath})/i", '', $src);
            if (array_key_exists($path, $manifest)) {
                $src = $publicPath . $manifest[$path];
            }
        }

        return parent::tag($src, $async);
    }
}
