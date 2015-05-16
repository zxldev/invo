<div class="container">
    <div class="row">
        <br/>
    </div>
    <div class="row">
        <div class="col-xs-1">{{ link_to("book", "返回","class":"btn btn-primary") }}</div>
        <div class="col-xs-10"><h1>录入新书</h1></div>
        <div class="col-xs-1"> {{ submit_button("保存","class":"btn btn-primary") }}</div>
    </div>
</div>
{{ content() }}
<form action="/book/create" method="post" class="form-horizontal">

    <div class="form-group">
        <label for="book_types_id" class="col-sm-3 control-label">图书分类</label>

        <div class="col-sm-6">
            {{ text_field("book_types_id", "type" : "numeric","class":"form-control") }}
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-3 control-label">书名</label>

        <div class="col-sm-6">
            {{ text_field("name", "size" : 30,"class":"form-control") }}
        </div>
    </div>
    <div class="form-group">
        <label for="author" class="col-sm-3 control-label">作者</label>

        <div class="col-sm-6">
            {{ text_field("author", "size" : 30,"class":"form-control") }}
        </div>
    </div>
    <div class="form-group">
        <label for="press" class="col-sm-3 control-label">出版社</label>

        <div class="col-sm-6">
            {{ text_field("press", "size" : 30,"class":"form-control") }}
        </div>
    </div>
    <div class="form-group">
        <label for="price" class="col-sm-3 control-label">定价</label>

        <div class="col-sm-6">
            {{ text_field("price", "type" : "numeric","class":"form-control") }}
        </div>
    </div>
    <div class="form-group">
        <label for="active" class="col-sm-3 control-label">当前状态</label>

        <div class="col-sm-6">
            {{ text_field("active","class":"form-control") }}
        </div>
    </div>
    <div class="form-group" class="col-sm-3 control-label">
        <label for="ext1" class="col-sm-3 control-label">扩展1</label>

        <div class="col-sm-6">
            {{ text_field("ext1", "size" : 30,"class":"form-control") }}
        </div>
    </div>
    <div class="form-group" class="col-sm-3 control-label">
        <label for="ext2" class="col-sm-3 control-label">扩展2</label>

        <div class="col-sm-6">
            {{ text_field("ext2", "size" : 30,"class":"form-control") }}
        </div>
    </div>
    <div class="form-group" class="col-sm-3 control-label">
        <label for="ext2" class="col-sm-3 control-label">条形码</label>

        <div class="col-sm-6">
            {{ text_field("barcode", "size" : 45,"class":"form-control") }}
        </div>
    </div>
    <div class="form-group" class="col-sm-3 control-label">
        <label for="ext2" class="col-sm-3 control-label">CIP</label>

        <div class="col-sm-6">
            {{ text_field("cip", "size" : 2000,"class":"form-control") }}
        </div>
    </div>
    <div class="form-group" class="col-sm-3 control-label">
        <label for="ext2" class="col-sm-3 control-label">简介</label>

        <div class="col-sm-6">
            {{ text_field("introduction", "size" : 45,"class":"form-control") }}
        </div>
    </div>
    <div class="form-group" class="col-sm-3 control-label">
        <label for="ext2" class="col-sm-3 control-label">封面</label>

        <div class="col-sm-6">
            {{ text_field("picurl", "size" : 45,"class":"form-control") }}
        </div>
    </div>

    <div class="form-group" class="col-sm-3 control-label">
        <label for="ext2" class="col-sm-3 control-label">入库时间</label>

        <div class="col-sm-6">
            {{ text_field("intime", "size" : 45,"class":"form-control") }}
        </div>
    </div>
    <div class="form-group" class="col-sm-3 control-label">
        <label for="ext2" class="col-sm-3 control-label">书架编号</label>

        <div class="col-sm-6">
            {{ text_field("bookshellno", "size" : 45,"class":"form-control") }}
        </div>
    </div>
    {{ submit_button("保存","class":"btn btn-primary") }}
    </div>
</form>







