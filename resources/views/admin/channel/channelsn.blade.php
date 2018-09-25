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
                        <form id="myform" method="post" class="form-horizontal">

                            <div class="control-group">
                                <label class="control-label">已绑定工装号:</label>
                                <div class="controls">
                                    @foreach($rs as $row)
                                        <span class="text-info">{{$row->sn}}</span><br/>
                                    @endforeach
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label">工装号:</label>
                                <div class="controls">
                                    <input name="sn" value="" type="text" class="span11"/>
                                    <span class="help-block">例：60019443AFB1</span>
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


    </script>
    @include('admin.common_submitjs')
@endsection

