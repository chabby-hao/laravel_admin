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
                                <label class="control-label"><span class="text-error">*</span>文件类型 :</label>
                                <div class="controls">
                                    <select name="filetype" class="span11">
                                        @foreach(\App\Models\BiFile::getFileTypeMap() as $type => $name)
                                            <option value="{{$type}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                    {{--<span class="help-block">例：admin</span>--}}
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>文件 :</label>
                                <div class="controls">
                                    <input type="file" name="myfile"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">文件名 :</label>
                                <div class="controls">
                                    <input name="filename" value="" type="text" class="span11"/>
                                    <span class="help-block">如果不填文件名，则默认以上传文件来命名（不可重复）</span>
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

