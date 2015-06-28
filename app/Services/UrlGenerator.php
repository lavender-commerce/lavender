<?php
namespace App\Services;

use App\Theme;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteCollection;
use Illuminate\Routing\UrlGenerator as CoreUrlGenerator;

class UrlGenerator extends CoreUrlGenerator
{

    protected $theme;

    /**
     * Create a new URL Generator instance.
     *
     * @param  \Illuminate\Routing\RouteCollection $routes
     * @param  \Illuminate\Http\Request $request
     * @param Theme $theme
     */
    public function __construct(RouteCollection $routes, Request $request, Theme $theme)
    {
        $this->theme = $theme;

        parent::__construct($routes, $request);
    }

    /**
     * Generate a URL to an application asset.
     *
     * @param  string $path
     * @param  bool|null $secure
     * @return string
     */
    public function asset($path, $secure = null)
    {
        // add support for remote urls
        if(stristr($path, '//') !== false) return $path;

        $path = $this->fallback($path);

        return parent::asset($path, $secure);
    }

    /**
     * Find the asset based on theme fallbacks
     *  ex: theme "foo" inherits "bar" which inherits "default"
     *  first look in:          assets/foo/$path
     *  if not found look for:  assets/bar/$path
     *  finally check:          assets/default/$path
     *  else:                   $asset
     *
     * @param $asset
     * @return string
     */
    public function fallback($asset)
    {
        $asset_path = $asset;

        foreach($this->theme->fallbacks as $fallback){

            $asset_path = 'assets/' . $fallback . '/' . $asset;

            $file_path = public_path($asset_path);

            if(file_exists($file_path)) return $asset_path;

        }

        return $asset_path;
    }
}
