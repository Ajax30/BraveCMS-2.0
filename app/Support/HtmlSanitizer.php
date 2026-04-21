<?php

namespace App\Support;

class HtmlSanitizer
{
  private static $allowedTags = array('p', 'br', 'b', 'strong', 'i', 'em', 'u', 'a', 'ul', 'ol', 'li', 'img', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'blockquote', 'code', 'pre');

  private static $allowedAttributes = array(
    'a' => array('href', 'title'),
    'img' => array('src', 'alt', 'title')
  );

  public static function clean($html)
  {
    if (!is_string($html) || trim($html) === '') return $html;

    libxml_use_internal_errors(true);

    $dom = new \DOMDocument('1.0', 'UTF-8');
    $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    $nodes = $dom->getElementsByTagName('*');

    for ($i = $nodes->length - 1; $i >= 0; $i--) {

      $node = $nodes->item($i);

      if (!($node instanceof \DOMElement)) continue;

      $tag = strtolower($node->nodeName);

      if (!in_array($tag, self::$allowedTags, true)) {
        if ($node->parentNode) $node->parentNode->removeChild($node);
        continue;
      }

      self::cleanAttributes($node, $tag);
    }

    foreach (iterator_to_array($dom->childNodes) as $child) {
      if ($child->nodeType === XML_PI_NODE || $child->nodeType === XML_COMMENT_NODE) {
        $dom->removeChild($child);
      }
    }

    return $dom->saveHTML();
  }

  private static function cleanAttributes($node, $tag)
  {
    if (!$node->hasAttributes()) return;

    $allowed = isset(self::$allowedAttributes[$tag]) ? self::$allowedAttributes[$tag] : array();
    $remove = array();

    foreach ($node->attributes as $attr) {

      $name = strtolower($attr->nodeName);
      $value = $attr->nodeValue;

      if (!in_array($name, $allowed, true)) {
        $remove[] = $name;
        continue;
      }

      if (strpos($name, 'on') === 0) {
        $remove[] = $name;
        continue;
      }

      if (($name === 'href' || $name === 'src') && !self::isSafeUrl($value)) {
        $remove[] = $name;
      }
    }

    foreach ($remove as $a) $node->removeAttribute($a);
  }

  private static function isSafeUrl($url)
  {
    $url = html_entity_decode($url, ENT_QUOTES | ENT_HTML5);
    $url = strtolower(trim(preg_replace('/[\x00-\x20]+/', '', $url)));

    if ($url === '') return false;

    return !(
      strpos($url, 'javascript:') === 0 ||
      strpos($url, 'vbscript:') === 0 ||
      strpos($url, 'data:') === 0 ||
      strpos($url, 'file:') === 0 ||
      strpos($url, 'about:') === 0
    );
  }
}
