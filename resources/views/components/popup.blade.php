<script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script>
<style type="text/css">
    #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #000;
        z-index: 100;
        display: none;
    }

    .cnt223 a {
        text-decoration: none;
    }

    .popup {
        width: 100%;
        height: 100%;
        margin: 0 auto;
        display: none;
        position: fixed;
        z-index: 101;
    }

    .cnt223 {
        min-width: 600px;
        width: 600px;
        min-height: 150px;
        margin: 100px auto;
        background: #f3f3f3;
        position: relative;
        z-index: 103;
        padding: 35px 35px;
        border-radius: 5px;
        -webkit-box-shadow: 0px 0px 4px 4px rgb(0 0 0 / 20%);
        -moz-box-shadow: 0px 0px 4px 4px rgba(0, 0, 0, 0.2);
        box-shadow: 0px 0px 4px 4px rgb(0 0 0 / 20%);
    }

    .cnt223 p {
        clear: both;
        color: #555555;
        /* text-align: justify; */
        font-size: 20px;
        font-family: sans-serif;
    }

    .cnt223 p a {
        color: #4b695d;
        font-weight: bold;
        opacity: 1;
    }

    .cnt223 .x {
        float: right;
        height: 35px;
        left: 22px;
        position: relative;
        top: -25px;
        width: 34px;
    }

    .cnt223 .x:hover {
        cursor: pointer;
    }
</style>
<script type='text/javascript'>
    $(function () {
        var overlay = $('<div id="overlay"></div>');
        overlay.show();
        overlay.appendTo(document.body);
        $('.popup').show();
        $('.close').click(function () {
            $('.popup').hide();
            overlay.appendTo(document.body).remove();
            return false;
        });
        $('.x').click(function () {
            $('.popup').hide();
            overlay.appendTo(document.body).remove();
            return false;
        });
    });
</script>
<div class='popup'>
    <div class='cnt223'>
        <h2>Em desenvolvimento...</h2>
        <p>
            Pode ser que algumas informações ou funcionalidades ainda não estejam disponiveis.
            <br>
            <br>

            <a href='' class='close'>Continuar</a>
        </p>
    </div>
</div>
<!-- partial -->