
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("borrow/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("borrow/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Book</th>
            <th>Borrow Of Types</th>
            <th>Userid</th>
            <th>Borrowtime</th>
            <th>Returntime</th>
            <th>Ext1</th>
            <th>Ext2</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for borrow in page.items %}
        <tr>
            <td>{{ borrow.id }}</td>
            <td>{{ borrow.book_id }}</td>
            <td>{{ borrow.borrow_types_id }}</td>
            <td>{{ borrow.userid }}</td>
            <td>{{ borrow.borrowtime }}</td>
            <td>{{ borrow.returntime }}</td>
            <td>{{ borrow.ext1 }}</td>
            <td>{{ borrow.ext2 }}</td>
            <td>{{ link_to("borrow/edit/"~borrow.id, "Edit") }}</td>
            <td>{{ link_to("borrow/delete/"~borrow.id, "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("borrow/search", "First") }}</td>
                        <td>{{ link_to("borrow/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("borrow/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("borrow/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
