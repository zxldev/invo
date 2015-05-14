<div class="container">
    <div class="row">
        <br/>
    </div>
    <div class="row">
        <div class="col-xs-11"><h1>搜索图书</h1></div>
        <div class="col-xs-1">
         <?php if(in_array('BookAdmin',$this->session->get('auth')['userrole'])){ ?>
             {{ link_to("book/new", "录入新图书","class":"btn btn-primary") }}
         <?php }?>
        </div>
    </div>
</div>
{{ content() }}
<form action="/book/search" method="post" class="form-horizontal">

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

    {{ submit_button("搜索","class":"btn btn-primary") }}
    </div>
</form>