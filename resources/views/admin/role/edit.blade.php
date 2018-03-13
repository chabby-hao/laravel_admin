@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>{{\App\Logics\AuthLogic::getPermisName()}}</h5>
                    </div>
                    <div class="widget-content">
                        <form id="myform" action="<?php ?>" method="post" class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>角色名(英文) :</label>
                                <div class="controls">
                                    <input name="name" value="{{$role->name}}" type="text" class="span11"/>
                                    <span class="help-block">例：admin</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>角色展示名称(中文) :</label>
                                <div class="controls">
                                    <input name="display_name" value="{{$role->display_name}}" type="text" class="span11"/>
                                    <span class="help-block">例：管理员</span>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label"><span class="text-error">*</span>角色描述 :</label>
                                <div class="controls">
                                    <input name="description" value="{{$role->description}}" type="text" class="span11"/>
                                    <span class="help-block">例：拥有最大权限</span>
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

