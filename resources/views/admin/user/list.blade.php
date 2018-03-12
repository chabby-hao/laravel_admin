@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <hr>

        <div class="row-fluid">
            <span class="pull-right"><a href="<?php echo \Illuminate\Support\Facades\URL::action('Admin\UserController@add'); ?>" class="btn btn-success">新增账号</a></span>
        </div>

        <div class="row-fluid margintop">
            <form class="form-search">
                <div class="control-group">
                    <div class="controls controls-row">
                        <div class="inline-block">
                            <label for="daterange">时间范围</label>
                            <input name="date_range" id="daterange" type="text"/>
                        </div>

                        <div class="inline-block">
                            <input class="btn btn-success" id="btn-search" type="submit" value="确定"/>
                        </div>

                    </div>
                </div>
            </form>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>列表</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>账号</th>
                                <th>账号类型</th>
                                <th>角色</th>
                                <th>email</th>
                                <th>创建时间</th>
                                <th>最后登录</th>
                                <th>最后IP</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php/** @var \App\Models\BiUser $user */?>
                            @foreach($users as $user)
                                <tr class="gradeX">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{\App\Models\BiUser::getUserTypeMap( $user->user_type)}}</td>
                                    <td>{{\App\Models\Role::getRoleNameMap($user->role_id)}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->login_at}}</td>
                                    <td>{{$user->last_ip}}</td>
                                    <td>
                                        <a href="{{\Illuminate\Support\Facades\URL::action('Admin\UserController@attachRole',['id'=>$user->id])}}" class="btn btn-warning">分配角色</a>
                                    </td>
                                    <!--                                        <td>-->
                                    <!--                                            <a href="" class="btn btn-info">设置</a>-->
                                    <!--<!--                                            <a href="javascript:;" class="btn btn-danger del">删除</a>-->
                                    <!--                                        </td>-->
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pager">
                        <?php echo $page_nav; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection