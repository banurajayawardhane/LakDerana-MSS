<head>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.chkbx').click(function(){
            var text= "";
            $('.chkbx:checked').each(function(){
                text+=$(this).val()+ ',';
            });
            text=text.substring(0,text.lenght-1);
            $('.selectedtext').val(text);
            var count = $("[type='checkbox']:checked").lenght;
            $('.count').val($("[type='checkbox']:checked").lenght);

        });

    });
</script>
</head>

<body>
<input type="checkbox" value="1001"class="chkbx">1001
                <input type="checkbox" value="1002"class="chkbx">1002
                <input type="checkbox" value="1003"class="chkbx">1003
                <input type="checkbox" value="1004"class="chkbx">1004
                <textarea type="text" id="selectedtext"class="selectedtext"></textarea>
                <input type="text" id="count"class="count">
</body>