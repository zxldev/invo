
{{ content() }}

<div class="jumbotron">
    <h1>欢迎到BSITO</h1>
    <p>使用BSITO LIB来管理您的图书借阅。</p>
    <p>{{ link_to('register', '注册 &raquo;', 'class': 'btn btn-primary btn-large btn-success') }}</p>
</div>

<div class="row">
    <div class="col-md-4">
        <h2>预借</h2>
        <p>可以预定借阅已被借阅或者未被借阅的图书。</p>
    </div>
    <div class="col-md-4">
        <h2>转借</h2>
        <p>可以跳过向管理员还书，直接借阅给同事。</p>
    </div>
    <div class="col-md-4">
        <h2>我想看的</h2>
        <p>图书收藏列表。</p>
    </div>
</div>
