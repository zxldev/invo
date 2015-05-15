<p>
    <h2>借阅列表</h2>
</p>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>书名</td>
            <td>借阅时间</td>
            <td>作者</td>
            <td>出版社</td>
            <td>定价</td>

        </tr>
    </thead>
    <tbody>



    {% if borrows is defined %}
    {% for borrow in borrows %}
    <tr>
        <td>{{ borrow.book.name }}</td>
        <td>{{ borrow.borrowtime }}</td>
        <td>{{ borrow.book.author }}</td>
        <td>{{ borrow.book.press }}</td>
        <td><span class="label label-success">{{ borrow.book.price }}</span></td>


    </tr>
    {% endfor %}
    {% endif %}





    </tbody>
</table>

