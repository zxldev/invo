
{{ content() }}

<div align="right">
    {{ link_to("book/new", "Create book","class":"btn btn-primary") }}
</div>

{{ form("book/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search book</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="id">Id</label>
        </td>
        <td align="left">
            {{ text_field("id", "type" : "numeric","class":"form-control") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="book_types_id">Book Of Types</label>
        </td>
        <td align="left">
            {{ text_field("book_types_id", "type" : "numeric","class":"form-control") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="name">Name</label>
        </td>
        <td align="left">
            {{ text_field("name", "size" : 30,"class":"form-control") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="author">Author</label>
        </td>
        <td align="left">
            {{ text_field("author", "size" : 30,"class":"form-control") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="press">Press</label>
        </td>
        <td align="left">
            {{ text_field("press", "size" : 30,"class":"form-control") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="price">Price</label>
        </td>
        <td align="left">
            {{ text_field("price", "type" : "numeric","class":"form-control") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="active">Active</label>
        </td>
        <td align="left">
                {{ text_field("active","class":"form-control") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="ext1">Ext1</label>
        </td>
        <td align="left">
            {{ text_field("ext1", "size" : 30,"class":"form-control") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="ext2">Ext2</label>
        </td>
        <td align="left">
            {{ text_field("ext2", "size" : 30,"class":"form-control") }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Search","class":"btn btn-primary") }}</td>
    </tr>
</table>

</form>
