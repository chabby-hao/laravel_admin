<?php

namespace App\Exports;

use App\Models\BiXinpuDetect;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class XinpuDetectExport implements FromCollection, WithHeadings, WithMapping
{

    use Exportable;

    public $begin;
    public $end;

    public function __construct($begin, $end)
    {
        $this->begin = $begin;
        $this->end = $end;
    }

    public function collection()
    {
        return BiXinpuDetect::whereBetween('check_at', [$this->begin, $this->end])->get();
    }

    public function headings(): array
    {
        //return Schema::getColumnListing('bi_xinpu_detect');
        return [
            '设备号',
            '固件版本',
            'mcu版本',
            '锂电池通讯',
            '底板通讯',
            'GSM检测', '设备数据收发',
            'GPS定位',
            '电池电压检测',
            '总体检测',
        ];
    }

    /**
     * @param BiXinpuDetect $row
     * @return array
     */
    public function map($row): array
    {
        // TODO: Implement map() method.
        return [
            $row->imei,
            $row->rom,
            $row->mcu,
            $row->bat_conn ? '正常' : '异常',
            $row->net ? '正常' : '异常',
            $row->gsm_text . ($row->gsm ? '正常' : '异常'),
            $row->data_conn ? '正常' : '异常',
            $row->gps_text . ($row->gps ? '正常' : '异常'),
            $row->vol_text . ($row->vol ? '正常' : '异常'),
            $row->result ? '正常' : '异常',
        ];
    }
}