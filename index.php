<?php

use Kirby\Toolkit\Html as Html;


Kirby::plugin('wottpal/field-tagger', [

  'fieldMethods' => [

    'tag' => function($field, $name = "", $attr = [], $kt = false) {
      if ($field->isEmpty()) return '';
      if ($name == '') return $field;

      $html = '<' . $name;
      $attr = Html::attr($attr);

      if (empty($attr) === false) {
        $html .= ' ' . $attr;
      }

      $content = $field;
      if ($kt === true) $content = $content->kt();
      if ($kt === 'raw') $content = $content->ktr();

      $content = Html::encode($content, false);

      if ($kt !== false) $content = Html::decode($content);

      $html .= '>' . $content . '</' . $name . '>';
      return $html;
    },

    'kirbytextTag' => function($field, $name = "", $attr = []) {
      return $field->tag($name, $attr, true);
    },

    'ktTag' => function($field, $name = "", $attr = []) {
      return $field->kirbytextTag($name, $attr);
    },

    'kirbytextRawTag' => function($field, $name = "", $attr = []) {
      return $field->tag($name, $attr, 'raw');
    },

    'ktrTag' => function($field, $name = "", $attr = []) {
      return $field->kirbytextRawTag($name, $attr);
    },

    /**
     * V2: https://github.com/jbeyerstedt/kirby-plugin-kirbytextRaw/blob/44a6877a4dbfbcfd4a52776418fe5c61e7bc4d24/kirbytextraw.php#L15
     */
    'kirbytextRaw' => function($field) {
      $content = $field->kt();

      if ('<p>' === str::substr($content, 0, 3) && '</p>' === str::substr($content, -4)) {
          $content = str::substr($content, 3, -4);
      }

      return $content;
    },

    'ktr' => function($field) {
      return $field->kirbytextRaw();
    },

  ],

]);
