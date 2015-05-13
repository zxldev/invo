
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
            <td>{{link_to("book/delete/"~book.id, "预借")}}
            <?php if(in_array('BookAdmin',$this->session->get('auth')['userrole'])){ ?>
            <td>{{ link_to("book/edit/"~book.id, "修改") }}</td>
            <td>{{ link_to("book/delete/"~book.id, "删除") }}</td>
            <td>{% if  book.borrow %} {{ link_to("borrow/delete/"~book.id, "还书") }}   {%else%}<input type="text" id="username{{ book.id }}" name="userauto" class="userauto"  autocomplete="true"> <input type="hidden" id="valueusername{{ book.id }}">  {{ link_to("borrow/new/"~book.id, "借出") }}{% endif %}</td>
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
        var countries = [
            { value: 'Andorra', data: 'AD' },
            // ...
            { value: 'Zimbabwe', data: 'ZZ' }
        ];

//        var countries = ["a","b","aa","啊"];


        $("input[name='userauto']").each(function (index,item) {
           $(item).autocomplete({
                lookup: countries,
                onSelect: function (suggestion) {
                    $("#value"+this.id).val(suggestion.data);
                    alert($("#value"+this.id).val())
                }
            });
        });


    });


</script>
