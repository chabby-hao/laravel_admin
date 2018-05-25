@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span8">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>{{\App\Logics\AuthLogic::getPermisName() }}</h5>
                    </div>
                    <div class="widget-content">
                        <form id="myform" enctype="multipart/form-data" method="post" class="form-horizontal">

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>文件 :</label>
                                <div class="controls">
                                    <input type="file" name="myfile"/>
                                    <span class="help-block">excel文件示例：<a href="{{asset('demo/imeis.xlsx')}}">点我下载</a></span>
                                </div>
                            </div>


                            <div class="form-actions">
                                <button type="button" id="mysubmit" class="btn btn-success">提交</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        $(":file").filestyle();

    </script>
    @include('admin.common_submitjs')
@endsection

