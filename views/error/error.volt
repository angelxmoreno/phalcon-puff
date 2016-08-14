<div class="row">
    <div class="col-lg-12">
        <div class="jumbotron">
            <h1>
                <span class="error-{{ status_code }}">
                    Error Code {{ status_code }}
                </span>
            </h1>
            {% if is_dev %}
                <p>{{ error.message() }}</p>
                {% if error.isException()  %}
                    <br>in {{ error.file() }} on line {{ error.line() }} <br>
                    <pre>{{ error.exception().getTraceAsString() }}</pre>
                {% endif %}
            {% endif %}
        </div>
    </div>
</div>
