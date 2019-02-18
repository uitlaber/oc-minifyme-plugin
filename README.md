# oc-minifyme-plugin
OctoberCMS assets minify plugin
Just add code  

```
<link href="{{ [
    'assets/css/styles1.css',
    'assets/css/styles2.css',
     '@framework.extras.css',
]|minifyCss }}" rel="stylesheet">

<script src="{{ [
    '@jquery',
    '@framework',
    '@framework.extras.js',
    'assets/javascript/app.js'
]|minifyJs }}"></script>
