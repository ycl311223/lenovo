
<html>
<head>
    <meta charset=UTF-8">
    <title>登录页面</title>
    <link rel="stylesheet" href="/style/admin/public/bs/css/bootstrap.css">
    <script src="/style/admin/public/bs/js/jquery.min.js"></script>
    <script src="/style/admin/public/bs/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        联想登录页面
                    </div>
                    <div class="panel-body">
                        @if(isset($error))
                        <div class="alert alert-danger">{{$error}}</div>
                        @endif
                        <form action="/check" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="">邮箱</label>
                                <input class="form-control" type="text" name="email" id="">
                            </div>
                            <div class="form-group">
                                <label for="">密码</label>
                                <input class="form-control" type="password" name="pass" id="">
                            </div>
                            <div class="form-group">
                                <a href="/zhaohui">找回密码</a>
                            </div>

                            <div class="form-group">
                                <input type="submit"  class="btn btn-success" value="登录">
                                <input type="reset" class="btn btn-danger" value="重置">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>