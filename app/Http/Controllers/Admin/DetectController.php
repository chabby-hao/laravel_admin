<?php
/**
 * Created by PhpStorm.
 * User: chabby
 * Date: 2017/11/13
 * Time: 上午10:55
 */

namespace App\Http\Controllers\Admin;

use App\Libs\MyPage;
use App\Models\BiChannelSn;
use App\Models\TTestpostLogAll;
use Illuminate\Http\Request;

class DetectController extends BaseController
{

    /**
     * 工装检测列表
     */
    public function factoryTestList(Request $request)
    {

        $where = $request->input();
        foreach ($where as $key => $item){
            if($item === '' || $item === null){
                unset($where[$key]);
            }
        }
        unset($where['page']);

        $model = TTestpostLogAll::where($where);

        $userWhere = $this->getWhere();
        if($userWhere && $userWhere['channel_id']){
            $model->whereIn('mstsn', BiChannelSn::getSnsByChannelId($userWhere['channel_id']));
        }elseif (!$userWhere){
            //全部

        }else{
            $model->where('1','=','0');
        }

        $paginate = $model->orderByDesc('id')->paginate();
        $datas = $paginate->items();

        /** @var TTestpostLogAll $v */
        foreach ($datas as $k => $v) {
            $datas[$k] = $v->toArray();
            $arr = json_decode($v['json_data'], true);
            $datas[$k] = array_merge($datas[$k], $arr);
            foreach ($datas[$k] as $k2 => $v2) {
                if (isset($this->detectMap[$k2])) {
                    $datas[$k][$k2] = $this->detectMap[$k2][$v2];
                }
            }
        }

        return view('admin.detect.factorytestlist', [
            'datas' => $datas,
            'page_nav' => MyPage::showPageNav($paginate),
        ]);
    }

    private $detectMap = [
        'Ctype' => [
            0 => '安骑',
            1 => '闪骑',
            2 => '西游',
        ],
        'Btype' => [
            1 => '杭州安显（EB001）',
            2 => '高标（EB001?）',
            3 => '安显（EB001）：新协议、带一线通（GPS）输出',
            4 => '安显（EB001A）：新协议、带一线通（GPS）输出',
            5 => 'EB003：新思维一线通输入，标准安显一线通输入，输出一路一线通',
            6 => 'EB001B 闪骑/安骑',
            7 => 'EB001B西游'],
        'OWCin' => [0 => '异常', 1 => '正常', 2 => '不支持'],
        'OWCout' => [0 => '异常', 1 => '正常', 2 => '不支持'],
        'I2C' => [0 => '异常', 1 => '正常', 2 => '不支持'],
        'Lock' => [0 => '锁车', 1 => '解锁', 2 => '不支持'],
        'GPRSSt' => [0 => '异常', 1 => '正常', 2 => '不支持'],
        'GPSSt' => [0 => '异常', 1 => '正常', 2 => '不支持'],
        'BBCon' => [0 => '异常', 1 => '正常', 2 => '不支持'],
        'Online' => [0 => '离线', 1 => '正常', 2 => '不支持'],
        'SBStat' => [0 => '丢失', 1 => '接入', 2 => '不支持'],
        'Gsen' => [0 => '异常', 1 => '正常', 2 => '不支持'],
        'BTStat' => [0 => '未初始化', 1 => '等待检测', 2 => '重试检测', 3 => '正在检测中', 4 => '检测失败', 5 => '检测OK'],
        'PowGate' => [0 => '关闭', 1 => '开启'],


    ];

}