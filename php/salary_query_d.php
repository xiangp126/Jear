<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";

date_default_timezone_set('PRC'); // default Beijing time
$year = date('Y');
$month = date('m');
$day = date('d');
// calc last month
$month = $month - 1;
if ($month == '0') {
    $month = 12;
    $year = $year - 1; // get last year
}
?>

<script src="js/function.js" charset="utf-8"></script>
<div id="height_select_if_top"></div>
<div id='title_table'>查询个人工资年份月度曲线信息</div>
<table id='table_a'>
    <form action=salary_comp.php method=post name=salary_comp>
        <tr id='tr'>
            <td>员工编号</td>
            <td>年份</td>
            <td>操作部分</td>
        </tr>
        <tr>
            <td>
                <select name="id">
<?php
@require_once "conn.php";
// Find
$sql = "select id from personel order by id;";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)) {
    list($id) = $row;
?>
                    <option value="<?php echo $id; ?>"><?php echo $id; ?></option>
<?php
};
?>
                </select>
            </td>
            <td>
                <select name="year">
<?php
$index = 0;
while ($index <= 5) {
    $pYear = $year - $index;
    $index++;
?>
                    <option value="<?php echo $pYear; ?>"><?php echo $pYear; ?></option>
<?php
}
?>
                </select>
                <input type=hidden name=operation value=salary_comp>
            </td>
            <td>
                <input type=reset value=' 清 空 '> |
                <input type=submit value=' 查 询 ' onclick='return check_bonus(this.form)'>
            </td>
        </tr>
    </form>
</table>
<div id='hint'><span>%提示：</span>可以直接键盘敲快速定位</div>
<div id="height_select_if_top"></div>

<?php
@require_once "foot.php"
?>
