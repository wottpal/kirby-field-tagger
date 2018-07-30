# Kirby Field-Tagger

![MIT](https://img.shields.io/badge/Kirby-3-green.svg)
[![MIT](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/wottpal/kirby-anchor-headings/master/LICENSE)


Some shortcuts and syntactic sugar to work with fields and HTML-tags in Kirby 3.


## Usage

Just put it in your `/site/plugins` folder or install it as a git submodule. Then you can use one of the following methods:


#### tag(..)
`tag($name = "", $attr = [], $kt = false)`

This function wraps the HTML tag with the given name and attributes around the field-content.

If the field is empty nothing is returned. This is different to the default behavior (in `Kirby\Toolkit\Html::tag`) and makes it possible to write more DRY code, for example:

```php
<?php if($page->field()->isNotEmpty()): ?>
<h2><?= $page->field() ?></h2>
<?php endif ?>

<!-- becomes... -->

<?= $page->field()->tag('h2') ?>
```

Some may say this makes code less readable so be careful and don't overuse it.


#### kirbytextTag(..)
`kirbytextTag($name = "", $attr = [])` or `ktTag(..)`

This function executes `kirbytext()` on the given field before it wraps it into the given tag. 


#### kirbytextRaw()
`kirbytextRaw()` or `ktr()`

Like [the Kirby 2 plugin](https://github.com/jbeyerstedt/kirby-plugin-kirbytextRaw) by @jbeyerstedt this function is designed to strip the outer `<p> ... </p>` tags the built-in `kirbytext` function always generates.


#### kirbytextRawTag(..)
`kirbytextRawTag($name = "", $attr = [])` or `ktrTag(..)`

This function executes `kirbytextRaw()` on the given field before it wraps it into the given tag.
