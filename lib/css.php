<?php

namespace Kirby\Kirbymix;

use C;

/**
 * Kirby Mix CSS Component
 *
 * @author  Marijn Roovers <marijn@mrfd.nl>
 * @license  MIT
 */
class CSS extends \Kirby\Component\CSS
{
    /**
     * Builds the html link tag for the given css file
     *
     * @param string $url
     * @param null|string $media
     * @return string
     */
    public function tag($url, $media = null)
    {
        if (is_array($url)) {
            $css = [];
            foreach ($url as $u) {
                $css[] = $this->tag($u, $media);
            }
            return implode(PHP_EOL, $css) . PHP_EOL;
        }

        $manifest_file = kirby()->roots()->index() . DS . c::get('kirbymix.manifest', 'assets/mix-manifest.json');
        $manifest = [];
        if (file_exists($manifest_file)) {
            $manifest = json_decode(file_get_contents($manifest_file, true), true);
        }

        $file = kirby()->roots()->index() . DS . $url;
        if (file_exists($file)) {
            $publicPath = c::get('kirbymix.publicpath', 'assets');
            $path = preg_replace("/(\/{$publicPath}|{$publicPath})/i", '', $path);
            if (array_key_exists($path, $manifest)) {
                $url = $publicPath . $manifest[$path];
            }
        }

        return parent::tag($url, $media);
    }
}
