{{ content() }}
{{ form("pre_borrow/save", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("pre_borrow", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

<div align="center">
    <h1>Edit pre_borrow</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="book_id">Book</label>
        </td>
        <td align="left">
            {{ text_field("book_id", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="userid">Userid</label>
        </td>
        <td align="left">
            {{ text_field("userid", "size" : 30) }}
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
