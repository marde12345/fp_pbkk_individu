<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Toko</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <!-- <link rel="icon" href="assets/img/favicon.ico"> -->

    <!--=============================================
    =            CSS  files       =
    =============================================-->

    {{ assets.outputCss('dashboard') }}


</head>

<body>

    <!--====================  Header area ====================-->

    <div class="header-area header-sticky">

        {{ partial('dashboard/template/navtop')}}

        <!--====================  navigation menu ====================-->

        {{ partial('dashboard/template/navmenu')}}

        <!--====================  End of navigation menu  ====================-->
    </div>

    <!--====================  End of Header area  ====================-->


    <!--====================  breadcrumb area ====================-->

    {{ partial('dashboard/template/breadcrumb')}}

    <!--====================  End of breadcrumb area  ====================-->

    <!--==================== page content ====================-->

    <!-- <div class="page-section pb-40">
        <div class="container"> -->
            {% if content is defined %}
            {{ partial(content) }}
            {% endif %}
        <!-- </div>
    </div> -->

    <!--====================  End of page content  ====================-->


    <!--====================  footer area ====================-->




    <!--=============================================
    =            JS files        =
    =============================================-->

    {{ assets.outputJs('dashboardJs') }}

    <!--=====  End of JS files ======-->

</body>

</html>