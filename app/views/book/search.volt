
<div class="container">
    <div class="row">
        <br/>
    </div>
    <div class="row">
        <div class="col-xs-1">
            {{ link_to("book/index", "返回","class":"btn btn-primary") }}
        </div>
        <div class="col-xs-10"><br/></div>
        <div class="col-xs-1">
            <?php if(in_array('BookAdmin',$this->session->get('auth')['userrole'])){ ?>
            {{ link_to("book/new", "录入新图书","class":"btn btn-primary") }}
            <?php }?>
        </div>
    </div>
    <div class="row">
        <br/>
    </div>
</div>
{{ content() }}



<table class="browse table table-striped table-bordered table-hover" align="center">
    <thead>
        <tr>
            <th>编号</th>
            <th>类型</th>
            <th>书名</th>
            <th>作者</th>
            <th>出版社</th>
            <th>定价</th>
            <th>是否可借</th>
            <th>借阅用户</th>
            <th colspan="4">操作</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for book in page.items %}
        <tr>
            <td>{{ book.id }}</td>
            <td>{{ book.book_types_id }}</td>
            <td>{{ book.name }}</td>
            <td>{{ book.author }}</td>
            <td>{{ book.press }}</td>
            <td>{{ book.price }}</td>
            <td>{{ book.active }}</td>
            <td>{% if  book.borrow %}{{  book.borrow.users.name }}{% endif %}</td>
            <td><div class="btn-group">{{link_to("book/delete/"~book.id, "预借","class":"btn btn-sm  btn-info")}}
            <?php if(in_array('BookAdmin',$this->session->get('auth')['userrole'])){ ?>

                    {{ link_to("book/edit/"~book.id, "修改","class":"btn  btn-sm btn-warning") }}
            {{ link_to("book/delete/"~book.id, "删除","class":"btn btn-sm  btn-danger") }}</div></td>
            <td>{% if  book.borrow %} {{ link_to("borrow/delete/"~book.id, "还书","class":"btn  btn-sm btn-primary") }}   {%else%}
                <form method="post" class="form-inline" action="/borrow/create">
                    <div class="form-group-sm">
                <input type="text" id="username{{ book.id }}" placeholder="选择借书人" name="userauto"  class="form-control col-sm-8"  autocomplete="true">
                  <input type="hidden" name="borrow_types_id" value="1">
                        <input type="hidden" name="book_id" value="{{ book.id }}">
                        <input type="hidden" name="userid" id="valueusername{{ book.id }}">
                        {{ submit_button("借出","class":"btn btn-primary btn-sm col-sm-3") }}
                        </div>
                </form>{% endif %}</td>
            <?php }?>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>






</table>
<ul class="pagination">
    <li>{{ link_to("book/search", "&laquo;") }}</li>
    <li>{{ link_to("book/search?page="~page.before, "上一页") }}</li>
    <li>{{ link_to("#", page.current~"/"~page.total_pages) }}</li>
    <li>{{ link_to("book/search?page="~page.next, "下一页") }}</li>
    <li>{{ link_to("book/search?page="~page.last, "&raquo;") }}</li>
</ul>

<script>
    $(function() {
        $.ajax({
            type: "GET",
            url: "/session/allusers",
            dataType: "json",
            success: function(data){
                $("input[name='userauto']").each(function (index,item) {
                    $(item).autocomplete({
                        lookup: data,
                        ajaxSettings:{
                            method: "GET",
                            dataType :'json'
                        },
                        onSelect: function (suggestion) {
                            $("#value"+this.id).val(suggestion.data);
                        }
                    });
                });
            }
        });







    });


</script>
