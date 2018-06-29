@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-search"></i> </span>
                        <h5>筛选查询</h5>
                    </div>
                    <div class="widget-content">
                        <form action="{{URL::action('Admin\BreakRuleController@list')}}" method="get" class="form-search">
                            <div class="control-group">
                                <div class="inline-block w10">
                                    <div class="inline-block">
                                        <label>车辆牌照:</label>
                                        <input class="w6" type="text" id="lpn" name="lpn" value="{{Request::input('lpn')}}" >
                                    </div>


                                    <input type="submit" class="btn btn-success search" value="查询">

                                </div>

                            </div>

                        </form>
                    </div>
                </div>

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>列表</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>IMEI</th>
                                <th>IMSI</th>
                                <th>入库时间</th>
                                <th>第一次通讯时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /** @var \App\Models\BiFile $data */ ?>

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
    <script>

        $(":file").filestyle();

    </script>
    @include('admin.common_submitjs')
@endsection

