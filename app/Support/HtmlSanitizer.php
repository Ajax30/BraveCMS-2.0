<?php

namespace App\Support;

class HtmlSanitizer
{
    public static function clean($html)
    {
        if (!$html) return $html;

        // Remove scripts and styles
        $html = preg_replace('#<(script|style).*?>.*?</\\1>#is', '', $html);

        // Remove inline JS events (onerror, onclick, etc.)
        $html = preg_replace('/ on\w+="[^"]*"/i', '', $html);
        $html = preg_replace("/ on\w+='[^']*'/i", '', $html);

        // Remove javascript:
        $html = preg_replace('/javascript:/i', '', $html);

        // Allow only safe tags
        return strip_tags($html,
            '<p><br><b><strong><i><em><u><a><ul><ol><li><img><h1><h2><h3><h4><h5><h6><blockquote><code><pre>'
        );
    }
}