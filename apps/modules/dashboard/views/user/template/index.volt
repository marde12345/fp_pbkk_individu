<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PBKK</title>

    {{ assets.outputCss('admin') }}
</head>

<body>

    {% if pnotify is defined %}
    {{pnotify}}
    {% endif %}

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3"></div>
    </a>
    <div id="wrapper">

        {{ partial('admin/template/sidebar') }}

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <div class="container-fluid">
                    {{ partial('admin/template/topbar') }}
                    {% if content is defined %}
                    {{ partial(content) }}
                    {% endif %}
                </div>
                <!-- End of Main Content -->

                {{ partial('admin/template/footer') }}

            </div>
            <!-- End of Content Wrapper -->
        </div>
    </div>

    {{ assets.outputJs('adminJs') }}

    <script>
        $(document).ready(function () {
            $('.ui-pnotify').remove();
        });
    </script>

</body>

</html>