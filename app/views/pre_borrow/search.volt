
{{ content() }}


<table class="browse" align="center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Book</th>
            <th>Userid</th>
            <th>Ext1</th>
            <th>Ext2</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for pre_borrow in page.items %}
        <tr>
            <td>{{ pre_borrow.id }}</td>
            <td>{{ pre_borrow.book_id }}</td>
            <td>{{ pre_borrow.userid }}</td>
            <td>{{ pre_borrow.ext1 }}</td>
            <td>{{ pre_borrow.ext2 }}</td>
            <td>{{ link_to("pre_borrow/edit/"~pre_borrow.id, "Edit") }}</td>
            <td>{{ link_to("pre_borrow/delete/"~pre_borrow.id, "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("pre_borrow/search", "First") }}</td>
                        <td>{{ link_to("pre_borrow/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("pre_borrow/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("pre_borrow/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
