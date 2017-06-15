<?php

/**
 * platform managment functions[add,update,new,del,edit]
 * 
 * @author mohamed hussein 
 * @copyright 2017
 */

/**
 * create html form for new platform
 */
function newPlatformForm()
{
    echo '<form action="./platform.php?action=add" method="post" enctype="multipart/form-data">
        <label>Platform Name :</label><input type="text" name="name" /><br />
        <label>Platform Icon :</label><input type="file" value="upload" name="icon" /><br />
        <input  type="submit" name="submit" value="submit" />
        </form>';
}

/**
 * create html form for edit an existing platform and assign platform values to it 
 * @param int $id platform id in platforms table
 */
 function editPlatformForm($id)
 {
    $sql="SELECT * FROM platforms WHERE platformID=$id";
            $result=mysql_query($sql) or die("query failed due to ".mysql_error());
            if(mysql_num_rows($result)==0)//redirect if unknown id 
            {
              header("location:./platform.php");
            exit();  
            }
            else
            {//load platform content to be edited
             $row=mysql_fetch_assoc($result);
             $name=$row['platformName'];
             $icon= $row['platformIcon'];
             $id=$row['platformID'];
             echo '<form action="./platform.php?action=update&id='.$id.'" method="post" enctype="multipart/form-data">
                    <label>Platform Name :</label><input type="text" name="name" value="'.$name.'" /><br />
                    <label>Platform Icon :</label><input type="file" value="upload" name="icon" /><br />
                    <input  type="submit" name="submit" value="submit" />
                    </form>';  
            }
 }

/**
 * update an existing platform record
 * @param int $id platform id
 * @param string $name platform name
 * @param file $icon platform icon
 */
 function updatePlatform($id,$name,$icon)
 {
   
          $icon=addslashes($icon);
          $icon=file_get_contents($icon);
          $icon=base64_encode($icon);
          $sql="UPDATE platforms SET platformName='$name',platformIcon='$icon' WHERE platformID=$id ";  
          mysql_query($sql) or die("query failed due to ".mysql_error());
 } 
 
 /**
  * delete platfom from platforms table
  * @param int $id platform id
  */
  function delPlatform($id)
  {
    $sql="DELETE FROM platforms WHERE platformID=$id ";
    mysql_query($sql) or die("query failed due to ".mysql_error());
  }
?>