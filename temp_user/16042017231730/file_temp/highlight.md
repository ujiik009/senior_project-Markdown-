# How to use [highlight.js](https://highlightjs.org/usage/)
### {? Getting Started ?}(red)

The bare minimum for using highlight.js on a web page is linking to the library along with one of the styles and calling [initHighlightingOnLoad:](http://highlightjs.readthedocs.io/en/latest/api.html#inithighlightingonload)



<a href="http://highlightjs.readthedocs.io/en/latest/api.html#inithighlightingonload">
initHighlightingOnLoad
</a>



```js
< link rel="stylesheet" href="/path/to/styles/default.css"/>
< script src="/path/to/highlight.pack.js">< /script>
< script> hljs.initHighlightingOnLoad();< /script>
```



This will find and highlight code inside of < pre>< code> tags; it tries to detect the language automatically. If automatic detection doesn’t work for you, you can specify the language in the `class` attribute:


```html
< pre>< code class="html">...< /code>< /pre>

```

The list of supported language classes is available in the class [reference.](http://highlightjs.readthedocs.io/en/latest/css-classes-reference.html) Classes can also be prefixed with either `language-` or `lang-`.


To disable highlighting altogether use the `nohighlight` class:

```html
< pre>< code class="nohighlight">...< /code>< /pre>
```


### Custom Initialization

