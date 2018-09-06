
<html>
<head>
    <meta charset=UTF-8">
    <title>密码找回页面</title>
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
                        联想找回密码页面
                    </div>
                    <div class="panel-body">

                        <form action="/zhaohui" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="">邮箱</label>
                                <input class="form-control" type="text" name="email" id="">
                            </div>

                            <div class="form-group">
                                <input type="submit"  class="btn btn-success" value="找回">
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