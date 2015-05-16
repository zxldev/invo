
{{ content() }}

<div class="page-header">
    <h2>联系我们</h2>
</div>

<p>请向我们提出您宝贵的意见。请尽可能的描述清楚您的问题以便我们向您提供更好的服务。</p>

{{ form('contact/send', 'role': 'form') }}
    <fieldset>
        <div class="form-group">
            {{ form.label('name') }}
            {{ form.render('name', ['class': 'form-control']) }}
        </div>
        <div class="form-group">
            {{ form.label('email') }}
            {{ form.render('email', ['class': 'form-control']) }}
        </div>
        <div class="form-group">
            {{ form.label('comments') }}
            {{ form.render('comments', ['class': 'form-control']) }}
        </div>
        <div class="form-group">
            {{ submit_button('发送', 'class': 'btn btn-primary btn-large') }}
        </div>
    </fieldset>
</form>
