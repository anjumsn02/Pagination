
<!DOCTYPE html><html>
<head>
<title>PHP Pagination</title>
</head><body><?php
// Establish Connection to the Database
$con = mysqli_connect('localhost','anjumsn02', 'sa7072', 'cs382-2161_anjumsn02');//Records per page
$per_page=5;

if (isset($_GET['page'])) {
$page = $_GET['page'];
}
else {
$page=1;
}
// Page will start from 0 and Multiple by Per Page
$start_from = ($page-1) * $per_page;
//Selecting the data from table but with limit
$query = "SELECT * FROM cs_courses LIMIT $start_from, $per_page";
$result = mysqli_query ($con, $query);
?>
<table align='center' border='2' cellpadding='3'
<tr><th>Name</th><th>Phone</th><th>Country</th></tr>
<?php
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr align='center'>
<td><?php echo $row['title']; ?></td>
<td><?php echo $row['credits']; ?></td>
</tr>
<?php
};
?>
</table>
<div>
<?php
//Now select all from table
$query = "select * from cs_courses";
$result = mysqli_query($con, $query);
// Count the total records
$total_records = mysqli_num_rows($result);
//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);
//Going to first page
echo "<center><a href='test.php?page=1'>...First Page...</a> ";
for ($i=1; $i<=$total_pages; $i++) {
echo "<a href='test.php?page=".$i."'>$i</a>";
};
// Going to last page
echo "<a href='test.php?page=".$total_pages."'>...Last Page...</a></center> ";
?>
</div>
</body>
</html>

