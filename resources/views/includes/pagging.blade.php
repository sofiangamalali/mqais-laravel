<style>
    .pagingcontainer{
        padding: 20px;
        width: 100%;
        text-align: center;
    }
    .pagination {
        display: inline-block;
        margin: auto;
        width: auto;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        border: 1px solid #ddd;
    }

    .pagination a.active {
        background-color: #00A7E0;
        color: white;
        border: 1px solid #00A7E0;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }

    .pagination a:first-child {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .pagination a:last-child {
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }
</style>

<div class="pagingcontainer">
    <div class="pagination">
        <a href="javascript: prevPage();">&laquo;</a>
        <a id="page1" href="javascript: page(1);">1</a>
        <a id="page2" href="javascript: page(2);">2</a>
        <a id="page3" href="javascript: page(3);">3</a>
        <a id="page4" href="javascript: page(4);">4</a>
        <a href="javascript: nextPage();">&raquo;</a>
    </div>
</div>


<script>
    var current = 1;

    document.getElementById("page"+current).classList.add("active");
    function page(i){
        document.getElementById("page"+current).classList.remove("active");
        current=i;
        document.getElementById("page"+current).classList.add("active");
    }
    function nextPage(){
        document.getElementById("page"+current).classList.remove("active");
        current++;
        document.getElementById("page"+current).classList.add("active");
    }
    function prevPage(){
        document.getElementById("page"+current).classList.remove("active");
        current--;
        document.getElementById("page"+current).classList.add("active");
    }
</script>