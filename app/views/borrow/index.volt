
{{ content() }}

<div align="right">
    {{ link_to("borrow/new", "Create borrow") }}
</div>

{{ form("borrow/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search borrow</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="id">Id</label>
        </td>
        <td align="left">
            {{ text_field("id", "type" : "numeric") }}
        </td>
    </tr>
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
            <label for="borrow_types_id">Borrow Of Types</label>
        </td>
        <td align="left">
            {{ text_field("borrow_types_id", "type" : "numeric") }}
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
            <label for="borrowtime">Borrowtime</label>
        </td>
        <td align="left">
            {{ text_field("borrowtime", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="returntime">Returntime</label>
        </td>
        <td align="left">
            {{ text_field("returntime", "size" : 30) }}
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
        <td></td>
        <td>{{ submit_button("Search") }}</td>
    </tr>
</table>

</form>
