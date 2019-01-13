<?php
include_once '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
class Office
{
 
    /**
     * 导出excel表
     * $data：要导出excel表的数据，接受一个二维数组
     * $name：excel表的表名
     * $head：excel表的表头，接受一个一维数组
     * $key：$data中对应表头的键的数组，接受一个一维数组
     * 备注：此函数缺点是，表头（对应列数）不能超过26；
     *循环不够灵活，一个单元格中不方便存放两个数据库字段的值
     */
    public function outdata($name='测试表', $data=[], $head=[], $keys=[])
    {
        $count = count($head);  //计算表头数量
 
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
 
        for ($i = 65; $i < $count + 65; $i++) {     //数字转字母从65开始，循环设置表头：
            $sheet->setCellValue(strtoupper(chr($i)) . '1', $head[$i - 65]);
        }
 
        /*--------------开始从数据库提取信息插入Excel表中------------------*/
 
 
        foreach ($data as $key => $item) {             //循环设置单元格：
            //$key+2,因为第一行是表头，所以写到表格时   从第二行开始写
 
            for ($i = 65; $i < $count + 65; $i++) {     //数字转字母从65开始：
                $sheet->setCellValue(strtoupper(chr($i)) . ($key + 2), $item[$keys[$i - 65]]);
                $spreadsheet->getActiveSheet()->getColumnDimension(strtoupper(chr($i)))->setWidth(20); //固定列宽
            }
 
        }
        //刷新输出缓冲到浏览器
        ob_flush();
        flush();//必须同时使用 ob_flush() 和flush() 函数来刷新输出缓冲。
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $name . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
 
        //删除清空：
        $spreadsheet->disconnectWorksheets();
        unset($spreadsheet);
        exit;
    }
    
    
    public function out(){
        
    }
}



$excel = new Office();

//设置表头：
$head = ['订单编号', '商品总数', '收货人', '联系电话', '收货地址'];

//数据中对应的字段，用于读取相应数据：
$keys = ['order_sn', 'num', 'consignee', 'phone', 'detail'];

$orders=[
    ['order_sn'=>'order_sn1', 'num'=>1, 'consignee'=>"consignee1", 'phone'=>"phone1", 'detail'=>"detail1"],
    ['order_sn'=>'order_sn2', 'num'=>1, 'consignee'=>"consignee1", 'phone'=>"phone1", 'detail'=>"detail12"],
    ['order_sn'=>'order_sn3', 'num'=>1, 'consignee'=>"consignee1", 'phone'=>"phone1", 'detail'=>"detail13"],
    ['order_sn'=>'order_sn4', 'num'=>1, 'consignee'=>"consignee1", 'phone'=>"phone1", 'detail'=>"detail14"],
    ['order_sn'=>'order_sn5', 'num'=>1, 'consignee'=>"consignee1", 'phone'=>"phone1", 'detail'=>"detail15"],
];

$excel->outdata('订单表', $orders, $head, $keys);



 
