<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>

    {% do assets
        .collection('header')
        .addCss('/vendor/bootstrap/dist/css/bootstrap.css')
        .addCss('/css/modern-business.css')
        .addCss('/vendor/font-awesome/css/font-awesome.css')
    %}

    {% do assets
        .collection('footer')
        .addJs('/vendor/jquery/dist/jquery.js')
        .addJs('/vendor/bootstrap/dist/js/bootstrap.js')
    %}

    {{ assets.outputCss('header') }}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

{% include('partials/nav') %}
{% if show_carousel is defined %}
    {% include('partials/carousel') %}
{% endif %}
<!-- Page Content -->
<div class="container">
    {{ content() }}
    <hr>
    {% include('partials/footer') %}
</div>
{{ assets.outputJs('footer') }}

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>

</body>

</html>
