@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <hr>

        {{--<div class="row-fluid">
            <span class="pull-right"><a href="<?php echo \Illuminate\Support\Facades\URL::action('Admin\UserController@add'); ?>" class="btn btn-success">新增账号</a></span>
        </div>--}}

        {{--<div class="row-fluid margintop">
            <form class="form-search">
                <div class="control-group">
                    <div class="inline-block w1">
                        <label for="">时间范围</label>
                        <div>
                            <input class="w10" type="text">
                        </div>
                    </div>

                </div>
            </form>
        </div>--}}

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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="gradeX">
                                    <td>1</td>
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