
		<br>
		<br>

	 <div class="container">

	 	<input class="form-control" id="myInput" type="text" placeholder="Search.." style="width: 500px;">

	 	<h1>All Articles</h1>

	 	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Image</th>
		      <th scope="col">Atricle Title</th>
		      <th scope="col">Publish On</th>
		      <th scope="col">Date</th>
		    </tr>
		  </thead>
		  <tbody id="mytable">
		  	 <?php if(count($articles)){
          		$count = $this->uri->segment(3);
		  		foreach ($articles as $article){
		  		?>
				    <tr>
				      <td><?php echo ++$count;?></td>
				      <td><img src="<?php echo base_url().'upload/'.$article->image_path ?>"
				      	width="100" ></td>
				      <td><?php echo $article->article_title;?></td>
				      <td>@mdo</td>
				      <td><?= date('D d M y H:i:s',strtotime($article->Created_at));?></td>
				    </tr>
		<?php } }?>
		  </tbody>
		</table>
		<?php echo $this->pagination->create_links(); ?>
	 </div>

	 <!--Search in table-->
<script>

$(document).ready(function(){ 
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#mytable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<!--Search in  table--> 

