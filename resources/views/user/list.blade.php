<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>列表</title>
        <script src="/js/jquery-3.2.1.min.js"></script>
        <script src="/js/layer/layer.js"></script>
    </head>
    <body>
    <table>
        <tr>
            <td>ID</td>
            <td>用户名</td>
            <td>密码</td>
            <td>操作</td>
        </tr>
        @foreach($user as $v)
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->username}}</td>
            <td>{{$v->password}}</td>
            <td><a href="/user/edit/{{$v->id}}">修改</a>|<a href="javascript:;" onclick="del_member(this,{{$v->id}})">删除</a></td>
        </tr>
        @endforeach
    </table>
    <style>
        table,tr,td{
            border:1px solid black;
        }
    </style>

    <script>
        //删除选中用户
        function del_member(obj,id){
            layer.confirm('您是确认要删除吗？', {
                btn: ['确认','再想想'] //按钮
            }, function(){
                $.get('/user/del/'+id,function(data){
                    console.log(data);
                    //如果删除成功
                    if(data.status == 0){
                        $(obj).parents('tr').remove();
                        layer.msg(data.message,{icon:6});    //data.message='删除成功/失败'
                    }else{
                        layer.msg(data.message,{icon:5});
                    }
                })

                //layer.msg('的确很重要', {icon: 1});
            }, function(){

            });
        }
    </script>
    </body>
</html>