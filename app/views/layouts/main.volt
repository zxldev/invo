<div class="wapper">
<nav class="navbar navbar-default navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">BSITO</a>
        </div>
        {{ elements.getMenu() }}
    </div>
</nav>

<div class="container ">
    {{ flash.output() }}
    {{ content() }}


</div>
</div>
<footer class="panel-footer">
    <p class="text-center">&copy; Company 2015</p>
</footer>