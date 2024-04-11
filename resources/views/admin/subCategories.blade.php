@php
    $lang = LaravelLocalization::getCurrentLocale();
@endphp
@extends('layouts.adminapp')
@extends('includes.adminnavbar')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <style>
        .captcha {

            width: 100%;
            height: 50px
        }

        .captcha span {
            float: left;
            width: 60%;
        }

        .captcha span img {
            width: 100%;
            height: 80%;
        }

        .buttonload {
            text-align: center;
            width: 40px;
            height: 40px;
            margin-top: 5px;
            margin-left: 10px;
            display: inline-block;
            background-color: #00A7E0;
            border-radius: 50%;
            /* Green background */
            border: none;
            /* Remove borders */
            color: white;
            /* White text */
            /* padding: 12px 12px; */
            /* Some padding */
            font-size: 16px;
            /* Set a font-size */
        }

        /* Add a right margin to each icon */
        .fa {
            margin: auto
        }

        @media screen and (max-width:700px) {
            .captcha {
                width: 100%;
            }
        }
    </style>
    <style>
        * {
            box-sizing: border-box;
        }

        body {}

        .tablecontainer {
            background: white;
            width: 90%;
            margin: auto;
        }

        #myInput {
            background-image: url('/css/searchicon.png');
            background-size: 25px;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }

        #myTable {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
            font-size: 18px;
        }

        #myTable th,
        #myTable td {
            text-align: left;
            padding: 12px;
        }

        #myTable tr {
            border-bottom: 1px solid #ddd;
        }

        #myTable tr :first-child {
            width: 1%;
            background-color: #f1f1f1;
        }

        #myTable tr.header,
        #myTable tr:hover {
            background-color: #f1f1f1;
        }
    </style>
    <style>
        /* CSS */
        .button-9 {
            appearance: button;
            backface-visibility: hidden;
            background-color: #00A7E0;
            border-radius: 6px;
            border-width: 0;
            box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset, rgba(50, 50, 93, .1) 0 2px 5px 0, rgba(0, 0, 0, .07) 0 1px 1px 0;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            font-family: -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", Ubuntu, sans-serif;
            font-size: 100%;
            height: 44px;
            line-height: 1.15;
            margin: 12px 0 0;
            outline: none;
            overflow: hidden;
            padding: 0 25px;
            position: relative;
            text-align: center;
            text-transform: none;
            transform: translateZ(0);
            transition: all .2s, box-shadow .08s ease-in;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            /* width: 10%; */
        }

        .button-9:disabled {
            cursor: default;
        }

        .button-9:focus {
            box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset, rgba(50, 50, 93, .2) 0 6px 15px 0, rgba(0, 0, 0, .1) 0 2px 2px 0, rgba(50, 151, 211, .3) 0 0 0 4px;
        }

        .actbtn {
            text-align: center;
            padding: 0;
            width: 50px;
            background-size: 15px;
            background-repeat: no-repeat;
            background-position: center;
            appearance: button;
            backface-visibility: hidden;
            border-radius: 6px;
            border-width: 0;
            box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset, rgba(50, 50, 93, .1) 0 2px 5px 0, rgba(0, 0, 0, .07) 0 1px 1px 0;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            font-family: -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", Ubuntu, sans-serif;
            font-size: 100%;
            height: 44px;
            line-height: 1.15;
            margin: 12px 0 0;
            outline: none;
            overflow: hidden;
            padding: 0 25px;
            position: relative;
            text-align: center;
            text-transform: none;
            transform: translateZ(0);
            transition: all .2s, box-shadow .08s ease-in;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            /* width: 10%; */
        }

        .delbtn {
            background-image: url('/css/delete.png');
        }

        .editbtn {
            background-image: url('/css/edit.png');
        }

        .viewbtn {
            background-image: url('/css/view.png');
        }
    </style>
    @if (Session::has('success'))
        @include('includes.notifications.successProccess')
    @elseif(Session::has('failed'))
        @include('includes.notifications.failedProccess')
    @endif

    <div class="tablecontainer">
        <h2>{{__('lang.Sub Categories')}}</h2>

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="{{__('lang.Search for names')}}" title="Type in a name">

        <table id="myTable">
            <tr class="header">
                <td></td>
                <th>{{__('lang.ID')}}</th>
                <th>{{__('lang.Sub Category Name')}}</th>
                <th>{{__('lang.Category Name')}}</th>
                <td>{{__('lang.Actions')}}</td>
            </tr>
            @if ($subCategories != null)
                @php
                    $i = 1;
                @endphp
                @foreach ($subCategories as $subCategory)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>#{{ $subCategory['id'] }}</td>
                        <td>{{ $subCategory['' . $lang . '_name'] }}</td>
                        @php
                            $category = $subCategory['category_name'];
                        @endphp
                        @foreach ($category as $cat)
                            <td>{{ $cat['' . $lang . '_name'] }}</td>
                            <td>
                                <button class="actbtn delbtn" role="button"
                                    onclick="openDelForm({{ $subCategory['id'] }},'{{ $subCategory['' . $lang . '_name'] }}')"></button>
                                <button class="actbtn editbtn" role="button"
                                    onclick="openEditForm({{ $subCategory['id'] }},{{ $cat['id'] }},'{{ $subCategory['en_name'] }}','{{ $subCategory['ar_name'] }}')"></button>
                            </td>
                        @endforeach

                        @php
                            $i++;
                        @endphp

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">
                        <center style="width:100%;font-size: 20px">
                            <b>{{__('lang.There Is No Sub Categories')}}</b>
                        </center>
                    </td>
                </tr>
            @endif

        </table>

        <script>
            function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>


        <button class="button-9" role="button" onclick="openAddForm()">{{__('lang.Add Sub Category')}}</button>
    </div>
    <style>
        .box {
            background-color: black;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        p {
            font-size: 17px;
            align-items: center;
        }

        .box a {
            display: inline-block;
            background-color: #fff;
            padding: 15px;
            border-radius: 3px;
        }

        .modal {
            align-items: center;
            display: flex;
            justify-content: center;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;

            background: rgba(126, 175, 254, 0.7);
            transition: all 0.4s;
            visibility: hidden;
            opacity: 0;
        }

        .content {
            position: absolute;
            background: white;
            width: 400px;
            padding: 1em 2em;
            border-radius: 4px;
        }

        .modal:target {
            visibility: visible;
            opacity: 1;
        }

        .box-close {
            position: absolute;
            top: 0;
            right: 15px;
            color: #fe0606;
            text-decoration: none;
            font-size: 30px;
        }

        .actForm {
            padding: 30px;
        }

        .actForm input {
            width: 100%;
        }

        .actForm label {
            margin: 10px 0px;

        }
        select{
            width: 100%;
        }
    </style>

    <div id="add-sub-category-box" class="modal">
        <div class="content">
            <a href="#" class="box-close">
                ×
            </a>
            <form method="POST" action="{{ route('admin.subCategory.store') }}" class="actForm">
                @csrf
                <h2>{{__('lang.Add New Sub Category')}}</h2>
                <label for="en_name">{{__('lang.English Name')}}</label><br>
                <input type="text" name="en_name" id="en_name">
                @error('en_name')
                    <center>
                        <p style="color:red">{{ $message }}</p>
                    </center>
                @enderror

                <label for="ar_name">{{__('lang.Arabic Name')}}</label><br>
                <input type="text" name="ar_name" id="ar_name">
                @error('ar_name')
                    <center>
                        <p style="color:red">{{ $message }}</p>
                    </center>
                @enderror

                <label for="cat_id">{{__('lang.Select Category')}}</label><br>
                <select name="cat_id" id="cat_id">
                    @foreach ($allCategories as $Category)
                        <option value="{{ $Category['id'] }}">{{ $Category['' . $lang . '_name'] }}</option>
                    @endforeach
                </select>
                @error('cat_id')
                    <center>
                        <p style="color:red">{{ $message }}</p>
                    </center>
                @enderror

                <div class="captcha">
                    <span>{!! captcha_img() !!}</span>
                    <button type="button" class="btn btn-danger reload buttonload" id="reload1">
                        <i class="fa fa-refresh fa-spin"></i>
                    </button>
                </div>
                <input class="input" id="ipmgh-6" name="addCaptcha" placeholder="{{__('lang.Enter Captcha')}}">
                @error('addCaptcha')
                    <center>
                        <p style="color:red">{{ $message }}</p>
                    </center>
                @enderror
                <button class="button-9" role="button" onclick="">{{__('lang.Save Sub Category')}}</button>

            </form>

        </div>
    </div>

    <div id="edit-sub-category-box" class="modal">
        <div class="content">
            <a href="#" class="box-close">
                ×
            </a>
            <form method="POST" action="{{ route('admin.subCategory.edit') }}" class="actForm">
                @csrf
                <h2>{{__('lang.Edit Sub Category')}}</h2>
                <input type="hidden" name="id" id="edit_id">

                <label for="en_name">{{__('lang.English Name')}}</label><br>
                <input type="text" name="en_name" id="edit_en_name">
                @error('en_name')
                    <center>
                        <p style="color:red">{{ $message }}</p>
                    </center>
                @enderror

                <label for="ar_name">{{__('lang.Arabic Name')}}</label><br>
                <input type="text" name="ar_name" id="edit_ar_name">
                @error('ar_name')
                    <center>
                        <p style="color:red">{{ $message }}</p>
                    </center>
                @enderror

                <label for="cat_id">{{__('lang.Select Category')}}</label><br>
                <select name="cat_id" id="edit_cat_id">
                    @foreach ($allCategories as $Category)
                        <option value="{{ $Category['id'] }}">{{ $Category['' . $lang . '_name'] }}</option>
                    @endforeach
                </select>
                @error('cat_id')
                    <center>
                        <p style="color:red">{{ $message }}</p>
                    </center>
                @enderror

                <div class="captcha">
                    <span>{!! captcha_img() !!}</span>
                    <button type="button" class="btn btn-danger reload buttonload" id="reload2">
                        <i class="fa fa-refresh fa-spin"></i>
                    </button>
                </div>
                <input class="input" id="ipmgh-6" name="editCaptcha" placeholder="{{__('lang.Enter Captcha')}}">
                @error('editCaptcha')
                    <center>
                        <p style="color:red">{{ $message }}</p>
                    </center>
                @enderror

                <button class="button-9" role="button" onclick="">{{__('lang.Save Changes')}}</button>

            </form>

        </div>
    </div>

    <div id="del-sub-category-box" class="modal">
        <div class="content">
            <a href="#" class="box-close">
                ×
            </a>
            <form method="POST" action="{{ route('admin.subCategory.delete') }}" class="actForm">
                @csrf
                <h4 id="delHeader">{{__('lang.Are You Sure To Delete')}} </h4>
                <input type="hidden" name="id" id="del_id">
                <div class="captcha">
                    <span>{!! captcha_img() !!}</span>
                    <button type="button" class="btn btn-danger reload buttonload" id="reload3">
                        <i class="fa fa-refresh fa-spin"></i>
                    </button>
                </div>
                <input class="input" id="ipmgh-6" name="delCaptcha" placeholder="{{__('lang.Enter Captcha')}}">
                @error('delCaptcha')
                    <center>
                        <p style="color:red">{{ $message }}</p>
                    </center>
                @enderror

                <button class="button-9" role="button" onclick="">{{__('lang.Sure')}}</button>

            </form>

        </div>
    </div>

    <script>
        $('#reload1').click(function() {
            $.ajax({
                type: 'GET',
                url: "reloadCaptcha",
                success: function(data) {
                    $(".captcha span").html(data.captcha)
                }
            });
        });
        $('#reload2').click(function() {
            $.ajax({
                type: 'GET',
                url: "reloadCaptcha",
                success: function(data) {
                    $(".captcha span").html(data.captcha)
                }
            });
        });
        $('#reload3').click(function() {
            $.ajax({
                type: 'GET',
                url: "reloadCaptcha",
                success: function(data) {
                    $(".captcha span").html(data.captcha)
                }
            });
        });

        function openAddForm() {
            window.location.href = "#add-sub-category-box";
        }

        function openEditForm(id, cat, en_name, ar_name) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_cat_id').value = cat;
            document.getElementById('edit_en_name').value = en_name;
            document.getElementById('edit_ar_name').value = ar_name;
            window.location.href = "#edit-sub-category-box";
        }

        function openDelForm(id, name) {
            document.getElementById('del_id').value = id;
            document.getElementById('delHeader').innerHTML += name + " ?";
            window.location.href = "#del-sub-category-box";
        }
    </script>
@endsection
