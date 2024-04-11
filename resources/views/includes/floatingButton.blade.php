<style>
    .whatsapp-fab {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 60px;
        height: 60px;
        
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25);
        z-index: 9999;
        transition: transform 0.3s;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.483);

    }

    .whatsapp-fab:hover {
        transform: scale(1.1);
    }

    .whatsapp-fab img {
        width: 40px;
        height: 40px;
    }
</style>
<a href="https://wa.me/1234567890" class="whatsapp-fab" target="_blank">
    <img src="{{URL::asset("images/whatsapp.png")}}" alt="WhatsApp Icon">
</a>
