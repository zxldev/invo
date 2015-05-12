
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("book/index", "Go Back","class":"btn btn-primary") }}
        </td>
        <td align="right">
            {{ link_to("book/new", "Create ","class":"btn btn-primary") }}
        </td>
    </tr>
</table>

<table class="browse table table-striped table-bordered table-hover" align="center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Book Of Types</th>
            <th>Name</th>
            <th>Author</th>
            <th>Press</th>
            <th>Price</th>
            <th>Active</th>
            <th>Ext1</th>
            <th>Ext2</th>
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
            <td>{{ book.ext1 }}</td>
            <td>{{ book.ext2 }}</td>
            <td>{{ link_to("book/edit/"~book.id, "Edit") }}</td>
            <td>{{ link_to("book/delete/"~book.id, "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("book/search", "First") }}</td>
                        <td>{{ link_to("book/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("book/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("book/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
