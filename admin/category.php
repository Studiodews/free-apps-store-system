<?php
include_once('category.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Dashboard</title>
</head>

<body>
<div id="wrapper">
<div id="upperPanel"></div>
<div id="navigationBar"></div>
<div id="content">
<?php
printError();
printSuccess();
if(isset($_GET['action']))
{
}
else
{
   $sql="SELECT * FROM categories";
   $result=mysql_query($sql) or die("query failed due to ".mysql_error());
   if(mysql_num_rows($result)==0)
    {
        echo 'NO categories defined yet , <a href="./category.php?action=new" class="hrefBtn">add new category</a>';
    }
    else
    {
        echo '<p><a href="./category.php?action=new" class="hrefBtn">add new category</a></p>';
        displayCategories($result);
    }
    
}
?>
</div>
<div id="footer"></div>
</div>
</body>
</html>