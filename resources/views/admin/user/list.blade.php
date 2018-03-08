@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <hr>

        <div class="widget-content noborder">
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
                     <span class="pull-right"><a href="<?php echo \Illuminate\Support\Facades\URL::action('Admin\UserController@add'); ?>" class="btn btn-success">新增账号</a></span>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>用户id</th>
                                <th>手机号</th>
                                <th>注册时间</th>
                                <th>余额</th>
                                <th>赠送金</th>
                                <!--                                    <th>操作</th>-->
                            </tr>
                            </thead>
                            <tbody>
                            <?php /** @var \App\Models\User $user */
                            foreach ($users as $user) { ?>
                            <tr class="gradeX">
                                <td><?php echo $user->id ?></td>
                                <td><?php echo $user->phone ?></td>
                                <td><?php echo $user->created_at ?></td>

                                <td><?php echo $user->user_balance ?></td>
                                <td><?php echo $user->present_balance ?></td>
                                <!--                                        <td>-->
                                <!--                                            <a href="" class="btn btn-info">设置</a>-->
                                <!--<!--                                            <a href="javascript:;" class="btn btn-danger del">删除</a>-->
                                <!--                                        </td>-->
                            </tr>
                            <?php } ?>
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