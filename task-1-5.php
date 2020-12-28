<?php 

/**
 * Render Array.
 * 
 * PHP Version 7
 * 
 * @category   PHP
 * @package    CEDCOSS
 * @subpackage Array_Render
 * @author     Shashikant Bharti <surya.indian321@gmail.com>
 * @license    https://cedcoss.com/ <CEDCOSS 2020>
 * @link       http://127.0.0.1/training/task-3/task-1-5.php
 */

$array = array(
            "student"=>array(
                "name"=>array(
                    "first name"=>"John",
                    "last name"=>"Peter",
                ),
            ),
            "courses"=>array(
                "name"=>"BE",
                "subjects"=>array(
                    "physics"=>array(
                        "practicals"=>array(
                            "week1"=>array(
                                "day1"=>"mon",
                                "day2"=>"tue"
                            ),
                            "duration"=>"2 hours"
                        )
                    )
                )
            )
        );

echo "<h1>Task - 1</h1>";
echo "<h3> 1. Create a class name RenderArray and function printArray 
        and echo an associative array of nth level.</h3>";
echo "<p>Student's First Name : 
        <strong>{$array['student']['name']['first name']}</strong>
    </p>";
echo "<p>Student's Last Name : 
        <strong>{$array['student']['name']['last name']}</strong>
    </p>";
echo "<p>Student's Course : 
        <strong>{$array['courses']['name']}</strong>
    </p>";
echo "<p>Physics Practical Day 1 : 
        <strong>
            {$array['courses']['subjects']['physics']['practicals']['week1']['day1']}
        </strong>
    </p>";
echo "<p>Physics Practical Duration : 
        <strong>
            {$array['courses']['subjects']['physics']['practicals']['duration']}
        </strong>
    </p>";

echo "<h1>Task - 2</h1>";
echo '<h3> 2. Create function name "stringSorting" 
        and print string in sort order (desc or asc)</h3>';

/**
 * Sort String.
 * 
 * @param $str       String to sort.
 * @param $order     ASC | DESC
 * @param $duplicate true|false
 * 
 * @return string Sorted
 */
function sortString($str = '', $order = '', $duplicate = '')
{
    $i = '';
    $j = '';
    $strArray = array();
    for ($i = 0; $i<strlen($str); $i++) {
        $strArray[] = $str[$i];
    }
    $len = count($strArray);
    for ($i = 0; $i < $len-1; $i++) {
        $min = $i;
        for ($j = $i+1; $j < $len; $j++) {
            if ($order == 'ASC' || $order == 'ASC') {
                if ($strArray[$j] < $strArray[$min]) {
                    $min = $j;
                }
            } else {
                if ($strArray[$j] > $strArray[$min]) {
                    $min = $j;
                }
            }
        }
        $temp = $strArray[$i];
        $strArray[$i] = $strArray[$min];
        $strArray[$min] = $temp;
    }

    if ($duplicate) {
        $strArray = array_unique($strArray);
    }

    return implode($strArray);
}
$str = "12098876123";
$order = "ASC";
echo "<p>Sorted String in {$order} : 
        <strong>".sortString($str, $order)."</strong></p>";


echo "<h1>Task - 3</h1>";
echo "<h3>Sort and merge the string and replace duplicate characters</h3>";

$str = "123456098876";
echo "<p>Sorted String in {$order} : 
        <strong>".sortString($str, $order, true)."</strong></p>";

echo "<h1>Task - 4</h1>";
echo "<h3>Convert string from snake to camel</h3>";


/**
 * Convert to Camel Case.
 * 
 * @param $str String
 * 
 * @return camelCase
 */
function toCamel($str)
{
    $strArray = explode('_', $str);
    $camelArray = array();
    for ($i = 0; $i < count($strArray); $i++) {
        if ($i != 0) {
            $camelArray[] = ucfirst($strArray[$i]);
        } else {
            $camelArray[] = $strArray[$i];
        }
    }

    return implode($camelArray);

}
$str = "john_peter";
echo toCamel($str);



echo "<h1>Task - 5</h1>";
echo "<h3>Check occurance of substring in given string and replace with **** 
        if matched count is EVEN , otherwise replace with ####</h3>";


/**
 * Replace duplicate
 * 
 * @param $str    String
 * @param $substr Subtring
 * 
 * @return ReplacedString
 */
function replaceSubStr($str = '', $substr = '')
{
    $str = ucwords($str);
    $substr = ucfirst($substr);
    $count = substr_count($str, $substr);
    if ($count % 2 == 0) {
        return str_replace($substr, "****", $str, $count);
    } else {
        return str_replace($substr, "####", $str, $count);
    }

}
$str = "Hello John Hello peter";
$substr = "peter";
echo replaceSubStr($str, $substr);

?>