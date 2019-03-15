<?php
/**

 * excel表格导出

 * @param string $fileName 文件名称

 * @param array $headArr 表头名称

 * @param array $data 要导出的数据

 * @author static7  */

//function excelExport($fileName = '', $headArr = [], $data = []) {
//
//    $fileName .= "_" . date("Y_m_d",time()) . ".xls";
//
//    $objPHPExcel = new \PHPExcel();
//
//    $objPHPExcel->getProperties();
//
//    $key = ord("A"); // 设置表头
//
//    foreach ($headArr as $v) {
//
//        $colum = chr($key);
//
//        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);
//
//        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);
//
//        $key += 1;
//
//    }
//
//    $column = 2;
//
//    $objActSheet = $objPHPExcel->getActiveSheet();
//
//    foreach ($data as $key => $rows) { // 行写入
//
//        $span = ord("A");
//
//        foreach ($rows as $keyName => $value) { // 列写入
//
//            $objActSheet->setCellValue(chr($span) . $column, $value);
//
//            $span++;
//
//        }
//
//        $column++;
//
//    }
//
//    $fileName = iconv("utf-8", "gb2312", $fileName); // 重命名表
//
//    $objPHPExcel->setActiveSheetIndex(0); // 设置活动单指数到第一个表,所以Excel打开这是第一个表
//
//    header('Content-Type: application/vnd.ms-excel');
//
//    header("Content-Disposition: attachment;filename='$fileName'");
//
//    header('Cache-Control: max-age=0');
//
//    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//
//    $objWriter->save('php://output'); // 文件通过浏览器下载
//
//    exit();
//
//}
function dataExcel($expTitle, $expCellName, $expTableData)
{
    include '../extend/phpexcel_classes/PHPExcel.php';
    $xlsTitle = iconv('utf-8', 'gb2312', $expTitle); // 文件名称
    $fileName = $expTitle . date('_YmdHis'); // or $xlsTitle 文件名称可根据自己情况设定
    $cellNum = count($expCellName);
    $dataNum = count($expTableData);
    $objPHPExcel = new \PHPExcel();
    $cellName = array(
        'A',
        'B',
        'C',
        'D',
        'E',
        'F',
        'G',
        'H',
        'I',
        'J',
        'K',
        'L',
        'M',
        'N',
        'O',
        'P',
        'Q',
        'R',
        'S',
        'T',
        'U',
        'V',
        'W',
        'X',
        'Y',
        'Z',
        'AA',
        'AB',
        'AC',
        'AD',
        'AE',
        'AF',
        'AG',
        'AH',
        'AI',
        'AJ',
        'AK',
        'AL',
        'AM',
        'AN',
        'AO',
        'AP',
        'AQ',
        'AR',
        'AS',
        'AT',
        'AU',
        'AV',
        'AW',
        'AX',
        'AY',
        'AZ'
    );
    for ($i = 0; $i < $cellNum; $i ++) {
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i] . '2', $expCellName[$i][1]);
    }
    for ($i = 0; $i < $dataNum; $i ++) {
        for ($j = 0; $j < $cellNum; $j ++) {
            $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j] . ($i + 3), " " . $expTableData[$i][$expCellName[$j][0]]);
        }
    }
    $objPHPExcel->setActiveSheetIndex(0);
    header('pragma:public');
    header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsTitle . '.xls"');
    header("Content-Disposition:attachment;filename=$fileName.xls"); // attachment新窗口打印inline本窗口打印
    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
}
