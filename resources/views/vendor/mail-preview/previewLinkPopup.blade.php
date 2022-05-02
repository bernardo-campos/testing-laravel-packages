<div id="MailPreviewDriverBox" style="
    position:absolute;
    top:0;
    right: 0;
    z-index:99999;
    background:#fff;
    border:solid 1px #ccc;
    padding: 15px;
">
    ¡Se envió un correo electrónico!
    <ul>
        <li>
            <a target="_blank" style="text-decoration: underline" href="{{ $previewUrl }}&file_type=html">Abrir en el navegador</a>
        </li>
        <li>
            <a target="_blank" style="text-decoration: underline" href="{{ $previewUrl }}&file_type=eml">Abrir en un cliente de correo</a>
        </li>
    </ul>
</div>
<script type="text/javascript">
    setTimeout(function () {
        document.body.removeChild(document.getElementById('MailPreviewDriverBox'));
    }, {{ $timeoutInSeconds }} * 1000);
</script>
