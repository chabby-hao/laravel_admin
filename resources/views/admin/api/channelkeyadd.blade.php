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
                                <label class="control-label">cid:</label>
                                <div class="controls">
                                    <input name="channel_name" value="" type="text" class="span11"/>
                                    <span class="help-block">该参数为对外定义渠道名，例：dewin</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>渠道:</label>
                                <div class="controls">
                                    <select name="channel_id" class="span11">
                                        <option value="">请选择</option>
                                        @foreach(\App\Models\BiChannel::getChannelMap() as $id=> $name)
                                            <option value="{{$id}}">{{$name}}</option>
                                        @endforeach
                                    </select>
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

