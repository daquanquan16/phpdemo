<?php
set_time_limit(0);
$arrData=[];
for($i=0;$i<=60000;$i++){
    $arrData[] = [
        'id' => $i+1,
        'name' => '用户'.($i+1)
    ];
}

$title = [
    [
        '编号', '用户'
    ],
];
$arrData = array_merge($title, $arrData);
$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

// 设置单元格格式 可以省略
$styleArray = [
    'font' => [
        'bold' => true,
        'size' => 14,
    ],
];
$spreadsheet->getActiveSheet()->getStyle('A1:B1')->applyFromArray($styleArray);
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(25);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(25);
$spreadsheet->getActiveSheet()->fromArray($arrData);
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
header('Content-Description: File Transfer');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=test.csv');
header('Cache-Control: max-age=0');
$writer->save('php://output');
$fp = fopen('php://output', 'a');//打开output流
mb_convert_variables('GBK', 'UTF-8', $columns);
fputcsv($fp, $columns);//将数据格式化为csv格式并写入到output流中

$dataNum = count( $arrData );
$perSize = 1000;//每次导出的条数
$pages = ceil($dataNum / $perSize);

for ($i = 1; $i <= $pages; $i++) {
    foreach ($arrData as $item) {
        mb_convert_variables('GBK', 'UTF-8', $item);
        fputcsv($fp, $item);
    }
    //刷新输出缓冲到浏览器
    ob_flush();
    flush();//必须同时使用 ob_flush() 和flush() 函数来刷新输出缓冲。
}
fclose($fp);
exit();
