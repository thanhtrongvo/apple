<?php 

/**
 * Check whether the length of a file name exceeds a certain limit.
 *
 * @param string $filename The name of the file to check
 *
 * @return bool Whether the file name exceeds the limit
 */
function check_file_uploaded_length($filename)
{
    // Check whether the length of the file name exceeds 225 characters
    return (bool) ((mb_strlen($filename, "UTF-8") > 225) ? true : false);
}

// Usage: uploadfile($_FILE['file']['name'],'temp/',$_FILE['file']['tmp_name'])
function uploadfile($origin, $dest, $tmp_name)
{
  $origin = strtolower(basename($origin));
  $fulldest = $dest.$origin;
  $filename = $origin;
  for ($i=1; file_exists($fulldest); $i++)
  {
    $fileext = (strpos($origin,'.')===false?'':'.'.substr(strrchr($origin, "."), 1));
    $filename = substr($origin, 0, strlen($origin)-strlen($fileext)).'['.$i.']'.$fileext;
    $fulldest = $dest.$filename;
  }
  
  if (move_uploaded_file($tmp_name, $fulldest))
    return $filename;
  return false;
}

// Usage: uploadimage($_FILE['image'],'temp/')
function uploadimage($image, $dest)
{
  $origin = strtolower(basename($image['name']));
  $fulldest = $dest.$origin;
  $filename = $origin;
  for ($i=1; file_exists($fulldest); $i++)
  {
    $fileext = (strpos($origin,'.')===false?'':'.'.substr(strrchr($origin, "."), 1));
    $filename = substr($origin, 0, strlen($origin)-strlen($fileext)).'['.$i.']'.$fileext;
    $fulldest = $dest.$filename;
  }
  
  if (move_uploaded_file($image['tmp_name'], $fulldest))
    return $filename;
  return false;
}
function checkfile($file)
{
  $file = strtolower(basename($file['name']));
  $fileext = (strpos($file,'.')===false?'':'.'.substr(strrchr($file, "."), 1));
  $filetype = $fileext;
  $filetype = strtolower($filetype);
  $filetype = ltrim($filetype, '.');
  $filetype = rtrim($filetype, '.');
  $filetype = trim($filetype);   
  $filetype = preg_replace('/\s\s+/', ' ', $filetype);
  $filetype = str_replace(' ', '', $filetype);
  $filetype = str_replace(';', '', $filetype);
  $filetype = str_replace(',', '', $filetype);
  $filetype = str_replace('(', '', $filetype);
  $filetype = str_replace(')', '', $filetype);
  $filetype = str_replace('=', '', $filetype);
  $filetype = str_replace('+', '', $filetype);
  $filetype = str_replace('-', '', $filetype);
  $filetype = str_replace('_', '', $filetype);
  $filetype = str_replace('`', '', $filetype);
  $filetype = str_replace('~', '', $filetype);
  $filetype = str_replace('!', '', $filetype);
  $filetype = str_replace('@', '', $filetype);
  $filetype = str_replace('#', '', $filetype);
  $filetype = str_replace('$', '', $filetype);
  $filetype = str_replace('%', '', $filetype);
  $filetype = str_replace('^', '', $filetype);
  $filetype = str_replace('&', '', $filetype);
  $filetype = str_replace('*', '', $filetype);
  $filetype = str_replace('{', '', $filetype);
  $filetype = str_replace('}', '', $filetype);
  $filetype = str_replace('[', '', $filetype);
  $filetype = str_replace(']', '', $filetype);
  $filetype = str_replace('|', '', $filetype);
  $filetype = str_replace(':', '', $filetype);
  $filetype = str_replace('"', '', $filetype);
  $filetype = str_replace('\'', '', $filetype);
  $filetype = str_replace('<', '', $filetype);
  $filetype = str_replace('>', '', $filetype);
  $filetype = str_replace('?', '', $filetype);
  $filetype = str_replace('/', '', $filetype);
  $filetype = str_replace('\\', '', $filetype);
  $filetype = str_replace('`', '', $filetype);


}


// if(isset($_GET['submit'])){
//     $search = $_GET['search'];
//     $sql = "SELECT * FROM Product WHERE title LIKE '%$search%'";
//     $result = mysqli_query($conn, $sql);
//     $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
//     if (mysqli_num_rows($result) > 0) {
//         foreach ($data as $row) {
//             echo "<tr>";
//             echo "<td>" . $row['id'] . "</td>";
//             echo "<td>" . $row['title'] . "</td>";
//             echo "<td>" . number_format($row['price'])  . "đ</td>";
//             echo "<td> <img class='img-product' src='../".$row['thumbnail']. "'</td>";
//             echo "<td>" . $row['option'] . "</td>";
//             echo "<td><small>" . $row['decription'] . "</small></td>";
//             if ($row['status'] == 0) {
//                 echo "<td><span class='badge badge-danger'>Private </span></td>";
//             } elseif ($row['status'] == 1) {
//                 echo "<td><span class='badge badge-success'>Public </span>";
//             }
//             echo "<td class='text-right'>";
//             echo "<a href='edit_product.php?id=" . $row['id'] . "' class='btn btn-sm btn-success'>
//                 <i class='fas fa-edit'></i>
//             </a> ";

// }
//     }
// }


?>