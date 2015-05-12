{{ content() }}
{{ form("book/save", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("book", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

<div align="center">
    <h1>Edit book</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="book_types_id">Book Of Types</label>
        </td>
        <td align="left">
            {{ text_field("book_types_id", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="name">Name</label>
        </td>
        <td align="left">
            {{ text_field("name", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="author">Author</label>
        </td>
        <td align="left">
            {{ text_field("author", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="press">Press</label>
        </td>
        <td align="left">
            {{ text_field("press", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="price">Price</label>
        </td>
        <td align="left">
            {{ text_field("price", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="active">Active</label>
        </td>
        <td align="left">
                {{ text_field("active""size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="ext1">Ext1</label>
        </td>
        <td align="left">
            {{ text_field("ext1", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="ext2">Ext2</label>
        </td>
        <td align="left">
            {{ text_field("ext2", "size" : 30) }}
        </td>
    </tr>

    <tr>
        <td>{{ hidden_field("id") }}</td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
