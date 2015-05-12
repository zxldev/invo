
{{ form("book/create", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("book", "返回","class":"btn btn-primary") }}</td>
        <td align="right">{{ submit_button("保存","class":"btn btn-primary") }}</td>
    </tr>
</table>

{{ content() }}

<div align="center">
    <h1>录入新书</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="book_types_id">图书分类</label>
        </td>
        <td align="left">
            {{ text_field("book_types_id", "type" : "numeric","class":"form-control") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="name">书名</label>
        </td>
        <td align="left">
            {{ text_field("name", "size" : 30,"class":"form-control") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="author">作者</label>
        </td>
        <td align="left">
            {{ text_field("author", "size" : 30,"class":"form-control") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="press">出版社</label>
        </td>
        <td align="left">
            {{ text_field("press", "size" : 30,"class":"form-control") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="price">定价</label>
        </td>
        <td align="left">
            {{ text_field("price", "type" : "numeric","class":"form-control") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="active">当前状态</label>
        </td>
        <td align="left">
                {{ text_field("active","class":"form-control") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="ext1">扩展1</label>
        </td>
        <td align="left">
            {{ text_field("ext1", "size" : 30,"class":"form-control") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="ext2">扩展2</label>
        </td>
        <td align="left">
            {{ text_field("ext2", "size" : 30,"class":"form-control") }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("保存","class":"btn btn-primary") }}</td>
    </tr>
</table>

</form>
