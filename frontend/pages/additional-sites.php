	<style type="text/css" media="screen">
		/*

RESPONSTABLE 2.0 by jordyvanraaij
  Designed mobile first!

If you like this solution, you might also want to check out the 1.0 version:
  https://gist.github.com/jordyvanraaij/9069194

*/
.responstable {
  margin: 1em 0;
  width: 100%;
  overflow: hidden;
  background: #FFF;
  color: #024457;
  border-radius: 10px;
  border: 1px solid #167F92;
}
.responstable td{
    border-radius: 3px;
    height: 34px;
    line-height: 34px;
    border: 1px solid #eee;
    padding: 6px 12px;
  }
.responstable tr {
  border: 1px solid #D9E4E6;
}
.responstable tr:nth-child(odd) {
  background-color: #EAF3F3;
}
.responstable th {
  display: none;
  border: 1px solid #FFF;
  background-color: #167F92;
  color: #FFF;
  padding: 1em;
}
.responstable th:first-child {
  display: table-cell;
  text-align: center;
}
.mk_front table td:first-child{
  background: none !important;
}
.responstable th:nth-child(2) {
  display: table-cell;
}
.responstable th:nth-child(2) span {
  display: none;
}
.responstable th:nth-child(2):after {
  content: attr(data-th);
}
@media (min-width: 480px) {
  .responstable th:nth-child(2) span {
    display: block;
  }
  .responstable th:nth-child(2):after {
    display: none;
  }
}
.responstable td {
  display: block;
  word-wrap: break-word;
  max-width: 7em;
}
.responstable td:first-child {
  display: table-cell;
  text-align: center;
  border-right: 1px solid #D9E4E6;
}
@media (min-width: 480px) {
  .responstable td {
    border: 1px solid #D9E4E6;
  }
}
.responstable th, .responstable td {
  text-align: left;
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .responstable th, .responstable td {
    display: table-cell;
    padding: 1em;
  }
}

body {
  padding: 0 2em;
  font-family: Arial, sans-serif;
  color: #024457;
  background: #f2f2f2;
}

h1 {
  font-family: Verdana;
  font-weight: normal;
  color: #024457;
}
h1 span {
  color: #167F92;
}
/*input {
	width: 100%;
}*/
input[type="submit"] {
    width: 123px;
    text-align: center;
    margin: 0 auto;
    background: green;
    color: #fff;
    border: none;
    padding: 12px;
}
	</style>
	<?php 
	// if(isset($_POST['additional_set']))
	// {
	// 	for ($i=0; $i < 30 ; $i++) { 
	// 		update_option( "mk_notes_url_".$i, $_POST['mk_notes_url_'.$i] );
	// 		update_option( "notes_mk_".$i, $_POST['notes_mk_'.$i] );
	// 	}
	// }

	// 	if(isset($_POST['paid_additional_set']))
	// {
	// 	for ($i=0; $i < 22 ; $i++) { 
	// 		update_option( "paid_mk_notes_url_".$i, $_POST['paid_mk_notes_url_'.$i] );
	// 		update_option( "paid_notes_mk_".$i, $_POST['paid_notes_mk_'.$i] );
	// 	}
	// }

	 ?>
<h1> <span>Additional Free Book Submission Websites</span> </h1>

	
	<!-- get -->

<table class="responstable">
  
  <tr>
    <!-- <th>Main driver</th> -->
    <th data-th="Driver details"><span>URL</span></th>
    <th>Notes</th>
<!--     <th>Date of birth</th>
    <th>Relationship</th> -->
  </tr>
  <?php for ($i=0; $i < 30; $i++) { 
	$mk_notes_url=get_option('mk_notes_url_'.$i);
	$notes_mk=get_option('notes_mk_'.$i); ?>
  	
  <tr>
    <td name="mk_notes_url_<?php echo $i; ?>"><a href="<?php echo $mk_notes_url;  ?>"><?php echo $mk_notes_url;  ?></a></td>
    <td name="notes_mk_<?php echo $i; ?>">	<?php echo $notes_mk; ?></td>
    <!-- <td>Foo</td> -->
  </tr>
 <?php } ?>
 
  
</table>
	
<h1> <span>Paid Submission Options</span> </h1>

	
	<!-- get -->

<table class="responstable">
  
  <tr>
    <!-- <th>Main driver</th> -->
    <th data-th="Driver details"><span>URL</span></th>
    <th>Notes</th>
<!--     <th>Date of birth</th>
    <th>Relationship</th> -->
  </tr>
  <?php for ($i=0; $i < 22; $i++) { 
	$paid_mk_notes_url=get_option('paid_mk_notes_url_'.$i);
	$paid_notes_mk=get_option('paid_notes_mk_'.$i); ?>
  	
  <tr>
    <td name="paid_mk_notes_url_<?php echo $i; ?>"><a href="<?php echo $paid_mk_notes_url;  ?>"><?php echo $paid_mk_notes_url;  ?></a></td>
    <td name="paid_notes_mk_<?php echo $i; ?>">	<?php echo $paid_notes_mk; ?></td>
    <!-- <td>Foo</td> -->
  </tr>
 <?php } ?>
 
  
</table>

