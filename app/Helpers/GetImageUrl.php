<?php
namespace App\Helpers;

class GetImageUrl
{
    /**
     * Get the URL for an image
     *
     * @param string $path The relative path of the image
     * @param string|null $size The size of the image (thumbnail, medium, large, etc.)
     * @param bool $absolute Whether to return an absolute URL
     * @return string The URL of the image
     */
    public static function get($path, $size = null, $absolute = false)
    {
        if (empty($path)) {
            return asset('images/placeholder.jpg');
        }
        
        // Check if the path is already a full URL
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        }
        
        // Add size suffix if needed
        if ($size) {
            $pathInfo = pathinfo($path);
            $path = $pathInfo['dirname'] . '/' . $pathInfo['filename'] . '-' . $size . '.' . ($pathInfo['extension'] ?? 'jpg');
        }
        
        // Ensure the path starts with the correct directory
        if (!str_starts_with($path, 'images/')) {
            $path = 'images/' . ltrim($path, '/');
        }
        
        return $absolute ? asset($path) : '/' . $path;
    }
}

