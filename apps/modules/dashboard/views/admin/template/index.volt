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
    {% if flashSession.has('notice')==true OR flashSession.has('success') %}
    {% for notif in flashSession.getMessages('success') %}

    <body onload="new PNotify({title: 'Sukses',text: '{{notif}}',type: 'success',styling: 'bootstrap3'});"></body>
    {% endfor %}
    {% for notif in flashSession.getMessages('notice') %}

    <body onload="new PNotify({title: 'Perhatian',text: '{{notif}}',type: 'info',styling: 'bootstrap3'});"></body>
    {% endfor %}
    {% endif %}
    {% if flashSession.has('warning')==true OR flashSession.has('error') %}
    {% for notif in flashSession.getMessages('warning') %}

    <body onload="new PNotify({title: 'Peringatan!!!',text: '{{notif}}',type: 'notice',styling: 'bootstrap3'});"></body>
    {% endfor %}
    {% for notif in flashSession.getMessages('error') %}
    {{notif}}

    <body onload="new PNotify({title: 'Waduh...',text: '{{notif}}',type: 'error',styling: 'bootstrap3'});"></body>
    {% endfor %}
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
            $('#dataTable').DataTable();
        });
    </script>
</body>

</html>