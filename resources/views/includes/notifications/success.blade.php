<style>
    .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        opacity: 1;
        transition: opacity 0.6s;
        margin-bottom: 15px;
        width:50%;
        margin: auto;
    }

    .alert.success {
        background-color: #04AA6D;
    }

    

    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
    @media screen and (max-width:700px){
        .alert{
            width:100%;
            padding: 20px;

        }
    }
</style>

<div class="alert success">
    <span class="closebtn">&times;</span>
    <strong>{{__('lang.Success')}}</strong> {{__('lang.SuccessMsg')}}
</div>
<script>
    var close = document.getElementsByClassName("closebtn");
    var i;

    for (i = 0; i < close.length; i++) {
        close[i].onclick = function() {
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function() {
                div.style.display = "none";
            }, 600);
        }
    }
</script>



</html>
