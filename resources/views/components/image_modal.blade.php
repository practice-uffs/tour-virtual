<script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script>
<style type="text/css">


    .container_img_modal a {
        text-decoration: none;
    }

    .image_modal {
        width: 100%;
        height: 100%;
        margin: 0 auto;
        display: none;
        position: fixed;
        z-index: 101;
        background: rgba(17, 17, 17, 0.74);
    }

    .container_img_modal {
        min-width: 600px;
        width: 600px;
        min-height: 150px;
        margin: 17vh auto;
        background-color: #d7d7d7;
        position: relative;
        z-index: 103;
        padding: 45px 30px 10px 30px;
        border-radius: 5px;
        -webkit-box-shadow: 0 0 4px 4px rgb(0 0 0 / 20%);
        -moz-box-shadow: 0 0 4px 4px rgba(0,0,0,0.2);
        box-shadow: 0 0 4px 4px rgb(0 0 0 / 20%);
    }

    .container_img_modal p {
        clear: both;
        color: #555555;
        /* text-align: justify; */
        font-size: 20px;
        font-family: sans-serif;
    }
    .container_img_modal img{
        width: 100%;
        height: auto;
        max-height: 55vh;
        margin-bottom: 1em;
        border-radius: 5px;

        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    .container_img_modal a {
        color: #3f3e3e;
        position: absolute;
        top: 0.5em;
        right: 0.5em;
        font-weight: bold;
        opacity: 1;
    }
    
</style>
<script type='text/javascript'>
    $(function () {
        $('.image_modal').hide();
        $('#close_image_modal').click(function () {
            $('.image_modal').hide();
            return false;
        });

    });
</script>
<div class='image_modal'>
    <div class='container_img_modal'>
        <img id="image_modal_img" src="" alt="">
        <a href='' id="close_image_modal" class='close'><i class="bi bi-x-lg"></i></a>
        <p id="image_modal_title" style="text-align: center"></p>
    </div>
</div>
<!-- partial -->

