@extends('admin.layout')
@section('content')
    <iframe name="myiframe" id="myiframe" src="/map/index.html" width="100%" style="min-height: 300px" frameborder="0" scrolling="no">
        <p>你的浏览器不支持iframe标签</p>
    </iframe>

    <script>

        function changeFrameHeight(){
            var ifm= document.getElementById("myiframe");
            ifm.height=document.documentElement.clientHeight-80;
        }
        window.onresize=function(){ changeFrameHeight();}
        $(function(){changeFrameHeight();});

       /* var ifm= document.getElementById("myiframe");

        ifm.height=document.documentElement.clientHeight;
        console.log(document.documentElement.clientHeight);*/
        /*function reinitIframe() {
            var h = $("#content").css('height');
            $("#myiframe").height(h);
            console.log(h);
        }
        reinitIframe();*/

    </script>
@endsection