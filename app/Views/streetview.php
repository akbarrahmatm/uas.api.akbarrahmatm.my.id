<!DOCTYPE html>
<html>

<head>
    <title>setviewtostreetsideHTML</title>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <style type='text/css'>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: 'Segoe UI', Helvetica, Arial, Sans-Serif
        }

        div#prinoutPanel {
            width: 100%;
            min-height: 100vh !important;
        }
    </style>
</head>

<body>
    <div style="width: 100%; height: 100vh;">
        <iframe
            src="<?= $data['tampilan_jalan'] ?>"
            width="100%" height="100%" style="border:0;" allowfullscreen="true" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>


</body>

</html>