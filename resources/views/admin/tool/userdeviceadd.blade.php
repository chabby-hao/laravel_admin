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
                                <label class="control-label"><span class="text-error">*</span>设备码 :</label>
                                <div class="controls">
                                    <input name="id" value="" type="text" class="span11"/>
                                    <span class="help-block">可输入：设备码/IMEI/IMSI/张飞ID/得威Id</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>手机号 :</label>
                                <div class="controls">
                                    <input name="phone" value="" type="text" class="span11"/>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>类型 :</label>
                                <div class="controls">
                                    <select name="owner">
                                        <option value="">请选择</option>
                                        @foreach(\App\Models\TUserDevice::getUserTypeMap() as $k=>$v)
                                            <option value="{{$k}}">{{$v}}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block text-danger">注：如果选择管理员并且设备已绑定管理员，则会替换掉原有的管理员</span>
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


    @include('admin.common_submitjs')
@endsection

